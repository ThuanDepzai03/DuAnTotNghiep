<?php

namespace App\Services;

use App\Models\ReturnRequest;
use App\Models\ServiceRequestStatusHistory;
use App\Models\WarrantyClaim;
use App\Support\ServiceWorkflow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ServiceRequestWorkflowService
{
    public function recordInitial(string $type, Model $requestModel, ?string $reason = null, ?Request $request = null): void
    {
        $this->record($type, $requestModel->getKey(), null, (string) $requestModel->status, $reason, $request);
    }

    public function transitionAdmin(
        string $type,
        Model $requestModel,
        string $targetStatus,
        ?string $reason,
        array $attributes,
        Request $request
    ): Model {
        return $this->transition($type, $requestModel, $targetStatus, $reason, $attributes, $request, true);
    }

    public function transitionCustomer(
        string $type,
        Model $requestModel,
        string $targetStatus,
        ?string $reason,
        array $attributes,
        Request $request
    ): Model {
        return $this->transition($type, $requestModel, $targetStatus, $reason, $attributes, $request, false);
    }

    private function transition(
        string $type,
        Model $requestModel,
        string $targetStatus,
        ?string $reason,
        array $attributes,
        Request $request,
        bool $admin
    ): Model {
        return DB::transaction(function () use ($type, $requestModel, $targetStatus, $reason, $attributes, $request, $admin) {
            $modelClass = $type === 'return' ? ReturnRequest::class : WarrantyClaim::class;
            $locked = $modelClass::query()->lockForUpdate()->findOrFail($requestModel->getKey());
            $allowed = $admin
                ? ServiceWorkflow::adminTransitions($type, (string) $locked->status)
                : [ServiceWorkflow::customerTransition($type, (string) $locked->status)];
            $allowed = array_filter($allowed);

            if (!in_array($targetStatus, $allowed, true)) {
                if ($admin && ServiceWorkflow::legacyStatus($type, (string) $locked->status) === $targetStatus) {
                    $locked->update($attributes);

                    return $locked->refresh();
                }

                throw ValidationException::withMessages([
                    'status' => 'Không thể chuyển trạng thái theo luồng xử lý hiện tại.',
                ]);
            }

            $oldStatus = (string) $locked->status;
            $locked->update(array_merge($attributes, ['status' => $targetStatus]));
            $this->record($type, $locked->getKey(), $oldStatus, $targetStatus, $reason, $request);

            return $locked->refresh();
        });
    }

    private function record(
        string $type,
        int $requestId,
        ?string $oldStatus,
        string $newStatus,
        ?string $reason,
        ?Request $request
    ): void {
        $customer = $request?->session()->get('customer');
        $admin = $request?->session()->get('admin');
        $isAdminCustomer = is_array($customer) && (int) ($customer['role'] ?? 0) === 1;
        $actorType = $request === null
            ? 'system'
            : (($admin || $isAdminCustomer) ? 'admin' : 'customer');
        $actor = $actorType === 'admin' ? ($admin ?: $customer) : $customer;
        $actorId = is_array($actor) ? ($actor['id'] ?? null) : (is_object($actor) ? ($actor->id ?? null) : null);
        $actorName = is_array($actor)
            ? ($actor['name'] ?? $actor['user'] ?? $actor['email'] ?? null)
            : (is_object($actor) ? ($actor->name ?? $actor->email ?? null) : null);

        ServiceRequestStatusHistory::create([
            'request_type' => $type,
            'request_id' => $requestId,
            'old_status' => $oldStatus,
            'new_status' => $newStatus,
            'reason' => $reason,
            'changed_by_type' => $actorType,
            'changed_by' => $actorId,
            'changed_by_name' => $actorName,
        ]);
    }
}
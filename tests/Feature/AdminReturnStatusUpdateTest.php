<?php

namespace Tests\Feature;

use App\Models\ReturnRequest;
use App\Support\ServiceWorkflow;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class AdminReturnStatusUpdateTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::dropIfExists('service_request_status_histories');
        Schema::dropIfExists('return_requests');

        Schema::create('return_requests', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('status')->default('pending');
            $table->string('reason');
            $table->text('description')->nullable();
            $table->decimal('refund_amount', 12, 2)->default(0);
            $table->string('refund_method')->nullable();
            $table->text('admin_note')->nullable();
            $table->text('refund_rejection_reason')->nullable();
            $table->text('return_failure_reason')->nullable();
            $table->string('customer_return_tracking_number')->nullable();
            $table->string('shop_return_tracking_number')->nullable();
            $table->timestamp('customer_sent_at')->nullable();
            $table->timestamp('shop_received_at')->nullable();
            $table->timestamp('customer_received_at')->nullable();
            $table->timestamps();
        });

        Schema::create('service_request_status_histories', function (Blueprint $table): void {
            $table->id();
            $table->string('request_type', 20);
            $table->unsignedBigInteger('request_id');
            $table->string('old_status', 40)->nullable();
            $table->string('new_status', 40);
            $table->text('reason')->nullable();
            $table->string('changed_by_type', 20)->nullable();
            $table->unsignedBigInteger('changed_by')->nullable();
            $table->string('changed_by_name')->nullable();
            $table->timestamp('changed_at')->nullable();
            $table->timestamps();
        });
    }

    protected function tearDown(): void
    {
        Schema::dropIfExists('service_request_status_histories');
        Schema::dropIfExists('return_requests');

        parent::tearDown();
    }

    public function test_admin_can_confirm_a_pending_return_and_save_note_and_history(): void
    {
        $returnRequest = ReturnRequest::create([
            'order_id' => 83,
            'status' => 'pending',
            'reason' => 'Sản phẩm lỗi',
            'refund_amount' => 0,
        ]);

        $response = $this->withSession([
            'admin' => ['id' => 9, 'name' => 'Admin test'],
        ])->put(route('admin.returns.update', $returnRequest), [
            'status' => 'approved',
            'admin_note' => 'Đã kiểm tra và chấp nhận gửi trả.',
        ]);

        $response->assertRedirect(route('admin.returns.show', $returnRequest));
        $response->assertSessionHas('success', 'Cập nhật trạng thái thành công.');

        $this->assertDatabaseHas('return_requests', [
            'id' => $returnRequest->id,
            'status' => 'approved',
            'admin_note' => 'Đã kiểm tra và chấp nhận gửi trả.',
        ]);
        $this->assertDatabaseHas('service_request_status_histories', [
            'request_type' => 'return',
            'request_id' => $returnRequest->id,
            'old_status' => 'pending',
            'new_status' => 'approved',
            'reason' => 'Đã kiểm tra và chấp nhận gửi trả.',
            'changed_by_type' => 'admin',
            'changed_by' => 9,
        ]);

        $updatedRequest = ReturnRequest::with('statusHistory')->findOrFail($returnRequest->id);
        $timeline = ServiceWorkflow::timeline(
            'return',
            $updatedRequest->status,
            $updatedRequest->statusHistory,
            $updatedRequest->created_at
        );

        $approvedStep = collect($timeline)->firstWhere('status', 'approved');
        $this->assertTrue($approvedStep['current']);
    }
}
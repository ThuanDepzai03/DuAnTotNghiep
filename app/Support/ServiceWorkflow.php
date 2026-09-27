<?php

namespace App\Support;

use Illuminate\Support\Collection;

final class ServiceWorkflow
{
    private const RETURN_STEPS = [
        'pending' => ['label' => 'Đã gửi yêu cầu', 'icon' => 'fa-paper-plane', 'description' => 'Shop đã tiếp nhận yêu cầu.'],
        'approved' => ['label' => 'Đã xác nhận', 'icon' => 'fa-check', 'description' => 'Shop xác nhận khách có thể gửi sản phẩm trả.'],
        'return_shipped' => ['label' => 'Đã gửi trả', 'icon' => 'fa-truck', 'description' => 'Khách đã gửi sản phẩm về shop.'],
        'received' => ['label' => 'Đã nhận hàng trả', 'icon' => 'fa-inbox', 'description' => 'Shop đã nhận và kiểm tra sản phẩm.'],
        'refund_approved' => ['label' => 'Đã xác nhận hoàn tiền', 'icon' => 'fa-thumbs-up', 'description' => 'Shop đã duyệt khoản hoàn tiền.'],
        'refunded' => ['label' => 'Hoàn tiền thành công', 'icon' => 'fa-money', 'description' => 'Shop đã ghi nhận hoàn tiền thành công.'],
        'refund_rejected' => ['label' => 'Không chấp nhận hoàn tiền', 'icon' => 'fa-times', 'description' => 'Shop không chấp nhận hoàn tiền và sẽ gửi lại sản phẩm.'],
        'return_prepared' => ['label' => 'Hoàn trả hàng', 'icon' => 'fa-archive', 'description' => 'Shop đang chuẩn bị gửi sản phẩm lại khách.'],
        'return_shipping' => ['label' => 'Đang gửi hàng lại', 'icon' => 'fa-truck', 'description' => 'Sản phẩm đang được vận chuyển về khách.'],
        'customer_received' => ['label' => 'Khách đã nhận lại hàng', 'icon' => 'fa-home', 'description' => 'Khách đã xác nhận nhận lại sản phẩm.'],
        'return_failed' => ['label' => 'Hoàn trả thất bại', 'icon' => 'fa-exclamation-triangle', 'description' => 'Shop cần xử lý sự cố giao trả hàng.'],
        'completed' => ['label' => 'Hoàn tất', 'icon' => 'fa-flag-checkered', 'description' => 'Yêu cầu đã kết thúc.'],
        'request_rejected' => ['label' => 'Từ chối yêu cầu', 'icon' => 'fa-ban', 'description' => 'Shop không tiếp nhận yêu cầu trả hàng.'],
        'decision_pending' => ['label' => 'Shop đang kiểm tra', 'icon' => 'fa-search', 'description' => 'Shop đang xác định phương án xử lý phù hợp.'],
    ];

    private const WARRANTY_STEPS = [
        'submitted' => ['label' => 'Đã gửi yêu cầu', 'icon' => 'fa-paper-plane', 'description' => 'Shop đã tiếp nhận yêu cầu bảo hành.'],
        'approved' => ['label' => 'Đã xác nhận', 'icon' => 'fa-check', 'description' => 'Yêu cầu bảo hành được chấp nhận.'],
        'customer_shipped' => ['label' => 'Đã gửi bảo hành', 'icon' => 'fa-truck', 'description' => 'Khách đã gửi thiết bị về shop.'],
        'received' => ['label' => 'Đã nhận sản phẩm bảo hành', 'icon' => 'fa-inbox', 'description' => 'Shop đã nhận thiết bị để kiểm tra.'],
        'processing' => ['label' => 'Đang xử lý bảo hành', 'icon' => 'fa-wrench', 'description' => 'Shop đang kiểm tra, sửa chữa hoặc thay thế.'],
        'repaired' => ['label' => 'Đã xử lý xong', 'icon' => 'fa-check-circle', 'description' => 'Shop đã hoàn tất xử lý thiết bị.'],
        'rejected' => ['label' => 'Từ chối bảo hành', 'icon' => 'fa-times', 'description' => 'Yêu cầu không thuộc phạm vi bảo hành.'],
        'return_prepared' => ['label' => 'Hoàn trả sản phẩm', 'icon' => 'fa-archive', 'description' => 'Shop đang chuẩn bị gửi thiết bị lại khách.'],
        'shipping' => ['label' => 'Đang gửi trả khách', 'icon' => 'fa-truck', 'description' => 'Thiết bị đang được vận chuyển về khách.'],
        'customer_received' => ['label' => 'Khách đã nhận hàng', 'icon' => 'fa-home', 'description' => 'Khách đã xác nhận nhận lại thiết bị.'],
        'return_failed' => ['label' => 'Gửi trả thất bại', 'icon' => 'fa-exclamation-triangle', 'description' => 'Shop cần xử lý sự cố giao trả thiết bị.'],
        'completed' => ['label' => 'Hoàn tất', 'icon' => 'fa-flag-checkered', 'description' => 'Yêu cầu bảo hành đã kết thúc.'],
    ];

    private const RETURN_ADMIN_TRANSITIONS = [
        'pending' => ['approved', 'request_rejected'],
        'return_shipped' => ['received'],
        'received' => ['refund_approved', 'refund_rejected'],
        'refund_approved' => ['refunded'],
        'refunded' => ['completed'],
        'refund_rejected' => ['return_prepared'],
        'return_prepared' => ['return_shipping'],
        'return_shipping' => ['customer_received', 'return_failed'],
        'return_failed' => ['return_shipping'],
        'customer_received' => ['completed'],
    ];

    private const WARRANTY_ADMIN_TRANSITIONS = [
        'submitted' => ['approved'],
        'customer_shipped' => ['received'],
        'received' => ['processing', 'rejected'],
        'processing' => ['repaired'],
        'repaired' => ['shipping'],
        'rejected' => ['return_prepared'],
        'return_prepared' => ['shipping'],
        'shipping' => ['customer_received', 'return_failed'],
        'return_failed' => ['shipping'],
        'customer_received' => ['completed'],
    ];

    private const CUSTOMER_TRANSITIONS = [
        'return' => [
            'approved' => 'return_shipped',
            'return_shipping' => 'customer_received',
        ],
        'warranty' => [
            'approved' => 'customer_shipped',
            'shipping' => 'customer_received',
        ],
    ];

    public static function steps(string $type): array
    {
        return $type === 'return' ? self::RETURN_STEPS : self::WARRANTY_STEPS;
    }

    public static function label(string $type, string $status): string
    {
        $status = self::legacyStatus($type, $status);

        return self::steps($type)[$status]['label'] ?? $status;
    }

    public static function adminTransitions(string $type, string $status): array
    {
        $map = $type === 'return' ? self::RETURN_ADMIN_TRANSITIONS : self::WARRANTY_ADMIN_TRANSITIONS;

        return $map[self::legacyStatus($type, $status)] ?? [];
    }

    public static function customerTransition(string $type, string $status): ?string
    {
        return self::CUSTOMER_TRANSITIONS[$type][self::legacyStatus($type, $status)] ?? null;
    }

    public static function adminStatusOptions(string $type): array
    {
        return array_values(array_diff(array_keys(self::steps($type)), ['decision_pending']));
    }

    public static function activeStatuses(string $type): array
    {
        $terminal = $type === 'return'
            ? ['completed', 'request_rejected', 'rejected', 'decision_pending']
            : ['completed', 'returned'];

        return array_values(array_diff(array_keys(self::steps($type)), $terminal));
    }

    public static function isFailure(string $type, string $status): bool
    {
        return in_array(self::legacyStatus($type, $status), ['request_rejected', 'refund_rejected', 'rejected', 'return_failed'], true);
    }

    public static function timeline(string $type, string $status, iterable $history, $createdAt): array
    {
        $status = self::legacyStatus($type, $status);
        $history = collect($history);
        $statuses = $type === 'return'
            ? self::returnPath($status, $history)
            : self::warrantyPath($status, $history);
        $historyByStatus = $history->keyBy('new_status');
        $statusPosition = array_search($status, $statuses, true);
        $statusPosition = $statusPosition === false ? 0 : $statusPosition;

        return collect($statuses)->map(function (string $stepStatus, int $index) use ($type, $status, $statusPosition, $historyByStatus, $createdAt) {
            $definition = self::steps($type)[$stepStatus];
            $current = $stepStatus === $status || ($stepStatus === 'decision_pending' && $status === 'received');
            $done = $stepStatus === 'decision_pending'
                ? false
                : ($statusPosition > $index || ($status === 'completed' && $stepStatus === 'completed'));
            $entry = $historyByStatus->get($stepStatus);
            $time = $entry?->created_at;

            if ($stepStatus === 'pending' || $stepStatus === 'submitted') {
                $time ??= $createdAt;
            }

            return [
                'status' => $stepStatus,
                'label' => $definition['label'],
                'icon' => $definition['icon'],
                'description' => $definition['description'],
                'done' => $done,
                'current' => $current,
                'time' => $time,
                'reason' => $entry?->reason,
            ];
        })->all();
    }

    public static function historyTimeline(Collection $history, string $type, string $status, $createdAt): array
    {
        return self::timeline($type, $status, $history, $createdAt);
    }

    public static function legacyStatus(string $type, string $status): string
    {
        return match ([$type, $status]) {
            ['return', 'rejected'] => 'request_rejected',
            ['warranty', 'checking'], ['warranty', 'repairing'] => 'processing',
            ['warranty', 'ready'] => 'repaired',
            ['warranty', 'returned'] => 'completed',
            default => $status,
        };
    }

    private static function returnPath(string $status, Collection $history): array
    {
        if ($status === 'request_rejected') {
            return ['pending', 'request_rejected'];
        }

        if (in_array($status, ['pending', 'approved', 'return_shipped', 'received'], true)) {
            return ['pending', 'approved', 'return_shipped', 'received', 'decision_pending'];
        }

        $refundRejected = $history->contains('new_status', 'refund_rejected');
        if ($refundRejected || in_array($status, ['refund_rejected', 'return_prepared', 'return_shipping', 'customer_received', 'return_failed'], true)) {
            $path = ['pending', 'approved', 'return_shipped', 'received', 'refund_rejected', 'return_prepared', 'return_shipping'];

            if ($status === 'return_failed') {
                $path[] = 'return_failed';
            } else {
                $path[] = 'customer_received';
            }

            if ($status === 'completed') {
                $path[] = 'completed';
            }

            return $path;
        }

        return ['pending', 'approved', 'return_shipped', 'received', 'refund_approved', 'refunded', 'completed'];
    }

    private static function warrantyPath(string $status, Collection $history): array
    {
        if ($history->contains('new_status', 'rejected') || in_array($status, ['rejected', 'return_prepared', 'return_failed'], true)) {
            $path = ['submitted', 'approved', 'customer_shipped', 'received', 'rejected', 'return_prepared', 'shipping'];
            $path[] = $status === 'return_failed' ? 'return_failed' : 'customer_received';
            if ($status === 'completed') {
                $path[] = 'completed';
            }

            return $path;
        }

        return ['submitted', 'approved', 'customer_shipped', 'received', 'processing', 'repaired', 'shipping', 'customer_received', 'completed'];
    }
}
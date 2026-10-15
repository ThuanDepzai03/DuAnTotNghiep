<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Services\InventoryService;
use Illuminate\Console\Command;

class CleanupCancelledOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:cleanup-cancelled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tự động hủy và hoàn tồn kho cho các đơn hàng chờ thanh toán quá hạn (sau 24h)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Tìm các đơn hàng VNPay pending_payment bị bỏ dở quá 24h
        $oneDayAgo = now()->subHours(24);

        $expiredPendingOrders = Order::where('status', 'pending_payment')
            ->where('created_at', '<', $oneDayAgo)
            ->get();

        $count = 0;
        foreach ($expiredPendingOrders as $order) {
            \Illuminate\Support\Facades\DB::transaction(function () use ($order) {
                app(InventoryService::class)->releaseOrder($order);
                $order->update(['status' => 'cancelled']);
            });
            $count++;
        }

        $this->info("Đã tự động hủy và hoàn tồn kho cho $count đơn hàng chờ thanh toán quá 24h.");

        return Command::SUCCESS;
    }
}

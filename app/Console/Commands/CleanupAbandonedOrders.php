<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Services\InventoryService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanupAbandonedOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:cleanup-abandoned';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Xóa các đơn hàng chưa thanh toán VNPay sau 24 giờ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Find orders with status 'pending_payment' that were created more than 24 hours ago
        $twentyFourHoursAgo = now()->subHours(24);

        $abandonedOrders = Order::where('status', 'pending_payment')
            ->where('created_at', '<', $twentyFourHoursAgo)
            ->get();

        $count = 0;
        foreach ($abandonedOrders as $order) {
            $deleted = DB::transaction(function () use ($order, $twentyFourHoursAgo): bool {
                $lockedOrder = Order::query()->lockForUpdate()->find($order->id);
                if (!$lockedOrder || $lockedOrder->status !== 'pending_payment' || $lockedOrder->created_at >= $twentyFourHoursAgo) {
                    return false;
                }

                app(InventoryService::class)->releaseOrder($lockedOrder);
                $lockedOrder->items()->delete();
                $lockedOrder->delete();

                return true;
            }, 3);

            $count += (int) $deleted;
        }

        $this->info("Đã xóa $count đơn hàng chưa thanh toán cũ.");

        return Command::SUCCESS;
    }
}

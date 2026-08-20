<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

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
            // Delete related items first
            $order->items()->delete();
            // Then delete the order
            $order->delete();
            $count++;
        }

        $this->info("Đã xóa $count đơn hàng chưa thanh toán cũ.");

        return Command::SUCCESS;
    }
}

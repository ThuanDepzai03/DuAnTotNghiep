<?php

namespace App\Console\Commands;

use App\Models\Order;
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
    protected $description = 'Xóa các đơn hàng đã hủy sau 1 ngày';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Find cancelled orders that were cancelled more than 1 day ago
        $oneDayAgo = now()->subDays(1);

        $cancelledOrders = Order::where('status', 'cancelled')
            ->where('updated_at', '<', $oneDayAgo)
            ->get();

        $count = 0;
        foreach ($cancelledOrders as $order) {
            // Delete related items first
            $order->items()->delete();
            // Then delete the order
            $order->delete();
            $count++;
        }

        $this->info("Đã xóa $count đơn hàng đã hủy.");

        return Command::SUCCESS;
    }
}

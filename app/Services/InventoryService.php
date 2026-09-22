<?php

namespace App\Services;

use App\Models\InventoryTransaction;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class InventoryService
{
    public function markOrderSold(Order $order): void
    {
        $order->loadMissing('items.imeis');

        foreach ($order->items as $item) {
            if ($item->imeis->isNotEmpty()) {
                foreach ($item->imeis as $imei) {
                    if ($imei->status === 'sold') {
                        continue;
                    }

                    $imei->update(['status' => 'sold', 'sold_at' => now()]);
                    InventoryTransaction::create([
                        'product_variant_id' => $item->product_variant_id,
                        'product_imei_id' => $imei->id,
                        'order_id' => $order->id,
                        'type' => 'sale',
                        'quantity' => 0,
                        'note' => 'Xuất kho theo đơn hàng',
                    ]);
                }
            } else {
                $hasReservation = InventoryTransaction::where('order_id', $order->id)
                    ->where('product_variant_id', $item->product_variant_id)
                    ->where('type', 'reserve')
                    ->exists();
                if (!$hasReservation) {
                    $item->variant()->decrement('stock', $item->quantity);
                }
                InventoryTransaction::create([
                    'product_variant_id' => $item->product_variant_id,
                    'order_id' => $order->id,
                    'type' => 'sale',
                    'quantity' => 0,
                    'note' => 'Xuất kho theo đơn hàng',
                ]);
            }
        }
    }

    public function releaseOrder(Order $order): void
    {
        $order->loadMissing('items.imeis');

        foreach ($order->items as $item) {
            foreach ($item->imeis as $imei) {
                if ($imei->status !== 'reserved') {
                    continue;
                }

                $imei->update(['status' => 'in_stock']);
                $item->variant()->increment('stock');
                InventoryTransaction::create([
                    'product_variant_id' => $item->product_variant_id,
                    'product_imei_id' => $imei->id,
                    'order_id' => $order->id,
                    'type' => 'release',
                    'quantity' => 1,
                    'note' => 'Hủy giữ IMEI do đơn hàng thất bại',
                ]);
            }

            if ($item->imeis->isEmpty()) {
                $hasReservation = InventoryTransaction::where('order_id', $order->id)
                    ->where('product_variant_id', $item->product_variant_id)
                    ->where('type', 'reserve')
                    ->exists();
                if ($hasReservation) {
                    $item->variant()->increment('stock', $item->quantity);
                }
            }
        }
    }

    public function restoreSoldOrder(Order $order): void
    {
        $order->loadMissing('items.imeis');

        foreach ($order->items as $item) {
            if ($item->imeis->isNotEmpty()) {
                foreach ($item->imeis as $imei) {
                    if ($imei->status !== 'sold') {
                        continue;
                    }
                    $imei->update(['status' => 'in_stock', 'sold_at' => null]);
                    $item->variant()->increment('stock');
                    InventoryTransaction::create([
                        'product_variant_id' => $item->product_variant_id,
                        'product_imei_id' => $imei->id,
                        'order_id' => $order->id,
                        'type' => 'return',
                        'quantity' => 1,
                        'note' => 'Hoàn kho do hủy đơn',
                    ]);
                }
            } else {
                $item->variant()->increment('stock', $item->quantity);
                InventoryTransaction::create([
                    'product_variant_id' => $item->product_variant_id,
                    'order_id' => $order->id,
                    'type' => 'return',
                    'quantity' => $item->quantity,
                    'note' => 'Hoàn kho do hủy đơn',
                ]);
            }
        }
    }
}

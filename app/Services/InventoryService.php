<?php

namespace App\Services;

use App\Models\InventoryTransaction;
use App\Models\Order;
use App\Models\ProductImei;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class InventoryService
{
    public function markOrderSold(Order $order): void
    {
        DB::transaction(function () use ($order): void {
            $lockedOrder = Order::query()
                ->with('items.imeis')
                ->lockForUpdate()
                ->findOrFail($order->id);

            foreach ($lockedOrder->items as $item) {
                if ($item->imeis->isNotEmpty()) {
                    foreach ($item->imeis as $relatedImei) {
                        $imei = ProductImei::query()->lockForUpdate()->findOrFail($relatedImei->id);
                        if ($imei->status === 'sold') {
                            continue;
                        }

                        if ($imei->status === 'in_stock') {
                            $this->decrementStock($item->product_variant_id, 1);
                        } elseif ($imei->status !== 'reserved') {
                            throw new RuntimeException('IMEI không còn khả dụng để xuất kho.');
                        }

                        $imei->update(['status' => 'sold', 'sold_at' => now()]);
                        InventoryTransaction::create([
                            'product_variant_id' => $item->product_variant_id,
                            'product_imei_id' => $imei->id,
                            'order_id' => $lockedOrder->id,
                            'type' => 'sale',
                            'quantity' => 0,
                            'note' => 'Xuất kho theo đơn hàng',
                        ]);
                    }

                    continue;
                }

                $saleRecorded = InventoryTransaction::where('order_id', $lockedOrder->id)
                    ->where('product_variant_id', $item->product_variant_id)
                    ->where('type', 'sale')
                    ->exists();
                if ($saleRecorded) {
                    continue;
                }

                $hasReservation = InventoryTransaction::where('order_id', $lockedOrder->id)
                    ->where('product_variant_id', $item->product_variant_id)
                    ->where('type', 'reserve')
                    ->exists();
                if (!$hasReservation) {
                    $this->decrementStock($item->product_variant_id, $item->quantity);
                }

                InventoryTransaction::create([
                    'product_variant_id' => $item->product_variant_id,
                    'order_id' => $lockedOrder->id,
                    'type' => 'sale',
                    'quantity' => 0,
                    'note' => 'Xuất kho theo đơn hàng',
                ]);
            }
        }, 3);
    }

    public function releaseOrder(Order $order): void
    {
        DB::transaction(function () use ($order): void {
            $lockedOrder = Order::query()
                ->with('items.imeis')
                ->lockForUpdate()
                ->findOrFail($order->id);

            foreach ($lockedOrder->items as $item) {
                foreach ($item->imeis as $relatedImei) {
                    $imei = ProductImei::query()->lockForUpdate()->findOrFail($relatedImei->id);
                    if ($imei->status !== 'reserved') {
                        continue;
                    }

                    $imei->update(['status' => 'in_stock']);
                    ProductVariant::whereKey($item->product_variant_id)->increment('stock');
                    InventoryTransaction::create([
                        'product_variant_id' => $item->product_variant_id,
                        'product_imei_id' => $imei->id,
                        'order_id' => $lockedOrder->id,
                        'type' => 'release',
                        'quantity' => 1,
                        'note' => 'Hủy giữ IMEI do đơn hàng thất bại',
                    ]);
                }

                if ($item->imeis->isNotEmpty()) {
                    continue;
                }

                $hasReservation = InventoryTransaction::where('order_id', $lockedOrder->id)
                    ->where('product_variant_id', $item->product_variant_id)
                    ->where('type', 'reserve')
                    ->exists();
                $alreadyReleased = InventoryTransaction::where('order_id', $lockedOrder->id)
                    ->where('product_variant_id', $item->product_variant_id)
                    ->where('type', 'release')
                    ->exists();
                $alreadySoldOrReturned = InventoryTransaction::where('order_id', $lockedOrder->id)
                    ->where('product_variant_id', $item->product_variant_id)
                    ->whereIn('type', ['sale', 'return'])
                    ->exists();

                if ($hasReservation && !$alreadyReleased && !$alreadySoldOrReturned) {
                    ProductVariant::whereKey($item->product_variant_id)->increment('stock', $item->quantity);
                    InventoryTransaction::create([
                        'product_variant_id' => $item->product_variant_id,
                        'order_id' => $lockedOrder->id,
                        'type' => 'release',
                        'quantity' => $item->quantity,
                        'note' => 'Hủy giữ tồn kho do đơn hàng thất bại',
                    ]);
                }
            }
        }, 3);
    }

    public function restoreSoldOrder(Order $order): void
    {
        DB::transaction(function () use ($order): void {
            $lockedOrder = Order::query()
                ->with('items.imeis')
                ->lockForUpdate()
                ->findOrFail($order->id);

            foreach ($lockedOrder->items as $item) {
                if ($item->imeis->isNotEmpty()) {
                    foreach ($item->imeis as $relatedImei) {
                        $imei = ProductImei::query()->lockForUpdate()->findOrFail($relatedImei->id);
                        if ($imei->status !== 'sold') {
                            continue;
                        }

                        $imei->update(['status' => 'in_stock', 'sold_at' => null]);
                        ProductVariant::whereKey($item->product_variant_id)->increment('stock');
                        InventoryTransaction::create([
                            'product_variant_id' => $item->product_variant_id,
                            'product_imei_id' => $imei->id,
                            'order_id' => $lockedOrder->id,
                            'type' => 'return',
                            'quantity' => 1,
                            'note' => 'Hoàn kho do hủy đơn',
                        ]);
                    }

                    continue;
                }

                $alreadyReturned = InventoryTransaction::where('order_id', $lockedOrder->id)
                    ->where('product_variant_id', $item->product_variant_id)
                    ->where('type', 'return')
                    ->exists();
                if ($alreadyReturned) {
                    continue;
                }

                ProductVariant::whereKey($item->product_variant_id)->increment('stock', $item->quantity);
                InventoryTransaction::create([
                    'product_variant_id' => $item->product_variant_id,
                    'order_id' => $lockedOrder->id,
                    'type' => 'return',
                    'quantity' => $item->quantity,
                    'note' => 'Hoàn kho do hủy đơn',
                ]);
            }
        }, 3);
    }

    private function decrementStock(int $variantId, int $quantity): void
    {
        $affectedRows = ProductVariant::whereKey($variantId)
            ->where('stock', '>=', $quantity)
            ->decrement('stock', $quantity);

        if ($affectedRows !== 1) {
            throw new RuntimeException('Tồn kho không đủ để xác nhận đơn hàng.');
        }
    }
}

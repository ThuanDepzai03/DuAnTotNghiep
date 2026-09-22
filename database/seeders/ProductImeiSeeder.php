<?php

namespace Database\Seeders;

use App\Models\InventoryTransaction;
use App\Models\ProductImei;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImeiSeeder extends Seeder
{
    public function run(): void
    {
        $variantIds = ProductVariant::query()->pluck('id');

        DB::transaction(function () use ($variantIds) {
            foreach ($variantIds as $variantId) {
                $existingImeis = ProductImei::where('product_variant_id', $variantId)->get();
                $existingNumbers = $existingImeis->pluck('imei')->all();
                $needed = max(0, 10 - count($existingNumbers));

                for ($index = 0; $index < $needed; $index++) {
                    do {
                        $imei = $this->generateIphoneImei();
                    } while (in_array($imei, $existingNumbers, true) || ProductImei::where('imei', $imei)->exists());

                    $productImei = ProductImei::create([
                        'product_variant_id' => $variantId,
                        'imei' => $imei,
                        'status' => 'in_stock',
                        'warehouse_location' => 'DEMO-A' . (($index % 5) + 1),
                        'received_at' => now(),
                        'warranty_expired_at' => now()->addYear(),
                    ]);

                    InventoryTransaction::create([
                        'product_variant_id' => $variantId,
                        'product_imei_id' => $productImei->id,
                        'type' => 'receipt',
                        'quantity' => 1,
                        'note' => 'IMEI demo sinh tự động cho seeder',
                    ]);

                    $existingNumbers[] = $imei;
                }

                ProductVariant::whereKey($variantId)->update([
                    'stock' => ProductImei::where('product_variant_id', $variantId)
                        ->where('status', 'in_stock')
                        ->count(),
                ]);
            }
        });
    }

    private function generateIphoneImei(): string
    {
        // TAC demo 35xxxx, followed by a random serial and a valid Luhn check digit.
        $digits = '35' . str_pad((string) random_int(0, 999999999999), 12, '0', STR_PAD_LEFT);
        $sum = 0;

        for ($index = 0; $index < 14; $index++) {
            $digit = (int) $digits[$index];
            if ($index % 2 === 1) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            $sum += $digit;
        }

        return $digits . (string) ((10 - ($sum % 10)) % 10);
    }
}

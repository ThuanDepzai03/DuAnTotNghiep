<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsFromDbSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = base_path('scripts/products_export.json');

        if (!file_exists($jsonPath)) {
            $this->command->error("Export file not found: $jsonPath");
            return;
        }

        $raw = file_get_contents($jsonPath);
        // remove control characters that can break json_decode (keep tab, newline, carriage return)
        $clean = @preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F-\x9F]/u', '', $raw);
        if ($clean !== null && $clean !== '') {
            $raw = $clean;
        }
        try {
            $data = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            // fallback to more tolerant decode
            $this->command->warn('JSON decode threw: ' . $e->getMessage() . ' — trying tolerant decode');
            $data = json_decode($raw, true, 512, defined('JSON_INVALID_UTF8_SUBSTITUTE') ? JSON_INVALID_UTF8_SUBSTITUTE : 0);
            if (!is_array($data)) {
                // try stripping invalid UTF-8 bytes
                $clean = @iconv('UTF-8', 'UTF-8//IGNORE', $raw);
                if ($clean !== false) {
                    $data = json_decode($clean, true);
                }
            }
        }

        if (!is_array($data)) {
            $this->command->error('Failed to decode JSON or unexpected format: ' . json_last_error_msg());
            return;
        }

        $products = [];
        foreach ($data as $p) {
            $products[] = [
                'data' => [
                    'category_id' => $p['category_id'] ?? null,
                    'brand_id' => $p['brand_id'] ?? null,
                    'name' => $p['name'] ?? null,
                    'slug' => $p['slug'] ?? null,
                    'sku' => $p['sku'] ?? null,
                    'description' => $p['description'] ?? null,
                    'thumbnail' => $p['thumbnail'] ?? null,
                    'status' => $p['status'] ?? 1,
                ],
                'variants' => [],
            ];
        }

        $outPath = database_path('seeders/ProductsFromDbStaticSeeder.php');

        $export = "<?php\n\nnamespace Database\\Seeders;\n\nuse App\\Models\\Product;\nuse App\\Models\\ProductVariant;\nuse Illuminate\\Database\\Seeder;\n\nclass ProductsFromDbStaticSeeder extends Seeder\n{\n    public function run(): void\n    {\n        $products = ";

        $export .= var_export($products, true) . ";\n\n        // This seeder was generated from scripts/products_export.json\n        // It contains the products array. You can copy the array into your ProductSeeder.php or run this seeder to insert entries.\n    }\n}\n";

        file_put_contents($outPath, $export);

        $this->command->info("Generated static seeder: " . $outPath);
    }
}

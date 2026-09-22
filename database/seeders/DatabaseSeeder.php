<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            AttributeSeeder::class,
            CategoryAttributeSeeder::class,
            BannerSeeder::class,
            ProductSeeder::class,
            AdditionalCatalogSeeder::class,
            ProductImeiSeeder::class,
            DemoCustomerOrderSeeder::class,
            ReviewSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            VoucherSeeder::class,
        ]);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductClicksTest extends TestCase
{
    use WithoutMiddleware;

    public function test_home_page_shows_featured_products_section(): void
    {
        $category = DB::table('categories')->insertGetId([
            'name' => 'Điện thoại',
            'slug' => 'dien-thoai',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $brand = DB::table('brands')->insertGetId([
            'name' => 'Apple',
            'slug' => 'apple',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $productId = DB::table('products')->insertGetId([
            'category_id' => $category,
            'brand_id' => $brand,
            'name' => 'iPhone 15',
            'slug' => 'iphone-15',
            'sku' => 'IP15-001',
            'description' => 'Demo',
            'thumbnail' => 'img/product01.png',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_clicks')->insert([
            'product_id' => $productId,
            'customer_id' => 1,
            'session_id' => 'featured-session',
            'ip_address' => '127.0.0.1',
            'user_agent' => 'phpunit',
            'clicked_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('SẢN PHẨM NỔI BẬT');
        $response->assertSee('iPhone 15');
    }
}

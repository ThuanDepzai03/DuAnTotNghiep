<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        if (!Schema::hasTable('danhmuc')) {
            Schema::create('danhmuc', function ($table) {
                $table->id();
                $table->string('name');
                $table->boolean('deleted')->default(false);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('sanpham')) {
            Schema::create('sanpham', function ($table) {
                $table->id();
                $table->string('name');
                $table->decimal('price', 12, 2)->default(0);
                $table->text('mota')->nullable();
                $table->integer('iddm')->default(0);
                $table->boolean('deleted')->default(false);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('hoadon')) {
            Schema::create('hoadon', function ($table) {
                $table->id();
                $table->string('tenkhachhang')->nullable();
                $table->string('sdt')->nullable();
                $table->text('diachi')->nullable();
                $table->decimal('tongtien', 12, 2)->default(0);
                $table->integer('trangthai')->default(0);
                $table->timestamp('ngaygiodat')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('chitiethoadon')) {
            Schema::create('chitiethoadon', function ($table) {
                $table->id();
                $table->integer('id_hoadon');
                $table->integer('id_sanpham');
                $table->integer('soLuong')->default(1);
                $table->decimal('donGia', 12, 2)->default(0);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('nguoidung')) {
            Schema::create('nguoidung', function ($table) {
                $table->id();
                $table->string('user');
                $table->string('pass');
                $table->string('email')->nullable();
                $table->string('address')->nullable();
                $table->string('tel')->nullable();
                $table->integer('role')->default(0);
                $table->timestamps();
            });
        }
    }
    public function test_admin_dashboard_page_is_accessible(): void
    {
        session(['customer' => ['id' => 1, 'user' => 'admin', 'role' => 1]]);

        $response = $this->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Hệ thống AE STORE');
    }

    public function test_admin_categories_page_is_accessible(): void
    {
        session(['customer' => ['id' => 1, 'user' => 'admin', 'role' => 1]]);

        $response = $this->get('/admin/categories');

        $response->assertStatus(200);
        $response->assertSee('Quản lý danh mục');
    }

    public function test_admin_products_page_is_accessible(): void
    {
        session(['customer' => ['id' => 1, 'user' => 'admin', 'role' => 1]]);

        $response = $this->get('/admin/products');

        $response->assertStatus(200);
        $response->assertSee('Quản lý sản phẩm');
    }

    public function test_admin_orders_page_is_accessible(): void
    {
        session(['customer' => ['id' => 1, 'user' => 'admin', 'role' => 1]]);

        $response = $this->get('/admin/orders');

        $response->assertStatus(200);
        $response->assertSee('Quản lý đơn hàng');
    }

    public function test_admin_users_page_is_accessible(): void
    {
        session(['customer' => ['id' => 1, 'user' => 'admin', 'role' => 1]]);

        $response = $this->get('/admin/users');

        $response->assertStatus(200);
        $response->assertSee('Quản lý khách hàng');
    }
}

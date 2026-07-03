<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class AuthAndProfileTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

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

        if (!Schema::hasTable('admins')) {
            Schema::create('admins', function ($table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
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

        DB::table('nguoidung')->delete();
        DB::table('admins')->delete();
        DB::table('hoadon')->delete();
    }

    public function test_admin_requires_login(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirectContains('/login');
    }

    public function test_customer_can_register_and_view_profile(): void
    {
        $response = $this->post('/register', [
            'user' => 'khachhang1',
            'email' => 'khachhang1@example.com',
            'pass' => '123456',
            'address' => '123 Nguyễn Văn Cừ',
            'tel' => '0909123456',
        ]);

        $response->assertRedirect('/account/profile');

        $this->get('/account/profile')
            ->assertStatus(200)
            ->assertSee('Thông tin khách hàng')
            ->assertSee('0909123456');
    }

    public function test_customer_profile_shows_customer_area_links(): void
    {
        session(['customer' => ['id' => 1, 'user' => 'khachhang1', 'role' => 0]]);

        $response = $this->get('/account/profile');

        $response->assertStatus(200);
        $response->assertSee('Giỏ hàng');
        $response->assertSee('Tài khoản');
    }

    public function test_registration_works_when_timestamp_columns_are_missing(): void
    {
        Schema::dropIfExists('nguoidung');

        Schema::create('nguoidung', function ($table) {
            $table->id();
            $table->string('user');
            $table->string('pass');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('tel')->nullable();
            $table->integer('role')->default(0);
        });

        $response = $this->post('/register', [
            'user' => 'khachhang2',
            'email' => 'khachhang2@example.com',
            'pass' => '123456',
            'address' => '456 Trần Hưng Đạo',
            'tel' => '0909111222',
        ]);

        $response->assertRedirect('/account/profile');
    }

    public function test_default_admin_can_login_and_access_admin_dashboard(): void
    {
        $response = $this->post('/login', [
            'user' => 'admin',
            'pass' => '123123123',
        ]);

        $response->assertRedirect('/admin');
        $this->assertEquals(1, session('customer.role'));
        $this->assertEquals('admin', session('customer.user'));
    }

    public function test_guest_can_see_cart_link_in_header(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee('Giỏ hàng');
    }

    public function test_checkout_prefills_customer_info_for_logged_in_customer(): void
    {
        session(['customer' => [
            'id' => 1,
            'user' => 'khachhang1',
            'email' => 'khachhang1@example.com',
            'address' => '123 Nguyễn Văn Cừ',
            'tel' => '0909123456',
            'role' => 0,
        ]]);

        $response = $this->get('/checkout');

        $response->assertStatus(200)
            ->assertSee('value="khachhang1"', false)
            ->assertSee('value="123 Nguyễn Văn Cừ"', false)
            ->assertSee('value="0909123456"', false);
    }
}

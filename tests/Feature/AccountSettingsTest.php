<?php

namespace Tests\Feature;

use App\Support\CustomerTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class AccountSettingsTest extends TestCase
{
    protected int $customerId;

    protected function setUp(): void
    {
        parent::setUp();
        DB::beginTransaction();

        Schema::dropIfExists('customer_addresses');
        Schema::dropIfExists('nguoidung');
        Schema::dropIfExists('users');

        Schema::create('users', function ($table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('user')->unique();
            $table->string('email')->nullable()->unique();
            $table->string('pass');
            $table->integer('role')->default(0);
            $table->string('address', 500)->nullable();
            $table->string('tel', 20)->nullable();
            $table->string('city')->nullable();
            $table->string('ward')->nullable();
            $table->string('address_detail', 500)->nullable();
            $table->timestamps();
        });

        $migration = require database_path('migrations/2026_10_15_000002_add_account_settings.php');
        $migration->up();

        $this->customerId = DB::table('users')->insertGetId([
            'name' => 'Khách Hàng',
            'user' => 'settings-user',
            'email' => 'settings@example.com',
            'pass' => bcrypt('initial-password'),
            'role' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    protected function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown();
    }

    public function test_customer_can_open_the_account_settings_hub(): void
    {
        $response = $this->withSession([
            'customer' => ['id' => $this->customerId, 'user' => 'settings-user', 'role' => 0],
            'customer_session_version' => 1,
        ])->get('/account/profile');

        $response->assertOk()
            ->assertSee('Trung tâm tài khoản')
            ->assertSee('Hồ sơ cá nhân')
            ->assertSee('Sổ địa chỉ nhận hàng')
            ->assertSee('Cài đặt bảo mật')
            ->assertSee('Tùy chọn trải nghiệm');
    }

    public function test_address_preferences_and_other_session_revocation_are_persisted(): void
    {
        $session = [
            'customer' => ['id' => $this->customerId, 'user' => 'settings-user', 'role' => 0],
            'customer_session_version' => 1,
        ];

        $this->withSession($session)->post('/account/addresses', [
            'recipient_name' => 'Nguyễn An',
            'phone' => '0909123456',
            'label' => 'home',
            'city' => 'Hà Nội',
            'ward' => 'Phường Cống Vị',
            'address_detail' => '12 Phố Huế',
        ])->assertRedirect();

        $this->assertDatabaseHas('customer_addresses', [
            'user_id' => $this->customerId,
            'recipient_name' => 'Nguyễn An',
            'is_default' => 1,
        ]);
        $this->assertDatabaseHas(CustomerTable::name(), [
            'id' => $this->customerId,
            'city' => 'Hà Nội',
            'address_detail' => '12 Phố Huế',
        ]);

        $defaultAddressId = DB::table('customer_addresses')->where('user_id', $this->customerId)->value('id');
        $this->post('/account/addresses', [
            'recipient_name' => 'Nguyễn An',
            'phone' => '0909888777',
            'label' => 'company',
            'city' => 'Hồ Chí Minh',
            'ward' => 'Phường Bến Nghé',
            'address_detail' => '20 Nguyễn Huệ',
        ])->assertRedirect();
        $otherAddressId = DB::table('customer_addresses')->where('user_id', $this->customerId)->where('label', 'company')->value('id');

        $this->put('/account/addresses/' . $otherAddressId, [
            'recipient_name' => 'Nguyễn An',
            'phone' => '0909888777',
            'label' => 'company',
            'city' => 'Đà Nẵng',
            'ward' => 'Phường Hải Châu I',
            'address_detail' => '20 Bạch Đằng',
            'is_default' => 1,
        ])->assertRedirect()->assertSessionHasNoErrors();
        $this->assertDatabaseHas('users', ['id' => $this->customerId, 'city' => 'Đà Nẵng']);
        $this->assertDatabaseHas('customer_addresses', ['id' => $otherAddressId, 'is_default' => 1]);

        $this->delete('/account/addresses/' . $otherAddressId)->assertRedirect();
        $this->assertDatabaseMissing('customer_addresses', ['id' => $otherAddressId]);
        $this->assertDatabaseHas('customer_addresses', ['id' => $defaultAddressId, 'is_default' => 1]);
        $this->assertDatabaseHas('users', ['id' => $this->customerId, 'city' => 'Hà Nội']);

        $this->post('/account/preferences', [
            'dark_mode' => 1,
            'interactive_sound' => 1,
            'order_notifications' => 1,
        ])->assertRedirect();

        $preferences = json_decode(DB::table('users')->where('id', $this->customerId)->value('preferences'), true);
        $this->assertSame([
            'dark_mode' => true,
            'interactive_sound' => true,
            'promotional_notifications' => false,
            'order_notifications' => true,
        ], $preferences);

        $this->post('/account/logout-other-devices')->assertRedirect();
        $this->assertDatabaseHas('users', ['id' => $this->customerId, 'session_version' => 2]);

        $this->withSession([
            'customer' => ['id' => $this->customerId, 'user' => 'settings-user', 'role' => 0],
            'customer_session_version' => 1,
        ])->get('/')->assertRedirect('/login');
    }

    public function test_password_change_keeps_current_device_and_revokes_older_session_versions(): void
    {
        $this->withSession([
            'customer' => ['id' => $this->customerId, 'user' => 'settings-user', 'role' => 0],
            'customer_session_version' => 1,
        ])->post('/account/password', [
            'current_password' => 'initial-password',
            'password' => 'New-Secure-Password-2026',
            'password_confirmation' => 'New-Secure-Password-2026',
        ])->assertRedirect();

        $this->assertTrue(Hash::check(
            'New-Secure-Password-2026',
            DB::table('users')->where('id', $this->customerId)->value('pass')
        ));
        $this->assertDatabaseHas('users', ['id' => $this->customerId, 'session_version' => 2]);

        $this->get('/account/profile')->assertOk();
        $this->withSession([
            'customer' => ['id' => $this->customerId, 'user' => 'settings-user', 'role' => 0],
            'customer_session_version' => 1,
        ])->get('/')->assertRedirect('/login');
    }

    public function test_saved_theme_is_applied_to_other_client_pages(): void
    {
        $this->withSession([
            'customer' => ['id' => $this->customerId, 'user' => 'settings-user', 'role' => 0],
            'customer_session_version' => 1,
        ])->post('/account/preferences', [
            'dark_mode' => 1,
        ])->assertRedirect();

        $this->get('/about')
            ->assertOk()
            ->assertSee('data-account-theme="dark"', false)
            ->assertSee('css/site-theme.css');

        $this->post('/account/preferences', [
            'dark_mode' => 0,
        ])->assertRedirect();

        $this->get('/about')
            ->assertOk()
            ->assertSee('data-account-theme="light"', false);
    }
}

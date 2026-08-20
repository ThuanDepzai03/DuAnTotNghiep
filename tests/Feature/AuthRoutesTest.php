<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthRoutesTest extends TestCase
{
    public function test_admin_login_route_exists(): void
    {
        $this->assertNotNull(route('admin.login'));
    }

    public function test_client_login_route_exists(): void
    {
        $this->assertNotNull(route('login'));
    }
}

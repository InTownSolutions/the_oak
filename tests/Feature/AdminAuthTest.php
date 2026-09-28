<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    public function test_admin_redirects_to_login_when_guest(): void
    {
        $this->get('/admin')
            ->assertRedirect('/login');
    }

    public function test_login_and_register_pages_render(): void
    {
        $this->get('/login')->assertOk();
        $this->get('/register')->assertOk();
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCannotAccessAdmin()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)
            ->get('/admin')
            ->assertRedirect('home');
    }

    public function testAdminCanAccessAdmin()
    {
        $admin = factory(User::class)
            ->states('admin')
            ->create();
        $this->actingAs($admin)
            ->get('/admin')
            ->assertStatus(200);
    }
}

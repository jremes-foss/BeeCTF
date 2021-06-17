<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RedirectIfAuthenticatedTest extends TestCase
{
    use RefreshDatabase;

    public function testNotAuthenticated()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testAuthenticated()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');
    }
}

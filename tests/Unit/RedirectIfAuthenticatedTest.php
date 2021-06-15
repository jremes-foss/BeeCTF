<?php

namespace Tests\Unit;

use Tests\TestCase;

class RedirectIfAuthenticatedTest extends TestCase 
{
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

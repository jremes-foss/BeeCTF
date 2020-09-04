<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function testGetPing()
    {
        $response = $this->json('GET', 'api/ping');
        $response->assertStatus(200);
    }

    public function testPingPong() 
    {
        $response = $this->json('GET', 'api/ping');
        $response->assertSeeText('pong');
    }

    public function testGetCategoriesUnauthenticated()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->json('GET', 'api/categories');
        $response->assertStatus(401);
    }

    public function testGetCategoryAuthenticated()
    {
        
    }
}
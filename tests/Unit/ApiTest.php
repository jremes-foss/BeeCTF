<?php

namespace Tests\Unit;

use App\Category;
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
        $user = factory(\App\User::class)->create();
        $response = $this->json('GET', 'api/categories', [
            'api_token' => 'FOOBAR'
        ]);
        $response->assertStatus(200);
    }

    public function testCategoriesJSON()
    {
        factory(\App\User::class)->create();

        factory(\App\Category::class)->create([
            'category' => 'Test Category',
            'description' => 'This is a test category'
        ]);

        factory(\App\Category::class)->create([
            'category' => 'Test Category 2',
            'description' => 'This is a test category 2'
        ]);

        $response = $this->json('GET', 'api/categories', [
            'api_token' => 'FOOBAR'
        ]);

        $this->assertEquals('Test Category', $response[0]['category']);
        $this->assertEquals('This is a test category', $response[0]['description']);
        $this->assertEquals('Test Category 2', $response[1]['category']);
        $this->assertEquals('This is a test category 2', $response[1]['description']);
    }

    public function testChallengesJSON()
    {
        
    }

    public function testApiTokenRefresh()
    {
        $user = factory(\App\User::class)->create();
        $this->be($user);
        $response = $this->json('POST', 'settings/updateApiToken', [
            'api_token' => 'FOOBAR2'
        ]);
        $response->assertStatus(200);
    }

    public function testApiInterface()
    {
        $user = factory(\App\User::class)->create();
        $this->be($user);
        $response = $this->get('/settings');
        $response->assertStatus(200);
    }
}

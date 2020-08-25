<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function testGetCategories()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user)->get('/api/categories');
        $response->assertStatus(200);
    }
}
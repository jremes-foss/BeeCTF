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
        dd($user);
        $response = $this->json('GET', 'api/categories', ['Accept' => 'application/json']);
        dd($response);
        $response->assertStatus(200);
    }
}
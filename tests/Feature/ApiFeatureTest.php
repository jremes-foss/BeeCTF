<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tests the 404 exception for JSON API
     *
     * @return void
     */
    public function testAPINotFound()
    {
        $user = factory(\App\User::class, 1)->create();
        $response = $this->actingAs($user)->get('/api/foobar');
        $response->assertStatus(404);
    }
}

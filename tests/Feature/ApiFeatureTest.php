<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

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
        $user = factory(User::class, 1)->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->json('GET', '/api/foobar');
        $response->assertStatus(404);
        $response->assertSee('message');
    }
}

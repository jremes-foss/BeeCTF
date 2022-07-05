<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class StaticContentTest extends TestCase
{
    use RefreshDatabase;
    
    public function testStaticContentIndex()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/scontent');
        $response->assertStatus(200);
    }
}

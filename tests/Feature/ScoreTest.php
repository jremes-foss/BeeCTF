<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ScoreTest extends TestCase 
{
    use RefreshDatabase;

    public function testTeamScores()
    {
        $admin = factory(User::class)
            ->states('admin')
            ->create();

        $this->actingAs($admin)->get('/teamscoreboard')
            ->assertStatus(200)
            ->assertSee('Team');
    }
}
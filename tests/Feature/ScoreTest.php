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
        $this->get('/teamscoreboard')->assertStatus(200);
    }
}
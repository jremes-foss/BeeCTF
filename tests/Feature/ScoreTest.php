<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScoreTest extends TestCase 
{
    use RefreshDatabase;

    public function testTeamScores()
    {
        $user = factory(\App\User::class)->create();
    }
}
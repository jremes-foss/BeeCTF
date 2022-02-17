<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\ScoreController;
use App\Score;
use App\Challenge;
use App\User;
use App\Solved;

class ScoresTest extends TestCase
{
    use RefreshDatabase;

    public function testGetScoresPerPlayer()
    {
        $id = 1;
        $users = factory(\App\User::class, 1)->create();
        $solved = factory(\App\Solved::class, 1)->create();
        $challenge = factory(\App\Challenge::class, 1)->create();
        $challenges = new ScoreController();
        $score = $challenges->getScoresPerPlayer($id);
        $this->assertEquals(350, $score);
    }

    public function testGetScores()
    {
        $users = factory(\App\User::class, 1)->create();
        $scores = new ScoreController();
        $score = $scores->getScores();
        $this->assertEquals('object', gettype($score));
    }

    public function testGetTeamScores()
    {
        $user1 = factory(User::class, 1)->create();
        $user2 = factory(User::class, 1)->create();
        $challenge1 = factory(Challenge::class, 1)->create();
        $challenge2 = factory(Challenge::class, 1)->create();
        $solved1 = factory(Solved::class, 1)->create();
        $solved2 = factory(Solved::class, 1)->create();
        $teamscores = new ScoreController();
        $teamscore = $teamscores->getTeamScores();
        $this->assertEquals('object', $teamscore);
    }
}

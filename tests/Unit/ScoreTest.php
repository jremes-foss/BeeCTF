<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\ScoreController;
use App\Score;
use App\Challenge;
use App\User;
use App\Solved;
use App\Services\TeamService;

class ScoresTest extends TestCase
{
    use RefreshDatabase;

    public function testGetScoresPerPlayer()
    {
        $teamServiceMock = $this->createMock(TeamService::class);
        $id = 1;
        $users = factory(\App\User::class, 1)->create();
        $solved = factory(\App\Solved::class, 1)->create();
        $challenge = factory(\App\Challenge::class, 1)->create();
        $challenges = new ScoreController($teamServiceMock);
        $score = $challenges->getScoresPerPlayer($id);
        $this->assertEquals(350, $score);
    }

    public function testGetScores()
    {
        $teamServiceMock = $this->createMock(TeamService::class);
        $users = factory(\App\User::class, 1)->create();
        $scores = new ScoreController($teamServiceMock);
        $score = $scores->getScores();
        $this->assertEquals('object', gettype($score));
    }

    public function testGetTeamScores()
    {
        $teamServiceMock = $this->createMock(TeamService::class);
        $user = factory(User::class, 1)->create();
        $challenge = factory(Challenge::class, 1)->create();
        $solved = factory(Solved::class, 1)->create();
        $teamscores = new ScoreController($teamServiceMock);
        $teamscore = $teamscores->getTeamScores();
        $this->assertEquals('object', gettype($teamscore));
    }
}

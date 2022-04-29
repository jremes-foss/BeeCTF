<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\ApiController;
use App\User;
use App\Challenge;
use App\Category;
use App\Solved;
use App\Services\TeamService;
use App\TeamPlayer;
use App\Team;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function testGetPing()
    {
        $response = $this->json('GET', 'api/ping');
        $response->assertStatus(200);
    }

    public function testPingPong()
    {
        $response = $this->json('GET', 'api/ping');
        $response->assertSeeText('pong');
    }

    public function testGetCategoriesUnauthenticated()
    {
        $user = factory(User::class)->create();
        $response = $this->json('GET', 'api/categories');
        $response->assertStatus(401);
    }

    public function testGetCategoryAuthenticated()
    {
        $user = factory(User::class)->create();
        $response = $this->json('GET', 'api/categories', [
            'api_token' => 'FOOBAR'
        ]);
        $response->assertStatus(200);
    }

    public function testCategoriesJSON()
    {
        factory(User::class)->create();

        factory(Category::class)->create([
            'category' => 'Test Category',
            'description' => 'This is a test category'
        ]);

        factory(\App\Category::class)->create([
            'category' => 'Test Category 2',
            'description' => 'This is a test category 2'
        ]);

        $response = $this->json('GET', 'api/categories', [
            'api_token' => 'FOOBAR'
        ]);

        $this->assertEquals('Test Category', $response[0]['category']);
        $this->assertEquals('This is a test category', $response[0]['description']);
        $this->assertEquals('Test Category 2', $response[1]['category']);
        $this->assertEquals('This is a test category 2', $response[1]['description']);
    }

    public function testChallengesJSON()
    {
        factory(\App\User::class)->create();

        factory(\App\Challenge::class)->create([
            'score' => '250',
            'title' => 'TEST',
            'flag' => 'FLAG{th1s_1s_4_t3st}',
            'content' => 'This is a test.'
        ]);

        $response = $this->json('GET', 'api/challenges', [
            'api_token' => 'FOOBAR'
        ]);

        $this->assertEquals('250', $response[0]['score']);
        $this->assertEquals('TEST', $response[0]['title']);
    }

    public function testScorePerPlayerJSON()
    {
        $id = 1;
        $teamServiceMock = $this->createMock(TeamService::class);
        factory(\App\User::class, 1)->create();
        factory(\App\Solved::class, 1)->create();
        factory(\App\Challenge::class, 1)->create();
        $challenges = new ApiController($teamServiceMock);
        $score = $challenges->getScoresPerPlayer($id);
        $this->assertEquals(350, $score);
    }

    public function testGetScoreBoardJSON()
    {
        $teamServiceMock = $this->createMock(TeamService::class);
        factory(User::class, 1)->create();
        $scores = new ApiController($teamServiceMock);
        $score = $scores->getScoreBoard();
        $this->assertEquals('object', gettype($score));
    }

    public function testApiTokenRefresh()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $response = $this->json('POST', 'settings/updateApiToken', [
            'api_token' => 'FOOBAR2'
        ]);
        $response->assertStatus(200);
    }

    public function testApiInterface()
    {
        $user = factory(\App\User::class)->create();
        $this->be($user);
        $response = $this->get('/settings');
        $response->assertStatus(200);
    }

    public function testGetTeams()
    {
        $teamServiceMock = $this->createMock(TeamService::class);
        factory(\App\Team::class)->create();
        $teamsController = new ApiController($teamServiceMock);
        $teams = $teamsController->getTeams();
        $this->assertEquals('array', gettype($teams));
    }

    public function testGetTeamScore()
    {
        $teamServiceMock = $this->createMock(TeamService::class);
        factory(User::class)->create();
        factory(Challenge::class, 1)->create();
        factory(Solved::class, 1)->create();
        factory(Team::class, 1)->create();
        factory(TeamPlayer::class, 1)->create();
        $teamscores = new ApiController($teamServiceMock);
        $teamscore = $teamscores->getTeamScores();
        $this->assertEquals('array', gettype($teamscore));
    }
}

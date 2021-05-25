<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\ApiController;

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
        $user = factory(\App\User::class)->create();
        $response = $this->json('GET', 'api/categories');
        $response->assertStatus(401);
    }

    public function testGetCategoryAuthenticated()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->json('GET', 'api/categories', [
            'api_token' => 'FOOBAR'
        ]);
        $response->assertStatus(200);
    }

    public function testCategoriesJSON()
    {
        factory(\App\User::class)->create();

        factory(\App\Category::class)->create([
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
        factory(\App\User::class, 1)->create();
        factory(\App\Solved::class, 1)->create();
        factory(\App\Challenge::class, 1)->create();
        $challenges = new ApiController();
        $score = $challenges->getScoresPerPlayer($id);
        $this->assertEquals(350, $score);
    }

    public function testGetScoreBoardJSON()
    {
        factory(\App\User::class, 1)->create();
        $scores = new ApiController();
        $score = $scores->getScoreBoard();
        $this->assertEquals('object', gettype($score));
    }

    public function testApiTokenRefresh()
    {
        $user = factory(\App\User::class)->create();
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
        $user = factory(\App\User::class)->create();
        $scores = new ApiController();
    }
}

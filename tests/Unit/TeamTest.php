<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\TeamPlayer;
use App\User;
use App\Team;
use Tests\TestCase;

class TeamTest extends TestCase
{
    use RefreshDatabase;
    
    protected $teamService;

    public function testGetTeamPlayers()
    {
        $admin = factory(User::class)
            ->states('admin')
            ->create();

        factory(User::class)->create();
        factory(Team::class)->create();
        factory(TeamPlayer::class)->create();

        $team_id = 1;
        
        $team_players = app('App\Services\TeamService')->getTeamPlayers($team_id);
        $this->assertEquals(1, count($team_players));
    }

    public function testIndexAdmin()
    {
        $admin = factory(User::class)
            ->states('admin')
            ->create();
        $response = $this->actingAs($admin)->get('admin/teams');
        $response->assertStatus(200);
    }

    public function testIndex()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/teams');
        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        factory(\App\Team::class)->create([
            'name' => 'Test Team',
        ]);

        $response = $this->actingAs($admin)->get('admin/teams/1/edit');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        $data = [
            'inputTeam' => 'Test Team'
        ];

        $response = $this->actingAs($admin)->post('admin/teams/create', $data);
        $response->assertStatus(302);
    }

    public function testUpdate()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        factory(\App\Team::class)->create([
            'name' => 'T3stT34m'
        ]);

        $data = [
            'inputName' => 'T3stT34m2'
        ];

        $response = $this->actingAs($admin)->post('admin/teams/1/update', $data);
        $response->assertStatus(302);
    }

    public function testCreate()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();
        $response = $this->actingAs($admin)->get('admin/teams/create');
        $response->assertStatus(200);
    }
}

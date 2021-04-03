<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\TeamService;
use Tests\TestCase;

class TeamTest extends TestCase 
{
    use RefreshDatabase;
    
    protected $teamService;

    // public function __construct(TeamService $teamService)
    // {
    //     $this->teamService = $teamService;
    // }

    public function testGetTeamPlayers()
    {
        // TODO
    }

    public function testIndex()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();
        $response = $this->actingAs($admin)->get('admin/teams');
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
}
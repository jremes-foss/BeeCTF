<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Challenge;
use App\Solved;
use App\Team;
use App\TeamPlayer;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testDefaultUserIsNotAdmin()
    {
        $user = factory(\App\User::class)->create();
        $this->assertFalse($user->isAdmin());
    }

    public function testAdminUserIsAnAdmin()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();
        $this->assertTrue($admin->isAdmin());
    }

    public function testAdminViewUsers()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        $response = $this->actingAs($admin)->get('admin/users');
        $response->assertStatus(200);
    }

    public function testAdminEditUsers()
    {
        $user = factory(\App\User::class)->create();

        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        $response = $this->actingAs($admin)->get('admin/users/1/edit');
        $response->assertStatus(200);
    }

    public function testAdminUpdateUsers()
    {
        $user = factory(\App\User::class)->create();
        $team = factory(Team::class)->create();
        $team_player = factory(TeamPlayer::class)->create();

        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        $data = [
            'inputName' => 'Test Users',
            'inputEmail' => 'testuser@hackerman.com',
            'inputTeam' => 1
        ];

        $response = $this->actingAs($admin)->post('admin/users/1/update', $data);
        $response->assertStatus(302);
    }

    public function testAdminUpdateUserChangeTeam()
    {
        $user = factory(User::class)->create();
        $team = factory(Team::class)->create();
        $update_team = factory(Team::class)->create();
        $team_player = factory(TeamPlayer::class)->create();
    }

    public function testAdminDeleteUsers()
    {
        $user = factory(User::class)->create();
        $challenge = factory(Challenge::class)->create();
        $solved = factory(Solved::class)->create();

        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        $response = $this->actingAs($admin)->get('admin/users/1/delete');
        $response->assertStatus(302);
    }

    public function testUserApiToken()
    {
        $user = factory(\App\User::class)->create();
        $this->assertEquals('FOOBAR', $user->api_token);
    }
}

<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Team;
use App\TeamPlayer;

class TeamPlayerTest extends TestCase
{
    use RefreshDatabase;

    public function testModel()
    {
        $player = factory(User::class)->create();

        $team = factory(Team::class)->create([
            'name' => 'TestT3am',
        ]);

        $team_player = factory(TeamPlayer::class)->create([
            'player_id' => 1,
            'team_id' => 1
        ]);

        // Test ID relationship
        $this->assertNotNull($team_player->player_id);
        $this->assertEquals($player->id, $team_player->player_id);
        $this->assertEquals($team->id, $team_player->team_id);
    }

    public function testPlayersRelationship()
    {
        $player = factory(User::class)->create();

        $team = factory(Team::class)->create([
            'name' => 'TestT3am',
        ]);

        $team_player = factory(TeamPlayer::class)->create([
            'player_id' => 1,
            'team_id' => 1
        ]);

        $this->assertNotNull($team_player->players);
    }
}
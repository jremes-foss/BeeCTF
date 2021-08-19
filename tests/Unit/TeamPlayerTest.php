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

        $player_test = User::find($player->id);
        $team_player_test = TeamPlayer::find($team_player->id);

        // Test ID relationship
        $this->assertNotNull($team_player_test);
        $this->assertEquals($player->id, $team_player_test->player_id);
        $this->assertEquals(1, $team_player_test->team_id);
    }
}
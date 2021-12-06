<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Team;
use App\TeamPlayer;

class TeamService
{
    public function getTeamPlayers($team_id)
    {
        $users = DB::table('users')
            ->join('player_team', 'users.id', '=', 'player_team.player_id')
            ->where('player_team.team_id', $team_id)
            ->get();
        return $users;
    }

    public function getTeamScores()
    {
        $teams = Team::all();
        $team_ids = [];
        $team_players = [];

        foreach ($teams as $team) {
            $teamid = $team->id;
            array_push($team_ids, $teamid);
        }

        foreach ($team_ids as $team_id) {
            $team_players = TeamPlayer::where('team_id', $team_id)->get();
        }
    }
}

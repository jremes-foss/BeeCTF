<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Team;

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
    }
}

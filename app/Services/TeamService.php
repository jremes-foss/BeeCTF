<?php

namespace App\Services;

use App\Team;
use App\TeamPlayer;
use App\User;

class TeamService 
{
    public function getTeams()
    {
        $teams = Team::all();
        return $teams;
    }

    public function getTeamPlayers($team)
    {
        $users = User::where('user_type', 'User')
            ->join('player_team', 'id', '=', 'player_id')
            ->where('player_team.team_id', $team)
            ->get();
        return $users;
    }
}
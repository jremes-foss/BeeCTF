<?php

namespace App\Services;

use App\User;

class TeamService 
{
    public function getTeamPlayers($team)
    {
        $users = User::where('user_type', 'User')
            ->join('player_team', 'users.id', '=', 'player_team.player_id')
            ->where('player_team.team_id', $team)
            ->get();
        return $users;
    }
}
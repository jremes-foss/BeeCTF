<?php

namespace App\Services;

use App\Team;
use App\TeamPlayer;
use App\User;

class TeamService 
{
    public function getTeamPlayers($team)
    {
        $users = User::where('user_type', 'User')->get();
        return $users;
    }
}
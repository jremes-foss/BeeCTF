<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

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

    public function getTeamScore($team_id)
    {
        $score = DB::table('player_team')
            ->join('solved_challenges', 'solved_challenges.user_id', '=', 'player_team.player_id')
            ->join('challenges', 'challenges.id', '=', 'solved_challenges.challenge_id')
            ->where('player_team.team_id', '=', $team_id)
            ->get();
        
        return $score;
    }
}

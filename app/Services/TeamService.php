<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Team;
use App\TeamPlayer;
use App\User;
use App\Score;
use App\Solved;

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
        // raw sql
        // select distinct(challenge_id), sum(score) from player_team pt inner join solved_challenges sc on sc.user_id = pt.player_id inner join challenges c on c.id = sc.challenge_id where pt.team_id = 1;

        $score = DB::table('player_team')
            ->join('solved_challenges', 'solved_challenges.user_id', '=', 'player_team.player_id')
            ->get();

        // foreach ($teams as $team) {
        //     $teamid = $team->id;
        //     array_push($team_ids, $teamid);
        // }

        // foreach ($team_ids as $team_id) {
        //     $tp_get = TeamPlayer::where('team_id', $team_id)->get();
        //     array_push($team_players, $tp_get);
        // }

        // foreach ($team_players as $team_player) {
        //     $player_id = $team_player->player_id;
        //     $solved_challenges = Score::where('user_id', $player_id)
        //         ->get()
        //         ->unique('challenge_id');
        //     array_push($solved, $solved_challenges);
        // }

        // foreach ($solved_challenges as $challenge) {
        // }
    }
}

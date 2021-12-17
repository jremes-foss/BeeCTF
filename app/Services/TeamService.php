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
            $tp_get = TeamPlayer::where('team_id', $team_id)->get();
            array_push($team_players, $tp_get);
        }

        foreach ($team_players as $team_player) {
            $player_id = $team_player->player_id;
            $solved = Score::where('user_id', $player_id)->get();
        }
    }
}

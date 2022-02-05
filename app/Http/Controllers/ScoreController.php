<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Solved;
use App\Team;
use App\User;
use App\Services\TeamService;

class ScoreController extends Controller
{

    protected $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    /**
     *  Calculates the score for each individual player.
     *
     *  @return integer
     */
    public function getScoresPerPlayer($id)
    {
        $score = 0;

        $solutions = Solved::where('user_id', $id)->get([
            'challenge_id',
            'user_id'
        ]);

        foreach ($solutions as $solution) {
            $points = Challenge::where('id', $solution['challenge_id'])->get();
            foreach ($points as $point) {
                $score += $point->score;
            }
        }

        return $score;
    }

    /**
     * Gets the player scores.
     *
     *  @return array
     */
    public function getScores()
    {
        $users = User::where('user_type', 'User')->get([
            'id', 'name'
        ]);

        $score_array = [];

        foreach ($users as $user) {
            $score = $this->getScoresPerPlayer($user->id);
            $id = $user->id;
            $name = $user->name;
            $temp_array = array(
                'id' => $id,
                'name' => $name,
                'score' => $score
            );
            array_push($score_array, $temp_array);
        }
        $score_collection = collect($score_array);
        $score_sorted = $score_collection->sortByDesc('score');

        return view('scoreboard')->with('scores', $score_sorted);
    }

   /**
     * Gets the team scores.
     *
     *  @return array
     */
    public function getTeamScores()
    {
        $teams = Team::all();
        $team_score = [];

        foreach ($teams as $team) {
            $team_score['name'] = $team['name'];
            array_push($team_score, $this->teamService->getTeamScore($team->id));
        }

        return view('teamscoreboard')->with('teamscore', $team_score);
    }
}

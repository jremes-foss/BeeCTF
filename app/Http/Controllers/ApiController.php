<?php

namespace App\Http\Controllers;

use App\Category;
use App\Challenge;
use App\Solved;
use App\User;
use App\Team;
use App\Services\TeamService;

class ApiController extends Controller
{
    protected $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    /**
     * Return all categories in JSON format
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories()
    {
        $categoriesArray = [];
        $categories = Category::all();

        foreach ($categories as $key => $category) {
            $categoriesArray[$key]['category'] = $category->category;
            $categoriesArray[$key]['description'] = $category->description;
        }

        return $categoriesArray;
    }

    public function getChallenges()
    {
        $challengesArray = [];
        $challenges = Challenge::all();

        foreach ($challenges as $key => $challenge) {
            $challengesArray[$key]['score'] = $challenge->score;
            $challengesArray[$key]['title'] = $challenge->title;
        }

        return $challengesArray;
    }

    /**
     * Fetches the scoreboard in JSON format.
     *
     * @return \Illuminate\Http\Response
     */
    public function getScoreBoard()
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
                'name' => $name,
                'score' => $score
            );
            array_push($score_array, $temp_array);
        }
        $score_collection = collect($score_array);
        $score_sorted = $score_collection->sortByDesc('score');

        return $score_sorted;
    }

    /**
     * Fetches the scores per player in JSON format.
     *
     * @return \Illuminate\Http\Response
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
     * Pings the application as a health check.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPing()
    {
        return response()->json([
            'message' => 'pong'
        ]);
    }

    /**
     * Returns the team list.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTeams()
    {
        $teams_array = [];
        $teams = Team::all();

        foreach ($teams as $key => $team) {
            $teams_array[$key]['name'] = $team->name;
        }

        return $teams_array;
    }

    public function getTeamScores()
    {
        $teams = Team::all();
        $team_score = [];

        foreach ($teams as $key => $team) {
            $score = $this->teamService->getTeamScore($team->id);
            $name = $team->name;
            $team_score[$key]['name'] = $name;
            $team_score[$key]['score'] = $score;
        }

        return $team_score;
    }

    /**
     * Fetches the number of challenges solved per player.
     * Returns results per array, expects current user id.
     * 
     * @return array
     */
    public function getNumberSolvedPerPlayer($id)
    {
        $number_solved = [];

        $solutions = Solved::where('user_id', $id)->get([
            'challenge_id',
            'user_id'
        ]);

        $number_solved['solved'] = $solutions->count();

        return $number_solved;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Score;
use App\Solved;
use App\User;

class ScoreController extends Controller
{
    /**
     *	Calculates the score for each individual player.
     *
     *	@return integer
     */
    public function getScoresPerPlayer($id) {
    	$score = 0;
    	$solutions = Solved::where('user_id', $id)->get([
    		'challenge_id',
    		'user_id'
    	]);

    	foreach($solutions as $solution) {
	    	$points = Challenge::where('id', $solution['challenge_id'])->get();
            
            foreach($points as $point) {
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
    public function getScores() {
    	$users = User::where('user_type', 'User')->get([
    		'id', 'name'
    	]);

    	$score_array = [];

    	foreach($users as $user) {
    		$score = $this->getScoresPerPlayer($user->id);
    		$id = $user->id;
            $temp_array = array(
                'id' => $id,
                'score' => $score
            );
            array_push($score_array, $temp_array);
    	}
        $score_collection = collect($score_array);
        $score_sorted = $score_collection->sortBy('score');

        return view('scoreboard')->with('scores', $score_sorted);
    }
}

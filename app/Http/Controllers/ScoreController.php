<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Score;
use App\Solved;

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
	    	$points = Challenge::where('challenge_id', $solution['challenge_id']);
	    	$score += $points;
    	}

    	return $score;
    }

    /**
     * Gets the player scores.
     *
     */
    public function getScores() {
    	$users = User::where('user_type', 'User')->get([
    		'id', 'name'
    	]);

    	$score_array = [];
    	// Figure this out.
    	foreach($users as $user) {
    		$score = $this->getScoresPerPlayer($user->id);
    		$id = $user->id;
    	}
    }
}

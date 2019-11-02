<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solved;
use App\Score;

class ScoreController extends Controller
{
    /**
     * Calculates the score for each individual player.
     *
     */
    public function getScoresPerPlayer($id) {

    }

    /**
     * Gets the player scores.
     *
     */
    public function getScores() {
    	// TODO
    }

    /**
     * Gets the number of solved challenges per player.
     *
     */
    public function getSolveds() {
    	// TODO
    }
}

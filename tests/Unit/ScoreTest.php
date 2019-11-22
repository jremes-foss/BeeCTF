<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\ScoreController;
use App\Score;
use App\Challenge;

class ScoresTest extends TestCase {

	use RefreshDatabase;

	public function testGetScoresPerPlayer()
	{
		$id = 1;
		$users = factory(\App\User::class, 1)->create();
		$solved = factory(\App\Solved::class, 1)->create();
		$challenge = factory(\App\Challenge::class, 1)->create();
		$challenges = new ScoreController();
		$score = $challenges->getScoresPerPlayer($id);
		$this->assertEquals(350, $score);
	}
}
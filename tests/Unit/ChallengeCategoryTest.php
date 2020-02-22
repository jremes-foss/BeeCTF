<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Category;
use App\Challenge;
use App\ChallengeCategory;

class ChallengeCategoryTest extends TestCase
{
	use RefreshDatabase;

	public function testChallengeCategoryRelationship()
	{
		$challenge = factory(Challenge::class)->make([
			'category' => 'Crypto'
		]);

		$category = $challenge->category;

		$challenge_category = factory(ChallengeCategory::class)->make([
			'category_id' => 1,
			'challenge_id' => 1
		]);

		$challenge_category = $challenge->challenge_category;

		$this->assertEquals('Crypto', $category);
		$this->assertEquals(1, $challenge_category);
	}
}
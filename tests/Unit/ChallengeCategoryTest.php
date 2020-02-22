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
		$challenge = factory(Challenge::class)->create([
			'score' => '250',
			'title' => 'TEST',
			'flag' => 'FLAG{th1s_1s_4_t3stSt}',
			'content' => 'This is a test.'
		]);

		$category = factory(Category::class)->create([
			'category' => 'Crypto'
		]);

		$challenge_category = factory(ChallengeCategory::class)->create([
			'category_id' => 1,
			'challenge_id' => 1
		]);

		$challenge = Challenge::find(1);

		$this->assertEquals(1, $challenge->challenge_categories->challenge_id);
		$this->assertEquals(1, $challenge->challenge_categories->category_id);
		$this->assertEquals('Crypto', $challenge->challenge_categories->categories->category);
	}
}
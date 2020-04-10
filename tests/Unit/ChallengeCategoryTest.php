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
            'flag' => 'FLAG{th1s_1s_4_t3st}',
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
        $challenge_category = ChallengeCategory::find(1);

        $this->assertEquals(1, $challenge->challengeCategories->challenge_id);
        $this->assertEquals(1, $challenge->challengeCategories->category_id);

        // Test categories relationship
        $this->assertEquals('Crypto', $challenge->challengeCategories->categories->category);

        // Test challenges relationship
        $this->assertEquals(250, $challenge_category->challenges->score);
        $this->assertEquals('TEST', $challenge_category->challenges->title);
        $this->assertEquals('FLAG{th1s_1s_4_t3st}', $challenge_category->challenges->flag);
        $this->assertEquals('This is a test.', $challenge_category->challenges->content);
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Category;
use App\Challenge;

class CategoriesTest extends TestCase
{
    use RefreshDatabase;

    public function testChallengesRelationship()
    {
        $challenge = factory(Challenge::class)->make([
            'category' => 'Crypto'
        ]);

        $category = $challenge->category;

        $this->assertEquals('Crypto', $category);
    }

    public function testHasMany()
    {
        factory(\App\Challenge::class)->create([
            'score' => '250',
            'title' => 'TEST',
            'flag' => 'FLAG{th1s_1s_4_t3stSt}',
            'content' => 'This is a test.'
        ]);

        factory(\App\Category::class)->create([
            'category' => 'Test Category',
            'description' => 'This is a test category'
        ]);

        $category = new Category();
        $challenges = $category->challenges();
        $this->assertEquals('object', gettype($challenges));
    }

    public function testIndex()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();
        $response = $this->actingAs($admin)->get('admin/categories');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();
        $response = $this->actingAs($admin)->get('admin/categories/create');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        $data = [
            'inputCategory' => 'Crypto',
            'inputDescription' => 'Cryptography-related challenges'
        ];

        $response = $this->actingAs($admin)->post('admin/categories/create', $data);
        $response->assertStatus(302);
    }

    public function testEdit()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        factory(\App\Category::class)->create([
            'category' => 'Test Category',
            'description' => 'This is a test category'
        ]);

        $response = $this->actingAs($admin)->get('admin/categories/1/edit');
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        factory(\App\Category::class)->create([
            'category' => 'Test Category',
            'description' => 'This is a test category'
        ]);

        $data = [
            'inputCategory' => 'Steganography',
            'inputDescription' => 'This is updated test category.'
        ];

        $response = $this->actingAs($admin)->post('admin/categories/1/update', $data);
        $response->assertStatus(302);
    }

    public function testDestroy()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        factory(\App\Category::class)->create([
            'category' => 'Test Category',
            'description' => 'This is a test category'
        ]);

        $response = $this->actingAs($admin)->get('admin/categories/1/delete');
        $response->assertStatus(302);
    }
}

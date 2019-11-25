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

	public function testIndex() 
	{
		$response = $this->get('admin/categories');
		$response->assertStatus(200);
	}

	public function testCreate()
	{
		$response = $this->get('admin/categories/create');
		$response->assertStatus(200);
	}

	public function testStore()
	{
		$data = [
			'inputCategory' => 'Crypto',
			'inputDescription' => 'Cryptography-related challenges'
		];

		$response = $this->post('admin/categories/create', $data);
		$response->assertStatus(302);
	}

	public function testEdit() 
	{
		factory(\App\Category::class)->create([
	        'category' => 'Test Category',
    	    'description' => 'This is a test category'
		]);

		$response = $this->get('admin/categories/1/edit');
		$response->assertStatus(200);
	}
}
<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Category;

class CategoriesTest extends TestCase
{
	use RefreshDatabase;

	public function testChallengesRelationship()
	{
		// TODO
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
}
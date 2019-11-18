<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChallengesTest extends TestCase
{
	use RefreshDatabase;
	
	// Refactor to Feature Tests
	public function testAdminSidebarWorks()
	{
		$admin = factory(\App\User::class)
			->states('admin')
			->create();
		
		$response = $this->actingAs($admin)->get('/admin');
		$response->assertSee('/admin/challenges');
	}

	// Refactor to Feature Tests
	public function testAdminChallengesClickThrough()
	{
		$admin = factory(\App\User::class)
			->states('admin')
			->create();
		
		$response = $this->actingAs($admin)->get('/admin/challenges');
		$response->assertSee('Category');
		$response->assertSee('Score');
		$response->assertSee('Title');
		$response->assertSee('Flag');
		$response->assertSee('Content');
	}

	public function testStore() 
	{
		$data = [
			'inputCategory' => 'Crypto',
			'inputTitle' => 250,
			'inputScore' => 'Weak Cipher',
			'inputFlag' => 'FLAG{th1s_1s_4_t3st}',
			'inputContent' => 'Can you break this weak cipher?'
		];

		$response = $this->post('admin/challenges/create', $data);
		$response->assertStatus(302);
	}

	public function testCreate()
	{
		$response = $this->get('admin/challenges/create');
		$response->assertStatus(200);
	}

	public function testIndexAdmin()
	{
		$response = $this->get('admin/challenges');
		$response->assertStatus(200);
	}

	public function testIndexUser()
	{
		$response = $this->get('/challenges');
		$response->assertStatus(200);
	}
}

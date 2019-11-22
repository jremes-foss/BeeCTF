<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChallengesTest extends TestCase {

	use RefreshDatabase;

	public function testAdminSidebarWorks()
	{
		$admin = factory(\App\User::class)
			->states('admin')
			->create();
		
		$response = $this->actingAs($admin)->get('/admin');
		$response->assertSee('/admin/challenges');
	}

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
}
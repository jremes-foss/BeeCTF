<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
	use RefreshDatabase;

	public function testUserCannotAccessAdmin()
	{
		$user = factory(\App\User::class)->create();
		$this->actingAs($user)
			->get('/admin')
			->assertRedirect('home');
	}

	public function testAdminCanAccessAdmin()
	{
		$admin = factory(\App\User::class)
			->states('admin')
			->create();

		$this->actingAs('admin')
			->get('/admin')
			->assertStatus(200);
	}
}

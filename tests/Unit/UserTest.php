<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

	use RefreshDatabase;

    public function testDefaultUserIsNotAdmin()
    {
    	$user = factory(\App\User::class)->create();
    	$this->assertFalse($user->isAdmin());
    }

    public function testAdminUserIsAnAdmin()
    {
    	$admin = factory(\App\User::class)
    		->states('admin')
    		->create();
    	$this->assertTrue($admin->isAdmin());
    }
}

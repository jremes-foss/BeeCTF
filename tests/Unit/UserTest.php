<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function testDefaultUserIsNotAdmin()
    {
    	$user = factory(User::class)->create();
    	$this->assertFalse($user->isAdmin());
    }

    public function testAdminUserIsAnAdmin()
    {
    	$admin = factory(User::class)
    		->states('admin')
    		->create();
    	$this->assertTrue(isAdmin());
    }
}

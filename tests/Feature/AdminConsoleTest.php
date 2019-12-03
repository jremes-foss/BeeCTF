<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Artisan;

class AdminConsoleTest extends TestCase
{
	public function testAdminConsoleCommandExists()
	{
		$this->assertTrue(class_exists(\App\Console\Commands\CreateAdministrator::class));
	}

	public function testRunAdminConsoleCommandNoInteraction()
	{
		$cmd = Artisan::call('user:create-admin', ['--no-interaction' => true]);
		$this->assertEquals(0, $cmd);
	}
}

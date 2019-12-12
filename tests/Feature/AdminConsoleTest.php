<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminConsoleTest extends TestCase
{
	use WithFaker;
	use RefreshDatabase;

	public function testAdminConsoleCommandExists()
	{
		$this->assertTrue(class_exists(\App\Console\Commands\CreateAdministrator::class));
	}

	public function testRunAdminConsoleCommand() 
	{
		$email = $this->faker->email;
		$password = $this->faker->password(8);

		$this->artisan('user:create-admin')
			->expectsOutput("*** BeeCTF Artisan Admin Creator ***")
			->expectsOutput("[!] This command allows you to create admin user to database.")
			->expectsQuestion("[?] Are you sure you wish to continue?", true)
			->expectsQuestion("[?] Enter username", 'h4cker')
			->expectsQuestion("[?] Enter email", $email)
			->expectsQuestion("[?] Enter password", $password)
			->expectsOutput("[!] Administrative user has been created.")
			->assertExitCode(0);

		$this->assertDatabaseHas('users', [
			'email' => $email
		]);
	}

	public function testRunAdminConsoleCommandWithInvalidEmail()
	{
		$email = "ThisIsNotAnEmailAddress";
		$password = $this->faker->password(8);

		$this->artisan('user:create-admin')
			->expectsOutput("*** BeeCTF Artisan Admin Creator ***")
			->expectsOutput("[!] This command allows you to create admin user to database.")
			->expectsQuestion("[?] Are you sure you wish to continue?", true)
			->expectsQuestion("[?] Enter username", 'h4cker')
			->expectsQuestion("[?] Enter email", $email)
			->expectsQuestion("[?] Enter password", $password)
			->expectsOutput("[!] Administrator not created. Please see error messages below: ")
			->assertExitCode(1);
	}
}

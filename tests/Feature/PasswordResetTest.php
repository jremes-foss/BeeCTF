<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PasswordResetTest extends TestCase
{
	use RefreshDatabase;

	public function testPasswordResetRequestForm()
    {
        $response = $this->get('password/reset');
        $response->assertStatus(200);
    }

    public function testSendsPasswordResetEmail()
    {
		$user = factory(User::class)->create();
		$this->expectsNotification($user, ResetPassword::class);
		$response = $this->post('password/email', ['email' => $user->email]);
		$response->assertStatus(302);
    }

	public function testDoesNotSendPasswordResetEmail()
	{
		$this->doesntExpectJobs(ResetPassword::class);
		$this->post('password/email', ['email' => 'invalid@email.com']);
	}

	public function testChangesUsersPassword()
	{
		$user = factory(User::class)->create();
		$token = Password::createToken($user);
		$response = $this->post('/password/reset', [
			'token' => $token,
			'email' => $user->email,
			'password' => 'p4ssw0rd',
			'password_confirmation' => 'p4ssw0rd'
		]);
		
		$this->assertTrue(Hash::check('p4ssw0rd', $user->fresh()->password));
	}
}

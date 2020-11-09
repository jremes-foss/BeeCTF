<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function testShowMainPage()
    {
        $response = $this->get('/home');
        $response->assertStatus(302);
    }

    public function testLoginFormDisplayed()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testLoginWithValidUser()
    {
        $user = factory(User::class)->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
    }

    public function testInvalidUser()
    {
        $invalidUser = factory(User::class)->create();

        $response = $this->post('/login', [
            'email' => $invalidUser->email,
            'password' => 'th1s1s1nv4l1dp4ssw0rd!'
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
    }

    public function testLogout()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/logout');
        $response->assertStatus(302);
        $this->assertGuest();
    }

    /**
     *  Tests that user is redirected to home page after login.
     */
    public function testHome()
    {
        $user = factory(User::class)->create();
        $response = $this->followingRedirects()->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);
        $response->assertStatus(200);
    }
}

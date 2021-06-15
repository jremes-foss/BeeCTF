<?php

namespace Tests\Unit;

use Mockery as m;
use Tests\TestCase;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\RedirectResponse;

class RedirectIfAuthenticatedTest extends TestCase 
{
    private $authManager;

    public function setUp(): void
    {
        parent::setUp();
        $this->authManager = m::mock(AuthManager::class);
    }

    public function testRedirectIfAuthenticated()
    {
        // TODO
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;

class RedirectIfAuthenticatedTest extends TestCase 
{
    public function testNotAuthenticated()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Providers\BroadcastServiceProvider;

class BroadcastTest extends TestCase
{
    public function testBootFunction()
    {
        $provider = new BroadcastServiceProvider($this->app);
        $this->assertNull($provider->boot());
    }
}
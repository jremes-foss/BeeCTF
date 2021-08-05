<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamPlayerTest extends TestCase
{
    use RefreshDatabase;

    public function testPlayers()
    {
        $team = factory(Team::class)->create([
            'name' => 'TestT3am',
        ]);
    }
}
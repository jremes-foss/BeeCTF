<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeamTest extends TestCase 
{
    use RefreshDatabase;

    public function testIndex()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();
        $response = $this->actingAs($admin)->get('admin/teams');
        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        factory(\App\Category::class)->create([
            'name' => 'Test Team',
        ]);

        $response = $this->actingAs($admin)->get('admin/categories/1/edit');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        $data = [
            'name' => 'Test Team'
        ];
    }
}
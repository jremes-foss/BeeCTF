<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Announcement;

class AnnouncementsTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('announcements');
        $response->assertStatus(200);
    }

    public function testIndexAdmin()
    {
        $admin = factory(User::class)
            ->states('admin')
            ->create();
        $response = $this->actingAs($admin)->get('admin/announcements');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $admin = factory(User::class)
            ->states('admin')
            ->create();
        $response = $this->actingAs($admin)->get('admin/announcements/create');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'inputTitle' => 'Test Announcement',
            'inputContent' => 'th1s_1s_4_t3st'
        ];

        $admin = factory(User::class)
            ->states('admin')
            ->create();

        $response = $this->actingAs($admin)->post('admin/announcements/create', $data);
        $response->assertStatus(302);
    }

    public function testEdit()
    {
        factory(Announcement::class)->create([
            'title' => 'Test Title',
            'content' => 'This is a test announcement'
        ]);

        $admin = factory(User::class)
            ->states('admin')
            ->create();

        $response = $this->actingAs($admin)->get('admin/announcements/1/edit');
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        factory(Announcement::class)->create([
            'title' => 'Test Title',
            'content' => 'This is a test announcement'
        ]);

        $admin = factory(User::class)
            ->states('admin')
            ->create();

        $data = [
            'inputTitle' => 'Another Test Title',
            'inputContent' => 'Another test announcement'
        ];

        $response = $this->actingAs($admin)->post('admin/announcements/1/update', $data);
        $response->assertStatus(302);
    }

    public function testDestroy()
    {
        factory(Announcement::class)->create([
            'title' => 'Test Title',
            'content' => 'This is a test announcement'
        ]);

        $admin = factory(User::class)
            ->states('admin')
            ->create();

        $response = $this->actingAs($admin)->get('admin/announcements/1/delete');
        $response->assertStatus(302);
    }
}

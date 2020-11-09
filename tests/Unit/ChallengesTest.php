<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use App\Category;
use App\Challenge;
use App\Attachment;
use App\User;

class ChallengesTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        factory(\App\Category::class)->create([
            'category' => 'Test Category',
            'description' => 'This is a test category'
        ]);

        $data = [
            'inputCategory' => 'Test Category',
            'inputTitle' => 250,
            'inputScore' => 'Weak Cipher',
            'inputFlag' => 'FLAG{th1s_1s_4_t3st}',
            'inputContent' => 'Can you break this weak cipher?',
            'inputURL' => 'http://127.0.0.1:1337/index.php',
            'inputFile' => UploadedFile::fake()->image('test_file.jpg')
        ];

        $response = $this->actingAs($admin)->post('admin/challenges/create', $data);
        $response->assertStatus(302);

        // Test the download function here.
        $response = $this->get('/challenges/1/download');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        $response = $this->actingAs($admin)->get('admin/challenges/create');
        $response->assertStatus(200);
    }

    public function testIndexAdmin()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        $response = $this->actingAs($admin)->get('admin/challenges');
        $response->assertStatus(200);
    }

    public function testIndexUser()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user)->get('/challenges');
        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        $category = factory(\App\Category::class)->create([
            'category' => 'Test Category',
            'description' => 'This is a test category'
        ]);

        $challenge = factory(\App\Challenge::class)->create([
            'score' => '250',
            'title' => 'TEST',
            'flag' => 'FLAG{th1s_1s_4_t3stSt}',
            'content' => 'This is a test.'
        ]);

        factory(\App\ChallengeCategory::class)->create([
            'category_id' => $category->id,
            'challenge_id' => $challenge->id
        ]);

        factory(\App\Attachment::class)->create([
            'challenge_id' => $challenge->id,
            'filename' => 'public/challenges/test.zip',
            'url' => 'http://127.0.0.1:1337/index.php'
        ]);

        $response = $this->actingAs($admin)->get('admin/challenges/1/edit');
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        $challenge = factory(\App\Challenge::class)->create([
            'score' => '250',
            'title' => 'TEST',
            'flag' => 'FLAG{th1s_1s_4_t3stSt}',
            'content' => 'This is a test.'
        ]);

        $category = factory(\App\Category::class)->create([
            'category' => 'Test Category',
            'description' => 'This is a test category'
        ]);

        factory(\App\ChallengeCategory::class)->create([
            'category_id' => $category->id,
            'challenge_id' => $challenge->id
        ]);

        factory(\App\Attachment::class)->create([
            'challenge_id' => $challenge->id,
            'filename' => 'public/challenges/test.zip',
            'url' => 'http://127.0.0.1:1337/index.php'
        ]);

        $data = [
            'inputCategory' => 'Test Category',
            'inputTitle' => 250,
            'inputScore' => 'Weak Cipher',
            'inputFlag' => 'FLAG{th1s_1s_4_t3st}',
            'inputContent' => 'Can you break this weak cipher?',
            'inputURL' => 'http://127.0.0.1:1337/index.php',
            'inputFile' => UploadedFile::fake()->image('test_file.jpg')
        ];

        $response = $this->actingAs($admin)->post('admin/challenges/1/update', $data);
        $response->assertStatus(302);
    }

    public function testDestroy()
    {
        $admin = factory(\App\User::class)
            ->states('admin')
            ->create();

        factory(\App\Challenge::class)->create([
            'score' => '250',
            'title' => 'TEST',
            'flag' => 'FLAG{th1s_1s_4_t3stSt}',
            'content' => 'This is a test.'
        ]);

        $response = $this->actingAs($admin)->get('admin/challenges/1/delete');
        $response->assertStatus(302);
    }

    public function testSubmitFlag()
    {
        factory(\App\Challenge::class)->create([
            'score' => '250',
            'title' => 'TEST',
            'flag' => 'FLAG{th1s_1s_4_t3st}',
            'content' => 'This is a test.'
        ]);

        factory(\App\Attachment::class)->create([
            'challenge_id' => 1,
            'filename' => 'public/challenges/test.zip',
            'url' => 'http://127.0.0.1:1337/index.php'
        ]);

        factory(\App\Category::class)->create([
            'category' => 'Test Category',
            'description' => 'This is a test category'
        ]);

        $user = factory(\App\User::class)->create();
        $this->be($user);

        $data = array(
            'id' => 1,
            'flag' => 'FLAG{th1s_1s_4_t3st}'
        );

        $response = $this->post('/challenges', $data);
        $response->assertStatus(302);

        // Test invalid flag
        $data = array(
            'id' => 1,
            'flag' => 'FLAG{th1s_1s_1nv4l1d_fl4g}'
        );

        $response = $this->post('/challenges', $data);
        $response->assertStatus(302);
    }

    public function testCategory()
    {
        $challenge = new Challenge;
        $category = $challenge::with('challenge_categories')->get(1);
        $this->assertEquals('object', gettype($category));
    }
}

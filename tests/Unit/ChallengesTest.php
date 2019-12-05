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
		$data = [
			'inputCategory' => 'Crypto',
			'inputTitle' => 250,
			'inputScore' => 'Weak Cipher',
			'inputFlag' => 'FLAG{th1s_1s_4_t3st}',
			'inputContent' => 'Can you break this weak cipher?',
			'inputURL' => 'http://127.0.0.1:1337/index.php',
			'inputFile' => UploadedFile::fake()->image('test_file.jpg')
		];

		$response = $this->post('admin/challenges/create', $data);
		$response->assertStatus(302);
	}

	public function testCreate()
	{
		$response = $this->get('admin/challenges/create');
		$response->assertStatus(200);
	}

	public function testIndexAdmin()
	{
		$response = $this->get('admin/challenges');
		$response->assertStatus(200);
	}

	public function testIndexUser()
	{
		$response = $this->get('/challenges');
		$response->assertStatus(200);
	}

	public function testEdit()
	{
		factory(\App\Challenge::class)->create([
			'category' => 'Crypto',
			'score' => '250',
			'title' => 'TEST',
			'flag' => 'FLAG{th1s_1s_4_t3stSt}',
			'content' => 'This is a test.'
		]);

		factory(\App\Category::class)->create([
	        'category' => 'Test Category',
    	    'description' => 'This is a test category'
		]);

		factory(\App\Attachment::class)->create([
	    	'challenge_id' => 1,
	    	'filename' => 'public/challenges/test.zip',
	    	'url' => 'http://127.0.0.1:1337/index.php'		
		]);
		
		$response = $this->get('admin/challenges/1/edit');
		$response->assertStatus(200);
	}

	public function testUpdate()
	{
		factory(\App\Challenge::class)->create([
			'category' => 'Crypto',
			'score' => '250',
			'title' => 'TEST',
			'flag' => 'FLAG{th1s_1s_4_t3stSt}',
			'content' => 'This is a test.'
		]);

		factory(\App\Attachment::class)->create([
	    	'challenge_id' => 1,
	    	'filename' => 'public/challenges/test.zip',
	    	'url' => 'http://127.0.0.1:1337/index.php'		
		]);

		$data = [
			'inputCategory' => 'Crypto',
			'inputTitle' => 250,
			'inputScore' => 'Weak Cipher',
			'inputFlag' => 'FLAG{th1s_1s_4_t3st}',
			'inputContent' => 'Can you break this weak cipher?'
		];

		$response = $this->post('admin/challenges/1/update', $data);
		$response->assertStatus(302);
	}

	public function testDestroy() 
	{
		factory(\App\Challenge::class)->create([
			'category' => 'Crypto',
			'score' => '250',
			'title' => 'TEST',
			'flag' => 'FLAG{th1s_1s_4_t3stSt}',
			'content' => 'This is a test.'
		]);

		$response = $this->get('admin/challenges/1/delete');
		$response->assertStatus(302);		
	}

	public function testSubmitFlag()
	{
		factory(\App\Challenge::class)->create([
			'category' => 'Crypto',
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
	}
}

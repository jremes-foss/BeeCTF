<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Category;
use App\Challenge;

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
			'inputContent' => 'Can you break this weak cipher?'
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
	    	'challenge_id' => 2,
	    	'filename' => 'public/challenges/test.zip',
	    	'url' => 'http://127.0.0.1:1337/index.php'		
		]);
		
		$response = $this->get('admin/challenges/1/edit');
//		var_dump($response->getOriginalContent());
		$response->assertStatus(200);
	}
}

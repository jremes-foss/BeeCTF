<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Attachment;
use App\Challenge;

class AttachmentTest extends TestCase
{
	use RefreshDatabase;

	public function testAttachmentRelationship()
	{
		$attachment = factory(Attachment::class)->make([
			'challenge_id' => 1,
			'filename' => 'test.zip',
			'url' => 'http://127.0.0.1'
		]);

		factory(\App\Challenge::class)->create([
			'score' => '250',
			'title' => 'TEST',
			'flag' => 'FLAG{th1s_1s_4_t3stSt}',
			'content' => 'This is a test.'
		]);

		$challenge = $attachment->challenge;
		$this->assertEquals('TEST', $challenge->title);
	}
}

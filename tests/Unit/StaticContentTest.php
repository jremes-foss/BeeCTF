<?php

namespace Tests\Unit;

use Tests\TestCase;

class StaticContentTest extends TestCase
{
	public function testStaticContentIndex()
	{
		$response = $this->get('/scontent');
		$response->assertStatus(200);
	}
}
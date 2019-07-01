<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solved extends Model
{

	protected $table = 'solved_challenges';
	
	protected $fillable = [
		'challenge_id',
		'user_id'
	];
}

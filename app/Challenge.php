<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{

	protected $table = 'challenges';
	
	protected $fillable = [
	    'category',
	    'score',
	    'title',
	    'flag',
	    'content'
	];
}

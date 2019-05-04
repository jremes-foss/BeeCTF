<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenges extends Model
{
	protected $fillable = [
	    'category',
	    'score',
	    'title',
	    'flag',
	    'content'
	];
}

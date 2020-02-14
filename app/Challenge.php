<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
	protected $table = 'challenges';
	
	protected $fillable = [
	    'score',
	    'title',
	    'flag',
	    'content'
	];

	public function attachments() 
	{
		return $this->hasOne('App\Attachment');
	}

	public function categories() 
	{
		return $this->hasOneThrough(
			'App\ChallengeCategory',
			'App\Category',
			'id', // Foreign key on Category table
			'category_id', // Foreign key on ChallengeCategory table
			'id', // Local key on Challenge table
			'id' // Local key on Category table
		);
	}

	public function challenge_categories()
	{
		return $this->hasMany('App\ChallengeCategory', 'challenge_id', 'id');
	}
}

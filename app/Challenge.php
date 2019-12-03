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

	public function attachments() {
		return $this->hasOne('App\Attachment');
	}

	public function categories() {
		return $this->hasOne('App\Category');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $foreignKey = 'category_id';

    protected $fillable = [
    	'category',
    	'description'
    ];

	public function challenge_categories()
	{
		return $this->hasOne('App\ChallengeCategory', 'category_id', 'id');
	}

    public function challenges() 
    {
    	return $this->hasManyThrough(
    		'App\ChallengeCategory', 
    		'App\Challenge',
    		'id',
    		'category_id'
    	);
    }
}

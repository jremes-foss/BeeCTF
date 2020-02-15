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

    public function challenges() 
    {
    	return $this->hasManyThrough(
    		'App\ChallengeCategory', 
    		'App\Challenge',
    	);
    }
}

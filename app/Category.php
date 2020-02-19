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
		return $this->hasMany('App\ChallengeCategory', 'category_id', 'id');
	}

    public function challenges() 
    {
    	return $this->hasMany('App\Challenge', 'challenge_id', 'id');
    }

    /**
     * Scope to get the Categories for edit() method
     */
    public function scopeGetCategories($query, $challenge) {
    	return $query->join('challenge_category', 'challenge_category.category_id', '=', 'categories.id')
    				->join('challenges', 'challenge_category.challenge_id', '=', 'challenges.id')
    				->select('categories.category')
    				->where('challenge_category.challenge_id', '=', $challenge->id)
    				->value('category');
    }
}

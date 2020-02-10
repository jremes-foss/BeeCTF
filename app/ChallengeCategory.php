<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeCategory extends Model
{
    protected $table = "challenge_category";
    protected $foreignKey = 'challenge_id';

    protected $fillable = [
    	'category_id',
    	'challenge_id'
    ];

    /** Relationship between ChallengeCategory and Challenge models */
    public function challenge()
    {
    	return $this->belongsToMany('App\Challenge');
    }

    /** Relationship between ChallengeCategory and Category models */
    public function category()
    {
        return $this->belongsToMany('App\Category');
    }
}

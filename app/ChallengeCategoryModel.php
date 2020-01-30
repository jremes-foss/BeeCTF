<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeCategoryModel extends Model
{
    protected $table = "challenge_categories";

    protected $fillable = [
    	'category_id',
    	'challenge_id'
    ];

    public function challenges()
    {
    	return $this->hasMany('App\Challenge');
    }
}

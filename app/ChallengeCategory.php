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

    public function challenges()
    {
    	return $this->belongsTo('App\Challenge');
    }

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
}

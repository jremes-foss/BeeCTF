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

    /**
     * Returns ChallengeCategory models belonging to Category.
     *  
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function challengeCategories()
    {
        return $this->hasMany('App\ChallengeCategory', 'category_id', 'id');
    }

    public function challenges()
    {
        return $this->hasMany('App\Challenge', 'challenge_id', 'id');
    }
}

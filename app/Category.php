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

    public function challengeCategories()
    {
        return $this->hasMany('App\ChallengeCategory', 'category_id', 'id');
    }

    public function challenges()
    {
        return $this->hasMany('App\Challenge', 'challenge_id', 'id');
    }

    /**
     * Returns the count of challenges per category
     * @return int
     */
    public function scopeChallengesPerCategory()
    {
        // TODO:
        // select * from categories c inner join challenge_category cc on c.id = cc.category_id;
    }
}

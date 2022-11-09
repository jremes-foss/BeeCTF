<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeCategory extends Model
{
    protected $table = "challenge_category";

    protected $fillable = [
        'category_id',
        'challenge_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function challenges()
    {
        return $this->belongsTo('App\Challenge', 'challenge_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}

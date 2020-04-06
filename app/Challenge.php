<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'challenges';
    protected $foreignKey = 'challenge_id';

    protected $fillable = [
        'score',
        'title',
        'flag',
        'content'
    ];

    public function attachments()
    {
        return $this->hasOne('App\Attachment');
    }

    public function challengeCategories()
    {
        return $this->hasOne('App\ChallengeCategory', 'challenge_id', 'id');
    }
}

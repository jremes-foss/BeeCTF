<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';
    protected $foreignKey = 'challenge_id';

    protected $fillable = [
        'challenge_id',
        'filename',
        'url'
    ];

    public function challenge()
    {
        return $this->belongsTo('App\Challenge', 'challenge_id');
    }
}

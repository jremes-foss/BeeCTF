<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamPlayer extends Model
{
    protected $table = 'player_team';

    protected $fillable = [
        'player_id',
        'team_id'
    ];
}

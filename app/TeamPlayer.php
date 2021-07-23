<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;

class TeamPlayer extends Model
{
    protected $table = 'player_team';
    public $timestamps = false;

    protected $fillable = [
        'player_id',
        'team_id'
    ];

    public function players() {}
}

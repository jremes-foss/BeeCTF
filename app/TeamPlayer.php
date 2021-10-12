<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamPlayer extends Model
{
    protected $table = 'player_team';
    public $timestamps = false;

    protected $fillable = [
        'player_id',
        'team_id'
    ];

    public function players()
    {
        return $this->belongsTo('App\User', 'player_id', 'id');
    }

    public function teams()
    {
        return $this->belongsTo('App\Team', 'team_id', 'id');
    }
}

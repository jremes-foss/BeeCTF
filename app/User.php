<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_TYPE = "Administrator";
    const DEFAULT_TYPE = "User";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Returns administrator status.
     *
     * @var array
     */
    public function isAdmin()
    {
        return $this->user_type === self::ADMIN_TYPE;
    }

    /**
     * Returns TeamPlayer model belonging to User model.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function teamPlayers()
    {
        return $this->hasOne('App\TeamPlayer', 'player_id', 'id');
    }
}

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

    public function isAdmin()
    {
        return $this->user_type === self::ADMIN_TYPE;
    }

    /**
     * Generates the API token for registered users
     *
     * @return String api_token
     */
    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();
        
        return $this->api_token;
    }
}

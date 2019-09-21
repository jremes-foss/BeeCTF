<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
    	'category',
    	'description'
    ];

    public function challenges() {
    	return $this->hasMany('App\Challenge');
    }
}

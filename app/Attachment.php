<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';

    public function challenge() {
    	return $this->belongsTo('App\Challenge');
    }
}

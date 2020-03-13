<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    public function userID() {
        return $this->belongsTo('App\User');
    }
}

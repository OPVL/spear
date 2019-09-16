<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spear extends Model
{
    public function target()
    {
        return $this->belongsTo('App\Target');
    }
}

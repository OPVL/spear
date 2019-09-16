<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    public function spears()
    {
        return $this->hasMany('App\Spear');
    }
}

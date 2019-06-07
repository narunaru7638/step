<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    //
    public function childsteps()
    {
        return $this->hasMany('App\Childstep');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taxes extends Model
{
    public function accounts()
    {
        return $this->hasMany('App\account');
    }
}

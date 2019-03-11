<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    //
    public function invoices()
    {
        return $this->hasMany('App\Invoices');
    }
}

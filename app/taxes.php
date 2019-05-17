<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxes extends Model
{
    public function accounts()
    {
        return $this->hasMany('App\account');
    }

    public function items()
    {
        return $this->hasMany('App\InvoiceDetails');
    }

    public function components()
    {
        return $this->hasMany('App\TaxComponent');
    }
}

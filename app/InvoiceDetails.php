<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    public function invoice()
    {
        return $this->hasOne('App\Invoice');
    }

    public function tax()
    {
        return $this->hasOne('App\taxes');
    }    
}

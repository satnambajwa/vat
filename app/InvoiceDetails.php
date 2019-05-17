<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }

    public function taxes()
    {
        return $this->belongsTo('App\taxes');
    }    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_details extends Model
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

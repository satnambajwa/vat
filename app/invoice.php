<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $fillable = ['date','estimated_date','code','reference','dicount','sub_total','vat','total','currency_id', 'contact_id','user_id'];
 
    public function contact()
    {
        return $this->hasOne('App\Contact');
    }

    public function items()
    {
        return $this->hasMany('App\Invoice_details');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['date','estimated_date','code','reference','dicount','sub_total','vat','total','currency_id', 'contact_id','user_id'];
 
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public function items()
    {
        return $this->hasMany('App\InvoiceDetails');
    }

    public function logs()
    {
        return $this->hasMany('App\note','link_type_id');
    }
}

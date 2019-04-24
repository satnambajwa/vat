<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['date','payment_types_id','cr_account_id','cr_amount','dr_account_id','dr_amount','invoice_id','comment','user_id'];

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public function paymentType()
    {
        return $this->belongsTo('App\PaymentType','payment_types_id');
    }

    public function crAccount()
    {
        return $this->belongsTo('App\Account');
    }

    public function drAccount()
    {
        return $this->belongsTo('App\Account');
    }
}

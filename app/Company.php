<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['user_id','name','title','phone','fax','mobile',
        'mail_name','currency_id','address','address1','city','state','postal_code',
        'country','status','financial_year','book_begin_from','decimal','show_in_millions','is_current'
    ];

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }
}

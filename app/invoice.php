<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    //protected $fillable = ['currency_id', 'contact_id', 'user_id', 'another_one'];
    public function contact()
    {
        return $this->hasOne('App\Contact');
    }
}

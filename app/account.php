<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    public function taxes()
    {
        return $this->belongsTo('App\Taxes');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function AccountGroups()
    {
        return $this->belongsTo('App\AccountGroups');
    }
}

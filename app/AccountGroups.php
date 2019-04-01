<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AccountGroups extends Model
{
    protected $table = 'account_groups';
    public function accounts()
    {
        return $this->hasMany('App\account');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    protected $fillable = ['contact_id','first_name','last_name','email','is_primary'];
    protected $table = 'person';
}

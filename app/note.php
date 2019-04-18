<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function invoice()
    {
        return $this->belongsTo('App\invoice','link_type_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

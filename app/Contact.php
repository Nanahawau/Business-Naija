<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];
    //
    public function Business(){
        return $this->belongsTo('App\Business');
    }
}

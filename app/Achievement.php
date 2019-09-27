<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $guarded = [];
    //
    public function business(){
        return $this->belongsTo('App\Business');
    }
}

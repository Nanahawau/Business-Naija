<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function review(){
        return $this->hasMany('App\Review');
    }
}

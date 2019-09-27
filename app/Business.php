<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $guarded = [];
    //
    public function category(){
        return $this->belongsToMany('App\Category')->using('App\BusinessCategory');
    }

    public function review(){
        return $this->hasMany('App\Review');
    }

    public function contact(){
        return $this->hasOne('App\Contact');
    }
    public function achievement(){
        return $this->hasMany('App\Achievement');
    }




}

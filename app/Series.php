<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable=[ 'title','description','airing_time_from','airing_time_to','at_time','slug','follow',];

    public function Episode(){
        return $this->hasMany('App\Episodes');
    }





}

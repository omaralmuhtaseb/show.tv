<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    protected $fillable=['series_id','title','description',
        'airing_time','at_time','thumbnail','video','slug'];


    public function Series(){
        return $this->hasOne('App\Series');
    }

}

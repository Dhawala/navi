<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    //
    use SoftDeletes;

    public function allocation(){
        return $this->hasOne('App\Allocation','schedule_id','id');
    }
}

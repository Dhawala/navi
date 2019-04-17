<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    //
    public function lecturer(){
        return $this->hasMany('App\Lecturer','emp_no','emp_no');
    }
    public function schedule(){
        return $this->hasMany('App\Schedule','id','schedule_id');
    }
    public function room(){
        return $this->hasMany('App\Room','room_id','room_id');
    }
}

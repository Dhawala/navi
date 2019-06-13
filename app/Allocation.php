<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Allocation extends Model
{
    use SoftDeletes;
    //
    public function lecturer(){
        return $this->hasOne('App\Lecturer','emp_no','emp_no');
    }
    public function schedule(){
        return $this->hasOne('App\Schedule','id','schedule_id');
    }
    public function room(){
        return $this->hasOne('App\Room','room_id','room_id');
    }
    public function cancellation(){
        return $this->hasOne('App\AllocationCancellation','allocation_id','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllocationCancellation extends Model
{
    //
    use SoftDeletes;

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function lecturer(){
        return $this->belongsTo('App\Lecturer','lecturer_id','emp_no');
    }

    public function allocation(){
        return $this->belongsTo('App\Allocation', 'allocation_id','id');
    }
}

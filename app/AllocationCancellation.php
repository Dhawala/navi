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
        return $this->hasOne('App\Lecturer','id','lecturer_id');
    }

    public function allocation(){
        return $this->belongsTo('App\Allocation', 'Allocation_id','id');
    }
}

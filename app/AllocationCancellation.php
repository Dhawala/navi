<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllocationCancellation extends Model
{
    //
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function lecturer(){
        return $this->hasOne('App\Lecturer','id','lecturer_id');
    }

    public function allocation(){
        return $this->hasOne('App\Allocation', 'id','Allocation_id');
    }
}

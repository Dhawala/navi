<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    public function allocation()
    {
        return $this->belongsTo('App\Allocation','emp_no','emp_no');
    }
    public function user()
    {
        return $this->hasOne('App\User','email','email');
    }
}

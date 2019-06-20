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
        return $this->belongsTo('App\User','user_id','id');
    }
}

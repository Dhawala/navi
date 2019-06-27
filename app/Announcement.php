<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use SoftDeletes;
    //
    public function course(){
        $this->belongsTo('App/Course', 'course_code','course_code');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student(){
        return $this->hasOne('App\Student','sno','sno');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course(){
        return $this->hasOne('App\Course','course_code','course_code');
    }
}

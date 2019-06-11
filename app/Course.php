<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use softDeletes;

    public function department(){
        return $this->hasOne('App\Department','name','department');
    }
}

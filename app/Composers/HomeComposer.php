<?php
/**
 * Created by PhpStorm.
 * User: Dhawala
 * Date: 6/14/2019
 * Time: 1:05 PM
 */

namespace App\Composers;


use App\Allocation;
use Illuminate\Support\Facades\Auth;

class HomeComposer
{

    public function compose($view)
    {
        //Add your variables
        $allocationcount='';
        if(!Auth::guest()) {
            if (Auth::user()->role != 'admin') {
                $allocationcount = Allocation::with(['lecturer' => function ($q) {
                    $q->with(['user' => function ($q) {
                        $q->where('id', '=', Auth::user()->id);
                    }]);
                }])->count();
            } else {
                $allocationcount = Allocation::all()->count();
            }
        }

        $view->with('allocationcount', $allocationcount);
    }
}
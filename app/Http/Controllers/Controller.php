<?php

namespace App\Http\Controllers;

use App\Allocation;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware(function ($request,$next){
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

            View::share('allocationcount',$allocationcount);
            return $next($request);
        });
    }
}

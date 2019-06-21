<?php

namespace App\Http\Middleware;

use App\Allocation;
use Closure;
use Illuminate\Support\Facades\Auth;
use View;

class AllocationCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
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
    }
}

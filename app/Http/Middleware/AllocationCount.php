<?php

namespace App\Http\Middleware;

use App\Http\Controllers\CounterController;
use Closure;
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
        View::share('allocationcount',CounterController::allocationCount());
        View::share('cancellationRequestCount',CounterController::scheduleCancellationRequestCount());
        return $next($request);
    }
}

<?php

namespace App\Http\Controllers;

use App\Allocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CounterController extends Controller
{
    //
    public static function allocationCount()
    {
        return QueryController::allocations()->count();
    }

    public static function scheduleCancellationRequestCount()
    {
        return QueryController::scheduleCancellationRequests()->count();
    }

}

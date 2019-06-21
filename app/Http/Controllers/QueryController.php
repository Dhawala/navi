<?php

namespace App\Http\Controllers;

use App\Allocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueryController extends Controller
{
    //
    public static function allocations(){
        $allocations = Allocation::query()
            ->with(['lecturer.user','schedule', 'room','cancellation'])
            ->whereHas('lecturer',function($q){
                $q->whereHas('user',function ($q){
                    //if user not an admin
                    if (Auth::user()->role != 'admin') {
                        $q->where('id', '=', Auth::user()->id);
                    }
                });
            });
        return $allocations;
    }

    public static function scheduleCancellationRequests(){
        $cancellations = Allocation::query()
            ->with(['lecturer.user','schedule', 'room','cancellation'])
            ->whereHas('lecturer',function($q){
                $q->whereHas('user',function ($q){
                    //if user not an admin
                    if (Auth::user()->role != 'admin') {
                        $q->where('id', '=', Auth::user()->id);
                    }
                });
            })
            ->whereHas('cancellation',function ($query) {
                $query->where('approved', '=', '0');
            });
        return $cancellations;
    }
}

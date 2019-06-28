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
                    if ( isset(auth()->user()->role) && auth()->user()->role != 'admin') {
                        $q->where('id', '=', Auth::user()->id);
                    }
                });
            })
            ->whereHas('schedule',function ($q){
                $q->whereNull('deleted_at');
            })
        ;
        return $allocations;
    }

    public static function scheduleCancellationRequests(){
        $cancellations = Allocation::query()
            ->with(['lecturer.user','schedule', 'room','cancellation'])
            ->whereHas('lecturer',function($q){
                $q->whereHas('user',function ($q){
                    //if user not an admin
                    if ( isset(auth()->user()->role) && auth()->user()->role != 'admin') {
                        $q->where('id', '=', Auth::user()->id);
                    }
                });
            })
            ->whereHas('cancellation',function ($query) {
                $query->where('approved', '=', '0');
            })
            ->whereHas('schedule',function ($q){
                $q->whereNull('deleted_at');
            })
        ;
        return $cancellations;
    }
}

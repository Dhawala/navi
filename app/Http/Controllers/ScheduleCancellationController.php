<?php

namespace App\Http\Controllers;

use App\AllocationCancellation;
use Illuminate\Http\Request;

class ScheduleCancellationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cancellationForm(){
        $allocationCancellations = AllocationCancellation::all();
        return $allocationCancellations;
    }
    public function cancel(){
        return redirect('');
    }

    public function approvalForm(){
        return view('');
    }

    public function approval(){
        return redirect('');
    }

    //
}

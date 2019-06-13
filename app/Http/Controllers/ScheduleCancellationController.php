<?php

namespace App\Http\Controllers;

use App\Allocation;
use App\AllocationCancellation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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

    public function index(){
        return view('cancellations.index');
    }
    public function cancellationForm($id){
        $allocation = Allocation::find($id)->with('lecturer','schedule','room','cancellation')->first();
        //var_dump($allocation);die;
        return view('cancellations.cancellationForm',compact('allocation'));
    }
    public function cancelRequest($id,Request $request){
        $allocation  = Allocation::find($id);
        $allocationCancellation = new AllocationCancellation();
        $allocationCancellation->allocation_id = $allocation->id;
        $allocationCancellation->lecturer_id = $allocation->emp_no;
        $allocationCancellation->user_id = auth()->user()->id;
        $allocationCancellation->approved = 0;
        $allocationCancellation->student_message = $request->student_message;
        $allocationCancellation->staff_message = $request->staff_message;
        $allocationCancellation->save();

        //return "Cancellation requested $id";
    }

    public function approvalForm(){
        return view('');
    }

    public function approval(){
        return redirect('');
    }


    //
}

<?php

namespace App\Http\Controllers;

use App\Allocation;
use App\AllocationCancellation;
use App\Events\ApprovalEvent;
use App\Events\CancelEvent;
use App\Events\EventTrigger;
use App\Schedule;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;

class ScheduleCancellationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index(){
        return view('cancellations.index');
    }

    public function cancellationForm($id){
        $allocation = Allocation::where('id','=',$id)->with(['lecturer','schedule','room','cancellation'])->first();
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
        if($allocationCancellation->save()) {
            //event(new EventTrigger());
            //event(new CancelEvent($allocationCancellation));
            return redirect('cancel')->with('success', 'Cancellation requested');
        }
    }


    public function approval_index(){
        return view('cancellations.approvalindex');
    }


    public function approvalForm($id){
        $allocation = Allocation::where('id','=',$id)->with(['lecturer','schedule','room','cancellation'])->first();
        //var_dump($allocation);die;
        return view('cancellations.approvalForm',compact('allocation'));
    }

    public function approvalRequest($id,Request $request){
        $allocation = Allocation::find($id);
       //var_dump($allocation);die;

        $allocationCancellation = AllocationCancellation::find($allocation->cancellation->id);
//        echo "<pre>";
//        var_dump($allocationCancellation);
//        die;

        if($request->approve) {
            $allocationCancellation->approved = 1;
            if ($allocationCancellation->update()) {

//                var_dump($allocation);die;

                $schedule = Schedule::find($allocation->schedule_id);
                DB::transaction(function()use($schedule,$allocation){
                    $schedule->delete();
                    $allocation->delete();
                });
                //on cancellation approval
                //event(new ApprovalEvent($allocationCancellation));
                return redirect('approval')->with('success', 'Cancellation Request Approved');
            }
        }else if($request->reject){
            if ($allocationCancellation->delete()) {
                return redirect('approval')->with('error', 'Cancellation Request Rejected');
            }
        }

    }


    //
}

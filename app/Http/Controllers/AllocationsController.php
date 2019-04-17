<?php

namespace App\Http\Controllers;

use App\Allocation;
use App\Lecturer;
use App\Room;
use App\Schedule;
use Illuminate\Http\Request;

class AllocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allocations = Allocation::all();
        return view('allocations.index',compact('allocations'));
        //todo - allocate schedule class room and lecturers
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecturers = Lecturer::all();
        $schedules = Schedule::all();
        $rooms = Room::all();
        return view('allocations.create',compact('lecturers','schedules','rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allocation = new Allocation();
        $request->validate([
            'emp_no'=>'required',
            'schedule_id'=>'required',
            'room_id'=>'required',
        ]);

        $allocation->emp_no = $request->emp_no;
        $allocation->schedule_id = $request->schedule_id;
        $allocation->room_id = $request->room_id;
        $allocation->save();

        return redirect('/allocations')->with('success','successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecturers = Lecturer::all();
        $schedules = Schedule::all();
        $rooms = Room::all();
        $allocation = Allocation::find($id);
        return view('allocations.show',compact('allocation','lecturers','schedules','rooms'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturers = Lecturer::all();
        $schedules = Schedule::all();
        $rooms = Room::all();
        $allocation = Allocation::find($id);
        return view('allocations.edit',compact('allocation','lecturers','schedules','rooms'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $allocation = Allocation::find($id);
        $request->validate([
            'emp_no'=>'required',
            'schedule_id'=>'required',
            'room_id'=>'required',
        ]);

        $allocation->emp_no = $request->emp_no;
        $allocation->schedule_id = $request->schedule_id;
        $allocation->room_id = $request->room_id;
        $allocation->save();

        return redirect('/allocations')->with('success','updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $allocation = Allocation::find($id);
        $allocation->delete();
        return redirect('/allocations')->with('success','updated successfully');

    }
}

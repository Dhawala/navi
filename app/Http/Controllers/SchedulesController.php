<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Course;
use App\Location;
use App\Room;
use App\Schedule;
use Illuminate\Http\Request;

class SchedulesController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();

        return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $locations = Location::all();
        $activities = Activity::all();
        $courses = Course::all();

        return view('schedules.create', compact('rooms', 'locations', 'activities', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schedule = new Schedule();
        $request->validate([
            'ac_code' => 'required|max:10',
            'course_code' => 'required|max:10',
            'group' => 'required|max:10',
            'medium' => 'required|max:10',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'centre' => 'required|max:10',
            'loc_id' => 'required|max:5',
            'room_id' => 'required|max:5',
        ]);
        $schedule->ac_code = $request->ac_code;
        $schedule->course_code = $request->course_code;
        $schedule->group = $request->group;
        $schedule->medium = $request->medium;
        $schedule->date = $request->date;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->centre = $request->centre;
        $schedule->loc_id = $request->loc_id;
        $schedule->room_id = $request->room_id;
        $schedule->save();

        return redirect('/schedules')->with('success', 'created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rooms = Room::all();
        $locations = Location::all();
        $activities = Activity::all();
        $courses = Course::all();
        $schedule = Schedule::find($id);
        return view('schedules.show', compact('schedule','rooms', 'locations', 'activities', 'courses'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms = Room::all();
        $locations = Location::all();
        $activities = Activity::all();
        $courses = Course::all();
        $schedule = Schedule::find($id);


        return view('schedules.edit', compact('schedule','rooms', 'locations', 'activities', 'courses'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $request->validate([
            'ac_code' => 'required|max:10',
            'course_code' => 'required|max:10',
            'group' => 'required|max:10',
            'medium' => 'required|max:10',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'centre' => 'required|max:10',
            'loc_id' => 'required|max:5',
            'room_id' => 'required|max:5',
        ]);
        $schedule->ac_code = $request->ac_code;
        $schedule->course_code = $request->course_code;
        $schedule->group = $request->group;
        $schedule->medium = $request->medium;
        $schedule->date = $request->date;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->centre = $request->centre;
        $schedule->loc_id = $request->loc_id;
        $schedule->room_id = $request->room_id;
        $schedule->save();

        return redirect('/schedules')->with('success', 'updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect('/schedules')->with('success', 'deleted successfully');

    }
}

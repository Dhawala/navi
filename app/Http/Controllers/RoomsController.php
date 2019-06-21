<?php

namespace App\Http\Controllers;

use App\Location;
use App\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('rooms.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classroom = new Room();

        $request->validate([
            'room_id'=>'required|max:5',
            'room_name'=>'required|max:45',
            'description'=>'required|max:400',
            'loc_id'=>'required|max:5',
        ]);

        $classroom->room_id = $request->room_id;
        $classroom->room_name = $request->room_name;
        $classroom->description = $request->description;
        $classroom->loc_id = $request->loc_id;
        $classroom->save();

        return redirect('/rooms')->with('success','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locations = Location::all();
        $room = Room::find($id);
        return view('rooms.show',compact('locations','room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations = Location::all();
        $room = Room::find($id);
        return view('rooms.edit',compact('locations','room'));
        //
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
        $classroom = Room::find($id);

        $request->validate([
            'room_id'=>'required|max:5',
            'room_name'=>'required|max:45',
            'description'=>'required|max:400',
            'loc_id'=>'required|max:5',
        ]);

        $classroom->room_id = $request->room_id;
        $classroom->room_name = $request->room_name;
        $classroom->description = $request->description;
        $classroom->loc_id = $request->loc_id;
        $classroom->save();

        return redirect('/rooms')->with('success','Successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classroom = Room::find($id);
        $classroom->delete();
        return redirect('/rooms')->with('success','Successfully deleted');

    }
}

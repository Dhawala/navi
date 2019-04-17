<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
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
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = new Location();
        $request->validate([
           'loc_id'=>'required',
           'loc_name'=>'required',
           'longitude'=>'required',
           'latitude'=>'required',
        ]);

        $location->loc_id = $request->loc_id;
        $location->loc_name = $request->loc_name;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->save();

        return redirect('/locations')->with('success','Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::find($id);
        return view('locations.show',compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::find($id);
        return view('locations.edit', compact('location'));
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
        $location = Location::find($id);
        $request->validate([
            'loc_id'=>'required',
            'loc_name'=>'required',
            'longitude'=>'required',
            'latitude'=>'required',
        ]);

        $location->loc_id = $request->loc_id;
        $location->loc_name = $request->loc_name;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->save();

        return redirect('/locations')->with('success','Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();
        return redirect('/locations')->with('success','deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\building;
use Illuminate\Http\Request;

class BuildingsController extends Controller
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
        $buildings = Building::all();

        return view('buildings.index',compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buildings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $building= new building();

        $request->validate([
            'bul_id'=>'integer|required',
        ]);
        $cord = explode(PHP_EOL,$request->coordinates);
        $coordinates ='[';
        $count =0;
        foreach ($cord as $c){
            if($count!=0){
                $coordinates.=',';
            }
            $coordinates.='{';
            preg_match('/(?P<lat>\d*.\d*)[,](?P<lng>\d*.\d*)/',$c,$cordi);
            $coordinates.='"lat":'.$cordi['lat'];
            $coordinates.=', ';
            $coordinates.='"lng":'.$cordi['lng'];
            $coordinates.='}';
            $count++;
        }
        $coordinates .=']';

        $building->bul_id = $request->bul_id;
        $building->coordinates = $coordinates;
        $building->save();

        return redirect('/buildings')->with('success','Saved Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $building = Building::find($id);
        return view('buildings.show',compact('building'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $building = Building::find($id);
        return view('buildings.edit',compact('building'));
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
        $building= building::find($id);

        $request->validate([
            'bul_id'=>'integer|required',
        ]);

        $building->bul_id = $request->bul_id;
        $building->coordinates = $request->coordinates;
        $building->save();

        return redirect('/buildings')->with('success','Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building= building::find($id);
        $building->delete();
        return redirect('/buildings')->with('success','Deleted Successfully!');
    }
}

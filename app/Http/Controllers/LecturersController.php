<?php

namespace App\Http\Controllers;

use App\Lecturer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use DB;

class LecturersController extends Controller
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
        $lecturers = Lecturer::all();
        return view('lecturers.index',compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lecturer = new Lecturer();
        $user = new User();

        $request->validate([
            'emp_no'=>'required|unique:lecturers',
            'nic'=>'required',
            'name'=>'required',
            'email'=>'required|email|unique:lecturers',
            'contact'=>'required',
        ]);

        $lecturer->emp_no = $request->emp_no;
        $lecturer->nic = $request->nic;
        $lecturer->name = $request->name;
        $lecturer->email = $request->email;
        $lecturer->contact = $request->contact;

        $user->name = $request->name;
        $user->password = Hash::make($request->nic);
        $user->email = $request->email;
        $user->role = 'lecturer';

        DB::transaction(function()use($lecturer,$user){
            $user->save();
            $lecturer->user_id = $user->id;
            $lecturer->save();
        });

        return redirect('/lecturers')->with('success','Lecturer Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecturer = Lecturer::find($id);
        return view('lecturers.show',compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer = Lecturer::find($id);
        return view('lecturers.edit',compact('lecturer'));
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
        $lecturer = Lecturer::find($id);
        $user = User::where('email',$lecturer->email);

        $request->validate([
            'emp_no'=>[
                'required',
                Rule::unique('lecturers','emp_no')->ignore($lecturer->id)
            ],
            'nic'=>'required',
            'name'=>'required',
            'email'=>[
                'required',
                'email',
                Rule::unique('lecturers','email')->ignore($lecturer->id)
            ],
            'contact'=>'required',
        ]);

        $lecturer->emp_no = $request->emp_no;
        $lecturer->nic = $request->nic;
        $lecturer->name = $request->name;
        $lecturer->email = $request->email;
        $lecturer->contact = $request->contact;

        $user->name = $request->name;
        $user->password = Hash::make($request->nic);
        $user->email = $request->email;

        DB::transaction(function()use($lecturer,$user){
            $lecturer->save();
            $user->save();
        });

        return redirect('/lecturers')->with('success','Lecturer updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecturer = Lecturer::find($id);
        $lecturer->delete();
        return redirect('/lecturers')->with('success','Lecturer updated Successfully');
    }
}

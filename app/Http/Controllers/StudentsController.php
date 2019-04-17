<?php

namespace App\Http\Controllers;

use App\Student;
use App\Student_login;
use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rule;

class StudentsController extends Controller
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
        $students = Student::all();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student_login = new Student_login();
        $request->validate([
            'sno'=>'required|max:10|unique:students',
            'reg_no'=>'required|max:10|unique:students',
            'nic'=>'required|max:15|unique:students',
            'name'=>'required|max:400',
            'email'=>'required|email',
            'contact'=>'required|max:11',
        ]);

        $student->sno = $request->sno;
        $student->reg_no = $request->reg_no;
        $student->nic= $request->nic;
        $student->name= $request->name;
        $student->email= $request->email;
        $student->contact= $request->contact;

        $student_login->sno = $request->sno;
        $student_login->password = $request->nic;

        DB::transaction(function()use($student,$student_login){
            $student->save();
            $student_login->save();
        });

        return redirect('/students')->with('success','Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit',compact('student'));
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
        $student =  Student::find($id);

        $student_login = Student_login::where('sno',$student->sno)->get()->first();

        $request->validate([
            'sno'=>[
                'required',
                'max:10',
                Rule::unique('students')->ignore($student->id)
            ],
            'reg_no'=>[
                'required',
                'max:10',
                Rule::unique('students')->ignore($student->id)
            ],
            'nic'=>[
                'required',
                'max:15',
                Rule::unique('students')->ignore($student->id)
            ],
            'name'=>'required|max:400',
            'email'=>'required|email',
            'contact'=>'required|max:11',
        ]);

        $student->sno = $request->sno;
        $student->reg_no = $request->reg_no;
        $student->nic= $request->nic;
        $student->name= $request->name;
        $student->email= $request->email;
        $student->contact= $request->contact;

        $student_login->sno = $request->sno;
        $student_login->password = $request->nic;

        DB::transaction(function()use($student,$student_login){
            $student->save();
            $student_login->save();
        });

        return redirect('/students')->with('success','Created Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student =  Student::find($id);

        $student_login = Student_login::where('sno',$student->sno);

        DB::transaction(function()use($student,$student_login){
            $student_login->delete();
            $student->delete();
        });

        return redirect('/students')->with('success','deleted Successfully');

    }
}

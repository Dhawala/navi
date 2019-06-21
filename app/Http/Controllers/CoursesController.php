<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Course;

class CoursesController extends Controller
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
        $courses = Course::all();
        return view('courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('courses.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new course();

        $request->validate([
            'course_code'=>'required|max:10',
            'course_name'=>'required|max:50',
            'department'=>'required|max:50',
            'credits'=>'required|numeric',
        ]);

        $course->course_code = $request->course_code;
        $course->course_name = $request->course_name;
        $course->department = $request->department;
        $course->credits = $request->credits;
        $course->save();

        return redirect('/courses')->with('success','Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $departments = Department::all();

        return view('courses.show', compact('course','departments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $departments = Department::all();
        return view('courses.edit',compact('course','departments'));
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
        $course = Course::find($id);

        $request->validate([
            'course_code'=>'required|max:10',
            'course_name'=>'required|max:50',
            'department'=>'required|max:50',
            'credits'=>'required|numeric',
        ]);

        $course->course_code = $request->course_code;
        $course->course_name = $request->course_name;
        $course->department = $request->department;
        $course->credits = $request->credits;
        $course->save();

        return redirect('/courses')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect('/courses')->with('success','deleted Successfully');
    }
}

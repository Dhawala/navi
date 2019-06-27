<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Notifications\AnonymousNotifiable;

class AnnouncementController extends Controller
{
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
        //
        $announcements = Announcement::all();
        return view('announcements.index',compact('announcements'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = Course::all();
        return view('announcements.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $announcement = new Announcement();

        $request->validate([
            'title'=>'required',
            'message'=>'required',
            'exp_date'=>'required',
        ]);

        $announcement->title = $request->title;
        $announcement->message = $request->message;
        $announcement->exp_date = $request->exp_date;
        $announcement->course_code = $request->course_code;
        $announcement->save();

        return redirect('/announcements')->with('success','created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        $courses = Course::all();
        return view('announcements.show',compact('courses','announcement'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        $courses = Course::all();
        return view('announcements.edit',compact('courses','announcement'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title'=>'required',
            'message'=>'required',
            'exp_date'=>'required',
        ]);

        $announcement->title = $request->title;
        $announcement->message = $request->message;
        $announcement->exp_date = $request->exp_date;
        $announcement->course_code = $request->course_code;
        $announcement->update();

        return redirect('/announcements')->with('success','created successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}

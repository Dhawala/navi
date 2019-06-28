<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Course;
use App\Enrolment;
use App\File;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class EnrollmentsController extends Controller
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
        $enrollments = Enrolment::all();
        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $students = Student::all();
        return view('enrollments.create', compact('courses', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enrollment = new Enrolment();

        $request->validate([
            'sno' => 'required',
            'course_code' => 'required',
        ]);

        $enrollment->sno = $request->sno;
        $enrollment->course_code = $request->course_code;
        $enrollment->save();

        return redirect('/enrollments')->with('success', 'Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enrollment = Enrolment::find($id);
        $courses = Course::all();
        $students = Student::all();

        return view('enrollments.show', compact('enrollment', 'courses', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::all();
        $students = Student::all();

        $enrollment = Enrolment::find($id);
        return view('enrollments.edit', compact('enrollment', 'courses', 'students'));
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
        $enrollment = Enrolment::find($id);

        $request->validate([
            'sno' => 'required',
            'course_code' => 'required',
        ]);

        $enrollment->sno = $request->sno;
        $enrollment->course_code = $request->course_code;
        $enrollment->save();

        return redirect('/enrollments')->with('success', 'Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enrollment = Enrolment::find($id);
        $enrollment->delete();
        return redirect('/enrollments')->with('success', 'Deleted successfully');

    }

    public function data(DataTables $datatables)
    {
        return $datatables->eloquent(Enrolment::query())
            ->editColumn('sno', function ($enrollment) {
                return '<a href="/enrollments/' . $enrollment->id . '">' . $enrollment->sno . '</a>';
            })
            ->addColumn('action', function ($enrollment) {
                return view('enrollments.actions', compact('enrollment'));
            })
            ->rawColumns(['sno', 'action'])
            ->make(true);
    }

    public function excel_upload(Request $request)
    {

        $this->validate($request, [
            'upload_file' => 'file',
        ]);
        if ($request->hasFile('upload_file')) {
            //file name with extension
            $fileNameWithExt = $request->file('upload_file')->getClientOriginalName();

            //just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //jus ext
            $extension = $request->file('upload_file')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = $filename . '_' . auth()->user()->id . '_' . time() . '.' . $extension;
            $fileNameToStore = str_replace(' ', '', $fileNameToStore);

            //upload
            $path = $request->file('upload_file')->storeAs('public/uploads', $fileNameToStore);

            $batch = new Batch();
            $batch->name = $fileNameToStore;
            $batch->user = Auth::user()->id;
            $batch->save();


        } else {
            $fileNameToStore = 'noimage.png';
        }

        $file = new File();

        $file->name = $filename;

        $file->saved_index = $fileNameToStore;

        $file->path = 'storage/uploads';

        $file->ext = $extension;

        $file->batch_id = $batch->id;

        $file->save();
        $objPHPExcel = \PHPExcel_IOFactory::load(storage_path("app\public\uploads\\".$fileNameToStore));
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $sheet_arr = $objWorksheet->toArray(null, true, true, true);
        foreach ($sheet_arr as $row){
            $previous_enrollment = Enrolment::query()
                ->where('sno','=',$row['A'])
                ->where('course_code','=',$row['B'])->get();
            if(sizeof($previous_enrollment)==0) {
                $enrollment = new Enrolment();
                $enrollment->sno = $row['A'];
                $enrollment->course_code = $row['B'];
                $enrollment->save();
            }
        }
//var_dump($sheet_arr);
        return redirect('/enrollments')->with('success', 'Uploaded Successfully');
    }

}

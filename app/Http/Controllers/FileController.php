<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Course;
use App\File;
use App\Schedule;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'upload_file'=>'file',
        ]);

        //file Upload

        if($request->hasFile('upload_file')){
            //file name with extension
            $fileNameWithExt = $request->file('upload_file')->getClientOriginalName();

            //just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            //jus ext
            $extension = $request->file('upload_file')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = $filename.'_'.auth()->user()->id.'_'.time().'.'.$extension;
            $fileNameToStore = str_replace(' ','',$fileNameToStore);

            //upload
            $path = $request->file('upload_file')->storeAs('public/uploads',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.png';
        }

        $file = new File();

        $file->name = $filename;

        $file->saved_index = $fileNameToStore;

        $file->path = 'storage/uploads';

        $file->ext = $extension;

        $file->save();

        $parser = new Parser();

        $pdf = $parser->parseFile(storage_path("app\public\uploads\\".$fileNameToStore));

        $text = $pdf->getText();
//        foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
        $course_buffer = '';
        $activity_set = [];
        foreach(preg_split('~\R~u', $text) as $line){
            // do stuff with $line https://regex101.com/
            if(preg_match('/(?P<code>[a-zA-Z]{3,4}\d{3,4})[ ](?P<name>[a-zA-Z0-9&@\-,\.\(\) ]*)[\t ]*/',$line,$course)){
            if(!preg_match('/\[[a-zA-Z]{3}\d{4}?/',$line)) {
               echo "<div><strong><pre>";
                $course_buffer = $course;

//                var_dump($course_buffer);
//                echo "</pre></strong></div>";
//                $course = new Course();
//                $course->course_code = $matches[0];
//                $course->course_name = $matches2[0];
//                $course->department = 0;
//                $course->credits = 0;
                //$course->save();
            }
            }

            if(isset($course_buffer['code']) &&
                preg_match('/^(?P<name>[a-zA-Z0-9&@\-\.\,\(\)\[\} ]*)[ \t]*'.
                '(?P<language>[A-Z]{1})[\t ]*'.
                '(?P<lab_info>\0|[a-zA-Z0-9&@\.\,\(\)\[\} ]*)[ \t]*[-]{0,1}[ \t]*'.
                '(?P<day>\d{2})\/'.
                '(?P<month>\d{2})\/'.
                '(?P<year>\d{4})[,][ \t]*'.
                '(?P<day_in_words>[a-zA-Z]*)[ \t]*'.
                '(?P<from>\d{2}[:]\d{2})[ \t]*[-][ \t]*'.
                '(?P<to>\d{2}[:]\d{2})[ \t]*'.
                '(?P<center>[a-zA-Z0-9&@\-\.\,\(\)\[\}]*)[ \t]*/'
                ,$line
                ,$activity)
            ){
//                echo "<div><pre>";
//                //echo $line;
//                var_dump($activity);
//                echo "</pre></div>";

                $activity_set[$activity['name']]=$activity['name'];

//                $schedule = new Schedule();
//                $schedule->ac_code = 0;
//                $schedule->room_id = 0;
//                $schedule->ac_name = $activity['name'];
//                $schedule->course_code = $course_buffer['code'];
//                $schedule->group = $activity['lab_info'];
//                $schedule->medium = $activity['language'];
//                $schedule->date = $activity['year'].'-'.$activity['month'].'-'.$activity['day'];
//                $schedule->start_time = $activity['from'];
//                $schedule->end_time = $activity['to'];
//                $schedule->centre = $activity['center'];
//                $schedule->save();
            }
        }

        echo "<pre>";
        var_dump($activity_set);
        echo"</pre>";

        foreach ($activity_set as $act){
            preg_match('/^(?P<letter1>|[A-Z])[a-z \t]*'.
                '(?P<letter2>|[A-Z])[a-z \t]*'.
                '(?P<letter3>|[A-Z])[a-z \t]*'.
                '(?P<number>\d{1})[ \t]*'.
                '(?P<session>\([a-zA-Z \t]*'.
                '(?<session_no>\d{1,2})\)|)/',$act,$first_letters);
            var_dump($first_letters);
            echo $first_letters['letter1'];
            $actv= new Activity();
            echo $actv->ac_code =
                isset($first_letters['letter1'])?$first_letters['letter1']:''.
                isset($first_letters['letter2'])?$first_letters['letter2']:''.
                isset($first_letters['letter3'])?$first_letters['letter3']:''.
                isset($first_letters['number'])?$first_letters['number']:''.
                ((isset($first_letters['session'])
                    && is_array($first_letters['session']))?
                    $first_letters['session']:'')
            ;
        }
        //echo "<pre>$text</pre>";

        //return redirect('/posts')->with('success', 'Post Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}

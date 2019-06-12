<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Batch;
use App\Course;
use App\File;
use App\Lecturer;
use App\Schedule;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\LeavePsyshAlonePass;
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

            $batch = new Batch();
            $batch->name = $fileNameToStore;
            $batch->user = Auth::user()->id;
            $batch->save();


        }else{
            $fileNameToStore = 'noimage.png';
        }

        $file = new File();

        $file->name = $filename;

        $file->saved_index = $fileNameToStore;

        $file->path = 'storage/uploads';

        $file->ext = $extension;

        $file->batch_id = $batch->id;

        $file->save();

        $parser = new Parser();

        $pdf = $parser->parseFile(storage_path("app\public\uploads\\".$fileNameToStore));

        $text = $pdf->getText();
//        foreach(preg_split("/((\r?\n)|(\r\n?))/", $text) as $line){
        $course_buffer = '';
        $activity_set = [];
        $lecturer_set = [];
        foreach(preg_split('~\R~u', $text) as $line){

            //collect lecturers to an array this removes duplicates.

            if(preg_match('/^([\t ]*|)'.
                '(?P<name>[a-zA-Z\.\-@& ]*|)[\t ]*(|ext.)[\t ]*('.
                '(?P<ac_ext>\d{3})[\t\/ ]*'.
                '(?P<ac_phone>[0-9]*)|'.
                '(?P<phone>[0-9]*)[\t\/ ]*'.
                '(?P<ext>\d{3}))[\t\/ ]*'.
                '(?P<email>([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@[a-z0-9\.]*)[\s]*/',
                $line,
                $lecturer_info)){
                $lecturer_set[$lecturer_info['name']]=$lecturer_info;
            }

            // do stuff with $line https://regex101.com/
            if(preg_match('/^[\t ]*'.
                '(?P<code>[a-zA-Z]{3,4}\d{3,4})[\t ]*'.
                '(?P<name>[a-zA-Z0-9&@\-,\.\(\) ]*)[\t ]*/',$line,$course)){
            //if course code exists
                if(!preg_match('/\[[a-zA-Z]{3}\d{4}?/',$line)) {
              // echo "<div><strong><pre>";
                $course_buffer = $course;

//               var_dump($course_buffer);
//                echo "</pre></strong></div>";

                preg_match('/^[\t ]*'.
                    '(?P<department>[A-Z]{2}|)'.
                    '(?P<category>[A-Z]?|)'.
                    '(?P<slqf>[0-9]?|)'.
                    '(?P<credits>[0-9A-Z]?|)'.
                    '(?P<number>[0-9]{2})/',$course_buffer['code'],$course_info );

                $course = new Course();
                $course->course_code = $course_buffer['code'];
                $course->course_name = $course_buffer['name'];
                $course->department = $course_info['department'];
                $course->credits = $course_info['credits'];
                $course->batch_id = $batch->id;
                $course->save();
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

                //activity list
                preg_match('/^[\t ]*'.
                    '(?P<l1>[A-Z]?|)[a-z&@\- \t\0]*'.
                    '(?P<l2>[A-Z]?|)[a-z&@\- \t\0]*'.
                    '(?P<l3>[A-Z]?|)[a-z&@\- \t\0]*'.
                    '(?P<l4>[A-Z]?|)[a-z&@\- \t\0]*'.
                    '(?P<l5>[A-Z]?|)[a-zA-Z&@\-\(\) \t\0]*'.
                    '(?P<number>\d{1,2}|)[a-z&@\- \t\0]*'.
                    '(?P<session>\([a-zA-Z \t]*'.
                    '(?<session_no>\d{1,2}|)\)?|)[\t\0 ]*/',trim($activity['name']),$first_letters);

                //create unique code for activity
                $activity_code =(isset($first_letters['l1'])?$first_letters['l1']:'').
                    (isset($first_letters['l2'])?$first_letters['l2']:'').
                    (isset($first_letters['l3'])?$first_letters['l3']:'').
                    (isset($first_letters['l4'])?$first_letters['l4']:'').
                    (isset($first_letters['l5'])?$first_letters['l5']:'').
                    (isset($first_letters['number'])?$first_letters['number']:'').
                    (isset($first_letters['session'])&&$first_letters['session']!=''? '(S':'').
                    (isset($first_letters['session_no'])? $first_letters['session_no'].')':'');

                //collect all activities in to an array this is important this will remove duplicates.
                $activity_set[$activity_code]=$first_letters;
                //end activity list preg_match

                $schedule = new Schedule();
                $schedule->ac_code = $activity_code;
                $schedule->room_id = 0;
                $schedule->ac_name = $activity['name'];
                $schedule->course_code = $course_buffer['code'];
                $schedule->group = $activity['lab_info'];
                $schedule->medium = $activity['language'];
                $schedule->date = $activity['year'].'-'.$activity['month'].'-'.$activity['day'];
                $schedule->start_time = $activity['from'];
                $schedule->end_time = $activity['to'];
                $schedule->centre = $activity['center'];
                $schedule->batch_id = $batch->id;
                $schedule->save();
            }
        }

//        echo "<pre>";
//        var_dump($activity_set);
//        echo"</pre>";

        //activity list
        foreach ($activity_set as $act){
            echo "<pre>";
            //var_dump($first_letters);
            //echo $first_letters['l_two'];
            $actv= new Activity();

             echo $actv->ac_code =
                (isset($act['l1'])?$act['l1']:'').
                (isset($act['l2'])?$act['l2']:'').
                (isset($act['l3'])?$act['l3']:'').
                (isset($act['l4'])?$act['l4']:'').
                (isset($act['l5'])?$act['l5']:'').
                (isset($act['number'])?$act['number']:'').
                (isset($act['session'])&&$act['session']!=''? '(S':'').
                (isset($act['session_no'])? $act['session_no'].')':'')
             ;
            echo $actv->ac_name = $act[0];
            $actv->batch_id = 0;
            $actv->batch_id= $batch->id;
            $actv->save();

        }
        //lecturers
        foreach ($lecturer_set as $lecturer_info){

            $faker = Factory::create();
            $lecturer = new Lecturer();
            $lecturer->emp_no = $faker->unique()->randomNumber(4);
            $lecturer->nic = $faker->unique()->randomNumber(9).'V';
            $lecturer->name = $lecturer_info['name'];
            $lecturer->email = $lecturer_info['email'];
            $lecturer->contact = $lecturer_info['ac_phone'].$lecturer_info['phone'];
            $lecturer->ext = $lecturer_info['ext'].$lecturer_info['ac_ext'];
            //$lecturer->save();

        }
        //echo "<pre>$text</pre>";

        return redirect('/file')->with('success', 'File was saved Successfully');
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

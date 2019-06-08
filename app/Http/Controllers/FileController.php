<?php

namespace App\Http\Controllers;

use App\Course;
use App\File;
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
        foreach(preg_split('~\R~u', $text) as $line){
            // do stuff with $line https://regex101.com/
            if(preg_match('/[a-zA-Z]{3}\d{4}[ ][a-zA-Z0-9&@\-,\.\(\) \t]*/',$line,$matches)){
            if(!preg_match('/\[[a-zA-Z]{3}\d{4}?/',$line)) {
                $line = trim($line);
                preg_match('/[a-zA-Z]{3}\d{4}/',$line,$matches);
                preg_match('/[ ][a-zA-Z0-9&@\-,\.\(\) \t]*/',$line,$matches2);
//                echo "<div><strong><pre>";
//                echo $matches[0];
//                echo $matches2[0];
//                echo "</pre></strong></div>";

//                $course = new Course();
//                $course->course_code = $matches[0];
//                $course->course_name = $matches2[0];
//                $course->department = 0;
//                $course->credits = 0;
                //$course->save();
            }
            }
            if(preg_match('/^[a-zA-Z0-9&@\-\.\,\(\)\[\} \t]*[ \t]*[-]{0,1}[ \t]*\d{2}\/\d{2}\/\d{4}[,][ \t]*[a-zA-Z]*[ \t]*\d{2}[:]\d{2}[ \t]*[-][ \t]*\d{2}[:][a-zA-Z0-9&@\-\.\,\(\)\[\} \t]*/',$line,$matches)){
//                echo "<div><pre>";
//                echo $line;
//                echo "</pre></div>";
            }
        }

        echo "<pre>$text</pre>";

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

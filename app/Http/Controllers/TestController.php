<?php

namespace App\Http\Controllers;

use App\Allocation;
use App\Course;
use App\Enrolment;
use App\Events\AllocationEvent;
use App\Events\EventTrigger;
use App\Lecturer;
use App\Student;
use App\Student_login;
use App\Test;
use App\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alloc = Allocation::query()->with(['schedule'])->first();
        event(new EventTrigger());
        event(new AllocationEvent($alloc));
        //$faker = Factory::create();
        //student test data
//        for($i=0;$i<=2000;$i++){
//
//            Student::create(
//                [
//                    'sno'=>'S'.$faker->unique()->randomNumber(8,true),
//                    'reg_no'=>$faker->numberBetween(1,7).$faker->unique()->randomNumber(8,true),
//                    'nic'=>$faker->unique()->randomNumber(9,true).'V',
//                    'name'=>$faker->name,
//                    'email'=>$faker->email,
//                    'contact'=>$faker->e164PhoneNumber
//                ]
//            );
//
//        }
        //$students = Student::all();

//        foreach ($students as $student){
//            $student_login = new Student_login();
//            $student_login->sno = $student->sno;
//            $student_login->password = $student->nic;
//            $student_login->save();
//        }
//        foreach ($students as $student){
//            $course_count = $faker->numberBetween(0,7);
//            for($p=0;$p<=$course_count;$p++){
//                $course = Course::inRandomOrder()->first();
//
//                $enrolment = new Enrolment();
//                $enrolment->sno = $student->sno;
//                $enrolment->course_code = $course->course_code;
//                $enrolment->save();
//            }
//
//        }

//        $lecturers = Lecturer::all();
//
//        foreach ($lecturers as $lecturer){
//
//            $user = new User();
//            $user->name = $lecturer->name;
//            $user->password = Hash::make('test');
//            $user->email = $lecturer->email;
//            $user->role = 'lecturer';
//            //$user->save();
//
//        }

//        $users = User::all();
//
//        foreach ($users as $user){
//            if($user->role == 'lecturer') {
//                $lecturer = Lecturer::where('email', '=', $user->email)->first();
//                if($lecturer!=null) {
//                    $lecturer->user_id = $user->id;
//                    $lecturer->update();
//                }
//            }
//        }



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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}

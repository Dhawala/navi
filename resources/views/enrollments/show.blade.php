@extends('layout.app')
@section('content')
    <a href="/enrollments" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Enrollment</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-4">
                            @csrf
                            @method('put')
                            <label>Student Number</label>
                            <select class="form-control" disabled name="sno" id="sno" data-live-search="true">
                                @foreach($students as $student)
                                    <option value="{{$student->sno}}"{{($student->sno==$enrolment->sno?'selected':'')}}>{{$student->sno}}</option>
                                @endforeach
                            </select>
                            <label>Course Code</label>
                            <select class="form-control" disabled name="course_code" id="course_code" data-live-search="true">
                                @foreach($courses as $course)
                                    <option value="{{$course->course_code}}"{{($student->course_code==$enrolment->course_code?'selected':'')}}>{{$course->course_code}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

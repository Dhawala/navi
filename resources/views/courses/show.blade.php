@extends('layout.app')
@section('content')
    <a href="/buildings" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Building</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Course code</label>
                            <input type="text" class="form-control" name="course_code" id="course_code"
                                   placeholder="Course Code"
                                   required value="{{$course->course_code}}" disabled>

                            <label>Course name</label>
                            <input type="text" class="form-control" name="course_name" id="course_name"
                                   placeholder="Course name"
                                   required value="{{$course->course_name}}" disabled>

                            <label>Department</label>
                            <select class="form-control" name="department" id="department"
                                    required disabled>
                                @foreach($departments as $department)
                                    <option value="{{$department->name}}" {{($department->name==$course->department?'selected':'')}}>{{$department->name}}</option>
                                @endforeach
                            </select>

                            <label>Credits</label>
                            <input type="number" class="form-control" name="credits" id="credits"
                                   placeholder="credits"
                                   required value="{{$course->credits}}" disabled>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout.app')
@section('content')
    <a href="/courses" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Courses</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/courses" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-4">
                                @csrf
                                <label>Course code</label>
                                <input type="text" class="form-control" name="course_code" id="course_code"
                                       placeholder="Course Code"
                                       required>

                                <label>Course name</label>
                                <input type="text" class="form-control" name="course_name" id="course_name"
                                       placeholder="Course name"
                                       required>

                                <label>Department</label>
                                <select class="form-control" name="department" id="department"
                                        required>
                                    @foreach($departments as $department)
                                        <option value="{{$department->name}}">{{$department->name}}</option>
                                    @endforeach
                                </select>

                                <label>Credits</label>
                                <input type="number" class="form-control" name="credits" id="credits"
                                       placeholder="credits"
                                       required>


                            </div>
                            <hr>
                            <input class="btn btn-primary btn-sm" type="submit" id="submit" name="submit"
                                   value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

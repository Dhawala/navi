@extends('layout.app')
@section('content')
    <a href="/enrollments" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Enrollments</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/enrollments/{{$enrollment->id}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-4">
                                @csrf
                                @method('put')
                                <label>Student Number</label>
                                <select class="form-control" name="sno" id="sno" data-live-search="true">
                                    @foreach($students as $student)
                                        <option value="{{$student->sno}}"{{($student->sno==$enrollment->sno?'selected':'')}}>{{$student->sno}}</option>
                                    @endforeach
                                </select>
                                <label>Course Code</label>
                                <select class="form-control" name="course_code" id="course_code" data-live-search="true">
                                    @foreach($courses as $course)
                                        <option value="{{$course->course_code}}"{{($student->course_code==$enrollment->course_code?'selected':'')}}>{{$course->course_code}}</option>
                                    @endforeach
                                </select>

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
@section('script')
    <script>
        $('select').selectpicker();
    </script>
    @endsection

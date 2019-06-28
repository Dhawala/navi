@extends('layout.app')
@section('content')
    <a href="/enrollments" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create enrollments</h1>

    <div class="row">
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Upload Excel</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="/excel" enctype="multipart/form-data" method="post">
                    @csrf
                    <!-- Modal body -->
                        <div class="modal-body">

                            <label>file</label>
                            <input type="file" name="upload_file" multiple>
                        </div>
                    {{--https://handsontable.com/ excel like table--}}
                    <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Upload EXCEL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/enrollments" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-4">
                                @csrf
                                <label>Student Number</label>
                                <select class="form-control" name="sno" id="sno" data-live-search="true">
                                    @foreach($students as $student)
                                        <option value="{{$student->sno}}">{{$student->sno}}</option>
                                    @endforeach
                                </select>
                                <label>Course Code</label>
                                <select class="form-control" name="course_code" id="course_code" data-live-search="true">
                                    @foreach($courses as $course)
                                        <option value="{{$course->course_code}}">{{$course->course_code}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <hr>
                            <input class="btn btn-primary btn-sm" type="submit" id="submit" name="submit"
                                   value="Submit">
                            <span class="float-right">
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><i
                                        class="fa fa-upload"></i>Upload</a>
                            </span>

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

@extends('layout.app')
@section('content')
    <a href="/announcements" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Activity</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/announcements" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-4">
                                @csrf

                                <div class="form-group">
                                    <label>Announcement title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                           placeholder="Announcement title"
                                           required max="10">
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" name="message" id="message"
                                              placeholder="Message"
                                              required></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Course Code</label>
                                    <select class="form-control" name="course_code">
                                        @foreach($courses as $course)
                                            <option value="{{$course->course_code}}">{{$course->course_code}}-{{$course->course_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label>Exp Date</label>
                                <div class="input-group date" id="datetimepicker5" data-target-input="nearest">
                                    <input type="text" name="exp_date" class="form-control datetimepicker-input"
                                           data-target="#datetimepicker5"/>
                                    <div class="input-group-append" data-target="#datetimepicker5"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>

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
        $(function () {
            $('#datetimepicker5').datetimepicker({
                format: 'YYYY-MM-DD H:m'
            });
        });
    </script>
@endsection

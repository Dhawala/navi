@extends('layout.app')
@section('content')
    <a href="/schedules" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit schedule</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/schedules/{{$schedule->id}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    @csrf
                                    @method('PUT')
                                    <label>Activity code</label>
                                    <select class="form-control" name="ac_code" id="ac_code" data-live-search="true">
                                        @foreach($activities as $activity)
                                            <option value="{{$activity->ac_code}}" {{($activity->ac_code==$schedule->ac_code?'selected':'')}}>{{$activity->ac_name}}</option>
                                        @endforeach
                                    </select>

                                    <label>course code</label>
                                    <select class="form-control" name="course_code" id="course_code"
                                            data-live-search="true">
                                        @foreach($courses as $course)
                                            <option value="{{$course->course_code}}" {{($course->course_code==$schedule->course_code?'selected':'')}}>{{$course->course_name}}</option>
                                        @endforeach
                                    </select>

                                    <label>group</label>
                                    <input type="text" class="form-control" name="group" id="group"
                                           placeholder="group"
                                           required value="{{$schedule->group}}">

                                    <label>Medium</label>
                                    <input type="text" class="form-control" name="medium" id="medium"
                                           placeholder="medium"
                                           required value="{{$schedule->medium}}">
                                </div>

                                <div class="col-md-4">
                                    <label>Date</label>
                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                        <input type="text" name="date" class="form-control datetimepicker-input"
                                               data-target="#datetimepicker4" value="{{$schedule->date}}"/>
                                        <div class="input-group-append" data-target="#datetimepicker4"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <label>Start Time</label>
                                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                        <input type="text" name="start_time" class="form-control datetimepicker-input"
                                               data-target="#datetimepicker3" value="{{$schedule->start_time}}"/>
                                        <div class="input-group-append" data-target="#datetimepicker3"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                        </div>
                                    </div>
                                    <label>End Time</label>
                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        <input type="text" name="end_time" class="form-control datetimepicker-input"
                                               data-target="#datetimepicker2" value="{{$schedule->end_time}}"/>
                                        <div class="input-group-append" data-target="#datetimepicker2"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                        </div>
                                    </div>

                                    <label>Centre</label>
                                    <input type="text" class="form-control" name="centre" id="centre"
                                           placeholder="Centre"
                                           required value="{{$schedule->centre}}">
                                </div>

                                <div class="col-md-4">
                                    <label>Location id</label>
                                    <select class="form-control" name="loc_id" id="loc_id" data-live-search="true">
                                        @foreach($locations as $location)
                                            <option value="{{$location->loc_id}}" {{($location->loca_id==$schedule->loca_id?'selected':'')}}>{{$location->loc_name}}</option>
                                        @endforeach
                                    </select>

                                    <label>Classroom id</label>
                                    <select class="form-control" name="room_id" id="room_id" data-live-search="true">
                                        @foreach($rooms as $room)
                                            <option value="{{$room->room_id}}" {{($room->ac_code==$schedule->room_id?'selected':'')}}>{{$room->room_name}}</option>
                                        @endforeach
                                    </select>

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
            $('#datetimepicker4').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('#datetimepicker3').datetimepicker({
                format: 'HH:mm'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'HH:mm'
            });

            $('select').selectpicker();


        });
    </script>
@endsection


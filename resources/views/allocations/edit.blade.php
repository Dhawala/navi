@extends('layout.app')
@section('content')
    <a href="/allocations" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit allocation</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/allocations/{{$allocation->id}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-4">
                                @csrf
                                @method('put')
                                <label>Lecturer no</label>
                                <select class="form-control" name="emp_no" id="emp_no" data-live-search="true">
                                    @foreach($lecturers as $lecturer)
                                        <option value="{{$lecturer->emp_no}}" {{( $lecturer->emp_no==$allocation->emp_no?'selected':'') }}>{{$lecturer->emp_no}}-{{$lecturer->name}}</option>
                                    @endforeach
                                </select>
                                <label>Schedule id</label>
                                <select class="form-control" name="schedule_id" id="schedule_id" data-live-search="true">
                                    @foreach($schedules as $schedule)
                                        <option value="{{$schedule->id}}" {{( $schedule->id==$allocation->schedule_id?'selected':'') }}>{{$schedule->id}}-{{$schedule->course_code}}-{{$schedule->ac_code}}-{{$schedule->date}}</option>
                                    @endforeach
                                </select>
                                <label>class room</label>
                                <select class="form-control" name="room_id" id="room_id" data-live-search="true">
                                    @foreach($rooms as $room)
                                        <option value="{{$room->room_id}}" {{( $room->room_id==$allocation->room_id?'selected':'') }}>{{$room->room_name}}</option>
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

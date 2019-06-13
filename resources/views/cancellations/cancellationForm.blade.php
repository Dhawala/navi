@extends('layout.app')
@section('content')
    <a href="/allocations" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Cancellation Request</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/cancel/{{$allocation->id}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-8">
                                @csrf
                                @method('put')
                                <div class="card mb-4 py-3 p-2 border-left-info">
                                    <table>
                                    <tr>
                                        <td>Lecturer:</td>
                                        <td>
                                            {{$allocation->lecturer->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Schedule:</td>
                                        <td>
                                            {{$allocation->schedule->course_code.' - '.$allocation->schedule->ac_name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date:</td>
                                        <td>{{$allocation->schedule->date}}</td>
                                    </tr>
                                    <tr>
                                        <td>From:</td>
                                        <td>{{$allocation->schedule->start_time}}</td>
                                    </tr>
                                    <tr>
                                        <td>To:</td>
                                        <td>{{$allocation->schedule->end_time}}</td>
                                    </tr>
                                    <tr>
                                        <td>Class room:</td>
                                        <td>{{$allocation->room->room_name}}</td>
                                    </tr>
                                    </table>
                                </div>
                                <label>Message to Students</label>
                                <textarea class="form-control" rows="5" name="student_message" id="student_message" >
                                </textarea>
                                <label>Message to Staff</label>
                                <textarea class="form-control" rows="5" name="staff_message" id="staff_message" >
                                </textarea>

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

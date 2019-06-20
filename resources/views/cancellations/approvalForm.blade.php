@extends('layout.app')
@section('content')
    <a href="/allocations" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Approve/Reject</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/approval/{{$allocation->id}}" method="POST" enctype="multipart/form-data">
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
                                    <tr>
                                        <td>Student Message:</td>
                                        <td>{{$allocation->cancellation->student_message}}</td>
                                    </tr>
                                    <tr>
                                        <td>Staff Message:</td>
                                        <td>{{$allocation->cancellation->staff_message}}</td>
                                    </tr>
                                    </table>
                                </div>

                            </div>
                            <hr>
                            <input class="btn btn-success btn-sm" type="submit" id="submit" name="approve"
                                   value="Approve">
                            <input class="btn btn-danger btn-sm" type="submit" id="submit" name="reject"
                                   value="Reject">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

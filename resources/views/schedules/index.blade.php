@extends('layout.app')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">schedules <a href="/schedules/create" class="btn btn-primary btn-sm"><i
                    class="fa fa-plus-square"></i> New schedule</a></h1>

    <div class="row">
        <div class="col-md-12">
            {{--data table--}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="scheduleTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                            <tr>
                                <th>Activity code</th>
                                <th>course code</th>
                                <th>course name</th>
                                <th>date</th>
                                <th>start time</th>
                                <th>end time</th>
                                <th>room id</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Activity code</th>
                                <th>course code</th>
                                <th>course name</th>
                                <th>date</th>
                                <th>start time</th>
                                <th>end time</th>
                                <th>room id</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
{{--
                            @if(count($schedules)>0)
                                @foreach($schedules as $schedule)
                                    <tr>
                                        <td><a href="/schedules/{{$schedule->id}}">{{$schedule->ac_code}}</a></td>
                                        <td>{{$schedule->course_code}}</td>
                                        <td>{{$schedule->date}}</td>
                                        <td>{{$schedule->start_time}}</td>
                                        <td>{{$schedule->end_time}}</td>
                                        <td>{{$schedule->room_id}}</td>
                                        <td>
                                            @if(!Auth::guest())
                                                <a href="/schedules/{{$schedule->id}}/edit"
                                                   class="btn btn-primary btn-sm btn-circle"><i
                                                            class="fa fa-edit"></i></a>
                                                <form action="/schedules/{{$schedule->id}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" id="submit"
                                                            class="btn btn-danger btn-sm btn-circle"><i
                                                                class="fa fa-trash "></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#scheduleTable').DataTable( {
                processing: true,
                serverSide: true,
                "ajax": 'data/schedules',
                columns: [
                    { data: 'ac_code', name: 'ac_code' },
                    { data: 'course_code', name: 'course_code' },
                    { data: 'ac_name', name: 'ac_name' },
                    { data: 'date', name: 'date' },
                    { data: 'start_time', name: 'start_time' },
                    { data: 'end_time', name: 'end_time' },
                    { data: 'room_id', name: 'room_id' },
                    { data: 'action', orderable: false, searchable: false},
                ]
            } );
        } );
    </script>
    @endsection
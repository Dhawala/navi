@extends('layout.app')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">enrollments <a href="/enrollments/create" class="btn btn-primary btn-sm"><i
                    class="fa fa-plus-square"></i> New Enrollment</a></h1>

    <div class="row">
        <div class="col-md-12">
            {{--data table--}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="enrollmentsTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                            <tr>
                                <th>Student number</th>
                                <th>course code</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Student number</th>
                                <th>course code</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            {{--@if(count($enrollments)>0)--}}
                                {{--@foreach($enrollments as $enrollment)--}}
                                    {{--<tr>--}}
                                        {{--<td><a href="/enrollments/{{$enrollment->id}}">{{$enrollment->sno}}</a></td>--}}
                                        {{--<td>{{$enrollment->course_code}}</td>--}}
                                        {{--<td>--}}
                                            {{--@if(!Auth::guest())--}}
                                                {{--<a href="/enrollments/{{$enrollment->id}}/edit"--}}
                                                   {{--class="btn btn-primary btn-sm btn-circle"><i--}}
                                                            {{--class="fa fa-edit"></i></a>--}}
                                                {{--<form action="/enrollments/{{$enrollment->id}}" method="POST" class="d-inline">--}}
                                                    {{--@csrf--}}
                                                    {{--@method('DELETE')--}}
                                                    {{--<button type="submit" id="submit"--}}
                                                            {{--class="btn btn-danger btn-sm btn-circle"><i--}}
                                                                {{--class="fa fa-trash "></i></button>--}}
                                                {{--</form>--}}
                                            {{--@endif--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
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
            $('#enrollmentsTable').DataTable( {
                processing: true,
                serverSide: true,
                "ajax": 'data/enrollments',
                columns: [
                    { data: 'sno' },
                    { data: 'course_code' },
                    { data: 'action', orderable: false, searchable: false},
                ]
            } );
        } );

    </script>
@endsection
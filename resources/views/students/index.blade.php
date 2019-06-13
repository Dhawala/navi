@extends('layout.app')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Students <a href="/students/create" class="btn btn-primary btn-sm"><i
                    class="fa fa-plus-square"></i> New Sudent</a></h1>

    <div class="row">
        <div class="col-md-12">
            {{--data table--}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="studentsTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                            <tr>
                                <th>SNO</th>
                                <th>REG</th>
                                <th>NIC</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SNO</th>
                                <th>REG</th>
                                <th>NIC</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            {{--@if(count($students)>0)--}}
                                {{--@foreach($students as $student)--}}
                                    {{--<tr>--}}
                                        {{--<td><a href="/students/{{$student->id}}">{{$student->sno}}</a></td>--}}
                                        {{--<td>{{$student->reg_no}}</td>--}}
                                        {{--<td>{{$student->nic}}</td>--}}
                                        {{--<td>{{$student->name}}</td>--}}
                                        {{--<td>{{$student->email}}</td>--}}
                                        {{--<td>{{$student->contact}}</td>--}}
                                        {{--<td>--}}
                                            {{--@if(!Auth::guest())--}}
                                                {{--<a href="/students/{{$student->id}}/edit"--}}
                                                   {{--class="btn btn-primary btn-sm btn-circle"><i--}}
                                                            {{--class="fa fa-edit"></i></a>--}}
                                                {{--<form action="/students/{{$student->id}}" method="POST" class="d-inline">--}}
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
            $('#studentsTable').DataTable( {
                processing: true,
                serverSide: true,
                "ajax": 'data/students',
                columns: [
                    { data: 'sno' },
                    { data: 'reg_no' },
                    { data: 'nic' },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'contact' },
                    { data: 'action', orderable: false, searchable: false},
                ]
            } );
        } );

    </script>
    @endsection
@extends('layout.app')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">courses <a href="/courses/create" class="btn btn-primary btn-sm"><i
                    class="fa fa-plus-square"></i> New course</a></h1>

    <div class="row">
        <div class="col-md-12">
            {{--data table--}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                            <tr>
                                <th>Course code</th>
                                <th>Course name</th>
                                <th>Department</th>
                                <th>Credits</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Course code</th>
                                <th>Course name</th>
                                <th>Department</th>
                                <th>Credits</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if(count($courses)>0)
                                @foreach($courses as $course)
                                    <tr>
                                        <td><a href="/courses/{{$course->id}}">{{$course->course_code}}</a></td>
                                        <td>{{$course->course_name}}</td>
                                        <td>{{$course->department}}</td>
                                        <td>{{$course->credits}}</td>
                                        <td>
                                            @if(!Auth::guest())
                                                <a href="/courses/{{$course->id}}/edit"
                                                   class="btn btn-primary btn-sm btn-circle"><i
                                                            class="fa fa-edit"></i></a>
                                                <form action="/courses/{{$course->id}}" method="POST" class="d-inline">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
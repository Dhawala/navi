@extends('layout.app')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Announcements <a href="/announcements/create" class="btn btn-primary btn-sm"><i
                    class="fa fa-plus-square"></i> New Announcement</a></h1>

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
                                <th>Course</th>
                                <th>Expire on</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Course</th>
                                <th>Expire on</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if(count($announcements)>0)
                                @foreach($announcements as $announcement)
                                    <tr>
                                        <td>{{ $announcement->course_code }}</td>
                                        <td>{{ $announcement->exp_date }}</td>
                                        <td><a href="/announcements/{{$announcement->id}}">{{$announcement->title}}</a></td>
                                        <td>{{ $announcement->message }}</td>
                                        <td>
                                            @if(!Auth::guest())
                                                <a href="/announcements/{{$announcement->id}}/edit"
                                                   class="btn btn-primary btn-sm btn-circle"><i
                                                            class="fa fa-edit"></i></a>
                                                <form action="/announcements/{{$announcement->id}}" method="POST" class="d-inline">
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
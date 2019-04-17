@extends('layout.app')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Class Rooms <a href="/rooms/create" class="btn btn-primary btn-sm"><i
                    class="fa fa-plus-square"></i> New Class Room</a></h1>

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
                                <th>Classroom id</th>
                                <th>Classroom name</th>
                                <th>description</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Classroom id</th>
                                <th>Classroom name</th>
                                <th>description</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if(count($rooms)>0)
                                @foreach($rooms as $room)
                                    <tr>
                                        <td><a href="/rooms/{{$room->id}}">{{$room->room_id}}</a></td>
                                        <td>{{$room->room_name}}</td>
                                        <td>{{$room->description}}</td>
                                        <td>
                                            @if(!Auth::guest())
                                                <a href="/rooms/{{$room->id}}/edit"
                                                   class="btn btn-primary btn-sm btn-circle"><i
                                                            class="fa fa-edit"></i></a>
                                                <form action="/rooms/{{$room->id}}" method="POST"
                                                      class="d-inline">
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
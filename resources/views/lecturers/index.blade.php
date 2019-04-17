@extends('layout.app')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Lecturers <a href="/lecturers/create" class="btn btn-primary btn-sm"><i
                    class="fa fa-plus-square"></i> New Lecturer</a></h1>

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
                                <th>EMP No</th>
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
                                <th>EMP No</th>
                                <th>NIC</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if(count($lecturers)>0)
                                @foreach($lecturers as $lecturer)
                                    <tr>
                                        <td><a href="/lecturers/{{$lecturer->id}}">{{$lecturer->emp_no}}</a></td>
                                        <td>{{$lecturer->nic}}</td>
                                        <td>{{$lecturer->name}}</td>
                                        <td>{{$lecturer->email}}</td>
                                        <td>{{$lecturer->contact}}</td>
                                        <td>
                                            @if(!Auth::guest())
                                                <a href="/lecturers/{{$lecturer->id}}/edit"
                                                   class="btn btn-primary btn-sm btn-circle"><i
                                                            class="fa fa-edit"></i></a>
                                                <form action="/lecturers/{{$lecturer->id}}" method="POST" class="d-inline">
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
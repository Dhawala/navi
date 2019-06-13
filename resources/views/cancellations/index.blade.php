@extends('layout.app')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Cancel My Allocations</h1>

    <div class="row">
        <div class="col-md-12">
            {{--data table--}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="allocationCancellationTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                            <tr>
                                <th>Emp number</th>
                                <th>name</th>
                                <th>schedule id</th>
                                <th>schedule info</th>
                                <th>class room</th>
                                <th>Cancel</th>
                            </tr>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Emp number</th>
                                <th>name</th>
                                <th>schedule id</th>
                                <th>schedule info</th>
                                <th>class room</th>
                                <th>Cancel</th>
                            </tr>
                            </tfoot>
                            <tbody>
{{--
                            @if(count($allocationCancellations)>0)
                                @foreach($allocationCancellations as $allocation)
                                    <tr>
                                        <td><a href="/allocations/{{$allocation->id}}">{{$allocation->emp_no}}</a></td>
                                        <td>{{$allocation->schedule_id}}</td>
                                        <td>{{$allocation->room_id}}</td>
                                        <td>
                                            @if(!Auth::guest())
                                                <a href="/allocations/{{$allocation->id}}/edit"
                                                   class="btn btn-primary btn-sm btn-circle"><i
                                                            class="fa fa-edit"></i></a>
                                                <form action="/allocations/{{$allocation->id}}" method="POST" class="d-inline">
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
            $('#allocationCancellationTable').DataTable( {
                processing: true,
                serverSide: true,
                "ajax": 'data/allocations',
                columns: [
                    { data: 'emp_no' },
                    { data: 'lecturer.name' },
                    { data: 'schedule_id' },
                    { data: 'schedule_info' },
                    { data: 'room_id' },
                    { data: 'cancel_alloc' },
                ]
            } );
        } );

    </script>
@endsection
@extends('layout.app')

@section('content')
        <div class="row">
            @if(auth()->user()->role=='lecturer')
            <div class="col-md-8 mb-4">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">My Allocations</h6>
                    </div>
                    <div class="card-body">

                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                        <tr>
                            <th>Activity code</th>
                            <th>course code</th>
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
                                    <td><a href="/schedules/{{$schedule->id}}">{{$schedule->ac_code}}</a>
                                    </td>
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
                                            <form action="/schedules/{{$schedule->id}}" method="POST"
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
--}}
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
            @endif
            <div class=" col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> Schedules</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                {{--@if(count($schedules)>0)--}}
                                    {{--@foreach($schedules as $schedule)--}}
                                        {{--<tr>--}}
                                            {{--<td><a href="/schedules/{{$schedule->id}}">{{$schedule->ac_code}}</a>--}}
                                            {{--</td>--}}
                                            {{--<td>{{$schedule->course_code}}</td>--}}
                                            {{--<td>{{$schedule->date}}</td>--}}
                                            {{--<td>{{$schedule->start_time}}</td>--}}
                                            {{--<td>{{$schedule->end_time}}</td>--}}
                                            {{--<td>{{$schedule->room_id}}</td>--}}
                                            {{--<td>--}}
                                                {{--@if(!Auth::guest())--}}
                                                    {{--<a href="/schedules/{{$schedule->id}}/edit"--}}
                                                       {{--class="btn btn-primary btn-sm btn-circle"><i--}}
                                                                {{--class="fa fa-edit"></i></a>--}}
                                                    {{--<form action="/schedules/{{$schedule->id}}" method="POST"--}}
                                                          {{--class="d-inline">--}}
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
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-header">Map</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <style>
                            /* Set the size of the div element that contains the map */
                            #map {
                                height: 400px; /* The height is 400 pixels */
                                width: 100%; /* The width is the width of the web page */
                            }
                        </style>
                        <!--The div element for the map -->
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var ousl = {lat: 6.883275512259618, lng: 79.88666577688832};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 18, center: ousl});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: ousl, map: map});

            var building_catcher=[];
            $.ajax({
                method: "GET",
                url: '/api/buildings',
            }).done(function (data,status) {
                    //console.log(data);
                    $.each(data.data,function (k,v) {
                        //console.log(v.coordinates);
                        var ob = $.parseJSON(v.coordinates);
                        console.log(ob);

                        building_catcher[k] = new google.maps.Polygon({
                            paths: ob,
                            strokeColor: (k==3?'000000':'#FF0000'),
                            strokeOpacity: 0.8,
                            strokeWeight: (k==3?2:0.5),
                            fillColor: '#FFD47D',
                            fillOpacity: (k==3?0:1)
                        });

                        building_catcher[k].setMap(map);
                    });
            });

        }

        $(document).ready(function() {
            $('#scheduleTable').DataTable( {
                processing: true,
                serverSide: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
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
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7jUUkegCF8PMXANQraSgm9XGp9oBAvyI&callback=initMap">
    </script>
@endsection

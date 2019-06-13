@extends('layout.app')
@section('style')
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px; /* The height is 400 pixels */
            width: 100%; /* The width is the width of the web page */
        }
    </style>
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Buildings <a href="/buildings/create" class="btn btn-primary btn-sm"><i
                    class="fa fa-plus-square"></i> New Building</a></h1>

    <div class="row">
        <div class="col-md-5">
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
                                <th>Building id</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Building id</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if(count($buildings)>0)
                                @foreach($buildings as $building)
                                    <tr>
                                        <td><a href="/buildings/{{$building->id}}">{{$building->bul_id}}</a></td>
                                        <td>
                                            @if(!Auth::guest())
                                                <a href="/buildings/{{$building->id}}/edit"
                                                   class="btn btn-primary btn-sm btn-circle"><i
                                                            class="fa fa-edit"></i></a>
                                                <form action="/buildings/{{$building->id}}" method="POST"
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
        <div class="col-md-7">
        <div class="card">
            <div class="card-body">
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
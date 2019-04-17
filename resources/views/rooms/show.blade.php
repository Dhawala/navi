@extends('layout.app')
@section('content')
    <a href="/locations" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Location</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Location id</label>
                            <input type="text" class="form-control" name="loc_id" id="loc_id"
                                   placeholder="Location id"
                                   required value="{{$location->loc_id}}" disabled>
                            <label>Location name</label>
                            <input type="text" class="form-control" name="loc_name" id="loc_name"
                                   placeholder="Location name"
                                   required value="{{$location->loc_name}}" disabled>
                            <label>Longitude</label>
                            <input type="text" class="form-control" name="longitude" id="longitude"
                                   placeholder="Longitude"
                                   required value="{{$location->longitude}}" disabled>
                            <label>latitude</label>
                            <input type="text" class="form-control" name="latitude" id="latitude"
                                   placeholder="Latitude"
                                   required value="{{$location->latitude}}" disabled>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

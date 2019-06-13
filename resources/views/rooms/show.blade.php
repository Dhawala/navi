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
                            <label>Room id</label>
                            <input type="text" class="form-control" name="room_id" id="room_id"
                                   placeholder="Room id"
                                   required value="{{$room->room_id}}">
                            <label>Room name</label>
                            <input type="text" class="form-control" name="room_name" id="room_name"
                                   placeholder="Room name"
                                   required value="{{$room->room_name}}">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="description"
                                      placeholder="Description">{{$room->description}}</textarea>
                            <label>Location id</label>
                            <select class="form-control" name="loc_id" id="loc_id">
                                @foreach($locations as $location)
                                    <option value="{{$location->loc_id}}" {{($location->loc_id==$room->loc_id?'selected':'')}}>{{$location->loc_name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout.app')
@section('content')
    <a href="/buildings" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Building</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Building id</label>
                            <input type="number" class="form-control" name="bul_id" id="bul_id"
                                   placeholder="Building id"
                                   required value="{{$building->bul_id}}" disabled>
                            <label>Coordinates</label>
                            <textarea class="form-control" name="coordinates" id="coordinates"
                                      placeholder="Coordinates"
                                      required disabled>{{$building->coordinates}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

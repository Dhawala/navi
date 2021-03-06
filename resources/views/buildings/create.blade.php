
@extends('layout.app')
@section('content')
    <a href="/buildings" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Buildings</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/buildings" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-4">
                                @csrf
                                <label>Building id</label>
                                <input type="number" class="form-control" name="bul_id" id="bul_id"
                                       placeholder="Building id"
                                       required>
                                <label>Coordinates</label>
                                <textarea class="form-control" name="coordinates" id="coordinates"
                                       placeholder="Coordinates"
                                          required></textarea>
                            </div>
                            <hr>
                            <input class="btn btn-primary btn-sm" type="submit" id="submit" name="submit"
                                   value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

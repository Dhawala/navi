@extends('layout.app')
@section('content')
    <a href="/activities" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Activity</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/activities" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-4">
                                @csrf
                                <label>Activity code</label>
                                <input type="text" class="form-control" name="ac_code" id="ac_code"
                                       placeholder="Activity Code"
                                       required max="10">
                                <label>Activity Name</label>
                                <input type="text" class="form-control" name="ac_name" id="ac_name"
                                       placeholder="Activity Name"
                                       required max="45">
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

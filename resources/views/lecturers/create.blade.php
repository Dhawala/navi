@extends('layout.app')
@section('content')
    <a href="/lecturers" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Lecturer</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/lecturers" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-4">
                                @csrf

                                <label>Emp no</label>
                                <input type="number" class="form-control" name="emp_no" id="emp_no"
                                       placeholder="Emp no"
                                       required>

                                <label>NIC</label>
                                <input type="text" class="form-control" name="nic" id="nic"
                                       placeholder="NIC"
                                       required>

                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Name"
                                       required>

                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Email"
                                       required>

                                <label>Contact</label>
                                <input type="text" class="form-control" name="contact" id="contact"
                                       placeholder="Contact"
                                       required>

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

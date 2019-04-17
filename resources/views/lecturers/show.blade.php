@extends('layout.app')
@section('content')
    <a href="/lecturers" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Lecturer</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Emp no</label>
                            <input type="number" class="form-control" name="emp_no" id="emp_no"
                                   placeholder="Emp no"
                                   required value="{{$lecturer->emp_no}}" disabled>

                            <label>NIC</label>
                            <input type="text" class="form-control" name="nic" id="nic"
                                   placeholder="NIC"
                                   required value="{{$lecturer->nic}}" disabled>

                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   placeholder="Name"
                                   required value="{{$lecturer->name}}" disabled>

                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="Email"
                                   required value="{{$lecturer->email}}" disabled>

                            <label>Contact</label>
                            <input type="text" class="form-control" name="contact" id="contact"
                                   placeholder="Contact"
                                   required value="{{$lecturer->contact}}" disabled>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

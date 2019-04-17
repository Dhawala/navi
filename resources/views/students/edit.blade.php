@extends('layout.app')
@section('content')
    <a href="/students" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Student</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/students/{{$student->id}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-4">
                                    @csrf
                                    @method('put')
                                    <label>SNO</label>
                                    <input type="text" class="form-control" name="sno" id="sno"
                                           placeholder="Student Number"
                                           required value="{{$student->sno}}">

                                    <label>REG No</label>
                                    <input type="text" class="form-control" name="reg_no" id="reg_no"
                                           placeholder="REG No"
                                           required value="{{$student->reg_no}}">

                                    <label>NIC</label>
                                    <input type="text" class="form-control" name="nic" id="nic"
                                           placeholder="NIC"
                                           required value="{{$student->nic}}">

                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="Name"
                                           required value="{{$student->name}}">

                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="Email"
                                           required value="{{$student->email}}">

                                    <label>Contact</label>
                                    <input type="text" class="form-control" name="contact" id="contact"
                                           placeholder="Contact"
                                           required value="{{$student->contact}}">

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

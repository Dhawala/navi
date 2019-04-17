@extends('layout.app')
@section('content')
    <a href="/posts" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Post</h1>

    <div class="row">
        <div class="col-md-12">
            <form action="/posts" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" required >
                    <label>Body</label>
                    <textarea class="form-control" name="body" id="article-ckeditor" placeholder="Body" required></textarea>
                    <input type="file" class="btn btn-sm btn-primary" name="cover_image" id="cover_image">
                    <hr>
                    <input type="submit" id="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection

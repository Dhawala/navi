@extends('layout.app')
@section('content')
    <!-- Page Heading -->
    <a href="/posts" class=""><i class="fa fa-arrow-alt-circle-left"></i> Go Back </a>
    <div class="row">
        <div class="col-md-12">
            <h1 class="h3 mb-4 text-gray-800">{{$post->title}}</h1>
            <img style="width: 100%" src="{{asset('storage/cover_images/'.$post->cover_image)}}">
            <p>{!! $post->body !!}</p>
            <small>{{$post->created_at}}</small>
            <hr>
            @if(!Auth::guest())
                @if(auth()->user()->id == $post->user_id )
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                        Edit</a>
                    <form action="/posts/{{$post->id}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash "></i>
                            Delete
                        </button>
                    </form>
                @endif
            @endif
        </div>
    </div>

@endsection

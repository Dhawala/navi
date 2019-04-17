@extends('layout.app')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Posts <a href="/posts/create" class="btn btn-primary btn-sm"><i
                    class="fa fa-plus-square"></i> New post</a></h1>

    <div class="row">
        <div class="col-md-12">
            @if(count($posts)>0)
                @foreach($posts as $post)
                    <div class="card mb-4 py-3 border-left-primary">
                        <div class="card-body">
                            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <img style="width: 100%" src="{{asset('storage/cover_images/'.$post->cover_image)}}">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <p>{!! $post->body !!}</p>
                                    <small>{{$post->created_at}} by: {{$post->user->name}}</small>
                                </div>
                            </div>
                            <hr>
                            @if(!Auth::guest())
                                @if(auth()->user()->id == $post->user_id )
                                    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm btn-circle"><i
                                                class="fa fa-edit"></i></a>
                                    <form action="/posts/{{$post->id}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="submit" class="btn btn-danger btn-sm btn-circle"><i
                                                    class="fa fa-trash "></i></button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
                {{$posts->links()}}
            @endif
        </div>
    </div>
@endsection
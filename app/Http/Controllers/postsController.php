<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;

class postsController extends Controller
{

    /**
     * postsController constructor.
     */
    public function __construct()
    {

        $this->middleware('auth', ['except' => ['index', 'show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->paginate(2);

        return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //file Upload

        if($request->hasFile('cover_image')){
            //file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            //just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            //jus ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = $filename.'_'.auth()->user()->id.'_'.time().'.'.$extension;

            //upload
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.png';
        }

        $post = new Post();

        $post->title = $request->title;

        $post->body = $request->body;

        $post->user_id = auth()->user()->id;

        $post->cover_image = $fileNameToStore;

        $post->save();

        return redirect('/posts')->with('success', 'Post Saved Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);

        return view('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id != $post->user_id) {

            return redirect('posts')->with('error', 'Unauthorised action');

        }

        return view('posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //file Upload

        if($request->hasFile('cover_image')){
            //file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            //just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            //jus ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = $filename.'_'.auth()->user()->id.'_'.time().'.'.$extension;

            //upload
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }

        $post = Post::find($id);

        $post->title = $request->title;

        $post->body = $request->body;

        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect('/posts')->with('success', 'Post Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id != $post->user_id) {

            return redirect('posts')->with('error', 'Unauthorised action');

        }

        if($post->cover_image!='noimage.png'){
            //delete image.
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();

        return redirect('/posts')->with('success', 'Deleted successfully');

    }
}

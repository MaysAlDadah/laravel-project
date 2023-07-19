<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Validation\ValidationException;

class PostController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $posts = $user->posts()->get();

        return view('posts.index', compact('posts'));
//
//         $posts = Post::all();
//
//        return view('posts.index', compact('posts'));
//        date_date_set($posts);
//        $user = Auth::user();
//        $posts = $user->posts;
//
//        return view('posts', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'contents' => 'required',
        ]);

//        Auth::user()->posts()->create([
//            'title' => $request->title,
//            'content' => $request->content,
//        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->contents;
        $post->user_id = Auth::user()->id;
        $post->save();


        return redirect()->route('posts.index')->with('Post created successfully');
    }

    public
    function show(Post $post)
    {
        //
    }

    public
    function edit(Post $post)
    {
        return view('posts.edit', compact('post'));

    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('Post deleted successfully');
    }



    public function apiIndex()
    {
        $posts = Post::all();

        return response()->json($posts);
    }

    public function apiStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($post, 201);
    }

    public function apiShow(Post $post)
    {
        return response()->json($post);
    }

    public function apiUpdate(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($post);
    }

    public function apiDestroy(Post $post)
    {
        $post->delete();

        return response()->json('Post deleted', 204);
    }
}


<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class APIPostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return response()->json($posts);
    }

}

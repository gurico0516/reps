<?php

namespace App\Http\Controllers;

use App\Entities\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('index', ['posts' => $posts]);
    }
}

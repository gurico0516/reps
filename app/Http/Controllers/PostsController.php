<?php

namespace App\Http\Controllers;

use App\Entities\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * 投稿一覧
     *
     * @return View
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('index', ['posts' => $posts]);
    }

    /**
     * 投稿詳細
     *
     * @return View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('show', ['post' => $post]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Entities\Post;
use App\Services\PostService;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var PostService $service
     */
    private $service;

    /**
     * constructor
     *
     * @param PostService $service
     */
    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    /**
     * 投稿一覧を表示する
     *
     * @return View
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('index', ['posts' => $posts]);
    }

    /**
     * 投稿詳細を表示する
     *
     * @return View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('show', ['post' => $post]);
    }

    /**
     * 投稿画面を表示する
     *
     * @return View
     */
    public function create(Request $request)
    {
        // バリデーション後の保存された値は不要なのでクリア
        Session::put(Request::class, $request->all());
        return view('create');
    }

    /**
     * 登録完了画面を表示する
     *
     * @return View
     */
    public function getCreateComplete()
    {
        Session::forget(Request::class);
        return view('create-complete');
    }

    /**
     * 登録完了ボタンを押下する
     *
     * @return RedirectResponse
     * @throws Exception | Throwable
     */
    public function postCreateComplete(PostRequest $request)
    {
        // Formの値を取得する
        $inputs = $request->all();

        $this->service->store($inputs);

        // ブラウザリロードによる２重送信対策
        Session::regenerateToken();

        return Redirect::route('get-create-complete')->with('poststatus', '投稿しました！');;
    }


}

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
        $this->middleware('auth')->except('index');
        $this->service = $service;
    }

    /**
     * 投稿一覧を表示する
     *
     * @return View
     */
    public function index(Post $post)
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('index', ['posts' => $posts, 'postId' => $post->id]);
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

        return Redirect::route('get-create-complete')->with('poststatus', '投稿しました！');
    }

    public function edit(Post $post)
    {
        if (empty(Session::getOldInput())) {
            $inputs = $post->toArray();
            $this->flashInputToSessionForForward($inputs);
        }

        // Session::put(PostCreateRequest::class, $request->all());
        return view("edit", ['postId' => $post->id]);
    }

    /**
     * 編集完了画面を表示する
     *
     * @return View
     */
    public function getEditComplete()
    {
        Session::forget(PostRequest::class);
        return view("edit-complete");
    }

    /**
     * 編集完了ボタンを押下する
     *
     * @param Post $post 投稿内容
     * @return RedirectResponse
     * @throws Exception | Throwable
     */
    public function postEditComplete(Post $post, PostRequest $request)
    {
        $inputs = $request->all();

        $this->service->store($inputs, $post);
        // ブラウザリロードによる２重送信対策
        Session::regenerateToken();

        return Redirect::route("get-edit-complete")->with('editstatus', '編集しました！');
    }

     /**
     * 削除確認画面を表示する
     *
     * @param Post $post 投稿内容
     * @return View
     */
    public function getDeleteConfirm(Post $post)
    {
        return view("delete-confirm", ['post' => $post]);
    }

    /**
     * 削除完了画面を表示する
     *
     * @return View
     */
    public function getDeleteComplete()
    {
        return view("delete-complete");
    }

    /**
     * 削除完了ボタンを押下する
     *
     * @param Post $post 投稿
     * @return RedirectResponse
     * @throws Exception | Throwable
     */
    public function postDeleteComplete(Post $post)
    {
        $this->service->delete($post);

        // ブラウザリロードによる２重送信対策
        Session::regenerateToken();

        return Redirect::route("get-delete-complete")->with('deletestatus', '削除しました！');
    }
}

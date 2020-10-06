<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Front\UserRequest;
use App\Services\Front\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @var UserService $service
     */
    private $service;

    /**
     * constructor.
     *
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * 登録画面を表示する
     *
     * @return View
     */
    public function create()
    {
        // バリデーション後の保存された値は不要なのでクリア
        Session::forget(UserRequest::class);
        return view("user.create");
    }

    /**
     * 登録確認画面を表示する
     *
     * @return View
     */
    public function getCreateConfirm()
    {
        return view("user.create-confirm");
    }

    /**
     * 確認画面から戻り登録画面を表示する
     *
     * @return RedirectResponse
     */
    public function getCreateFromConfirm()
    {
        Session::flashInput(Session::get(UserRequest::class));
        return Redirect::route("user::create");
    }

    /**
     * 登録確認ボタンを押下する
     *
     * @param UserRequest $request リクエスト
     * @return View
     */
    public function postCreateConfirm(UserRequest $request)
    {
        Session::put(UserRequest::class, $request->all());
        return view("user.create-confirm");
    }

    /**
     * 登録完了画面を表示する
     *
     * @return View
     */
    public function getCreateComplete()
    {
        Session::forget(UserRequest::class);
        return view("user.create-complete");
    }

    /**
     * 登録完了ボタンを押下する
     *
     * @return RedirectResponse
     * @throws Exception|Throwable
     */
    public function postCreateComplete()
    {
        // Formの値を取得する
        $form = Session::get(UserRequest::class);
        $this->service->store($form);
        $this->service->notifyForAdmin($form);

        // ブラウザリロードによる２重送信対策
        Session::regenerateToken();

        return Redirect::route("user::get-create-complete");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * メニューからの遷移判別
     *
     * @var string
     */
    const FROM_MENU = 'menu';

    /**
     * メニューからの遷移か判別
     * メニューのURLに？from=menuを追加してそのキー有無で判別
     *
     * @param string $fromMenuKey
     * @return boolean true:メニューからの遷移 false:メニュー以外からの遷移
     */
    protected function isTransitionFromMenu(string $fromMenuKey)
    {
        $from = request()->query('from');
        if (!is_null($from) && $from == self::FROM_MENU) {
            Session::put($fromMenuKey, true);
        }
        return Session::get($fromMenuKey) === true;
    }


    /**
     * forward（画面初期表示 GET）でもredirect（入力 POST）同様にSession::flashInputを使用するとold inputのセッションが破棄されない
     * Session::nowを使用することで破棄させる
     *
     * @param mixed $values
     * @return void
     */
    protected function flashInputToSessionForForward($values)
    {
        array_walk_recursive($values, function (&$value) {
            $value = (string) $value;
        });
        Session::now('_old_input', $values);
    }
}

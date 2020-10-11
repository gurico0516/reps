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

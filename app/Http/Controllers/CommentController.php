<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    /**
     * バリデーション、登録データの整形など
     */
    public function store(CommentRequest $request)
    {
        $savedata = [
            'post_id' => $request->post_id,
            'name' => $request->name,
            'comment' => $request->comment,
        ];

        $comment = new Comment;
        $comment->fill($savedata)->save();

        return redirect()->route('show', [$savedata['post_id']])->with('commentstatus','コメントを投稿しました');
    }
}

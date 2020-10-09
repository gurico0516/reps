<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Comment;
use App\Services\CommentService;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    /**
     * @var CommentService $service
     */
    private $service;

    /**
     * constructor
     *
     * @param CommentService $service
     */
    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }

    /**
     * コメントを投稿する
     *
     * @return RedirectResponse
     * @throws Exception | Throwable
     */
    public function postComment(CommentRequest $request, Commment $entity)
    {
        $inputs = $request->all();

        $id = $entity->post_id;

        $this->service->store($inputs);

        return Redirect::route('show', ['id', $id])->with('commentstatus','コメントを投稿しました');;
    }
}

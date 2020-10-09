<?php

namespace App\Services;

use App\Entities\Comment;

class CommentService
{
    /**
     * 保存する
     *
     * @param array $inputs 入力値
     * @param Comment $Comment 投稿
     * @return void
     * @throws Exception | Throwable
     */
    public function store(array $inputs, $entity = null)
    {
        if (is_null($entity)) {
            $entity = Comment::make();
        }

        $entity->post_id = $inputs['post_id'];
        $entity->name = $inputs['name'];
        $entity->comment = $inputs['comment'];

        $entity->save();
    }
}

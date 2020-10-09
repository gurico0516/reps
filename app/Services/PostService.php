<?php

namespace App\Services;

use App\Entities\Post;

class PostService
{
    /**
     * 保存する
     *
     * @param array $inputs 入力値
     * @param Post $post 投稿
     * @return void
     * @throws Exception | Throwable
     */
    public function store(array $inputs, Post $entity = null)
    {
        if (is_null($entity)) {
            $entity = Post::make();
        }

        $entity->name = $inputs['name'];
        $entity->subject = $inputs['subject'];
        $entity->message = $inputs['message'];

        $entity->save();
    }
}

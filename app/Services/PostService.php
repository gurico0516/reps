<?php

namespace App\Services;

use App\Entities\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
    /**
     * 検索画面用の絞り込み条件を生成する
     *
     * @param array $inputs フォーム入力値
     * @return Builder クエリ　
     */
    public function createBuiiderForSearch(array $inputs)
    {
        /**
         * @var Builder $query
         */
        $query = Post::query();

        // 爬虫類の検索
        if (isset($inputs['subject'])) {
            $query->where('subject', '=', $inputs['subject']);
        }

        // 並び順
        $query->orderby('id', 'asc');

        return $query;
    }

    /**
     * 保存する
     *
     * @param array $inputs 入力値
     * @param Post $post 投稿内容
     * @return void
     * @throws Exception | Throwable
     */
    public function store(array $inputs, Post $entity = null)
    {
        if (is_null($entity)) {
            $entity = Post::make();
        }

        $entity->user_id = Auth::id();
        $entity->name = $inputs['name'];
        $entity->subject = $inputs['subject'];
        $entity->message = $inputs['message'];
        $filename = file('image_file')->store('public');
        $entity->image_file = str_replace('public/', '', $filename);

        $entity->save();
    }

    /**
     * 削除する
     *
     * @param Post $entity 投稿内容
     * @return void
     * @throws Exception | Throwable
     */
    public function delete(Post $entity)
    {
        $entity->delete();
    }
}

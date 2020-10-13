<?php

use App\Entities\Post;
use App\Entities\Comment;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Post::class, 50)
        //     ->create()
        //     ->each(function ($post) {
        //         $comments = factory(Comment::class, 2)->make();
        //         $post->comments()->saveMany($comments);
        //     }
        // );
    }
}

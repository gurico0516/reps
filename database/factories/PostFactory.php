<?php

use App\Entities\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'created_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'updated_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'subject' => $faker->realText(16),    // 16文字のテキスト
        'message' => $faker->realText(200),    // 200文字のテキスト
        'name' => $faker->name,    // 名前
    ];
});

<?php
$returnValues = [
    'name' => '投稿',
    'data' => [
        'name' => 'お名前',
        'comment' => 'コメント',
    ],
];

return array_replace_recursive(require dirname(__FILE__) . '/forms.php', $returnValues);

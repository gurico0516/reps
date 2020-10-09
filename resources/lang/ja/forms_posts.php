<?php
$returnValues = [
    'name' => '投稿',
    'data' => [
        'name' => 'お名前',
        'subject' => '好きな爬虫類',
        'message' => '理由',
    ],
];

return array_replace_recursive(require dirname(__FILE__) . '/forms.php', $returnValues);

<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = ['id'];

    protected $fillable = [
     'post_id',
        'name',
        'comment',
    ];

    public function post()
    {
        return $this->belongsTo('App\Entities\Post');
    }
}

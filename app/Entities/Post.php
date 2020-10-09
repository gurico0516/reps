<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'subject',
        'message',
    ];

    public function comments()
    {
        return $this->hasMany('App\Entities\Comment');
    }
}

<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'image', 'Content'
    ];
    public function update(Request $resquest, Post $post)
    {
        return response()->json([
            'data' => $post->create($resquest->all()),
        ]);
    }
}

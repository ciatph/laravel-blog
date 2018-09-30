<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'body'];

    /** Find the Post where this Comment is associated, 1:1 */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

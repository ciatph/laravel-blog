<?php

namespace App\Repositories;

use App\Post;
use App\Redis;

class Posts
{
    protected $redis;
    
    /** Add mock dependency  */
    public function __constuct(Redis $redis)
    {
        $this->redis = $redis;
    }


    public function all()
    {
        // return all posts
        return Post::all();
    }

}
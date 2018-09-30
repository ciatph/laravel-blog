<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        /** Method #1: direct save() */
        /*
        Comment::create([
            'body' => request('body'),
            'post_id' => $post->id
        ]);
        */

        /** Method #2: save() in Post mode */
        $this->validate(request(), [
            'body' => 'required|min:2'
        ]);
        $post->addComment(request('body'));
        return back();
    }
}

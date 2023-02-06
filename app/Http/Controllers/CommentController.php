<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store($id, Request $request)
    {
        $comment = $request->all();

            $post = Post::find($id);
            $post->comments()->create(
                [
                    'body' => $comment['body'],
                ]
            );
            return redirect()->route('posts.show', ['post' => $id]);
        }


        public function edit($id)
        {
            $comment = Comment::find($id);
            return view("comments.edit", ['body' => $comment]);
        }
}

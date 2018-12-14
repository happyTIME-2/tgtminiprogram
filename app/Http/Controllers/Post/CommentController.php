<?php

namespace App\Http\Controllers\Post;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //
    public function store(Post $post)
    {
        $this->validate(request(),['body' => 'required|min:2']);
        $post->addComment(request('body'));

        return back();
    }
}

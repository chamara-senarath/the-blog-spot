<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->blog_id = $blog->id;
        $comment->content = $validatedData['content'];
        $comment->save();

        return redirect()->route('blogs.show', $blog);
    }
}

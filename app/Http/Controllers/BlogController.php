<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Show all blogs view
    public function index()
    {
        $blogs = Blog::paginate(6);
        return view('blogs.index', ['blogs' => $blogs]);
    }

    // Show single blog view
    public function show(Blog $blog)
    {
        $comments = $blog->comments()->get();
        return view('blogs.show', [
            'blog' => $blog,
            'comments' => $comments
        ]);
    }

    // Create blog view
    public function create()
    {
        return view('blogs.create');
    }

    // Store blog
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tags' => 'required',
        ]);

        if ($request->hasFile('header-image')) {
            $formFields['image'] = $request->file('header-image')->store('images', 'public');
        }
        $formFields['tags'] = explode(",", $formFields['tags']);
        $formFields['user_id'] = auth()->id();

        Blog::create($formFields);

        return redirect('/')->with('success', 'Blog created successfully');
    }

    // Delete blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->user_id === auth()->user()->id) {
            $blog->delete();
            return redirect(route('blogs.index'))->with('message', 'Blog deleted successfully');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to delete this blog');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Show all blogs view
    public function index()
    {
        return view('blogs.index', ['blogs' => Blog::all()]);
    }

    // Show single blog view
    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog
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

        return redirect('/')->with('message', 'Blog created successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Stat;
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

        $view = new Stat;
        $view->blog_id = $blog->id;
        $view->user_id = auth()->id() ? auth()->id() : 0;
        $view->save();

        return view('blogs.show', [
            'blog' => $blog,
            'comments' => $comments
        ]);
    }

    // Create blog view
    public function create()
    {
        return view('blogs.create', ['is_edit' => false]);
    }

    // Edit blog view
    public function edit(Blog $blog)
    {
        return view('blogs.create', ['blog' => $blog, 'is_edit' => true]);
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

    // Update blog
    public function update(Request $request, Blog $blog)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tags' => 'required',
        ]);

        if ($request->hasFile('header-image')) {
            $formFields['image'] = $request->file('header-image')->store('images', 'public');
        }

        $blog['title'] = $formFields['title'];
        $blog['content'] = $formFields['content'];
        $blog['tags'] = explode(",", $formFields['tags']);
        if (!empty($formFields['image'])) {
            $blog['image'] = $formFields['image'];
        }

        $blog->save();

        return redirect()->route('blogs.show', ['blog' => $blog->id])->with('success', 'Blog updated successfully');
    }


    // Delete blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->user_id === auth()->user()->id) {
            $blog->delete();
            return redirect(route('blogs.index'))->with('success', 'Blog deleted successfully');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to delete this blog');
        }
    }

    // Show blogs of the current user
    public function myBlogs()
    {
        $user = auth()->user();
        $blogs = Blog::where('user_id', $user->id)->paginate(6);
        return view('blogs.index', ['blogs' => $blogs]);
    }
}

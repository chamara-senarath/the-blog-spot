<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Show all blogs
    public function index() {
        return view('blogs.index');
    }
}

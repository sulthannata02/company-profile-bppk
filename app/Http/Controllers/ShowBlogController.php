<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class ShowBlogController extends Controller
{
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        // Blog terkait
        $relatedBlogs = Blog::where('id', '!=', $blog->id)
            ->where('status', 'publish')
            ->latest()
            ->take(3)
            ->get();

        return view('blog.show', compact('blog', 'relatedBlogs'));
    }
}
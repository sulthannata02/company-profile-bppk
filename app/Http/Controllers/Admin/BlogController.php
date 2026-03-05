<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * 1 halaman: tabel + modal tambah/edit
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog', compact('blogs'));
    }

    /**
     * CREATE (dari modal tambah)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,publish',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('blog'), $filename);
            $data['thumbnail'] = $filename;
        }

        Blog::create($data);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Artikel berhasil ditambahkan');
    }


    /**
     * UPDATE (dari modal edit)
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:draft,publish',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'status' => $request->status,
        ];

        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail && file_exists(public_path('blog/' . $blog->thumbnail))) {
                @unlink(public_path('blog/' . $blog->thumbnail));
            }

            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('blog'), $filename);
            $data['thumbnail'] = $filename;
        }

        $blog->update($data);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Artikel berhasil diperbarui');
    }

    /**
     * DELETE
     */
    public function destroy(Blog $blog)
    {
        if ($blog->thumbnail && file_exists(public_path('blog/' . $blog->thumbnail))) {
            @unlink(public_path('blog/' . $blog->thumbnail));
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Artikel berhasil dihapus');
    }

    /**
     * OPTIONAL: AJAX ambil data 1 blog (buat modal edit)
     */
    public function show(Blog $blog)
    {
        return response()->json($blog);
    }
}

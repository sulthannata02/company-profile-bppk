<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $mobils = DB::table('mobils')->get();

        $blogs = Blog::where('status', 'publish')
            ->latest()
            ->limit(3)
            ->get();

        return view('home', compact('mobils', 'blogs'));
    }
}
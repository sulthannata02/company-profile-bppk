<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $mobils = \App\Models\Mobil::all();

        $blogs = Blog::where('status', 'publish')
            ->latest()
            ->limit(3)
            ->get();

        $partners = \App\Models\Partner::orderBy('order')->get();

        return view('home', compact('mobils', 'blogs', 'partners'));
    }
}
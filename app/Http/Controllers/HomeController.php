<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        $mobils = DB::table('mobils')->get();

        $blogs = Blog::where('status', 'publish')
            ->latest()
            ->limit(3)
            ->get();

        $partners = Partner::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('home', compact('mobils', 'blogs', 'partners'));
    }
}
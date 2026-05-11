<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Mobil;
use App\Models\Partner;
use App\Models\Rute;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMobil   = Mobil::count();
        $totalBlog    = Blog::count();
        $totalPartner = Partner::count();
        $totalRute    = Rute::count();

        $recentBlogs = Blog::latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalMobil',
            'totalBlog',
            'totalPartner',
            'totalRute',
            'recentBlogs'
        ));
    }
}

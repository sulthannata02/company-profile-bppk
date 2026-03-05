<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Mobil;

class DashboardController extends Controller
{
    public function index()
    {

        // Hitung total data
        $totalMobil   = Mobil::count();
        $totalBlog    = Blog::count();

        return view('admin.dashboard', [
        'totalMobil'   => Mobil::count(),
        'totalBlog'    => Blog::count(),
    ]);
    }
}

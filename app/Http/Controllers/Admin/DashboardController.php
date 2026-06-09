<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Mobil;
use App\Models\Partner;

class DashboardController extends Controller
{
    public function index()
    {

        // Hitung total data
        $totalMobil   = Mobil::count();
        $totalBlog    = Blog::count();
        $totalPartner = Partner::count();

        return view('admin.dashboard.index', [
        'totalMobil'   => Mobil::count(),
        'totalBlog'    => Blog::count(),
        'totalPartner' => Partner::count(),
    ]);
    }
}

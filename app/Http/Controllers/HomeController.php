<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $mobils = DB::table('mobils')->get();
        return view('home', compact('mobils'));
    }
}

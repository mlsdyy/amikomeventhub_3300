<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua data kategori dan partner untuk dilempar ke halaman depan
        $categories = Category::all();
        $partners = Partner::all();

        // Mengirim data ke file welcome.blade.php
        return view('welcome', compact('categories', 'partners'));
    }
}
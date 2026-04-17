<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Fungsi untuk memanggil halaman welcome
    public function index()
    {
        return view('welcome');
    }
}
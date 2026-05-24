<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua data kategori, partner, dan event untuk dilempar ke halaman depan
        $categories = Category::all();
        $partners = Partner::all();
        $events = Event::all();

        // Mengirim semua data ke file welcome.blade.php
        return view('welcome', compact('categories', 'partners', 'events'));
    }

    // FIX PAS: Mengubah 'event.detail' menjadi 'event-detail' sesuai nama file blademu
    public function detail($id)
    {
        // Mencari event berdasarkan ID, jika tidak ada otomatis memunculkan error 404
        $event = Event::findOrFail($id);

        // Melempar data event ke halaman detail yang bernama event-detail.blade.php
        return view('event-detail', compact('event'));
    }
}
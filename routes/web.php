<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;

// --- HALAMAN USER (Sesuai Error di Gambar) ---

// Ini untuk error "Route [home] not defined"
Route::get('/', [HomeController::class, 'index'])->name('home');


// Ini untuk error "Route [event.detail] not defined"
Route::get('/event/detail', function () {
    return view('event-detail');
})->name('event.detail');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/ticket', function () {
    return view('ticket');
})->name('ticket');


// --- HALAMAN ADMIN ---

Route::prefix('admin')->name('admin.')->group(function () {
    // Ini untuk error "Route [admin.dashboard] not defined"
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/events', function () {
        return view('admin.events');
    })->name('events.index');

    Route::get('/transactions', function () {
        return view('admin.transactions');
    })->name('transactions.index');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
});
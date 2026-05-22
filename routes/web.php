<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController as EventAdminController;

// --- HALAMAN USER  ---

Route::get('/', [HomeController::class, 'index'])->name('home');



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
   
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/events', function () {
        return view('admin.events');
    })->name('events.index');

    Route::get('/transactions', function () {
        return view('admin.transactions');
    })->name('transactions.index');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

     Route::resource('events', EventAdminController::class);
});

use Illuminate\Support\Facades\Artisan;

Route::get('/auto-benerin-db', function () {
    try {
        // 1. Bikin file database kalau belum ada di server
        $dbPath = database_path('database.sqlite');
        if (!file_exists($dbPath)) {
            file_put_contents($dbPath, '');
        }
        
        // 2. Jalankan migrasi, seeder, dan link storage otomatis
        Artisan::call('migrate --force');
        Artisan::call('db:seed --force');
        Artisan::call('storage:link');
        
        return "Database berhasil diperbaiki otomatis! Silakan kembali ke halaman Kelola Event.";
    } catch (\Exception $e) {
        return "Gagal: " . $e->getMessage();
    }
});
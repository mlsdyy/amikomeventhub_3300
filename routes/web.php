<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController; 
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\Admin\EventController; 
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\TransactionController; 

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/detail/{id}', [HomeController::class, 'detail'])->name('event.detail');

Route::get('/checkout', function () { return view('checkout'); })->name('checkout');
Route::get('/ticket', function () { return view('ticket'); })->name('ticket');

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::middleware(['auth', 'admin'])->group(function () {
        
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::resource('events', EventController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('partners', PartnerController::class);
    });
});

Route::get('/auto-benerin-db', function () {
    try {
        $dbPath = database_path('database.sqlite');
        if (!file_exists($dbPath)) { file_put_contents($dbPath, ''); }
        
        Artisan::call('migrate --force');
        Artisan::call('db:seed --force');
        Artisan::call('storage:link');
        
        return "Database berhasil diperbaiki otomatis! Silakan kembali ke halaman Kelola Event.";
    } catch (\Exception $e) {
        return "Gagal: " . $e->getMessage();
    }
});
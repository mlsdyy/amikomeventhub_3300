<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Cek apakah aplikasi sedang dalam mode maintenance
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Daftarkan Autoloader Composer
require __DIR__.'/../vendor/autoload.php';

// Jalankan Aplikasi Laravel
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
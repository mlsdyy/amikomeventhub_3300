<?php

namespace App\Http\Controllers\Admin; // Kita kunci pakai A Besar juga Mel

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('admin.transactions');
    }
}
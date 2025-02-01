<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // tampilkan dashboard home
    public function index()
    {
        return view('home');
    }
}

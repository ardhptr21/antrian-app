<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function vaksin()
    {
        return view('dashboard.vaksin');
    }

    public function domisili()
    {
        return view('dashboard.domisili');
    }
}

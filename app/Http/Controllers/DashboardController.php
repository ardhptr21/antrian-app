<?php

namespace App\Http\Controllers;

use App\Models\Village;
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
        $villages = Village::all();
        return view('dashboard.domisili', compact('villages'));
    }
}

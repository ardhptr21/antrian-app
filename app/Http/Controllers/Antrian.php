<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Antrian extends Controller
{
    public function index()
    {
        return view('antrian.index');
    }
}

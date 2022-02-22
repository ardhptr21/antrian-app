<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use App\Models\Village;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function vaksin(Request $request)
    {

        $vaccine = null;

        if ($request->has('edit')) {

            $vaccine = Vaccine::where('id', $request->edit)->first();
            if (!$vaccine) {
                return back();
            }
        }

        $vaccines = Vaccine::all();
        return view('dashboard.vaksin', compact(['vaccines', 'vaccine']));
    }

    public function domisili()
    {
        $villages = Village::all();
        return view('dashboard.domisili', compact('villages'));
    }
}

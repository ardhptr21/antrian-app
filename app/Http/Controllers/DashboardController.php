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

    public function domisili(Request $request)
    {
        $villages = Village::all();
        $village_selected = null;

        if ($request->has('village')) {
            $village_selected = Village::with(['neighbourhoods', 'hamlets'])->where('id', $request->village)->first();
        }
        return view('dashboard.domisili', compact('villages', 'village_selected'));
    }
}

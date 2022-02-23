<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use App\Models\Village;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index(Request $request)
    {
        $villages = Village::with(['neighbourhoods', 'hamlets'])->get();
        $vaccines = Vaccine::all();
        $village_selected = null;

        if ($request->has('village')) {
            $village_selected = Village::with(['neighbourhoods', 'hamlets'])->where('id', $request->village)->first();
        }

        if ($village_selected && $village_selected->neighbourhoods->isEmpty() && $village_selected->hamlets->isEmpty()) {
            return to_route('antrian:index');
        }

        return view('antrian.index', compact('villages', 'village_selected', 'vaccines'));
    }

    public function show()
    {
        return view('antrian.cetak');
    }
}

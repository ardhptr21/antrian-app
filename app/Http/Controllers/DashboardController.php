<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Queue;
use App\Models\Vaccine;
use App\Models\Village;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['village', 'vaccine', 'date']);
        if (!isset($filters['date'])) {
            $filters['date'] = date('Y-m-d');
        }
        $queues = Queue::filter($filters)->get();
        $villages = Village::all();
        $vaccines = Vaccine::all();


        return view('dashboard.index', compact('queues', 'villages', 'vaccines'));
    }

    public function aktivitas()
    {
        $activity = Activity::today()->first();
        $queues = Queue::today()->get();
        return view('dashboard.aktivitas', compact('activity', 'queues'));
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

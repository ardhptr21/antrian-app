<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use App\Models\Vaccine;
use App\Models\Village;
use Illuminate\Http\Request;

class QueueController extends Controller
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

    public function show(Queue $queue)
    {
        return view('antrian.cetak', compact('queue'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'age' => 'required|numeric',
            'village' => 'required|string',
            'hamlet' => 'required|numeric',
            'neighbourhood' => 'required|numeric',
            'vaccine' => 'required|string',
        ]);

        $latest_queue = Queue::whereDate('created_at',  today())->latest()->first();

        if ($latest_queue) {
            $validated['order'] = $latest_queue->order + 1;
        } else {
            $validated['order'] = 1;
        }

        $queue = Queue::create($validated);

        if ($queue) {
            return redirect()->route('antrian:cetak', ['queue' => $queue->id]);
        }

        return back()->with('queue_error_store', 'Gagal membuat antrian');
    }
}

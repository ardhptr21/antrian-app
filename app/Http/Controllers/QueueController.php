<?php

namespace App\Http\Controllers;

use App\Exports\QueuesExport;
use App\Models\Activity;
use App\Models\Queue;
use App\Models\Vaccine;
use App\Models\Village;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use function PHPUnit\Framework\isNull;

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

        $queues = Queue::today()->get();
        $activity = Activity::with('batches')->today()->first();

        if ($activity->quota === $queues->count()) {
            return back()->with('queue_error_store', 'Jumlah antrian sudah penuh');
        }

        $batch = 1;
        $perBatchCount = intval(ceil($activity->quota / $activity->batches->count()));

        if ($activity->batches->count() > 1) {
            for ($i = 1; $i <= $activity->batches->count(); $i++) {
                $count = $queues->filter(fn ($queue) => $queue->batch->order == $i)->count();
                if ($count < $perBatchCount) {
                    $batch = $i;
                    break;
                }
            }
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'age' => 'required|numeric',
            'village' => 'required|string',
            'hamlet' => 'required|numeric',
            'neighbourhood' => 'required|numeric',
            'vaccine' => 'required|string',
            'nik' => 'required|numeric|digits:16',
        ]);

        $latest_queue = $queues->filter(fn ($value) => $value->batch->order == $batch)->last();


        if ($latest_queue) {
            $validated['order'] = $latest_queue->order + 1;
        } else {
            $validated['order'] = 1;
        }

        $validated['batch_id'] = $activity->batches[$batch - 1]->id;
        $queue = Queue::create($validated);

        if ($queue) {
            if ($activity->quota === $queues->count() + 1) {
                $activity->update(['is_open' => false]);
            }

            return redirect()->route('antrian:cetak', ['queue' => $queue->id]);
        }

        return back()->with('queue_error_store', 'Gagal membuat antrian');
    }

    public function export(Request $request)
    {
        $filters = $request->only('village', 'vaccine', 'date');
        $queues = Queue::filter($filters)->get();
        $date_format = date_format(date_create($filters['date']), 'd F Y');
        return Excel::download(new QueuesExport($queues), "Data Antrian Vaksin $date_format.xlsx");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Batch;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quota' => 'required|numeric|min:1',
            'batch' => 'nullable|numeric|min:1',
        ]);

        if (!$validated['batch']) {
            $validated['batch'] = 1;
        }

        $activity = Activity::create(['quota' => $validated['quota']]);
        $batches = [];

        for ($i = 1; $i <= $validated['batch']; $i++) {
            $batches[] = [
                'activity_id' => $activity->id,
                'order' => $i,
            ];
        }

        Batch::insert($batches);

        if ($activity) {
            return back()->with('activity_store_success', 'Aktivitas berhasil dibuat');
        }

        return back()->with('activity_store_error', 'Aktivitas gagal dibuat');
    }

    public function status(Activity $activity)
    {
        $activity->update(['is_open' => !$activity->is_open]);
        return back();
    }
}

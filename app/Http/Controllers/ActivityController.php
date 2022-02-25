<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quota' => 'required|numeric|min:1',
            'batch' => 'nullable|numeric|min:1',
        ]);

        $activity = Activity::create($validated);

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

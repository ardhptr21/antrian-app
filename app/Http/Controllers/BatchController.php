<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'time' => 'required|array',
            'activity_id' => 'required|integer',
        ]);

        foreach ($validated['time'] as $idx => $time) {
            if (!$time) {
                continue;
            }
            Batch::where(['order' => $idx + 1, 'activity_id' => $validated['activity_id']])->first()->update(['time' => $time]);
        }

        return back()->with('batch_success', 'Berhasil memperbarui waktu kloter');
    }
}

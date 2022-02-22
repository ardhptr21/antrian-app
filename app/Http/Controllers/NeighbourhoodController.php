<?php

namespace App\Http\Controllers;

use App\Models\Neighbourhood;
use Illuminate\Http\Request;

class NeighbourhoodController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'neighbourhood' => 'required|integer',
            'village_id' => 'required|integer'
        ]);

        $credentials = [
            'value' => $validated['neighbourhood'],
            'village_id' => $validated['village_id']
        ];

        $isExists = Neighbourhood::where($credentials)->exists();
        if ($isExists) {
            return back()->with('neighbourhood_error_store', 'RT tersebut sudah tersedia');
        }

        $neighbourhood = Neighbourhood::create($credentials);

        if ($neighbourhood) {
            return back()->with('neighbourhood_success_store', 'RT berhasil ditambahkan');
        }

        return back()->with('neighbourhood_error_store', 'RT gagal ditambahkan');
    }

    public function remove(Neighbourhood $neighbourhood)
    {
        $isDeleted = $neighbourhood->delete();

        if ($isDeleted) {
            return back()->with('neighbourhood_success_remove', 'RT berhasil dihapus');
        }

        return back()->with('neighbourhood_error_remove', 'RT gagal dihapus');
    }
}

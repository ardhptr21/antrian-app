<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'village_name' => 'required|string|max:100|unique:villages,name',
        ]);

        $village = Village::create(['name' => $validated['village_name']]);

        if ($village) {
            return back()->with('success_store', 'Berhasil menambahkan desa');
        }

        return back()->with('error_store', 'Gagal menambahkan desa');
    }

    public function remove(Village $village)
    {
        $isDeleted = $village->delete();

        if ($isDeleted) {
            return back()->with('success_remove', 'Berhasil menghapus desa');
        }

        return back()->with('error_remove', 'Gagal menghapus desa');
    }
}

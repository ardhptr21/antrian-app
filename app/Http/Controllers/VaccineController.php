<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vaccine_name' => 'required|string|max:100|unique:vaccines,name',
            'vaccine_description' => 'required|string',
        ]);

        $vaccine = Vaccine::create([
            'name' => $validated['vaccine_name'],
            'description' => $validated['vaccine_description'],
        ]);

        if ($vaccine) {
            return back()->with('vaccine_success_store', 'Berhasil menambahkan vaksin');
        }

        return back()->with('vaccine_error_store', 'Gagal menambahkan vaksin');
    }

    public function update(Request $request, Vaccine $vaccine)
    {
        $validated = $request->validate([
            'vaccine_name' => 'required|string|max:100|unique:vaccines,name,' . $vaccine->id,
            'vaccine_description' => 'required|string',
        ]);

        $updated = $vaccine->update([
            'name' => $validated['vaccine_name'],
            'description' => $validated['vaccine_description'],
        ]);

        if ($updated) {
            return to_route('dashboard:vaksin')->with('vaccine_success_store', 'Berhasil mengubah vaksin');
        }

        return to_route('dashboard:vaksin')->with('vaccine_error_store', 'Gagal mengubah vaksin');
    }

    public function remove(Vaccine $vaccine)
    {
        $isDeleted = $vaccine->delete();

        if ($isDeleted) {
            return back()->with('vaccine_success_remove', 'Berhasil menghapus vaksin');
        }

        return back()->with('vaccine_error_remove', 'Gagal menghapus vaksin');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Hamlet;
use Illuminate\Http\Request;

class HamletController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hamlet' => 'required|integer',
            'village_id' => 'required|integer'
        ]);
        $credentials = ['value' => $validated['hamlet'], 'village_id' => $validated['village_id']];

        $isExists = Hamlet::where($credentials)->exists();

        if ($isExists) {
            return back()->with('hamlet_error_store', 'RW tersebut sudah tersedia');
        }

        $hamlet = Hamlet::create($credentials);

        if ($hamlet) {
            return back()->with('hamlet_success_store', 'RW berhasil ditambahkan');
        }

        return back()->with('hamlet_error_store', 'RW gagal ditambahkan');
    }

    public function remove(Hamlet $hamlet)
    {
        $isDeleted = $hamlet->delete();

        if ($isDeleted) {
            return back()->with('hamlet_success_remove', 'RW berhasil dihapus');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\LingkarKepalaBulanan;
use Illuminate\Http\Request;

class LingkarKepalaBulananController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'balita_id' => 'required|exists:balitas,id',
            'lingkarKepalaBulanan' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        LingkarKepalaBulanan::create($request->all());

        return redirect()->back()->with('success', 'Data lingkar kepala bulanan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $panjangBadan = LingkarKepalaBulanan::findOrFail($id);
        $panjangBadan->delete();

        return redirect()->back()->with('success', 'Data balita berhasil dihapus.');
    }
}

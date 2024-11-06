<?php

namespace App\Http\Controllers;

use App\Models\PanjangBadanBulanan;
use Illuminate\Http\Request;

class PanjangBadanBulananController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'balita_id' => 'required|exists:balitas,id',
            'panjangBadanBulanan' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        PanjangBadanBulanan::create($request->all());

        return redirect()->back()->with('success', 'Data panjang badan bulanan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $panjangBadan = PanjangBadanBulanan::findOrFail($id);
        $panjangBadan->delete();

        return redirect()->back()->with('success', 'Data balita berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BeratBadanBulanan;
use Illuminate\Http\Request;

class BeradBadanBulananController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'balita_id' => 'required|exists:balitas,id',
            'beratBadanBulanan' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        BeratBadanBulanan::create($request->all());

        return redirect()->back()->with('success', 'Data berat badan bulanan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $beratBadan = BeratBadanBulanan::findOrFail($id);
        $beratBadan->delete();

        return redirect()->back()->with('success', 'Data balita berhasil dihapus.');
    }
}

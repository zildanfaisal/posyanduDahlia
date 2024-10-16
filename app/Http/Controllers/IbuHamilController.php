<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use Illuminate\Http\Request;

class IbuHamilController extends Controller
{
    public function index()
    {
        $ibuHamil = IbuHamil::all();
        return view('dataIbuHamil.dashboardIbuHamil', compact('ibuHamil'));
    }

    public function create()
    {
        return view('dataIbuHamil.addDataIbuHamil');
    }

    public function store(Request $request)
    {
        $ibuHamil = new IbuHamil;
        $ibuHamil->namaIbuHamil = $request->namaIbuHamil;
        $ibuHamil->tempatLahir = $request->tempatLahir;
        $ibuHamil->tanggalLahir = $request->tanggalLahir;
        $ibuHamil->alamat = $request->alamat;
        $ibuHamil->beratBadan = $request->beratBadan;
        $ibuHamil->lila = $request->lila;
        $ibuHamil->save();

        return redirect('/dashboardIbuHamil')->with('success', 'Data ibu hamil berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $ibuHamil = IbuHamil::findOrFail($id);
        $ibuHamil->delete();

        return redirect('/dashboardIbuHamil')->with('success', 'Data ibu hamil berhasil dihapus.');
    }

    public function edit($id)
    {
        $ibuHamil = IbuHamil::findOrFail($id);
        return view('dataIbuHamil.editIbuHamil', compact('ibuHamil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaIbuHamil' => 'required|string|max:255',
            'tempatLahir' => 'required|string',
            'tanggalLahir' => 'required|date',
            'alamat' => 'required|string',
            'beratBadan' => 'required|int',
            'lila' => 'required|int'
        ]);

        $ibuHamil = IbuHamil::findOrFail($id);
        $ibuHamil->update($request->except(['_token', '_method']));

        return redirect('/dashboardIbuHamil')->with('success', 'Data ibu hamil berhasil diperbarui.');
    }
}

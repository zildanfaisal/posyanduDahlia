<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;

class BalitaController extends Controller
{
    public function exportPDF()
    {

        //Ambil data balita
        $balitas = Balita::all();

        $pdf = FacadePdf::loadview('dataBalita.pdfBalita', compact('balitas'));

        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('data-balita.pdf');
    }

    public function showHomePage()
    {
        $balitas = Balita::latest()->take(5)->get();
        return view('welcome', compact('balitas'));
    }

    public function index()
    {
        $balitas = Balita::all();
        return view('dataBalita.dashboardBalita', compact('balitas'));
    }

    public function create()
    {
        return view('dataBalita.addDataBalita');
    }

    public function store(Request $request)
    {
        $balita = new Balita;
        $balita->namaAnak = $request->namaAnak;
        $balita->nik = $request->nik;
        $balita->nkk = $request->nkk;
        $balita->tanggalLahir = $request->tanggalLahir;
        $balita->beratBadan = $request->beratBadan;
        $balita->panjangBadan = $request->panjangBadan;
        $balita->lingkarKepala = $request->lingkarKepala;
        $balita->namaAyah = $request->namaAyah;
        $balita->namaIbu = $request->namaIbu;
        $balita->alamat = $request->alamat;
        $balita->posyandu = $request->posyandu;
        $balita->tanggalPendaftaran = $request->tanggalPendaftaran;
        $balita->save();

        return redirect('/dashboardBalita')->with('success', 'Data balita berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $balita = Balita::findOrFail($id);
        $balita->delete();

        return redirect('/dashboardBalita')->with('success', 'Data balita berhasil dihapus.');
    }

    public function edit($id)
    {
        $balita = Balita::findOrFail($id);
        return view('dataBalita.editBalita', compact('balita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaAnak' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'nkk' => 'required|string|max:255',
            'tanggalLahir' => 'required|date',
            'beratBadan' => 'required|int',
            'panjangBadan' => 'required|int',
            'lingkarKepala' => 'required|int',
            'namaAyah' => 'required|string',
            'namaIbu' => 'required|string',
            'alamat' => 'required|string',
            'posyandu' => 'required|string',
            'tanggalPendaftaran' => 'required|date'
        ]);

        $balita = Balita::findOrFail($id);
        $balita->update($request->except(['_token', 'method']));

        return redirect('/dashboardBalita')->with('success', 'Data balita berhasil diperbarui.');
    }
}

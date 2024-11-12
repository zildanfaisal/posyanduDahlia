<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;

class BalitaController extends Controller
{
    public function exportPDF(Request $request)
    {
        $query = Balita::query();

        $selectedBulan = $request->bulan;

        $query->with([
            'beratBadanBulanan' => function ($subQuery) use ($selectedBulan) {
                if ($selectedBulan) {
                    $subQuery->whereMonth('tanggal', $selectedBulan);
                }
            },
            'panjangBadanBulanan' => function ($subQuery) use ($selectedBulan) {
                if ($selectedBulan) {
                    $subQuery->whereMonth('tanggal', $selectedBulan);
                }
            },
            'lingkarKepalaBulanan' => function ($subQuery) use ($selectedBulan) {
                if ($selectedBulan) {
                    $subQuery->whereMonth('tanggal', $selectedBulan);
                }
            }
        ]);

        $balitas = $query->get();

        $pdf = FacadePdf::loadview('dataBalita.pdfBalita', compact('balitas', 'selectedBulan'));

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('data-balita.pdf');
    }

    public function showHomePage()
    {
        $balitas = Balita::latest()->take(5)->get();
        return view('welcome', compact('balitas'));
    }

    public function index(Request $request)
    {
        $query = Balita::query();

        // Filter pencarian berdasarkan nama anak
        if ($request->has('search') && $request->search != '') {
            $query->where('namaAnak', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan bulan yang dipilih
        $selectedBulan = $request->bulan;

        // Tambahkan relasi beratBadanBulanan dengan filter bulan jika bulan dipilih
        $query->with([
            'beratBadanBulanan' => function ($subQuery) use ($selectedBulan) {
            if ($selectedBulan) {
                $subQuery->whereMonth('tanggal', $selectedBulan);
            }
        }, 'panjangBadanBulanan' => function ($subQuery) use ($selectedBulan) {
            if ($selectedBulan) {
                $subQuery->whereMonth('tanggal', $selectedBulan);
            }
        }, 'lingkarKepalaBulanan' => function ($subQuery) use ($selectedBulan) {
            if ($selectedBulan) {
                $subQuery->whereMonth('tanggal', $selectedBulan);
            }
        }]);

        // Ambil data balita dan paginate
        $balitas = $query->paginate(5)->appends($request->only('search', 'bulan'));

        return view('dataBalita.dashboardBalita', compact('balitas', 'selectedBulan'));
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
        $balita->beratBadanLahir = $request->beratBadanLahir;
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

    public function show($id)
    {
        $balita = Balita::findOrFail($id);

        return view('dataBalita.detailDataBalita', compact('balita'));
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
            'beratBadanLahir' => 'required|int',
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

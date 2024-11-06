<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\IbuHamil;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;

class HomePageController extends Controller
{
    public function index()
    {
        // Ambil data Balita dan Ibu Hamil
        $balitas = Balita::paginate(5); // Mengambil semua data balita
        $ibuHamil = IbuHamil::paginate(5); // Mengambil semua data ibu hamil

        return view('welcome', compact('balitas', 'ibuHamil'));
    }

    public function exportPDF()
    {

        //Ambil data balita
        $balitas = Balita::all();
        $ibuHamil = IbuHamil::all();

        $pdf = FacadePdf::loadview('pdfExport', compact('balitas', 'ibuHamil'));

        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('data-posyandu.pdf');
    }
}

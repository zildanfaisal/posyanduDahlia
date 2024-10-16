<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\IbuHamil;

class HomePageController extends Controller
{
    public function index()
    {
        // Ambil data Balita dan Ibu Hamil
        $balitas = Balita::all(); // Mengambil semua data balita
        $ibuHamil = IbuHamil::all(); // Mengambil semua data ibu hamil

        return view('welcome', compact('balitas', 'ibuHamil'));
    }
}

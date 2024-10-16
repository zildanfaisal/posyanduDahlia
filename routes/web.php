<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\IbuHamilController;
use App\Models\IbuHamil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Register your application routes here. These routes are loaded by the
| RouteServiceProvider and assigned to the "web" middleware group.
|
*/

// Login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // HomePage
    Route::get('/homePage', [HomePageController::class, 'index']);

    // Data Balita Routes
    Route::resource('balitas', BalitaController::class);

    Route::get('/dashboardBalita', [BalitaController::class, 'index']);
    Route::get('/addDataBalita', [BalitaController::class, 'create']);

    Route::post('/storeDataBalita', [BalitaController::class, 'store']);

    Route::delete('/balita/{id}', [BalitaController::class, 'destroy'])->name('balita.destroy');

    Route::get('/balita/{id}/edit', [BalitaController::class, 'edit'])->name('balita.edit');
    Route::put('/balita/{id}', [BalitaController::class, 'update'])->name('balita.update');

    // Data Ibu Hamil Routes
    Route::resource('ibuHamil', IbuHamilController::class);

    Route::get('/dashboardIbuHamil', [IbuHamilController::class, 'index']);
    Route::get('/addDataIbuHamil', [IbuHamilController::class, 'create']);

    Route::post('/storeDataIbuHamil', [IbuHamilController::class, 'store']);

    Route::delete('/ibuHamil/{id}', [IbuHamilController::class, 'destroy'])->name('ibuHamil.destroy');

    Route::get('/ibuHamil/{id}/edit', [IbuHamilController::class, 'edit'])->name('ibuHamil.edit');
    Route::put('/ibuHamil/{id}', [IbuHamilController::class, 'update'])->name('ibuHamil.update');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

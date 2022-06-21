<?php

use App\Models\Soal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\KajurController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\WaktuController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ProjurController;
use App\Http\Controllers\TracerController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HasilkuisController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\HasilnilaiController;
use App\Http\Controllers\StakeholderController;

Route::get('/testapi', [HomeController::class, 'testapi']);
Route::post('/testapi', [HomeController::class, 'gettoken']);
Route::post('/testapi/nilai', [HomeController::class, 'getnilai']);

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->hasRole('superadmin')) {
            return redirect('/home/superadmin');
        } elseif (Auth::user()->hasRole('peserta')) {
            return redirect('/home/peserta');
        }
    }
    return view('welcome');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/generate', function () {

    return 'sukses';
});

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/');
    }
    return view('welcome');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);

// Route::get('/daftar', function () {
//     return redirect('/');
// });
Route::get('/daftar', [LoginController::class, 'daftar']);
Route::post('/daftar', [LoginController::class, 'simpanDaftar']);

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::prefix('superadmin')->group(function () {
        Route::get('gantipass', [HomeController::class, 'gantipass']);
        Route::get('laporan', [HomeController::class, 'laporan']);

        Route::get('laporan/stakeholder', [HomeController::class, 'pdf_stakeholder']);

        Route::post('laporan/stakeholder', [HomeController::class, 'pdf_penilaian']);

        Route::get('laporan/alumni', [HomeController::class, 'pdf_alumni']);
        Route::get('laporan/kuis', [HomeController::class, 'pdf_kuis']);

        Route::post('gantipass', [HomeController::class, 'resetpass']);

        Route::get('alumni/{id}/akun', [AlumniController::class, 'akun']);
        Route::get('alumni/{id}/pass', [AlumniController::class, 'pass']);

        Route::get('stakeholder/{id}/akun', [StakeholderController::class, 'akun']);
        Route::get('stakeholder/{id}/pass', [StakeholderController::class, 'pass']);

        Route::resource('stakeholder', StakeholderController::class);
        Route::resource('alumni', AlumniController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('jurusan', JurusanController::class);
        Route::resource('kuesioner', KuesionerController::class);

        Route::get('hasilkuis', [HasilkuisController::class, 'index']);
        Route::get('hasilkuis/{id}/lihat', [HasilkuisController::class, 'lihat']);

        Route::get('hasilnilai', [HasilnilaiController::class, 'stake']);
        Route::get('hasilnilai/{id}/alumni', [HasilnilaiController::class, 'index']);
    });
});

Route::group(['middleware' => ['auth', 'role:alumni']], function () {
    Route::get('alumni/tracer', [TracerController::class, 'index']);
    Route::post('alumni/tracer', [TracerController::class, 'store']);
    Route::get('/alumni/gantipass', [HomeController::class, 'gantipass']);
});

Route::group(['middleware' => ['auth', 'role:stakeholder']], function () {
    Route::get('stakeholder/penilaian', [PenilaianController::class, 'index']);
    Route::get('stakeholder/alumni/{id}/nilai', [PenilaianController::class, 'nilai']);
    Route::post('stakeholder/alumni/{id}/nilai', [PenilaianController::class, 'store']);
    Route::get('stakeholder/gantipass', [HomeController::class, 'gantipass']);
});

Route::group(['middleware' => ['auth', 'role:superadmin|alumni|stakeholder']], function () {
    Route::get('/home/superadmin', [HomeController::class, 'superadmin']);
    Route::get('/home/alumni', [HomeController::class, 'alumni']);
    Route::get('/home/stakeholder', [HomeController::class, 'stakeholder']);
});

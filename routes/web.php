<?php

use App\Http\Controllers\anggotaController;
use App\Http\Controllers\anggotaUkmController;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\divisiController;
use App\Http\Controllers\kegiatanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pengurusController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\ukmController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\adminController;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function () {

    //Bagian anggota
    //Login
    Route::get('login', [loginController::class, 'index'])->name('login');
    Route::post('login', [loginController::class, 'login']);
    Route::get('verifikasi', [loginController::class, 'getVerifikasion']);
    Route::post('verifikasiSend', [loginController::class, 'sendVerifikasion']);
    Route::get('login/google', [loginController::class, 'googleLogin']);
    Route::get('login/google/callback', [loginController::class, 'googleCallback']);
    //Membuat akun
    Route::get('membuatAkun', [loginController::class, 'membuatAkun']);
    Route::post('membuatAkun', [loginController::class, 'storeAkun']);
    Route::post('verifikasi', [loginController::class, 'verifikasi']);
    Route::post('login/google/callback', [loginController::class, 'storeAkunGoogle']);

});

Route::middleware('auth')->group(function () {
   //Home
    Route::get('home', [homeController::class, 'index']);

    //Berita
    Route::get('berita/{id}', [beritaController::class, 'index']);
    Route::get('daftarBerita', [beritaController::class, 'daftarBerita']);

    //UKM
    Route::get('daftarUKM', [ukmController::class, 'daftarUKM']);
    Route::get('UKM/{id}', [ukmController::class, 'index']);
    Route::get('MasukUKM/{id}', [ukmController::class, 'MasukUKM']);
    Route::post('MasukUKM/{id}', [ukmController::class, 'StoreMasukUKM']);
    Route::get('KeluarUKM/{id}', [ukmController::class, 'KeluarUKM']);
    Route::get('UKM/{id}/Kegiatan', [ukmController::class, 'Kegiatan']); 
    Route::post('UKM/{id}/Kegiatan', [ukmController::class, 'gabungKegiatan'])->name('gabungKegiatan');
    Route::post('UKM/{id}/Kegiatan/keluar', [ukmController::class, 'keluarKegiatan']); 

    Route::get('profil', [profilController::class, 'index']);
    Route::post('logout', [profilController::class, 'logout'])->name('logout');
    Route::get('profil/edit', [profilController::class, 'editProfil']);
    Route::post('profil/edit', [profilController::class, 'storeProfil']);

    Route::get('resetPassword', [profilController::class, 'sendOTP']);
    Route::post('resetPassword/reset', [profilController::class, 'resetOTP'])->name('resetOTP');
    Route::post('resetPassword/verify', [profilController::class, 'verifikasiOTP'])->name('verifikasiOTP');


    Route::get('resetPassword/update', [profilController::class, 'ressetPassword'])
        ->middleware('otp.verified')->name('passwordUpdate');
    Route::post('resetPassword/update', [profilController::class, 'updatePassword'])
        ->middleware('otp.verified')->name('passwordSend');

});

Route::middleware(['auth', 'role:pengurus'])->group(function () {

    //Bagian pengurus
    Route::get('pengurus/daftarAnggota', [pengurusController::class, 'index']);
    
    Route::get('pengurus/berita', [beritaController::class, 'pengurusBerita']);
    Route::post('pengurus/berita/edit', [beritaController::class, 'updateBerita']);
    Route::post('pengurus/berita/store', [beritaController::class, 'storeBerita']);
    Route::post('pengurus/berita/hapus', [beritaController::class, 'hapusBerita']);
    Route::get('pengurus/berita/tambah', [beritaController::class, 'tambahBerita']);
    Route::post('pengurus/berita/storeTambah', [beritaController::class, 'storeTambahBerita']);

    Route::get('pengurus/kegitan', [kegiatanController::class, 'pengurusKegiatan']);
    Route::post('pengurus/kegitan/edit', [kegiatanController::class, 'pengurusKegiatan']);
    Route::post('pengurus/kegitan/store', [kegiatanController::class, 'pengurusKegiatan']);
    
    Route::get('pengurus/profilUKM', [pengurusController::class, 'profilUKM']);
    Route::get('pengurus/profilUKM/edit', [pengurusController::class, 'editProfilUKM']);
    Route::post('pengurus/profilUKM/store', [pengurusController::class, 'storeProfilUKM']);

});

Route::middleware(['auth', 'role:admin'])->group(function () {

    //Bagian admin
    Route::get('admin/DaftarAkun', [adminController::class, 'index']);
    Route::get('admin/DaftarBerita', [adminController::class, 'DaftarBerita']);
    Route::get('admin/DaftarUKM', [adminController::class, 'DaftarUKM']);

});
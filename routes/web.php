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
use App\Http\Controllers\ukmAdminController;
use App\Http\Controllers\beritaAdminController;

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
    return redirect('/home');
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

Route::middleware(['auth', 'role:pengurus,pengurus utama,pembina'])->group(function () {
    
    Route::get('pengurus/berita', [beritaController::class, 'pengurusBerita']);
    Route::post('pengurus/berita/edit', [beritaController::class, 'updateBerita']);
    Route::post('pengurus/berita/store', [beritaController::class, 'storeBerita']);
    Route::post('pengurus/berita/hapus', [beritaController::class, 'hapusBerita']);
    Route::get('pengurus/berita/tambah', [beritaController::class, 'tambahBerita']);
    Route::post('pengurus/berita/storeTambah', [beritaController::class, 'storeTambahBerita']);

    Route::get('pengurus/kegiatan', [kegiatanController::class, 'pengurusKegiatan']);
    Route::get('pengurus/kegiatan/tambah', [kegiatanController::class, 'tambah']);
    Route::post('pengurus/kegiatan/tambahStore', [kegiatanController::class, 'store']);
    Route::post('pengurus/kegiatan/edit', [kegiatanController::class, 'editKegiatan']);
    Route::post('pengurus/kegiatan/store', [kegiatanController::class, 'storeKegiatan']);
    Route::post('pengurus/kegiatan/hapus', [kegiatanController::class, 'hapus']);

});

Route::middleware(['auth', 'role:pengurus utama,pembina'])->group(function () {

    Route::get('pengurus/daftarAnggota', [anggotaUkmController::class, 'index']);
    Route::post('pengurus/daftarAnggota/pengurus', [anggotaUkmController::class, 'pengurus']);
    Route::post('pengurus/daftarAnggota/anggota', [anggotaUkmController::class, 'anggota']);
    Route::post('pengurus/daftarAnggota/hapus', [anggotaUkmController::class, 'hapus']);
    
    Route::get('pengurus/profilUKM', [pengurusController::class, 'profilUKM']);
    Route::get('pengurus/profilUKM/edit', [pengurusController::class, 'editProfilUKM']);
    Route::post('pengurus/profilUKM/store', [pengurusController::class, 'storeProfilUKM']);

    Route::get('pengurus/Divisi', [divisiController::class, 'index']);
    Route::post('pengurus/Divisi/edit', [divisiController::class, 'edit']);
    Route::post('pengurus/Divisi/storeEdit', [divisiController::class, 'store']);
    Route::get('pengurus/Divisi/tambah', [divisiController::class, 'tambah']);
    Route::post('pengurus/Divisi/storeTambah', [divisiController::class, 'storeTambah']);
    Route::post('pengurus/Divisi/hapus', [divisiController::class, 'hapus']);

});

Route::middleware(['auth', 'role:pembina'])->group(function () {

    Route::post('pengurus/daftarAnggota/pengurusUtama', [anggotaUkmController::class, 'pengurusUtama']);

});

Route::middleware(['auth', 'role:admin,super admin'])->group(function () {

    //Bagian admin
    Route::get('admin/daftarAkun', [adminController::class, 'index']);
    Route::post('admin/daftarAkun/info', [adminController::class, 'info']);
    Route::post('admin/daftarAkun/hapus', [adminController::class, 'hapus']);
    Route::get('admin/daftarAkun/tambah', [adminController::class, 'tambah']);
    Route::post('admin/daftarAkun/store', [adminController::class, 'store']);
    Route::get('admin/daftarAkun/tambahPembina', [adminController::class, 'tambahPembina']);
    Route::post('admin/daftarAkun/storePembina', [adminController::class, 'storePembina']);
    Route::get('admin/daftarAkun/tambahUKM', [adminController::class, 'tambahUKM']);
    Route::post('admin/daftarAkun/tambahDivisi', [adminController::class, 'tambahDivisi']);
    Route::post('admin/daftarAkun/storeUKM', [adminController::class, 'storeUKM']);

    Route::get('admin/daftarBerita', [beritaAdminController::class, 'index']);
    Route::post('admin/daftarBerita/hapus', [beritaAdminController::class, 'hapus']);

    Route::get('admin/daftarUKM', [ukmAdminController::class, 'index']);
    Route::post('admin/daftarUKM/info', [ukmAdminController::class, 'info']);
    Route::get('admin/daftarUKM/tambah', [ukmAdminController::class, 'tambah']);
    Route::post('admin/daftarUKM/store', [ukmAdminController::class, 'store']);
    Route::post('admin/daftarUKM/hapus', [ukmAdminController::class, 'hapus']);

});
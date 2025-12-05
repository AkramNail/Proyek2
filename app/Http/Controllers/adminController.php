<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\anggotaUkm;
use App\Models\divisi;
use App\Models\ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{

    public function index()
    {
        $title = 'Daftar akun';
        $slug = 'Daftar akun';

        if(Auth::user()->role == 'super admin'){

            $dataAkun = anggota::where('role', '!=', 'super admin')->get();

        }else{

            $dataAkun = anggota::
                where('role', '!=', 'super admin')
                ->where('role', '!=', 'admin')->get();

        }

        return view('Admin/DaftarAkun.index', compact( 
            'title', 'slug', 'dataAkun'
        ));
    }

    public function info(Request $request){

        $title = 'Daftar akun';
        $slug = 'Daftar akun info';
        $idUser = $request->id;

        $dataAnggotaUkm = anggotaUkm::where('id_anggota', $idUser)->get();
        $dataAkun = anggota::where('id', $idUser)->first();

        $idUkm = $dataAkun->ukm;
        $dataUKM = ukm::where('id_Ukm', $idUkm)->first();

        return view('Admin/DaftarAkun/info.index', compact( 
            'title', 'slug', 
            'dataAkun', 'dataAnggotaUkm', 'dataUKM'
        ));

    }

    public function tambah(){
        
        $title = 'Tambah akun';
        $slug = 'Tambah akun';
        
        return view('Admin/DaftarAkun/tambah.index', compact( 
            'title', 'slug'
        ));

    }

    public function store(Request $request){

        if($request->role == 'pembina' || 
        $request->role == 'pengurus' || 
        $request->role == 'pengurus utama' ){

            if($request->role == 'pembina'){
                return redirect('/admin/daftarAkun/tambahPembina')    
                    ->with([
                        'nama' => $request->nama,
                        'nim' => $request->nim,
                        'email' => $request->email,
                        'password' => $request->password,
                        'role' => $request->role
                    ]);
            }else{
                return redirect('/admin/daftarAkun/tambahUKM')    
                    ->with([
                        'nama' => $request->nama,
                        'nim' => $request->nim,
                        'email' => $request->email,
                        'password' => $request->password,
                        'role' => $request->role
                    ]);
            }

        }

        anggota::insert([

            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'Password' => $request->password,
            'role' => $request->role,
            'ukm' => 0,
            'email_verified_at' => now()

        ]);

        return redirect('/admin/daftarAkun')
        ->with('success', 'Berhasil menambah akun');

    }

    public function tambahUKM(){

        $title = 'Tambah akun';
        $slug = 'Tambah akun';

        $nama = session('nama');
        $nim = session('nim');
        $email = session('email');
        $password = session('password');
        $role = session('role');

        $dataUKM = ukm::get();

        return view('Admin/DaftarAkun/tambahUKM.index', compact( 
            'title', 'slug', 'nama', 'nim', 'email', 'password', 'role', 'dataUKM'
        ));

    }

        public function tambahPembina(){

        $title = 'Tambah akun';
        $slug = 'Tambah akun';

        $nama = session('nama');
        $nim = session('nim');
        $email = session('email');
        $password = session('password');
        $role = session('role');

        $dataUKM = ukm::get();

        return view('Admin/DaftarAkun/tambahPembina.index', compact( 
            'title', 'slug', 'nama', 'nim', 'email', 'password', 'role', 'dataUKM'
        ));

    }

    public function tambahDivisi(Request $request){

        $title = 'Tambah akun';
        $slug = 'Tambah akun';

        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        $ukm = $request->ukm;

        $dataDivisi = divisi::where('id_Ukm', $ukm)->get();

        return view('Admin/DaftarAkun/tambahDivisi.index', compact( 
            'title', 'slug', 'nama', 'nim', 'email', 'password', 'role', 'dataDivisi', 'ukm'
        ));

    }

    public function storePembina(Request $request){

        anggota::insert([

            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'Password' => $request->password,
            'role' => $request->role,
            'ukm' => $request->ukm,
            'email_verified_at' => now()

        ]);

        return redirect('/admin/daftarAkun')
        ->with('success', 'Berhasil menambah akun');

    }

    public function storeUKM(Request $request){

        $id_divisi = $request->id_divisi;
        anggota::insert([

            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'Password' => $request->password,
            'role' => $request->role,
            'ukm' => $request->ukm,
            'email_verified_at' => now()

        ]);

        $dataAnggota = anggota::
            where('nim', $request->nim)
            ->where('nama', $request->nama)
            ->where('email', $request->email)->first();

        anggotaUkm::insert([
            'id_anggota' => $dataAnggota->id,
            'id_Ukm' => $request->ukm,
            'id_divisi' => $id_divisi,
        ]);

        return redirect('/admin/daftarAkun')
        ->with('success', 'Berhasil menambah akun');

    }

    public function hapus(Request $request){

        $idUser = $request->id;

        anggota::where('id', $idUser)->delete();

        return redirect('/admin/daftarAkun')
        ->with('success', 'Berhasil menghapus akun');

    }
 
}

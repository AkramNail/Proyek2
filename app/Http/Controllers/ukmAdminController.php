<?php

namespace App\Http\Controllers;

use App\Models\anggotaKegiatan;
use App\Models\anggotaUkm;
use App\Models\berita;
use App\Models\divisi;
use App\Models\kegiatan;
use App\Models\ukm;
use App\Models\anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ukmAdminController extends Controller
{

    public function index(){

        $title = 'Daftar UKM';
        $slug = 'Daftar UKM';

        $dataUKM = ukm::get();

        return view('Admin/DaftarUKM.index', compact( 
            'title', 'slug', 'dataUKM'
        ));

    }

    public function info(Request $request){

        $title = 'info UKM';
        $slug = 'info UKM';

        $id = $request->id;
        $dataUKM = ukm::where('id_Ukm', $id)->first();

        return view('Admin/DaftarUKM/info.index', compact( 
            'title', 'slug', 'dataUKM'
        ));

    }

    public function tambah(){

        $title = 'tambah UKM';
        $slug = 'tambah UKM';

        return view('Admin/DaftarUKM/tambah.index', compact( 
            'title', 'slug'
        ));

    }

    public function store(Request $request){

        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect('/pengurus/berita')
                ->withErrors('eror','eror pastikan anda mengirim gambar bertipe jpg, jpeg, png');
        }

        $namaFoto = time().'_'.$request->foto->getClientOriginalName();
        $request->foto->storeAs('public/Image/UKM', $namaFoto);

        ukm::insert([
            'nama_Ukm' =>  $request->nama,
            'deskripsi_Ukm' => $request->deskripsi,
            'logo_Ukm' => $namaFoto
        ]);

        return redirect('/admin/daftarUKM')
        ->with('success', 'Berhasil menambah ukm baru');

    }

    public function hapus(Request $request){

        $id = $request->id;

        anggotaKegiatan::where('id_Ukm', $id)->delete();

        anggotaUkm::where('id_Ukm', $id)->delete();

        anggota::where('ukm', $id)->update([
            'ukm' => 0,
            'role' => 'anggota'
        ]);

        divisi::where('id_Ukm', $id)->delete();

        kegiatan::where('id_Ukm', $id)->delete();

        berita::where('id_UKM', $id)->delete();

        ukm::where('id_Ukm', $id)->delete();

        return redirect('/admin/daftarUKM')
        ->with('success', 'Berhasil menghapus ukm tersebut');

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\anggotaKegiatan;
use App\Models\divisi;
use App\Models\kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class kegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pengurusKegiatan()
    {
        
        $title = 'List Kegiatan UKM';
        $slug = 'List Kegiatan UKM';

        $idUKM = Auth::user()->ukm;

        $dataAnggota = anggotaKegiatan::where('id_Ukm', $idUKM)
            ->get();

        $dataKegiatan = kegiatan::where('kegiatan.id_Ukm', $idUKM)
            ->join('divisi', 'divisi.id_divisi', '=', 'kegiatan.id_divisi')  
            ->get();

        return view('Pengurus/Kegiatan.index', compact(
            'title', 'slug', 
            'dataKegiatan', 'dataAnggota'
        ));


    }

    public function tambah(){

        $idUKM = Auth::user()->ukm;

        $title = 'Tambah Kegiatan UKM';
        $slug = 'Tambah Kegiatan UKM';

        $dataDivisi = divisi::where('id_Ukm', $idUKM)->get();

        return view('Pengurus/Kegiatan/tambah.index', compact(
            'title', 'slug', 
            'dataDivisi'
        ));
        
    }

    public function store(Request $request){
       
        $idUKM = Auth::user()->ukm;
        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'nama_kegiatan' => 'required',
            'deskripsi' => 'required',
            'id_divisi' => 'required',
            'jadwal_keigiatan' => 'required',
            'foto_kegiatan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect('/pengurus/kegiatan')
                ->with('eror','eror pastikan anda mengirim gambar bertipe jpg, jpeg, png');
        }

        $namaFoto = time().'_'.$request->foto_kegiatan->getClientOriginalName();
        $request->foto_kegiatan->storeAs('public/Image/Kegiatan', $namaFoto);

        kegiatan::insert([
            'id_Ukm' => $idUKM,
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi' => $request->deskripsi,
            'id_divisi' => $request->id_divisi,
            'jadwal_keigiatan' => $request->jadwal_keigiatan,
            'foto_kegiatan' => $namaFoto,
            'updated_at' => now()
        ]);
        
        return redirect('/pengurus/kegiatan')
        ->with('success', 'Berhasil tambah kegiatan');

    }

    public function editKegiatan(Request $request){

        $title = 'Edit Kegiatan UKM';
        $slug = 'Edit Kegiatan UKM';

        $idKegiatan = $request->id;
        $idUKM = Auth::user()->ukm;

        $dataKegiatan = kegiatan::
            where('id_kegiatan', $idKegiatan)
            ->first();
        
        $dataDivisi = divisi::where('id_Ukm', $idUKM)->get();

        return view('Pengurus/Kegiatan/edit.index', compact(
            'title', 'slug', 
            'dataDivisi', 'dataKegiatan'
        ));

    }

    public function storeKegiatan(Request $request){

        // Validasi input
        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'nama_kegiatan' => 'required',
            'deskripsi' => 'required',
            'id_divisi' => 'required',
            'jadwal_keigiatan' => 'required',
            'foto_kegiatan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect('/pengurus/kegiatan')
                ->with('eror','eror pastikan anda mengirim gambar bertipe jpg, jpeg, png');
        }

        //cek ada foto yang baru masuk atau tidak
        if($request->hasFile('foto_kegiatan')){

            $namaFoto = time().'_'.$request->foto_kegiatan->getClientOriginalName();
            $request->foto_kegiatan->storeAs('public/Image/Kegiatan', $namaFoto);

            //update dengan foto
            $hasil = kegiatan::where(
                'id_kegiatan', $id
            )->update([
                'nama_kegiatan' => $request->nama_kegiatan,
                'deskripsi' => $request->deskripsi,
                'id_divisi' => $request->id_divisi,
                'jadwal_keigiatan' => $request->jadwal_keigiatan,
                'foto_kegiatan' => $namaFoto,
                'updated_at' => now()
            ]);

        }else{

            //Update tanpa foto
            $hasil = kegiatan::where(
                'id_kegiatan', $id
            )->update([
                'nama_kegiatan' => $request->nama_kegiatan,
                'deskripsi' => $request->deskripsi,
                'id_divisi' => $request->id_divisi,
                'jadwal_keigiatan' => $request->jadwal_keigiatan,
                'updated_at' => now()
            ]);

        }

        if(!$hasil){

            return redirect('/home')
            ->with('error', 'Gagal update kegiatan');

        }

        return redirect('/pengurus/kegiatan')
        ->with('success', 'Berhasil update kegiatan');

    }

    public function hapus(Request $request){
        
        $idKegiatan = $request->id;
        kegiatan::where('id_kegiatan', $idKegiatan)
            ->delete();

        anggotaKegiatan::where('id_kegiatan', $idKegiatan)
            ->delete();

        return redirect('/pengurus/kegiatan')
        ->with('success', 'Berhasil hapus kegiatan');
    }


}

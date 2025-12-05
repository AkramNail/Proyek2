<?php

//Yanto bapaknya ivan

namespace App\Http\Controllers;

use App\Models\anggotaUkm;
use App\Models\divisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class divisiController extends Controller
{

    public function index()
    {

        $title = 'List Divisi';
        $slug = 'List Divisi';

        $idUKM = Auth::user()->ukm;
        
        $dataDivisi = divisi::where('id_Ukm', $idUKM)->get();
        $dataAnggotaUkm = anggotaUkm::where('id_Ukm', $idUKM)->get();

        return view('Pengurus/Divisi.index', compact(
            'title', 'slug', 'dataDivisi' , 'dataAnggotaUkm'));

    }

    public function edit(Request $request){

        $title = 'Edit Divisi';
        $slug = 'Edit Divisi';

        $idUKM = Auth::user()->ukm;

        $dataDivisi = divisi::where('id_Ukm', $idUKM)->
            where('id_divisi', $request->id_divisi)
            ->first();

        return view('Pengurus/Divisi/edit.index', compact(
            'title', 'slug', 'dataDivisi'));

    }

    public function store(Request $request){

        $idUKM = Auth::user()->ukm;

        divisi::where('id_Ukm', $idUKM)->
            where('id_divisi', $request->id_divisi)
            ->update([

                'nama_divisi' => $request->nama_divisi,
                'deskripsi_divisi' => $request->deskripsi_divisi,

            ]);

        return redirect('/pengurus/Divisi')->with('success', 
            'Divisi berhasil diupdate');

    }

    public function tambah(){

        $title = 'Tambah Divisi';
        $slug = 'Tambah Divisi';

        return view('Pengurus/Divisi/tambah.index', compact(
            'title', 'slug'));

    }

    public function storeTambah(Request $request){

        $idUKM = Auth::user()->ukm;

        divisi::insert([

            'nama_divisi' => $request->nama_divisi,
            'deskripsi_divisi' => $request->deskripsi_divisi,
            'id_Ukm' => $idUKM,

        ]);
            
        return redirect('/pengurus/Divisi')->with('success', 
            'Berhasil tambah divisi');
        
    }

    public function hapus(Request $request){

        $idUKM = Auth::user()->ukm;

        divisi::where('id_Ukm', $idUKM)->
            where('id_divisi', $request->id_divisi)
            ->delete();

        return redirect('/pengurus/Divisi')->with('success', 
            'Divisi berhasil dihapus');

    }


}

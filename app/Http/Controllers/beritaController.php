<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\ukm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class beritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $title = 'Berita';
        $slug = 'berita';
        $dataBerita = berita::join('ukm', 'berita.id_UKM', 'ukm.id_Ukm')
            ->where('id_Berita' , $id)
            ->first();

        if($dataBerita) {
            return view('User/Berita.index', compact('title', 'slug', 'dataBerita'));
        } else {
            return view('eror', compact('title', 'slug', 'dataBerita'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function daftarBerita()
    {

        $title = 'Daftar Berita';
        $slug = 'daftar berita';
        $dataBerita = berita::all();
        $dataUKM = ukm::all();
        
        return view('User/Berita/DaftarBerita.index', compact(
            'title', 'slug', 
            'dataBerita', 'dataUKM'
        ));

    }

    public function pengurusBerita(){

        $title = 'List Berita UKM';
        $slug = 'List Berita UKM';

        $idUKM = Auth::user()->ukm;

        $dataBerita = berita::where('id_UKM', $idUKM)
            ->get();

        return view('Pengurus/Berita.index', compact(
            'title', 'slug',
            'dataBerita'
        ));

    }

    public function updateBerita(Request $request){

        $title = 'Edit Berita UKM';
        $slug = 'Edit Berita UKM';

        $id_Berita = $request->id_Berita;
        $idUKM = Auth::user()->ukm;

        $dataBerita = berita::where('id_UKM', $idUKM)
            ->where('id_Berita', $id_Berita)
            ->first();

        return view('Pengurus/Berita/edit.index', compact(
            'title', 'slug',
            'dataBerita'
        ));

    }

    public function storeBerita(Request $request){

        // Validasi input
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        //cek ada foto yang baru masuk atau tidak
        if($request->hasFile('foto')){

            $namaFoto = time().'_'.$request->foto->getClientOriginalName();
            $request->foto->storeAs('public/Image/Berita', $namaFoto);

            //update dengan foto
            $hasil = berita::where(
                'id_Berita', $request->id_Berita
            )->update([
                'judul_berita' => $request->judul,
                'isi_berita' => $request->isi,
                'foto_berita' => $namaFoto
            ]);

        }else{

            //Update tanpa foto
            $hasil = berita::where(
                'id_Berita', $request->id_Berita
            )->update([
                'judul_berita' => $request->judul,
                'isi_berita' => $request->isi,
            ]);

        }

        if(!$hasil){

            return redirect('/pengurus/berita')
            ->with('error', 'Gagal update berita');

        }

        return redirect('/pengurus/berita')
        ->with('success', 'Berhasil update berita');

    }


}

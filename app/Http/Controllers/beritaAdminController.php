<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;

class beritaAdminController extends Controller
{
    public function index(){

        $title = 'Daftar berita';
        $slug = 'Daftar berita';

        $dataBerita = berita::get();

        return view('Admin/DaftarBerita.index', compact( 
            'title', 'slug', 'dataBerita'
        ));

    }

    public function hapus(Request $request){

        $hasil = berita::where(
            'id_Berita', $request->id_Berita
        )->delete();

        if(!$hasil){

            return redirect('/admin/daftarBerita')
            ->with('error', 'Gagal hapus berita');

        }

        return redirect('/admin/daftarBerita')
        ->with('success', 'Berhasil hapus berita');

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\anggotaUkm;
use App\Models\kegiatan;
use App\Models\divisi;
use App\Models\ukm;
use App\Models\anggotaKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ukmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        $title = 'UKM';
        $slug = 'ukm';
        $dataAnggotaUKM = anggotaUkm::where(
            'id_anggota', Auth::user()->id)
            ->where('id_Ukm', $id)
            ->first();

        $adg = Auth::user()->id;

        $dataUKM = ukm::where('id_Ukm', $id)->first();

        return view('User/UKM.index', compact(
            'title', 'slug', 'dataUKM',
            'dataAnggotaUKM'
        ));

    }

    public function daftarUKM(){

        $title = 'Daftar UKM';
        $slug = 'daftar ukm';
        $dataUKM = ukm::all();

        return view('User/UKM/DaftarUKM.index', compact(
            'title', 'slug', 'dataUKM'
        ));

    }

    public function MasukUKM($id)
    {

        $title = 'Masuk UKM';
        $slug = 'masuk ukm';
        $dataDivisi = divisi::where('divisi.id_Ukm', $id)->get();
        $idUKM = $id;

        $adas = Auth::user();
        $ada = $adas->nama;

        return view('User/UKM/MasukUKM.index', compact(
            'title', 'slug', 'dataDivisi', 'idUKM'
        ));

    }

    public function StoreMasukUKM(Request $request){

        $title = 'Masuk UKM';
        $slug = 'masuk ukm';

        anggotaUkm::insert([

            'id_anggota' => Auth::id(),
            'id_Ukm' => $request->id,
            'id_divisi' => $request->divisi

        ]);

        
        return redirect('UKM/'. $request->id)
        ->with('success', 'Anda berhasil masuk UKM!')
        ->with([
            'title' => $title,
            'slug' => $slug,
        ]);
    }

    public function KeluarUKM($id){

        $title = 'UKM';
        $slug = 'ukm';

        anggotaUkm::where('id_anggota', Auth::id())
            ->where('id_Ukm', $id)
            ->delete();

        return redirect('UKM/'. $id)
        ->with([
            'title' => $title,
            'slug' => $slug,
        ]);
        
    }

    
    public function Kegiatan($id)
    {

        if (session()->has('success')) {
            $success = "Berhasil keluar";
        } else {
            $success = "";
        }


        $title = 'Kegiatan';
        $slug = 'kegiatan';

        $dataKegitan = kegiatan::where('kegiatan.id_Ukm', $id)
            ->get();

        $dataAnggota = anggotaKegiatan::where(
            'id_Anggota' , Auth::id())
            ->get();

        return view('User/UKM/Kegiatan.index', compact('title', 'slug', 'dataKegitan', 
            'id', 'dataAnggota', 'success'));

    }

    public function gabungKegiatan(Request $request)
    {
        
        $title = 'Kegiatan';
        $slug = 'kegiatan';
        
        $id = $request->id;
        $idKegiatan = $request->idKegiatan;

        anggotaKegiatan::insert([

            'id_Kegiatan' => $idKegiatan,
            'id_Ukm' => $id,
            'id_Anggota' => Auth::id()

        ]);

        $dataKegitan = kegiatan::where('kegiatan.id_Ukm', $id)
            ->get();

        $dataAnggota = anggotaKegiatan::where(
            'id_Anggota' , Auth::id())
            ->get();

        return redirect('UKM/'.$id.'/Kegiatan')
            ->with('success', 'Berhasil gabung kegiatan');

    }

    public function keluarKegiatan(Request $request){
        
        anggotaKegiatan::
            where('id_Ukm', $request->id)
            ->where('id_Kegiatan', $request->idKegiatan)
            ->where('id_Anggota', Auth::id())
            ->delete();

            $id = $request->id;

        return redirect('UKM/'.$id.'/Kegiatan')
            ->with('success', 'Berhasil keluar');

    }



}

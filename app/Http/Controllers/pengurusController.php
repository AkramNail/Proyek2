<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\divisi;
use App\Models\anggotaUkm;
use App\Models\ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = 'List Anggota UKM';
        $slug = 'List Anggota UKM';
        
        $idUKM = Auth::user()->ukm;

        $dataAnggota = anggotaUkm::where('anggota_ukm.id_Ukm', $idUKM)
            ->join('anggota', 'anggota_ukm.id_anggota', '=', 'anggota.id')
            ->join('divisi', 'anggota_ukm.id_divisi', '=', 'divisi.id_divisi')
            ->get();

        return view('Pengurus/Anggota.index', compact( 
            'title', 'slug', 'dataAnggota'
        ));

    }

    public function profilUKM()
    {
        
        $title = 'Profil UKM';
        $slug = 'Profil UKM';

        $idUKM = Auth::user()->ukm;

        $dataUkm = ukm::where(
            'id_Ukm', $idUKM
        )->first();

        return view('Pengurus/ProfilUKM.index', compact(
            'title', 'slug',
            'dataUkm'
        ));

    }


}

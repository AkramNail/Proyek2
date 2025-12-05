<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\anggotaUkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class anggotaUkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = 'List Anggota UKM';
        $slug = 'List Anggota UKM';
        
        $idUKM = Auth::user()->ukm;

        if(Auth::user()->role == 'pembina'){

            $dataAnggota = anggotaUkm::where('anggota_ukm.id_Ukm', $idUKM)
                ->join('anggota', 'anggota_ukm.id_anggota', '=', 'anggota.id')
                ->join('divisi', 'anggota_ukm.id_divisi', '=', 'divisi.id_divisi')
                ->get();

        }else{
            
            $dataAnggota = anggotaUkm::where('anggota_ukm.id_Ukm', $idUKM)
                ->join('anggota', 'anggota_ukm.id_anggota', '=', 'anggota.id')
                ->where('anggota.role', '!=', 'pengurus utama')
                ->join('divisi', 'anggota_ukm.id_divisi', '=', 'divisi.id_divisi')
                ->get();

        }

        return view('Pengurus/Anggota.index', compact( 
            'title', 'slug', 'dataAnggota'
        ));

    }

    public function pengurus(Request $request){

        $idUKM = Auth::user()->ukm;
        $idAnggota = $request->id;

        anggota::where('id', $idAnggota)
            ->update([
                'role' => 'pengurus',
                'ukm' => $idUKM
            ]);
        
        return redirect('pengurus/daftarAnggota')->with('success', 'Behasil mengubah status user menjadi pengurus');

    }

    public function pengurusUtama(Request $request){

        $idUKM = Auth::user()->ukm;
        $idAnggota = $request->id;

        anggota::where('id', $idAnggota)
            ->update([
                'role' => 'pengurus utama',
                'ukm' => $idUKM
            ]);
        
        return redirect('pengurus/daftarAnggota')->with('success', 'Behasil mengubah status user menjadi pengurus utama');

    }

    public function anggota(Request $request){

        $idUKM = Auth::user()->ukm;
        $idAnggota = $request->id;

        anggota::where('id', $idAnggota)
            ->update([
                'role' => 'anggota',
                'ukm' => 0
            ]);
        
        return redirect('pengurus/daftarAnggota')->with('success', 'Behasil mengubah status user menjadi anggota');

    }

    public function hapus(Request $request){

        $idAnggota = $request->id;
        $idUKM = Auth::user()->ukm;

        anggota::where('id', $idAnggota)
            ->update([
                'role' => 'anggota',
                'ukm' => 0
            ]);

        anggotaUkm::where('id_anggota', $idAnggota)
            ->where('id_Ukm', $idUKM)
            ->delete();
        
        return redirect('pengurus/daftarAnggota')->with('success', 'Behasil menghapus anggota dari UKM');

    }

}

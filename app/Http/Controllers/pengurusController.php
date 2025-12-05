<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\divisi;
use App\Models\anggotaUkm;
use App\Models\ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class pengurusController extends Controller
{

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

    public function editProfilUKM()
    {
        
        $title = 'Edit Profil UKM';
        $slug = 'Edit Profil UKM';

        $idUKM = Auth::user()->ukm;

        $dataUkm = ukm::where(
            'id_Ukm', $idUKM
        )->first();

        return view('pengurus/profilUKM/edit.index', compact(
            'title', 'slug',
            'dataUkm'
        ));

    }

    public function storeProfilUKM(Request $request)
    {
        $idUKM = Auth::user()->ukm;

        $validator  = Validator::make($request->all(), [
            'nama_Ukm' => 'required|string|max:255',
            'deskripsi_Ukm' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('/pengurus/profilUKM')
                ->withErrors(['eror','eror pastikan anda mengirim gambar bertipe jpg, jpeg, png'])->withInput();
        }

        if($request->hasFile('foto')){


            $namaFoto = time().'_'.$request->foto->getClientOriginalName();
            $request->foto->storeAs('public/Image/UKM', $namaFoto);

            ukm::where('id_Ukm', $idUKM)->update([
                'nama_Ukm' => $request->nama_Ukm,
                'deskripsi_Ukm' => $request->deskripsi_Ukm,
                'logo_Ukm' => $namaFoto,
            ]);

        }else{

            ukm::where('id_Ukm', $idUKM)->update([
                'nama_Ukm' => $request->nama_Ukm,
                'deskripsi_Ukm' => $request->deskripsi_Ukm,
            ]);

        }

        return redirect('pengurus/profilUKM')->with('success', 'Profil UKM berhasil diperbarui.');
    }

}

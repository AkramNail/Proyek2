<?php

namespace App\Http\Controllers;

use App\Models\anggotaKegiatan;
use App\Models\kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $dataKegiatan = kegiatan::where('id_Ukm', $idUKM)
            ->get();

        return view('Pengurus/Kegiatan.index', compact(
            'title', 'slug', 
            'dataKegiatan', 'dataAnggota'
        ));


    }

    public function editKegiatan(Request $request){

        //$dataUKM

    }

    public function storeKegiatan(Request $request){



    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

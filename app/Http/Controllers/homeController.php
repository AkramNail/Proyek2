<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\ukm;
use Illuminate\Http\Request;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Home';
        $slug = 'home';

        $dataUKM = ukm::all();

        $dataBerita = berita::join(
            'ukm', 'berita.id_UKM', '=', 'ukm.id_Ukm'
        )->latest('berita.created_at')
        ->take(5)->get();

        return view('home', compact(
            'title', 'slug',
            'dataUKM', 'dataBerita'
        ));
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

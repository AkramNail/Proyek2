@extends('Pengurus.layout.main')

@section('content')

<div class="container mt-4">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif


    {{-- Logo UKM --}}
    <div class="mb-4">
        <img src="{{ asset('storage/Image/UKM/'.$dataUkm->logo_Ukm) }}" 
             class="img-fluid rounded" 
             style="max-width: 120px;">
    </div>

    {{-- Nama UKM --}}
    <label class="form-label fw-semibold">Nama UKM</label>
    <input type="text" 
           class="form-control border-2 rounded-3 mb-3" 
           value="{{ $dataUkm->nama_Ukm }}" 
           readonly>

    {{-- Deskripsi UKM --}}
    <label class="form-label fw-semibold">Deskripsi UKM</label>
    <textarea rows="3" 
              class="form-control border-2 rounded-3 mb-3" 
              readonly>{{ $dataUkm->deskripsi_Ukm }}</textarea>

    <div class="d-flex gap-3">

        {{-- Tombol Edit --}}
        <a href="{{ url('/pengurus/profilUKM/edit') }}"
           class="btn border-2 rounded-pill px-4 py-2"
           style="border-color: orange; color: orange; background: white;">
            Edit profil UKM
        </a>

        {{-- Tombol Lihat --}}
        <a href="{{ url('/UKM'.$dataUkm->id_Ukm) }}"
           class="btn border-2 rounded-pill px-4 py-2"
           style="border-color: #00e676; color: #00c853; background: white;">
            Lihat profil UKM
        </a>

    </div>

</div>

@endsection

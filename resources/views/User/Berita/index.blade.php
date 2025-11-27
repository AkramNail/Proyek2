@extends('layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 80px;"></div>

<div class="container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $dataBerita->judul_berita }}</h3>
        </div>

        <div class="card-body">

            <!-- Foto Berita -->
            <div class="text-center mb-4">
                <img src="{{ asset('storage/Image/Berita/'.$dataBerita->foto_berita) }}"
                     alt="Foto Berita"
                     class="img-fluid rounded"
                     style="max-height:350px; object-fit:cover;">
            </div>

            <!-- Nama UKM -->
            <h5 class="text-muted">
                <b>Nama UKM:</b> {{ $dataBerita->nama_Ukm }}
            </h5>

            <!-- Tanggal -->
            <p class="text-secondary mb-3">
                <i class="bi bi-calendar"></i> {{ $dataBerita->created_at }}
            </p>

            <!-- Isi Berita -->
            <div class="p-3 rounded bg-light">
                <div class="p-3 rounded bg-light" style="font-size: 1.1rem; line-height: 1.7;">
                    {!! nl2br(e($dataBerita->isi_berita)) !!}
                </div>
            </div>

        </div>
    </div>

</div>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

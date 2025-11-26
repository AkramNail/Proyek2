@php $fullwidth = true; @endphp
@extends('layout.main')

@section('content')

<!-- HERO SECTION -->
<div style="position: relative; width: 100%; height: 550px; overflow: hidden;">
    <img src="{{ asset('storage/Image/Layout/banner-polindra.png') }}" style="width: 100%; height: 100%; object-fit: cover;">

    <div style="position: absolute; top: 40%; left: 5%; color: white; font-size: 48px; font-weight: bold; letter-spacing: 3px;">
        E-UKM <br> POLINDRA
    </div>
</div>

<!-- LOGO UKM SLIDER -->
<div style="background-color:#0D4C92; padding: 25px 0; text-align:center;">
    <div style="display:flex; justify-content:center; gap:40px; flex-wrap:wrap;">
        @foreach($dataUKM as $ukm)
            <a href="/UKM/{{ $ukm->id_Ukm }}">
                <img src="{{ asset('storage/Image/UKM/'.$ukm->logo_Ukm) }}" 
                style="width:95px; height:95px; border-radius:50%; object-fit:cover; background:white; padding:8px;">
            </a>
        @endforeach
    </div>
</div>

<!-- BERITA TERKINI -->
<div class="container mt-5">
    <h2 class="fw-bold mb-4">BERITA TERKINI</h2>

    <div class="row g-4">
        @foreach($dataBerita as $item)
        <div class="col-md-4">
            <a href="/berita/{{ $item->id_Berita }}" style="text-decoration:none; color:inherit;">
            <div class="card shadow-sm" style="border-radius:15px; overflow:hidden;">
                <img src="{{ asset('storage/Image/Berita/'.$item->foto_berita) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                <div class="card-body">
                    <div class="d-flex justify-content-between text-muted mb-2">
                        <small>{{ $item->nama_Ukm }}</small>
                        <small>{{ $item->created_at }}</small>
                    </div>
                    <h6 class="fw-bold">{{ $item->judul_berita }}</h6>
                    <p class="mt-2" style="font-size:14px;">{!! Str::limit($item->isi_berita, 100) !!}</p>
                </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a href="/daftarBerita" class="btn btn-primary px-4 py-2" style="border-radius:25px;">LIHAT SEMUA BERITA</a>
    </div>
</div>

<!-- TENTANG WEBSITE -->
<div class="container mt-5 mb-5">
    <div class="row align-items-center">

        <div class="col-md-6">
            <img src="{{ asset('storage/Image/Layout/illustration.png') }}" style="width:100%;">
        </div>

        <div class="col-md-6">
            <h2 class="fw-bold mb-3">Tentang Website Ini</h2>
            <p style="font-size:17px; line-height:1.6;">
                Website E-UKM Polindra adalah platform resmi yang memfasilitasi informasi, pendaftaran,
                dan aktivitas Unit Kegiatan Mahasiswa di Politeknik Negeri Indramayu. Melalui website ini,
                mahasiswa dapat mengenal berbagai UKM, bergabung sebagai anggota, serta mengikuti berita
                dan kegiatan terbaru kampus.
            </p>
        </div>

    </div>
</div>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

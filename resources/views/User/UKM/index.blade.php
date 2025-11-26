@extends('layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 80px;"></div>

<div class="container mt-4">

    <!-- Card Utama -->
    <div class="card shadow-sm p-4 text-center">

        <!-- Logo UKM -->
        <img src="{{ asset('storage/Image/UKM/'.$dataUKM->logo_Ukm) }}" 
             alt="Logo UKM" 
             class="mx-auto d-block mb-3"
             style="width:150px; height:150px; object-fit:cover; border-radius:50%;">

        <!-- Nama UKM -->
        <h2 class="fw-bold">{{ $dataUKM->nama_Ukm }}</h2>
        
        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif


        <!-- Tombol Aksi -->
        <div class="mt-3 d-flex justify-content-center gap-3">

            @if (!empty($dataAnggotaUKM))
                
                <!-- Tombol Keluar dengan Modal -->
                <button class="btn btn-danger px-4" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalKeluar">
                    Keluar UKM
                </button>

                <a href="{{ url('UKM/'.$dataUKM->id_Ukm.'/Kegiatan') }}" 
                    class="btn btn-secondary px-4">
                    Daftar kegiatan
                </a>

            @else
                <a href="{{ url('MasukUKM/'.$dataUKM->id_Ukm) }}" 
                   class="btn btn-primary px-4">
                    Gabung UKM
                </a>
            @endif

        </div>

    </div>

    <!-- Deskripsi UKM -->
    <div class="card mt-4 p-4">
        <h4 class="fw-bold">Deskripsi UKM</h4>
        <p style="text-align: justify; font-size: 15px;">
            {{ $dataUKM->deskripsi_Ukm }}
        </p>
    </div>

</div>


<!-- ========================= -->
<!-- Modal Konfirmasi Keluar   -->
<!-- ========================= -->
<div class="modal fade" id="modalKeluar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Keluar UKM</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center">
        <p>Apakah Anda yakin ingin keluar dari UKM ini?</p>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

        <a href="{{ url('KeluarUKM/'.$dataUKM->id_Ukm) }}" 
           class="btn btn-danger">
           Ya, Keluar
        </a>
      </div>

    </div>
  </div>
</div>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

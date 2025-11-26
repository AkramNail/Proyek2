@extends('layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 100px;"></div>


@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card p-4" style="border-radius: 12px;">
    
    {{-- ID --}}
    <div class="mb-3">
        <label class="fw-bold mb-1">ID :</label>
        <input type="text" class="form-control" value="{{ $dataUser->nim }}" readonly>
    </div>

    {{-- Nama --}}
    <div class="mb-3">
        <label class="fw-bold mb-1">Nama :</label>
        <input type="text" class="form-control" value="{{ $dataUser->nama }}" readonly>
    </div>

    {{-- Tombol-tombol --}}
    <div class="d-flex gap-2 mt-3">
        <a href="{{ url('profil/edit') }}" class="btn btn-primary px-4">
            Edit Profil
        </a>

        <a href="{{ url('resetPassword') }}" class="btn btn-primary px-4">
            Reset Password
        </a>

        <!-- Tombol Logout -->
        <button class="btn btn-danger px-4" data-bs-toggle="modal" data-bs-target="#modalKeluar">
            Logout
        </button>
    </div>

</div>

<!-- ========================= -->
<!-- Modal Konfirmasi Logout   -->
<!-- ========================= -->
<div class="modal fade" id="modalKeluar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center">
        <p>Apakah Anda yakin ingin logout?</p>
      </div>

      <div class="modal-footer d-flex justify-content-between">

        <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                Ya, Keluar
            </button>
        </form>

      </div>

    </div>
  </div>
</div>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

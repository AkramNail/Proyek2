@extends('Admin.layout.main')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm border-0">
        <div class="card-body">

            {{-- Bagian Logo + Nama UKM --}}
            <div class="d-flex align-items-center mb-4">
                <img src="{{ asset('storage/Image/UKM/' . $dataUKM->logo_Ukm) }}"
                     class="rounded"
                     style="width: 120px; height: auto; margin-right: 20px;">
                
                <div>
                    <h3 class="mb-0">{{ $dataUKM->nama_Ukm }}</h3>
                    <small class="text-muted">ID: {{ $dataUKM->id_Ukm }}</small>
                </div>
            </div>

            <hr>

            {{-- Deskripsi UKM --}}
            <h5 class="fw-bold">Deskripsi UKM</h5>
            <p style="text-align: justify; white-space: pre-line; font-size: 15px;">
                {{ $dataUKM->deskripsi_Ukm }}
            </p>

        </div>
    </div>

</div>

@endsection

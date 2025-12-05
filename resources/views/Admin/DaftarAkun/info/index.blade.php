@extends('Admin.layout.main')

@section('content')

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
<div class="container mt-4">

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detail Akun</h5>
        </div>

        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Nama Akun:</strong></p>
                    <p class="text-muted">{{ $dataAkun->nama }}</p>
                </div>

                <div class="col-md-6">
                    <p class="mb-1"><strong>NIM Akun:</strong></p>
                    <p class="text-muted">{{ $dataAkun->nim }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Email Akun:</strong></p>
                    <p class="text-muted">{{ $dataAkun->email }}</p>
                </div>

                <div class="col-md-6">
                    <p class="mb-1"><strong>Role Akun:</strong></p>
                    <span class="badge bg-success">
                        {{ $dataAkun->role }}
                    </span>
                </div>
            </div>

            <hr>

            {{-- SWITCH BAGIAN INFORMASI KHUSUS ROLE --}}
            @switch($dataAkun->role)

                @case('anggota')
                    @php($count = 0)
                    @foreach ($dataAnggotaUkm as $item)
                        @php($count++)
                    @endforeach

                    <div class="alert alert-info mt-3">
                        <strong>Jumlah UKM yang diikuti:</strong> {{ $count }}
                    </div>
                @break

                @case('admin')
                    <div class="alert alert-info mt-3">
                        <strong>Admin tidak memiliki data UKM khusus.</strong>
                    </div>
                @break

                @default
                    <div class="alert alert-info mt-3">
                        <strong>UKM yang diurus:</strong> {{ $dataUKM->nama_Ukm }}
                    </div>
            @endswitch

        </div>
    </div>

</div>



@endsection

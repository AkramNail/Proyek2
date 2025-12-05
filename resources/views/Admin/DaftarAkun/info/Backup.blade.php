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

<b>Nama akun: {{ $dataAkun->nama }}</b>
<b>Nim akun: {{ $dataAkun->nama }}</b>
<b>Email akun: {{ $dataAkun->nama }}</b>
<b>Role akun: {{ $dataAkun->nama }}</b>

@switch($dataAkun->role)
    @case('anggota')
            @php($count = 0)
            @foreach ($dataAnggotaUkm as $item)
                @php($count++)
            @endforeach
            <b>Jumlah ukm yang di ikuti: {{ $count }}</b>
        @break

    @case('admin')
        @break

    @default
        <b>UKM yang diurus: {{ $dataUKM->nama_Ukm }}</b>
@endswitch


@endsection

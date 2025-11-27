@extends('Pengurus.layout.main')

@section('content')

<form method="POST" action="{{ url('/pengurus/profilUKM/store') }}"
enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="mt-2">
        <b>Foto lama</b>
        <img src="{{ asset('storage/Image/Ukm/' . $dataUkm->logo_Ukm) }}" width="150">
    </div>

    <div class="mb-3">
        <label class="form-label">judul berita</label>
        <input type="text" name="nama_Ukm" class="form-control" 
            value="{{ $dataUkm->nama_Ukm }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">isi berita</label>
        <input type="text" name="deskripsi_Ukm" class="form-control" 
            value="{{ $dataUkm->deskripsi_Ukm }}" required>
    </div>

    <br><br>
    <a href="{{ url('/pengurus/profilUKM') }}" class="btn btn-danger w-100">
        batalkan
    </a>

    <button type="submit" class="btn btn-success w-100">
        update berita
    </button>

</form>

@endsection

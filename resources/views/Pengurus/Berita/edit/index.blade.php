@extends('Pengurus.layout.main')

@section('content')

<form method="POST" action="{{ url('/pengurus/berita/store') }}"
enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id_Berita" class="form-control" 
        value="{{ $dataBerita->id_Berita }}">

    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="mt-2">
        <b>Foto lama</b>
        <img src="{{ asset('storage/Image/Berita/' . $dataBerita->foto_berita) }}" width="150">
    </div>

    <div class="mb-3">
        <label class="form-label">judul berita</label>
        <input type="text" name="judul" class="form-control" 
            value="{{ $dataBerita->judul_berita }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">isi berita</label>
        <input type="text" name="isi" class="form-control" 
            value="{{ $dataBerita->isi_berita }}" required>
    </div>

    <br><br>
    <a href="{{ url('/pengurus/berita') }}" class="btn btn-danger w-100">
        batalkan
    </a>

    <button type="submit" class="btn btn-success w-100">
        update berita
    </button>

</form>



@endsection

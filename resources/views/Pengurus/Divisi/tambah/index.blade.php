@extends('Pengurus.layout.main')

@section('content')

<form method="POST" action="{{ url('/pengurus/Divisi/storeTambah') }}"
enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="mb-3">
        <label class="form-label">Nama divisi</label>
        <input type="text" name="nama_divisi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">isi berita</label>
        <textarea name="deskripsi_divisi" class="form-control" rows="8" style="resize: vertical;" 
        required></textarea>
    </div>

    <br><br>
    <a href="{{ url('/pengurus/Divisi') }}" class="btn btn-danger w-100">
        batalkan
    </a>

    <button type="submit" class="btn btn-success w-100">
        tambah divisi
    </button>

</form>

@endsection

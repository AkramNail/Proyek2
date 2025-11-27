@extends('Pengurus.layout.main')

@section('content')

<form method="POST" action="{{ url('/pengurus/berita/storeTambah') }}"
enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">judul berita</label>
        <input type="text" name="judul" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">isi berita</label>
        <input type="text" name="isi" class="form-control" required>
    </div>

    <br><br>
    <a href="{{ url('/pengurus/berita') }}" class="btn btn-danger w-100">
        batalkan
    </a>

    <button type="submit" class="btn btn-success w-100">
        Tambah berita
    </button>

</form>



@endsection

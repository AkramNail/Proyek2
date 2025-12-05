@extends('Pengurus.layout.main')

@section('content')

<form method="POST" action="{{ url('/admin/daftarUKM/store') }}"
enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="mb-3">
        <label class="form-label">Logo UKM</label>
        <input type="file" name="foto" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama UKM</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi UKM</label>
        <textarea name="deskripsi" 
                class="form-control" 
                rows="6" 
                required></textarea>
    </div>

    <br><br>
    <a href="{{ url('/admin/daftarUKM') }}" class="btn btn-danger w-100">
        batalkan
    </a>

    <button type="submit" class="btn btn-success w-100">
        Tambah berita
    </button>

</form>



@endsection

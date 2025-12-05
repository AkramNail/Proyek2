@extends('Pengurus.layout.main')

@section('content')

<form method="POST" action="{{ url('/pengurus/kegiatan/tambahStore') }}"
enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="foto_kegiatan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama kegiatan</label>
        <input type="text" name="nama_kegiatan" class="form-control"required>
    </div>

    <h3>divisi</h3>
    <select id="id_divisi" name="id_divisi" class="form-control">
        @foreach ( $dataDivisi as $item)    
            <option value="{{ $item->id_divisi }}">{{ $item->nama_divisi }}</option>
        @endforeach
    </select>

    <label for="waktu">Tanggal & Waktu:</label>
    <input type="datetime-local" id="jadwal_keigiatan" name="jadwal_keigiatan" required>

    <div class="mb-3">
        <label class="form-label">Deskripsi kegiatan</label>
        <textarea name="deskripsi" 
            class="form-control" 
            rows="6" 
            required></textarea>
    </div>

    <br><br>
    <a href="{{ url('/pengurus/kegiatan') }}" class="btn btn-danger w-100">
        batalkan
    </a>

    <button type="submit" class="btn btn-success w-100">
        update kegiatan
    </button>

</form>



@endsection

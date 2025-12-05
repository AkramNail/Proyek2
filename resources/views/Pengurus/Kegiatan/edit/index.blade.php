@extends('Pengurus.layout.main')

@section('content')

<form method="POST" action="{{ url('/pengurus/kegiatan/store') }}"
enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" class="form-control" 
        value="{{ $dataKegiatan->id_kegiatan }}">

    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="foto_kegiatan" class="form-control">
    </div>

    <div class="mt-2">
        <b>Foto lama</b>
        <img src="{{ asset('storage/Image/Kegiatan/' . $dataKegiatan->foto_kegiatan) }}" width="150">
    </div>

    <div class="mb-3">
        <label class="form-label">Nama kegiatan</label>
        <input type="text" name="nama_kegiatan" class="form-control" 
            value="{{ $dataKegiatan->nama_kegiatan }}" required>
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
                required>{{ $dataKegiatan->deskripsi }}</textarea>
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

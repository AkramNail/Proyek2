@extends('Admin.layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 100px;"></div>

<form method="POST" action="{{ url('/admin/daftarAkun/storeUKM') }}">
    {{ csrf_field() }}
    
    <input type="hidden" name="nama" value="{{ $nama }}">
    <input type="hidden" name="nim" value="{{ $nim }}">
    <input type="hidden" name="email" value="{{ $email }}">
    <input type="hidden" name="password" value="{{ $password }}">
    <input type="hidden" name="role" value="{{ $role }}">
    <input type="hidden" name="ukm" value="{{ $ukm }}">

    <label for="id_divisi">Masukan divisi yang akan diurus oleh "{{$nama}}":</label>
    <select id="id_divisi" name="id_divisi" class="form-control">
        @foreach ( $dataDivisi as $item)    
            <option value="{{ $item->id_divisi }}">{{ $item->nama_divisi }}</option>
        @endforeach
    </select>


    <a href="{{ url('/admin/daftarAkun') }}" class="btn btn-danger w-100">
        Batalkan
    </a>

    <button type="submit" class="btn btn-primary">Buat akun</button>

</form>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

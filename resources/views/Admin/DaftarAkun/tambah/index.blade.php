@extends('Admin.layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 100px;"></div>

<form method="POST" action="{{ url('/admin/daftarAkun/store') }}">
    {{ csrf_field() }}

    <div class="mb-3">
        <label class="form-label">NIM/NIDN</label>
        <input type="number" name="nim" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label class="form-label">NAMA</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">EMAIL</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">PSSWORD</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <label for="role">Masukan role akun:</label>
    <select id="role" name="role" class="form-control">\
        <option value="admin">Admin</option>
        <option value="pembina">Pembina</option>
        <option value="pengurus">Pengurus</option>
        <option value="pengurus utama">Pengurus utama</option>
        <option value="anggota">Anggota</option>
    </select>


    <a href="{{ url('/admin/daftarAkun') }}" class="btn btn-danger w-100">
        Batalkan
    </a>

    <button type="submit" class="btn btn-primary">Buat akun</button>

</form>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

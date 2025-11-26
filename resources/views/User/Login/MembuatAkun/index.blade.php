@extends('layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 100px;"></div>

<form method="POST" action="membuatAkun">
    {{ csrf_field() }}

    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" required>
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

    <button type="submit" class="btn btn-primary">Membuat akun</button>

    <br><br>
    <a href="{{ url('/auth/google/redirect') }}" class="btn btn-danger w-100">
        Buat akun dengan google
    </a>

    <br><br>
    <a href="{{ url('/membuatAkun') }}" class="btn btn-success w-100">
        Sudah punya akun?
    </a>

</form>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

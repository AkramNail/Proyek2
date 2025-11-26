@extends('layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 100px;"></div>

<form method="POST" action="callback">
    {{ csrf_field() }}

    <input type="hidden" name="email" value="{{ $dataEmail}}">
    <input type="hidden" name="id_google" value="{{ $dataId}}">
    <input type="hidden" name="password" value="{{ $datPassword}}">

    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">NAMA</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Membuat akun</button>
</form>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

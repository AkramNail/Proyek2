@extends('layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 100px;"></div>

<form method="POST" action="">
    {{ csrf_field() }}

    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" value="{{ $dataUser->nim }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $dataUser->nama }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update profil</button>

</form>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

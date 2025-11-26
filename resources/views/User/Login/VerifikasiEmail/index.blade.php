@extends('layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 100px;"></div>

<form method="POST" action="verifikasi">
    {{ csrf_field() }}

    <b>kami sudah megirimkan kode verifikasi ke email anda</b>

    <b>masukan kode otp:</b>

    <input type="hidden" name="email" value="{{ 
        $dataEmail ?? session('dataEmail')
    }}">

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif
    
    <div class="mb-3">
        <label class="form-label">OTP</label>
        <input type="text" name="otp" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Verifikasi email</button>
</form>

<form method="POST" action="verifikasiSend" class="mt-3">
    {{ csrf_field() }}

    <input type="hidden" name="email" value="{{ $dataEmail ?? session('dataEmail') }}">

    <button type="submit" class="btn btn-warning">Kirim Ulang OTP</button>
</form>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

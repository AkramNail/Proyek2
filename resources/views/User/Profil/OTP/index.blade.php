@extends('layout.main')

@section('content')

<form method="POST" action="{{ route('verifikasiOTP') }}">
    {{ csrf_field() }}

    <b>kami sudah mengirimkan kode verifikasi ke email anda</b>

    {{-- Pesan sukses dari controller --}}
    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <b>masukan kode otp:</b>

    {{-- Pesan error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif
    
    <div class="mb-3">
        <label class="form-label">OTP</label>
        <input type="text" name="otp" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Verifikasi otp</button>
</form>

<form method="POST" action="{{ route('resetOTP') }}" class="mt-3"> 
    {{ csrf_field() }}

    <button type="submit" class="btn btn-warning">Kirim Ulang OTP</button>
</form>

@endsection

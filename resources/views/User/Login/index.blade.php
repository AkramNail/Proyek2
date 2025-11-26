@extends('layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 100px;"></div>

<form method="POST" action="login">
    {{ csrf_field() }}

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="mb-3">
        <label class="form-label">EMAIL</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">PSSWORD</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">LOGIN</button>

    <br><br>
    <a href="{{ url('/login/google') }}" class="btn btn-danger w-100">
        Login dengan Google
    </a>

    <br><br>
    <a href="{{ url('/membuatAkun') }}" class="btn btn-success w-100">
        Membuat Akun
    </a>
</form>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

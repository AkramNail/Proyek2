@extends('layout.main')

@section('content')

<form method="POST" action="{{ route('passwordSend') }}">
    {{ csrf_field() }}

    <b>Masukan password baru anda:</b>
    {{-- Pesan error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif
    
    <div class="mb-3">
        <label class="form-label">Password:</label>
        <input type="text" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Komfirmasi password:</label>
        <input type="text" name="komfirmasiPassword" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Update passowrd</button>
</form>

@endsection

@extends('layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 80px;"></div>

<div class="container mt-4">

    <div class="card shadow-sm p-4 mx-auto" style="max-width: 500px;">

        <h4 class="fw-bold text-center mb-3">Gabung UKM</h4>
        <p class="text-center text-muted" style="font-size: 14px;">
            Pilih divisi yang sesuai dengan minat kamu.
        </p>

        <form method="POST" action="callback">
            {{ csrf_field() }}

            <input type="hidden" name="id" value="{{ $idUKM }}">

            <!-- PILIHAN DIVISI -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Pilih Divisi</label>
                <select name="divisi" class="form-select shadow-sm">
                    @foreach ($dataDivisi as $divisi)
                        <option value="{{ $divisi->id_divisi }}">{{ $divisi->nama_divisi }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol submit -->
            <button type="submit" class="btn btn-primary w-100 py-2 mt-2">
                Gabung UKM
            </button>

        </form>

    </div>

</div>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

@extends('Admin.layout.main')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first('error') }}
    </div>
@endif

<a class="btn btn-primary" href="{{ url('/admin/daftarUKM/tambah') }}">Tambah UKM</a>

<table class="table table-striped table-hover table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama UKM</th>
            <th>Logo</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

@foreach ($dataUKM as $item)
    
    <tr>

        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama_Ukm }}</td>
        <td>
            <img src="{{ asset('storage/Image/UKM/'.$item->logo_Ukm) }}"
            style="width: 120px; height: auto; border-radius: 6px;">
        </td>
        <td>

            <form method="POST" action="{{ url('/admin/daftarUKM/info') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" class="form-control" 
                    value="{{ $item->id_Ukm }}">
                <button type="submit" class="btn btn-info">
                    lihat lengkap
                </button>
            </form>

            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $item->id_Ukm }}">
                Hapus
            </button>

            <div class="modal fade" id="modalHapus{{ $item->id_Ukm }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi hapus UKM</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body text-center">
                            <p>Apakah Anda yakin ingin menghapus UKM ini?</p>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                            <form method="POST" action="{{ url('/admin/daftarUKM/hapus') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id_Ukm }}">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </td>

    </tr>
    
@endforeach

    </tbody>
</table>

@endsection

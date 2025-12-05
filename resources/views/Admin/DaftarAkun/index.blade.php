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

<a class="btn btn-primary" href="{{ url('/admin/daftarAkun/tambah') }}">Tambah akun</a>

<table class="table table-striped table-hover table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

@foreach ($dataAkun as $item)
    
    <tr>

        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nim }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->role }}</td>
        <td>

            <form method="POST" action="{{ url('/admin/daftarAkun/info') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" class="form-control" 
                    value="{{ $item->id }}">
                <button type="submit" class="btn btn-info">
                    lihat lengkap
                </button>
            </form>

            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $item->id }}">
                Hapus
            </button>

            <div class="modal fade" id="modalHapus{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi hapus akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body text-center">
                            <p>Apakah Anda yakin ingin menghapus akun dengan nama "{{ $item->nama }}"</p>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                            <form method="POST" action="{{ url('/admin/daftarAkun/hapus') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
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

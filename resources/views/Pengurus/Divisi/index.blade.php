@extends('Pengurus.layout.main')

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

<a class="btn btn-primary" href="{{ url('/pengurus/Divisi/tambah') }}">Tambah divisi</a>

<table class="table table-striped table-hover table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama divisi</th>
            <th>deskripsi divisi</th>
            <th>Jumlah anggota</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

@foreach ($dataDivisi as $item)
    
    <tr>

        <td>{{ $loop->iteration }}</td>
                
        <td>{{ $item->nama_divisi }}</td>
        
        <td>{{ $item->deskripsi_divisi }}</td>

        @php $count = 0; @endphp

        @foreach ($dataAnggotaUkm as $item2)
            
            @if ($item2->id_divisi == $item->id_divisi )
            
                @php $count++; @endphp

            @endif

        @endforeach
        
        <td>{{ $count }}</td>

        <td>

            <form method="POST" action="{{ url('/pengurus/Divisi/edit') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id_divisi" class="form-control" 
                    value="{{ $item->id_divisi }}">
                <button type="submit" class="btn btn-warning">
                    Edit
                </button>
            </form>

            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalKeluar{{ $item->id_divisi }}">
                Hapus
            </button>

            <div class="modal fade" id="modalKeluar{{ $item->id_divisi }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi divisi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body text-center">
                            <p>Apakah Anda yakin ingin menghapus divisi ini?</p>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                            <form method="POST" action="{{ url('/pengurus/Divisi/hapus') }}">
                                @csrf
                                <input type="hidden" name="id_divisi" value="{{ $item->id_divisi }}">
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
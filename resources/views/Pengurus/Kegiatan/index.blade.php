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

<a class="btn btn-primary" href="{{ url('/pengurus/kegiatan/tambah') }}">Tambah kegiatan</a>

<table class="table table-striped table-hover table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Foto kegiatan</th>
            <th>Nama kegiatan</th>
            <th>Divisi</th>
            <th>Pendaftar</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

@foreach ($dataKegiatan as $item)
    
    <tr>

        <td>{{ $loop->iteration }}</td>
                
        <td>
            <img src="{{ asset('storage/Image/Kegiatan/'.$item->foto_kegiatan) }}" 
                style="width: 120px; height: auto; border-radius: 6px;">
        </td>
        
        <td>{{ $item->nama_kegiatan }}</td>
        <td>{{ $item->nama_divisi }}</td>

        @php $count = 0; @endphp

        @foreach ($dataAnggota as $item2)
            
            @if ($item2->id_Kegiatan == $item->id_kegiatan )
            
                @php $count++; @endphp

            @endif

        @endforeach
        
        <td>{{ $count }}</td>

        <td>{{ $item->jadwal_keigiatan }}</td>

        <td>

            <form method="POST" action="{{ url('/pengurus/kegiatan/edit') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" class="form-control" 
                    value="{{ $item->id_kegiatan }}">
                <button type="submit" class="btn btn-warning">
                    Edit
                </button>
            </form>

            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalKeluar{{ $item->id_kegiatan }}">
                Hapus
            </button>

            <div class="modal fade" id="modalKeluar{{ $item->id_kegiatan }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body text-center">
                            <p>Apakah Anda yakin ingin menghapus kegiatan ini?</p>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                            <form method="POST" action="{{ url('/pengurus/kegiatan/hapus') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id_kegiatan }}">
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
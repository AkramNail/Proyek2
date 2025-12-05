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

    <a class="btn btn-primary" href="{{ url('/pengurus/berita/tambah') }}">Tambah berita</a>

<table class="table table-striped table-hover table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Foto berita</th>
            <th>Judul berita</th>
            <th>Tanggal dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

@foreach ($dataBerita as $item)
    
    <tr>

        <td>{{ $loop->iteration }}</td>
        <td>
            <img src="{{ asset('storage/Image/Berita/'.$item->foto_berita) }}"
            style="width: 120px; height: auto; border-radius: 6px;">
        </td>
        <td>{{ $item->judul_berita }}</td>
        <td>{{ $item->created_at }}</td>
        <td>

            <a href="{{ url('/berita/'.$item->id_Berita) }}" class="btn btn-primary w-100">
                lihat berita
            </a>

            <form method="POST" action="{{ url('/pengurus/berita/edit') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id_Berita" class="form-control" 
                    value="{{ $item->id_Berita }}">
                <button type="submit" class="btn btn-warning">
                    Edit
                </button>
            </form>

            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalKeluar{{ $item->id_Berita }}">
                Hapus
            </button>

            <div class="modal fade" id="modalKeluar{{ $item->id_Berita }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi berita</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body text-center">
                            <p>Apakah Anda yakin ingin menghapus berita ini?</p>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                            <form method="POST" action="{{ url('/pengurus/berita/hapus') }}">
                                @csrf
                                <input type="hidden" name="id_Berita" value="{{ $item->id_Berita }}">
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

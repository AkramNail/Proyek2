@extends('Pengurus.layout.main')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

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

            <form method="POST" action="{{ url('/pengurus/berita/edit') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id_Berita" class="form-control" 
                    value="{{ $item->id_Berita }}">
                <button type="submit" class="btn btn-warning">
                    Edit
                </button>
            </form>
            <a class="btn btn-danger" href="">Hapus</a>

        </td>

    </tr>
    
@endforeach

    </tbody>
</table>

@endsection

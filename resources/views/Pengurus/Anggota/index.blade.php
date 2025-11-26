@extends('Pengurus.layout.main')

@section('content')

<table class="table table-striped table-hover table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Divisi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

@foreach ($dataAnggota as $item)
    
    <tr>

        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->nim }}</td>
        <td>{{ $item->nama_divisi }}</td>
        <td>

            <a class="btn btn-info" href="">Jadikan pengurus</a>
            <a class="btn btn-danger" href="">Hapus</a>

        </td>

    </tr>
    
@endforeach

    </tbody>
</table>

@endsection

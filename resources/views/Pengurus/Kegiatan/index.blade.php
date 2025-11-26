@extends('Pengurus.layout.main')

@section('content')

<table class="table table-striped table-hover table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Foto kegiatan</th>
            <th>Nama kegiatan</th>
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

        @php $count = 0; @endphp

        @foreach ($dataAnggota as $item2)
            
            @if ($item2->id_Kegiatan == $item->id_kegiatan )
            
                @php $count++; @endphp

            @endif

        @endforeach
        
        <td>{{ $count }}</td>

        <td>{{ $item->jadwal_keigiatan }}</td>

        <td>

            <a class="btn btn-warning" href="">Edit</a>
            <a class="btn btn-danger" href="">Hapus</a>

        </td>

    </tr>
    
@endforeach

    </tbody>
</table>

@endsection
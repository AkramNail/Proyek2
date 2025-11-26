@extends('layout.main')

@section('content')

@if(isset($success))
    @if ($success != null)
    <div class="alert alert-success mt-2">
        {{ $success }}
    </div>
    @endif
@endif

<table class="table table-bordered table-striped" id="example1">
    <thead>
        <tr>
            <th>FOTO</th>
            <th>NAMA KEGIATAN</th>
            <th>JADWAL KEGIATAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataKegitan as $item)
        <tr>
            <td>
                <img src="{{ asset('storage/Image/Kegiatan/'.$item->foto_kegiatan) }}" alt="Logo Berita" width="50" height="50">
            </td>
            <td>{{ $item->nama_kegiatan }}</td>
            <td>{{ $item->jadwal_keigiatan }}</td>
            <td>
                
                @php $ada = 0; @endphp

                @foreach ($dataAnggota as $item2)
                    
                    @if ($item2->id_Kegiatan == $item->id_kegiatan)
                    
                    <form method="POST" action="Kegiatan/keluar" class="mt-3"> 
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="id" value="{{$id}}">
                        <input type="hidden" name="idKegiatan" value="{{$item->id_kegiatan}}">

                        <button type="submit" class="btn btn-sm btn-primary">Keluar</button>
                    </form>
                    
                    @php $ada = 1; @endphp
                    
                    @break   

                    @endif

                @endforeach

                @if ($ada == 0)
                <form method="POST" action="" class="mt-3"> 
                    {{ csrf_field() }}
                    
                    <input type="hidden" name="id" value="{{$id}}">
                    <input type="hidden" name="idKegiatan" value="{{$item->id_kegiatan}}">
                
                    <button type="submit" class="btn btn-sm btn-primary">Gabung</button>
                </form>
                @endif

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

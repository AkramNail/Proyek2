@extends('layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 80px;"></div>

<div class="row">
    @foreach ($dataBerita as $item)
        <div class="col-md-4 mb-4">

            <a href="{{ url('berita/'.$item->id_Berita) }}" 
               class="text-decoration-none text-dark">

                <div class="card shadow-sm">

                    <!-- Foto Berita -->
                    <img src="{{ asset('storage/Image/Berita/'.$item->foto_berita) }}" 
                         class="card-img-top" 
                         alt="Foto Berita"
                         style="height:200px; object-fit:cover;">

                    <div class="card-body">

                        <!-- Nama UKM -->
                        @foreach ($dataUKM as $item2)
                            @if ($item2->id_Ukm == $item->id_Ukm)
                                <h5 class="card-title">{{ $item2->nama_Ukm }}</h5>
                            @endif
                        @endforeach

                        <!-- Tanggal -->
                        <p class="text-muted">{{ $item->tanggal_berita }}</p>

                        <!-- Isi berita -->
                        <p class="card-text">
                            {{ Str::limit($item->isi_berita, 150) }}
                        </p>

                    </div>
                </div>

            </a>

        </div>
    @endforeach
</div>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

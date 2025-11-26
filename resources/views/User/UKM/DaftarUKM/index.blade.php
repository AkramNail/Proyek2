@extends('layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 80px;"></div>

<div class="container mt-4">
    <div class="row">

        @foreach ($dataUKM as $item)
            <div class="col-md-4 mb-4">

                <div class="card shadow-lg border-0 h-100">

                    <!-- LOGO UKM FIXED SQUARE -->
                    <div class="text-center p-3" 
                         style="height:250px; display:flex; justify-content:center; align-items:center; background:#f8f9fa;">
                        <img src="{{ asset('storage/Image/UKM/'.$item->logo_Ukm) }}" 
                             alt="Logo UKM"
                             style="
                                width: 200px;
                                height: 200px;
                                object-fit: contain;
                                border-radius: 10px;
                             ">
                    </div>

                    <div class="card-body text-center">
                        <h4 class="card-title fw-bold">{{ $item->nama_Ukm }}</h4>

                        <p class="text-muted">Klik untuk melihat informasi lebih lengkap</p>

                        <a href="{{ url('UKM/'.$item->id_Ukm) }}" 
                           class="btn btn-primary mt-2 px-4">
                           Lebih Lengkap
                        </a>
                    </div>

                </div>

            </div>
        @endforeach

    </div>
</div>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

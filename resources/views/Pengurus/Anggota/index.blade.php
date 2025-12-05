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

<table class="table table-striped table-hover table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Divisi</th>
            <th>Role</th>
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
        <td>{{ $item->role }}</td>
        <td>

            @if ($item->role != "pengurus utama" && Auth::user()->role == 'pembina')
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pengurusUtama{{ $item->id }}">
                    Jadikan pengurus utama
                </button>

                <div class="modal fade" id="pengurusUtama{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi pengurus utama</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body text-center">
                                <p>Apakah Anda yakin ingin mengubah status user dengan nama "{{ $item->nama }}" menjadi pengurus utama?</p>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                                <form method="POST" action="{{ url('/pengurus/daftarAnggota/pengurusUtama') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-primary">Jadikan pengurus utama</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endif

            @if ($item->role != "anggota")
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#anggota{{ $item->id }}">
                    Jadikan anggota
                </button>

                <div class="modal fade" id="anggota{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi anggota</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body text-center">
                                <p>Apakah Anda yakin ingin mengubah status user dengan nama "{{ $item->nama }}" menjadi anggota?</p>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                                <form method="POST" action="{{ url('/pengurus/daftarAnggota/anggota') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-primary">Jadikan anggota</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endif

            @if ($item->role != "pengurus")
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pengurus{{ $item->id }}">
                    Jadikan pengurus
                </button>

                <div class="modal fade" id="pengurus{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi pengurus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body text-center">
                                <p>Apakah Anda yakin ingin mengubah status user dengan nama "{{ $item->nama }}" menjadi pengurus?</p>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                                <form method="POST" action="{{ url('/pengurus/daftarAnggota/pengurus') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-primary">Jadikan pengurus</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endif

            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalKeluar{{ $item->id }}">
                Keluarkan
            </button>

            <div class="modal fade" id="modalKeluar{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi keluarkan anggota</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body text-center">
                            <p>Apakah Anda yakin ingin mengeluarkan anggota dengan nama {{ $item->nama }}</p>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                            <form method="POST" action="{{ url('/pengurus/daftarAnggota/hapus') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-danger">Keluarkan</button>
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

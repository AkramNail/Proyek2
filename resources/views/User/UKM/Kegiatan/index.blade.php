@extends('layout.main')

@section('content')

<!-- jarak -->
<div style="padding-top: 80px;"></div>

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
            <th>PENDAFTAR</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataKegitan as $item)
        <tr>
            <td>
                <img src="{{ asset('storage/Image/Kegiatan/'.$item->foto_kegiatan) }}" alt="Logo Kegiatan" width="50" height="50">
            </td>
            <td>{{ $item->nama_kegiatan }}</td>
            <td>{{ $item->jadwal_keigiatan }}</td>
            @php $count = 0; @endphp

            @foreach ($dataAnggota as $item2)
                
                @if ($item2->id_Kegiatan == $item->id_kegiatan )
                
                    @php $count++; @endphp

                @endif

            @endforeach
            
            <td>{{ $count }}</td>
            <td>
                
                @php $ada = 0; @endphp

                @foreach ($dataUser as $item2)
                    @if ($item2->id_Kegiatan == $item->id_kegiatan)
                        
                        <!-- Tombol Keluar -->
                        <button type="button"
                                class="btn btn-sm btn-danger btn-konfirmasi mt-2"
                                data-aksi="keluar"
                                data-id="{{ $id }}"
                                data-idkegiatan="{{ $item->id_kegiatan }}">
                            Keluar
                        </button>

                        @php $ada = 1; @endphp
                        @break
                    @endif
                @endforeach

                @if ($ada == 0)
                <!-- Tombol Gabung -->
                <button type="button"
                        class="btn btn-sm btn-primary btn-konfirmasi mt-2"
                        data-aksi="gabung"
                        data-id="{{ $id }}"
                        data-idkegiatan="{{ $item->id_kegiatan }}">
                    Gabung
                </button>
                @endif

            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- ====================================== -->
<!--              MODAL KONFIRMASI          -->
<!-- ====================================== -->

<div class="modal fade" id="modalKonfirmasi" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body" id="isiModal">
                Apakah anda yakin?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <form id="formKonfirmasi" method="POST" style="display: inline">
                    @csrf
                    <input type="hidden" name="id" id="modal_id">
                    <input type="hidden" name="idKegiatan" id="modal_idKegiatan">

                    <button type="submit" class="btn btn-primary" id="btnYa">Ya</button>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- ====================================== -->
<!--        SCRIPT PEMBUKA MODAL             -->
<!-- ====================================== -->

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.btn-konfirmasi').forEach(btn => {

        btn.addEventListener('click', function () {

            const aksi = this.dataset.aksi;
            const id = this.dataset.id;
            const idKegiatan = this.dataset.idkegiatan;

            // Set data ke modal
            document.getElementById('modal_id').value = id;
            document.getElementById('modal_idKegiatan').value = idKegiatan;

            const form = document.getElementById('formKonfirmasi');

            if (aksi === 'keluar') {
                document.getElementById('judulModal').innerText = "Konfirmasi Keluar";
                document.getElementById('isiModal').innerText = "Apakah anda yakin ingin keluar dari kegiatan ini?";
                form.action = "Kegiatan/keluar";
            } else {
                document.getElementById('judulModal').innerText = "Konfirmasi Gabung";
                document.getElementById('isiModal').innerText = "Apakah anda yakin ingin bergabung dengan kegiatan ini?";
                form.action = "";
            }

            // Tampilkan modal
            var modal = new bootstrap.Modal(document.getElementById('modalKonfirmasi'));
            modal.show();

        });

    });

});
</script>

<!-- jarak -->
<div style="padding-top: 100px;"></div>

@endsection

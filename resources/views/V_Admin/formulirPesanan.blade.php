@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('V_Admin.footer')
@extends('flashdata')
@section('tittle', 'FORMS | Dashboard')

@section('content')

    <!-- start: main -->


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->
    <div class="content__wrapper">




        <div class="content__row mb-3">
            <div class="card__box">
                <div class="card__header">
                    <div class="card__title">
                        <i class="bi bi-map"></i>
                        <span>Surat Pemesanan Rumah {{ $getProjek->nama_projek }}</span>

                    </div>

                </div>
                <div class="table-responsive">
                    <table id="formulirPesanan" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No FP</th>
                                <th>Nama</th>
                                <th>Nomor </th>
                                <th>Tanggal Order</th>
                                @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting')
                                    <th>Pengaturan</th>
                                @else
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($getFormulirPesanan as $fp)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $fp->no_fp }}</td>
                                    <td>
                                        <span class="client__name">{{ $fp->nama_plgn }}</span>
                                        <span class="client__handled">Dari {{ $fp->nama_ktgr }} ({{ $fp->nama_ua }})</span>
                                    </td>
                                    <td>
                                        <p class="mb-1">

                                            No. telp {{ $fp->no_telp_plgn }} <a
                                                href="tel:{{ $fp->no_telp_plgn }}" class="btn-fd-icon-outline"><i
                                                    class="bi bi-telephone-outbound"></i></a> <br>
                                        </p>
                                        <p>

                                            No. WA {{ $fp->no_wa_plgn }} <a
                                                href="https://wa.me/{{ $fp->no_wa_plgn }}"
                                                class="btn-fd-icon-outline"> <i class="bi bi-whatsapp"></i></a>
                                        </p>
                                    </td>
                                    <td>
                                        {{ date('d M Y', strtotime($fp->tgl_input_fp)) }}
                                    </td>
                                    @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting')
                                        <td>

                                            <div class="d-flex flex-nowrap">
                                                <a href="{{ route('editSuratPemesananRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($fp->id_formulir)]) }}"
                                                    class="btn-fd-icon-outline">
                                                    <i class="fas fa-edit    "></i>
                                                </a>

                                            </div>

                                        </td>
                                    @else
                                    @endif

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>


            </div>
        </div>
        <!-- end: content -->


        <script>
            function updateTime() {
                const now = new Date();
                const hours = now.getHours();
                const minutes = now.getMinutes();
                const seconds = now.getSeconds();
                const timeString = `${hours}:${minutes}:${seconds}`;
                document.getElementById('clock').textContent = timeString;
            }
            setInterval(updateTime, 1000);
        </script>

        <script>
            $(document).ready(function() {
                $('#formulirPesanan').DataTable({
                    lengthMenu: [
                        [25, 50, 100, -1],
                        [25, 50, 100, 'All'],
                    ],
                    searching: true, // Enable global search bar
                    searchCols: [
                        null, // Column 1 (No) - No search input field
                        null, // Column 2 (Rumah) - No search input field
                        null, // Column 3 (Status) - No search input field
                        null, // Column 4 (Tipe) - No search input field
                        null // Column 5 (Tanggal Pre Order) - No search input field
                    ],
                    autoWidth: true
                });
            });
        </script>

    @endsection

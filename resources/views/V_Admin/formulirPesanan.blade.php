@extends('V_Admin.app')

@extends('flashdata')
@section('tittle', 'FORMS | Dashboard')

@section('content')

    <style>
        @media (max-width: 500px) {
            #fpMobile {
                display: block;
            }

            #fpPC {
                display: none;
            }
        }

        @media (min-width: 501px) {
            #fpMobile {
                display: none;
            }

            #fpPC {
                display: block;
            }
        }
    </style>
    <!-- start: main -->


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->
    <div id="fpPC">
        <div class="card mb-3">
            <div class="card-body">
                <div class="card-title">
                    <div class="">
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

                                <th>Pengaturan</th>

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
                                        <span class="client__name">{{ $fp->nama_plgn }} </span>
                                        <span class="client__name">{{ $fp->blok }}-{{ $fp->nomor }}</span>
                                        <span class="client__handled">Dari {{ $fp->nama_ktgr }} ({{ $fp->nama_ua }})</span>
                                    </td>
                                    <td>
                                        <p class="mb-1">

                                            No. telp {{ $fp->no_telp_plgn }} <a href="tel:{{ $fp->no_telp_plgn }}"
                                                class="btn btn-outline-gl"><i class="bi bi-telephone-outbound"></i></a>
                                            <br>
                                        </p>
                                        <p>

                                            No. WA {{ $fp->no_wa_plgn }} <a href="https://wa.me/{{ $fp->no_wa_plgn }}"
                                                class="btn btn-outline-gl"> <i class="bi bi-whatsapp"></i></a>
                                        </p>
                                    </td>
                                    <td>
                                        {{ date('d M Y', strtotime($fp->tgl_input_fp)) }}
                                    </td>
                                    <td>
                                        <div class="d-flex flex-nowrap">
                                            @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'StafAcc')
                                                <a href="{{ route('editSuratPemesananRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($fp->id_formulir)]) }}"
                                                    class="btn btn-outline-gl">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            @else
                                            @endif

                                            <a href="{{ route('cetakSuratPemesananRumah.admin', Crypt::encrypt($fp->id_formulir)) }}"
                                                class="btn btn-outline-gl">
                                                <i class="bi bi-printer"></i>

                                                </i>
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>
    <div id="fpMobile">
        <div class="card mb-3">
            <div class="card-body">
                <div class="card-title">
                    <div class="">
                        <i class="bi bi-map"></i>
                        <span>Surat Pemesanan Rumah {{ $getProjek->nama_projek }}</span>

                    </div>

                </div>
                <div class="table-responsive">
                    <center>
                        <table id="formulirPemesananMobileTable" class="table">
                            <thead>
                                <tr>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getFormulirPesanan as $fp)
                                <tr>
                                    <td>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h4>{{ $fp->no_fp }} / {{ $fp->blok }}-{{ $fp->nomor }}</h4>
                                                    <span>Nama : {{ $fp->nama_plgn }}</span>
                                                    <span>Dari {{ $fp->nama_ktgr }} ({{ $fp->nama_ua }})</span>
                                                </div>
                                                <div>
                                                    <p class="mb-1">

                                                        No. telp {{ $fp->no_telp_plgn }} <a href="tel:{{ $fp->no_telp_plgn }}"
                                                            class="btn btn-outline-gl"><i class="bi bi-telephone-outbound"></i></a>
                                                        <br>
                                                    </p>
                                                    <p>

                                                        No. WA {{ $fp->no_wa_plgn }} <a href="https://wa.me/{{ $fp->no_wa_plgn }}"
                                                            class="btn btn-outline-gl"> <i class="bi bi-whatsapp"></i></a>
                                                    </p>
                                                </div>
                                                <div>
                                                    Tanggal :   {{ date('d M Y', strtotime($fp->tgl_input_fp)) }}
                                                </div>

                                            </div>
                                            <div>
                                                <center>
                                                <table>
                                                    <td>
                                                        @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'StafAcc')
                                                        <a href="{{ route('editSuratPemesananRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($fp->id_formulir)]) }}"
                                                            class="btn btn-outline-gl">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    @else
                                                    @endif

                                                    </td>
                                                    <td>


                                                            <a href="{{ route('cetakSuratPemesananRumah.admin', Crypt::encrypt($fp->id_formulir)) }}"
                                                                class="btn btn-outline-gl">
                                                                <i class="bi bi-printer"></i>

                                                                </i>
                                                            </a>

                                                    </td>
                                                </table>
                                            </center>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </center>

                </div>


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
        $(document).ready(function() {
            $("#formulirPemesananMobileTable").DataTable({
                responsive: true
            });
        });

    </script>

@endsection

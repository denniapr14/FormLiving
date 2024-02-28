@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'SPP')
@section('pageTitle', 'SPP')

@section('content')


    <div class="card">
        <div class="card-body">


            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#pemesanan" role="tab"><span
                            class="hidden-sm-up">Pemesanan</a>
                </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#spp" role="tab"><span
                            class="hidden-sm-up">
                            SPP
                    </a> </li>

            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="pemesanan" role="tabpanel">

                    <table class="table" id="table-fp">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pemesanan</th>
                                <th>Informasi</th>
                                <th>Pengaturan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($getFormulirPesanan as $pesanan)
                                <tr>
                                    <td scope="row">{{ $no }}</td>
                                    <td>
                                        {{ $pesanan->id_formulir }}
                                        <p> Rumah : {{ $pesanan->blok }} - {{ $pesanan->nomor }}</p>
                                        <p> Nomor FP : {{ $pesanan->no_fp }}</p>
                                        <p> Pelanggan : {{ $pesanan->nama_plgn }}</p>
                                        <p> Dari {{ $pesanan->nama_ktgr }} ({{ $pesanan->nama_ua }})</p>

                                    </td>
                                    <td>
                                        <div id="accordian-3">
                                            <div class="card">
                                                <a class="card-header" id="heading11">
                                                    <button class="btn btn-link" data-toggle="collapse"
                                                        data-target="#informasiPembayaran{{ $pesanan->id_formulir }}"
                                                        aria-expanded="true" aria-controls="collapse1">
                                                        <h5 class="m-b-0">Informasi Pembayaran</h5>
                                                    </button>
                                                </a>
                                                <div id="informasiPembayaran{{ $pesanan->id_formulir }}" class="collapse "
                                                    aria-labelledby="heading11" data-parent="#accordian-3" style="">
                                                    <div class="card-body">
                                                        <table>
                                                            @foreach ($getPembayaranRumah as $pembayaranRumah)
                                                                @if ($pembayaranRumah->id_formulir == $pesanan->id_formulir)
                                                                    <tr>
                                                                        <td> {{ $pembayaranRumah->detail_pr }}</td>
                                                                        <td> Rp {{ rupiah($pembayaranRumah->harga_pr) }}
                                                                        </td>
                                                                        <td>
                                                                            @if ($pembayaranRumah->status_pr == 'belum')
                                                                                <span class="btn btn-outline-danger"> <i
                                                                                        class="fa fa-times"
                                                                                        aria-hidden="true"></i>
                                                                                </span>
                                                                            @elseif ($pembayaranRumah->status_pr == 'kurang')
                                                                                <span class="btn btn-outline-warning"> <i
                                                                                        class="fa fa-spinner spinner"
                                                                                        aria-hidden="true"></i> </span>
                                                                            @elseif($pembayaranRumah->status_pr == 'sudah')
                                                                                <span class="btn btn-outline-success"> <i
                                                                                        class="fa fa-check"
                                                                                        aria-hidden="true"></i></span>
                                                                            @endif
                                                                        @else
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach

                                                        </table>


                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </td>
                                    <td>
                                        @php
                                            $sppFound = false;
                                        @endphp

                                        @foreach ($getSPP as $spp)
                                            @if ($spp->id_formulir == $pesanan->id_formulir)
                                                <!-- SPP has been created, set $sppFound to true -->
                                                @php
                                                    $sppFound = true;
                                                @endphp
                                                <!-- Exit the loop as soon as one SPP is found for this $pesanan -->
                                            @break
                                        @endif
                                    @endforeach

                                    @if ($user->kategori == 'StafAcc' || $user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                                        @if ($sppFound)
                                            <!-- SPP has been created, display Edit SPP button -->
                                            <a href="{{ route('editSPP.admin', [$getProjek->nama_projek, Crypt::encrypt($spp->id_spp)]) }}"
                                                class="btn btn-outline-info"> <i class="fas fa-edit"></i> Edit SPP </a>
                                        @else
                                            <!-- SPP hasn't been created, display Create SPP button -->
                                            <a href="{{ route('createSPP.admin', [$getProjek->nama_projek, Crypt::encrypt($pesanan->id_formulir)]) }}"
                                                class="btn btn-outline-info">Buat SPP</a>
                                        @endif
                                    @endif

                                </td>
                            </tr>
                            @php

                                $no++;
                            @endphp
                        @endforeach


                    </tbody>
                </table>
            </div>
            <div class="tab-pane  p-20" id="spp" role="tabpanel">

                <table class="table table-responsive-lg" id="table-spp">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Informasi</th>
                            <th>pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $noSPP = 1;
                        @endphp
                        @foreach ($getSPP as $spp)
                            <tr>
                                <td scope="row">{{ $noSPP }}</td>
                                <td>
                                    <p>rumah : {{ $spp->blok }}-{{ $spp->nomor }}</p>
                                    <p>no formulir pesanan : {{ $spp->no_fp }}</p>
                                    <p>pelanggan : {{ $spp->nama_plgn }}</p>

                                </td>
                                <td>
                                    <a href="{{ route('editSPP.admin', [$getProjek->nama_projek, Crypt::encrypt($spp->id_spp)]) }}"
                                        class="btn btn-outline-info"> <i class="fas fa-edit    "></i> </a>
                                    <a href="{{ route('printSPP.admin', [$getProjek->nama_projek, Crypt::encrypt($spp->id_spp)]) }}"
                                        class="btn btn-outline-info"> <i class="fa fa-print" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @php
                                $noSPP++;
                            @endphp
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>


    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table-fp').DataTable({
            lengthMenu: [
                [15, 20, 100, -1],
                [15, 20, 100, 'All'],
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
        $('#table-spp').DataTable({
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

@extends('V_Admin.app')

@extends('flashdata')
@section('title','Form One | Pemesanan')
@section('pageTitle','Pemesanan')
@section('back',route('suratPemesananRumah.admin',[$getProjek->nama_projek]) )
@section('breadcrumb','Pemesanan')

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
                                                class="btn btn-outline-info"><i class="fa fa-phone" aria-hidden="true"></i></a>
                                            <br>
                                        </p>
                                        <p>

                                            No. WA {{ $fp->no_wa_plgn }} <a href="https://wa.me/{{ $fp->no_wa_plgn }}"
                                                class="btn btn-outline-info"> <i class="mdi mdi-whatsapp    "></i></a>
                                        </p>
                                    </td>
                                    <td>
                                        {{ date('d M Y', strtotime($fp->tgl_input_fp)) }}
                                    </td>
                                    <td>
                                        <a  class="btn btn-outline-info" data-target="#seeFormulir{{ $fp->id_formulir }}" data-toggle="modal"> <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <div class="modal modal-form fade" id="seeFormulir{{ $fp->id_formulir }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="order-informationLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"> Formulir Pesanan {{ $fp->blok }}-{{ $fp->nomor }} {{ $fp->nama_plgn }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                            <div class="modal-body">
                                                                <h5>Data Pelanggan</h5>
                                                                <table>
                                                                    <tr>
                                                                        <td>Nama   </td>
                                                                        <td>: {{ $fp->nama_plgn }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:30%;">NPWP</td>
                                                                        <td>: {{ $fp->npwp_plgn }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:30%;">KTP/SIM No.</td>
                                                                        <td>: {{ $fp->no_ktp_plgn }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Alamat</td>
                                                                        <td>: {{ $fp->alamat_plgn }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>No. Telepon</td>
                                                                        <td>: {{ $fp->no_telp_plgn }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Email</td>
                                                                        <td>: {{ $fp->email_plgn }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tempat & Tgl. Lahir</td>
                                                                        <td>: {{ $fp->tempat_lahir_plgn }}, {{ tgl_indo(date('Y-m-d', strtotime($fp->tgl_lahir_plgn))) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Sumber Dana</td>
                                                                        <td>: {{ $fp->sumber_dana_plgn }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tujuan transaksi</td>
                                                                        <td>: -</td>
                                                                    </tr>
                                                                </table>
                                                                <br>
                                                                <h5>Data Rumah dan Tipe Rumah</h5>
                                                                <table>
                                                                    <tr>
                                                                        <td>Tipe Unit</td>
                                                                        <td>: {{ $fp->jenis_tr }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Cluster – Blok</td>
                                                                        <td>: {{ $fp->blok }} - {{ $fp->nomor }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Luas Tanah</td>
                                                                        <td>: {{ $fp->luas_tanah }} m2</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Luas Bangunan</td>
                                                                        <td>: {{ $fp->luas_bangunan_kkpr }} m2</td>
                                                                    </tr>
                                                                </table>
                                                                <br>
                                                                <h5>Harga</h5>
                                                                <table>
                                                                    <tr>
                                                                        <td>DP</td>
                                                                        <td>: Rp. {{ rupiah($fp->uang_muka ?? 0) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Harga Pricelist</td>
                                                                        <td>: Rp. {{ rupiah($fp->harga_awal) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Diskon</td>
                                                                        <td>: Rp. {{ rupiah($fp->total_diskon ?? 0) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Harga Netto</td>
                                                                        <td>: Rp. {{ rupiah($fp->harga_netto_kkpr ?? 0) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>PPN (Pajak Pertambahan Nilai)</td>
                                                                        <td>: Rp. {{ rupiah($fp->harga_ppn_kpr ?? 0) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>TOTAL</td>
                                                                        <td>: Rp. {{ rupiah($fp->harga_awal) }}</td>
                                                                    </tr>
                                                                </table>


                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'StafAcc')


                                                <a href="{{ route('editSuratPemesananRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($fp->id_formulir)]) }}"
                                                    class="btn btn-outline-info">
                                                    <i class="fas fa-pencil-alt    "></i>
                                                </a>
                                                <a href="{{ route('listPembayaranRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($fp->id_formulir)]) }}" class="btn btn-outline-info">
                                                    <i class="fas fa-edit    ">Pembayaran</i>
                                                </a>

                                            @else
                                            @endif

                                            <a href="{{ route('cetakSuratPemesananRumah.admin', Crypt::encrypt($fp->id_formulir)) }}"
                                                class="btn btn-outline-info">
                                                <i class="fa fa-print" aria-hidden="true"></i>


                                            </a>


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
                            @foreach ($getFormulirPesananMobile as $fpMobile)
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h4>{{ $fpMobile->no_fp }} / {{ $fpMobile->blok }}-{{ $fpMobile->nomor
                                                        }}</h4>
                                                    <span>Nama : {{ $fpMobile->nama_plgn }}</span>
                                                    <span>Dari {{ $fpMobile->nama_ktgr }} ({{ $fpMobile->nama_ua }})</span>
                                                </div>
                                                <div>
                                                    <p class="mb-1">

                                                        No. telp {{ $fpMobile->no_telp_plgn }} <a
                                                            href="tel:{{ $fpMobile->no_telp_plgn }}"
                                                            class="btn btn-outline-info"><i class="fa fa-phone"
                                                                aria-hidden="true"></i></a>
                                                        <br>
                                                    </p>
                                                    <p>

                                                        No. WA {{ $fpMobile->no_wa_plgn }} <a
                                                            href="https://wa.me/{{ $fpMobile->no_wa_plgn }}"
                                                            class="btn btn-outline-info"> <i
                                                                class="mdi mdi-whatsapp    "></i></a>
                                                    </p>
                                                </div>
                                                <div>
                                                    Tanggal : {{ date('d M Y', strtotime($fpMobile->tgl_input_fp)) }}
                                                </div>

                                            </div>
                                            <div>
                                                <center>
                                                <div class="row">
                                                    @if ($user->kategori == 'SuperAdmin' || $user->kategori ==
                                                            'AdminAccounting' || $user->kategori == 'StafAcc')
                                                            <div class="col-md-4 m-10">
                                                                <a href="{{ route('editSuratPemesananRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($fpMobile->id_formulir)]) }}"
                                                                    class="btn btn-outline-info">
                                                                    <i class="fas fa-edit    "></i>
                                                                </a>
                                                            </div>
                                                            
                                                          <div class="col-md-4 ">
                                                            <a
                                                            href="{{ route('listPembayaranRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($fpMobile->id_formulir)]) }}"  class="btn btn-outline-info">
                                                            <i class="fas fa-edit    "></i>Pembayaran
                                                        </a>
                                                          </div>
                                                          <br>

                                                         
                                                            @else
                                                            @endif
                                                          <div class="col-md-3 m-10">
                                                            <a href="{{ route('cetakSuratPemesananRumah.admin', Crypt::encrypt($fpMobile->id_formulir)) }}"
                                                                class="btn btn-outline-info">
                                                                <i class="fa fa-print" aria-hidden="true"></i>

                                                                </i>
                                                            </a>
                                                          </div>
                                                          <br>
                                                          <div class="col-md-3 ">
                                                            @if ($user->kategori == 'SuperAdmin' || $user->kategori ==
                                                            'AdminAccounting' || $user->kategori == 'StafAcc')
                                                            <a href="" class="btn btn-outline-info"><i class="fa fa-plus"
                                                                    aria-hidden="true"></i>SPP</a>
                                                            @else
                                                            @endif

                                                          </div>
                                                    
                                                </div>
                                            </center>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
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

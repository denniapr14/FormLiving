@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'SPP')
@section('pageTitle', 'SPP')

@section('content')


    <!-- Main content -->
    <style>
        .myinput {
            height: 30px;
        }

        .form-inline {
            height: 30px;
        }

        table,
        tr,
        td,
        th {
            height: 1px;
            border: none;
            color: black;
        }

        table.no-space td,
        table.no-space tr,
        table.no-space th {
            padding: 2px;
        }

        @media print {
            @page :footer {
                display: none
            }

            @page :header {
                display: none
            }

            @page {
                size: F4;
                margin: 5px 0 -100px 0;
            }

            body {
                margin: 0;
            }

            body * {
                visibility: hidden;
                font-size: 20px;
                line-height: 12px;
                color: black;
            }

            #printcontent * {
                visibility: visible;
            }

            #printcontent {
                /* position: absolute; */
                left: 0;
                right: 0;
                top: -90px;
            }

            .br-nLine {
                page-break-before: always;
            }

            .footerPrint {
                background-color: white;
                height: 100%;
                width: 100%;
                position: relative;
                page-break-before: always;

            }

            table.solid-border td,
            table.solid-border tr,
            table.solid-border th {
                border: 2px solid black;
            }

            .noprint {
                display: none;
            }


            .hidden {
                display: none;
            }

            .myinput {

                height: 20px;
            }

            .form-inline {
                height: 20px;
            }
        }
    </style>

    <div class="container-fluid">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <table style="width: 100%">
                        <tr>
                            <td>
                                <a href="{{ route('spp.admin', $getProjek->nama_projek) }}" class="btn btn-outline-danger"><i
                                        class="fa fa-arrow-left" aria-hidden="true"></i></a>

                                SURAT PERMOHONAN PEMBANGUNAN

                </td>
                <td> <a href="" id="print" class="float-right btn btn-outline-success"> <i class="fa fa-print"
                            aria-hidden="true"></i></a></td>
                </tr>
                </table>


            </div>
            <div class="card-body" id="printContent">
                <div class="col-md-12">
                    <center>
                        <h2>SURAT PERMOHONAN PEMBANGUNAN</h2>
                    </center>
                    <center>
                        {{ $getSPP->no_getSPP }}

                    </center>
                    <br><br>
                    <div>
                        <p>Dengan ini kami mengajukan permohonan pembangunan rumah sebanyak 1 (Satu) Unit dengan
                            perincian sebagai berikut</p>
                    </div>
                    <div>
                        <table class="table-bordered" style="width: 100%">
                            <tr>
                                <td rowspan="2">Nomor</td>
                                <td rowspan="2">Nama User</td>
                                <td colspan="2" rowspan="2">Blok/Kav</td>
                                <td colspan="2">luas</td>
                                <td rowspan="2">Pembayaran</td>
                                <td rowspan="2">keterangan</td>
                            </tr>
                            <tr>
                                <td>Bgn</td>
                                <td>Tanah</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>{{ $getSPP->nama_plgn }}</td>
                                <td>{{ $getSPP->blok }}</td>
                                <td>{{ $getSPP->nomor }}</td>
                                <td>{{ $getSPP->tipe }}</td>
                                <td>{{ $getSPP->luas_tanah }}</td>
                                <td>{{ $getSPP->jenis_pembayaran_fp }}</td>
                                <td>

                                    {{ $getSPP->ket_spp }}

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>marketing : {{ $getSPP->nama_ua }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>spek : {{ $getSPP->jenis_tr }}</td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-md-1">
                                Note :
                            </div>
                            <div class="col-md-11">
                                <div>
                                    <p>1. Kode PT menunjukkan SPP diorder oleh PT, getSPP dibuat berdasarkan
                                        permintaan langsung dari Pihak Manajemen Penyelesaian bangunan maksimal:</p>
                                    <ol type="a">
                                        <li>8 (delapan) bulan dari tanggal pembuatan getSPP untuk rumah 1 lantai</li>
                                        <li>14 (empat belas) bulan dari tanggal pembuatan getSPP untuk rumah 2 lantai
                                        </li>
                                    </ol>
                                </div>
                                <div>
                                    <p>2. Kode I menunjukkan SPP diorder oleh INVESTOR, getSPP dibuat setelah
                                        mendapatkan
                                        Acc dari Divisi Teknik yang ditandai dengan Bestek sebagai lampiran yang telah
                                        ditandatangani oleh Kepala Teknik</p>
                                    <p>Penyelesaian bangunan maksimal 6 (enam) bulan dari tanggal pembuatan SPP</p>
                                </div>
                                <div>
                                    <p>3. Kode U menunjukkan SPP diorder setelah USER memenuhi syarat pelunasan:</p>
                                    <ol type="A">
                                        <li>Untuk pembelian IN HOUSE, pembangunan rumah dilaksanakan setelah User
                                            minimal telah melunasi pembayaran sebesar 50%. Kami mengharapkan agar rumah
                                            segera dibangun sesuai dengan data tersebut di atas.</li>
                                        <li>Untuk pembelian KPR, pembangunan rumah dilaksanakan setelah User melakukan
                                            realisasi KPR dengan pihak Bank, Kami mengharapkan agar rumah segera
                                            dibangun sesuai dengan data tersebut di atas.</li>
                                        <li>Jika pembangunan akan dimulai, mohon konfirmasi marketer yang terkait
                                            terlebih dahulu.</li>
                                    </ol>
                                </div>
                                <div>
                                    <p>Penyelesaian bangunan maksimal 6 (enam) bulan dari tanggal penyelesaian
                                        pembayaran minimal 50% dari hargajual / tanggal realisasi KPR dengan Bank.</p>
                                    <table style="width: 50%; ">
                                        <tr>
                                            <td style="text-align: left; color:black">Tanggal pembayaran terakhir / Acc
                                                Bank </td>
                                            <td>:</td>
                                            <td style="text-align: left; color:black">

                                                {{ tgl_indo($getSPP->pem_akhir_spp) }}


                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left; color:black">Tanggal maksimal pembangunan </td>
                                            <td>:</td>
                                            <td style="text-align: left; color:black">
                                                {{ tgl_indo($getSPP->tgl_max_bangun) }}


                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div>
                                    <p>Demikian surat permohonan kami, atas perhatian dan kerjasamanya kami ucapkan
                                        terima kasih.</p>
                                </div>
                                <div>
                                    <table style="width: 100%">
                                        <tr>
                                            <td>Malang, {{ tgl_indo(date('Y-m-d', strtotime($getSPP->tgl_input_spp))) }}
                                                <br>
                                                Hormat saya,
                                                <br><br>
                                                @if ($getSPP->status_staf_acc == 'validated')

                                                    <i class="fas fa-check-circle fa-2x"></i>
                                                @endif
                                                <br><br>
                                                <u><b>Elvina Lidya</b></u>
                                                <br>
                                                <b>Keuangan</b>
                                            </td>
                                            <td>
                                                <div class="float-right">
                                                    <br><br>
                                                    Diperiksa Oleh,
                                                    <br><br>
                                                    @if ($getSPP->status_head_acc == 'validated')
                                                    <center>
                                                        <i class="fas fa-check-circle fa-2x"></i>
                                                        </center>

                                                        <p class="small">validated at {{ $getSPP->tgl_accept_acc }}
                                                        </p>
                                                    @else
                                                        <i class="fas fa-times"> belum di validasi</i>
                                                    @endif
                                                        <br>
                                                    <u><b>Andreas Wibisono</b></u>
                                                    <br>
                                                    <b>Manajer Keuangan</b>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="float-right">
                                                    <br>
                                                    Mengetahui,
                                                    <br><br><br>

                                                    @if ($getSPP->statusCeoSPP == 'validated')
                                                    <center>

                                                        <i class="fas fa-check-circle fa-2x"></i>
                                                    </center>

                                                        <p class="small">validated at {{ $getSPP->tgl_accept_ceo }}
                                                        </p>
                                                    @else
                                                        <i class="fas fa-times"> belum di validasi</i>
                                                    @endif

                                                    <center>
                                                        <b><u>Gilbert</u></b>
                                                        <br>
                                                        <b>CEO</b>
                                                    </center>

                                                </div>


                                            </td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        document.getElementById('print').addEventListener('click', function() {
            var printContent = document.getElementById('printContent').innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        });
    </script>


@endsection

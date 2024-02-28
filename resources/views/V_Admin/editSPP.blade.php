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
                <h3 class="card-title"> <a href="{{ route('spp.admin', $getProjek->nama_projek) }}" class="btn btn-outline-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> SURAT PERMOHONAN PEMBANGUNAN</h3>
            </div>
            <form action="{{ route('editSPPAction.admin', [$getProjek->nama_projek, Crypt::encrypt($getSPP->id_spp)]) }}" enctype="multipart/form-data" method="POST">
                @csrf

            <div class="card-body">
                <div class="col-md-12">
                    <center>
                        <h2>SURAT PERMOHONAN PEMBANGUNAN</h2>
                    </center>
                    <center>
                        @if ($user->kategori == 'StafAcc' || $user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                        <input style="width: 40%;" type="text" name="nomorSPP" class="myinput" placeholder="nomor"
                        value="{{ $getSPP->no_spp }}">
                        @else
                        <input style="width: 40%;" type="text" name="nomorSPP" hidden class="myinput" placeholder="nomor"
                        value="{{ $getSPP->no_spp }}">
                        {{ $getSPP->no_spp }}
                        @endif

                    </center>
                    <br><br>
                    <div>
                        <p>Dengan ini kami mengajukan permohonan pembangunan rumah sebanyak 1 (Satu) Unit dengan
                            perincian sebagai berikut</p>
                    </div>
                    <div>
                        <table class="table-bordered"  style="width: 100%; text-align: center">
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
                                <td style="text-align: left">{{ $getSPP->nama_plgn }}</td>
                                <td>{{ $getSPP->blok }}</td>
                                <td>{{ $getSPP->nomor }}</td>
                                <td>{{ $getSPP->tipe }}</td>
                                <td>{{ $getSPP->luas_tanah }}</td>
                                <td>{{ $getSPP->jenis_pembayaran_fp }}</td>
                                <td  style="text-align: left"> @if ($user->kategori == 'StafAcc' || $user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                                    <input type="text" name="keterangan" class="form-control" value="{{ $getSPP->ket_spp }}">
                                @else
                                <input type="text" name="keterangan" class="form-control" hidden value="{{ $getSPP->ket_spp }}">
                                {{ $getSPP->ket_spp }}
                                @endif
                                   </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td  style="text-align: left">{{implode('.', str_split($getSPP->no_telp_plgn, 3))  }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td  style="text-align: left">marketing : {{ $getSPP->nama_ua }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td  style="text-align: left">{{ tgl_indo(date('Y-m-d', strtotime($getSPP->tgl_input_fp))) }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td  style="text-align: left">spek : {{ $getSPP->jenis_tr }}</td>
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
                                                @if ($user->kategori == 'StafAcc' || $user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                                                    <input type="date" name="tgldanbank" class="form-control" value="{{ $getSPP->pem_akhir_spp }}">
                                                @else
                                                <input type="date" name="tgldanbank" class="form-control" hidden value="{{ $getSPP->pem_akhir_spp }}">
                                                {{ tgl_indo($getSPP->pem_akhir_spp) }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left; color:black">Tanggal maksimal pembangunan </td>
                                            <td>:</td>
                                            <td style="text-align: left; color:black">
                                                @if ($user->kategori == 'StafAcc' || $user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                                                <input type="date" name="tglBangun" class="form-control" value="{{ $getSPP->tgl_max_bangun }}">
                                            @else
                                            <input type="date" name="tglBangun" class="form-control" hidden value="{{ $getSPP->tgl_max_bangun }}">
                                            {{ tgl_indo($getSPP->tgl_max_bangun) }}
                                            @endif

                                            </td>
                                        </tr>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <p>Demikian surat permohonan kami, atas perhatian dan kerjasamanya kami ucapkan
                                terima kasih.</p>
                        </div>
                        <table style="width: 100%">
                            <tr>
                                <td>Malang, {{ tgl_indo(date('Y-m-d', strtotime($getSPP->tgl_input_spp))) }}
                                    <br>
                                    Hormat saya,
                                    <br><br>
                                    @if ($getSPP->status_staf_acc == 'validated')
                                        <i class="fas fa-check-circle fa-2x"></i>
                                    @endif
                                    <br>
                                    <u><b>Elvina Lidya</b></u>
                                    <br>
                                    <b>Keuangan</b>
                                </td>
                                <td>
                                    <div class="float-right">
                                        <br><br>
                                        Diperiksa Oleh,
                                        <br><br><br>
                                        @if ($user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                                            <select name="statusAccounting" id="">
                                                <option value="validated"
                                                    @if ($getSPP->status_head_acc == 'validated') selected @endif>Validasi
                                                </option>
                                                <option value="nonvalidated"
                                                    @if ($getSPP->status_head_acc == 'nonvalidated') selected @endif>Belum di
                                                    Validasi
                                                </option>
                                            </select><br>
                                            <input type="date" name="tglAcc" value="<?php echo date('Y-m-d'); ?>" hidden>
                                        @else

                                        <select name="statusAccounting" hidden id="">
                                            <option value="validated"
                                                @if ($getSPP->status_head_acc == 'validated') selected @endif>Validasi
                                            </option>
                                            <option value="nonvalidated"
                                                @if ($getSPP->status_head_acc == 'nonvalidated') selected @endif>Belum di
                                                Validasi
                                            </option>
                                        </select><br>
                                        <input type="date" name="tglAcc" value="{{ $getSPP->tgl_accept_acc }}" hidden>
                                            @if ($getSPP->status_head_acc == 'validated')
                                                <i class="fas fa-check-circle fa-2x"></i>
                                                <br>
                                                <p class="small">validated at {{ $getSPP->tgl_accept_acc }}
                                                </p>
                                            @else
                                                <i class="fas fa-times"> belum di validasi</i>
                                            @endif
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
                                        @if ($user->kategori == 'CEO' || $user->kategori == 'SuperAdmin')
                                            <select name="statusCEO" id="">
                                                <option value="validated"
                                                    @if ($getSPP->statusCeoSPP == 'validated') selected @endif >Validasi
                                                </option>
                                                <option value="nonvalidated"
                                                    @if ($getSPP->statusCeoSPP == 'nonvalidated') selected @endif >Belum di
                                                    Validasi
                                                </option>
                                            </select><br>
                                            <input type="date" name="tglCEO" value="<?php echo date('Y-m-d'); ?>" hidden>
                                        @else
                                        <select name="statusCEO" id="" hidden>
                                            <option value="validated"
                                                @if ($getSPP->statusCeoSPP == 'validated') selected @endif >Validasi
                                            </option>
                                            <option value="nonvalidated"
                                                @if ($getSPP->statusCeoSPP == 'nonvalidated') selected @endif >Belum di
                                                Validasi
                                            </option>
                                        </select><br>
                                        <input type="date" name="tglCEO" value="{{ $getSPP->tgl_accept_ceo }}" hidden>
                                            @if ($getSPP->statusCeoSPP == 'validated')
                                                <i class="fas fa-check-circle fa-2x"></i>
                                                <br>
                                                <p class="small">validated at {{ $getSPP->tgl_accept_ceo }}
                                                </p>
                                            @else
                                                <i class="fas fa-times"> belum di validasi</i>
                                            @endif
                                        @endif
                                        <br>
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
            <div class="card-footer">
                <button class="btn btn-outline-success float-right" type="submit">Submit</button>
            </div>
        </form>
        </div>
    </div>


@endsection

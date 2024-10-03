@extends('V_Admin.app')

@extends('flashdata')
@section('title', 'Form One | Pemesanan')
@section('pageTitle', 'Ubah Pemesanan')
@section('back', route('suratPemesananRumah.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'Pemesanan')
@section('breadcrumb2', 'Ubah Pemesanan')

@section('content')
    <style type="text/css">
        {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }

        p {
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
            margin: 0pt;
        }

        h1 {
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12pt;
        }

        .s1 {
            color: black;
            font-family: "Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        .s2 {
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        .s3 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 10pt;
        }

        li {
            display: block;
        }

        #l1 {
            padding-left: 0pt;
            counter-reset: c1 1;
        }

        #l1>li>*:first-child:before {
            counter-increment: c1;
            content: counter(c1, decimal)". ";
            color: black;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        #l1>li:first-child>*:first-child:before {
            counter-increment: c1 0;
        }

        li {
            display: block;
        }

        #l2 {
            padding-left: 0pt;
            counter-reset: d1 1;
        }

        #l2>li>*:first-child:before {
            counter-increment: d1;
            content: counter(d1, upper-roman)". ";
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        #l2>li:first-child>*:first-child:before {
            counter-increment: d1 0;
        }

        #l3 {
            padding-left: 0pt;
            counter-reset: d2 1;
        }

        #l3>li>*:first-child:before {
            counter-increment: d2;
            content: counter(d2, lower-latin)". ";
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        #l3>li:first-child>*:first-child:before {
            counter-increment: d2 0;
        }

        #l4 {
            padding-left: 0pt;
            counter-reset: d2 1;
        }

        #l4>li>*:first-child:before {
            counter-increment: d2;
            content: counter(d2, lower-latin)". ";
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        #l4>li:first-child>*:first-child:before {
            counter-increment: d2 0;
        }

        #l5 {
            padding-left: 0pt;
            counter-reset: d2 1;
        }

        #l5>li>*:first-child:before {
            counter-increment: d2;
            content: counter(d2, lower-latin)". ";
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        #l5>li:first-child>*:first-child:before {
            counter-increment: d2 0;
        }

        #l6 {
            padding-left: 0pt;
            counter-reset: d3 1;
        }

        #l6>li>*:first-child:before {
            counter-increment: d3;
            content: counter(d3, lower-roman)". ";
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        #l6>li:first-child>*:first-child:before {
            counter-increment: d3 0;
        }

        #l7 {
            padding-left: 0pt;
            counter-reset: d3 1;
        }

        #l7>li>*:first-child:before {
            counter-increment: d3;
            content: counter(d3, lower-roman)". ";
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        #l7>li:first-child>*:first-child:before {
            counter-increment: d3 0;
        }

        #l8 {
            padding-left: 0pt;
            counter-reset: d2 1;
        }

        #l8>li>*:first-child:before {
            counter-increment: d2;
            content: counter(d2, lower-latin)". ";
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        #l8>li:first-child>*:first-child:before {
            counter-increment: d2 0;
        }

        #l9 {
            padding-left: 0pt;
            counter-reset: d3 1;
        }

        #l9>li>*:first-child:before {
            counter-increment: d3;
            content: counter(d3, lower-roman)". ";
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        #l9>li:first-child>*:first-child:before {
            counter-increment: d3 0;
        }

        #l10 {
            padding-left: 0pt;
            counter-reset: d2 1;
        }

        #l10>li>*:first-child:before {
            counter-increment: d2;
            content: counter(d2, lower-latin)". ";
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        #l10>li:first-child>*:first-child:before {
            counter-increment: d2 0;
        }

        #l11 {
            padding-left: 0pt;
            counter-reset: d2 1;
        }

        #l11>li>*:first-child:before {
            counter-increment: d2;
            content: counter(d2, lower-latin)". ";
            color: black;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        #l11>li:first-child>*:first-child:before {
            counter-increment: d2 0;
        }


        table,
        tbody {
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
            vertical-align: top;
            overflow: visible;
        }

        li {
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }



        .page-break {
            page-break-before: always;
        }
    </style>

    </head>

    <body>
        <div style="width: 100%;">
            <div class="card" style="width: 100%;">
                <form
                    action="{{ route('editSuratPemesananRumahAction.admin', [$getProjek->nama_projek, Crypt::encrypt($getFormulirPesanan->id_formulir)]) }}"
                    method="post">
                    @csrf
                    <div class="card-body">
                        <center>
                            <table class="table table-borderless no-space">
                                <tr>
                                    <td><img style=""
                                            src="{{ asset('Dashboard') }}/images/content/logo-forms-living1.png"
                                            alt=""></td>
                                    <td><img style="float: right;" class="float-right"
                                            src="{{ asset('Dashboard') }}/images/content/logo-tidar-gray.png"
                                            alt="">
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <h4> Data SPR</h4>
                        </center>
                        <p>Nomor SPR:
                            @if ($user->kategori == 'StaffAcc' || $user->kategori == 'SuperAdmin')
                                @if ($getFormulirPesanan->no_fp != null)
                                    <input type="text" name="nofp" value="{{ $getFormulirPesanan->no_fp }}"
                                        style="width: 30%">
                                @else
                                    <input type="text" name="nofp" value="" style="width: 10%">
                                    <input type="text" name="nofpextra"
                                        value="@if ($getProjek->nama_projek == 'Greenland') /SPRGL/<?= date('m/Y') ?>@else /SPRKR/<?= date('m/Y') ?> @endif
                            "
                                        style="width: 15%" disabled>
                                @endif
                            @else
                                <p>{{ $getFormulirPesanan->no_fp }}</p>
                            @endif
                        </p>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <H3>Data User</H3>
                            </div>
                            <table>
                                <br>
                                <tr>
                                    <td>Nama</td>
                                    <td>: <input type="text" name="namaPlgn" value="{{ $getFormulirPesanan->nama_plgn }}"
                                            style="width: 95%">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;">NPWP</td>
                                    <td>: <input type="text" name="npwp" value="{{ $getFormulirPesanan->npwp_plgn }}"
                                            style="width:95%">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;">KTP/SIM No.</td>
                                    <td>: <input type="text" name="ktp"
                                            value="{{ $getFormulirPesanan->no_ktp_plgn }} " style="width: 95%"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: <input type="text" name="alamat"
                                            value="{{ $getFormulirPesanan->alamat_plgn }} " style="width: 95%"></td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td>
                                    <td>: <input type="text" name="tlp"
                                            value="{{ $getFormulirPesanan->no_telp_plgn }}" style="width: 95%"></td>
                                </tr>
                                <tr>
                                    <td>rupiahNonNon</td>
                                    <td>: <input type="text" name="email"
                                            value="{{ $getFormulirPesanan->rupiahNonNon_plgn }}" style="width: 95%"></td>
                                </tr>
                                <tr>
                                    <td>
                                        Tempat & Tgl. Lahir
                                    </td>
                                    <td>
                                        : <input type="text" name="tempat"
                                            value="{{ $getFormulirPesanan->tempat_lahir_plgn }}" style="width: 30%">,
                                            <input type="date" name="tanggalLahir" value="{{ $getFormulirPesanan->tgl_lahir_plgn }}">
                                        {{-- {{ tgl_indo(date('Y-m-d', strtotime($getFormulirPesanan->tgl_lahir_plgn))) }} --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sumber Dana</td>
                                    <td>: {{ $getFormulirPesanan->sumber_dana_plgn }}</td>
                                </tr>
                                <tr>
                                    <td>Tujuan transaksi</td>
                                    <td>
                                        : -
                                    </td>

                                </tr>
                            </table>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    Data Rumah dan Tipe Rumah
                                </h3>
                            </div>
                            <ol id="l1">
                                <br>
                                <li data-list-text="1.">
                                    <p style="padding-top: 6pt;padding-left: 41pt;text-indent: -18pt;text-align: left;">
                                        Tipe Unit : {{ $getFormulirPesanan->jenis_tr }}</p>
                                </li>
                                <li data-list-text="2.">
                                    <p style="padding-top: 2pt;padding-left: 41pt;text-indent: -18pt;text-align: left;">
                                        Cluster – Blok : {{ $getFormulirPesanan->nama_cluster }} -
                                        {{ $getFormulirPesanan->blok }} / {{ $getFormulirPesanan->nomor }}
                                    </p>
                                </li>
                                <li data-list-text="3.">
                                    @if ($user->kategori == 'AdminLegal' || $user->kategori == 'SuperAdmin')
                                        <p style="padding-top: 2pt;padding-left: 41pt;text-indent: -18pt;text-align: left;">
                                            Luas Tanah : <input type="text" name="luasTanah"
                                                value="{{ $getFormulirPesanan->luas_tanah }}" style="width: 10%">
                                        </p>
                                    @else
                                        <p style="padding-top: 2pt;padding-left: 41pt;text-indent: -18pt;text-align: left;">
                                            Luas Tanah : {{ $getFormulirPesanan->luas_tanah }} m2
                                        </p>
                                    @endif
                                </li>
                                <li data-list-text="4.">
                                    <p style="padding-top: 1pt;padding-left: 41pt;text-indent: -18pt;text-align: left;">
                                        Luas Bangunan : {{ $getFormulirPesanan->luas_bangunan_kkpr }} m2
                                    </p>
                                </li>
                                <li data-list-text="5.">
                                    <p style="padding-top: 2pt;padding-left: 41pt;text-indent: -18pt;text-align: left;">
                                        Dengan Harga yang
                                        diperhitungkan sebagai berikut :</p>
                                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                    @foreach ($dataHarga as $price)
                                        <table style="border-collapse:collapse;margin-left:38.524pt" cellspacing="0">
                                            <tr style="height:14pt">
                                                <td style="width:215pt">
                                                    <p class="s2"
                                                        style="padding-left: 2pt;text-indent: 0pt;line-height: 11pt;text-align: left;">
                                                        a.
                                                        Harga
                                                        Pricelist</p>
                                                </td>
                                                <td style="width:29pt">
                                                    <p class="s2"
                                                        style="padding-left: 3pt;text-indent: 0pt;line-height: 11pt;text-align: left;">
                                                        Rp.
                                                    </p>
                                                </td>
                                                <td style="width:10rem">
                                                    <p class="s2"
                                                        style="padding-right: 5pt;text-indent: 0pt;line-height: 11pt;text-align: right;">
                                                        @if ($user->kategori == 'StaffAcc' || $user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                                                            <input type="text" name="hargaPricelist" class="form-control" oninput="formatInput(this)"
                                                                value="{{ rupiahNon($price['hargaPricelist']) }}">
                                                        @else
                                                            {{ rupiahNon($price['hargaPricelist']) }}
                                                        @endif
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr style="height:14pt">
                                                <td style="width:215pt">
                                                    <p class="s2"
                                                        style="padding-left: 2pt;text-indent: 0pt;line-height: 11pt;text-align: left;">
                                                        b.
                                                        Diskon</p>
                                                </td>
                                                <td style="width:29pt">
                                                    <p class="s2"
                                                        style="padding-left: 3pt;text-indent: 0pt;line-height: 11pt;text-align: left;">
                                                        Rp.
                                                    </p>
                                                </td>
                                                <td style="width:86pt">
                                                    <p class="s2"
                                                        style="padding-right: 5pt;text-indent: 0pt;line-height: 11pt;text-align: right;">

                                                        @if (!empty($price))
                                                            @if ($price['hargaDiskon'] = 0)
                                                                @if ($user->kategori == 'StaffAcc' || $user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                                                                    <input type="text" name="hargaDiskon" oninput="formatInput(this)"
                                                                        class="form-control" value="0">
                                                                @else
                                                                    0,-
                                                                @endif
                                                            @else
                                                                @if ($user->kategori == 'StaffAcc' || $user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                                                                    <input type="text" name="hargaDiskon" oninput="formatInput(this)"
                                                                        class="form-control"
                                                                        value="{{ rupiahNon($price['hargaDiskon']) }}">
                                                                @else
                                                                    0,-
                                                                @endif
                                                                {{-- {{ number_format($price['hargaDiskon'], 2) }} --}}
                                                            @endif
                                                    </p>
                                                @else
                                                    No data available</p>
                                    @endif
                                    </td>
                                    </tr>
                                    <tr style="height:14pt">
                                        <td style="width:215pt">
                                            <p class="s2"
                                                style="padding-left: 2pt;text-indent: 0pt;line-height: 11pt;text-align: left;">
                                                c.
                                                Harga
                                                Netto</p>
                                        </td>
                                        <td style="width:29pt">
                                            <p class="s2"
                                                style="padding-left: 3pt;text-indent: 0pt;line-height: 11pt;text-align: left;">
                                                Rp.
                                            </p>
                                        </td>
                                        <td style="width:86pt">
                                            <p class="s2"
                                                style="padding-right: 5pt;text-indent: 0pt;line-height: 11pt;text-align: right;">
                                                @if ($user->kategori == 'StaffAcc' || $user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                                                    <input type="text" name="hargaNetto" class="form-control" oninput="formatInput(this)"
                                                        value="{{ rupiahNon($getFormulirPesanan->harga_netto) }}">
                                                @else
                                                    {{ rupiahNon($getFormulirPesanan->harga_netto) }}
                                                @endif

                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:16pt">
                                        <td style="width:215pt">
                                            <p class="s2"
                                                style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                                d.
                                                PPN (
                                                Pajak Pertambahan Nilai)</p>
                                        </td>
                                        <td style="width:29pt">
                                            <p class="s2"
                                                style="padding-left: 3pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                                Rp.
                                            </p>
                                        </td>
                                        <td style="width:86pt">
                                            <p class="s2"
                                                style="padding-right: 5pt;text-indent: 0pt;line-height: 13pt;text-align: right;">
                                                @if ($user->kategori == 'StaffAcc' || $user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                                                    <input type="text" name="hargaPPN" class="form-control" oninput="formatInput(this)"
                                                        value="{{ rupiahNon($price['hargaPPN']) }}">
                                                @else
                                                    {{ number_format($price['hargaPPN'], 2) }}
                                                @endif
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:16pt">
                                        <td style="width:215pt">
                                            <p class="s2"
                                                style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                                e.
                                                BPHTB</p>
                                        </td>
                                        <td style="width:29pt">
                                            <p class="s2"
                                                style="padding-left: 3pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                                Rp.
                                            </p>
                                        </td>
                                        <td style="width:86pt">
                                            <p class="s2"
                                                style="padding-right: 5pt;text-indent: 0pt;line-height: 13pt;text-align: right;">
                                                @if ($user->kategori == 'StaffAcc' || $user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                                                    <input type="text" name="hargaBPHTB" class="form-control" oninput="formatInput(this)"
                                                        value="{{ rupiahNon($price['hargaBPHTB']) }}">
                                                @else
                                                    {{ number_format($price['hargaBPHTB'], 2) }}
                                                @endif
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:17pt">
                                        <td style="width:215pt">
                                            <p class="s2"
                                                style="padding-top: 3pt;padding-left: 2pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                                                Sehinggal TOTAL harga sebesar</p>
                                        </td>
                                        <td style="width:29pt;border-top-style:solid;border-top-width:1pt">
                                            <p class="s2"
                                                style="padding-top: 3pt;padding-left: 3pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                                                Rp.</p>
                                        </td>
                                        <td style="width:86pt;border-top-style:solid;border-top-width:1pt">
                                            @if ($user->kategori == 'StaffAcc' || $user->kategori == 'AdminAccounting' || $user->kategori == 'SuperAdmin')
                                            <input type="text" name="hargaTotal" class="form-control" oninput="formatInput(this)"
                                                value="{{ rupiahNon($getFormulirPesanan->total_harga) }}">
                                        @else
                                        <p class="s2"
                                        style="padding-top: 3pt;padding-right: 5pt;text-indent: 0pt;line-height: 12pt;text-align: right;">
                                        {{ rupiahNon($getFormulirPesanan->total_harga) }},-</p>
                                        @endif
                                          
                                        </td>
                                    </tr>
                                    </table>
                                    @endforeach
                                </li>
                                <li data-list-text="6.">
                                    <p class="s3"
                                        style="padding-top: 1pt;padding-left: 40pt;text-indent: -17pt;text-align: left;">
                                        Untuk
                                        penyerahan bangunan tanggal :</p>
                                </li>
                            </ol>
                        </div>

                        <div class="page-break"></div>
                        <p style="padding-top: 4pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">JADWAL PEMBAYARAN
                            ANGSURAN</p>
                        <p style="text-indent: 0pt;text-align: left;"><br /></p>
                        <table class="table-bordered" id="pembayaranTable" cellspacing="0">
                            <tr style="height:16pt">
                                <td style="text-align: center;">No.</td>
                                <td style="text-align: center;">Keterangan</td>
                                <td style="text-align: center;">Tanggal</td>
                                <td style="text-align: center;">Nominal</td>
                                @if (in_array($user->kategori, ['StaffAcc', 'SuperAdmin', 'AdminAccounting']))
                                    <td style="text-align: center; width: 8rem">Pengaturan</td>
                                @endif
                            </tr>

                            <?php $no = 1; ?>
                            @foreach ($getPembayaranRumah as $dtpem)
                            @if ($dtpem->detail_pr =="KPR")
                            <tr style="height:16pt">
                                <td style="text-align: center;" class="row-number">{{ $no }}</td>
                                <td>
                                    <input type="text" name="id_pembayaran[]" value="{{ $dtpem->id_pem_rumah }}" hidden>
                                    <input type="text" name="keterangan[]" value="{{ $dtpem->detail_pr }}" style="width: 100%;">
                                </td>
                                <td>
                                    <input type="text" value="00/00/0000" name="tglPembayaran[]">
                                </td>
                                <td>
                                    <input type="text" name="nominal[]" value="{{ rupiahNon($dtpem->harga_pr) }}"  oninput="formatInput(this)">
                                    @if ($dtpem->sisa_pr <= 0)
                                        <span class="badge badge-secondary"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    @endif
                                </td>
                                @if (in_array($user->kategori, ['StaffAcc', 'SuperAdmin', 'AdminAccounting']))
                                <td style="text-align: center;">
                                    <a href="#" class="remove btn btn-outline-danger" data-id="{{ $dtpem->id_pem_rumah }}" onclick="openDeleteModal(this)">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                                @endif
                            </tr>
                            @else
                            <tr style="height:16pt">
                                <td style="text-align: center;" class="row-number">{{ $no }}</td>
                                <td>
                                    <input type="text" name="id_pembayaran[]" value="{{ $dtpem->id_pem_rumah }}" hidden>
                                    <input type="text" name="keterangan[]" value="{{ $dtpem->detail_pr }}" style="width: 100%;">
                                </td>
                                <td>
                                    <input type="date" value="{{ $dtpem->tgl_pr }}" name="tglPembayaran[]">
                                </td>
                                <td>
                                    <input type="text" name="nominal[]" value="{{ rupiahNon($dtpem->harga_pr) }}"  oninput="formatInput(this)">
                                    @if ($dtpem->sisa_pr <= 0)
                                        <span class="badge badge-secondary"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    @endif
                                </td>
                                @if (in_array($user->kategori, ['StaffAcc', 'SuperAdmin', 'AdminAccounting']))
                                <td style="text-align: center;">
                                    <a href="#" class="remove btn btn-outline-danger" data-id="{{ $dtpem->id_pem_rumah }}" onclick="openDeleteModal(this)">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                                @endif
                            </tr>
                            @endif
                               
                                <?php $no++; ?>
                            @endforeach


                            <tr id="lastRow">
                                <td colspan="5" style="text-align: center;">
                                    <a href="#pembayaranTable" onclick="addRow()" class="btn btn-primary">Tambah Baris</a>
                                </td>
                            </tr>
                        </table>
                        <div class="modal fade" id="deleteConfirmationModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteConfirmationLabel">Konfirmasi Penghapusan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Confirmation message -->
                                        <h5>Apakah Anda yakin ingin menghapus item ini?</h5>
                                        <p>Tindakan ini tidak dapat dikembalikan. Setelah dihapus, data ini akan hilang secara permanen.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Cancel and Confirm buttons -->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger" id="confirmDeleteButton">Ya, Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            let deleteElement = null;

                            // Function to open the modal
                            function openDeleteModal(element) {
                                deleteElement = element; // Store the element to be deleted
                                {{--  var modal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'), {});
                                modal.show();  --}}
                                $('#deleteConfirmationModal').modal('show');
                            }

                            // Confirm delete action
                            document.getElementById('confirmDeleteButton').addEventListener('click', function() {
                                if (deleteElement) {
                                    var id = $(deleteElement).data('id'); // Get the ID from the data attribute
                                    var token = "{{ csrf_token() }}"; // Get CSRF token

                                    $.ajax({
                                        url: '{{ route("delete.pembayaran", ":id") }}'.replace(':id', id),
                                        type: 'DELETE',
                                        data: {
                                            "_token": token,
                                        },
                                        success: function(response) {
                                            if (response.success) {
                                                // Remove the row on successful deletion
                                                {{--  $('#deleteConfirmationModal').removeClass('show');
                                                $('#deleteConfirmationModal').attr('aria-hidden', 'true');
$('#deleteConfirmationModal').modal('hide');  --}}
                                                $('#deleteConfirmationModal').modal('hide');
                                                $(deleteElement).closest('tr').remove();
                                                $('#deleteConfirmationModal').modal('hide');
                                                var modal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'), {});
                                                modal.hide();
                                                $('#deleteConfirmationModal').modal('hide');
                                                // Show Toastify success message
                                                Toastify({
                                                    text: response.message || "Data berhasil dihapus.",
                                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                                    duration: 3000
                                                }).showToast();

                                            } else {
                                                // Show Toastify error message
                                                Toastify({
                                                    text: "Gagal menghapus item. Silakan coba lagi.",
                                                    backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                                                    duration: 3000
                                                }).showToast();
                                                console.error(response);
                                            }
                                        },
                                        error: function(xhr) {
                                            // Show Toastify error message on AJAX error
                                            Toastify({
                                                text: "Terjadi kesalahan saat memproses permintaan Anda.",
                                                backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                                                duration: 3000
                                            }).showToast();
                                            console.error("Error details:", xhr.responseText);
                                        }
                                    });

                                    // Hide the modal after clicking confirm
                                    {{--  var modal = bootstrap.Modal.getInstance(document.getElementById('deleteConfirmationModal'));  --}}

                                }
                            });
                            function addRow() {
                                var table = document.getElementById('pembayaranTable');
                                var rowCount = table.getElementsByTagName('tr').length - 2; // -2 for header and lastRow
                                var newRow = `
                                    <tr style="height:16pt">
                                        <td style="text-align: center;" class="row-number">${rowCount + 1}</td>
                                        <td>
                                            <input list="paymentTypes" name="tipePembayaran[]" id="paymentType" placeholder="Pilih atau ketik manual">

                                            <!-- Datalist with predefined options -->
                                            <datalist id="paymentTypes">
                                                <!-- Cicilan Uang Muka 1 - 10 -->
                                                <option value="Cicilan Uang Muka 1">
                                                <option value="Cicilan Uang Muka 2">
                                                <option value="Cicilan Uang Muka 3">
                                                <option value="Cicilan Uang Muka 4">
                                                <option value="Cicilan Uang Muka 5">
                                                <option value="Cicilan Uang Muka 6">
                                                <option value="Cicilan Uang Muka 7">
                                                <option value="Cicilan Uang Muka 8">
                                                <option value="Cicilan Uang Muka 9">
                                                <option value="Cicilan Uang Muka 10">

                                                <!-- Angsuran ke - 1 - 20 -->
                                                <option value="Angsuran ke-1">
                                                <option value="Angsuran ke-2">
                                                <option value="Angsuran ke-3">
                                                <option value="Angsuran ke-4">
                                                <option value="Angsuran ke-5">
                                                <option value="Angsuran ke-6">
                                                <option value="Angsuran ke-7">
                                                <option value="Angsuran ke-8">
                                                <option value="Angsuran ke-9">
                                                <option value="Angsuran ke-10">
                                                <option value="Angsuran ke-11">
                                                <option value="Angsuran ke-12">
                                                <option value="Angsuran ke-13">
                                                <option value="Angsuran ke-14">
                                                <option value="Angsuran ke-15">
                                                <option value="Angsuran ke-16">
                                                <option value="Angsuran ke-17">
                                                <option value="Angsuran ke-18">
                                                <option value="Angsuran ke-19">
                                                <option value="Angsuran ke-20">

                                                <!-- KPR -->
                                                <option value="KPR">
                                            </datalist>
                                        </td>
                                        <td>
                                            <input type="date" name="tglPembayaranBaru[]">
                                        </td>
                                        <td>
                                            <input type="text" name="nominalBaru[]" placeholder="Masukan harga nominal" oninput="formatInput(this)" value="">

                                        </td>
                                        <td style="text-align: center;">
                                            <a href="#" class="remove btn btn-outline-danger" onclick="removeRow(this)">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>`;
                                document.getElementById('lastRow').insertAdjacentHTML('beforebegin', newRow);
                                updateRowNumbers(); // Ensure the row numbers are updated after adding a row
                            }

                            function updateRowNumbers() {
                                var rows = document.querySelectorAll('#pembayaranTable tr .row-number');
                                rows.forEach((row, index) => {
                                    row.textContent = index + 1; // Update row number based on the index
                                });
                            }

                            function formatInput(input) {
                                // Remove any non-digit characters
                                let value = input.value.replace(/\D/g, '');

                                // Convert to a number and format it with thousand separators
                                value = new Intl.NumberFormat('de-DE').format(value);

                                // Update the input value
                                input.value = value;
                            }

                        </script>


                        <p style="text-indent: 0pt;text-align: left;"><br /></p>
                        <p style="padding-left: 5pt;text-indent: 0pt;text-align: left;">NOTES</p>
                        <p style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                            Harga Sudah
                            Termasuk : SHGB, PPN, IMB, PLN dan Air bersih. </p>
                        <p style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                            Harga Belum
                            Termasuk : AJB, BBN, BPHTB, Biaya KPR.</p>
                        <p style="padding-left: 5pt;text-indent: 0pt;line-height: 229%;text-align: justify;">Promo :
                            @if (empty($getPromo))
                                Tidak menggunakan promo
                            @else
                                {{ $getPromo->kode_promo }}
                            @endif
                            <a href="#" data-toggle="modal" data-target="#editPromo"
                                class="btn btn-outline-info btn--small">
                                <i class="fas fa-edit    "></i> Promo</a>


                            <br>

                            @if (empty($getPromo))
                                Tidak menggunakan promo
                            @else
                                {{ $getPromo->keterangan }}
                            @endif

                        </p>
                        <p>
                            Malang,
                            <?= tgl_indo(date('Y-m-d', strtotime($getFormulirPesanan->tgl_input_fp))) ?>
                            </php>
                        </p>
                        <center>

                            <button type="submit" class="btn btn-success">Ganti Data</button>
                        </center>
                </form>
            </div>
        </div>
        </div>
        <div class="modal" id="editPromo">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Promo</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form
                        action="{{ route('editPromoSuratPemesananRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($getFormulirPesanan->id_formulir)]) }}"
                        method="POST">
                        @csrf
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Pilih Promo</label>
                                <select class="js-example-basic-single form-control" id="promo" name="promo"
                                    style="width: 100%">
                                    <option value="">--Promo--</option>
                                    @foreach ($getPromoAll as $promoAll)
                                        <option value="{{ $promoAll->id_promo }}">{{ $promoAll->promo }} -
                                            {{ $promoAll->keterangan }}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

@endsection

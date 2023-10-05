@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('V_Admin.footer')
@extends('flashdata')
@section('tittle', 'FORMS ONE | Formulir')

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
                                <td><img style="" src="{{ asset('Dashboard') }}/images/content/logo-forms-living1.png"
                                        alt=""></td>
                                <td><img style="float: right;" class="float-right"
                                        src="{{ asset('Dashboard') }}/images/content/logo-tidar-gray.png" alt="">
                                </td>
                            </tr>
                        </table>
                        <br>
                        <h4> Data SPR</h4>
                    </center>
                    <p>Nomor SPR:
                        @if ($user->kategori =="StaffAcc" || $user->kategori == "SuperAdmin")
                        @if ($getFormulirPesanan->no_fp != null)
                        <input type="text" name="nofp" value="{{ $getFormulirPesanan->no_fp }}" style="width: 30%">
                        @else
                        <input type="text" name="nofp" value="" style="width: 10%">
                        <input type="text" name="nofpextra" value="@if ($getProjek->nama_projek=='Greenland')/SPRGL/<?=date('m/Y')?>@else /SPRKR/<?=date('m/Y')?>@endif
                            " style="width: 15%" disabled>
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
                                <td>: <input type="text" name="ktp" value="{{ $getFormulirPesanan->no_ktp_plgn }} "
                                        style="width: 95%"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <input type="text" name="alamat" value="{{ $getFormulirPesanan->alamat_plgn }} "
                                        style="width: 95%"></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td>: <input type="text" name="tlp" value="{{ $getFormulirPesanan->no_telp_plgn }}"
                                        style="width: 95%"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: <input type="email" name="tlp" value="{{ $getFormulirPesanan->email_plgn }}"
                                        style="width: 95%"></td>
                            </tr>
                            <tr>
                                <td>
                                    Tempat & Tgl. Lahir
                                </td>
                                <td>
                                    : <input type="text" name="tlp" value="{{ $getFormulirPesanan->tempat_lahir_plgn }}"
                                        style="width: 30%">,
                                    {{ tgl_indo(date('Y-m-d', strtotime($getFormulirPesanan->tgl_lahir_plgn))) }}
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
                                @if ($user->kategori == "AdminLegal" || $user->kategori == "SuperAdmin")
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

                                @if (empty($promo))

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
                                        <td style="width:86pt">
                                            <p class="s2"
                                                style="padding-right: 5pt;text-indent: 0pt;line-height: 11pt;text-align: right;">
                                                {{ rupiah($getFormulirPesanan->harga_tr) }},-</p>
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
                                                -,-</p>
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
                                                {{ rupiah($getFormulirPesanan->total_harga / 1.11) }},-</p>
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
                                                {{ rupiah((11 / 100) * ($getFormulirPesanan->total_harga / 1.11)) }},-
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
                                            <p class="s2"
                                                style="padding-top: 3pt;padding-right: 5pt;text-indent: 0pt;line-height: 12pt;text-align: right;">
                                                {{ rupiah($getFormulirPesanan->total_harga) }},-</p>
                                        </td>
                                    </tr>
                                </table>
                                @else
                                @if ($promo->bphtb_promo == 'yes')
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
                                        <td style="width:86pt">
                                            <p class="s2"
                                                style="padding-right: 5pt;text-indent: 0pt;line-height: 11pt;text-align: right;">
                                                {{ rupiah($getFormulirPesanan->harga_tr) }},-</p>
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
                                                {{ rupiah($promo->diskon_promo) }},-</p>
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
                                                {{ rupiah(($getFormulirPesanan->total_harga + 3000000) / 1.16) }},-
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
                                                {{ rupiah((11 / 100) * (($getFormulirPesanan->total_harga + 3000000) /
                                                1.16)) }},-
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
                                            <p class="s2"
                                                style="padding-top: 3pt;padding-right: 5pt;text-indent: 0pt;line-height: 12pt;text-align: right;">
                                                {{ rupiah($getFormulirPesanan->total_harga) }},-</p>
                                        </td>
                                    </tr>
                                </table>
                                @elseif ($promo->bphtb_promo == 'no')
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
                                        <td style="width:86pt">
                                            <p class="s2"
                                                style="padding-right: 5pt;text-indent: 0pt;line-height: 11pt;text-align: right;">
                                                {{ rupiah($getFormulirPesanan->harga_tr) }},-</p>
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
                                                {{ rupiah($promo->diskon_promo) }},-</p>
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
                                                {{ rupiah($getFormulirPesanan->total_harga / 1.11) }},-</p>
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
                                                {{ rupiah((11 / 100) * ($getFormulirPesanan->total_harga / 1.11)) }},-
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
                                            <p class="s2"
                                                style="padding-top: 3pt;padding-right: 5pt;text-indent: 0pt;line-height: 12pt;text-align: right;">
                                                {{ rupiah($getFormulirPesanan->total_harga) }},-</p>
                                        </td>
                                    </tr>
                                </table>
                                @endif


                                @endif


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
                    <table style="border-collapse:collapse;margin-left:5.25pt" cellspacing="0">
                        <tr style="height:16pt">
                            <td
                                style="width:28pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                <p class="s2"
                                    style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">No.
                                </p>
                            </td>
                            <td
                                style="width:215pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                <p class="s2"
                                    style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                    Keterangan</p>
                            </td>
                            <td
                                style="width:122pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                <p class="s2"
                                    style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                    Tanggal</p>
                            </td>
                            <td
                                style="width:122pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                <p class="s2"
                                    style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                    Nominal</p>
                            </td>
                            <td
                                style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                Pengaturan</td>
                        </tr>

                        <?php $no = 1; ?>
                        @foreach ($getPembayaranRumah as $dtpem)
                        <tr style="height:16pt">
                            <td
                                style="width:28pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                <p class="s2"
                                    style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                    {{ $no }}
                                </p>
                            </td>
                            <td
                                style="width:215pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                <p class="s2"
                                    style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                    {{ $dtpem->detail_pr }}</p>
                            </td>
                            <td
                                style="width:122pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                <p class="s2"
                                    style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                    @if ($dtpem->tgl_pr != '0000-00-00')
                                    <?= tgl_indo(date('Y-m-d', strtotime($dtpem->tgl_pr))) ?>
                                    @else
                                    -
                                    @endif
                                </p>
                            </td>
                            <td
                                style="width:122pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                <p class="s2"
                                    style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                    Rp {{ rupiah($dtpem->harga_pr) }}
                                    @if ($dtpem->sisa_pr == 0 || $dtpem->sisa_pr <= 0) <span
                                        class="badge badge-secondary"><i class="fa fa-check"
                                            aria-hidden="true"></i></span>
                                        @endif
                                </p>
                            </td>
                            <td
                                style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                <a href="{{ route('pembayaranRumah.Admin', [$getProjek->nama_projek, Crypt::encrypt($dtpem->id_pem_rumah)]) }}"
                                    class="btn btn-info">
                                    <i class="bi bi-calendar2-check"></i> Pembayaran
                                </a>
                                <a href="{{ route('editPembayaranRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($dtpem->id_pem_rumah)]) }}"
                                    class="btn btn-info">
                                    <i class="bi bi-pencil-square"> </i> Edit Jumlah Pembayaran
                                </a>

                            </td>
                        </tr>
                        <?php

                                $no++;
                                ?>
                        @endforeach

                    </table>
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    <p style="padding-left: 5pt;text-indent: 0pt;text-align: left;">NOTES</p>
                    <p style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                        Harga Sudah
                        Termasuk : SHGB, PPN, IMB, PLN dan Air bersih. </p>
                    <p style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                        Harga Belum
                        Termasuk : AJB, BBN, BPHTB, Biaya KPR.</p>
                    <p style="padding-left: 5pt;text-indent: 0pt;line-height: 229%;text-align: justify;">Promo :
                        @if (empty($promo))
                        Tidak menggunakan promo
                        @else
                        {{ $promo->kode_promo }}
                        @endif

                        <br>

                        @if (empty($promo))
                        Tidak menggunakan promo
                        @else
                        {{ $promo->keterangan }}
                        @endif

                    </p>
                    <p>
                        Malang,
                        <?= tgl_indo(date('Y-m-d', strtotime($getFormulirPesanan->tgl_input_getFormulirPesanan))) ?>
                        </php>
                    </p>
                    <center>

                        <button type="submit" class="btn btn-success">Ganti Data</button>
                    </center>
            </form>
        </div>
    </div>
    </div>


</body>


@endsection
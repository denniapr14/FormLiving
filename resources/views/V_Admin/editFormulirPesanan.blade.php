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
            font-family: Calibri, sans-serif;
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
                <form action="{{ route('editSuratPemesananRumahAction.admin', [$getProjek->nama_projek,Crypt::encrypt($getFormulirPesanan->id_formulir)]) }}" method="post">
                    @csrf
                <div class="card-body">
                    <center>
                        <table class="table table-borderless no-space">
                            <tr>
                                <td><img style="" src="{{ asset('Dashboard') }}/images/content/logo-forms-living1.png"
                                        alt=""></td>
                                <td><img style="float: right;"  class="float-right"
                                        src="{{ asset('Dashboard') }}/images/content/logo-tidar-gray.png" alt="">
                                </td>
                            </tr>
                        </table>
                        <br>
                        <h4> SURAT PEMESANAN RUMAH SEMENTARA</h4>
                        <p>Nomor :
                            @if($getFormulirPesanan->no_fp !=null)

                            <input type="text" name="nofp" value="{{ $getFormulirPesanan->no_fp }}" style="width: 30%">
                            @else
                            <input type="text" name="nofp" value="{{ old('nofp') }}" style="width: 30%">

                            @endif
                            </p>
                    </center>
                    <p>Yang bertanda tangan dibawah ini :</p>
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $getFormulirPesanan->nama_plgn }} </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{ $getFormulirPesanan->alamat_plgn }}</td>
                        </tr>
                        <tr>
                            <td>No. Telepon</td>
                            <td>: {{ $getFormulirPesanan->no_telp_plgn }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {{ $getFormulirPesanan->email_plgn }}</td>
                        </tr>
                        <tr>
                            <td>
                                Tempat & Tgl. Lahir
                            </td>
                            <td>
                                : {{ $getFormulirPesanan->tempat_lahir_plgn }},
                                {{  tgl_indo(date('Y-m-d', strtotime($getFormulirPesanan->tgl_lahir_plgn)))  }}
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
                    <p>
                        Dengan ini
                        menyatakan telah memesan kepada PT. CITRA ARGO TIRTA, berkedudukan di Kota Malang,
                        selanjutnya disebut
                        Developer/Penjual, untuk pembelian Objek yang berlokasi di Perumahan GREENLAND AT TIDAR,
                        Malang, sebagai
                        berikut
                        :
                    </p>
                    <ol id="l1">

                        <li data-list-text="1.">
                            <p style="padding-top: 6pt;padding-left: 41pt;text-indent: -18pt;text-align: left;">
                                Tipe Unit : {{ $getFormulirPesanan->jenis_tr }}</p>
                        </li>
                        <li data-list-text="2.">
                            <p style="padding-top: 2pt;padding-left: 41pt;text-indent: -18pt;text-align: left;">
                                Cluster – Blok : {{ $getFormulirPesanan->nama_cluster }} - {{ $getFormulirPesanan->blok }} / {{ $getFormulirPesanan->nomor }}
                            </p>
                        </li>
                        <li data-list-text="3.">
                            <p style="padding-top: 2pt;padding-left: 41pt;text-indent: -18pt;text-align: left;">
                                Luas Tanah : {{ $getFormulirPesanan->luas_tanah }} m2
                            </p>
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
                                                {{ rupiah((11 / 100) * ($getFormulirPesanan->total_harga / 1.11)) }},-</p>
                                        </td>
                                    </tr>
                                    <tr style="height:16pt">
                                        <td style="width:215pt">
                                            <p class="s2" style="padding-left: 2pt;text-indent: 0pt;text-align: left;">
                                                c.
                                                e.
                                                BPHTB</p>
                                        </td>
                                        <td style="width:29pt">
                                            <p class="s2" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">
                                                Rp.</p>
                                        </td>
                                        <td style="width:86pt">
                                            <p class="s2"
                                                style="padding-right: 6pt;text-indent: 0pt;text-align: right;">
                                                0,-
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:16pt">
                                        <td style="width:215pt">
                                            <p class="s2" style="padding-left: 2pt;text-indent: 0pt;text-align: left;">
                                                d.
                                                Biaya Surat
                                                (BBN dan AJB) PPAT</p>
                                        </td>
                                        <td style="width:29pt">
                                            <p class="s2" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">
                                                Rp.</p>
                                        </td>
                                        <td style="width:86pt">
                                            <p class="s2"
                                                style="padding-right: 5pt;text-indent: 0pt;text-align: right;">0,-
                                            </p>
                                        </td>
                                    </tr>
                                    <tr style="height:17pt">
                                        <td style="width:215pt">
                                            <p class="s2"
                                                style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                                e.
                                                Biaya
                                                Administrasi</p>
                                        </td>
                                        <td style="width:29pt;border-bottom-style:solid;border-bottom-width:1pt">
                                            <p class="s2"
                                                style="padding-left: 3pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                                Rp.
                                            </p>
                                        </td>
                                        <td style="width:86pt;border-bottom-style:solid;border-bottom-width:1pt">
                                            <p class="s2"
                                                style="padding-right: 5pt;text-indent: 0pt;line-height: 13pt;text-align: right;">
                                                0,-</p>
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
                                                    {{ rupiah(($getFormulirPesanan->total_harga + 3000000) / 1.16) }},-</p>
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
                                                    {{ rupiah((11 / 100) * (($getFormulirPesanan->total_harga + 3000000) / 1.16)) }},-</p>
                                            </td>
                                        </tr>
                                        <tr style="height:16pt">
                                            <td style="width:215pt">
                                                <p class="s2"
                                                    style="padding-left: 2pt;text-indent: 0pt;text-align: left;">c.
                                                    e.
                                                    BPHTB</p>
                                            </td>
                                            <td style="width:29pt">
                                                <p class="s2"
                                                    style="padding-left: 3pt;text-indent: 0pt;text-align: left;">Rp.</p>
                                            </td>
                                            <td style="width:86pt">
                                                <p class="s2"
                                                    style="padding-right: 6pt;text-indent: 0pt;text-align: right;">
                                                    {{ rupiah((($getFormulirPesanan->total_harga + 3000000) / 1.16) * (5 / 100) - 3000000) }},-
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="height:16pt">
                                            <td style="width:215pt">
                                                <p class="s2"
                                                    style="padding-left: 2pt;text-indent: 0pt;text-align: left;">d.
                                                    Biaya Surat
                                                    (BBN dan AJB) PPAT</p>
                                            </td>
                                            <td style="width:29pt">
                                                <p class="s2"
                                                    style="padding-left: 3pt;text-indent: 0pt;text-align: left;">Rp.</p>
                                            </td>
                                            <td style="width:86pt">
                                                <p class="s2"
                                                    style="padding-right: 5pt;text-indent: 0pt;text-align: right;">0,-
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="height:17pt">
                                            <td style="width:215pt">
                                                <p class="s2"
                                                    style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                                    e.
                                                    Biaya
                                                    Administrasi</p>
                                            </td>
                                            <td style="width:29pt;border-bottom-style:solid;border-bottom-width:1pt">
                                                <p class="s2"
                                                    style="padding-left: 3pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                                    Rp.
                                                </p>
                                            </td>
                                            <td style="width:86pt;border-bottom-style:solid;border-bottom-width:1pt">
                                                <p class="s2"
                                                    style="padding-right: 5pt;text-indent: 0pt;line-height: 13pt;text-align: right;">
                                                    0,-</p>
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
                                                    {{ rupiah((11 / 100) * ($getFormulirPesanan->total_harga / 1.11)) }},-</p>
                                            </td>
                                        </tr>
                                        <tr style="height:16pt">
                                            <td style="width:215pt">
                                                <p class="s2"
                                                    style="padding-left: 2pt;text-indent: 0pt;text-align: left;">c.
                                                    BPHTB</p>
                                            </td>
                                            <td style="width:29pt">
                                                <p class="s2"
                                                    style="padding-left: 3pt;text-indent: 0pt;text-align: left;">Rp.</p>
                                            </td>
                                            <td style="width:86pt">
                                                <p class="s2"
                                                    style="padding-right: 6pt;text-indent: 0pt;text-align: right;">
                                                    0,-
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="height:16pt">
                                            <td style="width:215pt">
                                                <p class="s2"
                                                    style="padding-left: 2pt;text-indent: 0pt;text-align: left;">d.
                                                    Biaya Surat
                                                    (BBN dan AJB) PPAT</p>
                                            </td>
                                            <td style="width:29pt">
                                                <p class="s2"
                                                    style="padding-left: 3pt;text-indent: 0pt;text-align: left;">Rp.</p>
                                            </td>
                                            <td style="width:86pt">
                                                <p class="s2"
                                                    style="padding-right: 5pt;text-indent: 0pt;text-align: right;">0,-
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="height:17pt">
                                            <td style="width:215pt">
                                                <p class="s2"
                                                    style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                                    e.
                                                    Biaya
                                                    Administrasi</p>
                                            </td>
                                            <td style="width:29pt;border-bottom-style:solid;border-bottom-width:1pt">
                                                <p class="s2"
                                                    style="padding-left: 3pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                                    Rp.
                                                </p>
                                            </td>
                                            <td style="width:86pt;border-bottom-style:solid;border-bottom-width:1pt">
                                                <p class="s2"
                                                    style="padding-right: 5pt;text-indent: 0pt;line-height: 13pt;text-align: right;">
                                                    0,-</p>
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
                    <div class="page-break"></div>

                    <p style="padding-top: 7pt;padding-left: 5pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                        Dengan
                        ini
                        menyatakan telah memesan kepada PT. CITRA ARGO TIRTA, berkedudukan di Kota Malang, selanjutnya
                        disebut
                        Developer/Penjual, untuk pembelian Objek yang berlokasi di Perumahan GREENLAND AT TIDAR, Malang,
                        sebagai
                        berikut
                        :</p>

                    <p class="s3"
                        style="padding-top: 4pt;padding-left: 5pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                        Untuk pemesanan tersebut diatas, maka dengan ini pemesan menyetujui syarat dan ketentuan sebagai
                        berikut
                        :
                    </p>
                    <ol id="l2">
                        <li data-list-text="I.">
                            <p style="padding-left: 41pt;text-indent: -20pt;line-height: 114%;text-align: left;">
                                Menandatangani
                                Perjanjian Pengikatan Jual Beli (PPJB) Tanah dan Bangunan/ Kavling dalam waktu 30 (tiga
                                puluh)
                                hari
                                sejak tanggal Surat Pemesanan ini. Apabila setelah lewatnya jangka waktu tersebut, maka PT.
                                CITRA
                                ARGO
                                TIRTA berhak membatalkan Surat Pemesanan ini sesuai butir XI di bawah, maka seluruh
                                pembayaran
                                yang
                                telah dilakukan pemesan tidak dapat dituntut kembali atau ditarik dari PT. CITRA ARGO TIRTA.
                            </p>
                        </li>
                        <li data-list-text="II.">
                            <p style="padding-left: 41pt;text-indent: -23pt;line-height: 114%;text-align: left;">Dalam hal
                                pemesan
                                telah membayar sebagian atau seluruh pembayaran kepada PT. CITRA ARGO TIRTA dan pemesan
                                membatalkan
                                pemesanannya dengan alasan apapun selain penolakan</p>
                            <p style="padding-left: 41pt;text-indent: 0pt;line-height: 114%;text-align: left;">permohonan
                                fasilitas
                                kredit sebagaimana butir X di bawah, Maka seluruh pembayaran yang telah dilakukan pemesan
                                tidak
                                dapat
                                dituntut kembali atau ditarik dari PT. CITRA ARGO TIRTA.</p>
                        </li>
                        <li data-list-text="III.">
                            <p style="padding-left: 41pt;text-indent: -25pt;line-height: 114%;text-align: left;">Untuk
                                melaksanakan
                                penandatangan Akta Jual Beli (AJB) di hadapan Pejabat Pembuat Akta Tanah (PPAT) yang
                                ditunjuk
                                oleh
                                PT.
                                CITRA ARGO TIRTA, pemesan wajib terlebih dahulu membayar seluruh bea/pajak dan biaya yang
                                belum
                                termasuk
                                dalam Harga Tanah &amp; Bangunan/ Kavling.</p>
                        </li>
                        <li data-list-text="IV.">
                            <p style="padding-left: 41pt;text-indent: -26pt;line-height: 114%;text-align: left;">Sebelum
                                dilaksanakannya AJB di hadapan PPAT (untuk selanjutnya akan disebut AJB PPAT), apabila
                                terjadi
                                antara
                                lain:</p>
                            <ol id="l3">
                                <li data-list-text="a.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        kenaikan
                                        tarif
                                        dan/atau pengenaan baru berdasarkan suatu perubahan atau peraturan baru yang
                                        dikeluarkan/diberlakukan oleh Pemerintah atas suatu pajak/bea dan biaya seperti
                                        namun
                                        tidak
                                        terbatas pada Pajak Pertambahan Nilai (PPN), Bea Perolehan Hak atas Tanah dan
                                        Bangunan
                                        (BPHTB);
                                        atau</p>
                                </li>
                                <li data-list-text="b.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        kenaikan
                                        tarif
                                        Nilai Jual Obyek Pajak (NJOP) dimana Pajak Penghasilan (PPh) yang menjadi kewajiban
                                        PT.
                                        CITRA
                                        ARGO TIRTA menjadi lebih besar dari PPh yang telah dibayarkan oleh PT. CITRA ARGO
                                        TIRTA
                                        berdasarkan Harga Tanah dan Bangunan/Kavling dalam Surat Pemesanan ini, sejauh hal
                                        tersebut
                                        tidak disebabkan oleh PT. CITRA ARGO TIRTA, maka seluruhnya wajib ditanggung dan
                                        dibayar
                                        sepenuhnya oleh pemesan sebelum penandatanganan AJB PPAT.</p>
                                </li>
                            </ol>
                        </li>
                        <li data-list-text="V.">
                            <p style="padding-left: 41pt;text-indent: -27pt;line-height: 114%;text-align: left;">Dalam hal
                                pemesan
                                belum membayar seluruh pajak/bea dan biaya sebagaimana butir III sebelum dilaksanakannya
                                penandatanganan
                                AJB PPAT, maka PT. CITRA ARGO TIRTA tidak wajib melaksanakan penandatanganan AJB PPAT, dan
                                segala
                                risiko
                                serta akibatnya menjadi tanggungan pemesan sepenuhnya.</p>
                        </li>
                        <li data-list-text="VI.">
                            <p style="padding-left: 41pt;text-indent: -29pt;line-height: 114%;text-align: justify;">Apabila
                                pemesan
                                lalai dalam hal kurang atau terlambat melakukan suatu pembayaran berdasarkan Surat Pemesanan
                                ini,
                                maka
                                pemesan dikenakan dan wajib membayar kepada PT. CITRA ARGO TIRTA denda sebesar 1%O (satu
                                permil)
                                per
                                setiap hari keterlambatan dari jumlah terhutang sejak tanggal seharusnya dibayar sampai
                                dilunasi
                                seluruhnya.</p>
                        </li>
                        <li data-list-text="VII.">
                            <p style="padding-left: 41pt;text-indent: -32pt;line-height: 114%;text-align: left;">Selain
                                yang
                                telah
                                diatur dalam butir V di atas, apabila pemesan lalai dalam hal kurang atau terlambat
                                melakukan
                                suatu
                                pembayaran baik uang muka (DP) maupun angsuran yang berlangsung hingga 3 (tiga) bulan
                                berturut-turut
                                terhitung sejak tanggal permulaan kelalaian terjadi, maka PT. CITRA ARGO TIRTA. dapat
                                membatalkan
                                Surat
                                Pemesanan ini sesuai butir XI di bawah, dan seluruh pembayaran yang telah dilakukan pemesan
                                tidak
                                dapat
                                dituntut kembali atau ditarik dari PT. CITRA ARGO TIRTA.</p>
                        </li>
                        <li data-list-text="VIII.">
                            <p style="padding-left: 41pt;text-indent: -35pt;line-height: 114%;text-align: left;">Untuk
                                setiap
                                pembayaran, apabila ternyata cek/giro atau pengiriman/transfer yang ditolak oleh Bank, maka
                                pemesan
                                dikenakan dan wajib membayar kepada PT. CITRA ARGO TIRTA biaya administrasi sebesar Rp.
                                100.000,-
                                (seratus ribu rupiah) per setiap kejadian dan berlaku pula ketentuan butir IX dan butir X.
                            </p>
                        </li>
                        <li data-list-text="IX.">
                            <p style="padding-left: 41pt;text-indent: -29pt;line-height: 13pt;text-align: left;">Pembayaran
                                kepada
                                PT.
                                CITRA ARGO TIRTA dibedakan menjadi 2 yakni :</p>
                            <ol id="l4">
                                <li data-list-text="a.">
                                    <p
                                        style="padding-top: 4pt;padding-left: 77pt;text-indent: -18pt;line-height: 113%;text-align: left;">
                                        Secara Cash atau Cash Bertahap (inhouse) dapat melalui transfer ke rekening BANK
                                        CENTRAL
                                        ASIA
                                    </p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;text-align: left;">Cabang Galunggung,
                                        Malang</p>
                                    <p style="padding-top: 2pt;padding-left: 77pt;text-indent: 0pt;text-align: left;">Atas
                                        Nama : PT
                                        CITRA ARGO TIRTA</p>
                                    <p style="padding-top: 1pt;padding-left: 77pt;text-indent: 0pt;text-align: left;">Nomor
                                        Rekening
                                        :
                                        4403014000, atau melalui virtual account:</p>
                                    <p style="padding-top: 2pt;padding-left: 77pt;text-indent: 0pt;text-align: left;">Nomor
                                        Virtual
                                        Account NISP : 711021105313770</p>
                                </li>
                                <li data-list-text="b.">
                                    <p
                                        style="padding-top: 2pt;padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Secara KPR wajib dilakukan oleh pemesan dengan menggunakan debet
                                        card/transfer/virtual
                                        account/pemindahbukuan/ giro/cek dari rekening atas nama pemesan sendiri (Jika
                                        rekening atas
                                        nama suami/istri/anak harus dibuktikan dengan dokumen legalitas yang berupa Kartu
                                        Keluarga,
                                        Akta
                                        Nikah, Akta Lahir Anak), dengan mencantumkan nama pemesan, Nomor</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                        Blok/Kavling,
                                        pembayaran ditujukan ke :</p>
                                    <p style="padding-top: 2pt;padding-left: 77pt;text-indent: 0pt;text-align: left;">BANK
                                        CENTRAL
                                        ASIA
                                    </p>
                                    <p style="padding-top: 2pt;padding-left: 77pt;text-indent: 0pt;text-align: left;">
                                        Cabang
                                        Galunggung, Malang</p>
                                    <p style="padding-top: 2pt;padding-left: 77pt;text-indent: 0pt;text-align: left;">Atas
                                        Nama : PT
                                        CITRA ARGO TIRTA</p>
                                    <p
                                        style="padding-top: 1pt;padding-left: 77pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                                        Nomor Rekening : 4403014000, atau melalui virtual account: Nomor Virtual Account
                                        NISP :
                                        711021105313770</p>
                                </li>
                            </ol>
                        </li>
                        <li data-list-text="X.">
                            <p style="padding-left: 41pt;text-indent: -26pt;text-align: left;">PENGURUSAN FASILITAS KREDIT
                                MELALUI
                                BANK/LEMBAGA KEUANGAN/PEMBIAYAAN</p>
                            <ol id="l5">
                                <li data-list-text="a.">
                                    <p style="padding-top: 1pt;padding-left: 77pt;text-indent: -18pt;text-align: left;">
                                        Pemesan
                                        wajib
                                        melengkapi data-data yang diperlukan oleh Bank/Lembaga</p>
                                    <p
                                        style="padding-top: 2pt;padding-left: 77pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                                        Keuangan/Pembiayaan selambat-lambatnya : 7 (Tujuh) Hari setelah tanda jadi (booking
                                        fee)
                                        untuk KPR PERTAMA, KEDUA, KETIGA, KEEMPAT dan KELIMA 3 (tiga) bulan sebelum DP Lunas
                                        untuk
                                        KPR
                                        PERTAMA,KEDUA, KETIGA, KEEMPAT, KELIMA, KEENAM dan</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                                        seterusnya
                                        dengan cicilan Uang Muka (DP) lebih dari 3 (tiga) bulan. Apabila lewat dari waktu
                                        tersebut,
                                        pemesan telah lalai dengan alasan apapun maka PT. CITRA ARGO TIRTA berhak</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                        membatalkan
                                        Surat Pemesanan ini sesuai butir II dan butir XI di bawah.</p>
                                </li>
                                <li data-list-text="b.">
                                    <p
                                        style="padding-top: 2pt;padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Apabila pemesan tidak memenuhi undangan untuk wawancara, dan/atau apabila pemesan
                                        sudah
                                        mendapatkan persetujuan kredit dari Bank/Lembaga Keuangan/Pembiayaan namun belum
                                        melakukan
                                        akad
                                        kredit dengan Bank/Lembaga Keuangan/Pembiayaan dihadapan Notaris, dan PT. CITRA ARGO
                                        TIRTA,
                                        telah melakukan pemberitahuan sebanyak 3 (tiga) kali, baik lisan maupun tertulis,
                                        maka
                                        pemesan
                                        telah lalai dan PT. CITRA ARGO TIRTA berhak</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                        membatalkan
                                        Surat Pemesanan ini sesuai butir XI di bawah.</p>
                                </li>
                                <li data-list-text="c.">
                                    <p style="padding-top: 2pt;padding-left: 77pt;text-indent: -18pt;text-align: left;">
                                        Apabila
                                        setelah
                                        persetujuan kredit dari Bank/Lembaga Keuangan/Pembiayaan kepada</p>
                                    <p
                                        style="padding-top: 2pt;padding-left: 77pt;text-indent: 0pt;line-height: 114%;text-align: justify;">
                                        pemesan telah diberikan, ternyata pemesan harus menambah/membayar Uang Muka, maka
                                        pemesan
                                        wajib
                                        melunasi penambahan Uang Muka dimaksud selambat-lambatnya 14 (empat belas) hari
                                        setelah
                                        tanggal
                                        surat persetujuan fasilitas kredit dari Bank/Lembaga</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 114%;text-align: justify;">
                                        Keuangan/Pembiayaan tersebut. Apabila lewat dari dalam jangka waktu tersebut, maka
                                        PT. CITRA
                                        ARGO TIRTA berhak untuk :</p>
                                    <ol id="l6">
                                        <li data-list-text="i.">
                                            <p
                                                style="padding-left: 113pt;text-indent: -14pt;line-height: 114%;text-align: left;">
                                                memberikan waktu kepada pemesan untuk mengangsur Uang Muka yang harus
                                                ditambahkan
                                                dengan
                                                memperhitungkan biaya tambahan akibat mundurnya</p>
                                            <p style="padding-left: 113pt;text-indent: 0pt;text-align: left;">pelaksanaan
                                                akad
                                                kredit,atau</p>
                                        </li>
                                        <li data-list-text="ii.">
                                            <p
                                                style="padding-top: 1pt;padding-left: 113pt;text-indent: -16pt;text-align: left;">
                                                membatalkan Surat Pemesanan ini sesuai butir XI dibawah.</p>
                                        </li>
                                    </ol>
                                </li>
                                <li data-list-text="d.">
                                    <p
                                        style="padding-top: 2pt;padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Apabila permohonan fasilitas kredit pemesan ditolak oleh minimal 2 (dua)Bank/Lembaga
                                        Keuangan/Pembiayaan yang dituju, yang dibuktikan dengan surat penolakan dari</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                        Bank/Lembaga
                                        Keuangan/Pembiayaan dimaksud, maka PT. CITRA ARGO TIRTA berhak</p>
                                    <p
                                        style="padding-top: 4pt;padding-left: 77pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                                        membatalkan Surat Pemesanan ini sesuai butir XI di bawah, dan uang yang sudah
                                        dibayarkan
                                        oleh
                                        pemesan kepada PT. CITRA ARGO TIRTA akan dikembalikan dengan syarat pemesan wajib
                                        mengembalikan
                                        kepada PT. CITRA ARGO TIRTA Asli Surat Pemesanan ini dan seluruh</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 113%;text-align: left;">Asli
                                        kwitansi
                                        pembayaran terkait. Seluruh pengembalian tersebut adalah tanpa diberikan bunga
                                        apapun juga,
                                        setelah dipotong sebagai berikut:</p>
                                    <ol id="l7">
                                        <li data-list-text="i.">
                                            <p
                                                style="padding-left: 113pt;text-indent: -14pt;line-height: 114%;text-align: left;">
                                                Tanda
                                                jadi (booking fee) dan pajak - pajak yang sudah disetor ke negara untuk KPR
                                                PERTAMA,
                                                KEDUA, KETIGA, KEEMPAT dan KELIMA.</p>
                                        </li>
                                        <li data-list-text="ii.">
                                            <p
                                                style="padding-left: 113pt;text-indent: -16pt;line-height: 114%;text-align: left;">
                                                50%
                                                (lima puluh persen) dari seluruh uang yang sudah dibayarkan oleh pemesan
                                                untuk KPR
                                                PERTAMA, KEDUA, KETIGA, KEEMPAT, dan KELIMA dengan cicilan down payment
                                                lebih dari
                                                atau
                                                sama dengan 12 (dua belas) bulan.</p>
                                        </li>
                                        <li data-list-text="iii.">
                                            <p
                                                style="padding-left: 113pt;text-indent: -19pt;line-height: 114%;text-align: left;">
                                                50%
                                                (lima puluh persen) dari seluruh uang yang sudah dibayarkan oleh pemesan
                                                untuk KPR
                                                KEENAM dan seterusnya.</p>
                                        </li>
                                    </ol>
                                </li>
                                <li data-list-text="e.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Apabila
                                        diperjanjikan sebelumnya oleh PT. CITRA ARGO TIRTA dan pemesan bahwa
                                        seluruh/sebagian
                                        pembayaran
                                        Uang Muka, dibiayai oleh instansi/perusahaan seperti namun tidak terbatas PT.
                                        (Persero)
                                        Jamsostek, Yayasan Kesejahteraan Perumahan Prajurit dan</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                                        Pegawai
                                        Negeri
                                        Sipil Departemen Pertahanan (YKPP DEPHAN) atau Badan Pertimbangan Tabungan Perumahan
                                        Pegawai
                                        Negeri Sipil (BAPERTARUM) dan ketentuan mengenai Fasilitas Likuiditas Pembiayaan
                                        Perumahan
                                        (FLPP), maka pemesan menjamin sepenuhnya</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                                        bertanggung
                                        jawab atas pelunasan pembayaran Uang Muka tersebut kepada PT. CITRA ARGO TIRTA jika
                                        instansi/perusahaan dimaksud batal membayar Uang Muka dimaksud dalam</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 114%;text-align: justify;">
                                        waktu 1
                                        (satu) bulan sejak tanggal jatuh temponya sebagaimana jadwal pembayaran di atas,
                                        maka PT.
                                        CITRA
                                        ARGO TIRTA berhak membatalkan Perjanjian ini sesuai butir XI dibawah dan uang yang
                                        sudah
                                        dibayarkan oleh pemesan kepada PT. CITRA ARGO TIRTA akan dikembalikan dengan syarat
                                        pemesan
                                        mengembalikan kepada PT. CITRA ARGO TIRTA asli Surat Pemesanan ini dan seluruh asli
                                        kwitansi
                                        pembayaran terkait. Seluruh pengembalian tersebut tanpa</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 113%;text-align: justify;">
                                        diberikan
                                        bunga apapun juga, setelah dipotong biaya pembatalan sebagaimana yang diatur
                                        didalambutir X
                                        huruf d.</p>
                                </li>
                            </ol>
                        </li>
                        <li data-list-text="XI.">
                            <p style="padding-left: 41pt;text-indent: -29pt;text-align: justify;">Untuk pembatalan Surat
                                Pemesanan
                                ini,
                                maka Para Pihak dengan ini setuju dan sepakat untuk</p>
                            <p
                                style="padding-top: 2pt;padding-left: 41pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                                melepaskan ketentuan ketentuan Pasal 1265, 1266, 1267 Kitab Undang-Undang Hukum Perdata dan
                                pemesan
                                dengan ini memberikan kuasa sepenuhnya kepada PT. CITRA ARGO TIRTA dengan hak substitusi
                                untuk
                                menandatangani surat pembatalannya dan surat tersebut berlaku efektif dan sah dengan PT.
                                CITRA ARGO
                                TIRTA mengirim surat pembatalannya kepada pemesan, tanpa perlu melalui proses Pengadilan dan
                                berlaku
                                terhitung tanggal pengiriman surat pembatalan tersebut oleh PT.</p>
                            <p style="padding-left: 41pt;text-indent: 0pt;line-height: 114%;text-align: left;">CITRA ARGO
                                TIRTA yang
                                dibuktikan dengan tanda terima yang dikeluarkan oleh kantor pos/perusahaan jasa kurir/kurir.
                            </p>
                        </li>
                        <li data-list-text="XII.">
                            <p style="padding-left: 41pt;text-indent: -32pt;text-align: justify;">KETENTUAN PINDAH BLOK DAN
                                NOM0R
                                TANAH
                                BESERTA BANGUNAN</p>
                            <ol id="l8">
                                <li data-list-text="a.">
                                    <p
                                        style="padding-top: 1pt;padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Pemindahan Blok/Kavling oleh PT. CITRA ARGO TIRTA karena perubahan peruntukan blok
                                        atau
                                        karena
                                        sesuatu dan lain hal sesuai dengan ketentuan yang berlaku, tidak dikenakan biaya
                                        apapun dan
                                        untuk itu PT. CITRA ARGO TIRTA akan memberitahukan terlebih dahulu.</p>
                                </li>
                                <li data-list-text="b.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;text-align: left;">Pemindahan
                                        Blok/Kavling atas
                                        keinginan pemesan diperbolehkan dengan ketentuan :</p>
                                    <ol id="l9">
                                        <li data-list-text="i.">
                                            <p
                                                style="padding-top: 2pt;padding-left: 113pt;text-indent: -14pt;line-height: 114%;text-align: left;">
                                                Harus mengajukan surat permohonan pindah Blok/ Kavling dan disetujui oleh
                                                PT. CITRA
                                                ARGO
                                                TIRTA.</p>
                                        </li>
                                        <li data-list-text="ii.">
                                            <p
                                                style="padding-top: 4pt;padding-left: 113pt;text-indent: -16pt;line-height: 113%;text-align: left;">
                                                Dikenakan biaya adminstrasi sebesar 2 % (dua persen) dari harga jual sebelum
                                                PPN
                                                berdasarkan Surat Pemesanan ini.</p>
                                        </li>
                                        <li data-list-text="iii.">
                                            <p
                                                style="padding-left: 113pt;text-indent: -19pt;line-height: 114%;text-align: left;">
                                                Jumlah pembayaran yang telah dibayarkan untuk Blok sebelumnya, setelah
                                                dikurangi
                                                nilai
                                                PPN dan PPh atas jumlah pembayaran yang telah dilakukan pemesan kepada PT.
                                            </p>
                                            <p
                                                style="padding-left: 113pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                                CITRA
                                                ARGO TIRTA , akan diperhitungkan sebagai pembayaran Blok yang baru</p>
                                        </li>
                                        <li data-list-text="iv.">
                                            <p
                                                style="padding-top: 2pt;padding-left: 113pt;text-indent: -19pt;line-height: 114%;text-align: justify;">
                                                Pemesan bertanggung jawab atas segala kewajiban perpajakan yang mungkin
                                                timbul dari
                                                pindah Blok/Kavling tersebut;</p>
                                        </li>
                                        <li data-list-text="v.">
                                            <p
                                                style="padding-left: 113pt;text-indent: -16pt;line-height: 114%;text-align: justify;">
                                                Harga Tanah dan Bangunan/ Kavling yang lama diperhitungkan dari harga pada
                                                saat
                                                pemesanan, dan harga Tanah dan Bangunan/ Kavling yang baru diperhitungkan
                                                dari harga
                                                yang berlaku pada saat pindah Blok/Kavling.</p>
                                        </li>
                                        <li data-list-text="vi.">
                                            <p
                                                style="padding-left: 113pt;text-indent: -19pt;line-height: 114%;text-align: justify;">
                                                Menandatangani dan menyerahkan seluruh akta, perjanjian, surat, formulir,
                                                dan
                                                dokumen
                                                lainnya yang dipersyaratkan oleh PT. CITRA ARGO TIRTA;</p>
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                        </li>



                        <li data-list-text="XIII.">
                            <p style="padding-left: 41pt;text-indent: -34pt;text-align: left;">KETENTUAN PENGALIHAN HAK,
                                KEWAJIBAN
                                DAN
                                TANGGUNG JAWAB SERTA GANTI NAMA</p>
                            <ol id="l10">
                                <li data-list-text="a.">
                                    <p
                                        style="padding-top: 2pt;padding-left: 77pt;text-indent: -18pt;line-height: 113%;text-align: left;">
                                        Pemesan harus mengajukan permohonan secara tertulis dan bersama-sama dengan pembeli
                                        baru
                                        (PIHAK
                                        KETIGA) menghadap kepada PT. CITRA ARGO TIRTA.</p>
                                </li>
                                <li data-list-text="b.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Apabila
                                        pemesan mempergunakan fasilitas KPR dari Bank/Lembaga Keuangan/Pembiayaan, maka
                                        harus ada
                                        persetujuan secara tertulis dari Bank/Lembaga Keuangan/Pembiayaan</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                        tersebut.</p>
                                </li>
                                <li data-list-text="c.">
                                    <p
                                        style="padding-top: 2pt;padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Apabila pemesan mempergunakan fasilitas pembayaran melalui developer, maka wajib
                                        melunasi
                                        seluruh sisa kewajiban pembayaran Tanah dan Bangunan / Kavling.\</p>
                                </li>
                                <li data-list-text="d.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Pemesan
                                        wajib
                                        membayar biaya administrasi pengalihan hak sebesar 2.5% (dua koma lima persen) dari
                                        harga
                                        jual
                                        sebelum PPN berdasarkan Surat Pemesanan ini.</p>
                                </li>
                                <li data-list-text="e.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Pemesan
                                        wajib
                                        membayar biaya (PPh) final sebesar 2.5% (satu persen) dari Harga Tanah dan Bangunan
                                        berdasarkan
                                        perjanjian ini atau Nilai Jual Objek Pajak (NJOP) PBB Tahun berjalan, diperhitungkan
                                        nilai
                                        tertinggi.</p>
                                </li>
                                <li data-list-text="f.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Khusus
                                        untuk
                                        mengganti nama ke atas nama pihak keluarga, hanya terbatas pada hubungan: orang tua,
                                        istri/suami
                                        dengan harta campur, anak kandung yang dapat dibuktikan secara hukum dengan: akta
                                        kelahiran,
                                        akta nikah dan/atau kartu keluarga, dsbnya yang dianggap</p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 114%;text-align: justify;">
                                        cukup oleh
                                        PT. CITRA ARGO TIRTA, maka pemesan wajib membayar kepada PT. CITRA ARGO TIRTA biaya
                                        administrasi
                                        ganti nama sebesar Rp.250.000,- (dua ratus lima puluh ribu rupiah) per kejadian dan
                                        pergantian
                                        nama hanya berlaku untuk satu kali pergantian nama</p>
                                </li>
                                <li data-list-text="g.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Pemesan
                                        dan/
                                        atau PIHAK KETIGA tersebut, secara sendiri-sendiri maupun bersama-sama bertanggung
                                        jawab
                                        atas
                                        segala kewajiban perpajakan yang mungkin timbul dari pengalihan hak tersebut.</p>
                                </li>
                                <li data-list-text="h.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Semua
                                        ketentuan yang berlaku pada Surat Pemesanan ini tetap berlaku terhadap pemesan
                                        dan/atau
                                        PIHAK
                                        KETIGA tersebut;</p>
                                </li>
                                <li data-list-text="i.">
                                    <p style="padding-left: 76pt;text-indent: -17pt;line-height: 114%;text-align: left;">
                                        Menandatangani
                                        dan menyerahkan seluruh akta, perjanjian, surat, formulir, dan dokumen lainnya yang
                                        dipersyaratkan oleh PT. CITRA ARGO TIRTA</p>
                                </li>
                            </ol>
                        </li>
                        <li data-list-text="XIV.">
                            <p style="padding-left: 40pt;text-indent: -35pt;text-align: left;">FORCE MAJEURE</p>
                            <p
                                style="padding-top: 1pt;padding-left: 41pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                                Para
                                pihak setuju untuk mengadakan perubahan/penambahan atas Surat Pemesanan ini apabila di
                                kemudian hari
                                terjadi Force Majeure. Yang dimaksud dengan Force Majeure adalah hal-hal yang dapat
                                mempengaruhi
                                jalannya pelaksanaan pekerjaan PT. CITRA ARGO TIRTA antara lain: gempa bumi, banjir, bencana
                                alam
                                lainnya, huru-hara, perang, tindakan kekerasan oleh pihak lain baik</p>
                            <p
                                style="padding-top: 4pt;padding-left: 41pt;text-indent: 0pt;line-height: 113%;text-align: left;">
                                secara
                                perorangan atau massal, termasuk tindakan, kebijakan/peraturan Pemerintah termasuk di bidang
                                fiskal
                                atau
                                moneter, keadaan politik atau keadaan langka bahan bangunan yang</p>
                            <p style="padding-left: 41pt;text-indent: 0pt;text-align: left;">mempengaruhi kegiatan usaha di
                                bidang
                                properti dan turunannya.</p>
                        </li>
                        <li data-list-text="XV.">
                            <p style="padding-top: 8pt;padding-left: 41pt;text-indent: -32pt;text-align: left;">ARBITRASE
                            </p>
                            <ol id="l11">
                                <li data-list-text="a.">
                                    <p
                                        style="padding-top: 1pt;padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Jika timbul perselisihan dalam melaksanakan Surat Pemesanan ini, maka akan
                                        diselesaikan oleh
                                        para pihak secara musyawarah.</p>
                                </li>
                                <li data-list-text="b.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;text-align: left;">Apabila dalam jangka
                                        waktu 60
                                        (enam puluh) hari sejak sengketa atau beda pendapat tersebut, penyelesaian secara
                                        musyawarah
                                        tidak tercapai, maka para pihak sepakat untuk
                                        menyelesaikannya pada tingkat pertama dan terakhir dengan cara arbitrase melalui
                                        Badan
                                        Arbitrase
                                        Nasional Indonesia (BANI) di Jakarta, sesuai dengan Undang-Undang Republik
                                        nomor
                                        30 tahun 1999 tentang Arbitrase dan Alternatif Penyelesaian Sengketa, berikut
                                        perubahan dan
                                        penambahannya di kemudian hari.
                                    </p>
                                    <p
                                        style="padding-top: 1pt;padding-left: 77pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                                    </p>
                                    <p style="padding-left: 77pt;text-indent: 0pt;line-height: 114%;text-align: left;">
                                        Indonesia
                                    </p>
                                </li>
                                <li data-list-text="c.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Kesepakatan
                                        para pihak untuk menyelesaikan sengketa dengan cara arbitrase meniadakan hak para
                                        pihak
                                        untuk
                                        mengajukan penyelesaian sengketa ke Pengadilan Negeri.</p>
                                </li>
                                <li data-list-text="d.">
                                    <p style="padding-left: 77pt;text-indent: -18pt;line-height: 114%;text-align: left;">
                                        Para pihak
                                        setuju bahwa keputusan BANI adalah final dan mengikat para pihak, serta untuk
                                        pelaksanaan
                                        keputusan BANI dapat dimintakan fiat eksekusinya ke Pengadilan Negeri setempat.</p>
                                </li>
                            </ol>
                        </li>
                    </ol>

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
                                        @if ($dtpem->sisa_pr == 0 || $dtpem->sisa_pr <= 0)
                                        <span class="badge badge-secondary"><i class="fa fa-check" aria-hidden="true"></i></span>
                                        @endif
                                    </p>
                                </td>
                                <td
                                    style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                                    <a href="{{ route('pembayaranRumah.Admin',[$getProjek->nama_projek, Crypt::encrypt($dtpem->id_pem_rumah)]) }}" class="btn btn-info">
                                        <i class="bi bi-calendar2-check"></i> Pembayaran
                                    </a>
                                    <a href="{{ route('editPembayaranRumah.admin', [$getProjek->nama_projek , Crypt::encrypt($dtpem->id_pem_rumah)]) }}" class="btn btn-info">
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
                        Malang, <?= tgl_indo(date('Y-m-d', strtotime($getFormulirPesanan->tgl_input_getFormulirPesanan))) ?></php>
                    </p>
                    <table style="width: 100%">
                        <tr>
                            <td>
                                <p style="padding-top: 6pt;padding-left: 20pt;text-indent: 0pt;text-align: left;">Sales
                                    Executive
                                </p>
                                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                <p style="padding-left: 18pt;text-indent: 0pt;text-align: left;">{{ $getFormulirPesanan->nama_ua }}</p>
                            </td>
                            <td>
                                <p style="padding-top: 6pt;padding-left: 18pt;text-indent: 0pt;text-align: left;"></p>
                                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                <p style="padding-left: 19pt;text-indent: 0pt;text-align: left;"></p>
                            </td>
                            <td>
                                <p style="padding-top: 3pt;padding-left: 89pt;text-indent: 0pt;text-align: center;">Pemesan
                                </p>
                                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                <p style="padding-left: 89pt;text-indent: 0pt;text-align: center;">{{ $getFormulirPesanan->nama_plgn }}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p style="padding-top: 3pt;padding-left: 89pt;text-indent: 0pt;text-align: center;">
                                    Accounting
                                    Manager</p>
                                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                <p style="padding-left: 89pt;text-indent: 0pt;text-align: center;">Andreas WL</p>
                            </td>
                            <td>
                                <p style="padding-top: 2pt;padding-left: 89pt;text-indent: 0pt;text-align: center;">CEO</p>
                                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                                <p style="padding-left: 89pt;text-indent: 0pt;text-align: center;">Gilbert Setiawan</p>

                            </td>
                            <td>

                                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                            </td>
                        </tr>

                    </table>
                    <center>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </center>

                    <br>
                    <br><br>

                    <table style="width: 100%">
                        <tr>
                            <td style="width: 70%;">Paraf : </td>
                            <td style="width: 30%;">
                                <b style="color: #8ACCA1;">PT. CITRA ARGO TIRTA</b>
                                <br>
                                <p style="font-size: 9px">
                                    Jl. Raya Candi VI C Blk. A No.1 <br>
                                    Telp. 0341 588 805 (Hunting) | WA 0813 5000 7337 <br>
                                    www.greenlandtidar.net
                                </p>
                            </td>
                        </tr>

                    </table>
                </form>
                </div>
            </div>
        </div>


    </body>


@endsection

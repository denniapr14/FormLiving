<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="id" lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>file_1684931891408</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.2/font/bootstrap-icons.min.css"
        integrity="sha512-YzwGgFdO1NQw1CZkPoGyRkEnUTxPSbGWXvGiXrWk8IeSqdyci0dEDYdLLjMxq1zCoU0QBa4kHAFiRhUL3z2bow=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="author" content="Andreas Wibisono Lugito" />
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



        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>


    <div class="container">

        <center>
           <table class="table table-borderless no-space" style="width: 100%">
                <tr>
                    <td style="width: 70%"><img style="" src="{{ asset('Dashboard') }}/images/content/logo-forms-living1.png" alt=""></td>
                    <td><img style="float: right;" class="float-right"

                        @if($fp->id_projek == 1)

                        src="{{ asset('Home') }}/images/logotidargreen.png"

                        @else

                        src="{{ asset('Home') }}/images/logo-kalm.png" style="width: 100%;"

                        @endif

                        alt="">
                    </td>
                </tr>
            </table>
            <br>
            <h4> SURAT PEMESANAN RUMAH </h4>
            <p>Nomor : {{$fp->no_fp}} </p>
        </center>
        <p>Yang bertanda tangan dibawah ini :</p>
        <table>
            <tr>
                <td style="width:40%;">Nama</td>
                <td>: {{ $fp->nama_plgn }} </td>
            </tr>
            <tr>
                <td style="width:40%;">Alamat</td>
                <td>: {{ $fp->alamat_plgn }}</td>
            </tr>
            <tr>
                <td style="width:40%;">No. Telepon</td>
                <td>: {{ $fp->no_telp_plgn }}</td>
            </tr>
            <tr>
                <td style="width:40%;">Email</td>
                <td>: {{ $fp->email_plgn }}</td>
            </tr>
            <tr>
                <td style="width:40%;">
                    Tempat & Tanggal. Lahir
                </td>
                <td>
                    : {{ $fp->tempat_lahir_plgn }},  <?= tgl_indo(date('Y-m-d', strtotime($fp->tgl_lahir_plgn)))?>
                </td>
            </tr>
            <tr>
                <td style="width:40%;">Sumber Dana</td>
                <td>: {{$fp->sumber_dana_plgn}}</td>
            </tr>
            <tr>
                <td style="width:40%;">Tujuan transaksi</td>
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
                    Tipe Unit : {{ $fp->jenis_tr }}</p>
            </li>
            <li data-list-text="2.">
                <p style="padding-top: 2pt;padding-left: 41pt;text-indent: -18pt;text-align: left;">
                    Cluster – Blok : {{ $fp->nama_cluster }} - {{ $fp->blok }} / {{ $fp->nomor }}
                </p>
            </li>
            <li data-list-text="3.">
                <p style="padding-top: 2pt;padding-left: 41pt;text-indent: -18pt;text-align: left;">
                    Luas Tanah : {{ $fp->luas_tanah }} m2
                </p>
            </li>
            <li data-list-text="4.">
                <p style="padding-top: 1pt;padding-left: 41pt;text-indent: -18pt;text-align: left;">
                    Luas Bangunan : {{ $fp->luas_bangunan_kkpr }} m2
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
                                {{ rupiah($fp->harga_tr )}},-</p>
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
                              0,-</p>
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
                                {{ rupiah($fp->total_harga/1.11 )}},-</p>
                        </td>
                    </tr>
                    <tr style="height:18pt">
                        <td style="width:215pt">
                            <p class="s2"
                                style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                d. PPN (Pajak Pertambahan Nilai)</p>
                        </td>
                        <td style="width:18pt">
                            <p class="s2"
                                style="padding-left: 3pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                Rp.
                            </p>
                        </td>
                        <td style="width:86pt">
                            <p class="s2"
                                style="padding-right: 5pt;text-indent: 0pt;line-height: 13pt;text-align: right;">
                                {{ rupiah((11/100)*(($fp->total_harga)/1.11) )}},-</p>
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
                                {{ rupiah($fp->total_harga) }},-</p>
                        </td>
                    </tr>
                </table>


                @else

                {{--  {{--  @if ($promo->bphtb_promo == "yes")
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
                                {{ rupiah($fp->harga_tr )}},-</p>
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
                                {{ rupiah($promo->diskon_promo)}},-</p>
                        </td>
                    </tr>
                    <tr style="height:14pt">
                        <td style="width:215pt">
                            <p class="s2"
                                style="padding-left: 2pt;text-indent: 0pt;line-height: 11pt;text-align: left;">
                                c. Harga
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
                                {{ rupiah(($fp->total_harga+3000000)/1.16 )}},-</p>
                        </td>
                    </tr>
                    <tr style="height:14pt">
                        <td style="width:215pt">
                            <p class="s2"
                                style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                d. PPN (Pajak Pertambahan Nilai)</p>
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
                                {{ rupiah((11/100)*(($fp->total_harga+3000000)/1.16) )}},-</p>
                        </td>
                    </tr>
                    <tr style="height:14pt">
                        <td style="width:215pt">
                            <p class="s2" style="padding-left: 2pt;text-indent: 0pt;text-align: left;">
                                e.
                                BPHTB</p>
                        </td>
                        <td style="width:29pt">
                            <p class="s2" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">Rp.</p>
                        </td>
                        <td style="width:86pt">
                            <p class="s2" style="padding-right: 6pt;text-indent: 0pt;text-align: right;">
                               {{ rupiah(((($fp->total_harga+3000000)/1.16) *(5/100)) - 3000000)}},-
                            </p>
                        </td>
                    </tr>
                    <tr style="height:14pt">
                        <td style="width:215pt">
                            <p class="s2" style="padding-left: 2pt;text-indent: 0pt;text-align: left;">
                                f. Biaya Surat
                                (BBN dan AJB) PPAT</p>
                        </td>
                        <td style="width:29pt">
                            <p class="s2" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">Rp.</p>
                        </td>
                        <td style="width:86pt">
                            <p class="s2" style="padding-right: 5pt;text-indent: 0pt;text-align: right;">0,-
                            </p>
                        </td>
                    </tr>
                    <tr style="height:14pt">
                        <td style="width:215pt">
                            <p class="s2"
                                style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                                g.
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
                                {{ rupiah($fp->total_harga) }},-</p>
                        </td>
                    </tr>
                </table>  --}}
                {{--  @elseif ($promo->bphtb_promo == "no")  --}}
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
                                {{ rupiah($fp->harga_tr )}},-</p>
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
                                {{ rupiah($promo->diskon_promo)}},-</p>
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
                                {{ rupiah($fp->total_harga/1.11 )}},-</p>
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
                                {{ rupiah((11/100)*(($fp->total_harga)/1.11) )}},-</p>
                        </td>
                    </tr>
                    {{--  <tr style="height:16pt">
                        <td style="width:215pt">
                            <p class="s2" style="padding-left: 2pt;text-indent: 0pt;text-align: left;">c.
                                BPHTB</p>
                        </td>
                        <td style="width:29pt">
                            <p class="s2" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">Rp.</p>
                        </td>
                        <td style="width:86pt">
                            <p class="s2" style="padding-right: 6pt;text-indent: 0pt;text-align: right;">
                                0,-
                            </p>
                        </td>
                    </tr>
                    <tr style="height:16pt">
                        <td style="width:215pt">
                            <p class="s2" style="padding-left: 2pt;text-indent: 0pt;text-align: left;">d.
                                Biaya Surat
                                (BBN dan AJB) PPAT</p>
                        </td>
                        <td style="width:29pt">
                            <p class="s2" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">Rp.</p>
                        </td>
                        <td style="width:86pt">
                            <p class="s2" style="padding-right: 5pt;text-indent: 0pt;text-align: right;">0,-
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
                    </tr>  --}}
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
                                {{ rupiah($fp->total_harga) }},-</p>
                        </td>
                    </tr>
                </table>
                {{--  @endif  --}}


                @endif


            </li>
            {{--  <li data-list-text="6.">
                <p class="s3" style="padding-top: 1pt;padding-left: 40pt;text-indent: -17pt;text-align: left;">
                    Untuk
                    penyerahan bangunan tanggal :</p>
            </li>  --}}
        </ol>
        <div class="page-break"></div>

        <p style="margin-bottom:0pt; text-align:justify; line-height:115%">Dengan
            ini
            menyatakan telah memesan kepada PT. CITRA ARGO TIRTA, berkedudukan di Kota Malang, selanjutnya disebut
            Developer/Penjual, untuk pembelian Objek yang berlokasi di Perumahan GREENLAND AT TIDAR, Malang, sebagai
            berikut
            :</p>

            <p style="margin-bottom:0pt; text-align:justify; line-height:115%"><span>Untuk pemesanan tersebut diatas, maka
                dengan ini pemesan menyetujui syarat dan ketentuan pembelian sebagai berikut :</span></p>
            <ol start="1" type="I" style="margin:0pt; padding-left:0pt">
              <li class="ListParagraph"
                style="margin-left:26.3pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:9.7pt">
                <span>Menandatangani Perjanjian Pengikatan Jual Beli (PPJB) Tanah dan Bangunan/Kavling dalam waktu 14 (empat
                  belas) hari sejak tanggal Surat Pemesanan ini. Apabila setelah lewatnya jangka waktu tersebut, maka PT. CITRA
                  ARGO TIRTA berhak membatalkan Surat Pemesanan ini sesuai butir XI di bawah, maka seluruh pembayaran yang telah
                  dilakukan pemesan tidak dapat dituntut kembali atau ditarik dari PT. CITRA ARGO TIRTA. </span></li>
              <li class="ListParagraph"
                style="margin-left:26.3pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:9.7pt">
                <span>Untuk melaksanakan penandatangan Akta Jual Beli (AJB) di hadapan Pejabat Pembuat Akta Tanah (PPAT) yang
                  ditunjuk oleh PT. CITRA ARGO TIRTA, pemesan wajib terlebih dahulu membayar seluruh bea/pajak dan biaya yang
                  belum termasuk dalam Harga Tanah &amp; Bangunan.</span></li>
              <li class="ListParagraph"
                style="margin-left:26.3pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:9.7pt">
                <span>Sebelum dilaksanakannya AJB di hadapan PPAT (untuk selanjutnya akan disebut AJB PPAT), apabila terjadi
                  antara lain:</span>
                <ol type="a" style="margin-right:0pt; margin-left:0pt; padding-left:0pt">
                  <li class="ListParagraph"
                    style="margin-left:31.05pt; margin-bottom:0pt; line-height:115%; padding-left:4.95pt"><span>Kenaikan tarif
                      dan/atau pengenaan baru berdasarkan suatu perubahan atau peraturan baru yang dikeluarkan/diberlakukan oleh
                      Pemerintah atas suatu pajak/bea dan biaya seperti namun tidak terbatas pada Pajak Pertambahan Nilai (PPN),
                      Bea Perolehan Hak atas Tanah dan Bangunan (BPHTB); atau</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.56pt; margin-bottom:0pt; line-height:115%; padding-left:4.44pt"><span>Kenaikan tarif
                      Nilai Jual Objek Pajak (NJOP) dimana Pajak Penghasilan (PPh) yang menjadi kewajiban PT. CITRA ARGO TIRTA
                      menjadi lebih besar dari PPh yang telah dibayarkan oleh PT. CITRA ARGO TIRTA berdasarkan Harga Tanah dan
                      Bangunan/Kavling dalam Surat Pemesanan ini, sejauh hal tersebut tidak disebabkan oleh PT. CITRA ARGO
                      TIRTA, maka seluruhnya wajib ditanggung dan dibayar sepenuhnya oleh pemesan sebelum penandatanganan AJB
                      PPAT.</span></li>
                </ol>
              </li>
              <li class="ListParagraph"
                style="margin-left:23pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt"><span>Dalam
                  hal pemesan belum membayar seluruh pajak/bea dan biaya sebagaimana butir III sebelum dilaksanakannya
                  penandatanganan AJB PPAT, maka PT. CITRA ARGO TIRTA tidak wajib melaksanakan penandatanganan AJB PPAT, dan
                  segala risiko serta akibatnya menjadi tanggungan pemesan sepenuhnya.</span></li>
              <li class="ListParagraph"
                style="margin-left:23pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>Apabila pemesan lalai dalam hal kurang atau terlambat melakukan suatu pembayaran berdasarkan Surat
                  Pemesanan ini, maka pemesan dikenakan dan wajib membayar membayar kepada PT. CITRA ARGO TIRTA denda sebesar
                  1‰</span><span style="-aw-import:spaces">&#xa0; </span><span>(satu permil) setiap hari keterlambatan dari
                  jumlah terhutang sejak tanggal seharusnya dibayar sampai dilunasi seluruhnya dan maksimal 1% dari harga
                  pembelian rumah.</span></li>
              <li class="ListParagraph"
                style="margin-left:23pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>Selain yang telah diatur dalam butir V di atas, apabila pemesan lalai dalam hal kurang atau terlambat
                  melakukan suatu pembayaran baik uang muka (DP) maupun angsuran yang berlangsung hingga 3 (tiga) bulan
                  berturut-turut terhitung sejak tanggal permulaan kelalaian terjadi, maka PT. CITRA ARGO TIRTA dapat
                  membatalkan Surat Pemesanan ini sesuai butir XI di bawah, dan seluruh pembayaran yang telah dilakukan pemesan
                  tidak dapat dituntut kembali atau ditarik dari PT. CITRA ARGO TIRTA.</span></li>
              <li class="ListParagraph"
                style="margin-left:23pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt"><span>Untuk
                  setiap pembayaran, apabila ternyata cek/giro atau pengiriman/transfer yang ditolak oleh Bank, maka pemesan
                  dikenakan dan wajib membayar kepada PT. CITRA ARGO TIRTA biaya administrasi sebesar Rp. 100.000,- (seratus
                  ribu rupiah) per setiap kejadian dan berlaku pula ketentuan butir IX dan butir X. </span></li>
              <li class="ListParagraph"
                style="margin-left:23pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>Pembayaran kepada PT. CITRA ARGO TIRTA dibedakan menjadi 2 yakni : </span>
                <ol type="a" style="margin-right:0pt; margin-left:0pt; padding-left:0pt">
                  <li class="ListParagraph"
                    style="margin-left:31.05pt; margin-bottom:0pt; line-height:115%; padding-left:4.95pt"><span>Secara Cash atau
                      Cash Bertahap (inhouse) dapat melalui transfer ke rekening</span><br /><span>BANK CENTRAL ASIA</span></li>
                </ol>
              </li>
            </ol>
            <p class="ListParagraph" style="margin-left:72pt; margin-bottom:0pt; text-align:justify; line-height:115%">
              <span>Cabang Galunggung, Malang</span></p>
            <p class="ListParagraph" style="margin-left:72pt; margin-bottom:0pt; text-align:justify; line-height:115%">
              <span>Atas Nama : PT. CITRA ARGO TIRTA</span></p>
            <p class="ListParagraph" style="margin-left:72pt; margin-bottom:0pt; text-align:justify; line-height:115%">
              <span>Nomor Rekening : 4403014446 </span></p>
            <ol start="2" type="a" style="margin:0pt; padding-left:0pt">
              <li class="ListParagraph"
                style="margin-left:67.56pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:4.44pt">
                <span>Secara KPR wajib dilakukan oleh pemesan dengan menggunakan debet card/transfer/virtual
                  account/pemindahbukuan/giro/cek dari rekening atas nama pemesan sendiri (Jika rekening atas nama
                  suami/istri/anak harus dibuktikan dengan dokumen legalitas yang berupa Kartu Keluarga, Akta Nikah, Akta Lahir
                  Anak), dengan mencantumkan nama pemesan, Nomor Blok/Kavling, pembayaran ditujukan ke :</span></li>
            </ol>
            <p class="ListParagraph" style="margin-left:72pt; margin-bottom:0pt; text-align:justify; line-height:115%">
              <span>BANK CENTRAL ASIA</span></p>
            <p class="ListParagraph" style="margin-left:72pt; margin-bottom:0pt; text-align:justify; line-height:115%">
              <span>Cabang Galunggung, Malang</span></p>
            <p class="ListParagraph" style="margin-left:72pt; margin-bottom:0pt; text-align:justify; line-height:115%">
              <span>Atas Nama : PT. CITRA ARGO TIRTA</span></p>
            <p class="ListParagraph" style="margin-left:72pt; margin-bottom:0pt; text-align:justify; line-height:115%">
              <span>Nomor Rekening : 4403014446 </span><span style="-aw-import:spaces">&#xa0;</span></p>
            <ol start="9" type="I" style="margin:0pt; padding-left:0pt">
              <li class="ListParagraph"
                style="margin-left:23pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>PENGURUSAN FASILITAS KREDIT MELALUI BANK/LEMBAGA KEUANGAN/PEMBIAYAAN</span>
                <ol type="a" style="margin-right:0pt; margin-left:0pt; padding-left:0pt">
                  <li class="ListParagraph"
                    style="margin-left:31.05pt; margin-bottom:0pt; line-height:115%; padding-left:4.95pt"><span>Pemesan wajib
                      melengkapi data-data yang diperlukan oleh Bank/Lembaga Keuangan/Pembiayaan selambat-lambatnya : 14 (empat
                      belas) Hari setelah tanda jadi (booking fee) yang meliputi : KTP suami istri, KK, NPWP dan surat nikah
                      sedangkan data kelengkapan lainnya bisa mulai dikumpulkan setelah pembayaran Uang Muka Kedua.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.56pt; margin-bottom:0pt; line-height:115%; padding-left:4.44pt"><span>Permohonan
                      fasilitas kredit akan diajukan maksimal ke 2 Bank yang memiliki kerjasama dengan Pihak Developer.</span>
                  </li>
                  <li class="ListParagraph"
                    style="margin-left:30.43pt; margin-bottom:0pt; line-height:115%; padding-left:5.57pt"><span>Program promo
                      khusus hanya berlaku untuk bank yang sudah bekerjasama dengan Pihak Developer dan tidak berlaku di bank
                      lain.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.56pt; margin-bottom:0pt; line-height:115%; padding-left:4.44pt"><span>Apabila pemesan
                      tidak memenuhi undangan untuk wawancara, dan/atau apabila pemesan sudah mendapatkan persetujuan kredit
                      dari Bank/Lembaga Keuangan/Pembiayaan namun belum melakukan akad kredit dengan Bank/Lembaga
                      Keuangan/Pembiayaan dihadapan Notaris, dan PT. CITRA ARGO TIRTA, telah melakukan pemberitahuan sebanyak 3
                      (tiga) kali, baik lisan maupun tertulis, maka pemesan telah lalai dan PT. CITRA ARGO TIRTA berhak
                      membatalkan Surat Pemesanan ini sesuai butir XI di bawah.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.25pt; margin-bottom:0pt; line-height:115%; padding-left:4.75pt"><span>Apabila setelah
                      persetujuan kredit dari Bank/Lembaga Keuangan/Pembiayaan kepada pemesan telah diberikan, ternyata pemesan
                      harus menambah/membayar Uang Muka, maka pemesan wajib melunasi penambahan Uang Muka dimaksud
                      selambat-lambatnya 14 (empat belas) hari setelah tanggal surat persetujuan fasilitas kredit dari
                      Bank/Lembaga Keuangan/Pembiayaan tersebut. Apabila lewat dari dalam jangka waktu tersebut, maka PT. CITRA
                      ARGO TIRTA berhak untuk : </span>
                    <ol type="i" style="margin-right:0pt; margin-left:0pt; padding-left:0pt">
                      <li class="ListParagraph" style="margin-left:32pt; margin-bottom:0pt; line-height:115%; padding-left:4pt">
                        <span>Memberikan waktu kepada pemesan untuk mengangsur Uang Muka yang harus ditambahkan dengan
                          memperhitungkan biaya tambahan akibat mundurnya pelaksanaan akad kredit,atau </span></li>
                      <li class="ListParagraph" style="margin-left:32pt; margin-bottom:0pt; line-height:115%; padding-left:4pt">
                        <span>Membatalkan Surat Pemesanan ini sesuai butir XI dibawah.</span></li>
                    </ol>
                  </li>
                  <li class="ListParagraph"
                    style="margin-left:29.13pt; margin-bottom:0pt; line-height:115%; padding-left:6.87pt"><span>Apabila
                      permohonan fasilitas kredit pemesan ditolak oleh 2 (dua)Bank/Lembaga Keuangan/Pembiayaan yang dituju, yang
                      dibuktikan dengan surat penolakan dari Bank/Lembaga Keuangan/Pembiayaan dimaksud, maka PT. CITRA ARGO
                      TIRTA berhak membatalkan Surat Pemesanan ini sesuai butir XI di bawah, dan uang yang sudah dibayarkan oleh
                      pemesan kepada PT. CITRA ARGO TIRTA akan dikembalikan dengan syarat pemesan wajib mengembalikan kepada PT.
                      CITRA ARGO TIRTA Asli Surat Pemesanan ini dan seluruh Asli kwitansi pembayaran terkait. Seluruh
                      pengembalian tersebut adalah tanpa diberikan bunga apapun juga, setelah dipotong dengan rincian sebagai
                      berikut :</span></li>
                </ol>
              </li>
            </ol>
            <ol type="A" style="margin:0pt; padding-left:0pt">
              <li class="ListParagraph"
                style="margin-left:104.14pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:3.86pt">
                <span>Rumah Indent dengan pembiayaan fasilitas KPR Bank dan Rumah Ready stock dengan skema pembayaran inhouse
                  :</span></li>
            </ol>
            <ol type="i" style="margin:0pt; padding-left:0pt">
              <li class="ListParagraph"
                style="margin-left:131pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>Tanda jadi (booking fee) dan pajak - pajak yang sudah disetor ke negara.</span></li>
              <li class="ListParagraph"
                style="margin-left:131pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt"><span>15%
                  (lima belas persen) dari harga pembelian rumah.</span></li>
            </ol>
            <p class="ListParagraph" style="margin-left:108pt; margin-bottom:0pt; text-align:justify; line-height:115%"><span
                style="-aw-import:ignore">&#xa0;</span></p>
            <ol start="2" type="A" style="margin:0pt; padding-left:0pt">
              <li class="ListParagraph"
                style="margin-left:103.76pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:4.24pt">
                <span>Rumah Ready Stock dengan pembiayaan fasilitas KPR Bank :</span></li>
            </ol>
            <ol type="i" style="margin:0pt; padding-left:0pt">
              <li class="ListParagraph"
                style="margin-left:131pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>Tanda jadi (booking fee) dan pajak - pajak yang sudah disetor ke negara.</span></li>
              <li class="ListParagraph"
                style="margin-left:131pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt"><span>30%
                  (tiga puluh persen) dari seluruh uang yang sudah dibayarkan oleh pemesan atau 3% (tiga persen) dari harga jual
                  rumah, mana yang lebih tinggi.</span></li>
            </ol>
            <p style="margin-left:72pt; margin-bottom:0pt; text-align:justify; line-height:115%"><span>Sehubungan dengan
                pengembalian uang kepada Pembeli akan dilakukan setelah PT. CITRA ARGO TIRTA berhasil menjual rumah tersebut
                kepada Pihak ketiga yang mana pengembalian uang tersebut dilakukan secara bertahap setelah dipotong sesuai
                dengan ketentuan diatas. Adapun termin pengembaliannya adalah sebagai berikut :</span></p>
            <ol type="i" style="margin:0pt; padding-left:0pt">
              <li class="ListParagraph"
                style="margin-left:100.4pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>Tahap I</span><span style="-aw-import:spaces">&#xa0;&#xa0; </span><span>: 20% dari nominal di atas pada
                  bulan pertama.</span></li>
              <li class="ListParagraph"
                style="margin-left:100.4pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>Tahap II</span><span style="-aw-import:spaces">&#xa0; </span><span>: 30% dari nominal di atas pada bulan
                  kedua.</span></li>
              <li class="ListParagraph"
                style="margin-left:100.4pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>Tahap III : 50% dari nominal di atas pada bulan ketiga. </span></li>
            </ol>
            <ol start="10" type="I" style="margin:0pt; padding-left:0pt">
              <li class="ListParagraph"
                style="margin-left:23pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt"><span>Untuk
                  pembatalan Surat Pemesanan ini, maka Para Pihak dengan ini setuju dan sepakat untuk melepaskan ketentuan
                  ketentuan Pasal 1265, 1266, 1267 Kitab Undang-Undang Hukum Perdata. </span></li>
            </ol>
            <p class="ListParagraph" style="margin-bottom:0pt; text-align:justify; line-height:115%"><span
                style="-aw-import:ignore">&#xa0;</span></p>
            <ol start="11" type="I" style="margin:0pt; padding-left:0pt">
              <li class="ListParagraph"
                style="margin-left:23pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>KETENTUAN PINDAH BLOK DAN NOM0R TANAH BESERTA BANGUNAN </span>
                <ol type="a" style="margin-right:0pt; margin-left:0pt; padding-left:0pt">
                  <li class="ListParagraph"
                    style="margin-left:31.05pt; margin-bottom:0pt; line-height:115%; padding-left:4.95pt"><span>Pemindahan
                      Blok/Kavling oleh PT. CITRA ARGO TIRTA karena perubahan peruntukan blok atau karena sesuatu dan lain hal
                      sesuai dengan ketentuan yang berlaku, tidak dikenakan biaya apapun dan untuk itu PT. CITRA ARGO TIRTA akan
                      memberitahukan terlebih dahulu.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.56pt; margin-bottom:0pt; line-height:115%; padding-left:4.44pt"><span>Pemindahan
                      Blok/Kavling atas keinginan pemesan diperbolehkan dengan ketentuan :</span>
                    <ol type="i" style="margin-right:0pt; margin-left:0pt; padding-left:0pt">
                      <li class="ListParagraph" style="margin-left:32pt; margin-bottom:0pt; line-height:115%; padding-left:4pt">
                        <span>Harus mengajukan surat permohonan pindah Blok/ Kavling dan disetujui oleh PT. CITRA ARGO TIRTA.
                        </span></li>
                      <li class="ListParagraph" style="margin-left:32pt; margin-bottom:0pt; line-height:115%; padding-left:4pt">
                        <span>Jumlah pembayaran yang telah dibayarkan untuk Blok sebelumnya, setelah dikurangi nilai PPN dan PPh
                          atas jumlah pembayaran yang telah dilakukan pemesan kepada PT. CITRA ARGO TIRTA , akan diperhitungkan
                          sebagai pembayaran Blok yang baru</span></li>
                      <li class="ListParagraph" style="margin-left:32pt; margin-bottom:0pt; line-height:115%; padding-left:4pt">
                        <span>Pemesan bertanggung jawab atas segala kewajiban perpajakan yang mungkin timbul dari pindah
                          Blok/Kavling tersebut;</span></li>
                      <li class="ListParagraph" style="margin-left:32pt; margin-bottom:0pt; line-height:115%; padding-left:4pt">
                        <span>Harga Tanah dan Bangunan/ Kavling yang lama diperhitungkan dari harga pada saat pemesanan, dan
                          harga Tanah dan Bangunan/ Kavling yang baru diperhitungkan dari harga yang berlaku pada saat pindah
                          Blok/Kavling.</span></li>
                      <li class="ListParagraph" style="margin-left:32pt; margin-bottom:0pt; line-height:115%; padding-left:4pt">
                        <span>Menandatangani dan menyerahkan seluruh akta, perjanjian, surat, formulir, dan dokumen lainnya yang
                          dipersyaratkan oleh PT. CITRA ARGO TIRTA; </span></li>
                    </ol>
                  </li>
                </ol>
              </li>
              <li class="ListParagraph"
                style="margin-left:23pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>KETENTUAN PENGALIHAN HAK, KEWAJIBAN DAN TANGGUNG JAWAB SERTA GANTI NAMA</span>
                <ol type="a" style="margin-right:0pt; margin-left:0pt; padding-left:0pt">
                  <li class="ListParagraph"
                    style="margin-left:31.05pt; margin-bottom:0pt; line-height:115%; padding-left:4.95pt"><span>Pemesan harus
                      mengajukan permohonan secara tertulis dan bersama-sama dengan pembeli baru (PIHAK KETIGA) menghadap kepada
                      PT. CITRA ARGO TIRTA.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.56pt; margin-bottom:0pt; line-height:115%; padding-left:4.44pt"><span>Apabila pemesan
                      mempergunakan fasilitas KPR dari Bank/Lembaga Keuangan/Pembiayaan, maka harus ada persetujuan secara
                      tertulis dari Bank/Lembaga Keuangan/Pembiayaan tersebut. </span></li>
                  <li class="ListParagraph"
                    style="margin-left:30.43pt; margin-bottom:0pt; line-height:115%; padding-left:5.57pt"><span>Apabila pemesan
                      mempergunakan fasilitas pembayaran melalui developer, maka wajib melunasi seluruh sisa kewajiban
                      pembayaran Tanah dan Bangunan / Kavling.\</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.56pt; margin-bottom:0pt; line-height:115%; padding-left:4.44pt"><span>Pemesan wajib
                      membayar biaya administrasi pengalihan hak sebesar 5% (lima persen) dari harga jual sebelum PPN
                      berdasarkan Surat Pemesanan ini.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.25pt; margin-bottom:0pt; line-height:115%; padding-left:4.75pt"><span>Khusus untuk
                      mengganti nama ke atas nama pihak keluarga, hanya terbatas pada hubungan: orang tua, istri/suami dengan
                      harta campur, anak kandung yang dapat dibuktikan secara hukum dengan: akta kelahiran, akta nikah dan/atau
                      kartu keluarga, dsbnya yang dianggap cukup oleh PT. CITRA ARGO TIRTA.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:29.13pt; margin-bottom:0pt; line-height:115%; padding-left:6.87pt"><span>Pemesan dan/
                      atau PIHAK KETIGA tersebut, secara sendiri-sendiri maupun bersama-sama bertanggung jawab atas segala
                      kewajiban perpajakan yang mungkin timbul dari pengalihan hak tersebut.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:30.95pt; margin-bottom:0pt; line-height:115%; padding-left:5.05pt"><span>Semua ketentuan
                      yang berlaku pada Surat Pemesanan ini tetap berlaku terhadap pemesan dan/atau PIHAK KETIGA tersebut;
                    </span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.41pt; margin-bottom:0pt; line-height:115%; padding-left:4.29pt"><span>Menandatangani
                      dan menyerahkan seluruh akta, perjanjian, surat, formulir, dan dokumen lainnya yang dipersyaratkan oleh
                      PT. CITRA ARGO TIRTA</span></li>
                </ol>
              </li>
              <li class="ListParagraph"
                style="margin-left:23pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>KETENTUAN SELAMA PEMBANGUNAN</span>
                <ol type="a" style="margin-right:0pt; margin-left:0pt; padding-left:0pt">
                  <li class="ListParagraph"
                    style="margin-left:31.05pt; margin-bottom:0pt; line-height:115%; padding-left:4.95pt"><span>Pelaksanaan
                      pembangunan didasarkan pada spesifikasi teknik dan gambar rumah yang telah dikeluarkan oleh PT. CITRA ARGO
                      TIRTA.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.56pt; margin-bottom:0pt; line-height:115%; padding-left:4.44pt"><span>Adanya pekerjaan
                      tambahan atau perubahan spesifikasi teknik dan gambar harap diinformasikan di awal pemesanan.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:30.43pt; margin-bottom:0pt; line-height:115%; padding-left:5.57pt"><span>Selama masa
                      pembangunan, Pembeli tidak diperkenankan untuk melakukan pekerjaan tambahan atau perubahan spesifikasi
                      teknik dan gambar tanpa persetujuan dari PT. CITRA ARGO TIRTA. Segala resiko dan akibat yang timbul
                      sehubungan dengan perubahan tersebut menjadi tanggung jawab pihak pembeli sepenuhnya.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.56pt; margin-bottom:0pt; line-height:115%; padding-left:4.44pt"><span>Pengajuan order
                      pembangunan akan dilakukan setelah Pembeli menyelesaikan pembayaran 50% dari harga jual untuk pembayaran
                      secara inhouse dan sudah Realisasi dengan pihak Bank/Lembaga Keuangan/ Pembiayaan. Penyelesaian bangunan
                      akan dilaksanakan oleh PT. CITRA ARGO TIRTA selambat-lambatnya 8 bulan untuk tipe di bawah 70 dengan grace
                      period selama 4 bulan, sedangkan untuk tipe diatas 70 akan disepakati oleh kedua belah pihak.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.25pt; margin-bottom:0pt; line-height:115%; padding-left:4.75pt"><span>Apabila ada
                      keterlambatan penyelesaian pembangunan rumah, maka Pihak Developer akan dikenakan penalty sebesar
                      1‰</span><span style="-aw-import:spaces">&#xa0; </span><span>(satu permil) setiap hari keterlambatan dari
                      prosentase kekurangan progress pembangunan rumah dikalikan harga jual bangunan rumah maksimal sebesar 1%
                      dari harga pembelian rumah</span></li>
                </ol>
              </li>
              <li class="ListParagraph"
                style="margin-left:23pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>PRIHAL SERAH TERIMA RUMAH</span>
                <ol type="a" style="margin-right:0pt; margin-left:0pt; padding-left:0pt">
                  <li class="ListParagraph"
                    style="margin-left:31.05pt; margin-bottom:0pt; line-height:115%; padding-left:4.95pt"><span>Serah Terima
                      Rumah akan dilaksanakan setelah Pembeli membayar lunas seluruh harga Tanah dan Bangunan dan pembangunan
                      telah selesai 100%.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.56pt; margin-bottom:0pt; line-height:115%; padding-left:4.44pt"><span>Serah Terima
                      Sepihak akan dilaksanakan jika pembeli tidak dapat melakukan serah terima kavling dalam waktu yang telah
                      ditentukan oleh PT. CITRA ARGO TIRTA.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:30.43pt; margin-bottom:0pt; line-height:115%; padding-left:5.57pt"><span>Pembeli berjanji
                      serta mengikatkan diri untuk tetap menggunakan tanah dan bangunan sebagai rumah tinggal, di kemudian hari
                      apabila ada pengerjaan renovasi pembeli wajib melakukan konfirmasi kepada PT. CITRA ARGO TIRTA. Segala
                      resiko dan akibat yang timbul sehubungan dengan pengerjaan renovasi tersebut menjadi tanggung jawab pihak
                      pembeli sepenuhnya.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.56pt; margin-bottom:0pt; line-height:115%; padding-left:4.44pt"><span>Biaya
                      Pemeliharaan dan Perbaikan Lingkungan serta penggunaan air bersih dimulai sejak tanggal ditandatanganinya
                      BAST (Berita Acara Serah Terima) yang besarnya ditentukan oleh PT. CITRA ARGO TIRTA.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.25pt; margin-bottom:0pt; line-height:115%; padding-left:4.75pt"><span>Pihak Developer
                      akan berupaya semaksimal mungkin untuk menyediakan Fasilitas Utilitas (Listrik dan Air Bersih) serta
                      Sertipikat tanah berikut PBG (Persetujuan Bangunan Gedung) serta jaringan telp dan internet.Dalam hal ini,
                      Pihak Pembeli memahami sepenuhnya, bahwa penyediaan Fasilitas Utilitas (Listrik dan Air), serta sertipikat
                      tanah berikut PBG (Persetujuan Bangunan Gedung) serta jaringan telp dan internet tersebut sangat
                      tergantung kepada kebijaksanaan instansi terkait dan ketersediaan utilitas tersebut dari Pemerintah, dan
                      Pihak Pembeli menerima kondisi ini pada saat serah terima Rumah, serta membebaskan dan melepaskan Pihak
                      Developer dari semua klaim, tuntutan, gugatan apapun yang berkaitan dengan hal tersebut.</span></li>
                </ol>
              </li>
            </ol>
            <p class="ListParagraph" style="margin-left:72pt; margin-bottom:0pt; text-align:justify; line-height:115%"><span
                style="-aw-import:ignore">&#xa0;</span></p>
            <ol start="15" type="I" style="margin:0pt; padding-left:0pt">
              <li class="ListParagraph"
                style="margin-left:22.85pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:12.85pt">
                <span>FORCE MAJEURE</span></li>
            </ol>
            <p style="margin-left:36pt; margin-bottom:6pt; text-align:justify; line-height:115%"><span>Para pihak setuju untuk
                mengadakan perubahan/penambahan atas Surat Pemesanan ini apabila di kemudian hari terjadi Force Majeure. Yang
                dimaksud dengan Force Majeure adalah hal-hal yang dapat mempengaruhi jalannya pelaksanaan pekerjaan PT. CITRA
                ARGO TIRTA antara lain: gempa bumi, banjir, bencana alam lainnya, huru-hara, perang, tindakan kekerasan oleh
                pihak lain baik secara perorangan atau massal, termasuk tindakan, kebijakan/peraturan Pemerintah termasuk di
                bidang fiskal atau moneter, keadaan politik atau keadaan langka bahan bangunan yang mempengaruhi kegiatan usaha
                di bidang properti dan turunannya.</span></p>
            <ol start="16" type="I" style="margin:0pt; padding-left:0pt">
              <li class="ListParagraph"
                style="margin-left:23pt; margin-bottom:0pt; text-align:justify; line-height:115%; padding-left:13pt">
                <span>PERSELISIHAN DAN PENYELESAIAN MASALAH</span>
                <ol type="a" style="margin-right:0pt; margin-left:0pt; padding-left:0pt">
                  <li class="ListParagraph"
                    style="margin-left:31.05pt; margin-bottom:0pt; line-height:115%; padding-left:4.95pt"><span>Jika timbul
                      perselisihan dalam melaksanakan Surat Pemesanan ini, maka akan diselesaikan oleh para pihak secara
                      musyawarah.</span></li>
                  <li class="ListParagraph"
                    style="margin-left:31.56pt; margin-bottom:0pt; line-height:115%; padding-left:4.44pt"><span>Apabila dalam
                      jangka waktu 60 (enam puluh) hari sejak sengketa atau beda pendapat tersebut, penyelesaian secara
                      musyawarah tidak tercapai, maka para pihak sepakat untuk menyelesaikannya pada tingkat pertama dan
                      terakhir di Pengadilan Negeri Malang. </span></li>
                </ol>
              </li>
            </ol>

        <div class="page-break"></div>
        <p style="padding-top: 4pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">JADWAL PEMBAYARAN ANGSURAN</p>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <table style="border-collapse:collapse;margin-left:5.25pt" cellspacing="0">
            <tr style="height:16pt">
                <td
                    style="width:28pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s2" style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">No.
                    </p>
                </td>
                <td
                    style="width:215pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s2" style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        Keterangan</p>
                </td>
                <td
                    style="width:122pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s2" style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        Tanggal</p>
                </td>
                <td
                    style="width:122pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s2" style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        Nominal</p>
                </td>
            </tr>
            <?php $no=1; ?>
            @foreach ($dtPembayaran as $dtpem)
            <tr style="height:16pt">
                <td
                    style="width:28pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s2" style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;"> {{ $no
                        }}
                    </p>
                </td>
                <td
                    style="width:215pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s2" style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{ $dtpem->detail_pr }}</p>
                </td>
                <td
                    style="width:122pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s2" style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        @if($dtpem->tgl_pr != "0000-00-00")
                        <?= tgl_indo(date('Y-m-d', strtotime($dtpem->tgl_pr))) ?>
                        @else
                            -
                        @endif
                    </p>
                </td>
                <td
                    style="width:122pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s2" style="padding-left: 5pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        Rp {{ rupiah($dtpem->harga_pr) }}</p>
                </td>
            </tr>
            <?php

            $no++;
            ?>
            @endforeach

        </table>
        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <p style="padding-left: 5pt;text-indent: 0pt;text-align: left;">NOTES</p>
        <p style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;line-height: 114%;text-align: left;">Harga Sudah
            Termasuk : SHGB, PPN, PBG, PLN dan Air bersih. </p>
        <p style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;line-height: 114%;text-align: left;">Harga Belum
            Termasuk : BPHTB, Biaya KPR.</p>
       <br>
       <br>
        <p>
            Malang,  <?=  tgl_indo(date('Y-m-d', strtotime($fp->tgl_input_fp))) ?></php></p>
        <table style="width: 100%;">
            <tr>
                <td style="text-align:center;">
                    <p style="">Sales Executive
                    </p>
                   <br/>
                   <br/>
                    <p style="">{{ $fp->nama_ua }}</p>
                </td>
                <td style="text-align:center;">
                    <p style="padding-top: 6pt;padding-left: 18pt;text-indent: 0pt;text-align: left;"></p>
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    <p style="padding-left: 19pt;text-indent: 0pt;text-align: left;"></p>
                </td>
                <td style="text-align:center;">
                    <p style="">Pemesan</p>
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    <p style="">{{ $fp->nama_plgn }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <br/>
                    <br/>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <p style="">Accounting
                        Manager</p>
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    <p style="">Andreas Wibisono Lugito</p>
                </td>
                <td style="text-align:center;">
                    <p style="">Legal Manager
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    <p style="">Dian Yunitasari</p>
                </td>
                <td style="text-align:center;">
                    <p style="">CEO</p>
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                    <p style="">Gilbert Setiawan</p>

                </td>
                <td>

                    <p style="text-indent: 0pt;text-align: left;"><br /></p>
                </td>
            </tr>

        </table>

        <br>
        <br><br>

        <table style="width: 100%">
            <tr>
                <td style="width: 70%;"></td>
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
    </div>

</body>

</html>

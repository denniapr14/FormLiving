
<!DOCTYPE html>
<html lang="en">
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
    }

    table.no-space td,
    table.no-space tr,
    table.no-space th {
        padding: 2px;
    }

    body{
        border: none;
    }


</style>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
    <!-- Custom CSS -->
</head>

<body>

    <div class=" " >

        <div class="">


            <!-- /.col -->
            <!-- /.card-header -->
            <div class="card-body print">
                <table class="table table-borderless no-space">
                    <tr>
                        <td><img style="" src="{{ public_path('Dashboard') }}/images/content/logo-forms-living1.png" alt=""></td>
                        <td><img class="float-right" src="{{ public_path('Dashboard') }}/images/content/logo-tidar-gray.png" alt=""></td>
                    </tr>
                </table>



                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">

                                <br>
                                <center><u><b>FORMULIR PESANAN</b></u></center>
                                <br>
                                <div class="float-right" style="display: inline; width: 30%;">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>No : </td>

                                            <td>


                                                 {{ $fp->no_fp }}

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <h6>Yang bertanda tangan dibawah ini :

                            </h6>
                            <div class="col-md-12">
                                <table class="table table-borderless no-space" style="table-layout:fixed; width: 100%;">
                                    <tbody>
                                        <tr style="height: 5px; padding:2px;">
                                            <td class="text-left" style="width: 21%">Nama</td>
                                            <td style="width: 1%;">:</td>
                                            <td class="text-left" style="width: 27%;">
                                                <?= $fp->nama_plgn ?>
                                            </td>
                                            <td class="text-left" style="width: 14%;vertical-align: middle;">Pekerjaan
                                            </td>
                                            <td style="width: 1%;">:</td>
                                            <td class="text-left " style="width:30% ;">
                                                <?= $fp->pekerjaan_plgn ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">No.KTP</td>
                                            <td>:</td>
                                            <td class="text-left">
                                                <?= $fp->no_ktp_plgn ?>
                                            </td>
                                            <td class="text-left">No. Telepon</td>
                                            <td>:</td>
                                            <td class="text-left ">
                                                <?= $fp->no_telp_plgn ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Jenis kelamin / Status</td>
                                            <td>:</td>
                                            <td class="text-left ">
                                                <?= $fp->jenis_kelamin_status ?>
                                            </td>

                                            <td class="text-left">Email</td>
                                            <td>:</td>
                                            <td colspan="20" class="text-left ">
                                                <?= $fp->email_plgn ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Alamat</td>
                                            <td>:</td>
                                            <td style="width: 100%; " class=" text-left" colspan="5">
                                                <?= $fp->alamat_plgn ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h6>Dengan ini mengajukan permohonan pemesanan untuk membeli rumah pada :</h6>
                            <div class="col-md-12">
                                <table class="table table-borderless no-space" style="table-layout: fixed;">
                                    <tr style="height: 5px; padding:2px;">
                                        <input hidden value="<?= $fp->id_kkpr ?>" name="id_kpr" id="id_kpr">
                                        <td class="text-left" style="width: 15%">Cluster - Blok</td>
                                        <td class="text-left">: &nbsp;<span id="blokCluster" style="font-weight:bold;">

                                                {{ $fp->blok . ' - ' . $fp->nomor }}


                                        </td>
                                        <td> Spek : <?= $fp->spek_fp ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Luas Tanah</td>
                                        <td class="text-left"> : &nbsp; <span style="font-weight:bold;">
                                                m<sup>2</sup></span></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Luas Bangunan</td>
                                        <td class="text-left">: &nbsp; <span style="font-weight:bold;">
                                                m<sup>2</sup></span></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Harga Jual</td>
                                        <td class="text-left">:

                                        </td>
                                        <td></td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-md-12">
                                <h6>Dengan rincian sebagai berikut :</h6>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-borderless no-space" style="table-layout:fixed; width: 100%;">
                                            <tr style="height: 5px; padding:2px;">
                                                <td class="text-left" style="width: 30%">Harga</td>
                                                <td class="text-left ">: &nbsp; <span style="font-weight:bold;"
                                                        id="textHarga2">
                                                        <?= rupiah($fp->harga_awal) ?>
                                                    </span> <br>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Diskon</td>
                                                <td class="text-left">: &nbsp; <span style="font-weight:bold;"
                                                        id="textDiskon">
                                                        <?= rupiah($fp->total_diskon) ?>
                                                    </span> <br>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Total Harga Jadi</td>
                                                <td class="text-left">:
                                                    &nbsp; <span style="font-weight:bold;" id="textTotHarga">
                                                        <?= rupiah($fp->total_harga) ?>
                                                    </span> <br>


                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Uang Muka</td>
                                                <td class="text-left">: &nbsp; <span style="font-weight:bold;"
                                                        id="textDP">
                                                        <?= rupiah($fp->uang_muka) ?>
                                                    </span> <br>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Harga yang akan dibayarkan</td>
                                                <td class="text-left">:  &nbsp;
                                                    <span style="font-weight:bold;" id="textfp">
                                                        {{ rupiah($fp->total_harga - $fp->uang_muka) }}
                                                </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <center>
                                    <div class="col-md-4" style="border: 3px solid; width: 90%;">
                                        <h6 style="padding-top:10px;">Pembayaran via transfer</h6>
                                        <table class="table table-borderless no-space"
                                            style="table-layout:fixed; border:none !important">
                                            <tr>
                                                <td class="text-left" style="width: 25%;" scope="col">Bank</td>
                                                <td class="text-left">: BCA</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Cabang</td>
                                                <td class="text-left">: Galunggung</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">AC</td>
                                                <td class="text-left">: 4403014446</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">A/n</td>
                                                <td class="text-left">: PT Citra Argo Tirta</td>
                                            </tr>
                                        </table>
                                    </div>
                                </center>
                                </div>
                            </div>
                            <div style="break-after:page"><br><br></div>
                            <div class="col-md-12">
                                <h6>Adapun cara pembayaran yang telah disepakati adalah sebagai berikut :</h6>
                            </div>
                            <!-- ============= BATAS DATA RINCIAN HARGA & RUMAH  -->
                            <?php
                $noDtl = 1;
                if (!empty($dtPembayaran)) {
                ?>
                            <div class="col-md-12">
                                <table class="table solid-border" style="table-layout:fixed;">
                                    <?php
                      foreach ($dtPembayaran as $dfp) {
                      ?>
                                    <tbody style="border:1px solid black;">
                                        <tr style="height:30px; border:1px solid black;" class="BDT">
                                            <td style="width: 5%; border:1px solid black;">
                                                <?= $noDtl ?>
                                            </td>
                                            <td style="width: 40%; border:1px solid black; ">


                                                {{ $dfp->detail_pr }}
                                            </td>
                                            <td style="border:1px solid black;">
                                                {{ date('d M Y', strtotime($dfp->tgl_pr)) }}
                                            </td>
                                            <td style="border:1px solid black;"> {{ rupiah($dfp->harga_pr) }}
                                            </td>
                                            <td style="border:1px solid black;">
                                                <a href="/ubah-pembayaran/{{ $dfp->id_pem_rumah }} "
                                                    class="btn btn-outline-primary">Edit</a>
                                                <a href="/pembayaran/{{ $dfp->id_pem_rumah }} "
                                                    class="btn btn-outline-primary">bayar</a>
                                            </td>
                                        </tr>
                                        <?php
                        $noDtl++;
                      }
                        ?>
                                    </tbody>
                                </table>
                            </div>


                            <?php
                } else {
                ?>
                            <div class="col-md-12">
                                <table class="table solid-border" style="table-layout:fixed">
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            ?>

                                        @foreach ($dtPembayaran as $pem)
                                        <tr style="height:25px; ">

                                            <td style="width: 5%; ">{{ $no++ }}</td>
                                            <td style="width: 62%; ">
                                                {{ $pem->detail_pr }}
                                            </td>
                                            <td>
                                                {{ rupiah($pem->harga_pr) }}
                                            </td>
                                            <td>
                                                {{ date('d M Y', strtotime($pem->tgl_pr)) }}
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <?php
                }
                ?>
                            <!-- ========================= BATAS KETERANGAN TAMBAHAN ===================== -->
                            <div class="col-md-12">
                                <br>
                                <h6>- Bersedia menambah uang muka seandainya kredit yang diberikan lembaga kredit tidak
                                    sesuai dengan permohonan.</h6>
                                <h6>- Uang muka harus lunas sebelum realisasi .</h6>
                                <br>

                            </div>

                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-4" style="line-height:1;">Malang, <span
                                            style="text-decoration: none; width: 100%;">
                                            <?= date('Y-m-d', strtotime($fp->tgl_input_fp)) ?>
                                        </span>


                                    </div>


                                </div>

                            </div>


            </div>
            <div
                style="background-color: gray; width: 100%; text-align: center;color:white;height: 50px; font-size: 32px ">
                <i>FORMSLIVING.COM</i>
            </div>
            <!-- /.card-body -->

        </div>

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

</body>

</html>

<?php
    function rupiah($angka)
    {
        $hasil_rupiah = 'Rp ' . number_format($angka, 0, ',', '.') . ',-';
        return $hasil_rupiah;
    } ?>


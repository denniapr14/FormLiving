@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('flashdata')
@extends('V_Admin.footer')

@section('tittle', 'FORMS ONE | Formulir')
@section('content')
<style>
    .myinput {
        height: 30px;
    }

    .form-inline {
        height: 30px;
    }

    .container h2 {
        text-align: center;
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
<br><br>
<br><br>
<div><a class="btn btn-outline-danger" href="{{ url()->previous() }}">Kembali</a></div>
<br>
<section class="content" id="printcontent">
    <div class="container-fluid ">
        <div class="card card-primary">


            <!-- /.col -->
            <!-- /.card-header -->
            <div class="card-body print">
                <div class="row">
                    <div class="col-md-6">
                        <img style="" src="{{url('Dashboard')}}/images/content/logo-forms-living1.png" alt="">
                    </div>
                    <div class="col-md-6">
                        <img class="float-right" src="{{url('Dashboard')}}/images/content/logo-tidar-gray.png" alt="">
                    </div>
                </div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">

                                <br>
                                <center><u><b>FORMULIR PESANAN</b></u></center>
                                <div class="float-right" style="display: inline; width: 30%;">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>No : </td>
                                            <td><input type="text" class="myinput" name="no_fp"
                                                    value=" {{ $fp->no_fp }} ">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <h6>Yang bertanda tangan dibawah ini :
                                <input id="getPelanggan" class="noprint" name="pelanggan" hidden
                                    value="<?= $fp->id_pelanggan ?>">
                            </h6>
                            <div class="col-md-12">
                                <table class="table table-borderless no-space" style="table-layout:fixed; width: 100%;">
                                    <tbody>
                                        <tr style="height: 5px; padding:2px;">
                                            <td class="text-left" style="width: 21%">Nama</td>
                                            <td style="width: 1%;">:</td>
                                            <td class="text-left" style="width: 27%;">
                                                <input type="text" name="nama" style="width: 90%;" id="nama_pelanggan"
                                                    class="myinput " value="<?= $fp->nama_plgn ?>"
                                                    placeholder="Masukan Nama" aria-describedby="helpId">
                                            </td>
                                            <td class="text-left" style="width: 14%;vertical-align: middle;">Pekerjaan
                                            </td>
                                            <td style="width: 1%;">:</td>
                                            <td class="text-left " style="width:30% ;">
                                                <input type="text" name="pekerjaan" style="width: 90%;"
                                                    id="pekerjaan_pelanggan" value="<?= $fp->pekerjaan_plgn ?>"
                                                    class="myinput" placeholder="Masukan Pekerjaan"
                                                    aria-describedby="helpId">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">No.KTP</td>
                                            <td>:</td>
                                            <td class="text-left">
                                                <input type="text" name="ktp" style="width: 90%;" id="no_ktp_pelanggan"
                                                    class="myinput " value="<?= $fp->no_ktp_plgn ?>"
                                                    placeholder="Masukan Nomor KTP" aria-describedby="helpId">
                                            </td>
                                            <td class="text-left">No. Telepon</td>
                                            <td>:</td>
                                            <td class="text-left ">
                                                <input type="text" name="telp" style="width: 90%;"
                                                    id="no_telp_pelanggan" value="<?= $fp->no_telp_plgn ?>"
                                                    class="myinput " placeholder="Masukan Nomor Telepon"
                                                    aria-describedby="helpId">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Jenis kelamin / Status</td>
                                            <td>:</td>
                                            <td class="text-left ">
                                                <input type="text" name="kelamin" style="width: 90%;"
                                                    id="jenis_kelamin_pelanggan"
                                                    value="<?= $fp->jenis_kelamin_status ?>" class="myinput "
                                                    placeholder="Masukan Jenis Kelamin / Status"
                                                    aria-describedby="helpId">
                                            </td>

                                            <td class="text-left">Email</td>
                                            <td>:</td>
                                            <td colspan="20" class="text-left ">
                                                <input type="text" name="email" style="width: 90%;" id="email_pelanggan"
                                                    class="myinput " value="<?= $fp->email_plgn ?>"
                                                    placeholder="Masukan Email" aria-describedby="helpId">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Alamat</td>
                                            <td>:</td>
                                            <td style="width: 100%; " class=" text-left" colspan="5">
                                                <textarea class="myinput " name="alamat" style="width: 95%; "
                                                    id="alamat_pelanggan"><?= $fp->alamat_plgn ?></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h6>Dengan ini mengajukan permohonan pemesanan untuk membeli rumah pada :</h6>
                            <div class="col-md-12">
                                <table class="table no-border" style="table-layout: fixed;">
                                    <tr>
                                        <input hidden value="<?= $fp->id_kkpr?>" name="id_kpr" id="id_kpr">
                                        <td class="text-left" style="width: 15%">Cluster - Blok</td>
                                        <td class="text-left">: &nbsp;<span id="blokCluster" style="font-weight:bold;">

                                                {{$fp->blok ." - ". $fp->nomor}}


                                        </td>
                                        <td> Spek :<input type="text" readonly name="spek" class="myinput"
                                                style="width: 80%;" value="<?= $fp->spek_fp ?>"></td>
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
                                            &nbsp; <span id="textHarga1" style="font-weight:bold;">
                                                <?= rupiah($fp->total_harga) ?>
                                            </span>
                                            <input type="text" readonly hidden name="harga" id="harga"
                                                onclick="terbilangSet('harga', 'terbilang')" style="width: 40%;" id=""
                                                value="" class="myinput" placeholder="" aria-describedby="helpId">
                                            <a href="#"
                                                onclick="terbilangSetInput('totalharga', 'terisi'); return convertToRupiah(document.getElementById('totalharga').value, 'textHarga1'); "
                                                class="btn btn-outline-primary noprint">
                                                <i class="fa fa-check"></i> </a>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Terbilang</td>
                                        <td class="text-left" colspan="2" id="">: &nbsp;<input type="text" name="terisi"
                                                id="terisi" readonly value="<?= $fp->terbilang ?>" style="width: 95%;">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <h6>Dengan rincian sebagai berikut :</h6>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table no-border" style="table-layout:fixed; width: 100%;">
                                            <tr>
                                                <td class="text-left" style="width: 30%">Harga</td>
                                                <td class="text-left ">: &nbsp; <span style="font-weight:bold;"
                                                        id="textHarga2">
                                                        <?= rupiah($fp->harga_awal) ?>
                                                    </span> <br>
                                                    <input type="number" value="<?= $fp->harga_awal ?>" name="harga"
                                                        style="width:50%;"
                                                        onkeyup="return convertToRupiah(this.value, 'textHarga1','textHarga2')"
                                                        id="inputHarga" class="myinput no-print"
                                                        placeholder="Masukan harga" aria-describedby="helpId">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Diskon</td>
                                                <td class="text-left">: &nbsp; <span style="font-weight:bold;"
                                                        id="textDiskon">
                                                        <?= rupiah($fp->total_diskon) ?>
                                                    </span> <br>
                                                    <input type="number" value="<?= $fp->total_diskon ?>" name="diskon"
                                                        style="width: 50%;"
                                                        onkeyup="return convertToRupiah(this.value, 'textDiskon')"
                                                        id="inputDiskon" class="myinput no-print"
                                                        placeholder="Masukan diskon" aria-describedby="helpId">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Total Harga Jadi</td>
                                                <td class="text-left">:
                                                    &nbsp; <span style="font-weight:bold;" id="textTotHarga">
                                                        <?= rupiah($fp->total_harga) ?>
                                                    </span> <br>
                                                    <input type="number" id="totalharga" value="<?= $fp->total_harga ?>"
                                                        name="total" style="width: 50%;"
                                                        onkeyup="return convertToRupiah(this.value, 'textTotHarga')"
                                                        class="myinput no-print" placeholder="Masukan diskon"
                                                        aria-describedby="helpId">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Uang Muka</td>
                                                <td class="text-left">: &nbsp; <span style="font-weight:bold;"
                                                        id="textDP">
                                                        <?= rupiah($fp->uang_muka) ?>
                                                    </span> <br>
                                                    <input type="number" value="<?= $fp->uang_muka ?>" name="dp"
                                                        style="width: 50%;"
                                                        onkeyup="return convertToRupiah(this.value, 'textDP')"
                                                        class="myinput no-print" placeholder="Masukan diskon"
                                                        aria-describedby="helpId">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Harga</td>
                                                <td class="text-left">: {{rupiah($fp->total_harga - $fp->uang_muka)}}
                                                    &nbsp; <span style="font-weight:bold;" id="textfp">

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4" style="border: 3px solid;">
                                        <h6 style="padding-top:10px;">Pembayaran via transfer</h6>
                                        <table class="table no-border"
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
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h6>Adapun cara pembayaran yang telah disepakati adalah sebagai berikut :</h6>
                            </div>
                            <!-- ============= BATAS DATA RINCIAN HARGA & RUMAH  -->
                            <?php
                $noDtl = 1;
                if (!empty($detailFP)) {
                ?>
                            <div class="col-md-12">
                                <table class="table solid-border" style="table-layout:fixed;">
                                    <?php
                      foreach ($detailFP as $dfp) {
                      ?>
                                    <tbody style="border:1px solid black;">
                                        <tr style="height:30px; border:1px solid black;" class="BDT">
                                            <td style="width: 5%; border:1px solid black;">
                                                <?= $noDtl ?>
                                            </td>
                                            <td style="width: 40%; border:1px solid black; ">
                                                <input type="hidden" name="id_dfp[]" value="<?= $dfp->id_dtl_fp ?>">
                                                <input type="text" name="ket[]" class="myinput"
                                                    value="<?= $dfp->ket_dfp ?>" style="width: 100%;">
                                            </td>
                                            <td style="border:1px solid black;">
                                                <input type="date" readonly class="myinput" name="notifDate[]"
                                                    value="<?=$dfp->date_dfp?>">
                                            </td>
                                            <td style="border:1px solid black;"> <input type="text" name="notifHarga[]"
                                                    class="myinput" value="<?= $dfp->harga_dfp ?>" style="width: 100%;">
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

                                        @foreach($dtPembayaran as $pem)


                                        <tr style="height:25px; ">

                                            <td style="width: 5%; ">{{$no++}}</td>
                                            <td style="width: 62%; ">
                                                {{$pem->detail_pr}}
                                            </td>
                                            <td>
                                                {{rupiah($pem->harga_pr)}}
                                            </td>
                                            <td>
                                                {{ date("d M Y", strtotime($pem->tgl_pr)) }}
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
                                    <div class="col-md-8">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td style="width: 30%;">Sudah Termasuk</td>
                                                <td style="width: 100%;"> <input type="text" name="sudahT"
                                                        class="myinput" value="<?= $fp->sdh_termasuk_fp ?>"
                                                        style="width: 100%;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Belum Termasuk</td>
                                                <td> <input type="text" name="belumT"
                                                        value="<?= $fp->blm_termasuk_fp ?>" class="myinput"
                                                        style="width: 100%;">
                                                </td>
                                            </tr>
                                        </table>
                                        <br>

                                    </div>
                                    <div class="col-md-4" style="line-height:1;">Malang, <span
                                            style="text-decoration: none; width: 100%;">
                                            <?= date("Y-m-d", strtotime($fp->tgl_input_fp)) ?>
                                        </span>
                                        <?php
                    if(!empty($fp->nama_med)){
                        ?>
                                        <input type="text" name="mediator" readonly class="myinput" style="width: 100%;"
                                            value="mediator : <?= $fp->nama_med  ?>">
                                        <?php
                    }
                    ?>



                                    </div>


                                </div>

                            </div>

                            <div class="col-md-12" style="top: -50px;">
                                <table class="table table-bordered">
                                    <tr>
                                        <td style="width: 20%;">Catatan Khusus</td>
                                        <div class="float-right"><span style="font-size:12px;">
                                                (maksimal 65 huruf dan spasi)
                                            </span></div>
                                        <td>
                                            <textarea name="catatanK" id="" value="" style="width: 100%;"
                                                class="myinput" rows="2"><?= $fp->catatan_khusus ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;">Promo</td>
                                        <div class="float-right"><span style="font-size:12px;">
                                                (maksimal 65 huruf dan spasi)
                                            </span></div>
                                        <td>
                                            <textarea name="promo" value="" id="" style="width: 100%;" class="myinput"
                                                rows="2"><?= $fp->promo_fp ?></textarea>
                                        </td>
                                    </tr>


                                </table>
                            </div>

                            <div class="col-md-12" style="height:10px"></div>

                            <!-- tanda tangan area -->
                            <div class="col-md-12">
                                <div class="row">
                                    <table>
                                        <tr>
                                            <td>Diketahui oleh</td>
                                            <td>Diketahui oleh</td>
                                            <td>Disetujui oleh</td>
                                            <td>Disetujui oleh</td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <?php
                            if ($fp->status_market_fp == 'accept') {
                            ?>
                                                <i class="fas fa-check-circle">

                                                    <?php
                            }
                            ?>
                                            </td>
                                            <td>
                                                <?php
                            if ($fp->status_staf_acc_fp == 'accept') {
                            ?>
                                                <i class="fas fa-check-circle">

                                                    <?php
                            }
                            ?>
                                            </td>
                                            <td>
                                                <?php
                            if ($fp->status_acc_fp == 'accept') {
                            ?>
                                                <i class="fas fa-check-circle">

                                                    <?php
                            }
                            ?>
                                            </td>
                                            <td>
                                                <?php
                            if ($fp->status_legal_fp == 'accept') {
                            ?>
                                                <i class="fas fa-check-circle">

                                                    <?php
                            }
                            ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kepala Marketing</td>
                                            <td>Staff Accounting</td>
                                            <td>Kepala Accounting</td>
                                            <td>Legal</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php

          ?>
                    <br class="noprint"><br class="noprint">
                    <div class="">
                        <center>
                            <select class="form-control noprint" name="validasi" required id="" style="width: 60%;">
                                <option value="">--Pilih--</option>
                                <option value="accept">di terima</option>
                                <option value="denied">di tolak</option>
                            </select><br>
                            <button type="submit" class="btn btn-success noprint"><i class="fa fa-save fa-2x">
                                    Simpan</i></button>
                        </center>
                    </div>
                </form>
            </div>
            <div
                style="background-color: gray; width: 100%; text-align: center;color:white;height: 50px; font-size: 32px ">
                <i>FORMLIVING.COM</i></div>
            <!-- /.card-body -->

        </div>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<?php
function rupiah($angka)
{
  $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.') . ',-';
  return $hasil_rupiah;
} ?>
@endsection

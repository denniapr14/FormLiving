@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle', 'Forms | Simulasi Ringkasan')
@section('body', '')
<style>
    ol>li::marker {
        font-weight: bold;
    }
</style>

@section('content')

<div class="cluster">
    <div class="header-simulation mobile-only">
        <div class="ornament one">
            <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
        </div>
        <div class="nav-header">
            <!--<div class="ic-back">-->
            <!--    <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">-->
            <!--</div>-->
            <h2 class="title">
                Miliki Unit
            </h2>
            <div></div>
        </div>
        <div class="steps">
            <div class="step done">1</div>
            <div class="step done">2</div>
            <div class="step done">3</div>
            <div class="step done">4</div>
            <div class="step done">5</div>
            <div class="step done">6</div>
            <div class="step done">7</div>
            <div class="step active last">8</div>

        </div>
    </div>
    <div class="container">
        <div class="steps">
            <div class="step done">1</div>
            <div class="step done">2</div>
            <div class="step done">3</div>
            <div class="step done">4</div>
            <div class="step done">5</div>
            <div class="step done">6</div>
            <div class="step done">7</div>
            <div class="step active last">8</div>
        </div>
        <div>
{{--  ==========================================================================================================================================================================================================  --}}
{{--  GUEST(PELANGGAN)  --}}
            @if (!empty(Session::get('guest')))
            <form
                action="{{ route('simulationSummary.action',[$rumah->id_rumah, $tipeRumah->id_tipe_rumah, $kkpr->id_kkpr,$jenis,$pelanggan->id_pelanggan, $voucher]) }}"
                method="POST">
                <div class="second-layout">
                    <div class="row">
                        <div class="col-12 order-2 order-lg-1">
                            <h2 class="title">
                                Ringkasan Pemesanan Sementara
                            </h2>
                        </div>
                        <div class="col-12 col-lg-4 left-column order-1 order-lg-2">
                            <div class="mod-type">
                                <div class="type-image">
                                    <?php
                                            if(!empty($rumah->img_rumah)){
                                                ?>
                                    <img src="{{ asset('Home') }}/images/rumah/{{$rumah->img_rumah}}" alt="">
                                    <?php
                                            }else{
                                            ?>

                                    <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                                    <?php
                                            }
                                        ?>
                                </div>
                                <div class="items">
                                    <div class="type-item">
                                        <p>Type</p>
                                        <h5>{{ $tipeRumah->jenis_tr }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Blok</p>
                                        <h5>{{ $rumah->blok }} - {{ $rumah->nomor }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Cluster</p>
                                        <h5>{{ $rumah->nama_cluster }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Harga Total</p>

                                        <h5>Rp. {{ rupiah($tipeRumah->harga_tr) }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Luas Tanah</p>

                                        <h5>{{ $rumah->luas_tanah }} m<sup>2</sup></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-8 right-column order-3">



                            @csrf
                            <div class="row summary">
                                <div class="col-5 col-lg-4">
                                    <p>Nama (Sesuai KTP)</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $userPelanggan->nama_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>NIK</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $userPelanggan->no_ktp_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>No. Whatsapp (Aktif)</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $userPelanggan->no_wa_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Alamat</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $userPelanggan->alamat_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Email</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $userPelanggan->email_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>No. NPWP</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $userPelanggan->npwp_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Cluster / Blok</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $rumah->nama_cluster }} / {{ $rumah->blok }} - {{ $rumah->nomor }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Luas Tanah</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $rumah->luas_tanah }} m2</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Tipe Rumah</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $tipeRumah->jenis_tr }}</p>
                                </div>


                                <div class="col-5 col-lg-4">
                                    <p>Harga Rumah</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>Rp. {{ rupiah($tipeRumah->harga_tr) }}</p>
                                </div>

                                <div class="col-5 col-lg-4">
                                    <p>Diskon Promo</p>
                                </div>

                                @if (!empty($promo))
                                <div class="col-7 col-lg-8">
                                    <p>Rp. {{ rupiah($promo->diskon_promo) }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Keterangan Promo</p>
                                </div>

                                <div class="col-7 col-lg-8">
                                    <p> {{ $promo->keterangan }}</p>
                                </div>
                                <div class="col-5 col-lg-4"></div>
                                <div class="col-7 col-lg-8 ">
                                    <div class="promo">
                                        <img src="{{ asset('Home') }}/images/ic-promo.png" alt="">
                                        <p>Kode Kupon: {{ $promo->kode_promo }}</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <h6>Harga Total</h6>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <h6>Rp. {{ rupiah($tipeRumah->harga_tr - $promo->diskon_promo) }}</h6>
                                    <input type="text" name="harga" hidden
                                        value=" {{  $tipeRumah->harga_tr - $promo->diskon_promo }}">
                                </div>
                                @else
                                <div class="col-7 col-lg-8">
                                    <p>Rp. 0</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Keterangan</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p> Tidak ada promo</p>
                                </div>
                                <div class="col-5 col-lg-4"></div>
                                <div class="col-7 col-lg-8 ">

                                </div>
                                <div class="col-5 col-lg-4">
                                    <h6>Harga Total</h6>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <h6>Rp. {{ rupiah($tipeRumah->harga_tr) }}</h6>
                                    <input type="text" name="harga" hidden value=" {{  $tipeRumah->harga_tr }}">
                                </div>
                                @endif



                            </div>
                            <div class="form-check checkbox">
                                <input type="checkbox" class="form-check-input" name="disclaimer" id="disclaimer"
                                    onClick="validate()" value="checkedValue" data-bs-toggle="modal"
                                    data-bs-target="#disclaim">
                                <label class="form-check-label" for="disclaimer">
                                    Setuju
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-groups">
                    <a href="/simulation-order/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}/{{ $payment }}/{{$kkpr->id_kkpr}}"
                        type="button" id="kembali" class="btn btn-grey">Kembali</a>
                    <button type="submit" id="lanjutkan" disabled class="btn btn-primary">Lanjutkan</button>
                </div>
            </form>
            @endif
            {{--  ==========================================================================================================================================================================================================  --}}
            {{--  GUEST(PELANGGAN)  --}}
            @if (!empty(Session::get('user')))
            <form
                action="{{ route('simulationSummary.action',[$rumah->id_rumah, $tipeRumah->id_tipe_rumah, $kkpr->id_kkpr,$jenis,$pelanggan->id_pelanggan, $voucher]) }}"
                method="POST">
                <div class="second-layout">
                    <div class="row">
                        <div class="col-12 order-2 order-lg-1">
                            <h2 class="title">
                                Ringkasan Pemesanan Sementara
                            </h2>
                        </div>
                        <div class="col-12 col-lg-4 left-column order-1 order-lg-2">
                            <div class="mod-type">
                                <div class="type-image">
                                    <img src="{{ asset('Home') }}/images/img-cluster.png" alt="">
                                </div>
                                <div class="items">
                                    <div class="type-item">
                                        <p>Type</p>
                                        <h5>{{ $tipeRumah->jenis_tr }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Blok</p>
                                        <h5>{{ $rumah->blok }} - {{ $rumah->nomor }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Cluster</p>
                                        <h5>{{ $rumah->nama_cluster }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Harga</p>

                                        <h5>Rp. {{ rupiah($tipeRumah->harga_tr) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-8 right-column order-3">



                            @csrf
                            <div class="row summary">
                                <div class="col-5 col-lg-4">
                                    <p>Nama (Sesuai KTP)</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $pelanggan->nama_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>NIK</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $pelanggan->no_ktp_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>No. Whatsapp (Aktif)</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $pelanggan->no_wa_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Alamat</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $pelanggan->alamat_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Email</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $pelanggan->email_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>No. NPWP</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $pelanggan->npwp_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Cluster / Blok</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $rumah->nama_cluster }} / {{ $rumah->blok }} - {{ $rumah->nomor }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Luas Tanah</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $rumah->luas_tanah }} m2</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Tipe Rumah</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $tipeRumah->jenis_tr }}</p>
                                </div>

                                <div class="col-5 col-lg-4">
                                    <p>Harga Rumah</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>Rp. {{ rupiah($tipeRumah->harga_tr) }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Diskon Promo</p>
                                </div>
                                @if (!empty($promo))
                                <div class="col-7 col-lg-8">
                                    <p>Rp. {{ rupiah($promo->diskon_promo) }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Keterangan</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p> {{ $promo->keterangan }}</p>
                                </div>
                                <div class="col-5 col-lg-4"></div>
                                <div class="col-7 col-lg-8 ">
                                    <div class="promo">
                                        <img src="{{ asset('Home') }}/images/ic-promo.png" alt="">
                                        <p>Kode Kupon: {{ $promo->kode_promo }}</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <h6>Harga Total</h6>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <h6>Rp. {{ rupiah($tipeRumah->harga_tr - $promo->diskon_promo) }}</h6>
                                    <input type="text" name="harga" hidden
                                        value=" {{ $tipeRumah->harga_tr - $promo->diskon_promo }}">
                                </div>
                                @else
                                <div class="col-7 col-lg-8">
                                    <p>Rp. 0</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Keterangan</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p> Tidak ada promo</p>
                                </div>
                                <div class="col-5 col-lg-4"></div>
                                <div class="col-7 col-lg-8 ">

                                </div>
                                <div class="col-5 col-lg-4">
                                    <h6>Harga Total</h6>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <h6>Rp. {{ rupiah($tipeRumah->harga_tr) }}</h6>
                                    <input type="text" name="harga" hidden value=" {{ $tipeRumah->harga_tr }}">
                                </div>
                                @endif



                            </div>
                            <div class="form-check checkbox">
                                <input type="checkbox" class="form-check-input" name="disclaimer" id="disclaimer"
                                    onClick="validate()" value="checkedValue" data-bs-toggle="modal"
                                    data-bs-target="#disclaim">
                                <label class="form-check-label" for="disclaimer">
                                    Setuju
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-groups">
                    <a href="{{ route('simulasiPelanggan', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah, $kkpr->id_kkpr,$jenis,$pelanggan->id_pelanggan]) }}"
                        type="button" id="kembali" class="btn btn-grey">Kembali</a>
                    <button type="submit" id="lanjutkan" disabled class="btn btn-primary">Lanjutkan</button>
                </div>
            </form>
            @endif

        </div>
    </div>
</div>

<!-- Modal Modification Detail -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mod-items">
                    <div class="item">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('Home') }}/images/img-modification1.png" alt="">
                            </div>
                            <div class="col-5">
                                <p>Jenis Lantai</p>
                                <h6>Parket Kayu</h6>
                            </div>
                            <div class="col-5 text-end">
                                <p>Biaya</p>
                                <h6>50 Jt</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('Home') }}/images/img-modification2.png" alt="">
                            </div>
                            <div class="col-5">
                                <p>Jenis Lantai</p>
                                <h6>-</h6>
                            </div>
                            <div class="col-5 text-end">
                                <p>Biaya</p>
                                <h6>0</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('Home') }}/images/img-modification3.png" alt="">
                            </div>
                            <div class="col-5">
                                <p>Jenis Lantai</p>
                                <h6>Full-width Glass</h6>
                            </div>
                            <div class="col-5 text-end">
                                <p>Biaya</p>
                                <h6>25 Jt</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Disclaimer -->
<div class="modal fade" id="disclaim" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg disclaimer" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div>
                    <div class="section">
                        <h5 class="modal-title">
                            Untuk pemesanan tersebut diatas, maka dengan ini pemesan menyetujui syarat dan ketentuan
                            sebagai berikut :
                        </h5>
                        <p align="justify">
                        <ol type="I">
                            <li>
                                Menandatangani Perjanjian Pengikatan Jual Beli (PPJB) Tanah dan
                                Bangunan/ Kavling dalam waktu 30 (tiga puluh) hari sejak tanggal Surat
                                Pemesanan ini. Apabila setelah lewatnya jangka waktu tersebut, maka PT.
                                CITRA ARGO TIRTA berhak membatalkan Surat Pemesanan ini sesuai
                                butir XI di bawah, maka seluruh pembayaran yang telah dilakukan
                                pemesan tidak dapat dituntut kembali atau ditarik dari PT. CITRA ARGO
                                TIRTA.
                            </li>
                            <li>
                                Dalam hal pemesan telah membayar sebagian atau seluruh pembayaran
                                kepada PT. CITRA ARGO TIRTA dan pemesan membatalkan
                                pemesanannya dengan alasan apapun selain penolakan
                                permohonan fasilitas kredit sebagaimana butir X di bawah, Maka seluruh
                                pembayaran yang telah dilakukan pemesan tidak dapat dituntut kembali
                                atau ditarik dari PT. CITRA ARGO TIRTA.
                            </li>
                            <li>
                                Untuk melaksanakan penandatangan Akta Jual Beli (AJB) di hadapan
                                Pejabat Pembuat Akta Tanah (PPAT) yang ditunjuk oleh PT. CITRA
                                ARGO TIRTA, pemesan wajib terlebih dahulu membayar seluruh
                                bea/pajak dan biaya yang belum termasuk dalam Harga Tanah &
                                Bangunan/ Kavling.
                            </li>
                            <li>
                                Sebelum dilaksanakannya AJB di hadapan PPAT (untuk selanjutnya akan disebut AJB PPAT),
                                apabila terjadi antara lain:
                                <ol type="a">
                                    <li>kenaikan tarif dan/atau pengenaan baru berdasarkan suatu
                                        perubahan atau peraturan baru yang dikeluarkan/diberlakukan oleh
                                        Pemerintah atas suatu pajak/bea dan biaya seperti namun tidak
                                        terbatas pada Pajak Pertambahan Nilai (PPN), Bea Perolehan Hak
                                        atas Tanah dan Bangunan (BPHTB); atau
                                    </li>
                                    <li>
                                        kenaikan tarif Nilai Jual Obyek Pajak (NJOP) dimana Pajak
                                        Penghasilan (PPh) yang menjadi kewajiban PT. CITRA ARGO
                                        TIRTA menjadi lebih besar dari PPh yang telah dibayarkan oleh
                                        PT. CITRA ARGO TIRTA berdasarkan Harga Tanah dan
                                        Bangunan/Kavling dalam Surat Pemesanan ini, sejauh hal tersebut
                                        tidak disebabkan oleh PT. CITRA ARGO TIRTA, maka seluruhnya
                                        wajib ditanggung dan dibayar sepenuhnya oleh pemesan sebelum
                                        penandatanganan AJB PPAT.
                                    </li>
                                </ol>
                            </li>
                            <li>
                                Dalam hal pemesan belum membayar seluruh pajak/bea dan biaya
                                sebagaimana butir III sebelum dilaksanakannya penandatanganan AJB
                                PPAT, maka PT. CITRA ARGO TIRTA tidak wajib melaksanakan
                                penandatanganan AJB PPAT, dan segala risiko serta akibatnya menjadi
                                tanggungan pemesan sepenuhnya.
                            </li>
                            <li>
                                Apabila pemesan lalai dalam hal kurang atau terlambat melakukan suatu
                                pembayaran berdasarkan Surat Pemesanan ini, maka pemesan
                                dikenakan dan wajib membayar kepada PT. CITRA ARGO TIRTA denda
                                sebesar 1%O (satu permil) per setiap hari keterlambatan dari jumlah
                                terhutang sejak tanggal seharusnya dibayar sampai dilunasi seluruhnya.
                            </li>
                            <li>
                                Selain yang telah diatur dalam butir V di atas, apabila pemesan lalai dalam
                                hal kurang atau terlambat melakukan suatu pembayaran baik uang muka
                                (DP) maupun angsuran yang berlangsung hingga 3 (tiga) bulan berturutturut terhitung
                                sejak tanggal permulaan kelalaian terjadi, maka PT. CITRA
                                ARGO TIRTA. dapat membatalkan Surat Pemesanan ini sesuai butir XI di
                                bawah, dan seluruh pembayaran yang telah dilakukan pemesan tidak
                                dapat dituntut kembali atau ditarik dari PT. CITRA ARGO TIRTA.
                            </li>
                            <li>
                                Untuk setiap pembayaran, apabila ternyata cek/giro atau pengiriman/transfer
                                yang ditolak oleh Bank, maka pemesan dikenakan dan wajib membayar
                                kepada PT. CITRA ARGO TIRTA biaya administrasi sebesar Rp.
                                100.000,- (seratus ribu rupiah) per setiap kejadian dan berlaku pula
                                ketentuan butir IX dan butir X.
                            </li>
                            <li>
                                Pembayaran kepada PT. CITRA ARGO TIRTA dibedakan menjadi 2 yakni :
                                <ol type="a">
                                    <li>Secara Cash atau Cash Bertahap (inhouse) dapat melalui transfer
                                        ke rekening BANK CENTRAL ASIA<br>
                                        Cabang Galunggung, Malang<br>
                                        Atas Nama : PT CITRA ARGO TIRTA<br>
                                        Nomor Rekening : 4403014000, atau melalui virtual account:<br>
                                        Nomor Virtual Account NISP : 711021105313770
                                    </li>
                                    <li>
                                        Secara KPR wajib dilakukan oleh pemesan dengan menggunakan
                                        debet card/transfer/virtual account/pemindahbukuan/ giro/cek dari
                                        rekening atas nama pemesan sendiri (Jika rekening atas nama
                                        suami/istri/anak harus dibuktikan dengan dokumen legalitas yang
                                        berupa Kartu Keluarga, Akta Nikah, Akta Lahir Anak), dengan
                                        mencantumkan nama pemesan, Nomor
                                        Blok/Kavling, pembayaran ditujukan ke :<br>
                                        BANK CENTRAL ASIA<br>
                                        Cabang Galunggung, Malang<br>
                                        Atas Nama : PT CITRA ARGO TIRTA<br>
                                        Nomor Rekening : 4403014000, atau melalui virtual account:<br>
                                        Nomor Virtual Account NISP : 711021105313770 <br>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                PENGURUSAN FASILITAS KREDIT MELALUI BANK/LEMBAGA KEUANGAN/PEMBIAYAAN
                                <ol type="a">
                                    <li>Pemesan wajib melengkapi data-data yang diperlukan oleh
                                        Bank/Lembaga
                                        Keuangan/Pembiayaan selambat-lambatnya : 7 (Tujuh)
                                        Hari setelah tanda jadi (booking fee) untuk KPR PERTAMA,
                                        KEDUA, KETIGA, KEEMPAT dan KELIMA 3 (tiga) bulan sebelum
                                        DP Lunas untuk KPR PERTAMA,KEDUA, KETIGA, KEEMPAT,
                                        KELIMA, KEENAM dan
                                        seterusnya dengan cicilan Uang Muka (DP) lebih dari 3 (tiga)
                                        bulan. Apabila lewat dari waktu tersebut, pemesan telah lalai
                                        dengan alasan apapun maka PT. CITRA ARGO TIRTA berhak
                                        membatalkan Surat Pemesanan ini sesuai butir II dan butir XI di
                                        bawah.
                                    </li>
                                    <li>
                                        Apabila pemesan tidak memenuhi undangan untuk wawancara,
                                        dan/atau apabila pemesan sudah mendapatkan persetujuan kredit
                                        dari Bank/Lembaga Keuangan/Pembiayaan namun belum
                                        melakukan akad kredit dengan Bank/Lembaga
                                        Keuangan/Pembiayaan dihadapan Notaris, dan PT. CITRA ARGO
                                        TIRTA, telah melakukan pemberitahuan sebanyak 3 (tiga) kali, baik
                                        lisan maupun tertulis, maka pemesan telah lalai dan PT. CITRA
                                        ARGO TIRTA berhak
                                        membatalkan Surat Pemesanan ini sesuai butir XI di bawah.
                                    </li>
                                    <li>
                                        Apabila setelah persetujuan kredit dari Bank/Lembaga
                                        Keuangan/Pembiayaan kepada
                                        pemesan telah diberikan, ternyata pemesan harus
                                        menambah/membayar Uang Muka, maka pemesan wajib melunasi
                                        penambahan Uang Muka dimaksud selambat-lambatnya 14
                                        (empat belas) hari setelah tanggal surat persetujuan fasilitas kredit
                                        dari Bank/Lembaga
                                        Keuangan/Pembiayaan tersebut. Apabila lewat dari dalam jangka
                                        waktu tersebut, maka PT. CITRA ARGO TIRTA berhak untuk :
                                        <ol type="i">
                                            <li>memberikan waktu kepada pemesan untuk mengangsur
                                                Uang Muka yang harus ditambahkan dengan
                                                memperhitungkan biaya tambahan akibat mundurnya
                                                pelaksanaan akad kredit,atau
                                            </li>
                                            <li>
                                                membatalkan Surat Pemesanan ini sesuai butir XI dibawah.
                                            </li>
                                        </ol>
                                    <li>
                                        Apabila permohonan fasilitas kredit pemesan ditolak oleh minimal 2
                                        (dua)Bank/Lembaga Keuangan/Pembiayaan yang dituju, yang
                                        dibuktikan dengan surat penolakan dari
                                        Bank/Lembaga Keuangan/Pembiayaan dimaksud, maka PT.
                                        CITRA ARGO TIRTA berhak
                                        membatalkan Surat Pemesanan ini sesuai butir XI di bawah, dan
                                        uang yang sudah dibayarkan oleh pemesan kepada PT. CITRA
                                        ARGO TIRTA akan dikembalikan dengan syarat pemesan wajib
                                        mengembalikan kepada PT. CITRA ARGO TIRTA Asli Surat
                                        Pemesanan ini dan seluruh
                                        Asli kwitansi pembayaran terkait. Seluruh pengembalian tersebut
                                        adalah tanpa diberikan bunga apapun juga, setelah dipotong
                                        sebagai berikut:
                                        <ol type="i">
                                            <li>Tanda jadi (booking fee) dan pajak - pajak yang sudah
                                                disetor ke negara untuk KPR PERTAMA, KEDUA, KETIGA,
                                                KEEMPAT dan KELIMA.
                                            </li>
                                            <li>
                                                50% (lima puluh persen) dari seluruh uang yang sudah
                                                dibayarkan oleh pemesan untuk KPR PERTAMA, KEDUA,
                                                KETIGA, KEEMPAT, dan KELIMA dengan cicilan down
                                                payment lebih dari atau sama dengan 12 (dua belas) bulan.
                                            </li>
                                            <li>
                                                50% (lima puluh persen) dari seluruh uang yang sudah
                                                dibayarkan oleh pemesan untuk KPR KEENAM dan
                                                seterusnya.
                                            </li>
                                        </ol>
                                    </li>
                                    <li>Apabila diperjanjikan sebelumnya oleh PT. CITRA ARGO TIRTA
                                        dan pemesan bahwa seluruh/sebagian pembayaran Uang Muka,
                                        dibiayai oleh instansi/perusahaan seperti namun tidak terbatas PT.
                                        (Persero) Jamsostek, Yayasan Kesejahteraan Perumahan Prajurit
                                        dan
                                        Pegawai Negeri Sipil Departemen Pertahanan (YKPP DEPHAN)
                                        atau Badan Pertimbangan Tabungan Perumahan Pegawai Negeri
                                        Sipil (BAPERTARUM) dan ketentuan mengenai Fasilitas Likuiditas
                                        Pembiayaan Perumahan (FLPP), maka pemesan menjamin
                                        sepenuhnya
                                        bertanggung jawab atas pelunasan pembayaran Uang Muka
                                        tersebut kepada PT. CITRA ARGO TIRTA jika instansi/perusahaan
                                        dimaksud batal membayar Uang Muka dimaksud dalam
                                        waktu 1 (satu) bulan sejak tanggal jatuh temponya sebagaimana
                                        jadwal pembayaran di atas, maka PT. CITRA ARGO TIRTA berhak
                                        membatalkan Perjanjian ini sesuai butir XI dibawah dan uang yang
                                        sudah dibayarkan oleh pemesan kepada PT. CITRA ARGO TIRTA
                                        akan dikembalikan dengan syarat pemesan mengembalikan
                                        kepada PT. CITRA ARGO TIRTA asli Surat Pemesanan ini dan
                                        seluruh asli kwitansi pembayaran terkait. Seluruh pengembalian
                                        tersebut tanpa
                                        diberikan bunga apapun juga, setelah dipotong biaya pembatalan
                                        sebagaimana yang diatur didalambutir X huruf d.
                                    </li>
                                </ol>
                            </li>
                            <li>
                                Untuk pembatalan Surat Pemesanan ini, maka Para Pihak dengan ini setuju
                                dan sepakat untuk
                                melepaskan ketentuan ketentuan Pasal 1265, 1266, 1267 Kitab UndangUndang Hukum Perdata
                                dan pemesan dengan ini memberikan kuasa
                                sepenuhnya kepada PT. CITRA ARGO TIRTA dengan hak substitusi
                                untuk menandatangani surat pembatalannya dan surat tersebut berlaku
                                efektif dan sah dengan PT. CITRA ARGO TIRTA mengirim surat
                                pembatalannya kepada pemesan, tanpa perlu melalui proses Pengadilan
                                dan berlaku terhitung tanggal pengiriman surat pembatalan tersebut oleh
                                PT.
                                CITRA ARGO TIRTA yang dibuktikan dengan tanda terima yang
                                dikeluarkan oleh kantor pos/perusahaan jasa kurir/kurir.

                            </li>
                            <li>
                                KETENTUAN PINDAH BLOK DAN NOM0R TANAH BESERTA BANGUNAN
                                <ol type="a">
                                    <li>Pemindahan Blok/Kavling oleh PT. CITRA ARGO TIRTA karena
                                        perubahan peruntukan blok atau karena sesuatu dan lain hal
                                        sesuai dengan ketentuan yang berlaku, tidak dikenakan biaya
                                        apapun dan untuk itu PT. CITRA ARGO TIRTA akan
                                        memberitahukan terlebih dahulu.
                                    </li>
                                    <li>
                                        Pemindahan Blok/Kavling atas keinginan pemesan diperbolehkan
                                        dengan ketentuan :
                                        <ol type="i">
                                            <li>
                                                Harus mengajukan surat permohonan pindah Blok/ Kavling
                                                dan disetujui oleh PT. CITRA ARGO TIRTA.
                                            </li>
                                            <li>
                                                Dikenakan biaya adminstrasi sebesar 2 % (dua persen) dari harga jual
                                                sebelum PPN berdasarkan Surat Pemesanan ini.
                                            </li>
                                            <li>
                                                Jumlah pembayaran yang telah dibayarkan untuk Blok sebelumnya, setelah
                                                dikurangi nilai PPN dan PPh atas
                                                jumlah pembayaran yang telah dilakukan pemesan kepada PT. CITRA ARGO
                                                TIRTA , akan diperhitungkan sebagai
                                                pembayaran Blok yang baru
                                            </li>
                                            <li>
                                                Pemesan bertanggung jawab atas segala kewajiban perpajakan yang mungkin
                                                timbul dari pindah Blok/Kavling tersebut;
                                            </li>
                                            <li>
                                                Harga Tanah dan Bangunan/ Kavling yang lama diperhitungkan dari harga
                                                pada saat pemesanan, dan
                                                harga Tanah dan Bangunan/ Kavling yang baru diperhitungkan dari harga
                                                yang berlaku pada saat pindah Blok/Kavling.
                                            </li>
                                            <li>
                                                Menandatangani dan menyerahkan seluruh akta, perjanjian, surat,
                                                formulir, dan dokumen lainnya yang dipersyaratkan
                                                oleh PT. CITRA ARGO TIRTA;
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                KETENTUAN PENGALIHAN HAK, KEWAJIBAN DAN TANGGUNG JAWAB SERTA GANTI NAMA
                                <ol type="a">
                                    <li>
                                        Pemesan harus mengajukan permohonan secara tertulis dan bersama-sama dengan
                                        pembeli baru (PIHAK KETIGA) menghadap
                                        kepada PT. CITRA ARGO TIRTA.
                                    </li>
                                    <li>
                                        Apabila pemesan mempergunakan fasilitas KPR dari Bank/Lembaga
                                        Keuangan/Pembiayaan, maka harus ada
                                        persetujuan secara tertulis dari Bank/Lembaga Keuangan/Pembiayaan tersebut.
                                    </li>
                                    <li>
                                        Apabila pemesan mempergunakan fasilitas pembayaran melalui developer, maka wajib
                                        melunasi seluruh sisa kewajiban
                                        pembayaran Tanah dan Bangunan / Kavling.
                                    </li>
                                    <li>
                                        Pemesan wajib membayar biaya administrasi pengalihan hak sebesar 2.5% (dua koma
                                        lima persen) dari harga jual sebelum
                                        PPN berdasarkan Surat Pemesanan ini.
                                    </li>
                                    <li>
                                        Pemesan wajib membayar biaya (PPh) final sebesar 2.5% (satu persen) dari
                                        Harga Tanah dan Bangunan berdasarkan perjanjian ini atau Nilai Jual Objek Pajak
                                        (NJOP)
                                        PBB Tahun berjalan, diperhitungkan nilai tertinggi.
                                    </li>
                                    <li>
                                        Khusus untuk mengganti nama ke atas nama pihak keluarga, hanya terbatas pada
                                        hubungan: orang tua, istri/suami dengan harta
                                        campur, anak kandung yang dapat dibuktikan secara hukumdengan: akta kelahiran,
                                        akta nikah dan/atau kartu keluarga, dsbnya
                                        yang dianggap cukup oleh PT. CITRA ARGO TIRTA, maka pemesan wajib membayar
                                        kepada PT. CITRA ARGO TIRTA biaya administrasi
                                        ganti nama sebesar Rp.250.000,- (dua ratus lima puluh ribu rupiah) per kejadian
                                        dan pergantian nama hanya berlaku untuk satu kali
                                        pergantian nama
                                    </li>
                                    <li>. Pemesan dan/ atau PIHAK KETIGA tersebut, secara sendiri-sendiri maupun
                                        bersama-sama bertanggung jawab
                                        atas segala kewajiban perpajakan yang mungkin timbul dari pengalihan hak
                                        tersebut.
                                    </li>
                                    <li>
                                        Semua ketentuan yang berlaku pada Surat Pemesanan ini tetap berlaku
                                        terhadap pemesan dan/atau PIHAK KETIGA tersebut;
                                    </li>
                                    <li>
                                        Menandatangani dan menyerahkan seluruh akta, perjanjian, surat, formulir,
                                        dan dokumen lainnya yang dipersyaratkan oleh PT.CITRA ARGO TIRTA
                                    </li>
                                </ol>
                            </li>
                            <li>
                                FORCE MAJEURE <br>
                                Para pihak setuju untuk mengadakan perubahan/penambahan atas Surat Pemesanan ini apabila
                                di kemudian hari terjadi Force Majeure. Yang
                                dimaksud dengan Force Majeure adalah hal-hal yang dapat mempengaruhi jalannya
                                pelaksanaan pekerjaan PT. CITRA ARGO TIRTA antara lain:
                                gempa bumi, banjir, bencana alam lainnya, huru-hara, perang, tindakan kekerasan oleh
                                pihak lain baik
                                secara perorangan atau massal, termasuk tindakan, kebijakan/peraturan Pemerintah
                                termasuk di bidang fiskal atau moneter, .
                                keadaan politik atau keadaan langka bahan bangunan yang mempengaruhi kegiatan usaha di
                                bidang properti dan turunannya.
                            </li>
                            <li>
                                ARBITRASE
                                <ol type="a">
                                    <li>
                                        Jika timbul perselisihan dalam melaksanakan Surat Pemesanan ini, maka akan
                                        diselesaikan oleh para pihak secara musyawarah.

                                    </li>
                                    <li>
                                        Apabila dalam jangka waktu 60 (enam puluh) hari sejak sengketa atau beda
                                        pendapat tersebut, penyelesaian secara musyawarah
                                        tidak tercapai, maka para pihak sepakat untuk menyelesaikannya pada tingkat
                                        pertama dan terakhir dengan cara arbitrase melalui
                                        Badan Arbitrase Nasional Indonesia (BANI) di Jakarta, sesuai dengan
                                        Undang-Undang Republik nomor 30 tahun 1999 tentang
                                        Arbitrase dan Alternatif Penyelesaian Sengketa, berikut perubahan dan
                                        penambahannya di kemudian hari. Indonesia
                                    </li>
                                    <li>
                                        Kesepakatan para pihak untuk menyelesaikan sengketa dengan cara arbitrase
                                        meniadakan hak para pihak untuk mengajukan penyelesaian sengketa ke Pengadilan
                                        Negeri.
                                    </li>
                                    <li>
                                        Para pihak setuju bahwa keputusan BANI adalah final dan mengikat para pihak,
                                        serta untuk pelaksanaan keputusan BANI dapat
                                        dimintakan fiat eksekusinya ke Pengadilan Negeri setempat.
                                    </li>
                                </ol>
                            </li>
                            <br>
                            <p align=justify style="text-indent:1.5cm;">
                                Dengan menyetujui Syarat dan Ketentuan ini, saya selaku pembeli di Perumahan Greenland
                                At Tidar menyatakan telah membaca dan memahami hal - hal yang tercantum pada Syarat dan
                                Ketentuan Transaksi Pembelian Rumah di Greenland At Tidar beserta Buku Tata Tertib dan
                                Pedoman Desain dari PT. Citra Argo Tirta.
                            </p>
                    </div>

                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" id="checklist" onclick="enableButton('lanjutkan')" class="btn btn-primary"
                    data-bs-dismiss="modal" aria-label="Close">Baik saya
                    mengerti dan setuju</button>
            </div>
        </div>
    </div>
</div>



@endsection

<script>
    window.addEventListener('disclaim', function() {
        if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
            document.getElementById("checklist").disabled = false;
        }
    });

    function enableButton(button) {
        document.getElementById(button).disabled = false;

        // document.getElementById("disclaimer").disabled = true;
    }

    function validate() {
      var remember = document.getElementById("disclaimer");
      if (remember.checked==false) {
       document.getElementById("lanjutkan").disabled = true;
      remember.setAttribute("data-bs-target", "#disclaim");

      }  if (remember.checked==true) {
       document.getElementById("lanjutkan").disabled = true;
        remember.setAttribute("data-bs-target", "hahahaha");
      }
    }
</script>

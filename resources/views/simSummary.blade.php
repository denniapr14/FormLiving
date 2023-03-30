@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle', 'Forms | Simulasi Ringkasan')
@section('body', '')


@section('content')

    <div class="cluster">
        <div class="header-simulation mobile-only">
            <div class="ornament one">
                <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
            </div>
            <div class="nav-header">
                <div class="ic-back">
                    <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">
                </div>
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

                @if (!empty(Session::get('guest')))
                    <form
                        action="{{ route('simulation-sumary.action', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah, $payment, $kkpr->id_kkpr, $voucher, $pelanggan->id_pelanggan]) }}"
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
                                          <img src="{{ asset('Home') }}/images/tipe/{{$tipeRumah->img_tr}}" alt="">
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
                                            <p>Rp. {{  rupiah($tipeRumah->harga_tr) }}</p>
                                        </div>

                                        <div class="col-5 col-lg-4">
                                            <p>Promo Digunakan</p>
                                        </div>

                                        @if (!empty($promo))
                                        <div class="col-7 col-lg-8">
                                            <p>Rp. {{  rupiah($promo->diskon_promo) }}</p>
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
                                                <h6>Rp. {{  rupiah($tipeRumah->harga_tr) }}</h6>
                                                <input type="text" name="harga" hidden
                                                    value=" {{  $tipeRumah->harga_tr }}">
                                            </div>
                                        @endif



                                    </div>
                                    <div class="form-check checkbox">
                                       <input type="checkbox" class="form-check-input" name="disclaimer"
                                            id="disclaimer" onClick="validate()"  value="checkedValue" data-bs-toggle="modal"
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
                @if (!empty(Session::get('user')))
                    <form
                        action="{{ route('simulation-sumary.action', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah, $payment, $kkpr->id_kkpr, $voucher, $pelanggan->id_pelanggan]) }}"
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
                                            <p>Promo Digunakan</p>
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
                                                <input type="text" name="harga" hidden
                                                    value=" {{ $tipeRumah->harga_tr }}">
                                            </div>
                                        @endif



                                    </div>
                                    <div class="form-check checkbox">
                                        <input type="checkbox" class="form-check-input" name="disclaimer"
                                            id="disclaimer" onClick="validate()"  value="checkedValue" data-bs-toggle="modal"
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

            </div>
        </div>
    </div>

    <!-- Modal Modification Detail -->
    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
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
    <div class="modal fade" id="disclaim" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg disclaimer" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div>
                        <div class="section">
                            <h5 class="modal-title">
                                Syarat dan Ketentuan <br>
                                Transaksi Pembelian Rumah di Greenland At Tidar
                            </h5>

                            <h6>I. Pemesanan</h6>
                            <p align="justify">
                                1.	Pembeli dan PT. Citra Argo Tirta sepakat apabila luas tanah yang dicantumkan dalam Formulir Pesanan berbeda dengan luas yang dicantumkan dalam Sertifikat Tanah yang diterbitkan oleh Kantor Badan Pertanahan Nasional, dimana ada selisih kelebihan/kekurangan luas tanah, maka akan diperhitungkan sebesar Rp……………………per meter persegi.
                            </p>
                             <h6>II. Cara Pembayaran dan Pengumpulan Data KPR</h6>
                            <p align="justify">
                                <ol>
                                    <li>Pembeli berkewajiban untuk membayar angsuran sesuai dengan tanggal yang telah ditetapkan dalam Formulir Pesanan.</li>
                                    <li>Pembayaran angsuran dapat dilakukan secara tunai, transfer ataupun dengan cek/bilyet giro dan disetorkan pada rekening PT. Citra Argo Tirta yang telah ditentukan.</li>
                                    <li>Pembayaran angsuran dengan cek/bilyet giro ataupun dengan cara pembayaran lainnya tersebut di atas, baru dianggap sah apabila dana tersebut telah masuk rekening PT. Citra Argo Tirta.</li>
                                    <li>Untuk setiap hari keterlambatan pembayaran angsuran sebagaimana ditentukan dalam Formulir Pesanan, Pembeli dikenakan denda keterlambatan sebesar Rp. 150.000 per hari. Ketentuan besarnya denda ini hanya berlaku untuk keterlambatan sampai dengan 30 (tiga puluh) hari sejak jatuh tempo pembayaran angsuran.</li>
                                    <li>Terjadinya keterlambatan pembayaran angsuran sudah merupakan bukti yang cukup akan kelalaian Pembeli, dan apabila keterlambatan pembayaran tersebut telah melewati jangka waktu 30 hari maka Formulir Pesanan menjadi batal.</li>
                                    <li>Pembayaran atas Formulir Pesanan yang menggunakan Fasilitas Kredit dari Bank adalah merupakan inisiatif dan tanggung jawab Pembeli.PT. Citra Argo Tirta hanya membantu melengkapi data yang dibutuhkan Bank, selanjutnya Pembeli wajib melengkapi persyaratan fasilitas kredit melalui PT. Citra Argo Tirta.</li>
                                    <li>Khusus cara bayar KPR, syarat dan ketentuan sesuai dengan Peraturan BI dan Bank Pemberi fasilitas KPR yang berlaku pada saat realisasi KPR.</li>
                                    <li>Program promo khusus hanya berlaku untuk bank yang sudah bekerjasama dengan PT.Citra Argo Tirta, dan tidak berlaku di bank lain.</li>
                                    <li>Apabila dikemudian hari terjadi perubahan nilai nominal pemberian fasilitas kredit oleh Bank, maka Pembeli bersedia membayar dan melunasi kekurangan nilai nominal fasilitas kredit tersebut sesuai metode pembayaran dari PT. Citra Argo Tirta.</li>
                                </ol>
                            </p>
                            <h6>III. Pembatalan</h6>
                            <p align="justify">
                                <ol>
                                    <li>Surat Pesanan ini menjadi batal dan selanjutnya hak atas kavling tersebut menjadi hak PT. Citra Argo Tirta untuk menjual ke orang lain, apabila :
                                        <ol style="list-style-type:lower-alpha" style:"border-left:3px;">
                                            <li>Keterlambatan pembayaran sebagaimana dimaksud dalam butir II.5.</li>
                                            <li>Pihak Kedua membatalkan sendiri pesanannya.</li>
                                            <li>Keterlambatan dalam melengkapi syarat-syarat fasilitas kredit.</li>
                                        </ol>
                                    </li>
                                    <li>Apabila Pembeli dengan alasan apapun membatalkan transaksi pembelian rumah sebagaimana dimaksud butir III.1, maka Pembeli setuju untuk mengikuti ketentuan dari PT. Citra Argo Tirta, yaitu :
                                        <ol style="list-style-type:lower-alpha" style:"border-left:3px;">
                                            <li>Seluruh uang tanda jadi hangus.</li>
                                            <li>Pembeli dikenakan biaya administrasi sebesar 30% dari jumlah total uang yang telah dibayarkan kepada PT. Citra Argo Tirta atau 3% dari harga jual rumah, mana yang lebih tinggi.</li>
                                            <li>Keterlambatan dalam melengkapi syarat-syarat fasilitas kredit.</li>
                                        </ol>
                                    </li>
                                    <li>Pengembalian uang kepada Pembeli akan dilakukan setelah PT. Citra Argo Tirta berhasil menjual rumah tersebut kepada Pihak ketiga yang mana pengembalian uang tersebut dilakukan secara bertahap setelah dipotong biaya administrasi yaitu :
                                        <ol style="list-style-type:lower-alpha" style:"border-left:3px;">
                                            <li>Tahap I : 20% dari uang yang telah dibayarkan kepada PT. Citra Argo Tirta.</li>
                                            <li>Tahap II  : 30% dari uang yang telah dibayarkan kepada PT. Citra Argo Tirta.</li>
                                            <li>Tahap III : 50% dari uang yang telah dibayarkan kepada PT. Citra Argo Tirta.</li>
                                        </ol>
                                    </li>
                                    <li>Dengan membatalkan seperti yang dimaksud dalam butir III.1 maka semua kwitansi dan dokumen apapun yang pernah diterima oleh Pembeli dari PT. Citra Argo Tirta  tidak dapat dijadikan sebagai bukti bagi Pembeli.</li>
                                </ol>
                            </p>
                            <h6>IV. Ketentuan Selama Pembangunan</h6>
                            <p align="justify">
                                 <ol>
                                     <li>Pelaksanaan pembangunan didasarkan pada spesifikasi teknik dan gambar rumah yang telah dikeluarkan oleh PT. Citra Argo Tirta.</li>
                                     <li>Untuk pembelian rumah dengan kavling khusus, untuk pelaksanaan pembangunan diperkenankan free design dan tetap berpedoman sesuai dengan prosedur PT. Citra Argo Tirta.</li>
                                     <li>Adanya pekerjaan tambahan atau perubahan spesifikasi teknik dan gambar harap diinformasikan di awal pemesanan.</li>
                                     <li>Selama masa pembangunan, Pembeli tidak diperkenankan untuk melakukan pekerjaan tambahan atau perubahan spesifikasi teknik dan gambar tanpa persetujuan dari PT. Citra Argo Tirta.</li>
                                     <li>Pengajuan order pembangunan akan dilakukan setelah Pembeli menyelesaikan pembayaran 50% dari harga jual dan penyelesaian bangunan akan dilaksanakan oleh PT. Citra Argo Tirta selambat-lambatnya 8 bulan untuk type dibawah 70, sedangkan untuk type diatas 70 akan disepakati oleh kedua belah pihak.</li>
                                </ol>
                            </p>
                           <h6>V. Serah Terima Kavling</h6>
                            <p align="justify">
                                 <ol>
                                     <li>Serah Terima Kavling akan dilaksanakan setelah Pembeli membayar lunas seluruh harga Tanah dan Bangunan dan pembangunan telah selesai 100%</li>
                                     <li>Serah Terima Sepihak akan dilaksanakan jika pembeli tidak dapat melakukan serah terima kavling dalam waktu yang telah ditentukan oleh PT.Citra Argo Tirta.</li>
                                     <li>Pembeli berjanji serta mengikatkan diri untuk tetap menggunakan tanah dan bangunan sebagai rumah tinggal. </li>
                                     <li>Biaya Pemeliharaan dan Perbaikan Lingkungan serta penggunaan air bersih dimulai sejak tanggal ditandatanganinya BAST yang besarnya ditentukan oleh PT.Citra Argo Tirta.</li>
                                 </ol>
                            </p>
                            <h6>VI. Pelaksanaan Penandatanganan Akte Jual Beli (AJB) dan Pengambilan Sertifikat</h6>
                            <p align="justify">
                                 <ol>
                                     <li>Pelaksanaan penandatanganan Akte Jual Beli (AJB) akan dilakukan di hadapan Pejabat Pembuat Akta Tanah (PPAT) yang ditunjuk PT. Citra Argo Tirta setelah pembeli melunasi seluruh harga tanah dan bangunan.</li>
                                     <li>Pengambilan Sertifikat yang sudah selesai balik nama dilakukan di PT. Citra Argo Tirta disertai dengan mengembalikan Asli Formulir Pesanan, Asli Kwitansi-kwitansi.</li>
                                 </ol>
                            </p>
                            <h6>VII. Peralihan/Pengoperan Hak</h6>
                            <p align="justify">
                                 <ol>
                                     <li>Pengalihan/pengoperan hak kepada pihak lain oleh Pembeli yang dilaksanakan sebelum penandatanganan Akta Jual Beli (AJB) dihadapan Notaris/PPAT adalah batal kecuali telah mendapat persetujuan secara tertulis terlebih dahulu dari PT. Citra Argo Tirta.</li>
                                     <li>2Pembeli diwajibkan untuk membayar biaya administrasi 5% (lima persen) dari harga jual rumah, yang harus dibayar sebelum pengalihan/pengoperan hak dilaksanakan.</li>
                                 </ol>
                            </p>
                            <h6>VIII. Pemberitahuan dan Perubahan Alamat</h6>
                            <p align="justify">
                                 <ol>
                                     <li>Pembeli wajib memberitahukan kepada PT. Citra Argo Tirta apabila mengalami perubahan alamat dan lain sebagainya. Pemberitahuan mengenai perubahan alamat dan lain sebagainya tersebut dapat ditujukan kepada :
                                         <ul style="list-style-type: none;">
                                             <li>PT. Citra Argo Tirta </li>
                                             <li>Jalan Raya Candi VIC Perumahan Greenland At Tidar Blok A-1 Malang</li>
                                             <li>No. Telepon : 0341-588805</li>
                                         </ul>
                                     </li>
                                     <li>Segala akibat yang timbul karena tidak adanya pemberitahuan perubahan alamat Pembeli menjadi tanggung jawab Pembeli sepenuhnya.</li>
                                 </ol>
                            </p>
                            <br>
                            <p align=justify style = "text-indent:1.5cm;">
                                Dengan menandatangani formulir ini, saya selaku pembeli di Perumahan Greenland At Tidar menyatakan telah membaca, memahami dan menyetujui hal - hal yang tercantum pada Syarat dan Ketentuan Transaksi Pembelian Rumah di Greenland At Tidar beserta Buku Tata Tertib dan Pedoman Desain dari PT. Citra Argo Tirta.
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

<?php
function rupiah($angka)
{
    $hasil_rupiah = number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>

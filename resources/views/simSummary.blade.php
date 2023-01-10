@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Simulasi Ringkasan')
@section('body','')


@section('content')

<div class="cluster">
    <div class="header-simulation mobile-only">
        <div class="ornament one">
            <img src="/images/img-ornament1.png" alt="">
        </div>
        <div class="nav-header">
            <div class="ic-back">
                <img src="/images/ic-back-sim.png" alt="">
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
                                <img src="/images/img-cluster.png" alt="">
                            </div>
                            <div class="items">
                                <div class="type-item">
                                    <p>Type</p>
                                    <h5>150</h5>
                                </div>
                                <div class="type-item">
                                    <p>Blok</p>
                                    <h5>A2</h5>
                                </div>
                                <div class="type-item">
                                    <p>Cluster</p>
                                    <h5>The Mainroad</h5>
                                </div>
                                <div class="type-item">
                                    <p>Start from</p>
                                    <h5>Rp. 975,000,000</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 right-column order-3">
                        <div class="row summary">
                            <div class="col-5 col-lg-4">
                                <p>Nama (Sesuai KTP)</p>
                            </div>
                            <div class="col-7 col-lg-8">
                                <p>Gilbert Setiawan</p>
                            </div>
                            <div class="col-5 col-lg-4">
                                <p>NIK</p>
                            </div>
                            <div class="col-7 col-lg-8">
                                <p>24348454545000003i</p>
                            </div>
                            <div class="col-5 col-lg-4">
                                <p>No. Whatsapp (Aktif)</p>
                            </div>
                            <div class="col-7 col-lg-8">
                                <p>+6285648984919</p>
                            </div>
                            <div class="col-5 col-lg-4">
                                <p>Alamat</p>
                            </div>
                            <div class="col-7 col-lg-8">
                                <p>Jl. Raya Tidar No. 18, Malang</p>
                            </div>
                            <div class="col-5 col-lg-4">
                                <p>Email</p>
                            </div>
                            <div class="col-7 col-lg-8">
                                <p>gl@gilbertsetiawan.com</p>
                            </div>
                            <div class="col-5 col-lg-4">
                                <p>No. NPWP</p>
                            </div>
                            <div class="col-7 col-lg-8">
                                <p>1234567890</p>
                            </div>
                            <div class="col-5 col-lg-4">
                                <p>Cluster / Blok</p>
                            </div>
                            <div class="col-7 col-lg-8">
                                <p>The Mainroad / A-2</p>
                            </div>
                            <div class="col-5 col-lg-4">
                                <p>Luas Tanah</p>
                            </div>
                            <div class="col-7 col-lg-8">
                                <p>170 m2</p>
                            </div>
                            <div class="col-5 col-lg-4">
                                <p>Luas Bangunan</p>
                            </div>
                            <div class="col-7 col-lg-8">
                                <p>90 m2</p>
                            </div>
                            <div class="col-5 col-lg-4">
                                <p>Biaya Modifikasi</p>
                            </div>
                            <div class="col-7 col-lg-8 detail">
                                <p>Rp. 250,000,000</p>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#detail">Lihat Detail</a>
                            </div>
                            <div class="col-5 col-lg-4">
                                <p>Harga Rumah</p>
                            </div>
                            <div class="col-7 col-lg-8">
                                <p>Rp. 955,000,000</p>
                            </div>
                            <div class="col-5 col-lg-4">
                                <p>Promo Digunakan</p>
                            </div>
                            <div class="col-7 col-lg-8">
                                <p>- Rp. 5,000,000</p>
                            </div>
                            <div class="col-5 col-lg-4"></div>
                            <div class="col-7 col-lg-8 ">
                                <div class="promo">
                                    <img src="/images/ic-promo.png" alt="">
                                    <p>Kode Kupon: BELIRUMAH</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-5 col-lg-4">
                                <h6>Harga Akhir Rumah</h6>
                            </div>
                            <div class="col-7 col-lg-8">
                                <h6>Rp. 950,000,000</h6>
                            </div>
                        </div>
                        <div class="form-check checkbox">
                            <input type="checkbox" class="form-check-input" name="disclaimer" id="disclaimer"
                                value="checkedValue" data-bs-toggle="modal" data-bs-target="#disclaim">
                            <label class="form-check-label" for="disclaimer">
                                Disclaimer: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-groups">
                <a href="/k-simulation-order.html" type="button" class="btn btn-grey">Kembali</a>
                <a href="/k-congratulation.html" type="button" class="btn btn-primary">Lanjutkan</a>
            </div>
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
                                <img src="/images/img-modification1.png" alt="">
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
                                <img src="/images/img-modification2.png" alt="">
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
                                <img src="/images/img-modification3.png" alt="">
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
                            Disclaimer
                        </h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dapibus sem sit amet
                            nibh
                            molestie ultrices. Duis blandit, nisl ut venenatis convallis, metus magna mattis mi,
                            eget
                            euismod risus sem nec sapien. Vivamus placerat scelerisque lobortis. Fusce feugiat
                            luctus
                            ipsum
                            ut tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque
                            habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce
                            massa
                            dui, vestibulum ut fermentum at, volutpat aliquam nibh. Proin molestie et eros ut
                            interdum.
                            Vivamus pretium a lorem nec elementum. In fringilla mi eget metus posuere, at vulputate
                            ante
                            vehicula.</p>
                    </div>
                    <div class="section">
                        <h5>Harga sudah termasuk</h5>
                        <ol>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                            <li>Integer dapibus sem sit amet nibh molestie ultrices. </li>
                            <li>Duis blandit, nisl ut venenatis convallis, metus magna mattis mi, eget euismod risus
                                sem
                                nec
                                sapien. </li>
                            <li>Vivamus placerat scelerisque lobortis. Fusce feugiat luctus ipsum ut tincidunt.
                            </li>
                            <li>Interdum et malesuada fames ac ante ipsum primis in faucibus. </li>
                            <li>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                egestas. </li>
                            <li>Fusce massa dui, vestibulum ut fermentum at, volutpat aliquam nibh. </li>
                            <li>Proin molestie et eros ut interdum. Vivamus pretium a lorem nec elementum. </li>
                            <li>In fringilla mi eget metus posuere, at vulputate ante vehicula.</li>
                        </ol>
                    </div>

                    <div class="section">
                        <h5>Harga belum termasuk</h5>
                        <ol>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                            <li>Integer dapibus sem sit amet nibh molestie ultrices. </li>
                            <li>Duis blandit, nisl ut venenatis convallis, metus magna mattis mi, eget euismod risus
                                sem
                                nec
                                sapien. </li>
                            <li>Vivamus placerat scelerisque lobortis. Fusce feugiat luctus ipsum ut tincidunt.
                            </li>
                            <li>Interdum et malesuada fames ac ante ipsum primis in faucibus. </li>
                            <li>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                egestas. </li>
                            <li>Fusce massa dui, vestibulum ut fermentum at, volutpat aliquam nibh. </li>
                            <li>Proin molestie et eros ut interdum. Vivamus pretium a lorem nec elementum. </li>
                            <li>In fringilla mi eget metus posuere, at vulputate ante vehicula.</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Baik saya
                    mengerti dan setuju</button>
            </div>
        </div>
    </div>
</div>



@endsection

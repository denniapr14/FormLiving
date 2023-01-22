@extends('kioskTemplate.app')
@extends('kioskTemplate.sidebarStep')

@section('tittle','Forms | Simulasi Kluster')


@section('body','kiosk')


@section('content')

<div class="kiosk-content">
    <div class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="mod-type">
                        <div class="type-image">
                            <img src="{{ asset('Home') }}/images/img-cluster.png" alt="">
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
                <div class="col-12 ">
                    <h3 class="page-title mt-0">Ringkasan Pemesanan Sementara</h3>
                    <div class="row summary">
                        <div class="col-6 first">
                            <p>Nama (Sesuai KTP)</p>
                        </div>
                        <div class="col-6 last">
                            <p>Gilbert Setiawan</p>
                        </div>
                        <div class="col-6 first">
                            <p>NIK</p>
                        </div>
                        <div class="col-6 last">
                            <p>24348454545000003i</p>
                        </div>
                        <div class="col-6 first">
                            <p>No. Whatsapp (Aktif)</p>
                        </div>
                        <div class="col-6 last">
                            <p>+6285648984919</p>
                        </div>
                        <div class="col-6 first">
                            <p>Alamat</p>
                        </div>
                        <div class="col-6 last">
                            <p>Jl. Raya Tidar No. 18, Malang</p>
                        </div>
                        <div class="col-6 first">
                            <p>Email</p>
                        </div>
                        <div class="col-6 last">
                            <p>gl@gilbertsetiawan.com</p>
                        </div>
                        <div class="col-6 first">
                            <p>No. NPWP</p>
                        </div>
                        <div class="col-6 last">
                            <p>1234567890</p>
                        </div>
                        <div class="col-6 first">
                            <p>Cluster / Blok</p>
                        </div>
                        <div class="col-6 last">
                            <p>The Mainroad / A-2</p>
                        </div>
                        <div class="col-6 first">
                            <p>Luas Tanah</p>
                        </div>
                        <div class="col-6 last">
                            <p>170 m2</p>
                        </div>
                        <div class="col-6 first">
                            <p>Luas Bangunan</p>
                        </div>
                        <div class="col-6 last">
                            <p>90 m2</p>
                        </div>
                        <div class="col-6 first">
                            <p>Biaya Modifikasi</p>
                        </div>
                        <div class="col-6 last detail">
                            <p>Rp. 250,000,000</p>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#detail">Lihat Detail</a>
                        </div>
                        <div class="col-6 first">
                            <p>Harga Rumah</p>
                        </div>
                        <div class="col-6 last">
                            <p>Rp. 955,000,000</p>
                        </div>
                        <div class="col-6 first">
                            <p>Promo Digunakan</p>
                        </div>
                        <div class="col-6 last">
                            <p>- Rp. 5,000,000</p>
                        </div>
                        <div class="col-6 first"></div>
                        <div class="col-6 last ">
                            <div class="promo">
                                <img src="{{ asset('Home') }}/images/ic-promo.png" alt="">
                                <p>Kode Kupon: <b>BELIRUMAH</b></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-6 first">
                            <h6>Harga Akhir Rumah</h6>
                        </div>
                        <div class="col-6 last">
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
            <div class="btn-groups-kiosk">
                <a href="/kiosk/k-simulation-order.html" type="button" class="btn btn-grey">Kembali</a>
                <a href="/kiosk/k-congratulation.html" type="button" class="btn btn-primary">Lanjutkan</a>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content disclaimer">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
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
                                ut tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                                Pellentesque
                                habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                                Fusce
                                massa
                                dui, vestibulum ut fermentum at, volutpat aliquam nibh. Proin molestie et eros ut
                                interdum.
                                Vivamus pretium a lorem nec elementum. In fringilla mi eget metus posuere, at
                                vulputate
                                ante
                                vehicula.</p>
                        </div>
                        <div class="section">
                            <h5>Harga sudah termasuk</h5>
                            <ol>
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                                <li>Integer dapibus sem sit amet nibh molestie ultrices. </li>
                 scelerisque               <li>Duis blandit, nisl ut venenatis convallis, metus magna mattis mi, eget euismod
                                    risus
                                    sem
                                    nec
                                    sapien. </li>
                                <li>Vivamus placerat scelerisque lobortis. Fusce feugiat luctus ipsum ut tincidunt.
                                </li>
                                <li>Interdum et malesuada fames ac ante ipsum primis in faucibus. </li>
                                <li>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                                    turpis
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
                                <li>Duis blandit, nisl ut venenatis convallis, metus magna mattis mi, eget euismod
                                    risus
                                    sem
                                    nec
                                    sapien. </li>
                                <li>Vivamus placerat scelerisque lobortis. Fusce feugiat luctus ipsum ut tincidunt.
                                </li>
                                <li>Interdum et malesuada fames ac ante ipsum primis in faucibus. </li>
                                <li>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                                    turpis
                                    egestas. </li>
                                <li>Fusce massa dui, vestibulum ut fermentum at, volutpat aliquam nibh. </li>
                                <li>Proin molestie et eros ut interdum. Vivamus pretium a lorem nec elementum. </li>
                                <li>In fringilla mi eget metus posuere, at vulputate ante vehicula.</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-primary">Baik saya mengerti dan setuju</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

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
                    <h3 class="page-title mt-0">Form Pemesanan</h3>
                    <div class="row form-order">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Nama (Sesuai KTP)">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="wa" id="wa"
                                    placeholder="No. Whataspp (Aktif)">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="alamat" id="alamat"
                                    placeholder="Alamat">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="npwp" id="npwp"
                                    placeholder="No. NPWP">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select class="form-select" name="gender" id="gender">
                                    <option disabled selected>Jenis Kelamin</option>
                                    <option>Laki Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-form" data-bs-toggle="modal"
                                    data-bs-target="#modelId">
                                    <div class="promo-text"><img src="{{ asset('Home') }}/images/ic-promo.png" alt=""> Makin Untung
                                        Pakai Promo</div>
                                    <div><i class="bi-chevron-right"></i></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-groups-kiosk">
                <a href="/kiosk/simulasi-harga" type="button" class="btn btn-grey">Kembali</a>
                <a href="/kiosk/simulasi-data-konfirmasi" type="button"
                    class="btn btn-primary">Lanjutkan</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade promo" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body promo-modal">
                    <h5 class="promo-title">
                        Pakai Promo
                    </h5>

                    <div class="promo-input">
                        <input type="text" class="form-control" name="promo" id="promo"
                            placeholder="Masukkan kode promo">

                        <div class="btn">Terapkan</div>
                    </div>
                    <!-- STATE PROMO -->
                    <div class=" d-block">

                        <h5 class="mb-4">Pilih Promo</h5>
                        <div class="promo-item active">
                            <div class="promo-icon">
                                <img src="{{ asset('Home') }}/images/ic-promo.png" alt="Promo">
                            </div>
                            <div class="promo-text">
                                <h6>Cashback Rp. 5.000.000</h6>
                                <p>Berlaku hingga: 15 Mei 2022</p>
                            </div>
                        </div>
                        <div class="promo-item">
                            <div class="promo-icon">
                                <img src="{{ asset('Home') }}/images/ic-promo.png" alt="Promo">
                            </div>
                            <div class="promo-text">
                                <h6>Cashback Rp. 5.000.000</h6>
                                <p>Berlaku hingga: 15 Mei 2022</p>
                            </div>
                        </div>
                        <div class="promo-item">
                            <div class="promo-icon">
                                <img src="{{ asset('Home') }}/images/ic-promo.png" alt="Promo">
                            </div>
                            <div class="promo-text">
                                <h6>Cashback Rp. 5.000.000</h6>
                                <p>Berlaku hingga: 15 Mei 2022</p>
                            </div>
                        </div>
                    </div>
                    <!-- STATE NO PROMO -->
                    <div class="no-promo text-center d-none">
                        <img src="{{ asset('Home') }}/images/img-illustration4.png" alt="">
                        <p class="text-center">Promo saat ini belum tersedia</p>
                    </div>
                </div>

                <div class="modal-footer promo-footer">
                    <div class="hemat">
                        <p class="light-grey-color">Anda bisa hemat</p>
                        <h5>Rp. 5.000.000</h5>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary">Pakai Promo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

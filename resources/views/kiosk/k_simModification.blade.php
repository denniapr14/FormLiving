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
                    <h3 class="page-title mt-0">Modifikasi Unit</h3>
                    <div>
                        <div class="mod-items">
                            <div class="item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="{{ asset('Home') }}/images/img-modification1.png" alt="">
                                    </div>
                                    <div class="col-5">
                                        <p>Jenis Lantai</p>
                                        <h5>Parket Kayu</h5>
                                    </div>
                                    <div class="col-2">
                                        <p>Biaya</p>
                                        <h5>50 Jt</h5>
                                    </div>
                                    <div class="col-3 d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-toggle="modal" data-bs-target="#modelId">Ubah</button>
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
                                        <h5>-</h5>
                                    </div>
                                    <div class="col-2">
                                        <p>Biaya</p>
                                        <h5>0</h5>
                                    </div>
                                    <div class="col-3 d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-secondary">Ubah</button>
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
                                        <h5>Full-width glass</h5>
                                    </div>
                                    <div class="col-2">
                                        <p>Biaya</p>
                                        <h5>25 Jt</h5>
                                    </div>
                                    <div class="col-3 d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-secondary">Ubah</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="totals">
                            <div class="item">
                                <p>Harga Original</p>
                                <h5>975,000,000</h5>
                            </div>
                            <div class="item">
                                <p>Biaya Modifikasi</p>
                                <h5>+250,000,000</h5>
                            </div>
                            <hr>
                            <div class="item">
                                <p>Biaya Modifikasi</p>
                                <h5 class="primary-color">+250,000,000</h5>
                            </div>
                        </div>
                    </div>
                    <!-- NO MODIFICATION -->
                    <div class="no-modification d-none">
                        <img src="{{ asset('Home') }}/images/img-illustration3.png" alt="">
                    </div>
                </div>
            </div>
            <div class="btn-groups-kiosk">
                <a href="/kiosk/simulasi-tipe" type="button" class="btn btn-grey">Kembali</a>
                <a href="/kiosk/simulasi-pembayaran" type="button"
                    class="btn btn-primary">Lanjutkan</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade bottomsheet" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="page-title">Pilih Jenis Lantai</h3>
                <div class="mod-items">
                    <div class="item selected">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('Home') }}/images/img-modification1.png" alt="">
                            </div>
                            <div class="col-5 col-md-4 ">
                                <h6>Parket Kayu</h6>
                            </div>
                            <div class="col-5 col-md-3 text-end text-lg-center">
                                <h6 class="fw-light">+50,000,000</h6>
                            </div>
                            <div class="col-3 modal-btn">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modelId">Terpilih</button>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('Home') }}/images/img-modification6.png" alt="">
                            </div>
                            <div class="col-5 col-md-4">
                                <h6>Parket Gipsum</h6>
                            </div>
                            <div class="col-5 col-md-3 text-end text-lg-center">
                                <h6 class="fw-light">+20,000,000</h6>
                            </div>
                            <div class="col-3 modal-btn">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modelId">Pilih</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

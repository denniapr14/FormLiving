
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
                    <h3 class="page-title mt-0">Simulasi Kredit</h3>
                    <div class="simulation-price">
                        <div class="collapse-item">
                            <a class="card-shadow" data-bs-toggle="collapse" href="#bank" role="button"
                                aria-expanded="false" aria-controls="bank">
                                Pilih Bank
                            </a>
                            <div class="collapse" id="bank">
                                <div class="card card-body">
                                    <div class="form-check form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="bank" id="bank"
                                                value="checkedValue" checked>
                                            Bank 1
                                        </label>
                                    </div>
                                    <div class="form-check form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="bank" id="bank"
                                                value="checkedValue">
                                            Bank 2
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mb-lg-4 form-group">
                            <div class="label-text">
                                Jumlah
                            </div>
                            <input type="text" class="form-control card-shadow" name="" id=""
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="collapse-item">
                            <a class="card-shadow" data-bs-toggle="collapse" href="#bunga" role="button"
                                aria-expanded="false" aria-controls="bunga">
                                Suku Bunga
                            </a>
                            <div class="collapse" id="bunga">
                                <div class="card card-body">
                                    <div class="form-check form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="suku" id="suku"
                                                value="checkedValue" checked>
                                            Suku Bunga 1
                                        </label>
                                    </div>
                                    <div class="form-check form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="suku" id="suku"
                                                value="checkedValue">
                                            Suku Bunga 2
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collapse-item">
                            <a class="card-shadow" data-bs-toggle="collapse" href="#waktu" role="button"
                                aria-expanded="false" aria-controls="waktu">
                                Jangka Waktu Peminjaman
                            </a>
                            <div class="collapse" id="waktu">
                                <div class="card card-body">
                                    <div class="form-check form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="jangka_waktu"
                                                id="jangka_waktu" value="checkedValue" checked>
                                            Jangka Waktu 1
                                        </label>
                                    </div>
                                    <div class="form-check form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="jangka_waktu"
                                                id="jangka_waktu" value="checkedValue">
                                            Jangka Waktu 2
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="btn-groups">
                            <button type="button" class="btn btn-primary">Hitung Simulasi</button>
                        </div>
                        <div class="price-total">
                            <p>Perkiraan pembayaran KPR Anda:</p>
                            <h5>Rp. 16,350,000 / bulan</h5>
                        </div>
                        <div class="snk">
                            *Baca syarat dan ketentuan berlaku
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-groups-kiosk">
                <a href="/kiosk/simulasi-pembayaran" type="button" class="btn btn-grey">Kembali</a>
                <a href="/kiosk/simulasi-order" type="button" class="btn btn-primary">Lanjutkan</a>
            </div>
        </div>
    </div>
</div>

@endsection

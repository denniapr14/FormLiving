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
                    <h3 class="page-title mt-0">Metode Pembayaran</h3>
                    <div class="card-shadow">
                        <div class="form-check form-radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="kpr" id="kpr"
                                    value="checkedValue" checked>
                                KPR Bank
                            </label>
                        </div>
                    </div>
                    <div class="card-shadow">
                        <div class="form-check form-radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="kpr" id="kpr"
                                    value="checkedValue">
                                Cicilan Inhouse Developer
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-groups-kiosk">
                <a href="/kiosk/simulasi-modifikasi" type="button" class="btn btn-grey">Kembali</a>
                <a href="/kiosk/simulasi-harga" type="button" class="btn btn-primary">Lanjutkan</a>
            </div>
        </div>
    </div>
</div>

@endsection


@extends('kioskTemplate.app')
@extends('kioskTemplate.sidebarStep')

@section('tittle','Forms | Simulasi Kluster')
@section('body','kiosk')




@section('content')

<div class="kiosk-content">
    <div class="categories">
        <div class="container-fluid">
            <h3>Pilih Tipe</h3>
            <div class="row types">
                <div class="col-12 col-lg-6">
                    <a href="/kiosk/select-projects.html" class="item">
                        <div class="item-img">
                            <img src="{{ asset('Home') }}/images/img-cluster-large1.png" alt="">
                            <div class="icon-expand">
                                <img src="{{ asset('Home') }}/images/kiosk/ic-maximize.svg" alt="">
                            </div>
                        </div>
                        <h5 class="type-text">Type: 150</h5>
                        <div class="info">
                            <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2</div>
                            <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1</div>
                        </div>
                        <div>
                            <h5>Rp. 300 Juta</h5>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{ asset('Home') }}/images/img-cluster-large2.png" alt="">
                            <div class="icon-expand">
                                <img src="{{ asset('Home') }}/images/kiosk/ic-maximize.svg" alt="">
                            </div>
                        </div>
                        <h5 class="type-text">Type: 145</h5>
                        <div class="info">
                            <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2</div>
                            <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1</div>
                        </div>
                        <div>
                            <h5>Rp. 300 Juta</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                            <div class="icon-expand">
                                <img src="{{ asset('Home') }}/images/kiosk/ic-maximize.svg" alt="">
                            </div>
                        </div>
                        <h5 class="type-text">Type: 150</h5>
                        <div class="info">
                            <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2</div>
                            <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1</div>
                        </div>
                        <div>
                            <h5>Rp. 300 Juta</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{ asset('Home') }}/images/img-cluster-large4.png" alt="">
                            <div class="icon-expand">
                                <img src="{{ asset('Home') }}/images/kiosk/ic-maximize.svg" alt="">
                            </div>
                        </div>
                        <h5 class="type-text">Type: 150</h5>
                        <div class="info">
                            <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2</div>
                            <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1</div>
                        </div>
                        <div>
                            <h5>Rp. 300 Juta</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-groups-kiosk">
                <a href="/kiosk/simulasi-pilih-unit " type="button" class="btn btn-grey">Kembali</a>
                <a href="/kiosk/simulasi-modifikasi" type="button" class="btn btn-primary">Lanjutkan</a>
            </div>
        </div>
    </div>
</div>

@endsection

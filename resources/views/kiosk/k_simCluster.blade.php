@extends('kioskTemplate.app')
@extends('kioskTemplate.sidebarStep')

@section('tittle','Forms | Simulasi Kluster')
@section('body','kiosk')

@section('content')

<div class="kiosk-content">
    <div class="categories">
        <div class="container-fluid">
            <h3>Pilih Cluster</h3>
            <div class="row cluster simulation">
                <div class="col-12 col-lg-6">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{ asset('Home') }}/images/img-cluster-large1.png" alt="">
                        </div>
                        <div class="item-avail">4 Available</div>
                        <h5>The Mainroad</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim interdum neque vel
                            euismod. </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{ asset('Home') }}/images/img-cluster-large2.png" alt="">
                        </div>
                        <div class="item-avail">2 Available</div>
                        <h5>The Icon</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim interdum neque vel
                            euismod. </p>

                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                        </div>
                        <div class="item-avail">1 Available</div>
                        <h5>Green West</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim interdum neque vel
                            euismod. </p>

                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{ asset('Home') }}/images/img-cluster-large4.png" alt="">
                        </div>
                        <div class="item-avail">4 Available</div>
                        <h5>Green East</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim interdum neque vel
                            euismod. </p>

                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{ asset('Home') }}/images/img-cluster.png" alt="">
                        </div>
                        <div class="item-avail">3 Available</div>
                        <h5>The Peak</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim interdum neque vel
                            euismod. </p>

                    </div>
                </div>
            </div>
            <div class="btn-groups-kiosk">
                <a href="/kiosk/unit" type="button" class="btn btn-grey">Kembali</a>
                <a href="/kiosk/simulasi-pilih-unit" type="button" class="btn btn-primary">Lanjutkan</a>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('kioskTemplate.app')
@extends('kioskTemplate.sidebarStep')

@section('tittle','Forms | Simulasi Kluster')
@section('body','kiosk')



@section('content')

<div class="kiosk-content">
    <div class="categories select-unit">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-12">
                    <div class="map-kiosk">
                        <img src="{{ asset('Home') }}/images/img-map 1.png" alt="">
                    </div>
                </div>
            </div>

            <div class="control">
                <div class="zoom in">
                    <img src="{{ asset('Home') }}/images/kiosk/ic-zoom-in.svg" alt="">
                </div>
                <div class="zoom">
                    <img src="{{ asset('Home') }}/images/kiosk/ic-zoom-out.svg" alt="">
                </div>
            </div>


            <div class="btn-groups-kiosk">
                <a href="/kiosk/simulasi-kluster" type="button" class="btn btn-grey">Kembali</a>
                <a href="/kiosk/simulasi-tipe" type="button" class="btn btn-primary">Lanjutkan</a>
            </div>
            <div class="bg-black"></div>

            <div class="popup">
                <div class="popup-close">
                    <img src="{{ asset('Home') }}/images/ic-close.png" alt="">
                </div>
                <div class="popup-image">
                    <img src="{{ asset('Home') }}/images/img-cluster-large1.png" alt="">
                </div>
                <div class="popup-content">
                    <div class="popup-title">
                        The Mainroad
                    </div>
                    <div class="row">
                        <div class="col-6 text-left">
                            Nama Kavling
                        </div>
                        <div class="col-6 text-right">
                            A2
                        </div>
                        <div class="col-6 text-left">
                            Status
                        </div>
                        <div class="col-6 text-right">
                            Tersedia
                        </div>
                        <div class="col-6 text-left">
                            Tipe
                        </div>
                        <div class="col-6 text-right">
                            Mainroad/150
                        </div>
                        <div class="col-6 text-left">
                            LT
                        </div>
                        <div class="col-6 text-right">
                            72m2
                        </div>
                        <div class="col-6 text-left">
                            LB
                        </div>
                        <div class="col-6 text-right">
                            50m2
                        </div>
                        <div class="col-6 text-left">
                            Harga
                        </div>
                        <div class="col-6 text-right">
                            Rp. 975.000.000
                        </div>
                    </div>

                    <button type="button" class="btn btn-outline-secondary">Pilih Unit</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        $('.map-kiosk').click(function (e) {
            e.preventDefault();
            $('.popup').addClass('active');
            $('.bg-black').addClass('active');
        });

        $('.popup-close').click(function (e) {
            e.preventDefault();
            $('.popup').removeClass('active');
            $('.bg-black').removeClass('active');
        });
    </script>
</div>

@endsection

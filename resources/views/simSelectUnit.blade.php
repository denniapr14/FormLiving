@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Simulasi Kluster')
@section('body','')


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
            <div class="step active">2</div>
            <div class="step">3</div>
            <div class="step">4</div>
            <div class="step">5</div>
            <div class="step">6</div>
            <div class="step">7</div>
            <div class="step last">8</div>
        </div>

    </div>
    <div class="container">
        <div class="steps">
            <div class="step done">1</div>
            <div class="step active">2</div>
            <div class="step">3</div>
            <div class="step">4</div>
            <div class="step">5</div>
            <div class="step">6</div>
            <div class="step">7</div>
            <div class="step last">8</div>
        </div>

        <div class="map" >
            <img src="{{ asset('Home') }}/images/img-map.png" alt="">

            <div class="control">
                <div class="zoom in">
                    <img src="{{ asset('Home') }}/images/ic-zoom-in.png" alt="">
                </div>
                <div class="zoom">
                    <img src="{{ asset('Home') }}/images/ic-zoom-out.png" alt="">
                </div>
            </div>

            <div class="bg-black"></div>

            <div id="popup" class="popup" style=" ">
                <button class="popup-close">

                        <img src="{{ asset('Home') }}/images/ic-close.png" alt="">


                </button>


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

                    <a href="/simulation-type" class="btn btn-outline-secondary">Pilih Unit</a>
                    {{-- <button type="button" class="btn btn-outline-secondary">Pilih Unit</button> --}}

                </div>
            </div>
        </div>

        <script>
            $(".map").on("click", function(){
            $(".popup, .bg-black").toggleClass("active");
            });

            // $("#close").on("click", function(){
            // $("#popup, .bg-black").removeClass("active");
            // });
            // $('.map').click(function (e) {
            //     e.preventDefault();
            //     $('.popup').addClass('active');
            //     $('.bg-black').addClass('active');

            // });

            // $('.popup-close').click(function (e) {
            //     e.preventDefault();
            //     $('.popup').removeClass('active');
            //     $('.bg-black').removeClass('active');
            // });
        </script>

        <div class="btn-groups">
            <a href="/k-simulation-cluster.html" type="button" class="btn btn-grey">Kembali</a>
            <a href="/k-simulation-type.html" type="button" class="btn btn-primary">Lanjutkan</a>
        </div>
    </div>
</div>
@endsection

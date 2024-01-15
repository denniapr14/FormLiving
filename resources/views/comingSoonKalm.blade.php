@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footerbranch')
{{-- @extends('HomeLayout.footer') --}}
@section('tittle','Forms | Home')
@section('body','index')

@section('content')

<style>
.my-bg{
    background-image:url('{{ asset('Home') }}/images/kalm-project.jpeg');
    background-size: cover;
    background-repeat: no-repeat;
    font-family: "Roboto";
    font-weight: 100;
    font-style: normal;
    min-height: 120vh;
    overflow:hidden;
    background-position: 50% 50%;
   -webkit-animation-delay: 0.1s;
    -webkit-animation-name: fontfix;
    -webkit-animation-duration: 0.1s;
    -webkit-animation-iteration-count: 1;
    -webkit-animation-timing-function: linear;

}

</style>

<div class="projects">
    <div class="container">
        <h5 class="subtitle">

        </h5>
        <h2 class="title">
            <img style="width: 35%"src="{{ asset('Home') }}/images/logo-kalm.png" alt="">
        </h2>
        <div class="my-bg" >
           <h1 style=" text-align: center;

           text-shadow: 2px 2px 6px rgba(0,0,0,0.79);
           color: #4c4e52;
            text-size: 150px;
           padding: 0;
           padding-top:35%;
           margin: 0;
           line-height: 200px;">COMING SOON</h1>
        </div>
    </div>
</div>

{{-- <div class="facilities" data-aos="fade-down">
    <div class="container-fluid left-side">
        <h5 class="subtitle">Facilities
        </h5>
        <h2 class="title">Fasilitas Umum
        </h2>

        <div class="items" id="items">
            <div class="item">
                <img src="{{ asset('Home') }}/images/img-club-house.png" alt="Club House">
                <div class="text">Club House</div>
            </div>
            <div class="item">
                <img src="{{ asset('Home') }}/images/img-pool.png" alt="Swimming Pool">
                <div class="text">Swimming Pool</div>
            </div>
            <div class="item">
                <img src="{{ asset('Home') }}/images/img-gym.png" alt="Sport Center">
                <div class="text">Sport Center</div>
            </div>
            <div class="item">
                <img src="{{ asset('Home') }}/images/img-food-court.png" alt="Food Court">
                <div class="text">Food Court</div>
            </div>
            <div class="item">
                <img src="{{ asset('Home') }}/images/img-shopping-center.png" alt="Shopping Center">
                <div class="text">Shopping Center</div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ele = document.getElementById('items');
                ele.style.cursor = 'grab';

                let pos = { top: 0, left: 0, x: 0, y: 0 };

                const mouseDownHandler = function (e) {
                    ele.style.cursor = 'grabbing';
                    ele.style.userSelect = 'none';

                    pos = {
                        left: ele.scrollLeft,
                        top: ele.scrollTop,
                        // Get the current mouse position
                        x: e.clientX,
                        y: e.clientY,
                    };

                    document.addEventListener('mousemove', mouseMoveHandler);
                    document.addEventListener('mouseup', mouseUpHandler);
                };

                const mouseMoveHandler = function (e) {
                    // How far the mouse has been moved
                    const dx = e.clientX - pos.x;
                    const dy = e.clientY - pos.y;

                    // Scroll the element
                    ele.scrollTop = pos.top - dy;
                    ele.scrollLeft = pos.left - dx;
                };

                const mouseUpHandler = function () {
                    ele.style.cursor = 'grab';
                    ele.style.removeProperty('user-select');

                    document.removeEventListener('mousemove', mouseMoveHandler);
                    document.removeEventListener('mouseup', mouseUpHandler);
                };

                // Attach the handler
                ele.addEventListener('mousedown', mouseDownHandler);
            });
        </script>
        </script>
    </div>
</div> --}}


<script>
    $('.image-sliders').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.testimoni-sliders'
    });

    $('.testimoni-sliders').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        dots: true,
        nextArrow: ' <div class="nextArrow"><img src="{{ asset('Home') }}/images/btn-right-white.png" alt=""></div>',
        asNavFor: '.image-sliders'
    });
</script>


{{-- <div class="promotions" data-aos="zoom-in-left">
    <div class="container">
        <h5 class="subtitle">
            Promotions
        </h5>
        <h2 class="title">
            Promo untung banget
        </h2>
        <div class="row items">
            <div class="col-12 col-sm-6 col-lg-4 mb-3 mb-lg-0">
                <div class="item brown">
                    <div class="cashback">
                        <div class="text-cashback">
                            <h5>Cashback</h5>
                            <h1>15%</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>

                            <div class="mobile-only">
                                <small>Berlaku hingga: 15 Mei 2022</small>
                                <button type="button" class="btn btn-white">Salin Kode <img class="ms-2"
                                        src="{{ asset('Home') }}/images/ic-copy.png" alt=""></button>
                            </div>
                        </div>

                        <div class="bg-cashback">
                            <img src="{{ asset('Home') }}/images/img-promo.png" alt="">
                        </div>

                        <div class="promo-date">
                            <div class="date-text questrial">
                                <i class="bi-clock"></i>
                                20 Mei 2022
                            </div>
                        </div>
                    </div>
                    <div class="line">
                        <img src="{{ asset('Home') }}/images/line-coupon.png" alt="">
                    </div>
                    <div class="qr">
                        <div class="qr-img">
                            <img src="{{ asset('Home') }}/images/qr-code.png" alt="">
                        </div>
                        <p>Scan QR Code or Copy the code</p>
                        <button type="button" class="btn btn-white">Salin Kode <img class="ms-2"
                                src="{{ asset('Home') }}/images/ic-copy.png" alt=""></button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-3 mb-lg-0">
                <div class="item grey">
                    <div class="cashback">
                        <div class="text-cashback">
                            <h5>Cashback</h5>
                            <h1>20%</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                            <div class="mobile-only">
                                <small>Berlaku hingga: 15 Mei 2022</small>
                                <button type="button" class="btn btn-white">Salin Kode <img class="ms-2"
                                        src="{{ asset('Home') }}/images/ic-copy.png" alt=""></button>
                            </div>
                        </div>

                        <div class="bg-cashback">
                            <img src="{{ asset('Home') }}/images/img-promo.png" alt="">
                        </div>

                        <div class="promo-date">
                            <div class="date-text questrial">
                                <i class="bi-clock"></i>
                                20 Mei 2022
                            </div>
                        </div>
                    </div>
                    <div class="line">
                        <img src="{{ asset('Home') }}/images/line-coupon.png" alt="">
                    </div>
                    <div class="qr">
                        <div class="qr-img">
                            <img src="{{ asset('Home') }}/images/qr-code.png" alt="">
                        </div>
                        <p>Scan QR Code or Copy the code</p>
                        <button type="button" class="btn btn-white">Salin Kode <img class="ms-2"
                                src="{{ asset('Home') }}/images/ic-copy.png" alt=""></button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-3 mb-lg-0">
                <div class="item green">
                    <div class="cashback">
                        <div class="text-cashback">
                            <h5>Cashback</h5>
                            <h1>20%</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                            <div class="mobile-only">
                                <small>Berlaku hingga: 15 Mei 2022</small>
                                <button type="button" class="btn btn-white">Salin Kode <img class="ms-2"
                                        src="{{ asset('Home') }}/images/ic-copy.png" alt=""></button>
                            </div>
                        </div>

                        <div class="bg-cashback">
                            <img src="{{ asset('Home') }}/images/img-promo.png" alt="">
                        </div>

                        <div class="promo-date">
                            <div class="date-text questrial">
                                <i class="bi-clock"></i>
                                20 Mei 2022
                            </div>
                        </div>
                    </div>
                    <div class="line">
                        <img src="{{ asset('Home') }}/images/line-coupon.png" alt="">
                    </div>
                    <div class="qr">
                        <div class="qr-img">
                            <img src="{{ asset('Home') }}/images/qr-code.png" alt="">
                        </div>
                        <p>Scan QR Code or Copy the code</p>
                        <button type="button" class="btn btn-white">Salin Kode <img class="ms-2"
                                src="{{ asset('Home') }}/images/ic-copy.png" alt=""></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


{{-- <div class="apps" data-aos="fade-down">
    <div class="container">
        <div class="ornament one">
            <img src="{{ asset('Home') }}/images/img-ornament3.png" alt="">
        </div>
        <div class="ornament two">
            <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
        </div>
        <div class="row">
            <div class="col-5 col-lg-6">
                <div class="apps-preview">
                    <div class="first">
                        <img src="{{ asset('Home') }}/images/phone-1.png" alt="">
                    </div>
                    <div class="second">
                        <img src="{{ asset('Home') }}/images/phone-2.png" alt="">
                    </div>
                </div>
            </div>

            <div class="col-7 col-lg-6">
                <h2>Percayalah, hidup itu hanya butuh jari</h2>
                <p>
                    Bayar iuran bulanan?
                    Butuh perbaikan rumah?
                    Cleaning service?Ada ular?
                    Panggil ambulan?
                    Keluhan?
                    dan seabreg kebutuhan lainnya?
                    Tenang, semua ada di aplikasi One Property.
                </p>

                <div class="logos">
                    <div class="me-3">
                        <img src="{{ asset('Home') }}/images/img-app-store.png" alt="App Store">
                    </div>
                    <div>
                        <img src="{{ asset('Home') }}/images/img-google-play.png" alt="Google Play">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@endsection

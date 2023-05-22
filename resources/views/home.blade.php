@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footerbranch')
{{-- @extends('HomeLayout.footer') --}}
@section('tittle','Forms | Home')
@section('body','index')
@section('content')
<div class="cta">
    <div class="container-fluid left-side">
        <div class="row align-items-center">

            <div class="col-lg-12 " data-aos="fade-left" data-aos-delay="400">
                <div class="image-sliders">
                    {{--  <div>
                        <img src="{{ asset('Home') }}/images/60.jpg" class="w-100" alt="">
                    </div>  --}}
                    <div>
                        <img src="{{ asset('Home') }}/images/greenland-project.jpeg"  class="w-100" alt="">
                    </div>
                    <div>
                        <img src="{{ asset('Home') }}/images/kalm-project.jpeg"  class="w-100" alt="">
                    </div>

                    {{-- <div>
                        <img src="{{ asset('Home') }}/images/img4.jpeg" class="w-100" alt="">
                    </div> --}}
                </div>
                <div class="text-blur-bg text-sliders">
                    <div>
                        <h5>Greenland</h5>
                        <small>Hunian hijau di Greenland at Tidar </small><br>
                        <a href="" style="width: 30%" class="btn btn-primary d-lg-block">Buy Now</a>
                    </div>
                    <div>
                        <h5>Kalm</h5>
                        <small>Project Coming Soon </small>
                    </div>
                    {{-- <div>
                        <h5>Hotel</h5>
                        <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim interdum neque
                            vel euismod. </small>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.image-sliders').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        autoplay: true,
        autoplaySpeed: 3000,
        asNavFor: '.text-sliders'
    });

    $('.text-sliders').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        asNavFor: '.image-sliders'
    });
</script>

<div class="mobile-only">
    <div class="cta-mobile">
        <div class="container">
            <div class="sliders-mobile">
                <a href="/greenland.html" class="item">
                    <div class="logo">
                        <img src="{{ asset('Home') }}/images/logo-tidar-white.png" alt="">
                    </div>
                    <div class="item-img">
                        <img src="{{ asset('Home') }}/images/mobile-sliders1.png" alt="">
                    </div>
                    <div class="float-button">
                        Miliki Unit <i class="bi-chevron-right"></i>
                    </div>
                </a>
                <div class="item">
                    <div class="logo">
                        <img src="{{ asset('Home') }}/images/logo-project2b.png" alt="">
                    </div>
                    <div class="item-img">
                        <img src="{{ asset('Home') }}/images/img-greenland2.png" alt="">
                    </div>
                    <div class="float-button">
                        Miliki Unit <i class="bi-chevron-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="search-unit">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="semua-tab" data-bs-toggle="tab"
                        data-bs-target="#semua-tab-pane" type="button" role="tab" aria-controls="semua-tab-pane"
                        aria-selected="true">Semua</button>
                </li>
                {{--  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="perumahaan-tab" data-bs-toggle="tab"
                        data-bs-target="#perumahaan-tab-pane" type="button" role="tab"
                        aria-controls="perumahaan-tab-pane" aria-selected="false">Perumahaan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="apartemen-tab" data-bs-toggle="tab"
                        data-bs-target="#apartemen-tab-pane" type="button" role="tab"
                        aria-controls="apartemen-tab-pane" aria-selected="false">Apartemen</button>
                </li>  --}}
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="semua-tab-pane" role="tabpanel"
                    aria-labelledby="semua-tab" tabindex="0">
                    <div class="units">
                        <a href="/greenland.html" class="item">
                            <div class="item-img">
                                <img src="{{ asset('Home') }}/images/img-greenland.png" alt="">
                            </div>
                            <h6>Greenland</h6>
                            <p>Perumahan Greenland at Tidar </p>
                        </a>
                        <a href="#" class="item">
                            <div class="item-img">
                                <img src="{{ asset('Home') }}/images/img-apartement.png" alt="">
                            </div>
                            <h6>Austinville</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        </a>

                    </div>
                </div>
                <div class="tab-pane fade" id="perumahaan-tab-pane" role="tabpanel" aria-labelledby="perumahaan-tab"
                    tabindex="0">
                    <div class="no-unit">
                        <img src="{{ asset('Home') }}/images/img-illustration5.svg" alt="">
                    </div>
                </div>
                <div class="tab-pane fade" id="apartemen-tab-pane" role="tabpanel" aria-labelledby="apartemen-tab"
                    tabindex="0">
                    <div class="no-unit">
                        <img src="{{ asset('Home') }}/images/img-illustration5.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.sliders-mobile').slick({
            dots: true,
        });
    });
</script>
<div class="promotions" data-aos="zoom-right" data-aos-offset="0" data-aos-duration="500">
    <div class="container">
        <h5 class="subtitle">
            Promotions
        </h5>
        <h2 class="title">
           Lebih untung pakai promo!
        </h2>
        <div class="row items">
            {{-- <div class="col-12 col-sm-6 col-lg-4 mb-3 mb-lg-0">
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
            </div> --}}
            <div class="col-12 col-sm-6 col-lg-4 mb-3 mb-lg-0 align-self-center">
                <div class="item grey">
                    <div class="cashback">
                        <div class="text-cashback">
                            <h5>Promo Blok M</h5>
                            <h1>Rp. 20 Juta</h1>
                            <p>Promo khusus blok M (promo demo)</p>
                            <div class="mobile-only">
                                <small>Berlaku hingga: 28 Februari 2023</small>
                                {{-- <button type="button" class="btn btn-white">Salin Kode <img class="ms-2"
                                        src="{{ asset('Home') }}/images/ic-copy.png" alt=""></button> --}}
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
                    {{-- <div class="qr">
                        <div class="qr-img">
                            <img src="{{ asset('Home') }}/images/qr-code.png" alt="">
                        </div>
                        <p>Scan QR Code or Copy the code</p>
                        <button type="button" class="btn btn-white">Salin Kode <img class="ms-2"
                                src="{{ asset('Home') }}/images/ic-copy.png" alt=""></button>
                    </div> --}}
                </div>
            </div>
            {{-- <div class="col-12 col-sm-6 col-lg-4 mb-3 mb-lg-0">
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
            </div> --}}
        </div>
    </div>
</div>
<div class="projects">
    <div class="container">
        <h5 class="subtitle">
            Projects
        </h5>
        <h2 class="title">
            Our Projects
        </h2>
        <div class="row items">
            <div class="col-6 col-md-6">
                <div class="item" data-aos="fade-right">
                    <img src="{{ asset('Home') }}/images/greenland-project.jpeg" alt="">
                    <div class="item-text">
                        <h4>Greenland</h4>
                        <p>Greenland at Tidar</p>
                        <a href="/housing" class="more">
                            Learn More <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6">
                <div class="item" data-aos="fade-left">
                    <img src="{{ asset('Home') }}/images/kalm-project.jpeg" alt="">
                    <div class="item-text">
                        <h4>Kalm</h4>
                        <p>-- COMING SOON --</p>
                        <div class="more">
                            Learn More <i class="bi bi-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-12 col-lg-6">
                <div class="item" data-aos="fade-right">
                    <img src="{{ asset('Home') }}/images/img-hotel.png" alt="">
                    <div class="item-text">
                        <h4>Project C</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita impedit quas at
                            inventore,
                            aperiam esse animi.</p>
                        <div class="more">
                            Learn More <i class="bi bi-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-12 col-lg-6">
                <div class="item" data-aos="fade-left">
                    <img src="{{ asset('Home') }}/images/img-mall.png" alt="">
                    <div class="item-text">
                        <h4>Project D</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita impedit quas at
                            inventore,
                            aperiam esse animi.</p>
                        <div class="more">
                            Learn More <i class="bi bi-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-12">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary">Tampilkan Semua</button>
                </div>
            </div> --}}
        </div>

    </div>
</div>

<div class="sliders-index container-fluid" data-aos="zoom-in">
    <div class="sliders">
        <div class="slider-item">
            <div class="slider-img">
                <img src="{{ asset('Home') }}/images/landslide-1.jpeg" class="w-100" alt="">
            </div>
            <div class="slider-content">
                <h1 class="title">
                    The ARC
                </h1>
                <div class="desc">
                    <div class="text questrial">A beautiful style in green, captivating yet refresh for those who seek comfort </div>
                    <div class="more">Learn More <i class="bi bi-chevron-right"></i></div>
                </div>
            </div>
        </div>
        <div class="slider-item">
            <div class="slider-img">
                <img src="{{ asset('Home') }}/images/slider-1.png" class="w-100" alt="">
            </div>
            <div class="slider-content">
                <h1 class="title">
                    Enjoy your Life
                </h1>
                <div class="desc questrial">
                    <div class="text">Family is always place to return to. </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.sliders').slick();
    });
</script>



<div class="apps" data-aos="fade-up" data-aos-offset="0">
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
</div>


@endsection

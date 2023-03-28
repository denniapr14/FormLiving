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
                        <img src="{{ asset('Home') }}/images/landslide-1.jpeg"  class="w-100" alt="">
                    </div>
                    <div>
                        <img src="{{ asset('Home') }}/images/landslide-1.jpeg" class="w-100" alt="">
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
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="perumahaan-tab" data-bs-toggle="tab"
                        data-bs-target="#perumahaan-tab-pane" type="button" role="tab"
                        aria-controls="perumahaan-tab-pane" aria-selected="false">Perumahaan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="apartemen-tab" data-bs-toggle="tab"
                        data-bs-target="#apartemen-tab-pane" type="button" role="tab"
                        aria-controls="apartemen-tab-pane" aria-selected="false">Apartemen</button>
                </li>
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
                        <a href="/greenland.html" class="item">
                            <div class="item-img">
                                <img src="{{ asset('Home') }}/images/img-hotel.png" alt="">
                            </div>
                            <h6>Project B</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        </a>
                        <a href="/greenland.html" class="item">
                            <div class="item-img">
                                <img src="{{ asset('Home') }}/images/img-hotel.png" alt="">
                            </div>
                            <h6>Project B</h6>
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



{{-- <div class="apps" data-aos="fade-up" data-aos-offset="0">
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
<div class="navbar-mobile active">
    <a href="/index.html" class="item active">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M2.5 7.49999L10 1.66666L17.5 7.49999V16.6667C17.5 17.1087 17.3244 17.5326 17.0118 17.8452C16.6993 18.1577 16.2754 18.3333 15.8333 18.3333H4.16667C3.72464 18.3333 3.30072 18.1577 2.98816 17.8452C2.67559 17.5326 2.5 17.1087 2.5 16.6667V7.49999Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M7.5 18.3333V10H12.5V18.3333" stroke="#B8BABC" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
        <p>Home</p>
    </a>
    <a href="/search.html" class="item">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M17.5 17.5L13.875 13.875" stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <p>Cari</p>
    </a>
    <div class="item">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M17.5 12.5C17.5 12.942 17.3244 13.366 17.0118 13.6785C16.6993 13.9911 16.2754 14.1667 15.8333 14.1667H5.83333L2.5 17.5V4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H15.8333C16.2754 2.5 16.6993 2.67559 17.0118 2.98816C17.3244 3.30072 17.5 3.72464 17.5 4.16667V12.5Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <p>Chat</p>
    </div>
    <a href="/my-cart.html" class="item">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M7.50008 18.3333C7.96032 18.3333 8.33341 17.9602 8.33341 17.5C8.33341 17.0398 7.96032 16.6667 7.50008 16.6667C7.03984 16.6667 6.66675 17.0398 6.66675 17.5C6.66675 17.9602 7.03984 18.3333 7.50008 18.3333Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            <path
                d="M16.6666 18.3333C17.1268 18.3333 17.4999 17.9602 17.4999 17.5C17.4999 17.0398 17.1268 16.6667 16.6666 16.6667C16.2063 16.6667 15.8333 17.0398 15.8333 17.5C15.8333 17.9602 16.2063 18.3333 16.6666 18.3333Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            <path
                d="M0.833252 0.833344H4.16658L6.39992 11.9917C6.47612 12.3753 6.68484 12.72 6.98954 12.9653C7.29424 13.2105 7.6755 13.3408 8.06658 13.3333H16.1666C16.5577 13.3408 16.9389 13.2105 17.2436 12.9653C17.5483 12.72 17.757 12.3753 17.8333 11.9917L19.1666 5.00001H4.99992"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <p>Cart</p>
    </a>
    <a href="/login.html" class="item">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M16.6666 17.5V15.8333C16.6666 14.9493 16.3154 14.1014 15.6903 13.4763C15.0652 12.8512 14.2173 12.5 13.3333 12.5H6.66658C5.78253 12.5 4.93468 12.8512 4.30956 13.4763C3.68444 14.1014 3.33325 14.9493 3.33325 15.8333V17.5"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            <path
                d="M10.0001 9.16667C11.841 9.16667 13.3334 7.67428 13.3334 5.83333C13.3334 3.99238 11.841 2.5 10.0001 2.5C8.15913 2.5 6.66675 3.99238 6.66675 5.83333C6.66675 7.67428 8.15913 9.16667 10.0001 9.16667Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <p>Profile</p>
    </a>
</div> --}}

@endsection

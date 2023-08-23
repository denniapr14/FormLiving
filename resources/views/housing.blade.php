@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.navbarProfile')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footerbranch')
{{-- @extends('HomeLayout.footer') --}}
@section('tittle','Forms | Housing')
@section('body','index')

@section('content')


<div class="header">
    <div class="ornament one">
        <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
    </div>
    <div class="ornament two">
        <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
    </div>
    <div class="container">
        <div class="row mb-3 mb-lg-5">
            <div class="col-12 col-lg-6">
                <h6 data-aos="fade-right">Selamat datang di {{ $dataProjek }}.</h6>
                <h1 data-aos="fade-right" data-aos-delay="400">Resepsi sudah jadi, Rumahnya kapan?</h1>
            </div>
            <div class="col-12 col-lg-6 ps-lg-6" data-aos="fade-left" data-aos-delay="400">
                <p class="header-text">Temukan ketenangan jiwa di antara hijaunya rerumputan dan birunya langit </p>

                <a href="/simulation-cluster" class="btn btn-primary d-none d-lg-block">Buy Now!</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 header-bottom" data-aos="fade-up" data-aos-delay="600">
                {{-- <div class="search-bar d-none d-lg-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <label for="harga" class="form-label">Harga</label>
                            <select class="form-control" name="harga" id="harga">
                                <option>Pilih Harga</option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="cicilan" class="form-label">Cicilan</label>
                            <select class="form-control" name="cicilan" id="cicilan">
                                <option>Pilih Cicilan</option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="kamar" class="form-label">Kamar Tidur</label>
                            <select class="form-control" name="kamar" id="kamar">
                                <option>2 Kamar Tidur</option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="kamar_mandi" class="form-label">Kamar Mandi</label>
                            <select class="form-control" name="kamar_mandi" id="kamar_mandi">
                                <option>1 Kamar Mandi</option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary"><i class="bi-search me-1"></i> Cari
                                Unit</button>
                        </div>
                    </div>
                </div> --}}
                <div class="sliders">
                    <div class="slider-image">
                        <img src="{{ asset('Home') }}/images/cluster/A-11.jpg" class="w-100" alt="">
                    </div>
                    <div class="text-blur-bg d-none d-lg-block">
                        <h5>Beautiful Green themed House</h5>
                        <p>TGreenlandmengkombinasikan gaya arsitektur kontemporer dengan alam yang memanjakan
                            pemiliknya
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-only">
    <div class="choose-cluster">
        <h2 class="title">
            Pilih Cluster
        </h2>
        <div class="row">
            @foreach ($cluster1 as $cluster)
            <div class="col-6 col-lg-3">
                <a href="{{ route('simulationCluster') }}">
                    <div class="item">
                        <div class="item-image">
                            <?php
                            if(!empty($cluster->nama_img)){
                                ?>
                            <img src="{{ asset('Home') }}/images/cluster/{{$cluster->nama_img}}" alt="">
                            <?php
                            }else{
                            ?>

                            <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                            <?php
                            }
                            ?>

                        </div>
                        <div class="item-avail">{{ $cluster->count }} Available</div>
                        <div class="item-image" style="border-bottom:0px; padding-bottom:0px;"><img
                                style="width:50%;height:50%;filter: invert(100%);"
                                src="{{ asset('Home') }}/images/logo_cluster/{{$cluster->logo_img}}" alt=""></div>
                    </div>


                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>




<div class="projects">
    <div class="container">
        <h5 class="subtitle">
            Cluster
        </h5>
        <h2 class="title">
            Hunian di Greenland
        </h2>
        <div class="row">
            @foreach ($cluster1 as $cluster)


            <div class="col-12 col-lg-6">
                <div class="item" data-aos="fade-right">
                    <?php
                    if(!empty($cluster->nama_img))
                    {
                        ?>
                    <img src="{{ asset('Home') }}/images/cluster/{{$cluster->nama_img}}" alt="">
                    <?php
                    }else{
                    ?>

                    <img src="{{ asset('Home') }}/images/cluster/AC-18.jpg" class="w-100" alt="">

                    <?php
                    }
                    ?>

                    <div class="item-text">

                        @if(!empty($cluster->logo_img))
                        <a href="{{ route('simulationCluster') }}"> <img style="width: 50%"
                                src="{{ asset('Home') }}/images/logo_cluster/{{$cluster->logo_img}}" alt=""> </a>
                        @else
                        <a href="{{ route('simulationCluster') }}">
                            {{ $cluster->nama_cluster }}
                        </a>

                        @endif
                    </div>
                </div>
            </div>
            @endforeach

            {{-- <div class="col-12 d-flex justify-content-center" data-aos="fade-up">
                <button type="button" class="btn btn-primary">Tampilkan Semua</button>
            </div> --}}
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

<div class="testimoni">
    <div class="container-fluid px-0">
        <div class="testimoni-items">
            <div class="item-slider">
                <div class="row">
                    <div class="col-12 col-lg-6 pe-0 d-none d-lg-block" data-aos="fade-right">
                        <div class="image-sliders">
                            <div class="image-item">
                                <img src="{{ asset('Home') }}/images/img-testimonial.png" class="w-100" alt="">
                                <div class="text-blur-bg">
                                    <h5>Alex Boston</h5>
                                    <p>Residence</p>
                                </div>
                            </div>
                            <div class="image-item">
                                <img src="{{ asset('Home') }}/images/img-food-court.png" class="w-100" alt="">
                                <div class="text-blur-bg">
                                    <h5>Food Court</h5>
                                    <p>upcoming Soon</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 right-side" data-aos="fade-left">
                        <div class="testimoni-sliders">
                            <div class="item">
                                <div class="quotes-icon">
                                    <img src="{{ asset('Home') }}/images/ic-quote.png" alt="">
                                </div>
                                <h2 class="testimoni-text">
                                    Hunian Berkelas dimana anda dan keluarga menatap masa depan nan gemilang
                                </h2>
                                <div class="until-tablet">
                                    <div class="items">
                                        <div class="user">
                                            <div><img src="{{ asset('Home') }}/images/img-testimonial.png" alt=""></div>
                                            <div>
                                                <h6>Alex Boston</h6>
                                                <small>Residence</small>
                                            </div>
                                        </div>
                                        <div class="quote">
                                            <img src="{{ asset('Home') }}/images/ic-quote.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="quotes-icon">
                                    <img src="{{ asset('Home') }}/images/ic-quote.png" alt="">
                                </div>
                                <h3 class="testimoni-text">
                                    -- coming soon --
                                </h3>
                                <div class="until-tablet">
                                    <div class="items">
                                        <div class="user">
                                            <div><img src="{{ asset('Home') }}/images/img-testimonial.png" alt=""></div>
                                            <div>
                                                <h6>Alex Boston</h6>
                                                <small>Residence</small>
                                            </div>
                                        </div>
                                        <div class="quote">
                                            <img src="{{ asset('Home') }}/images/ic-quote.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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

<div class="features" data-aos="zoom-in-right">
    <div class="container">
        <h5 class="subtitle">Features
        </h5>
        <h2 class="title">
            Nyaman dan aman
        </h2>
        <div class="row">
            <div class="col-12 col-lg-4 feature">
                <img src="{{ asset('Home') }}/images/one-way.png" alt="">
                <h3>One Gate System</h3>
                <p>Keamanan lingkungan
                    perumahan lebih terjamin
                    dengan One Gate System
                    yang terintegrasi.</p>
                {{-- <a href="" class="more">Learn More <i class="bi bi-chevron-right"></i></a> --}}
            </div>
            <div class="col-12 col-lg-4 feature">
                <img src="{{ asset('Home') }}/images/img-cctv.png" alt="">
                <h3>CCTV 24 Hours</h3>
                <p>Perlindungan penuh dengan pengawasan CCTV dan
                    penjagaan security selama 24
                    jam non-stop</p>
                {{-- <a href="" class="more">Learn More <i class="bi bi-chevron-right"></i></a> --}}

            </div>
            <div class="col-12 col-lg-4 feature">
                <img src="{{ asset('Home') }}/images/img-gate.png" alt="">
                <h3>Taman Bermain</h3>
                <p>Meningkatkan kenyamanan
                    keluarga besar Greenland
                    dengan taman luas
                </p>
                {{-- <a href="" class="more">Learn More <i class="bi bi-chevron-right"></i></a> --}}
            </div>

            {{-- <div class="col-12 mt-4">
                <div class="btn-groups mt-0">
                    <button type="button" class="btn btn-outline-primary">See All Features</button>

                </div>
            </div> --}}
        </div>
    </div>
</div>

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

<div class="excellence">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12" data-aos="fade-right">
                <div class="image-container left-text">
                    <img src="{{ asset('Home') }}/images/img-home-section2.png" alt="">
                    <div class="text-blur-bg">
                        <h1>Berada di pusat pendidikan.</h1>
                        <p>Dukung anak-anak mendapatkan pendidikan terbaik dengan kemudahan
                            akses dan fasilitas terbaik</p>
                        <a href="#" class="more">Learn More <i class="bi-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12" data-aos="fade-left">
                <div class="image-container">
                    <img src="{{ asset('Home') }}/images/img-home-section3.png" alt="">
                    <div class="item-text">
                        <div class="text-blur-bg">
                            <h1>Belanja bebas tanpa kendala.</h1>
                            <p>Dukung anak-anak mendapatkan pendidikan terbaik dengan kemudahan
                                akses dan fasilitas terbaik</p>
                            <a href="#" class="more">Learn More <i class="bi-chevron-right"></i>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-right">
                    <div class="image-container left-text">
                        <img src="{{ asset('Home') }}/images/img-home-section4.png" alt="">
                        <div class="text-blur-bg">
                            <h1>Pastikan yang tercinta tetap terlindungi.</h1>
                            <p>Dukung anak-anak mendapatkan pendidikan terbaik dengan kemudahan
                                akses dan fasilitas terbaik</p>
                            <a href="#" class="more">Learn More <i class="bi-chevron-right"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="locations" data-aos="fade-up">
    <div class="container-fluid left-side">
        <h5 class="subtitle">Locations
        </h5>
        <h2 class="title">Ya, sedekat ini
        </h2>

        <div class="items" id="items_locations">
            <div class="item">
                <img src="{{ asset('Home') }}/images/img-nearby1.png" alt="Malang Town Square (MATOS)">
                <div class="text-blur-bg">
                    <h5 class="text">Malang Town Square (MATOS)</h5>
                    <div class="d-flex">
                        <p class="type">Supermall</p>
                        <div class="eta">
                            <img src="{{ asset('Home') }}/images/ic-car.png" alt="">
                            <p>7 Minutes</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('Home') }}/images/img-nearby2.png" alt="Swimming Pool">
                <div class="text-blur-bg">
                    <h5 class="text">Mall Olympic Garden (MOG)</h5>
                    <div class="d-flex">
                        <p class="type">Supermall</p>
                        <div class="eta">
                            <img src="{{ asset('Home') }}/images/ic-car.png" alt="">
                            <p>8 Minutes</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('Home') }}/images/img-nearby3.png" alt="Sport Center">
                <div class="text-blur-bg">
                    <h5 class="text">Persada Hospital</h5>
                    <div class="d-flex">
                        <p class="type">Layanan Kesehatan</p>
                        <div class="eta">
                            <img src="{{ asset('Home') }}/images/ic-car.png" alt="">
                            <p>27 Minutes</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('Home') }}/images/img-nearby4.png" alt="Food Court">
                <div class="text-blur-bg">
                    <h5 class="text">Universitas Brawijaya (UB)</h5>
                    <div class="d-flex">
                        <p class="type">Pendidikan</p>
                        <div class="eta">
                            <img src="{{ asset('Home') }}/images/ic-car.png" alt="">
                            <p>7 Minutes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ele = document.getElementById('items_locations');
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
</div>

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
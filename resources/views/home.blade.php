@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.navbarProfile')

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
                    {{-- <div>
                        <img src="{{ asset('Home') }}/images/60.jpg" class="w-100" alt="">
                    </div> --}}
                    <div>
                        <img src="{{ asset('Home') }}/images/page-picture/greenland-banner.jpg" class="w-100" alt="">
                    </div>
                    <div>
                        <img src="{{ asset('Home') }}/images/page-picture/kalm-banner.jpg" class="w-100" alt="">
                    </div>

                    {{-- <div>
                        <img src="{{ asset('Home') }}/images/img4.jpeg" class="w-100" alt="">
                    </div> --}}
                </div>
                <div class="text-blur-bg text-sliders">
                    <div>
                        <h5>Greenland</h5>
                        <small>Hunian hijau di Greenland at Tidar </small><br>
                        <!--<a href="" style="width: 30%" class="btn btn-primary d-lg-block">Buy Now</a>-->
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
                <div class="item">
                    <div class="item-img">
                        <img src="{{ asset('Home') }}/images/mobile-cover.jpg" alt="">
                    </div>
                </div>
                <a href="/Housing/Greenland" class="item">
                    <div class="logo">
                        <img src="{{ asset('Home') }}/images/logo-tidar-white.png" alt="">
                    </div>
                    <div class="item-img">
                        <img src="{{ asset('Home') }}/images/mobile-sliders1.png" alt="">
                    </div>


                    <!-- <div class="float-button">-->
                    <!--    Miliki Unit <i class="bi-chevron-right"></i>-->
                    <!--</div>-->
                </a>
                 <a href="/Housing/Kalm" class="item">
                    <div class="item-img">
                        <img src="{{ asset('Home') }}/images/kalm-cover-mobile.jpg" alt="">
                    </div>


                    <!-- <div class="float-button">-->
                    <!--    Miliki Unit <i class="bi-chevron-right"></i>-->
                    <!--</div>-->
                </a>
                <!--<div class="item">-->
                <!--    <div class="logo">-->
                <!--        <img src="{{ asset('Home') }}/images/logo-kalm.png" alt="">-->
                <!--    </div>-->
                <!--    <div class="item-img">-->
                <!--        <img src="{{ asset('Home') }}/images/img-greenland2.png" alt="">-->
                <!--    </div>-->
                <!--         <button type="button" class="float-button" onclick="location.href='/Greenland';">-->
                <!--             Miliki Unit <i class="bi-chevron-right"></i>-->
                <!--         </button>-->
                <!--</div>-->


            </div>
        </div>
    </div>

    <div class="search-unit">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="semua-tab" data-bs-toggle="tab" data-bs-target="#semua-tab-pane"
                        type="button" role="tab" aria-controls="semua-tab-pane" aria-selected="true">Proyek
                        Kita</button>
                </li>
                {{-- <li class="nav-item" role="presentation">
                    <button class="nav-link" id="perumahaan-tab" data-bs-toggle="tab"
                        data-bs-target="#perumahaan-tab-pane" type="button" role="tab"
                        aria-controls="perumahaan-tab-pane" aria-selected="false">Perumahaan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="apartemen-tab" data-bs-toggle="tab"
                        data-bs-target="#apartemen-tab-pane" type="button" role="tab" aria-controls="apartemen-tab-pane"
                        aria-selected="false">Apartemen</button>
                </li> --}}
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="semua-tab-pane" role="tabpanel" aria-labelledby="semua-tab"
                    tabindex="0">
                    <div class="units">
                        <a href="/Housing/Greenland" class="item">
                            <div class="item-img">
                                <img style="width:100%;height:100%;" src="{{ asset('Home') }}/images/page-picture/mobile-greenland.jpg"
                                    alt="">
                            </div>
                            <h6>Greenland</h6>
                            <p>Perumahan Greenland at Tidar </p>
                        </a>
                        <a href="/Housing/Kalm" class="item">
                            <div class="item-img">
                                <img style="width:100%;height:100%;" src="{{ asset('Home') }}/images/page-picture/mobile-kalm.jpg"
                                    alt="">
                            </div>
                            <h6>Kalm</h6>
                            <p>Coming Soon</p>
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
<div class="promotions"  data-aos="zoom-right" data-aos-offset="0" data-aos-duration="500">
    <div class="container">
        <h5 class="subtitle">
            Promotions
        </h5>
        <h2 class="title">
            Lebih untung pakai promo!
        </h2>
        <div class="sliders-index container-fluid" data-aos="zoom-in" style="padding-bottom: 1.8rem !important;">
    <div class="sliders">
        <div class="slider-item">
            <div class="slider-img">
                <img src="{{ asset('Home') }}/images/promo/promo-desember.jpg" class="w-100" alt="">
            </div>
            <div class="slider-content">
                <h1 class="title">
                    
                </h1>
                <div class="desc questrial">
                    <div class="text"><h3>Promo Greenland at Tidar</h3></div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="mobile-only">
    <div class="cta-mobile">
        <div class="container">
            <div class="sliders-mobile">
                <div class="item">
                    <div class="item-img">
                        <img src="{{ asset('Home') }}/images/promo/promo-desember.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<h5 class="subtitle">
            Kode Promo
        </h5>
        <div class="row items">
            @foreach ($promo as $promo)
            <div class="col-12 col-sm-6 col-lg-4 mb-3 align-self-center">

                <div class="item green">
                    <div class="cashback">
                        <div class="text-cashback">
                            <h5>{{$promo->promo}}</h5>
                            <br>
                            <!--<h3>Free promo</h3>-->
                            <h6>{{$promo->keterangan}}</h6>
                            <small>Berlaku hingga: {{
                                \Carbon\Carbon::parse($promo->tgl_berakhir)->format('d-M-Y')}}</small>
                            <div class="mobile-only">
                                <p id="codePromoTxt">{{$promo->kode_promo}}</p>
                                <button onclick="copyToClipboard('#codePromoTxt')" type="button"
                                    class="btn btn-white">Salin Kode <img class="ms-2"
                                        src="{{ asset('Home') }}/images/ic-copy.png" alt=""></button>
                            </div>
                        </div>

                        <div class="bg-cashback">
                            <img src="{{ asset('Home') }}/images/img-promo.png" alt="">
                        </div>
                        <div class="promo-date">
                            <div class="date-text questrial">
                                <i class="bi-clock"></i>
                                {{ \Carbon\Carbon::parse($promo->tgl_aktif)->format('d-M-Y')}}
                            </div>
                        </div>
                    </div>
                    <div class="line">
                        <img src="{{ asset('Home') }}/images/line-coupon.png" alt="">
                    </div>
                    <div class="qr">
                        <!--<div class="qr-img">-->
                        <!--    <img src="{{ asset('Home') }}/images/qr-code.png" alt="">-->
                        <!--</div>-->
                        <p>Copy the code</p>
                        <p id="codePromoTxt">{{$promo->kode_promo}}</p>
                        <button onclick="copyToClipboard('#codePromoTxt')" type="button" class="btn btn-white">Salin
                            Kode <img class="ms-2" src="{{ asset('Home') }}/images/ic-copy.png" alt=""></button>
                    </div>
                </div>
            </div>
            @endforeach
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
            <div class="col-6 col-lg-6">
                <div class="item" data-aos="fade-left">
                    <img src="{{ asset('Home') }}/images/page-picture/greenland-banner.jpg" alt="">
                    <div class="item-text">
                        <h4>Greenland</h4>
                        <p>Perumahan Greenland at Tidar</p>
                        <a href="/Housing/Kalm" class="more">
                            Learn More <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6">
                <div class="item" data-aos="fade-left">
                    <img src="{{ asset('Home') }}/images/page-picture/kalm-banner.jpg" alt="">
                    <div class="item-text">
                        <h4>Kalm</h4>
                        <p>-- COMING SOON --</p>
                        <a href="/Housing/Kalm" class="more">
                            Learn More <i class="bi bi-chevron-right"></i>
                        </a>
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
                    <div class="text questrial">A beautiful style in green, captivating yet refresh for those who seek
                        comfort </div>
                    <!--<div class="more">Learn More <i class="bi bi-chevron-right"></i></div>-->
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



<script>
    function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>

@endsection
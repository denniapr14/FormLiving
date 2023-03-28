@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Detail Cluster')
@section('body','')

@section('content')
<div class="detail-cluster">
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
            <div class="step done">2</div>
            <div class="step done">3</div>
            <div class="step active">4</div>
            <div class="step">5</div>
            <div class="step">6</div>
            <div class="step">7</div>
            <div class="step last">8</div>
        </div>

    </div>
    <div class="container">
        <div class="steps">
            <div class="step done">1</div>
            <div class="step done">2</div>
            <div class="step done">3</div>
            <div class="step active">4</div>
            <div class="step">5</div>
            <div class="step">6</div>
            <div class="step">7</div>
            <div class="step last">8</div>
        </div>

        <div class="header-detail mobile-only">
            <div class="sliders">
                <div class="item">
                    <div class="item-img">
                        <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('.header-detail .sliders').slick()
            });
        </script>
        <div class=" gallery desktop-only">
            <div class="row">

                <div class="col-12 col-lg-9 image-left mb-3 mb-lg-0">
                    <img src="{{ asset('Home') }}/images/rumah/{{ $imgRumahSingle->img_rumah }}" alt="">
                </div>
                <div class="col-12 col-lg-3 image-right">
                    <div class="row">

                        <div class="col-4 col-lg-12 mb-0 mb-lg-4">
                            <a href="#" class="see-more">
                                <img src="{{ asset('Home') }}/images/rumah/{{ $imgRumahSingle->img_rumah }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="gallery-popup">
            <div class="container">
                <div class="icon-close">
                    <i class="bi-x-lg"></i>
                </div>
                <div class="main-images">
                    @foreach ($imgRumah as $imgRumah)


                    <div class="main-item">
                        <img src="{{ asset('Home') }}/images/rumah/{{ $imgRumah->img_rumah }}" alt="">
                    </div>

                    @endforeach
                </div>

                <div class="thumbnails-container">
                    <div class="thumbnails">
                        @foreach ($imgRumah2 as $gambarRumah)


                    <div class="main-item">
                        <img src="{{ asset('Home') }}/images/rumah/{{ $gambarRumah->img_rumah }}" alt="">
                    </div>

                    @endforeach
                    </div>
                </div>
            </div>

        </div>

        <script>
            $(document).ready(function () {

                $('.icon-close').click(function (e) {
                    e.preventDefault();
                    $('.gallery-popup').removeClass('active');
                    $('.main-images').slick('destroy');
                    $('.thumbnails').slick('destroy');

                });
                $('.see-more').click(function (e) {
                    e.preventDefault();
                    $('.gallery-popup').addClass('active');

                    $('.main-images').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        asNavFor: '.thumbnails'
                    });

                    $('.thumbnails').slick({
                        slidesToShow: 4,
                        arrows: true,
                        slidesToScroll: 1,
                        dots: false,
                        asNavFor: '.main-images',
                        nextArrow: ' <div class="slick-next"><img src="{{ asset('Home') }}/images/btn-right.png"  alt=""></div>',
                        prevArrow: ' <div class="slick-prev"><img src="{{ asset('Home') }}/images/btn-left.png" alt=""></div>',
                    });

                });

            });
        </script>

        <div class="content">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3>The Mainroad Cluster</h3>
                </div>
                <div class="text-end desktop-only">
                    <p class="mb-2">Start from</p>
                    <h5>975 jt</h5>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p>Type: 150</p>
                    <div class="d-flex">
                        <div class="small-info me-3">
                            <img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2 Kamar Tidur
                        </div>
                        <div class="small-info">
                            <img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1 Kamar Mandi
                        </div>
                    </div>
                </div>
                <div class="desktop-only">
                    <div>

                    </div>
                </div>
            </div>
            <hr>
            <div class="spesification">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="denah-tab" data-bs-toggle="tab" data-bs-target="#denah"
                            type="button" role="tab" aria-controls="denah" aria-selected="true">Denah</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="spesifikasi-tab" data-bs-toggle="tab"
                            data-bs-target="#spesifikasi" type="button" role="tab" aria-controls="spesifikasi"
                            aria-selected="false">Spesifikasi
                            Umum</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="denah" role="tabpanel" aria-labelledby="denah-tab">
                        <div class="denah-sliders mt-4">
                            <div class="img-denah">
                                <img src="{{ asset('Home') }}/images/img-denah.png" alt="">
                            </div>
                            <div class="img-denah">
                                <img src="{{ asset('Home') }}/images/img-greenland.png" alt="">
                            </div>
                        </div>
                    </div>
                    <script>
                        $('.denah-sliders').slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: true,
                            dots: true,
                            fade: true,
                        });
                    </script>
                    <div class="tab-pane fade" id="spesifikasi" role="tabpanel" aria-labelledby="spesifikasi-tab">
                        <div class="spec-table">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Pondasi</td>
                                        <td>Batu kali, footplate</td>
                                    </tr>
                                    <tr>
                                        <td>Struktur</td>
                                        <td>Beton bertulang</td>
                                    </tr>
                                    <tr>
                                        <td>Dinding luar</td>
                                        <td>Pasangan bata finishing cat/woodplank/batu alam</td>
                                    </tr>
                                    <tr>
                                        <td>Dinding dalam</td>
                                        <td>Pasangan bata finishing cat</td>
                                    </tr>
                                    <tr>
                                        <td>Dinding kamar mandi</td>
                                        <td>Granitile 60x60</td>
                                    </tr>
                                    <tr>
                                        <td>Rangka atap</td>
                                        <td>Galvalum</td>
                                    </tr>
                                    <tr>
                                        <td>Penutup atap</td>
                                        <td>Genteng flat beton </td>
                                    </tr>
                                    <tr>
                                        <td>Plafon Dalam</td>
                                        <td>Gypsum</td>
                                    </tr>
                                    <tr>
                                        <td>Plafon Luar</td>
                                        <td>Fiber Semen</td>
                                    </tr>
                                    <tr>
                                        <td>Lantai Ruang Utama</td>
                                        <td>Granitile 60x60</td>
                                    </tr>
                                    <tr>
                                        <td>Sanitasi Kamar Mandi</td>
                                        <td>American Standart</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-only">
                <div class="content-footer">
                    <div>
                        <p class="mb-2">Harga</p>
                        <h5>975 jt</h5>
                    </div>
                    {{--  <div>
                        <a href="/simulation-payment-option/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}" type="button" class="btn btn-primary">Miliki Unit
                            Ini</a>

                    </div>  --}}
                </div>
            </div>
        </div>

        <div class="btn-groups">
            <a href="/simulation-type/{{ $rumah->id_rumah }}" type="button"
                class="btn btn-grey">Kembali</a>
                <a href="/simulation-payment-option/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}" type="button" class="btn btn-primary">Miliki Unit
                    Ini</a>
            {{--  <a href="/k-simulation-modification.html" type="button" class="btn btn-primary">Lanjutkan</a>  --}}
        </div>
    </div>
</div>


@endsection

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
            <!--<div class="ic-back">-->
            <!--    <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">-->
            <!--</div>-->
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
         <style>
            @media screen and (max-width: 480px) {
              .gone-mobile {
                  
                visibility: hidden;
                display: none;
              }
              .divUp{
                  padding-top :10%;
                  border-radius : 10px;
              }
            }
        </style>
        <div class="divUp"></div>
        <div class="steps gone-mobile">
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
                         @if (empty($imgRumahSingle->img_rumah))
                               <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                                @else
                                <img src="{{ asset('Home') }}/images/rumah/{{ $imgRumahSingle->img_rumah }}" alt="">
                                @endif
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
                    @if (empty($imgRumahSingle->img_rumah))
                    <img src="{{ asset('Home') }}/images/NoImg.jpg" alt="">

                    @else

                    <img src="{{ asset('Home') }}/images/rumah/{{ $imgRumahSingle->img_rumah }}" alt="">
                    @endif
                </div>
                <div class="col-12 col-lg-3 image-right">
                    <div class="row">

                        <div class="col-4 col-lg-12 mb-0 mb-lg-4">

                            <a href="#" class="see-more">
                                @if (empty($imgRumahSingle->img_rumah))
                                <img src="{{ asset('Home') }}/images/NoImg.jpg" alt="">

                                @else

                                <img src="{{ asset('Home') }}/images/rumah/{{ $imgRumahSingle->img_rumah }}" alt="">
                                @endif
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
                        @if (empty($imgRumah->img_rumah))
                        <img src="{{ asset('Home') }}/images/NoImg.jpg" alt="">

                        @else

                        <img src="{{ asset('Home') }}/images/rumah/{{ $imgRumah->img_rumah }}" alt="">
                        @endif
                    </div>

                    @endforeach

                </div>

                {{-- <div class="thumbnails-container">
                    <div class="thumbnails">
                        @foreach ($imgRumah2 as $gambarRumah)


                    <div class="main-item">

                        @if (!empty($imgRumah2->img_rumah))
                        <img src="{{ asset('Home') }}/images/NoImg.jpg" alt="">

                        @else
                        <img src="{{ asset('Home') }}/images/rumah/{{ $gambarRumah->img_rumah }}" alt="">
                        @endif
                    </div>

                    @endforeach
                    </div>
                </div> --}}
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

                // $('.gallery-popup').click(function(e){
                //     $('.gallery-popup').removeClass('active');
                //      $('.main-images').slick('destroy');
                //     $('.thumbnails').slick('destroy');
                // });

                $('.see-more').click(function (e) {
                    e.preventDefault();
                    $('.gallery-popup').addClass('active');
                    $('.main-images').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        dots : false,
                        // asNavFor: '.thumbnails'
                        // asNavFor: '.main-images',
                    });

                    $()

                    $('.thumbnails').slick({
                        slidesToShow: 1,
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
                    <h3>{{$rumah->nama_cluster}} Cluster - {{$rumah->blok}}-{{$rumah->nomor}}</h3>
                </div>
                <div class="text-end desktop-only">
                    <p class="mb-2">Harga Total</p>
                    <h5>{{ $tipeRumah->harga_text_tr }}</h5>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p>Type: {{ $tipeRumah->jenis_tr }}</p>
                    <div class="d-flex">
                        <div class="small-info me-3">
                            <img src="{{ asset('Home') }}/images/ic_bedroom.png" alt="">{{$tipeRumah->kmr_tidur_tr}} Kamar Tidur
                        </div>
                        <div class="small-info">
                            <img src="{{ asset('Home') }}/images/ic_bathroom.png" alt="">{{$tipeRumah->kmr_mandi_tr}} Kamar Mandi
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
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="kalkulator-tab" data-bs-toggle="tab"
                            data-bs-target="#kalkulator" type="button" role="tab" aria-controls="kalkulator"
                            aria-selected="false">Simulasi Kalkulator KPR</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="denah" role="tabpanel" aria-labelledby="denah-tab">
                        <div class="denah-sliders mt-4">
                            @foreach ($imgDenah as $denah)
                            <div class="img-denah">
                                @if (empty($denah->img_rumah))
                                <img src="{{ asset('Home') }}/images/NoImg.jpg" alt="">
                                @else
                                <img src="{{ asset('Home') }}/images/denah/{{ $denah->img_rumah }}" alt="">
                                @endif
                            </div>
                            @endforeach
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
                                        <td>{{ $tipeRumah->pondasi_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Struktur</td>
                                        <td>{{ $tipeRumah->struktur_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dinding luar</td>
                                        <td>{{ $tipeRumah->dinding_dlm_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dinding dalam</td>
                                        <td>{{ $tipeRumah->dinding_luar_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dinding kamar mandi Utama</td>
                                        <td>{{ $tipeRumah->dinding_kmr_mnd_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dinding meja Dapur</td>
                                        <td>{{ $tipeRumah->dd_meja_dapur_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lantai Ruang Tidur</td>
                                        <td>{{ $tipeRumah->lt_ruang_tidur_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lantai Ruang keluarga</td>
                                        <td>{{ $tipeRumah->lt_ruang_keluarga_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lantai kamar mandi Utama</td>
                                        <td>{{ $tipeRumah->lt_kmr_mnd_utama_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lantai Teras Utama</td>
                                        <td>{{ $tipeRumah->lt_teras_utama_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rangka atap</td>
                                        <td>{{ $tipeRumah->rangka_atap_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>kusen</td>
                                        <td>{{ $tipeRumah->kusen_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Daun Pintu</td>
                                        <td>{{ $tipeRumah->daun_pintu_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sanitary</td>
                                        <td>{{ $tipeRumah->sanitary_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Penutup atap</td>
                                        <td>{{ $tipeRumah->penutup_atap_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Plafon Dalam</td>
                                        <td>{{ $tipeRumah->plafon_dlm_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Handle</td>
                                        <td>{{ $tipeRumah->handle_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lighting</td>
                                        <td>{{ $tipeRumah->lighting_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Daya Listrik</td>
                                        <td>{{ $tipeRumah->daya_listrik_tr }}</td>
                                    </tr>
                                  <tr>
                                        <td>Carport</td>
                                        <td>{{ $tipeRumah->carport_tr }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tangga</td>
                                        <td>{{ $tipeRumah->tangga_tr }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-only">
                <div class="content-footer" style="padding-bottom:0; border-radius:10px;">
                    <div>
                        <table style="border: 1px solid transparent">
                            <tr>
                                <td>
                                    <small class="mb-2">Harga Jual</small>
                                    <p><b>{{ $tipeRumah->harga_text_tr }}</b></p>
                                </td>
                                <td style="padding-bottom:0;padding-right:10%;width:20px;"></td>
                                <td>
                                     <small class="mb-2">Luas Tanah</small>
                                     <p><b>{{ $rumah->luas_tanah }} m²</b></p>
                                </td>
                                <td style="padding-bottom:0;padding-right:10%;width:20px;"> </td>
                                  <td>
                                     <small class="mb-2">Luas Bangunan</small>
                                     <p><b>{{ $tipeRumah->luas_bangunan_tr }} m²</b></p>
                                </td>
                            </tr>
                        </table>
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
                <a href="/simulation-data-pelanggan/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}" type="button" class="btn btn-primary">Miliki Unit
                    Ini</a>
            {{--  <a href="/k-simulation-modification.html" type="button" class="btn btn-primary">Lanjutkan</a>  --}}
        </div>
    </div>
</div>


@endsection

@extends('kioskTemplate.app')
@extends('kioskTemplate.sidebarStep')

@section('tittle','Forms | Simulasi Kluster')
@section('body','kiosk')

@section('content')

<div class="kiosk-content">
    <div class="categories">
        <div class="container-fluid k-unit">
            <div class="header-detail">
                <div class="sliders">
                    <div class="item">
                        <div class="img-sliders">
                            <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="img-sliders">
                            <img src="{{ asset('Home') }}/images/img-cluster-large1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function () {
                    $('.header-detail .sliders').slick({
                        arrows: false
                    })
                });
            </script>
            <div class="content">
                <div class="unit-desc">
                    <div>
                        <h3>The Mainroad Cluster</h3>
                        <h4>Type: 150</p>
                    </div>
                    <div class="text-end desktop-only">
                        <p>Start from</p>
                        <h3 class="mb-0">975 jt</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="d-flex">
                            <div class="small-info me-3">
                                <img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2 Kamar Tidur
                            </div>
                            <div class="small-info">
                                <img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1 Kamar Mandi
                            </div>
                        </div>
                    </div>
                </div>
                <div class="spesification">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="denah-tab" data-bs-toggle="tab"
                                data-bs-target="#denah" type="button" role="tab" aria-controls="denah"
                                aria-selected="true">Denah</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="spesifikasi-tab" data-bs-toggle="tab"
                                data-bs-target="#spesifikasi" type="button" role="tab" aria-controls="spesifikasi"
                                aria-selected="false">Spesifikasi
                                Umum</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="denah" role="tabpanel"
                            aria-labelledby="denah-tab">
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
                        <div class="tab-pane fade" id="spesifikasi" role="tabpanel"
                            aria-labelledby="spesifikasi-tab">
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
                <div class="btn-groups-kiosk">
                    <a href="/kiosk/projek-pilih-kluster" type="button" class="btn btn-grey">Kembali</a>
                    <a href="/kiosk/simulasi-kluster" type="button" class="btn btn-primary">Miliki Unit
                        Ini</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

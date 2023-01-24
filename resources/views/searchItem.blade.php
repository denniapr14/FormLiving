@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.navbarProfile')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Cari Rumah')
@section('body','index')

@section('content')

<div class="container search-header">
    <h5>Cari Unit</h5>
    <div class="search">
        <div class="search-bar">
            <input type="text" class="form-control" name="search" id="search" placeholder="Search">
        </div>
        <div class="ic-mobile">
            <a data-bs-toggle="offcanvas" href="#filter" role="button" aria-controls="filterLabel">
                <img src="{{ asset('Home') }}/images/ic-filter.svg" alt="">
            </a>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end filter" tabindex="-1" id="filter" aria-labelledby="filterLabel">
    <div class="header-simulation mobile-only">
        <div class="ornament one">
            <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
        </div>
        <div class="nav-header">
            <a href="#" type="button" class="ic-back" data-bs-dismiss="offcanvas" aria-label="Close">
                <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">
            </a>
            <h2 class="title">
                Filter Umum
            </h2>
            <div></div>
        </div>
    </div>

    <div class="container">
        <div class="second-layout">
            <div class="row">
                <div class="col-12">
                    <div class="filter-section">
                        <h6>Kamar Tidur</h6>
                        <div class="items">
                            <div class="item active">Semua</div>
                            <div class="item">1</div>
                            <div class="item">2</div>
                            <div class="item">3</div>
                        </div>
                    </div>
                    <div class="filter-section">
                        <h6>Kamar Mandi</h6>
                        <div class="items">
                            <div class="item active">Semua</div>
                            <div class="item">1</div>
                            <div class="item">2</div>
                            <div class="item">3</div>
                        </div>
                    </div>
                    <div class="filter-section">
                        <h6>Rentang Harga</h6>
                        <div class="range-price">
                            <div id="slider-range"></div>
                        </div>
                    </div>
                    <div class="filter-section">
                        <h6>Cicilan Per Bulan</h6>
                        <div class="range-price">
                            <div id="slider-range-month"></div>
                        </div>
                    </div>

                    <script>
                        $(function () {
                            $("#slider-range").slider({
                                range: true,
                                min: 0,
                                max: 500,
                                values: [75, 300],
                                slide: function (event, ui) {
                                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                                }
                            });
                            $("#slider-range-month").slider({
                                range: true,
                                min: 0,
                                max: 500,
                                values: [75, 300],
                                slide: function (event, ui) {
                                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                                }
                            });
                        });
                    </script>
                    </script>
                    <div class="btn-groups">
                        <button type="button" class="btn btn-grey mx-2">Bersihkan</button>
                        <button type="button" class="btn btn-primary mx-2">Terapkan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mobile-only with-nav">
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
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="hotel-tab" data-bs-toggle="tab" data-bs-target="#hotel-tab-pane"
                        type="button" role="tab" aria-controls="hotel-tab-pane" aria-selected="false">Hotel</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="semua-tab-pane" role="tabpanel"
                    aria-labelledby="semua-tab" tabindex="0">
                    <div class="mainroad mt-3">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <a href="/detail-cluster" class="item">
                                    <div class="item-image">
                                        <img src="{{ asset('Home') }}/images/img-cluster1.png" alt="">
                                    </div>
                                    <div class="item-desc">
                                        <h5 class="type">Type: 150</h5>
                                        <div class="type-infos">
                                            <div class="info">
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2
                                                </div>
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1
                                                </div>
                                            </div>
                                            <div>
                                                <h5>Rp. 975 Juta</h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="item">
                                    <div class="item-image">
                                        <img src="{{ asset('Home') }}/images/img-cluster2.png" alt="">
                                    </div>
                                    <div class="item-desc">
                                        <h5 class="type">Type: 145</h5>
                                        <div class="type-infos">
                                            <div class="info">
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2
                                                </div>
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1
                                                </div>
                                            </div>
                                            <div>
                                                <h5>Rp. 750 Juta</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="item">
                                    <div class="item-image">
                                        <img src="{{ asset('Home') }}/images/img-cluster3.png" alt="">
                                    </div>
                                    <div class="item-desc">
                                        <h5 class="type">Type: 135</h5>
                                        <div class="type-infos">
                                            <div class="info">
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2
                                                </div>
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1
                                                </div>
                                            </div>
                                            <div>
                                                <h5>Rp. 575 Juta</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="item">
                                    <div class="item-image">
                                        <img src="{{ asset('Home') }}/images/img-cluster4.png" alt="">
                                    </div>
                                    <div class="item-desc">
                                        <h5 class="type">Type: 80</h5>
                                        <div class="type-infos">
                                            <div class="info">
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2
                                                </div>
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1
                                                </div>
                                            </div>
                                            <div>
                                                <h5>Rp. 360 Juta</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="item">
                                    <div class="item-image">
                                        <img src="{{ asset('Home') }}/images/img-cluster5.png" alt="">
                                    </div>
                                    <div class="item-desc">
                                        <h5 class="type">Type: 65</h5>
                                        <div class="type-infos">
                                            <div class="info">
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2
                                                </div>
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1
                                                </div>
                                            </div>
                                            <div>
                                                <h5>Rp. 300 Juta</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="item">
                                    <div class="item-image">
                                        <img src="{{ asset('Home') }}/images/img-cluster6.png" alt="">
                                    </div>
                                    <div class="item-desc">
                                        <h5 class="type">Type: 55</h5>
                                        <div class="type-infos">
                                            <div class="info">
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2
                                                </div>
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1
                                                </div>
                                            </div>
                                            <div>
                                                <h5>Rp. 274 Juta</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
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
                <div class="tab-pane fade" id="hotel-tab-pane" role="tabpanel" aria-labelledby="hotel-tab"
                    tabindex="0">
                    <div class="no-unit">
                        <img src="{{ asset('Home') }}/images/img-illustration5.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

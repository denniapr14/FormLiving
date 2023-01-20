@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.navbarProfile')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | FilterResult')
@section('body','index')

@section('content')

<div class="header-simulation mobile-only">
    <div class="ornament one">
        <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
    </div>
    <div class="nav-header">
        <a href="/index.html" type="button" class="ic-back" data-bs-dismiss="offcanvas" aria-label="Close">
            <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">
        </a>
        <h2 class="title">
            Hasil Filter
        </h2>
        <div></div>
    </div>
</div>

<div class="cluster filter-results">
    <div class="container with-nav">
        <div class="fr-title">
            <h5>Greenland Tidar</h5>
            <div class="result">
                3 hasil pencarian
            </div>
        </div>
        <div class="mainroad">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="item">
                        <div class="item-image">
                            <img src="{{ asset('Home') }}/images/img-cluster1.png" alt="">
                        </div>
                        <div>
                            <h5 class="type">Type: 150</h5>
                            <div class="type-infos">
                                <div class="info">
                                    <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2</div>
                                    <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1</div>
                                </div>
                                <div>
                                    <h5>Rp. 975 Juta</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="item">
                        <div class="item-image">
                            <img src="{{ asset('Home') }}/images/img-cluster2.png" alt="">
                        </div>
                        <div>
                            <h5 class="type">Type: 145</h5>
                            <div class="type-infos">
                                <div class="info">
                                    <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2</div>
                                    <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1</div>
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
                        <div>
                            <h5 class="type">Type: 135</h5>
                            <div class="type-infos">
                                <div class="info">
                                    <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2</div>
                                    <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1</div>
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
                        <div>
                            <h5 class="type">Type: 80</h5>
                            <div class="type-infos">
                                <div class="info">
                                    <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2</div>
                                    <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1</div>
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
                        <div>
                            <h5 class="type">Type: 65</h5>
                            <div class="type-infos">
                                <div class="info">
                                    <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2</div>
                                    <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1</div>
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
                        <div>
                            <h5 class="type">Type: 55</h5>
                            <div class="type-infos">
                                <div class="info">
                                    <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png" alt=""> 2</div>
                                    <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png" alt=""> 1</div>
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
</div>

<script>
    AOS.init({
        offset: 150,
        once: true,
    });
</script>

@endsection

@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Simulasi Tipe')
@section('body','')


@section('content')
<div class="cluster">
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
            <div class="step active">3</div>
            <div class="step">4</div>
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
            <div class="step active">3</div>
            <div class="step">4</div>
            <div class="step">5</div>
            <div class="step">6</div>
            <div class="step">7</div>
            <div class="step last">8</div>
        </div>
        <div class="mainroad types">
            <h2 class="title">
                Pilih Type
            </h2>
            <div class="row">

                <div class="col-12 col-lg-4">

                    <a href="/simulation-modification">
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
                </a>
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

            <div class="btn-groups">
                <a href="/k-simulation-select-unit.html" type="button" class="btn btn-grey">Kembali</a>
                <a href="/k-simulation-modification.html" type="button" class="btn btn-primary">Lanjutkan</a>
            </div>
        </div>
    </div>
</div>

@endsection

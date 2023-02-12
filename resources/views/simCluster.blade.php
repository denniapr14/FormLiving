@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Simulasi Kluster')
@section('body','')


@section('content')
<div class="cluster">
    <div class="header-simulation mobile-only">
        <div class="ornament one">
            <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
        </div>
        <div class="nav-header">
            <a href="/k-cluster.html" class="ic-back">
                <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">
            </a>
            <h2 class="title">
                Miliki Unit
            </h2>
            <div></div>
        </div>
        <div class="steps">
            <div class="step active">1</div>
            <div class="step">2</div>
            <div class="step">3</div>

            <div class="step">4</div>
            <div class="step">5</div>
            <div class="step">6</div>
            <div class="step last">7</div>
        </div>

    </div>
    <div class="container">
        <div class="steps">
            <div class="step active">1</div>
            <div class="step">2</div>
            <div class="step">3</div>

            <div class="step">4</div>
            <div class="step">5</div>
            <div class="step">6</div>
            <div class="step last">7</div>
        </div>

        <div class="choose-cluster">
            <h2 class="title">
                Pilih Cluster
            </h2>
            <div class="row">
                <div class="col-6 col-lg-3">


                    <div class="item">
                        <div class="item-image">
                            <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                        </div>
                        <div class="item-avail">4 Available</div>
                        <h5 class="item-title">The Mainroad</h5>
                        <p class="item-sub">Cluster</p>
                    </div>


                </div>
                <div class="col-6 col-lg-3">

                    <div class="item">
                        <div class="item-image">
                            <img src="{{ asset('Home') }}/images/img-cluster2.png" alt="">
                        </div>
                        <div class="item-avail">4 Available</div>

                        <h5 class="item-title">The Icon</h5>
                        <p class="item-sub">Cluster</p>
                    </div>

                </div>
                <div class="col-6 col-lg-3">

                    <div class="item">
                        <div class="item-image">
                            <img src="{{ asset('Home') }}/images/img-cluster3.png" alt="">
                        </div>
                        <div class="item-avail">4 Available</div>
                        <h5 class="item-title">Green West</h5>
                        <p class="item-sub">Cluster</p>
                    </div>

                </div>
                <div class="col-6 col-lg-3">

                    <div class="item">
                        <div class="item-image">
                            <img src="{{ asset('Home') }}/images/img-cluster4.png" alt="">
                        </div>
                        <div class="item-avail">4 Available</div>
                        <h5 class="item-title">Green East</h5>
                        <p class="item-sub">Cluster</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="btn-groups">
            <a href="/cluster" type="button" class="btn btn-grey">Kembali</a>
            <a href="/simulation-select-unit" type="button" class="btn btn-primary">Lanjutkan</a>
        </div>
    </div>
</div>

@endsection

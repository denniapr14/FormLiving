@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.navbarProfile')
{{-- @extends('HomeLayout.footerbranch') --}}
@extends('HomeLayout.footer')
@section('tittle','Forms | Home')
@section('body','index')
@section('content')
<div class="cluster with-nav">
    <div class="header-simulation mobile-only">
        <div class="ornament one">
            <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
        </div>
        <div class="nav-header">
            <div class="ic-back">
                <a href="/">
                    <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">
                </a>
            </div>
            <h2 class="title">
                My Cart
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
            <div class="step">7</div>
            <div class="step last">8</div>
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
            <div class="step">7</div>
            <div class="step last">8</div>
        </div>
        <div>

            <div class="second-layout">
                <div class="row">
                    <div class="col-12 d-none d-lg-block">
                        <h2 class="title">
                            My Cart
                        </h2>
                    </div>
                    <!-- STATE ITEMS ON CART -->
                    <div class="col-12 col-lg-4">
                        <div class="mod-type">
                            <div class="type-image">
                                <img src="{{ asset('Home') }}/images/img-cluster.png" alt="">
                            </div>
                            <div class="items">
                                <div class="type-item">
                                    <p>Type</p>
                                    <h5>150</h5>
                                </div>
                                <div class="type-item">
                                    <p>Blok</p>
                                    <h5>A2</h5>
                                </div>
                                <div class="type-item">
                                    <p>Cluster</p>
                                    <h5>The Mainroad</h5>
                                </div>
                                <div class="type-item">
                                    <p>Start from</p>
                                    <h5>Rp. 975,000,000</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- STATE NO ITEMS ON CART -->
                    <div class="col-12 no-cart text-center d-none">
                        <div class="item-img mb-4">
                            <img src="{{ asset('Home') }}/images/img-illustration2.png" alt="">
                        </div>
                        <p class="mb-5">Keranjang belanja anda kosong!</p>
                        <button type="button" class="btn btn-primary">Belanja Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bottomsheet" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mod-items">
                    <div class="item selected">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('Home') }}/images/img-modification1.png" alt="">
                            </div>
                            <div class="col-5 col-lg-4 ">
                                <h6>Parket Kayu</h6>
                            </div>
                            <div class="col-5 col-lg-3 text-end text-lg-center">
                                <h6 class="fw-light">50 Jt</h6>
                            </div>
                            <div class="col-3 modal-btn">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modelId">Terpilih</button>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('Home') }}/images/img-modification6.png" alt="">
                            </div>
                            <div class="col-5 col-lg-4">
                                <h6>Parket Gipsum</h6>
                            </div>
                            <div class="col-5 col-lg-3 text-end text-lg-center">
                                <h6 class="fw-light">+20,000,000</h6>
                            </div>
                            <div class="col-3 modal-btn">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modelId">Pilih</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

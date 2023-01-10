@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Cluster')
@section('body','k-cluster')

@section('content')

<div class="cluster">
    <div class="container">
        <div class="map">
            <img src="{{ asset('Home') }}/images/img-map.png" alt="">

            <div class="control">
                <div class="zoom in">
                    <img src="{{ asset('Home') }}/images/ic-zoom-in.png" alt="">
                </div>
                <div class="zoom">
                    <img src="{{ asset('Home') }}/images/ic-zoom-out.png" alt="">
                </div>
            </div>
        </div>

        <div class="mainroad">
            <h2 class="title">
                The Mainroad Cluster
            </h2>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <a href="/detail-cluster.html" class="item">
                        <div class="item-image">
                            <img src="{{ asset('Home') }}/images/img-cluster1.png" alt="">
                        </div>
                        <div class="item-desc">
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
                        <div class="item-desc">
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
                        <div class="item-desc">
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
                        <div class="item-desc">
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
                        <div class="item-desc">
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
@endsection

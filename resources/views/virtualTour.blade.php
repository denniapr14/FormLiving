@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Cluster')
@section('body','k-cluster')

@section('content')

<div class="container-fluid px-0 pb-0">
    <div class="row">
        <div class="col-12 col-lg-6 virtual-image">
            <div class="bg">
                <img src="{{ asset('Home') }}/images/virtual-ellipse.png" class="w-100" alt="">
            </div>
            <img class="w-100" src="{{ asset('Home') }}/images/img-illustration1.png" alt="">
        </div>
        <div class="col-12 col-lg-6 virtual-content">
            <h2>3D Virtual Home Tour</h2>

            <div class="items">
                <div class="item row active">
                    <div class="col-5 ps-0">
                        <img src="{{ asset('Home') }}/images/virtual-1.png" alt="">
                    </div>
                    <div class="col-7 item-text">
                        <p>Blok</p>
                        <h4>AB2</h4>
                    </div>
                </div>
                <div class="item row">
                    <div class="col-5 ps-0">
                        <img src="{{ asset('Home') }}/images/virtual-2.png" alt="">
                    </div>
                    <div class="col-7 item-text">
                        <p>Blok</p>
                        <h4>AD40</h4>
                    </div>
                </div>
                <div class="item row">
                    <div class="col-5 ps-0">
                        <img src="{{ asset('Home') }}/images/virtual-3.png" alt="">
                    </div>
                    <div class="col-7 item-text">
                        <p>Blok</p>
                        <h4>P12</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

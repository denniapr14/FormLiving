@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@extends('flashdata')
@section('tittle','Forms | Congratulation')
@section('body','')

@section('content')

<div class="congratulation">
    <div class="header-detail mobile-only">
        <div class="sliders">
            <div class="item">
                <div class="item-img">
                    <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="logo">
            <img style="" src="{{ asset('Home') }}/images/logo-forms-living1.png" class="desktop-only"
                alt="Greenland at Tidar">
            <img src="{{ asset('Home') }}/images/logo-forms-living1.png" class="mobile-only" alt="Greenland at Tidar">
        </div>
        <div class="logo-check">
            <img src="{{ asset('Home') }}/images/ic-success.png" alt="">
        </div>
        <h1>{{ $data['title'] }}</h1>
        <p class="light-grey-color">
            {{$data['text']}}
        </p>
        <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</div>


@endsection
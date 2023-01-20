@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Splash Screen')
@section('body','index')

@section('content')

<div class="splash-screen">
    <div class="header-bg">
        <img src="{{ asset('Home') }}/images/img-splash-screen.png" class="w-100" alt="">
    </div>
    <div class="content">
        <div class="content-sliders">
            <div class="item">
                <h1>Representasi gaya hidup millenials dalam satu genggaman.</h1>
                <small>Menjadi bagian dari keluarga besar FORMS, hidup menjadi lebih efisien dan bermakna.</small>
            </div>
        </div>

        <button type="button" class="btn btn-primary w-100 mb-3">Login</button>
        <button type="button" class="btn btn-outline-primary w-100">Continue as Guest</button>
    </div>
</div>

@endsection

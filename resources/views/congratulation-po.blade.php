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
        <h1>Terkirim!</h1>
        <div class="logo">
            <img src="{{ asset('Home') }}/images/logo-tidar-green-large.png" class="desktop-only"
                alt="Greenland at Tidar">
            <img src="{{ asset('Home') }}/images/logo-tidar-gray.png" class="mobile-only" alt="Greenland at Tidar">
        </div>
        <div class="logo-check">
            <img src="{{ asset('Home') }}/images/ic-success.png" alt="">
        </div>

        <p class="light-grey-color">
            Invoice biaya tanda jadi sudah dikirim ke alamat email Anda, Silakan proses pembayaran dan konfirmasi
            melalui email atau whatsapp.
        </p>
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Invoice Pre Order
                </div>
            </div>
            <div class="card-body">
                <div class="items">
                    <div class="type-item">
                        <p>Blok</p>
                        <h5>{{ $rumah->blok }} - {{ $rumah->nomor }}</h5>
                    </div>
                    <div class="type-item">
                        <p>Cluster</p>
                        <h5>{{ $rumah->nama_cluster }}</h5>
                    </div>
                    <div class="type-item">
                        <p>Luas Tanah</p>
                        <h5>{{ $rumah->luas_tanah }} m<sup>2</sup></h5>
                    </div>
                </div>
            </div>
        </div>
        <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</div>


@endsection
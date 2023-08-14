@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle', 'Forms | Simulasi Ringkasan')
@section('body', '')
<style>
    ol>li::marker {
        font-weight: bold;
    }
</style>

@section('content')

<div class="cluster">
    <div class="header-simulation mobile-only">
        <div class="ornament one">
            <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
        </div>
        <div class="nav-header">
            <!--<div class="ic-back">-->
            <!--    <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">-->
            <!--</div>-->
            <h2 class="title">
                Miliki Unit
            </h2>
            <div></div>
        </div>
        <div class="steps">
            <div class="step done">1</div>
            <div class="step done">2</div>
            <div class="step active last">3</div>
        </div>
    </div>
    <div class="container">
        <div class="steps">
            <div class="step done">1</div>
            <div class="step done">2</div>
            <div class="step active last">3</div>
        </div>
        <div>

            @if (!empty(Session::get('user')))
            <form
                action="{{ route('dataPOSummary.action',[$rumah->id_rumah,$hargaPO,$pelanggan->id_pelanggan,$code]) }}"
                method="POST">
                <div class="second-layout">
                    <div class="row">
                        <div class="col-12 order-2 order-lg-1">
                            <h2 class="title">
                                Ringkasan Pre Order Rumah Calm
                            </h2>
                        </div>
                        <div class="col-12 col-lg-4 left-column order-1 order-lg-2">
                            <div class="mod-type">
                                <div class="type-image">
                                    <?php
                                            if(!empty($rumah->img_rumah)){
                                                ?>
                                    <img src="{{ asset('Home') }}/images/rumah/{{$rumah->img_rumah}}" alt="">
                                    <?php
                                            }else{
                                            ?>
                                    <img src="{{ asset('Home') }}/images/rumah/Lebar 8-2.jpg" alt="">
                                    <?php
                                            }
                                        ?>
                                </div>
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

                        <div class="col-12 col-lg-8 right-column order-3">
                            @csrf
                            <div class="row summary">
                                <div class="col-5 col-lg-4">
                                    <p>Nama (Sesuai KTP)</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $pelanggan->nama_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>NIK</p>

                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $pelanggan->no_ktp_plgn }}</p>
                                    <input type="text" name="ktp" hidden value=" {{ $pelanggan->no_ktp_plgn }}">
                                </div>

                                <div class="col-5 col-lg-4">
                                    <p>Email</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $pelanggan->email_plgn }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Cluster / Blok</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $rumah->nama_cluster }} / {{ $rumah->blok }} - {{ $rumah->nomor }}</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Luas Tanah</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>{{ $rumah->luas_tanah }} m2</p>
                                </div>
                                <div class="col-5 col-lg-4">
                                    <p>Harga Pre Order</p>
                                </div>
                                <div class="col-7 col-lg-8">
                                    <p>Rp. {{ rupiah($hargaPO) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-groups">
                    <a href="/Pre-Order-User/{{ $rumah->id_rumah }}/{{ $code }}" type="button" id="kembali"
                        class="btn btn-grey">Kembali</a>
                    <button type="submit" id="lanjutkan" class="btn btn-primary">Lanjutkan</button>
                </div>
            </form>
            @endif

        </div>
    </div>
</div>

<!-- Modal Modification Detail -->
<!-- Modal Disclaimer -->


@endsection
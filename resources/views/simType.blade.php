@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle', 'Forms | Simulasi Tipe')
@section('body', '')


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
                <div class="step active">3</div>
                <div class="step">4</div>
                <div class="step">5</div>
                <div class="step">6</div>
                <div class="step last">7</div>
                {{--  <div class="step">7</div>  --}}
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
                <div class="step last">7</div>
                {{--  <div class="step">7</div>  --}}
            </div>
            <div class="mainroad types">
                <h2 class="title">
                    Pilih Type
                </h2>
                <div class="row">

                    @foreach ($tipe as $tipe)
                        <div class="col-12 col-lg-4">

                            <a href="{{ route('simulationDetailTipe', [$rumah->id_rumah,$tipe->id_tipe_rumah]) }}">
                                <div class="item">
                                    <div class="item-image">
                                        <img src="{{ asset('Home') }}/images/tipe/{{ $tipe->img_rumah }}" alt="">
                                    </div>
                                    <div>
                                        <h5 class="type">Type: {{ $tipe->jenis_tr }}</h5>
                                        <div class="type-infos">
                                            <div class="info">
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bedroom.png"
                                                        alt=""> {{ $tipe->kmr_tidur_tr }}</div>
                                                <div class="info-item"><img src="{{ asset('Home') }}/images/ic_bathroom.png"
                                                        alt=""> {{ $tipe->kmr_mandi_tr }}</div>
                                            </div>
                                            <div>
                                                <h5>Rp. {{ $tipe->harga_text_tr }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="btn-groups">
                    <a href="{{ route('simulationCluster') }}" type="button"
                        class="btn btn-grey">Kembali</a>
                    {{--  <a href="/k-simulation-modification.html" type="button" class="btn btn-primary">Lanjutkan</a>  --}}
                </div>
            </div>
        </div>
    </div>

@endsection

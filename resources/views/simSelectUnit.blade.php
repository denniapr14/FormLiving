@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
{{--  @extends('HomeLayout.map')  --}}
@section('tittle', 'Forms | Simulasi Kluster')
@section('body', '')


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
                <div class="step active">2</div>
                <div class="step">3</div>
                <div class="step">4</div>
                <div class="step">5</div>
                <div class="step">6</div>
                <div class="step last">7</div>

            </div>

        </div>
        <div class="container">
            <div class="steps">
                <div class="step done">1</div>
                <div class="step active">2</div>
                <div class="step">3</div>
                <div class="step">4</div>
                <div class="step">5</div>
                <div class="step">6</div>
                <div class="step last">7</div>

            </div>
            <h2 class="title" style="">
                @if(!empty($cluster->logo_img))

                <img style="filter: invert(100%); width: 30%" src="{{ asset('Home') }}/images/logo_cluster/{{ $cluster->logo_img }}" alt="">
                @else
                {{ $cluster->nama_cluster }}
                @endif
            </h2>
            <div class="map" style="background-color: white">

                {{-- <img src="{{ asset('Home') }}/images/svg/map.svg" alt=""/> --}}
                {{-- @include('map.svg') --}}
                {!! file_get_contents(resource_path('views/map.svg')) !!}
                <script>
                    var data = {!! json_encode($rumah) !!};
                    $(document).ready(function(){
                        data.forEach(function(item) {
                        var block = item.blok;
                        var nomor = item.nomor;
                        var blockNomor = block+"-"+nomor;
                        blockNomor.toString()
                        var idrumah = document.getElementById(blockNomor);

                        idrumah.style.fill = 'green';
                        idrumah.setAttribute('fill',color(item.status));

                    });
                    });

                    function color(stat) {
                            var iro = 'warnaa';
                            switch (stat) {
                            case 'Available':
                                iro = '#28a744';
                                break;
                            case 'Keep':
                                iro = '#dc3546';
                                break;
                            case 'Sold':
                                iro = '#dc3546';
                                break;
                            case 'onProgress':
                                iro = '#dc3546';
                                break;
                            case 'Undeveloped':
                                iro = 'none';
                            case 'Hold':
                                iro = '#dc3546';
                                break;
                            }
                            return iro;
                        }
                </script>
                {{--  <div class="control">
                    <div class="zoom in">
                        <img src="{{ asset('Home') }}/images/ic-zoom-in.png" alt="">
                    </div>
                    <div class="zoom">
                        <img src="{{ asset('Home') }}/images/ic-zoom-out.png" alt="">
                    </div>
                </div>  --}}

                <div class="bg-black"></div>

                <div id="popup" class="popup" style="height: 65%">
                    <button class="popup-close">

                        <img src="{{ asset('Home') }}/images/ic-close.png" alt="">


                    </button>


                    <div class="popup-image">

                        <img src="{{ asset('Home') }}/images/img-cluster-large1.png" alt="">
                    </div>
                    <div class="popup-content">
                        <div class="popup-title">
                            The Mainroad
                        </div>
                        <div class="row">
                            <div class="col-6 text-left">
                                Nama Kavling
                            </div>
                            <div class="col-6 text-right">
                                A2
                            </div>
                            <div class="col-6 text-left">
                                Status
                            </div>
                            <div class="col-6 text-right">
                                Tersedia
                            </div>
                            <div class="col-6 text-left">
                                Tipe
                            </div>
                            <div class="col-6 text-right">
                                Mainroad/150
                            </div>
                            <div class="col-6 text-left">
                                LT
                            </div>
                            <div class="col-6 text-right">
                                72m2
                            </div>
                            <div class="col-6 text-left">
                                LB
                            </div>
                            <div class="col-6 text-right">
                                50m2
                            </div>
                            <div class="col-6 text-left">
                                Harga
                            </div>
                            <div class="col-6 text-right">
                                Rp. 975.000.000
                            </div>
                        </div>
                        <center>
                            <a href="/simulation-type" class="btn btn-outline-secondary">Pilih Unit</a>
                            {{--  <button type="button" class="btn btn-outline-secondary">Pilih Unit</button>  --}}
                        </center>
                    </div>
                </div>
            </div>

            <script>
                $('.map img').click(function(e) {
                    e.preventDefault();
                    $('.popup').toggleClass('active');
                    $('.bg-black').toggleClass('active');

                });

                $('.popup-close').click(function(e) {
                    e.preventDefault();
                    $('.popup').removeClass('active');
                    $('.bg-black').removeClass('active');
                });

                $('.btn-choose').click(function(e) {
                    e.preventDefault();
                    $('.popup').removeClass('active');
                    $('.bg-black').removeClass('active');
                });
            </script>
            <div class="choose-cluster">
                <div class="row">
                    @foreach ($rumah as $rumah )


                    <div class="col-6 col-lg-3">

                        <a href="/simulation-type/{{ $rumah->id_rumah }}">
                        <div class="item">
                            <div class="item-image">
                                <?php
                                if(!empty($rumah->img_rumah)){
                                    ?>
                                    <img src="{{ asset('Home') }}/images/rumah/{{$rumah->img_rumah}}" alt="">
                                    <?php
                                }else{
                                ?>

                               <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                                <?php
                                }
                                ?>

                            </div>
                            <h5 class="item-title">{{ $rumah->blok }} - {{ $rumah->nomor }}</h5>
                            <div class="item-avail">Luas Tanah : {{ $rumah->luas_tanah }} m<sup>2</sup></div>

                        </div>
                    </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="btn-groups">
            <a href="/simulation-cluster" type="button" class="btn btn-grey">Kembali</a>
            {{--  <a href="/simulation-type.html" type="button" class="btn btn-primary">Lanjutkan</a>  --}}
        </div>
        </div>
    </div>
@endsection

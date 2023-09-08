@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle', 'Forms | Simulasi Kluster')
@section('body', '')

@section('content')

    <style>
        .collapsible {
            border: 1px solid #ccc;
            margin-bottom: 10px;
            border-radius: 15px;

        }

        .collapsible-btn {
            background-color: #198754;
            border: none;
            padding: 10px;
            border-radius: 15px;
            cursor: pointer;
            width: 100%;
            text-align: left;
            color: white;
        }

        .collapsible-content {
            display: none;
            padding: 10px;
            border-radius: 15px;


        }
    </style>
    <div class="cluster">
        <div class="header-simulation mobile-only">
            <div class="ornament one">
                <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
            </div>
            <div class="nav-header">
                <a href="/Housing/Greenland" class="ic-back">
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
                <div class="step last"></div>
            </div>
        </div>


        <div class="container">

            <div class="steps">
                <div class="step active">1</div>
                <div class="step">2</div>
                <div class="step">3</div>

                <div class="step">4</div>
                <div class="step">5</div>
                <div class="step last">6</div>
            </div>



            <div class="choose-cluster">
                <h2 class="title">
                    Pilih Cluster
                </h2>

                <div>
                    <div class="content__row">
                        @if ($rumahAll != null && $rumahAll != '')
                            @php

                                $fileSVG = 'views/Greenland.svg';
                            @endphp
                            <div class="content__row mb-3">
                                <div class="card__box">
                                    <div class="card__header">


                                    </div>
                                    <div class="" style="width: 100%">

                                        <div class="map svg-container"
                                            style="background-color: white ;

                                        ">

                                            {{-- <img src="{{ asset('Home') }}/images/svg/map.svg" alt=""/> --}}
                                            {{-- @include('map.svg') --}}
                                            {!! file_get_contents(resource_path($fileSVG)) !!}
                                            <script>
                                                var svg = document.getElementById('Layer_1');


                                                function zoom(scale) {

                                                    svg.setAttribute('transform', 'scale(' + scale + ')');
                                                }

                                                var mouseX = 0;


                                                var data = {!! json_encode($rumahAll) !!};
                                                $(document).ready(function() {
                                                    data.forEach(function(item) {
                                                        var block = item.blok;
                                                        var nomor = item.nomor;
                                                        var blockNomor = block + "-" + nomor;
                                                        var idrumah = document.getElementById(blockNomor);

                                                        {{--  console.log("Block-Nomor:", blockNomor);
                                                        console.log("Status:", item.status);
                                                        console.log("Color:", color(item.status)); // Check color function output  --}}

                                                        if (idrumah) {
                                                            idrumah.style.fill = color(item.status);
                                                            idrumah.setAttribute('fill', color(item.status));
                                                        } else {
                                                            console.log("Element not found:", blockNomor);
                                                        }
                                                    });
                                                });


                                                function color(stat) {
                                                    var iro = 'warnaa';
                                                    switch (stat) {
                                                        case 'Available':
                                                            iro = '#44bb55';
                                                            break;
                                                        case 'Keep':
                                                            iro = '#ff7777';
                                                            break;
                                                        case 'Sold':
                                                            iro = '#ff7777';
                                                            break;
                                                        case 'onProgress':
                                                            iro = '#ff7777';
                                                            break;
                                                        case 'Undeveloped':
                                                            iro = 'gray';
                                                        case 'Hold':
                                                            iro = '#ff7777';
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


                                        </div>
                                        {{--  <button onclick="zoom(1.5)">Zoom in</button>
                                        <button onclick="zoom(0.5)">Zoom out</button>  --}}
                                    </div>

                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- <div class="row">
                @foreach ($cluster as $cluster)
                <div class="col-6 col-lg-3">
                    <a href="/simulation-select-unit/{{ $cluster->codecluster }}">
                    <div class="item">
                        <div class="item-image">
                            <?php
                            if(!empty($cluster->nama_img)){
                                ?>
                                <img  src="{{ asset('Home') }}/images/cluster/{{$cluster->nama_img}}" alt="">
                                <?php
                            }else{
                            ?>

                            <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                            <?php
                            }
                            ?>

                        </div>
                        <div class="item-avail">{{ $cluster->count }} Available</div>
                        <h5 class="item-title">{{ $cluster->nama_cluster }}</h5>
                        <p class="item-sub">Cluster</p>
                    </div>
                </a>
                </div>
                @endforeach
            </div> --}}
                @foreach ($cluster as $cluster)
                    <div class="collapsible">
                        <button class="collapsible-btn">
                            @if ($cluster->logo_img != null || $cluster->logo_img != '')
                                <img style="max-height: 60px; "
                                    src="{{ asset('Home') }}/images/logo_cluster/{{ $cluster->logo_img }}" alt="">
                            @else
                                <b>
                                    {{ $cluster->nama_cluster }}

                                </b>
                            @endif

                        </button>
                        <div class="collapsible-content">
                            <div id="collapse-card-cluster" class="card-body collapse-item">
                                <div class="row">
                                    @foreach ($rumah as $home)
                                        @if ($home->codecluster == $cluster->codecluster)
                                            <div class="col-6 col-lg-3">
                                                <a href="{{ route('simulationTipe', $home->id_rumah) }}">
                                                    <div class="item">
                                                        <div class="item-image">
                                                            @if ($home->nama_img != null)
                                                                <img src="{{ asset('Home') }}/images/rumah/{{ $home->img_rumah }}"
                                                                    alt="">
                                                            @else
                                                                <img src="{{ asset('Home') }}/images/60.jpg" alt="">
                                                            @endif
                                                        </div>
                                                        <div class="item-title">{{ $home->blok }} - {{ $home->nomor }}
                                                        </div>
                                                        <div class="avail">Luas Tanah :
                                                            {{ $home->luas_tanah }}m<sup>2</sup></div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            {{--  <div class="btn-groups">
            <a href="/cluster" type="button" class="btn btn-grey">Kembali</a>
            <a href="/simulation-select-unit" type="button" class="btn btn-primary">Lanjutkan</a>
        </div>  --}}
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".collapsible-btn");

            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    const content = this.nextElementSibling;
                    content.style.display = content.style.display === "block" ? "none" : "block";
                });
            });
        });
    </script>

@endsection

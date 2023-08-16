@extends('V_Admin.app')
@extends('V_Admin.sidebar')

@extends('flashdata')
@extends('V_Admin.footer')

@section('tittle', 'FORMS | Dashboard')

@section('content')

    <!-- start: main -->


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->
    <div class="content__wrapper">

        <div class="content__row">
            <div class="content__column">
                <div class="card__box greeting__box">
                    <div class="greeting__text">
                        <?php
                        $time = date('H:i');

                        if ($time >= '05:00' && $time < '11:00') {
                            echo 'Good morning 🌅';
                        } elseif ($time >= '11:00' && $time < '15:00') {
                            echo 'Good afternoon 🌤️';
                        } elseif ($time >= '15:00' && $time < '19:00') {
                            echo 'Good evening 🌄';
                        } else {
                            echo 'Good night 🌙';
                        }
                        ?>
                        , {{ $user->nama_ktgr }}
                    </div>
                    <div class="greeting__date">{{ date('l, j F Y') }}</div>
                    <div class="greeting__question">Would you like to see today s sales analysis?</div>

                    <?php


                    if ($time >= '04:00' && $time < '17:00') {
                        ?>

                    <img style="width: 25%" src="{{ url('Dashboard') }}/images/content/sun_illustration.png"
                        alt="sun_illustration">
                    <?php
                    } else {
                        ?>
                    <img style="width: 25%" src="{{ url('Dashboard') }}/images/content/night.png" alt="night">
                    <?php
                    }
                    ?>

                    <span class="btn btn-outline-primary float-right" id="clock"></span>
                </div>
            </div>
            <div class="content__column">
                <div class="card__box dashboard__box">
                    <div class="card__header">
                        <div class="card__title">
                            <i class="bi bi-lightning-charge"></i>
                            <span>Summary</span>
                        </div>

                    </div>
                    <div class="transaction__listing">
                        <div class="transaction__column">
                            <div class="transaction__icon transaction__icon--web-page">
                                <i class="bi bi-file-earmark-code"></i>
                            </div>
                            <div class="transaction__count">{{ $closingAll->count }}</div>
                            <div class="transaction__title">Semua Closing</div>
                        </div>
                        <div class="transaction__column">
                            <div class="transaction__icon transaction__icon--customer">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="transaction__count">{{ $closing->count }}</div>
                            <div class="transaction__title">Bulanan Closing</div>
                        </div>
                        @if (
                            $user->kategori == 'Sales' ||
                            $user->kategori == 'SalesAgent' ||
                            $user->kategori == 'Agent' ||
                            $user->kategori == 'AgentCompany' ||
                            $user->kategori == 'AdminAgentCompany'
                        )
                        @else
                        <div class="transaction__column">
                            <div class="transaction__icon transaction__icon--agents">
                                <i class="bi bi-person-workspace"></i>
                            </div>
                            <div class="transaction__count"> {{ $agentWithCompany->userCount }}</div>
                            <div class="transaction__title">Agen Dengan Company</div>
                        </div>
                        <div class="transaction__column">
                            <div class="transaction__icon transaction__icon--invoice">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </div>
                            <div class="transaction__count">{{ $agentWithoutCompany->userCount }}</div>
                            <div class="transaction__title">Agen</div>
                        </div>

                        @endif
                        <div class="transaction__column">
                            <div class="transaction__icon transaction__icon--order-forms">
                                <i class="bi bi-file-earmark-font"></i>
                            </div>
                            <div class="transaction__count">{{ $remainHouse->count }}</div>
                            <div class="transaction__title">Sisa Rumah</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content__row">
            @if ($rumah != null && $rumah != '')
                @php

                    $fileSVG = 'views/' . $getProjek->nama_projek . '.svg';
                @endphp
                <div class="content__row mb-3">
                    <div class="card__box">
                        <div class="card__header">
                            <div class="card__title">
                                <i class="bi bi-map"></i>
                                <span>Site Plan</span>

                            </div>

                        </div>
                        <div class="table-responsive">

                            <div class="map" style="background-color: white ;
                            @if(request()->segment(2) == "Kalm")
                            width:50%;
                            @endif
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


                                    var data = {!! json_encode($rumah) !!};
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
                                                iro = 'gray';
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


                            </div>
                            {{--  <button onclick="zoom(1.5)">Zoom in</button>
                            <button onclick="zoom(0.5)">Zoom out</button>  --}}
                        </div>

                    </div>
                </div>
            @endif
        </div>


    </div>

    <!-- end: content -->



    <script>
        function updateTime() {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            const timeString = `${hours}:${minutes}:${seconds}`;
            document.getElementById('clock').textContent = timeString;
        }
        setInterval(updateTime, 1000);
    </script>

    <script>
        $(document).ready(function() {
            $('#formulirPesanan').DataTable();
        });
    </script>

@endsection

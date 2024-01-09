@extends('V_Admin.app')


@extends('flashdata')


@section('tittle', 'FORMS | Dashboard')

@section('content')

    <style>
        .map {
            width: 100%;
            height: 100%;

        }

        .zoomIn {
            position: absolute;
            z-index: 2;
            top: 150px;
            right: 50px;
        }

        .zoomOut {
            position: absolute;
            z-index: 2;
            top: 180px;
            right: 50px;
        }
    </style>
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
                                $user->kategori == 'AgentCompany')
                        @elseif($user->kategori == 'AdminAgentCompany' || $user->kategori == 'AdminSales')
                            <div class="transaction__column">
                                <div class="transaction__icon transaction__icon--agents">
                                    <i class="bi bi-person-workspace"></i>
                                </div>
                                <div class="transaction__count"> {{ $agentWithCompany->userCount }}</div>
                                <div class="transaction__title">
                                    @if ($user->kategori == 'AdminSales')
                                        Sales
                                    @elseif($user->kategori == 'AdminAgentCompany')
                                        Agent
                                    @endif

                                </div>
                            </div>
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

                            <div class="map svg-container"
                                style="background-color: white ;width: 100%;
                            ">

                                {{-- <img src="{{ asset('Home') }}/images/svg/map.svg" alt=""/> --}}
                                {{-- @include('map.svg') --}}
                                {!! file_get_contents(resource_path($fileSVG)) !!}
                                <script>
                                    var svg = document.getElementById('Layer_1');



                                    var data = {!! json_encode($rumah) !!};
                                    $(document).ready(function() {
                                        data.forEach(function(item) {
                                            var block = item.blok;
                                            var nomor = item.nomor;

                                            var blockNomor = block + "-" + nomor;
                                            var idrumah = document.getElementById(blockNomor);

                                            if (idrumah) {
                                                idrumah.style.fill = color(item.status);
                                                idrumah.setAttribute('fill', color(item.status));

                                                idrumah.addEventListener('click', function() {
                                                    // Show the modal or perform other actions
                                                    showModal(idrumah, item); // Pass idrumah to the showModal function
                                                });
                                                idrumah.addEventListener('touchend', function() {
                                                    // Show the modal or perform other actions
                                                    event.preventDefault();
                                                    showModal(idrumah, item); // Pass idrumah to the showModal function
                                                });
                                            } else {
                                                console.log("Element not found:", blockNomor);
                                            }
                                        });

                                        // Close popover when the close button is clicked

                                    });


                                    function color(stat) {
                                        var iro = 'warnaa';
                                        switch (stat) {
                                            case 'Available':
                                                iro = '#44bb55';
                                                break;
                                            case 'Keep':
                                                iro = '#f5fcb6';
                                                break;
                                            case 'Sold':
                                                iro = '#ff7777';
                                                break;
                                            case 'onProgress':
                                                iro = '#f5fcb6';
                                                break;
                                            case 'Undeveloped':
                                                iro = 'gray';
                                            case 'Hold':
                                                iro = '#ff7777';
                                                break;
                                        }
                                        return iro;
                                    }

                                    function showModal(idrumah, item) {
                                        // Define a CSS class for the heading background color
                                        var headingBgClass = color(item.status);
                                        console.log(item);
                                        console.log(headingBgClass);

                                        // Define the HTML content for the popover
                                        var popoverContent = `

                                            <div>
                                                No. Rumah: ${item.blok}-${item.nomor}<br>
                                                Luas Tanah: ${item.luas_tanah} m<sup>2</sup><br>
                                                Status: <span id="bg-status" style="background-color:${headingBgClass};" class="btn btn btn-outline-light"> ${item.status} <span>
                                            </div>
                                        `;

                                        var headingPop =`Rumah <a href="#" class="close-popover float-right" data-dismiss="alert">&times;</a>`;

                                        // Create and display a dismissible popover
                                        $(idrumah).popover({

                                            title : headingPop,
                                            content: popoverContent,

                                            html: true,
                                            placement: 'top',

                                        });

                                        // Show the popover
                                        $(idrumah).popover('show');
                                        $("h3.popover-header").css("background-color", color(item.status));
                                        $("#bg-status").css("background-color", color(item.status));
                                        $("h3.popover-header").addClass("text-center");

                                        // Event delegation for the button inside the popover
                                        $(document).on('click', '.close-popover', function() {
                                            $(idrumah).popover('dispose');
                                        });

                                        $(document).on('click touchend', function (e) {
                                            // Check if the click event is outside of the popover and the element that triggers the popover
                                            if (!$(e.target).closest('.popover').length && !$(e.target).is(idrumah)) {
                                                // Close the popover
                                                $(idrumah).popover('dispose');
                                            }
                                        });
                                    }

                                    // Function to close the popover

                                </script>



                            </div>

                            <div class="float-right">
                                <button class="btn-fd-icon-outline zoomIn col-md-1" id="plus" onclick="zoom(1.5)"><i
                                        class="fa fa-plus" aria-hidden="true"></i></button>

                                <button class="btn-fd-icon-outline zoomOut col-md-1" id="minus" onclick="zoom(0.5)"><i
                                        class="fa fa-minus" aria-hidden="true"></i></button>


                            </div>




                            <script>
                                var svg = document.querySelector('.svg-container > svg');
                                var currentScale = 1;
                                var maxZoom = 2;
                                var isPanning = true;
                                var panStartX, panStartY, panTranslateX, panTranslateY;

                                function zoom(scale) {
                                    currentScale *= scale;

                                    // Limit the zoom to the defined maximum
                                    if (currentScale > maxZoom) {
                                        currentScale = maxZoom;
                                    }

                                    svg.style.transform = 'scale(' + currentScale + ')';
                                }




                                window.onload = function() {
                                    var panZoomInstance = svgPanZoom('#map', {
                                        zoomEnabled: false,
                                        controlIconsEnabled: false, // Disable default control icons
                                        fit: true,
                                        center: true,
                                        minZoom: 0.5,
                                        maxZoom: 10,
                                        refreshRate: 'auto',
                                        dblClickZoomEnabled: false,
                                    });
                                    var controlElement = document.querySelector('#svg-pan-zoom-reset-pan-zoom');
                                    $("div.popover").popover('dispose');
                                    // Hide the control element by setting its display property to 'none'
                                    controlElement.style.display = 'none';
                                    controlElement.hide();

                                    var customZoomInButton = document.getElementById('plus');
                                    var customZoomOutButton = document.getElementById('minus');

                                    // Add click event listeners for your custom buttons

                                };


                            </script>

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

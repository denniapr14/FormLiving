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

        .my-btn0 {
            height: 40px;
            padding: 3px 8px !important;
            font-size: 9px;
            width: 40px;
            border-radius: 6px;

        }

        .zoomOut {
            position: absolute;
            z-index: 2;
            top: 200px;
            right: 50px;
        }
    </style>
    <div class="pagetitle">
        <div class="row">
            <div class="col-md-3">

                <p> {{ date('l, j F Y') }} <span id="clock"></span></p>
            </div>


        </div>

        <h3>
            <?php
            $time = date('H:i');

            if ($time >= '05:00' && $time < '11:00') {
                echo 'Good morning';
            } elseif ($time >= '11:00' && $time < '15:00') {
                echo 'Good afternoon';
            } elseif ($time >= '15:00' && $time < '19:00') {
                echo 'Good evening';
            } else {
                echo 'Good night';
            }
            ?>
            , {{ $user->nama_ktgr }}
        </h3>

    </div><!-- End Page Title -->

    <section class="section dashboard">

        <div class="card col-md-12 col-lg-12">

            <div class="card-body">
                <h5 class="card-title">Summary</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card info-card sales-card">



                            <div class="card-body">
                                <h5 class="card-title">Closing Month <span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $closing->count }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-md-4">
                        <div class="card info-card sales-card">



                            <div class="card-body">
                                <h5 class="card-title">Closing Year <span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $closingAll->count }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <div class="col-md-4">
                        <div class="card info-card sales-card">


                            <div class="card-body">
                                <h5 class="card-title">the rest of the house <span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-houses"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $remainHouse->count }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->
                    <div class="col-md-6">
                        <div class="card info-card sales-card">



                            <div class="card-body">
                                <h5 class="card-title">Agent With Company <span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $agentWithCompany->userCount }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->
                    <div class="col-md-6">
                        <div class="card info-card sales-card">


                            <div class="card-body">
                                <h5 class="card-title">Agent Without Company</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $agentWithoutCompany->userCount }}</h6>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->
                    <!-- Reports -->
                </div>
            </div>


        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> <i class="bi bi-map"></i> Site Plan</h4>


                @if ($rumah != null && $rumah != '')
                    @php

                        $fileSVG = 'views/' . $getProjek->nama_projek . '.svg';
                    @endphp

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

                                    var headingPop = `Rumah <a href="#" class="close-popover float-right" data-dismiss="alert">&times;</a>`;

                                    // Create and display a dismissible popover
                                    $(idrumah).popover({

                                        title: headingPop,
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

                                    $(document).on('click touchend', function(e) {
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
                            <button class="my-btn0 zoomIn bg-info-light col-md-1" id="plus" onclick="zoom(1.5)">
                                <i class="bi bi-plus" aria-hidden="true"></i>
                            </button>

                            <button class="my-btn0 zoomOut bg-dark-light col-md-1" id="minus" onclick="zoom(0.5)">

                                <i class="bi bi-dash" aria-hidden="true"></i>
                            </button>


                        </div>




                        <script>
                            var svg = document.querySelector('.svg-container > svg');
                            var currentScale = 1;
                            var maxZoom = 6;
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
                @endif
            </div>

        </div>
        </div>

        <div>
            <h3>Projek</h3>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-3 col-sm-6 col-6">
                    <a href="#" class="btn btn-primary btn-lg btn-block">
                        <i class="bi bi-house"></i><br>
                        <span>Home</span>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6">
                    <a href="#" class="btn btn-primary btn-lg btn-block">
                        <i class="bi bi-info-circle"></i><br>
                        <span>About</span>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6">
                    <a href="#" class="btn btn-primary btn-lg btn-block">
                        <i class="bi bi-envelope"></i><br>
                        <span>Contact</span>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-6">
                    <a href="#" class="btn btn-primary btn-lg btn-block">
                        <i class="bi bi-gear"></i><br>
                        <span>Settings</span>
                    </a>
                </div>
            </div>
        </div>

        <div>
            <h3>User</h3>
        </div>
        <div class="text-center">


            <div class="row">

                <a class="btn-outline-info col-md-4 col-sm-12 " aria-current="page" href="#">
                    <div class="d-flex flex-column align-items-center justify-content-center">

                        <i class="bi bi-house"></i>
                        <span>Home</span>
                    </div>
                </a>

                <a class="btn-outline-info col-md-4 col-sm-12 d-flex flex-column align-items-center justify-content-center"
                    aria-current="page" href="#">
                    <div class="d-flex flex-column align-items-center justify-content-center">

                        <i class="bi bi-house"></i>
                        <span>Home</span>
                    </div>
                </a>

                <a class="btn-outline-info col-md-4 col-sm-12 d-flex flex-column align-items-center justify-content-center"
                    aria-current="page" href="#">
                    <div class="d-flex flex-column align-items-center justify-content-center">

                        <i class="bi bi-house"></i>
                        <span>Home</span>
                    </div>
                </a>

            </div>
        </div>


    </section>

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


@endsection

@extends('V_Admin.app')

@extends('flashdata')
@section('title','Form One | Dashboard')
@section('pageTitle','Dashboard')
@section('back',route('dashboard.admin',[$getProjek->nama_projek]) )
@section('breadcrumb','Dashboard')
{{-- @section('breadcrumb2','Ubah Rumah') --}}
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

    .summaryMobile {
        font-size: 12px;
    }

    @media(max-width:500px) {
        .pagetitle {
            display: none;
        }

        .summaryPC {
            display: none
        }

        .summaryMobile {
            display: inline;
        }
    }

    @media(min-width:501px) {
        .summaryPC {
            display: block;
        }

        .summaryMobile {
            display: none
        }
    }
</style>
<div class="col-md-6">
    <div class="pagetitle card">
        <div class="card-body">
            <div class="">
                <div class="row">
                    <div class="col-md-12">

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
                    , @if (!empty($user))
                    {{ $user->nama_ktgr }}
                    @endif

                </h3>

            </div><!-- End Page Title -->
        </div>

    </div>
</div>


<div class="summaryPC">
    <table style="width: 100%" class="table-borderless">
        <tr>

            <td class="" style="">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <p class="font-16 m-b-5">Closing

                                    Bulanan</p>
                            </div>
                            <div class="col-5">
                                <h1 class="font-light text-right mb-0">{{ $closing->count }}</h1>
                            </div>
                        </div>
                    </div>
                </div>


            </td>
            <td class="" style="width: 20%">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <i class="fas fa-database    "></i>
                                <p class="font-16 m-b-5">Semua
                                    Closing</p>
                            </div>
                            <div class="col-5">
                                <h1 class="font-light text-right mb-0"> {{ $closingAll->count }}</h1>
                            </div>
                        </div>
                    </div>
                </div>


            </td>
            <td class="" style="">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                                <p class="font-16 m-b-5">Sisa
                                    Rumah</p>
                            </div>
                            <div class="col-5">
                                <h1 class="font-light text-right mb-0"> {{ $remainHouse->count }}</h1>
                            </div>
                        </div>
                    </div>
                </div>


            </td>
            <td class="" style="">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <i class="fa fa-headphones" aria-hidden="true"></i>
                                <p class="font-16 m-b-5">Agen Company</p>
                            </div>
                            <div class="col-5">
                                <h1 class="font-light text-right mb-0">{{ $agentWithCompany->userCount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>



            </td>
            <td class="" style="">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <i class="fas fa-headphones   "></i>
                                <p class="font-16 m-b-5">Agen </p>
                            </div>
                            <div class="col-5">
                                <h1 class="font-light text-right mb-0"> {{ $agentWithoutCompany->userCount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
    </table>
</div>

<div class="summaryMobile">
    <div class="card">
        <div class="card-body">

            Closing Bulanan: {{ $closing->count }} | Semua Closing: {{ $closingAll->count }} | Sisa Rumah:
            {{ $remainHouse->count }} | Agen company: {{ $agentWithCompany->userCount }} |
            Agen:{{ $agentWithoutCompany->userCount }}




        </div>
    </div>

</div>
<section class="">




    <div class="card">
        <div class="card-body">
            <h4 class="card-title"> <i class="bi bi-map"></i> Site Plan</h4>


            @if ($rumah != null && $rumah != '')
            @php

            $fileSVG = 'views/' . $getProjek->nama_projek . '.svg';
            @endphp

            <div class="table-responsive">

                <div class="map svg-container" style="background-color: white ;width: 100%;
                                    ">


                    {{-- <img src="{{ asset('Home') }}/images/svg/map.svg" alt="" /> --}}
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
                                                        Status: <span id="bg-status" style="color:${headingBgClass};"  class="btn btn-outline-white"> ${item.status} <span>
                                                    </div>
                                                    <br>
                                                    <div class="float-right">
                                                        <a href="#" class="btn btn-outline-danger close-popover" data-dismiss="alert">Close</a>
                                                    </div>

                                                `;

                                    var headingPop = `<h4 style="color: black;">Rumah </h4>`;

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

                                    $("#bg-status").css("color", color(item.status));

                                    $("h3.popover-header").addClass("text-center");

                                    if(color(item.status) == "#f5fcb6"){
                                        $("h3.popover-header").css("color", "black");
                                    }else{
                                        $("h3.popover-header").css("color", "white");
                                    }
                                    if(color(item.status) == "#f5fcb6"){
                                        $("#bg-status").css("color", "#757a46");
                                    }

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
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>

                    <button class="my-btn0 zoomOut bg-dark-light col-md-1" id="minus" onclick="zoom(0.5)">

                        <i class="fa fa-minus" aria-hidden="true"></i>
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

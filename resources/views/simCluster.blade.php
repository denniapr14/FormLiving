@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle', 'Forms | Simulasi Kluster')
@section('body', '')

@section('content')
    <script src="{{ url('Dashboard') }}/js/jquery.min.js"></script>
    <script src="{{ url('Dashboard') }}/js/svg-pan-zoom.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
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

        .map {
            width: 100%;
            height: 600px;

        }



        .zoomIn {
            position: absolute;
            z-index: 2;
            top: 550px;
            right: 50px;
            height: 4rem;
            width: 4rem;
            border-radius: 1rem;
        }

        .zoomOut {
            position: absolute;
            z-index: 2;
            top: 620px;
            right: 50px;
            height: 4rem;
             width: 4rem;
             border-radius: 1rem;
        }
        @media(max-width: 576px){
            .map {
                width: 100%;
                height: 500px;

            }
            svg{
                width: 100%;
                height: 300px;
            }



            .zoomIn {
                position: absolute;
                z-index: 2;
                top: 8rem;
                right: 50px;
                height: 40px;
                width: 40px;
                border-radius: 0.5rem;
            }

            .zoomOut {
                position: absolute;
                z-index: 2;
                top: 12rem;
                right: 50px;
                height: 40px;
                width: 40px;
                border-radius: 0.5rem;
            }
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
                <h2 style="text-align:center;">
                    Pilih Cluster
                </h2>
                <br>
                <br>
                <div class="content__row">
                    @if ($rumah != null && $rumah != '')
                        @php

                            $fileSVG = 'views/Greenland.svg';
                        @endphp
                        <div class="content__row mb-3">
                            <div class="card__box">
                                <div class="card__header">
                                    <div class="card__title">
                                        <H4>
                                            <i class="bi bi-map"></i>
                                            Site Plan
                                        </H4>
                                    </div>

                                </div>
                               <div class="table-responsive">

                <div class="map svg-container" style="background-color: white ;width: 100%; margin-bottom:0 !important; overflow:hidden;">


                    {{-- <img src="{{ asset('Home') }}/images/svg/map.svg" alt="" /> --}}
                    {{-- @include('map.svg') --}}
                    {!! file_get_contents(resource_path($fileSVG)) !!}
                    <script>
                        var svg = document.getElementById('Layer_1');



                                var data = {!! json_encode($rumahAll) !!};
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


                                // Function to close the popover
                    </script>



                </div>
<script>
        // Select the SVG element
        var svg = document.querySelector('.svg-container > svg');

        // Initialize Hammer.js on the SVG element
        var hammer = new Hammer(svg);

        // Enable pinch and pan gestures
        hammer.get('pinch').set({ enable: true });
        hammer.get('pan').set({ direction: Hammer.DIRECTION_ALL });

        // Variables to store initial and current scale, translation, and last state
        var initScale = 1,
            currentScale = 1,
            initPan = { x: 0, y: 0 },
            currentPan = { x: 0, y: 0 };

        // Maximum zoom scale
        var maxZoom = 6;

        // Pinch zoom functionality
        hammer.on('pinchstart pinchmove pinchend', function (e) {
            if (e.type === 'pinchstart') {
                // Store initial scale
                initScale = currentScale || 1;
            }

            // Calculate the new scale (limiting it to maxZoom)
            currentScale = Math.max(1, Math.min(initScale * e.scale, maxZoom));

            // Apply the scale transformation to the SVG
            svg.style.transform = 'translate(' + currentPan.x + 'px, ' + currentPan.y + 'px) scale(' + currentScale + ')';
        });

        // Pan functionality
        hammer.on('panstart panmove panend', function (e) {
            if (e.type === 'panstart') {
                // Store initial translation
                initPan = { x: currentPan.x, y: currentPan.y };
            }

            // Update the translation
            currentPan.x = initPan.x + e.deltaX;
            currentPan.y = initPan.y + e.deltaY;

            // Apply the translation transformation to the SVG
            svg.style.transform = 'translate(' + currentPan.x + 'px, ' + currentPan.y + 'px) scale(' + currentScale + ')';
        });
    </script>







            </div>

                            </div>
                        </div>
                    @endif
                </div>

        <style>
        .mobile-only .legend-item{
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content:center;
        }
        .legend-item {
          margin-bottom: 10px;
          display: flex;
          align-items: center;
        }
          .legend-color {
          width: 4rem; /* Increase the width for bigger color boxes */
          height: 2rem ; /* Increase the height for bigger color boxes */
          margin-right: 20px;
          border: 1px solid #ccc;
          border-radius:5px;
          padding-left: 2rem;
          margin-left: 2rem;
          align-content:center;
        }
      </style>
<div class="card" style="border:none;">
    <div class="card-body" >
        <h4 class="card-title">Legenda Lokasi</h4>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <!--desktop only legend view-->
                    <div class="desktop-only">
                         <div class="d-flex flex-wrap justify-content-center">
                    <div class="legend-item mr-3 mb-3 pt-3">
                        <div class="legend-color" style="background-color: #44bb55;"></div>
                        <div>Unit Tersedia</div>
                    </div>
                    <div class="legend-item mr-3 mb-3 pt-3">
                        <div class="legend-color" style="background-color: #f5fcb6;"></div>
                        <div>Unit Closing</div>
                    </div>
                    <div class="legend-item mr-3 mb-3 pt-3">
                        <div class="legend-color" style="background-color: #ff7777;"></div>
                        <div>Unit Terjual</div>
                    </div>
                </div>
                    </div>

                   <!--Mobile only view legend-->

                <div class="mobile-only">
                    <div class="d-flex flex-wrap justify-content-start">
                    <table style="border:none; padding-left:0;">
                        <tr>
                            <td><div class="legend-item mr-1 mb-1 pt-1">
                        <div class="legend-color" style="background-color: #44bb55;"></div>
                        <div>Unit Tersedia</div>
                    </div>
                    </td>
                    <td> <div class="legend-item mr-1 mb-1 pt-1">
                        <div class="legend-color" style="background-color: #f5fcb6;"></div>
                        <div>Unit Closing</div>
                    </div>
                    </td>
                    <td>
                         <div class="legend-item mr-1 mb-1 pt-1">
                        <div class="legend-color" style="background-color: #ff7777;"></div>
                        <div>Unit Terjual</div>
                    </div>
                    </td>
                        </tr>
                    </table>
                </div>
                </div>

                </center>

            </div>
        </div>
    </div>
</div>

                <br>
                 <h2 style="text-align:center;">
                     Unit Kita
                </h2>
                <br>
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
                                                <a href="{{ Auth::check('guest') ? route('simulationTipe', $home->id_rumah) : '#' }}">
                                                    <div class="item">
                                                        <div class="item-image">
                                                            @if ($home->img_rumah != null)
                                                                <img src="{{ asset('Home') }}/images/rumah/{{ $home->img_rumah }}"
                                                                    alt="">
                                                            @else
                                                                <img src="{{ asset('Home') }}/images/60.jpg"
                                                                    alt="">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

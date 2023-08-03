@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Simulasi Kluster')
@section('body','')

@section('content')
<div class="cluster">
    <div class="header-simulation mobile-only">
        <div class="ornament one">
            <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
        </div>
        <div class="nav-header">
            <a href="/Greenland" class="ic-back">
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
            <div class="step">6</div>
             <div class="step last">7</div>
        </div>
    </div>
    
    <div class="container">
       
        <div class="steps">
            <div class="step active">1</div>
            <div class="step">2</div>
            <div class="step">3</div>

            <div class="step">4</div>
            <div class="step">5</div>
            <div class="step">6</div>
             <div class="step last">7</div>
        </div>

        <div class="choose-cluster">
            <h2 class="title">
                Pilih Cluster
            </h2>
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

            @foreach ( $cluster as $cluster )
            <div>
                <div id="card-cluster" class="card simulation-price desktop-only" style="margin-bottom: 20px">
                    <div class="card-header bg-success">
                        <a href="#collapse-card-cluster" data-toggle="collapse">
                            <img style="max-height: 60px; filter: invert(100%);" src="{{ asset('Home') }}/images/logo_cluster/{{$cluster->logo_img}}" alt="">
                        </a>              
                    </div>                   
                        <div id="collapse-card-cluster" class="card-body collapse-item">
                            <div class="row">
                            @foreach ($rumah as $home)
                                @if ($home->codecluster = $cluster->codecluster)                           
                                    <div class="col-6 col-lg-3">
                                        <a href="/simulation-type/{{ $home->id_rumah }}">
                                            <div class="item">
                                                <div class="item-image">
                                                    @if ($home->nama_img != NULL)
                                                    <img src="{{ asset('home')}}/images/rumah/{{ $home->nama_img}}" alt="">
                                                    @else
                                                    <img src="{{ asset('home')}}/images/60.jpg" alt="">
                                                    @endif
                                                </div>
                                                <div class="item-title">{{ $home->blok }} - {{ $home->nomor }}</div>
                                                <div class="avail">Luas Tanah : {{ $home->luas_tanah }}m<sup>2</sup></div>
                                            </div>
                                        </a>
                                    </div>                                       
                                    @endif
                                    @endforeach
                            </div>   
                        </div>
                    <div class="card-footer"></div>
                </div> 
            </div>

            <div class="mobile-only">
                <div id="card-cluster" class="card" style="margin-bottom: 20px" onload="randomizeCard()">
                    <div class="card-header bg-success mb-3">
                        <img style="max-height: 60px; filter: invert(100%);" src="{{ asset('Home') }}/images/logo_cluster/{{$cluster->logo_img}}" alt="">
                    </div>
                    <div class="card-body">
                        <h1>Hellow</h1>
                        {{-- @foreach ($rumah as $home)
                        @if ($home->codecluster = $cluster->codecluster)
                        <p>{{ $home->blok }} - {{ $home->nomor }}</p>
                        @endif
                        @endforeach --}}
    
                    </div>
                    <div class="card-footer"> end of text</div>
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

@endsection

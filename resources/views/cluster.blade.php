@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Kluster')
@section('body','k-cluster')

@section('content')

<div class="cluster">
    <div class="container">
        <div  style=" height:100%; background-image: url('{{ asset('Home') }}/images/cluster/{{$cluster->nama_img}}'); background-repeat: no-repeat; background-position: center; background-size: cover;">
         <center> <img style="width: 30%" src="{{ asset('Home') }}/images/logo_cluster/{{$cluster->logo_img}}" alt=""></center>

         <div style="height: 1000px"></div>
        </div>



        <div class="mainroad">
            <br><br>
            <h2 class="title">
               Kavling Tersedia
            </h2>
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
    </div>
</div>
@endsection

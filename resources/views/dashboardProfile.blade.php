@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@extends('script')
@extends('flashdata')
@section('tittle', 'Forms | Pengaturan Profil')
@section('body', '')

@section('content')

<style>
    .mypad {
        padding: 10px 10px 10px 10px;
        border-color: #8ACCA1;

    }

    .mycolor {
        color: #8ACCA1;
    }
    .mybg{
        background-color: #ebfaf0;
    }

    .carbon-example {
        padding: 8px;
        background-color: #fff;
        width: 295px;
        box-sizing: border-box;
        border-radius: 6px;
        -webkit-box-align: start;
        -ms-flex-align: start;
        -webkit-align-items: flex-start;
        -moz-align-items: flex-start;
        align-items: flex-start;
        position: relative;
        z-index: 5;
        box-shadow: 0 2px 20px 0 rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .carbon-example img {
        margin-right: 9px;
        max-width: 125px;
    }

    .carbon-example .inner-wrapper {
        text-align: left;
    }

    .carbon-example .inner-wrapper p {
        font-size: 12px;
        line-height: 1.33;
        margin: 8px 0;
    }

    .carbon-example .inner-wrapper p.fine-print {
        font-size: 8px;
        color: #C5CDD0;
        line-height: 1.25;
        text-transform: uppercase;
        font-weight: 500;
    }

    .flex-wrapper {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        -moz-align-items: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        -webkit-justify-content: space-between;
        -moz-justify-content: space-between;
        justify-content: space-between;
    }

    @media screen and (max-width: 991px) {
        .flex-wrapper.two-col {
            display: block;
            text-align: center;
        }
    }

    .flex-wrapper.two-col>* {
        width: 50%;
    }

    .flex-wrapper.two-col>*:first-of-type {
        padding-right: 130px;
    }

    @media screen and (max-width: 991px) {

        .flex-wrapper.two-col>* {
            width: 100%;
        }

        .flex-wrapper.two-col>*:first-of-type {
            padding-right: 0;
        }
    }

    .flex-wrapper.two-col.reversed>*:first-of-type {
        order: 2;
        padding-right: 0;
    }

    @media screen and (min-width: 992px) {
        .flex-wrapper.two-col.reversed>*:first-of-type {
            padding-left: 130px;
        }
    }

    .flex-wrapper.three-col {
        text-align: left;
        -webkit-box-align: start;
        -ms-flex-align: start;
        -webkit-align-items: flex-start;
        -moz-align-items: flex-start;
        align-items: flex-start;
        margin-top: 40px;
    }

    @media screen and (max-width: 767px) {
        .flex-wrapper.three-col {
            -webkit-flex-wrap: wrap;
            -moz-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
    }

    .flex-wrapper.three-col>* {
        width: 33.3%;
    }

    @media screen and (max-width: 767px) {
        .flex-wrapper.three-col>* {
            width: 100%;
        }
    }

    @media screen and (min-width: 768px) {
        .flex-wrapper.three-col li {
            padding-left: 20px;
            padding-right: 20px;
        }

        .flex-wrapper.three-col li:first-child {
            padding-left: 0;
        }

        .flex-wrapper.three-col li:last-child {
            padding-right: 0;
        }
    }

    .flex-wrapper.three-col .flex-wrapper {
        -webkit-box-align: start;
        -ms-flex-align: start;
        -webkit-align-items: flex-start;
        -moz-align-items: flex-start;
        align-items: flex-start;
        margin-top: 0;
    }

    @media screen and (max-width: 767px) {
        .flex-wrapper.three-col .flex-wrapper {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            -moz-justify-content: center;
            justify-content: center;
        }

        .flex-wrapper.three-col .flex-wrapper:not(:first-of-type) {
            margin-top: 40px;
        }
    }

    .flex-wrapper.three-col .flex-wrapper .icon {
        top: 0;
        transform: none;
    }
</style>

<div class="profile with-nav">
    <div class="header-simulation mobile-only">
        <div class="ornament one">
            <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
        </div>
        <div class="nav-header">
            <a href="{{ url()->previous() }}" class="ic-back">

                <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">
            </a>
            <h2 class="title">
                My Profile
            </h2>
            <div></div>
        </div>
    </div>
    <div class="container">
        <div class="second-layout">

            <div class="row">
                <div class="col-12 col-lg-12 ">
                    <div class="">


                            <div class="col-md-6"><h5 class="float-right">Dashboard</h5></div>

<br>
                        @if (!empty(Session::get('guest')))
                        <div class="choose-cluster">
                            <form action="{{ route('search.action') }}" method="get">
                                <div class="row col-md-12">
                                    <div class="col-md-4">

                                    <select name="month" class="form form-select" style="" id="">
                                        <option selected="selected">-- Pilih Bulan --</option>
                                        <?php
                                        $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                        $jlh_bln=count($bulan);
                                        ?>
                                        @for ($c=0; $c<$jlh_bln; $c+=1) <option value="{{ $c+1 }}"> {{ $bulan[$c] }}
                                            </option>
                                            @endfor


                                    </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="year" class="form form-select"  id="">
                                            <option value="{{ date("Y/m/d")}}">--Tahun--</option>
                                            <?php
                                            $now=date('Y');
                                            ?>
                                            @for ($a=2012;$a<=$now;$a++)
                                                <option value="{{ $a }}">{{ $a }}</option>

                                            @endfor


                                            </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="status" class="form form-select"  id="">
                                            <option value="">--Pilih Status--</option>
                                            <option value="validated">Selesai</option>
                                            <option value="unvalidated">Belum</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>


                                <div>


                                </div>
                            </form>
                            <br>
                            <div class="row">


                                @foreach ($fp as $fp)
                                @if(!empty($fp->id_formulir))
                                <div class="col-6 col-lg-3">

                                    <a href="/profile/formulir-pesanan/{{ $fp->id_formulir }}">
                                        <div class="item">
                                            <div class="item-image">
                                                <?php
                                                    if(!empty($fp->img_rumah)){
                                                        ?>
                                                <img src="{{ asset('Home') }}/images/rumah/{{ $fp->img_rumah }}" alt="">
                                                <?php
                                                    }else{
                                                    ?>

                                                <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                                                <?php
                                                    }
                                                    ?>

                                            </div>
                                            <h6 class="item-title">{{ $fp->blok }} - {{ $fp->nomor }}
                                            </h6>
                                            <div class="">

                                                <p> Nama User : {{ $fp->nama_plgn }}</p>
                                                <span>
                                                    <?= date('d M y', strtotime($fp->tgl_input_fp)) ?>
                                                </span>
                                                <br>
                                                @if ($fp->status_market_fp == 'accept')
                                                <p class="btn btn-success"><i class="bi bi-check"></i></p>
                                                @else
                                                <p class="btn btn-danger"><i class="bi bi-x"></i></p>
                                                @endif

                                            </div>


                                        </div>
                                    </a>
                                </div>
                                @else


                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Data tidak ada</h4>
                                    <p>Aww ,
                                        Anda tidak melakukan pembelian saat itu
                                    </p>

                                  </div>
                                @endif


                                @endforeach



                            </div>
                        </div>
                        @endif

                        @if (!empty(Session::get('user')))
                        <div class="card ">
                            <div class="card-body">
                                <h5 class="card-title mycolor">Rangkuman</h5>
                                <div class="row">
                                    <div class="col-md-4 mypad">
                                        <center class="border rounded mypad">
                                            <div class="">
                                                <i class="fa fa-calendar-minus-o fa-4x mycolor" aria-hidden="true"></i>

                                            </div>
                                            <div>
                                                <strong class="mycolor">
                                                    Bulan lalu

                                                </strong>
                                            </div>
                                            <div>
                                                <strong class="mycolor">
                                                    {{ $fpCountLast->count }}
                                                </strong>
                                            </div>

                                        </center>

                                    </div>
                                    <div class="col-md-4 mypad">
                                        <center class="border rounded mypad">
                                            <div class="">
                                                <i class="fa fa-calendar-o fa-4x mycolor" aria-hidden="true"></i>

                                            </div>
                                            <div>
                                                <strong class="mycolor">
                                                    Bulan ini

                                                </strong>
                                            </div>
                                            <div>
                                                <strong class="mycolor">
                                                    {{ $fpCount->count }}
                                                </strong>
                                            </div>

                                        </center>

                                    </div>
                                    <div class="col-md-4 mypad">
                                        <center class="border rounded mypad">
                                            <div class="">
                                                <i class="fa fa-calendar-check-o fa-4x mycolor" aria-hidden="true"></i>

                                            </div>
                                            <div>
                                                <strong class="mycolor">
                                                    Jumlah Closing <br>
                                                    Keseluruhan

                                                </strong>
                                            </div>
                                            <div>
                                                <strong class="mycolor">
                                                    {{ $fpCountAll->count }}
                                                </strong>
                                            </div>

                                        </center>

                                    </div>
                                </div>


                            </div>


                        </div>



                        <br>
                        <div class="choose-cluster">
                            <form action="{{ route('search.action') }}" method="get">
                                <div class="row col-md-12">
                                    <div class="col-md-4">

                                    <select name="month" class="form form-select" style="" id="">
                                        <option selected="selected">-- Pilih Bulan --</option>
                                        <?php
                                        $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                        $jlh_bln=count($bulan);
                                        ?>
                                        @for ($c=0; $c<$jlh_bln; $c+=1) <option value="{{ $c+1 }}"> {{ $bulan[$c] }}
                                            </option>
                                            @endfor


                                    </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="year" class="form form-select"  id="">
                                            <option value="{{ date("Y/m/d")}}">--Tahun--</option>
                                            <?php
                                            $now=date('Y');
                                            ?>
                                            @for ($a=2012;$a<=$now;$a++)
                                                <option value="{{ $a }}">{{ $a }}</option>

                                            @endfor


                                            </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="status" class="form form-select"  id="">
                                            <option value="">--Pilih Status--</option>
                                            <option value="validated">Selesai</option>
                                            <option value="unvalidated">Belum</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>


                                <div>


                                </div>
                            </form>
                            <br>
                            <div class="row">
                                @foreach ($fp as $fp)
                                <div class="col-6 col-lg-3">

                                    <a href="/profile/formulir-pesanan/{{ $fp->id_formulir }}">
                                        <div class="item">
                                            <div class="item-image">
                                                <?php
                                                    if(!empty($fp->img_rumah)){
                                                        ?>
                                                <img src="{{ asset('Home') }}/images/rumah/{{ $fp->img_rumah }}" alt="">
                                                <?php
                                                    }else{
                                                    ?>

                                                <img src="{{ asset('Home') }}/images/img-cluster-large3.png" alt="">
                                                <?php
                                                    }
                                                    ?>

                                            </div>
                                            <h6 class="item-title">{{ $fp->blok }} - {{ $fp->nomor }}
                                            </h6>
                                            <div class="">


                                                <p> Nama User : {{ $fp->nama_plgn }}</p>
                                                @if ($fp->status_market_fp == 'accept')
                                                <p class="btn btn-success"><i class="bi bi-check"></i></p>
                                                @else
                                                <p class="btn btn-danger"><i class="bi bi-x"></i></p>
                                                @endif
                                                <span>
                                                    <?= date('d-m-y', strtotime($fp->tgl_input_fp)) ?>
                                                </span>
                                            </div>


                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="navbar-mobile active">
    <a href="/" class="item">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M2.5 7.49999L10 1.66666L17.5 7.49999V16.6667C17.5 17.1087 17.3244 17.5326 17.0118 17.8452C16.6993 18.1577 16.2754 18.3333 15.8333 18.3333H4.16667C3.72464 18.3333 3.30072 18.1577 2.98816 17.8452C2.67559 17.5326 2.5 17.1087 2.5 16.6667V7.49999Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M7.5 18.3333V10H12.5V18.3333" stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <p>Home</p>
    </a>
    <a href="/search-item" class="item">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M17.5 17.5L13.875 13.875" stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <p>Cari</p>
    </a>
    <div class="item">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M17.5 12.5C17.5 12.942 17.3244 13.366 17.0118 13.6785C16.6993 13.9911 16.2754 14.1667 15.8333 14.1667H5.83333L2.5 17.5V4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H15.8333C16.2754 2.5 16.6993 2.67559 17.0118 2.98816C17.3244 3.30072 17.5 3.72464 17.5 4.16667V12.5Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <p>Chat</p>
    </div>
    <a href="/my-cart" class="item">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M7.50008 18.3333C7.96032 18.3333 8.33341 17.9602 8.33341 17.5C8.33341 17.0398 7.96032 16.6667 7.50008 16.6667C7.03984 16.6667 6.66675 17.0398 6.66675 17.5C6.66675 17.9602 7.03984 18.3333 7.50008 18.3333Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            <path
                d="M16.6666 18.3333C17.1268 18.3333 17.4999 17.9602 17.4999 17.5C17.4999 17.0398 17.1268 16.6667 16.6666 16.6667C16.2063 16.6667 15.8333 17.0398 15.8333 17.5C15.8333 17.9602 16.2063 18.3333 16.6666 18.3333Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            <path
                d="M0.833252 0.833344H4.16658L6.39992 11.9917C6.47612 12.3753 6.68484 12.72 6.98954 12.9653C7.29424 13.2105 7.6755 13.3408 8.06658 13.3333H16.1666C16.5577 13.3408 16.9389 13.2105 17.2436 12.9653C17.5483 12.72 17.757 12.3753 17.8333 11.9917L19.1666 5.00001H4.99992"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <p>Cart</p>
    </a>
    <a href="/profile-setting" class="item active">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M16.6666 17.5V15.8333C16.6666 14.9493 16.3154 14.1014 15.6903 13.4763C15.0652 12.8512 14.2173 12.5 13.3333 12.5H6.66658C5.78253 12.5 4.93468 12.8512 4.30956 13.4763C3.68444 14.1014 3.33325 14.9493 3.33325 15.8333V17.5"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            <path
                d="M10.0001 9.16667C11.841 9.16667 13.3334 7.67428 13.3334 5.83333C13.3334 3.99238 11.841 2.5 10.0001 2.5C8.15913 2.5 6.66675 3.99238 6.66675 5.83333C6.66675 7.67428 8.15913 9.16667 10.0001 9.16667Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <p>Profile</p>
    </a>
</div>


@endsection

@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle', 'Forms | Simulasi Pembayaran')
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
                <!--<div class="ic-back">-->
                <!--    <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">-->
                <!--</div>-->
                <h2 class="title">
                    Miliki Unit
                </h2>
                <div></div>
            </div>
            <div class="steps">
                <div class="step done">1</div>
                <div class="step done">2</div>
                <div class="step done">3</div>
                <div class="step done">4</div>
                <div class="step done">5</div>
                <div class="step active">6</div>
                <div class="step">7</div>
                <div class="step last">8</div>
            </div>

        </div>
        <div class="container">
            <div class="steps">
                <div class="step done">1</div>
                <div class="step done">2</div>
                <div class="step done">3</div>
                <div class="step done">4</div>
                <div class="step done">5</div>
                <div class="step active">6</div>
                <div class="step">7</div>
                <div class="step last">8</div>
            </div>

            <div class="container">




                <div>
                    {{--  FORM  --}}

                        <div class="second-layout">

                            <div class="row">
                                <div class="col-12 order-2 order-lg-1">
                                    <h2 class="title">
                                        Metode Pembayaran
                                    </h2>
                                </div>
                                <div class="col-12 col-lg-4 left-column order-1 order-lg-2">
                                    <div class="mod-type">
                                        <div class="type-image">
                                            <img src="{{ asset('Home') }}/images/tipe/{{ $tipeRumah->img_rumah }}"
                                                alt="">
                                        </div>
                                        <div class="items">

                                            <div class="type-item">
                                                <p>Blok</p>
                                                <h5>{{ $rumah->blok }} - {{ $rumah->nomor }}</h5>
                                            </div>
                                            <div class="type-item">
                                                <p>Cluster</p>
                                                <h5>{{ $rumah->nama_cluster }}</h5>
                                            </div>
                                            <div class="type-item">
                                                <p>Harga Jual</p>

                                                <h5>Rp {{ rupiah($tipeRumah->harga_tr) }}</h5>
                                            </div>
                                            <div class="type-item">
                                                <p>Luas Tanah</p>

                                                <h5>{{ $rumah->luas_tanah }} m<sup>2</sup></h5>
                                            </div>
                                            <div class="type-item">
                                                <p>Type</p>
                                                <h5>{{ $tipeRumah->jenis_tr }}</h5>
                                            </div>
                                            <div class="type-item">
                                                <p>Luas Bangunan</p>
                                                <h5>{{ $tipeRumah->luas_bangunan_tr }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-8 right-column order-3">
                                    <div class="collapsible">
                                        <button class="collapsible-btn">
                                            KPR
                                        </button>
                                        <div class="collapsible-content">
                                            <div id="collapse-card-cluster" class="card-body collapse-item">
                                                <div class="row">
                                                    <form action="{{ route('simulationPrice', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah]) }}"
                                                        method="get">
                                                        @csrf
                                                        <div class="card-shadow">
                                                            <label for="">Booking Fee Rp. 10.000.000</label>
                                                        </div>

                                                        <br>
                                                        <div class="card-shadow">
                                                            <label for="">Uang Muka</label>
                                                        </div>
                                                        <div class="">
                                                            <div class="form-group">

                                                                <input type="text" class="form form-control" value="10">
                                                                <small>Persentase Minimal 10%</small>
                                                            </div>
                                                        </div><br>
                                                        <div class="card-shadow">
                                                            <label for="">Harga Rumah</label>
                                                        </div>
                                                        <div class="">
                                                            <div class="form-group">

                                                                <input type="text" class="form form-control" readonly value="{{ $tipeRumah->harga_tr }}">

                                                            </div>
                                                        </div>
                                                        @if ($rumah->status_stock == 'Inden')
                                                        <div class="card-shadow">
                                                            <label for="">Cicilan Uang Muka</label>
                                                        </div>
                                                        <div class="">
                                                            <div class="form-group">
                                                                <select name="cicilanUMBeta" id="10" style="display:none;" class="form-control">
                                                                    <option value="" selected>--Pilih Cicilan 10%--</option>
                                                                    @for ($i = 1; $i < 7; $i++)
                                                                    <option value="{{ $i }}">Rp.
                                                                        {{ rupiah( ceil( ((($tipeRumah->harga_tr * (10 / 100)) - 10000000)/$i) / 100000  ) * 100000  ) }}
                                                                        Per Bulan Cicilan {{ $i }} Kali Uang Muka 10 %</option>
                                                                    @endfor
                                                                </select>

                                                                <select name="cicilanUMBeta" id="20" style="display:none;" class="form-control">
                                                                    <option value="" selected>--Pilih Cicilan 20%--</option>
                                                                    @for ($i = 1; $i < 7; $i++)
                                                                    <option value="{{ $i }}">Rp.
                                                                        {{ rupiah( ceil( ((($tipeRumah->harga_tr * (20 / 100)) - 10000000)/$i) / 100000  ) * 100000  ) }}
                                                                        Per Bulan Cicilan {{ $i }} Kali Uang Muka 20 %</option>
                                                                    @endfor
                                                                </select>

                                                                <select name="cicilanUMBeta" id="30" style="display:none;" class="form-control">
                                                                    <option value="" selected>--Pilih Cicilan 30%--</option>
                                                                    @for ($i = 1; $i < 7; $i++)
                                                                    <option value="{{ $i }}">Rp.
                                                                       {{ rupiah( ceil( ((($tipeRumah->harga_tr * (30 / 100)) - 10000000)/$i) / 100000  ) * 100000  ) }}
                                                                        Per Bulan Cicilan {{ $i }} Kali Uang Muka 30 %</option>
                                                                    @endfor
                                                                </select>

                                                                <select name="cicilanUMBeta" id="40" style="display:none;" class="form-control">
                                                                    <option value="" selected>--Pilih Cicilan 40%--</option>
                                                                    @for ($i = 1; $i < 7; $i++)
                                                                    <option value="{{ $i }}">Rp.
                                                                        {{ rupiah( ceil( ((($tipeRumah->harga_tr * (40 / 100)) - 10000000)/$i) / 100000  ) * 100000  ) }}
                                                                        Per Bulan Cicilan {{ $i }} Kali Uang Muka 40 %</option>
                                                                    @endfor
                                                                </select>
                                                                <select name="cicilanUMBeta" id="50" style="display:none;" class="form-control">
                                                                    <option value="" selected>--Pilih Cicilan 50%--</option>
                                                                    @for ($i = 1; $i < 7; $i++)
                                                                    <option value="{{ $i }}">Rp.
                                                                       {{ rupiah( ceil( ((($tipeRumah->harga_tr * (50 / 100)) - 10000000)/$i) / 100000  ) * 100000  ) }}
                                                                        Per Bulan Cicilan {{ $i }} Kali Uang Muka 50 %</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <div class="btn-groups">

                                                            <button type="submit" type="button" class="btn btn-primary">Lanjutkan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapsible">
                                        <button class="collapsible-btn">
                                            Cicilan
                                        </button>
                                        <div class="collapsible-content">
                                            <div id="collapse-card-cluster" class="card-body collapse-item">
                                                <div class="row">
                                                    <form action="{{ route('simulationPrice', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah]) }}"
                                                        method="get">
                                                        @csrf
                                                       <div ></div>
                                                        <div class="btn-groups">

                                                            <button type="submit" type="button" class="btn btn-primary">Lanjutkan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    <div class="btn-groups">
                        <a href="{{ route('simulationDetailTipe', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah]) }}"
                            type="button" class="btn btn-grey">Kembali</a>

                    </div>
                </div>
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

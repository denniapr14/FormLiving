@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle', 'Forms | Simulasi Pembayaran')
@section('body', '')


@section('content')

<div class="cluster">
    <div class="header-simulation mobile-only">
        <div class="ornament one">
            <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
        </div>
        <div class="nav-header">
            <div class="ic-back">
                <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">
            </div>
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
            <div class="step active">5</div>
            <div class="step">6</div>
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
            <div class="step active">5</div>
            <div class="step">6</div>
            <div class="step">7</div>
            <div class="step last">8</div>
        </div>
        <div>
            {{--  FORM  --}}
            <form action="{{ route('simulation-price',[$rumah->id_rumah, $tipeRumah->id_tipe_rumah,'']) }}" method="post">
                @csrf
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
                                    <img src="{{ asset('Home') }}/images/tipe/{{$tipeRumah->img_tr}}" alt="">
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
                            <div class="card-shadow">
                                <div class="form-check form-radio">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="payment" id="kpr" value="KPR"
                                            checked>
                                        KPR Bank
                                    </label>
                                </div>
                            </div>
                            <div class="card-shadow">
                                <div class="form-check form-radio">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="payment" id="kpr"
                                            value="Cicilan">
                                        Cicilan Developer
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-groups">
                    <a href="/simulation-detail-type/{{ $rumah->id_rumah }}" type="button" class="btn btn-grey">Kembali</a>
                    <button type="submit"  type="button" class="btn btn-primary">Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mod-items">
                    <div class="item selected">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('Home') }}/images/img-modification1.png" alt="">
                            </div>
                            <div class="col-4">
                                <h6>Parket Kayu</h6>
                            </div>
                            <div class="col-3">
                                <h6 class="fw-light">50 Jt</h6>
                            </div>
                            <div class="col-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modelId">Terpilih</button>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('Home') }}/images/img-modification6.png" alt="">
                            </div>
                            <div class="col-4">
                                <h6>Parket Gipsum</h6>
                            </div>
                            <div class="col-3">
                                <h6 class="fw-light">+20,000,000</h6>
                            </div>
                            <div class="col-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modelId">Pilih</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

<?php
function rupiah($angka)
{
    $hasil_rupiah = number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>

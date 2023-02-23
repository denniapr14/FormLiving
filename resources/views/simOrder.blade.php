@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@extends('flashdata')
@section('tittle', 'Forms | Simulasi Pemesanan')
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
                <div class="step done">5</div>
                <div class="step active">6</div>
                <div class="step last">7</div>
                {{-- <div class="step active">7</div> --}}
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
                <div class="step last">7</div>
                {{-- <div class="step active">7</div> --}}
            </div>
            <div>

                <div class="second-layout">
                    <div class="row">
                        <div class="col-12 order-2 order-lg-1">
                            <h2 class="title">
                                Form Pemesanan
                            </h2>
                        </div>

                        <div class="col-12 col-lg-4 left-column order-1 order-lg-2">
                            <div class="mod-type">
                                <div class="type-image">
                                    <img src="{{ asset('Home') }}/images/img-cluster.png" alt="">
                                </div>
                                <div class="items">
                                    <div class="type-item">
                                        <p>Type</p>
                                        <h5>{{ $tipeRumah->jenis_tr }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Blok</p>
                                        <h5>{{ $rumah->blok }} - {{ $rumah->nomor }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Cluster</p>
                                        <h5>The Mainroad</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Start from</p>

                                        <h5>Rp. {{ rupiah($tipeRumah->harga_tr) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (!empty(Session::get('guest')))
                            <div class="col-12 col-lg-8 right-column order-3">
                                <form
                                    action="{{ route('simulation-order.action', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah,$payment,$kkpr->id_kkpr]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="row form-order">
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Nama (Sesuai KTP)</label>
                                                <input type="text" class="form-control" name="nama" id="name"
                                                    placeholder="Nama (Sesuai KTP)" value="{{ $userPelanggan->nama_plgn }}">
                                                <span>*required</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="text" class="form-control" name="nik" id="nik"
                                                    placeholder="NIK" value="{{ $userPelanggan->no_ktp_plgn }}">
                                                <span>*required</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="telp" class="form-label">No. Telepon </label>
                                                <input type="text" class="form-control" name="telp" id=""
                                                    placeholder="No. Whataspp (Aktif)"
                                                    value="{{ $userPelanggan->no_telp_plgn }}">
                                                <span>*required</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="wa" class="form-label">No. Whataspp (Aktif)</label>
                                                <input type="text" class="form-control" name="wa" id="wa"
                                                    placeholder="No. Whataspp (Aktif)"
                                                    value="{{ $userPelanggan->no_wa_plgn }}">
                                                <span>*required</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" id="alamat"
                                                    placeholder="Alamat" value="{{ $userPelanggan->alamat_plgn }}">
                                                <span>*required</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    placeholder="Email" value="{{ $userPelanggan->email_plgn }}">
                                                <span>*required</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="npwp" class="form-label">No. NPWP</label>
                                                <input type="text" class="form-control" name="npwp" id="npwp"
                                                    placeholder="No. NPWP" value="{{ $userPelanggan->npwp_plgn }}">
                                                <span>*required</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="gender" id="gender">
                                                    {{--  <option disabled selected>Jenis Kelamin</option>  --}}
                                                    <option value="{{ $userPelanggan->jenis_kelamin_status }}">
                                                        {{ $userPelanggan->jenis_kelamin_status }}</option>
                                                    <option value="Laki - Laki">Laki Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                <span>*required</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="gender" class="form-label">Pakai Promo</label>

                                                <button type="button" id="openModal" class="btn btn-form"
                                                    data-bs-toggle="modal" data-bs-target="#modelId">
                                                    <div class="promo-text"><img
                                                            src="{{ asset('Home') }}/images/ic-promo.png" alt="">
                                                        Makin Untung
                                                        Pakai Promo</div>
                                                    <div><i class="bi-chevron-right"></i></div>
                                                </button>

                                                <div class="modal fade promo" id="modelId" tabindex="-1"
                                                    role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog  modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body promo-modal">
                                                                <h5 class="promo-title">
                                                                    Pakai Promo
                                                                </h5>

                                                                <div class="promo-input">
                                                                    <input type="text" class="form-control"
                                                                        name="promo" id="promo"
                                                                        placeholder="Masukkan kode promo">

                                                                    <div class="btn">Terapkan</div>
                                                                </div>
                                                                <!-- STATE PROMO -->
                                                                <div class=" d-block">

                                                                    <h5 class="mb-4">Pilih Promo</h5>
                                                                    @foreach ($promo as $promo)
                                                                        <div class="promo-item">
                                                                            <div class="row">
                                                                                <div class="promo-icon col-md-1">
                                                                                    <img src="{{ asset('Home') }}/images/ic-promo.png"
                                                                                        alt="Promo">
                                                                                </div>
                                                                                <div class="promo-text col-md-9">
                                                                                    <h6>{{ $promo->keterangan }}</h6>
                                                                                    <p>Berlaku hingga:
                                                                                        {{ date('d M Y', strtotime($promo->tgl_berakhir)) }}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="promo-button col-md-1">
                                                                                    <a class="promoCodeBtn btn btn btn-outline-success"
                                                                                        data-promo-code="{{ $promo->kode_promo }}">{{ $promo->kode_promo }}</a>
                                                                                    </li>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <!-- STATE NO PROMO -->
                                                                <div class="no-promo text-center d-none">
                                                                    <img src="{{ asset('Home') }}/images/img-illustration4.png"
                                                                        class="w-100" alt="">
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer promo-footer">
                                                                <div class="hemat">
                                                                    <p class="light-grey-color">Anda bisa hemat</p>
                                                                    <h5>Rp. 5.000.000</h5>
                                                                </div>
                                                                <div>
                                                                    {{--  <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Pakai
                                                        Promo</button>  --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <input type="text" name="promo" value="NULL" id="selectedPromoCode" class="form-control"
                                                        readonly>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-groups">
                                        <a href="/simulation-price-payment/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}/{{ $payment }}" type="button" class="btn btn-grey">Kembali</a>
                                        <button type="submit" value="submit" class="btn btn-primary">Lanjutkan</button>

                                    </div>
                                </form>
                            @elseif (session::get('user'))
                                <div class="col-12 col-lg-8 right-column order-3">
                                    <form action="{{ route('simulation-order.action', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah,$payment,$kkpr->id_kkpr,'']) }}" method="POST">
                                        @csrf
                                        <div class="row form-order">
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Nama (Sesuai KTP)</label>
                                                    <input type="text" class="form-control" name="nama"
                                                        id="name" value="{{ old('name') }}" placeholder="Nama (Sesuai KTP)">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="nik" class="form-label">NIK</label>
                                                    <input type="text" class="form-control" name="nik"
                                                        id="nik" value="{{ old('nik') }}" placeholder="NIK">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="telp" class="form-label">No. Telepon </label>
                                                    <input type="text" class="form-control" name="telp" id=""
                                                        placeholder="No. Telp"
                                                        value="{{ old('telp') }}">
                                                    <span>*required</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="wa" class="form-label">No. Whataspp (Aktif)</label>
                                                    <input type="text" class="form-control" name="wa"
                                                        id="wa" value="{{ old('wa') }}" placeholder="No. Whataspp (Aktif)">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" name="alamat"
                                                        id="alamat" value="{{ old('alamat') }}" placeholder="Alamat">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email"
                                                        id="email" value="{{ old('email') }}" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="npwp" class="form-label">No. NPWP</label>
                                                    <input type="text" class="form-control" name="npwp"
                                                        id="npwp" value="{{ old('npwp') }}" placeholder="No. NPWP">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select" name="gender" id="gender">
                                                        <option disabled selected>Jenis Kelamin</option>
                                                        <option>Laki Laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label for="gender" class="form-label">Pakai Promo</label>

                                                    <button type="button" id="openModal" class="btn btn-form"
                                                        data-bs-toggle="modal" data-bs-target="#modelId">
                                                        <div class="promo-text"><img
                                                                src="{{ asset('Home') }}/images/ic-promo.png"
                                                                alt="">
                                                            Makin Untung
                                                            Pakai Promo</div>
                                                        <div><i class="bi-chevron-right"></i></div>
                                                    </button>

                                                    <div class="modal fade promo" id="modelId" tabindex="-1"
                                                        role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog  modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body promo-modal">
                                                                    <h5 class="promo-title">
                                                                        Pakai Promo
                                                                    </h5>

                                                                    <div class="promo-input">
                                                                        <input type="text" class="form-control"
                                                                            name="promo" id="promo"
                                                                            placeholder="Masukkan kode promo">

                                                                        <div class="btn">Terapkan</div>
                                                                    </div>
                                                                    <!-- STATE PROMO -->
                                                                    <div class=" d-block">

                                                                        <h5 class="mb-4">Pilih Promo</h5>
                                                                        @foreach ($promo as $promo)
                                                                            <div class="promo-item">
                                                                                <div class="row">
                                                                                    <div class="promo-icon col-md-1">
                                                                                        <img src="{{ asset('Home') }}/images/ic-promo.png"
                                                                                            alt="Promo">
                                                                                    </div>
                                                                                    <div class="promo-text col-md-9">
                                                                                        <h6>{{ $promo->keterangan }}</h6>
                                                                                        <p>Berlaku hingga:
                                                                                            {{ date('d M Y', strtotime($promo->tgl_berakhir)) }}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="promo-button col-md-1">
                                                                                        <a class="promoCodeBtn btn btn btn-outline-success"
                                                                                            data-promo-code="{{ $promo->kode_promo }}">{{ $promo->kode_promo }}</a>
                                                                                        </li>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <!-- STATE NO PROMO -->
                                                                    <div class="no-promo text-center d-none">
                                                                        <img src="{{ asset('Home') }}/images/img-illustration4.png"
                                                                            class="w-100" alt="">
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer promo-footer">
                                                                    <div class="hemat">
                                                                        <p class="light-grey-color">Anda bisa hemat</p>
                                                                        <h5>Rp. 5.000.000</h5>
                                                                    </div>
                                                                    <div>
                                                                        {{--  <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Pakai
                                                        Promo</button>  --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <input type="text" name="promo" value="NULL" id="selectedPromoCode" class="form-control"
                                                            readonly>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="btn-groups">
                                                <a href="/simulation-price-payment/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}/{{ $payment }}" type="button"
                                                    class="btn btn-grey">Kembali</a>
                                                <button type="submit" value="submit"
                                                    class="btn btn-primary">Lanjutkan</button>

                                            </div>
                                    </form>
                                </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <script>
        const promoCodeBtns = document.querySelectorAll(".promoCodeBtn");
        const selectedPromoCodeInput = document.getElementById("selectedPromoCode");

        promoCodeBtns.forEach((promoCodeBtn) => {
            promoCodeBtn.addEventListener("click", () => {
                const promoCode = promoCodeBtn.dataset.promoCode;
                selectedPromoCodeInput.value = promoCode;
                console.log(promoCode);
                $('#modelId').modal('toggle');
                $('#modelId').modal('hide');

            });
        });
    </script>


    <!-- Modal -->


@endsection


<?php
function rupiah($angka)
{
    $hasil_rupiah = number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

function pembulatan($uang)
{
    $ratusan = substr($uang, -2);
    if ($ratusan < 500) {
        $akhir = $uang - $ratusan;
    } else {
        $akhir = $uang + (1000 - $ratusan);
    }
    echo number_format($akhir, 2, ',', '.');
}
?>

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

                    @if (!empty(Session::get('guest')))
                    <div class="col-12 col-lg-8 right-column order-3">
                        <form
                            action="{{ route('dataPelanggan.action', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah]) }}"
                            method="POST">
                            @csrf
                            <div class="row form-order">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama (Sesuai KTP)</label>
                                        <input type="text" class="input form-control" name="nama" id="name"
                                            value="{{ old('name') }}" placeholder="Nama (Sesuai KTP)">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="nik" class="form-label">NIK</label>
                                        <input type="text" class="input form-control" name="nik" id="nik"
                                            value="{{ old('nik') }}" placeholder="NIK">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="nik" class="form-label">Pekerjaan</label>
                                        <input type="text" class="input form-control" name="pekerjaan" id="pekerjaan"
                                            value="{{ old('pekerjaan') }}" placeholder="pekerjaan">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="nik" class="input form-label">Sumber Dana</label>
                                        <input type="text" class="form-control" name="sumberDana" id="sumberDana"
                                            value="{{ old('sumberDana') }}" placeholder="sumber dana">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="telp" class="form-label">No. Telepon </label>
                                        <input type="text" class="input form-control" name="telp" id="telp"
                                            placeholder="No. Telp" value="{{ old('telp') }}">

                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="wa" class="form-label">No. Whataspp (Aktif)</label>
                                        <input type="text" class="input form-control" name="wa" id="wa"
                                            value="{{ old('wa') }}" placeholder="No. Whataspp (Aktif)">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Provinsi</label>
                                        <input type="text" class="input form-control" name="pulau" id="provinsi"
                                            value="{{ old('alamat') }}" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Kota</label>
                                        <input type="text" class="input form-control" name="kota" id="kota"
                                            value="{{ old('alamat') }}" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Kecamatan</label>
                                        <input type="text" class="input form-control" name="kecamatan" id="kecamatan"
                                            value="{{ old('alamat') }}" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Kelurahan</label>
                                        <input type="text" class="input form-control" name="kelurahan" id="kelurahan"
                                            value="{{ old('alamat') }}" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Jalan</label>
                                        <input type="text" class="input form-control" name="jalan" id="jalan"
                                            value="{{ old('alamat') }}" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="input form-control" name="email" id="email"
                                            value="{{ old('email') }}" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="npwp" class="form-label">No. NPWP</label>
                                        <input type="text" class="input form-control" name="npwp" id="npwp"
                                            value="{{ old('npwp') }}" placeholder="No. NPWP">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select class="input form-select" name="gender" id="gender">
                                            <option disabled selected>Jenis Kelamin</option>
                                            <option>Laki Laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Status Pernikahan</label>
                                        <select class="input form-select" name="statusPernikahan" id="statusPernikahan">
                                            <option disabled selected>Pilih Status Penikahan</option>
                                            <option>Sudah Menikah</option>
                                            <option>Belum Menikah</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Pakai Promo</label>

                                        <button type="button" id="openModal" class="btn btn-form" data-bs-toggle="modal"
                                            data-bs-target="#modelId">
                                            <div class="promo-text"><img src="{{ asset('Home') }}/images/ic-promo.png"
                                                    alt="">
                                                <div id="textPromo">Pilih promo di sini</div>
                                            </div>
                                            <div><i class="bi-chevron-right"></i></div>
                                        </button>
                                        <br>
                                        <div id="myAlert"  role="alert">

                                        </div>
                                        <div class="modal fade promo" id="modelId" tabindex="-1" role="dialog"
                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog  modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body promo-modal">
                                                        <h5 class="promo-title">
                                                            Pakai Promo
                                                        </h5>

                                                        <div class="promo-input">
                                                            <input type="text" class="form-control" name="promo"
                                                                id="promo" placeholder="Masukkan kode promo">

                                                            <a id="cariPromo" class="btn">Terapkan</a>
                                                        </div>
                                                        <!-- STATE PROMO -->
                                                        <div class=" d-block ">

                                                            <h5 class="mb-4">Pilih Promo</h5>

                                                            @if (empty($promoRumah))
                                                            <h5>Promo Rumah</h5>
                                                            Tidak ada promo Rumah
                                                            @else
                                                            <h5>Promo Rumah</h5>
                                                            @foreach ($promoRumah as $promoRumah)
                                                            <div class="promo-item ">
                                                                <div class="row ">
                                                                    <div class="promo-icon col-md-1">
                                                                        <img src="{{ asset('Home') }}/images/ic-promo.png"
                                                                            alt="Promo">
                                                                    </div>
                                                                    <div class="promo-text col-md-8">

                                                                        <h6 id='keteranganPromo'>{{ $promoRumah->promo
                                                                            }}</h6>
                                                                        <p>Berlaku hingga:
                                                                            {{ date('d M Y',
                                                                            strtotime($promoRumah->tgl_berakhir)) }}
                                                                        </p>
                                                                        <div class="hemat">
                                                                            <p class="light-grey-color">Anda bisa hemat
                                                                            </p>
                                                                            <h5>Rp.
                                                                                {{rupiah($promoRumah->diskon_promo)}}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="promo-button col-md-2">

                                                                        <a class="promoCodeBtn btn btn-outline-success"
                                                                            data-promo-code="{{ $promoRumah->kode_promo }}"
                                                                            data-promo="{{ $promoRumah->promo }}">{{
                                                                            $promoRumah->kode_promo }} </a>


                                                                    </div>
                                                                </div>

                                                            </div>
                                                            @endforeach
                                                            @endif


                                                            @if (empty($promo))
                                                            <h5>Promo Cluster</h5>
                                                            Tidak ada promo cluster
                                                            @else
                                                            <h5>Promo Cluster</h5>
                                                            @foreach ($promo as $promo)
                                                            <div class="promo-item ">
                                                                <div class="row ">
                                                                    <div class="promo-icon col-md-1">
                                                                        <img src="{{ asset('Home') }}/images/ic-promo.png"
                                                                            alt="Promo">
                                                                    </div>
                                                                    <div class="promo-text col-md-8">

                                                                        <h6 id='keteranganPromo'>{{ $promo->promo }}
                                                                        </h6>
                                                                        <p>Berlaku hingga:
                                                                            {{ date('d M Y',
                                                                            strtotime($promo->tgl_berakhir)) }}
                                                                        </p>
                                                                        <div class="hemat">
                                                                            <p class="light-grey-color">Anda bisa hemat
                                                                            </p>
                                                                            <h5>Rp. {{rupiah($promo->diskon_promo)}}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="promo-button col-md-2">

                                                                        <a class="promoCodeBtn btn btn-outline-success"
                                                                            data-promo-code="{{ $promo->kode_promo }}"
                                                                            data-promo="{{ $promo->promo }}">{{
                                                                            $promo->kode_promo }} </a>


                                                                    </div>
                                                                </div>

                                                            </div>
                                                            @endforeach
                                                            @endif

                                                        </div>
                                                        <!-- STATE NO PROMO -->
                                                        <div class="no-promo text-center d-none">
                                                            <img src="{{ asset('Home') }}/images/img-illustration4.png"
                                                                class="w-100" alt="">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer promo-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="text" name="promo" value="Tidak Ada Promo"
                                                id="selectedPromoCode" class="form-control" readonly>

                                        </div>

                                    </div>
                                </div>
                                <div class="btn-groups">
                                    <a href="/simulation-detail-type/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}"
                                        type="button" class="btn btn-grey">Kembali</a>
                                    <button type="submit" value="submit" id="submit" disabled="true"
                                        class="btn btn-primary">Lanjutkan</button>

                                </div>
                        </form>
                    </div>
                    @elseif (session::get('user'))
                    <div class="col-12 col-lg-8 right-column order-3">
                        <form
                            action="{{ route('dataPelanggan.action', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah]) }}"
                            method="POST">
                            @csrf
                            <div class="row form-order">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama (Sesuai KTP)</label>
                                        <input type="text" class="input form-control" name="nama" id="name"
                                            value="{{ old('name') }}" placeholder="Nama (Sesuai KTP)">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="nik" class="form-label">NIK</label>
                                        <input type="text" class="input form-control" name="nik" id="nik"
                                            value="{{ old('nik') }}" placeholder="NIK">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="nik" class="form-label">Pekerjaan</label>
                                        <input type="text" class="input form-control" name="pekerjaan" id="pekerjaan"
                                            value="{{ old('pekerjaan') }}" placeholder="pekerjaan">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="nik" class="input form-label">Sumber Dana</label>
                                        <input type="text" class="form-control" name="sumberDana" id="sumberDana"
                                            value="{{ old('sumberDana') }}" placeholder="sumber dana">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="telp" class="form-label">No. Telepon </label>
                                        <input type="text" class="input form-control" name="telp" id="telp"
                                            placeholder="No. Telp" value="{{ old('telp') }}">

                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="wa" class="form-label">No. Whataspp (Aktif)</label>
                                        <input type="text" class="input form-control" name="wa" id="wa"
                                            value="{{ old('wa') }}" placeholder="No. Whataspp (Aktif)">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Provinsi</label>
                                        <input type="text" class="input form-control" name="pulau" id="provinsi"
                                            value="{{ old('alamat') }}" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Kota</label>
                                        <input type="text" class="input form-control" name="kota" id="kota"
                                            value="{{ old('alamat') }}" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Kecamatan</label>
                                        <input type="text" class="input form-control" name="kecamatan" id="kecamatan"
                                            value="{{ old('alamat') }}" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Kelurahan</label>
                                        <input type="text" class="input form-control" name="kelurahan" id="kelurahan"
                                            value="{{ old('alamat') }}" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Jalan</label>
                                        <input type="text" class="input form-control" name="jalan" id="jalan"
                                            value="{{ old('alamat') }}" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="input form-control" name="email" id="email"
                                            value="{{ old('email') }}" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="npwp" class="form-label">No. NPWP</label>
                                        <input type="text" class="input form-control" name="npwp" id="npwp"
                                            value="{{ old('npwp') }}" placeholder="No. NPWP">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select class="input form-select" name="gender" id="gender">
                                            <option disabled selected>Jenis Kelamin</option>
                                            <option>Laki Laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Status Pernikahan</label>
                                        <select class="input form-select" name="statusPernikahan" id="statusPernikahan">
                                            <option disabled selected>Pilih Status Penikahan</option>
                                            <option>Sudah Menikah</option>
                                            <option>Belum Menikah</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Pakai Promo</label>

                                        <button type="button" id="openModal" class="btn btn-form" data-bs-toggle="modal"
                                            data-bs-target="#modelId">
                                            <div class="promo-text"><img src="{{ asset('Home') }}/images/ic-promo.png"
                                                    alt="">
                                                <div id="textPromo">Pilih promo di sini</div>
                                            </div>
                                            <div><i class="bi-chevron-right"></i></div>
                                        </button>
                                        <br>
                                        <div id="myAlert"  role="alert">

                                        </div>
                                        <div class="modal fade promo" id="modelId" tabindex="-1" role="dialog"
                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog  modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body promo-modal">
                                                        <h5 class="promo-title">
                                                            Pakai Promo
                                                        </h5>

                                                        <div class="promo-input">
                                                            <input type="text" class="form-control" name="promo"
                                                                id="promo" placeholder="Masukkan kode promo">

                                                            <a id="cariPromo" class="btn">Terapkan</a>
                                                        </div>
                                                        <!-- STATE PROMO -->
                                                        <div class=" d-block ">

                                                            <h5 class="mb-4">Pilih Promo</h5>

                                                            @if (empty($promoRumah))
                                                            <h5>Promo Rumah</h5>
                                                            Tidak ada promo Rumah
                                                            @else
                                                            <h5>Promo Rumah</h5>
                                                            @foreach ($promoRumah as $promoRumah)
                                                            <div class="promo-item ">
                                                                <div class="row ">
                                                                    <div class="promo-icon col-md-1">
                                                                        <img src="{{ asset('Home') }}/images/ic-promo.png"
                                                                            alt="Promo">
                                                                    </div>
                                                                    <div class="promo-text col-md-8">

                                                                        <h6 id='keteranganPromo'>{{ $promoRumah->promo
                                                                            }}</h6>
                                                                        <p>Berlaku hingga:
                                                                            {{ date('d M Y',
                                                                            strtotime($promoRumah->tgl_berakhir)) }}
                                                                        </p>
                                                                        <div class="hemat">
                                                                            <p class="light-grey-color">Anda bisa hemat
                                                                            </p>
                                                                            <h5>Rp.
                                                                                {{rupiah($promoRumah->diskon_promo)}}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="promo-button col-md-2">

                                                                        <a class="promoCodeBtn btn btn-outline-success"
                                                                            data-promo-code="{{ $promoRumah->kode_promo }}"
                                                                            data-promo="{{ $promoRumah->promo }}">{{
                                                                            $promoRumah->kode_promo }} </a>


                                                                    </div>
                                                                </div>

                                                            </div>
                                                            @endforeach
                                                            @endif


                                                            @if (empty($promo))
                                                            <h5>Promo Cluster</h5>
                                                            Tidak ada promo cluster
                                                            @else
                                                            <h5>Promo Cluster</h5>
                                                            @foreach ($promo as $promo)
                                                            <div class="promo-item ">
                                                                <div class="row ">
                                                                    <div class="promo-icon col-md-1">
                                                                        <img src="{{ asset('Home') }}/images/ic-promo.png"
                                                                            alt="Promo">
                                                                    </div>
                                                                    <div class="promo-text col-md-8">

                                                                        <h6 id='keteranganPromo'>{{ $promo->promo }}
                                                                        </h6>
                                                                        <p>Berlaku hingga:
                                                                            {{ date('d M Y',
                                                                            strtotime($promo->tgl_berakhir)) }}
                                                                        </p>
                                                                        <div class="hemat">
                                                                            <p class="light-grey-color">Anda bisa hemat
                                                                            </p>
                                                                            <h5>Rp. {{rupiah($promo->diskon_promo)}}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="promo-button col-md-2">

                                                                        <a class="promoCodeBtn btn btn-outline-success"
                                                                            data-promo-code="{{ $promo->kode_promo }}"
                                                                            data-promo="{{ $promo->promo }}">{{
                                                                            $promo->kode_promo }} </a>


                                                                    </div>
                                                                </div>

                                                            </div>
                                                            @endforeach
                                                            @endif

                                                        </div>
                                                        <!-- STATE NO PROMO -->
                                                        <div class="no-promo text-center d-none">
                                                            <img src="{{ asset('Home') }}/images/img-illustration4.png"
                                                                class="w-100" alt="">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer promo-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="text" name="promo" value="Tidak Ada Promo"
                                                id="selectedPromoCode" class="form-control" readonly>

                                        </div>

                                    </div>
                                </div>
                                <div class="btn-groups">
                                    <a href="/simulation-detail-type/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}"
                                        type="button" class="btn btn-grey">Kembali</a>
                                    <button type="submit" value="submit" id="submit" disabled="true"
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
    const name              = document.getElementById('name');
        const nik               = document.getElementById('nik');
        const pekerjaan         = document.getElementById('pekerjaan');
        const sumberDana        = document.getElementById('sumberDana');
        const telp              = document.getElementById('telp');
        const wa                = document.getElementById('wa');
        const provinsi          = document.getElementById('provinsi');
        const kota              = document.getElementById('kota');
        const kecamatan         = document.getElementById('kecamatan');
        const kelurahan         = document.getElementById('kelurahan');
        const jalan             = document.getElementById('jalan');
        const email             = document.getElementById('email');
        const npwp              = document.getElementById('npwp');
        const gender            = document.getElementById('gender');
        const statusPernikahan  = document.getElementById('statusPernikahan');

        const submitBtn         = document.getElementById('submit');

        name.addEventListener('input',checkInputs);
        nik.addEventListener('input',checkInputs);
        pekerjaan.addEventListener('input',checkInputs);
        sumberDana.addEventListener('input',checkInputs);
        telp.addEventListener('input',checkInputs);
        wa.addEventListener('input',checkInputs);
        provinsi.addEventListener('input',checkInputs);
        kota.addEventListener('input',checkInputs);
        kecamatan.addEventListener('input',checkInputs);
        kelurahan.addEventListener('input',checkInputs);
        jalan.addEventListener('input',checkInputs);
        email.addEventListener('input',checkInputs);
        npwp.addEventListener('input',checkInputs);
        gender.addEventListener('input',checkInputs);
        statusPernikahan.addEventListener('input',checkInputs);

        function checkInputs(){
            if(
                name.value !== '' &&
                nik.value !== '' &&
                pekerjaan.value !== '' &&
                sumberDana.value !== '' &&
                telp.value !== '' &&
                wa.value !== '' &&
                provinsi.value !== '' &&
                kota.value !== '' &&
                kecamatan.value !== '' &&
                kelurahan.value !== '' &&
                jalan.value !== '' &&
                email.value !== '' &&
                npwp.value !== '' &&
                gender.value !== '' &&
                statusPernikahan.value !== ''
            )
            {
                console.log(jalan.value);
                submitBtn.disabled = false; // Enable the button
            }
            else{
                submitBtn.disabled = true; // disable the button
            }
        }



</script>

<script>
    const promoCodeBtns = document.querySelectorAll(".promoCodeBtn");
        const selectedPromoCodeInput = document.getElementById("selectedPromoCode");

        promoCodeBtns.forEach((promoCodeBtn) => {
            promoCodeBtn.addEventListener("click", () => {
                const promoCode = promoCodeBtn.dataset.promoCode;
                const promo = promoCodeBtn.dataset.promo;
                selectedPromoCodeInput.value = promoCode;
                console.log(promoCode);

                document.getElementById('textPromo').innerText = promo;

                $('#modelId').modal('toggle');
                $('#modelId').modal('hide');

            });
        });
</script>

<script>
    $('#cariPromo').click(function() {
            var kodePromo = document.getElementById('promo').value;
            var spaceAlert = document.getElementById('myAlert');
            $.ajax({
                url: '/simulation-data-pelanggan/cariKuponSpesial/{id_rumah}/{id_tipe}/{id_pelanggan}/'+kodePromo,
                type: 'GET',

                dataType: 'json',
                success: function(response) {

                var len = 1;
                var promo="";
                    if(response.length == 1){
                        document.getElementById('selectedPromoCode').value= kodePromo;
                       for (var i = 0; i < len; i++) {
                           promo = response[i].promo;
                            spaceAlert.innerHTML = '<div class="alert alert-success">'+promo+' berhasil digunakan</div>';
                                console.log(promo);

                       }
                        document.getElementById('textPromo').innerText = promo;

                        $('#modelId').modal('hide');
                    }
                    else{
                        spaceAlert.innerHTML = '<div class="alert alert-danger">Promo tidak ada</div>';
                        $('#modelId').modal('hide');
                    }
                    if (response!==null) {


                    }
                     else {

                        // Update the UI to show an error message
                    }
                    console.log(response);
                }
            });

            console.log('bisa ko');
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

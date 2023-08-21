@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@extends('flashdata')
@section('tittle', 'Forms | Data pelanggan')
@section('body', '')



@section('content')




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
            <div class="step active">2</div>
            <div class="step last">3</div>
        </div>
    </div>
    <div class="container">
        <div class="steps">
            <div class="step done">1</div>
            <div class="step active">2</div>
            <div class="step last">3</div>
        </div>
        <div>

            <div class="second-layout">
                <div class="row">
                    <div class="col-12 order-2 order-lg-1">
                        <h2 class="title">
                            Pengisian Data Pelanggan
                        </h2>
                    </div>
                    <div class="col-12 col-lg-4 left-column order-1 order-lg-2">

                        <div class="mod-type">
                            <div class="type-image">
                                @if (!empty($rumah->img_rumah))
                                <img src="{{ asset('Home') }}/images/rumah/{{$rumah->img_rumah}}" alt="">
                                @else
                                <img src="{{ asset('Home') }}/images/rumah/Lebar 8-1.jpg" alt="">
                                @endif

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
                                    <p>Luas Tanah</p>
                                    <h5>{{ $rumah->luas_tanah }} m<sup>2</sup></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (!empty(Session::get('guest')))
                    <div class="col-12 col-lg-8 right-column order-3">
                        <small style="color:red;">Diperlukan*</small><br>
                        <br>
                        <form
                            action="{{ route('dataPelanggan.action', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah]) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="code" value="{{ $dataFunctionUser }}">
                            <div class="row form-order">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama (Sesuai KTP)<small
                                                style="color:red;">*</small></label>
                                        <input type="text" class="input form-control" name="nama" id="name"
                                            value="{{ old('name') }}" placeholder="Nama (Sesuai KTP)">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="nik" class="form-label">NIK<small
                                                style="color:red;">*</small></label>
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
                                        <label for="telp" class="form-label">No. Telepon<small
                                                style="color:red;">*</small> </label>
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
                                        <label for="" class="form-label">Jalan</label>
                                        <input type="text" class="input form-control" name="jalan" id="jalan"
                                            value="{{ old('alamat') }}" placeholder="jalan">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Kelurahan</label>
                                        <input type="text" class="input form-control" name="kelurahan" id="kelurahan"
                                            value="{{ old('alamat') }}" placeholder="Kelurahan">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Kecamatan</label>
                                        <input type="text" class="input form-control" name="kecamatan" id="kecamatan"
                                            value="{{ old('alamat') }}" placeholder="Kecamatan">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Kota</label>
                                        <input type="text" class="input form-control" name="kota" id="kota"
                                            value="{{ old('alamat') }}" placeholder="kota">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Provinsi</label>
                                        <input type="text" class="input form-control" name="pulau" id="provinsi"
                                            value="{{ old('alamat') }}" placeholder="Provinsi">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email<small
                                                style="color:red;">*</small></label>
                                        <input type="text" class="input form-control" name="email" id="email"
                                            value="{{ old('email') }}"
                                            placeholder="Email untuk dikirim Surat Pemesanan Rumah">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="date" class="form-label">Tempat dan Tanggal Lahir <span>*</span></label>
                                    <input type="text" class="form-control" name="tempatLahir" id=""
                                        placeholder="Tempat Lahir"> <br>
                                    <input type="text" class="form-control" name="tanggalLahir"
                                        onfocus="(this.type='date')" onblur="(this.type='text')" id=""
                                        placeholder="Tanggal Lahir">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="npwp" class="form-label">Nomor NPWP<small
                                                style="color:red;">*</small></label>
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
                        <small style="color:red;">Diperlukan*</small><br>
                        <br>
                        <form action="{{ route('dataPO.action', [$rumah->id_rumah]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="code" value="{{ $dataFunctionUser }}">
                            <div class="row form-order">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama (Sesuai KTP)<small
                                                style="color:red;">*</small></label>
                                        <input type="text" class="input form-control" name="nama" id="name"
                                            value="{{ old('name') }}" placeholder="Nama (Sesuai KTP)">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="nik" class="form-label">NIK<small
                                                style="color:red;">*</small></label>
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
                                        <label for="telp" class="form-label">No. Telepon<small
                                                style="color:red;">*</small></label>
                                        <input type="text" class="input form-control" name="telp" id="telp"
                                            placeholder="No. Telp" value="{{ old('telp') }}">

                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="wa" class="form-label">No. Whataspp (Aktif<small
                                                style="color:red;">*</small></label>
                                        <input type="text" class="input form-control" name="wa" id="wa"
                                            value="{{ old('wa') }}" placeholder="No. Whataspp (Aktif)">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Jalan</label>
                                        <input type="text" class="input form-control" name="jalan" id="jalan"
                                            value="{{ old('alamat') }}" placeholder="jalan">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Kelurahan</label>
                                        <input type="text" class="input form-control" name="kelurahan" id="kelurahan"
                                            value="{{ old('alamat') }}" placeholder="Kelurahan">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Kecamatan</label>
                                        <input type="text" class="input form-control" name="kecamatan" id="kecamatan"
                                            value="{{ old('alamat') }}" placeholder="Kecamatan">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Kota</label>
                                        <input type="text" class="input form-control" name="kota" id="kota"
                                            value="{{ old('alamat') }}" placeholder="kota">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Provinsi</label>
                                        <input type="text" class="input form-control" name="pulau" id="provinsi"
                                            value="{{ old('alamat') }}" placeholder="Provinsi">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email<small
                                                style="color:red;"></small></label>
                                        <input type="text" class="input form-control" name="email" id="email"
                                            value="{{ old('email')}}"
                                            placeholder="Email untuk dikirim Surat Pemesanan Rumah">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="date" class="form-label">Tempat dan Tanggal Lahir <small
                                            style="color:red;">*</small></label>
                                    <input type="text" class="form-control" name="tempatLahir" id=""
                                        placeholder="Tempat Lahir"> <br>
                                    <input type="text" class="form-control" name="tanggalLahir"
                                        onfocus="(this.type='date')" onblur="(this.type='text')" id=""
                                        placeholder="Tanggal Lahir">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="npwp" class="form-label">Nomor NPWP <small
                                                style="color:red;">*</small></label>
                                        <input type="text" class="input form-control" name="npwp" id="npwp"
                                            value="{{ old('npwp') }}" placeholder="No. NPWP">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select class="input form-select" name="gender" id="gender">
                                            <option disabled selected>Jenis Kelamin</option>
                                            <option>Laki - Laki</option>
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
                                <div class="btn-groups">
                                    <a href="/PreOrderSelect" type="button" class="btn btn-grey">Kembali</a>
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


@endsection
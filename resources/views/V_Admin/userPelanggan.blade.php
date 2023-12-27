@extends('V_Admin.app')

@extends('flashdata')
@section('title','Form One | User Pelanggan')
@section('pageTitle','User Pelanggan')
@section('back',route('userPelanggan.admin') )
@section('breadcrumb','User Pelanggan')

@section('content')

    <!-- start: main -->


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->
    <div class="">
{{-- NEW --}}


        <div class="card mb-3">
            <div class="card-body">
                <div class="card-title">
                    <div class="card__title">
                        <i class="fa fa-users  myicon-color" aria-hidden="true"></i>
                        &nbsp;
                        <span> User Pelanggan</span>

                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table" id="userPelanggan">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor</th>
                                <th>Pengaturan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($getUserPelanggan as $userPelanggan)
                                <tr>
                                    <td scope="row">{{ $no }}</td>
                                    <td>{{ $userPelanggan->nama_plgn }}</td>
                                    <td>{{ $userPelanggan->email_plgn }}</td>

                                    <td>
                                        <p class="mb-1">

                                            No. telp {{ $userPelanggan->no_telp_plgn }} <a
                                                href="tel:{{ $userPelanggan->no_telp_plgn }}" class="btn btn-outline-info"><i class="fas fa-phone    "></i></a> <br>
                                        </p>
                                        <p>

                                            No. WA {{ $userPelanggan->no_wa_plgn }} <a
                                                href="https://wa.me/{{ $userPelanggan->no_wa_plgn }}"
                                                class="btn btn-outline-info"><i class="mdi mdi-whatsapp    "></i></a>
                                        </p>

                                    </td>
                                    <td>
                                        <div class="d-flex flex-nowrap">
                                            <button type="button" class="btn btn-outline-info"
                                                data-target="#seeUser{{ $no }}" data-toggle="modal"
                                                data-target=".bd-example-modal-lg{{ $no }}"> <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>

                                            <div class="modal modal-form fade" id="seeUser{{ $no }}"
                                                data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                aria-labelledby="order-informationLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail User Pelanggan
                                                                {{ $userPelanggan->username_plgn }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="product-listing">

                                                                <div class="modal-body">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Sales
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->nama_ua }}
                                                                        </div>
                                                                    </div>




                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Nama
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->nama_plgn }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Email
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->email_plgn }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Nomor Telepon
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->no_telp_plgn }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Nomor Whatsapp
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->no_wa_plgn }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Alamat
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->alamat_plgn }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Tanggal Lahir
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ tgl_indo(date('Y-m-d', strtotime($userPelanggan->tgl_lahir_plgn))) }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Tempat Lahir
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->tempat_lahir_plgn }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            NPWP
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->npwp_plgn }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Nomor KTP
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->no_ktp_plgn }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Pekerjaan
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->pekerjaan_plgn }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Jenis Kelamin
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->jenis_kelamin_status }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Status Penikahan
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->status_pernikahan_plgn }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Sumber Dana
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userPelanggan->sumber_dana_plgn }}
                                                                        </div>
                                                                    </div>





                                                                    <div class="row pt-4">
                                                                        <div class="col-12">
                                                                            <button class="btn-fd-primary w-100"
                                                                                type="submit"
                                                                                data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            {{--  EITS  --}}

                                            <button type="button" class="btn btn-outline-info"
                                                data-target="#editUser{{ $no }}" data-toggle="modal"
                                                data-target=".bd-example-modal-lg{{ $no }}"> <i class="fas fa-edit    "></i>
                                            </button>

                                            <div class="modal modal-form fade" id="editUser{{ $no }}"
                                                data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                aria-labelledby="order-informationLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit User Pelanggan
                                                                {{ $userPelanggan->username_plgn }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('updateUserPelangganAction.admin', Crypt::encrypt($userPelanggan->id_pelanggan)) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="product-listing">

                                                                    <div class="modal-body">



                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Nama
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <input type="text"
                                                                                    class="form form-control"
                                                                                    name="nama"
                                                                                    value="{{ $userPelanggan->nama_plgn }}"
                                                                                    placeholder="Name">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Email
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <input type="email"
                                                                                    class="form form-control"
                                                                                    name="email"
                                                                                    value="{{ $userPelanggan->email_plgn }}"
                                                                                    placeholder="Email">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Nomor Telepon
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <input type="tel"
                                                                                    class="form form-control"
                                                                                    name="telp"
                                                                                    value="{{ $userPelanggan->no_telp_plgn }}"
                                                                                    placeholder="Phone Number">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Nomor Telepon
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <input type="text"
                                                                                    class="form form-control"
                                                                                    name="wa"
                                                                                    value="{{ $userPelanggan->no_wa_plgn }}"
                                                                                    placeholder="WA Number">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Alamat
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">

                                                                                <textarea class="form form-control" name="alamat" rows="3"  placeholder="Address">
                                                                                    {{ $userPelanggan->alamat_plgn }}
                                                                                </textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Tanggal Lahir
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <input type="text"
                                                                                    class="form form-control"
                                                                                    name="tglLahir"
                                                                                    value="{{ $userPelanggan->tgl_lahir_plgn }}">
                                                                                <small>yyyy-mm-dd</small>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Tempat Lahir
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">

                                                                                <input type="text"
                                                                                    class="form form-control"
                                                                                    name="tempatLahir"
                                                                                    value="{{ $userPelanggan->tempat_lahir_plgn }}"
                                                                                    placeholder="Place of Birth">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                NPWP
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <input type="text"
                                                                                    class="form form-control"
                                                                                    name="npwp"
                                                                                    placeholder="masukan NPWP"
                                                                                    value=" {{ $userPelanggan->npwp_plgn }}">

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Nomor KTP
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <input type="text"
                                                                                    class="form form-control"
                                                                                    name="nik"
                                                                                    placeholder="masukan nomor KTP"
                                                                                    value=" {{ $userPelanggan->npwp_plgn }}">

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Pekerjaan
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <input type="text"
                                                                                    class="form form-control"
                                                                                    name="pekerjaan"
                                                                                    placeholder="masukan Pekerjaan"
                                                                                    value="{{ $userPelanggan->pekerjaan_plgn }}">

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Jenis Kelamin
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                @php
                                                                                    $jenisKelamin = ['Laki - Laki','Perempuan'];
                                                                                @endphp
                                                                                <select name="gender" id="" class="form-control">
                                                                                    @foreach ($jenisKelamin as $jenisKelamin)
                                                                                        @if ($jenisKelamin == $userPelanggan->jenis_kelamin_status)
                                                                                            <option value="{{ $jenisKelamin }}">{{ $jenisKelamin }}</option>
                                                                                        @else
                                                                                        <option value="{{ $jenisKelamin }}">{{ $jenisKelamin }}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Status Penikahan
                                                                            </label>
                                                                            @php
                                                                                $statusPernikahan = ['Sudah Menikah','Belum Menikah'];
                                                                            @endphp
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <select name="statusPernikahan" class="form-control" id="">
                                                                                @foreach ($statusPernikahan as $statusPernikahan)
                                                                                        @if ($statusPernikahan == $userPelanggan->jenis_kelamin_status)
                                                                                            <option value="{{ $statusPernikahan }}">{{ $statusPernikahan }}</option>
                                                                                        @else
                                                                                        <option value="{{ $statusPernikahan }}">{{ $statusPernikahan }}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Sumber Dana
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <input type="text" class="form-control" name="sumberDana" value="{{ $userPelanggan->sumber_dana_plgn }}">

                                                                            </div>
                                                                        </div>


                                                                        <div class="row pt-4">
                                                                            <div class="col-12 mb-1">
                                                                                <button type="submit"
                                                                                    class="btn-fd-primary w-100">Submit</button>
                                                                            </div>
                                                                            <div class="col-12 mb-1">
                                                                                <button
                                                                                    class="btn-fd-primary bg-danger w-100"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>




        <script>
            $(document).ready(function() {
                $('#userPelanggan').DataTable({
                    lengthMenu: [
                        [25, 50, 100, -1],
                        [25, 50, 100, 'All'],
                    ]
                });
            });
        </script>

    @endsection

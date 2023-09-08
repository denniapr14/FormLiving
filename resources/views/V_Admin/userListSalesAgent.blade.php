@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('flashdata')
@extends('V_Admin.footer')
@section('tittle', 'FORMS | Sales Agent')

@section('content')

    <div class="content__wrapper">
        <div class="content__row mb-3">
            <div class="card__box">
                <div class="card__header">
                    <div class="card__title">
                        <i class="bi bi-people-fill"></i>
                        <span>User
                            @if ($user->kategori == 'SuperAdmin')

                            @else

                            Sales/Agent
                            @endif
                           </span>
                        @if ($user->kategori != 'AdminSales' && $user->kategori != 'AdminAgentCompany')
                        <a style="position :absolute; right:10px;" href="{{ route('downloadUserAdminSales.admin') }}"
                            class="btn btn-success">
                            <i class="bi bi-download"></i> Download List User
                            @if ($user->kategori == 'SuperAdmin')

                                @else


                                Agent Atau Sales
                                @endif
                        </a>
                    @endif

                    </div>

                </div>
                <div class="table-responsive">
                    <table id="list-user" class="table">
                        <thead>
                            <tr>
                                <th style="width: 1rem">No</th>

                                <th>Nama</th>
                                @if ($user->kategori == 'SuperAdmin')

                                @else

                                <th>Kategori</th>
                                @endif
                                <th>Status</th>
                                <th>Tanggal Daftar</th>
                                @if ($user->kategori == 'AdminSales' ||
                                $user->kategori == 'AdminAgentCompany'||
                                $user->kategori == 'SuperAdmin'
                                )
                                    <th>Pengaturan</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($getUserSales as $userSales)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <span class="client__name">{{ $userSales->nama_ua }}</span>
                                        <span class="client__handled"> Kode : {{ $userSales->code_id_ua }}</span>
                                    </td>
                                    @if ($user->kategori == 'SuperAdmin')

                                    @else

                                    <td>
                                        {{ $userSales->kategori }}
                                    </td>
                                    @endif

                                    <td>
                                        @if ($userSales->status_ua == "Aktif")
                                        <div class="p-1 mb-1 bg-primary text-white text-center rounded">{{ $userSales->status_ua }}</div>
                                        @else
                                        <div class="p-1 mb-1 bg-secondary text-white text-center rounded">{{ $userSales->status_ua }}</div>
                                        @endif

                                    </td>
                                    <td>
                                        {{ tgl_indo(date('y-m-d', strtotime($userSales->tgl_input_ua))) }}
                                    </td>
                                    {{--  AGENT COMPANY AND ADMIN SALES  --}}
                                    @if ($user->kategori == 'AdminSales' ||
                                    $user->kategori == 'AdminAgentCompany'

                                    )
                                    <td>
                                        @php

                                        $status = ['Aktif','Nonaktif']

                                        @endphp
                                        @foreach ($status as $status)
                                        @if ($status != $userSales->status_ua)

                                        <a href="{{ route('changeStatusUser.admin', [$userSales->id_user_admin,$status]) }}" class="btn btn-outline-info"> {{ $status }}kan</a>
                                        @endif

                                        @endforeach
                                    </td>
                                @endif
                                @if ($user->kategori == 'SuperAdmin')

                                        <td>
                                            <div class="d-flex flex-nowrap">
                                                <button type="button" class="btn-fd-icon-outline"
                                                    data-target="#seeUser{{ $no }}" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg{{ $no }}"> <i class="fa fa-eye"
                                                        aria-hidden="true"></i>
                                                </button>

                                                <div class="modal modal-form fade" id="seeUser{{ $no }}"
                                                    data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                    aria-labelledby="order-informationLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Detail User
                                                                    {{ $userSales->username_ua }}
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
                                                                                Code User
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                {{ $userSales->code_id_ua }}
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Username
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                {{ $userSales->username_ua }}
                                                                            </div>
                                                                        </div>



                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Nama
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                {{ $userSales->nama_ua }}
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Email
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                {{ $userSales->email_ua }}
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Nomor Telepon
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                {{ $userSales->no_tlp_ua }}
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Alamat
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                {{ $userSales->alamat_ua }}
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Tanggal Lahir
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                {{ $userSales->tgl_lahir_ua }}
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Tempat Lahir
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                {{ $userSales->tempat_lahir_ua }}
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Status
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                {{ $userSales->status_ua }}
                                                                            </div>
                                                                        </div>



                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Foto
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <img src="{{ url('Home') }}/images/foto/{{ $userSales->foto_ua }}"
                                                                                    class="img-thumbnail">
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

                                                <button type="button" class="btn-fd-icon-outline"
                                                    data-target="#editUser{{ $no }}" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg{{ $no }}"> <i
                                                        class="fa fa-edit" aria-hidden="true"></i>
                                                </button>

                                                <div class="modal modal-form fade" id="editUser{{ $no }}"
                                                    data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                    aria-labelledby="order-informationLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah Detail User
                                                                    {{ $userSales->username_ua }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('updateUserProfileAction.admin', Crypt::encrypt($userSales->id_user_admin)) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="product-listing">

                                                                        <div class="modal-body">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                                    Code User
                                                                                </label>
                                                                                <div class="col-sm-8 align-self-center">
                                                                                    <input type="text"
                                                                                        class="form form-control"
                                                                                        name="code"
                                                                                        value="{{ $userSales->code_id_ua }}"
                                                                                        placeholder="Code User">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                                    Username
                                                                                </label>
                                                                                <div class="col-sm-8 align-self-center">
                                                                                    <input type="text"
                                                                                        class="form form-control"
                                                                                        name="username"
                                                                                        value="{{ $userSales->username_ua }}"
                                                                                        readonly placeholder="Username">
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                                    Nama
                                                                                </label>
                                                                                <div class="col-sm-8 align-self-center">
                                                                                    <input type="text"
                                                                                        class="form form-control"
                                                                                        name="nama"
                                                                                        value="{{ $userSales->nama_ua }}"
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
                                                                                        value="{{ $userSales->email_ua }}"
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
                                                                                        name="noTelp"
                                                                                        value="{{ $userSales->no_tlp_ua }}"
                                                                                        placeholder="Phone Number">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                                    Alamat
                                                                                </label>
                                                                                <div class="col-sm-8 align-self-center">
                                                                                    <textarea class="form form-control" name="alamat" placeholder="Address">{{ $userSales->alamat_ua }}</textarea>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                                    Tanggal Lahir
                                                                                </label>
                                                                                <div class="col-sm-8 align-self-center">
                                                                                    <input type="date"
                                                                                        class="form form-control"
                                                                                        name="tglLahir"
                                                                                        value="{{ $userSales->tgl_lahir_ua }}">
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
                                                                                        value="{{ $userSales->tempat_lahir_ua }}"
                                                                                        placeholder="Place of Birth">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                                    Status
                                                                                </label>
                                                                                <div class="col-sm-8 align-self-center">
                                                                                    <select name="statusUser"
                                                                                        class="form-control" id="inputStock">
                                                                                        @php
                                                                                            $statusUser = ['Aktif', 'Nonaktif'];
                                                                                        @endphp

                                                                                        @foreach ($statusUser as $statusUser)
                                                                                            @if ($statusUser == $userSales->status_ua)
                                                                                                <option
                                                                                                    value="{{ $statusUser }}"
                                                                                                    selected>
                                                                                                    {{ $statusUser }}
                                                                                                </option>
                                                                                            @else
                                                                                                <option
                                                                                                    value="{{ $statusUser }}">
                                                                                                    {{ $statusUser }}
                                                                                                </option>
                                                                                            @endif
                                                                                        @endforeach

                                                                                    </select>
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

                                                <button type="button" class="btn-fd-icon-outline"
                                                data-target="#delUser{{ $no }}" data-toggle="modal"
                                                data-target=".bd-example-modal-lg{{ $no }}"> <i
                                                  <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>

                                            <div class="modal modal-form fade" id="delUser{{ $no }}"
                                            data-backdrop="static" data-keyboard="false" tabindex="-1"
                                            aria-labelledby="order-informationLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Apa anda yakin menghapus user {{ $userSales->nama_ua }} ?
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row pt-4 col-12">
                                                            <div class="col-6 mb-1">
                                                                <a href="{{ route('deleteUserAdmin.admin',
                                                                Crypt::encrypt($userSales->id_user_admin)) }}" class="btn-fd-primary  w-100">Ya</a>
                                                            </div>
                                                            <div class="col-6 mb-1">
                                                                <button
                                                                    class="btn-fd-primary w-100"
                                                                    data-dismiss="modal">Tidak</button>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                            </div>
                                        </td>


                                @endif



                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <!-- end: content -->
        <script>
            $(document).ready(function() {
                $('#list-user').DataTable( {
                    lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, 'All'],
                ],}
                );
            });
            $(document).ready(function() {
                $('#rumah').DataTable();
            });
        </script>

    @endsection

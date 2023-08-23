@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('V_Admin.footer')
@extends('flashdata')
@section('tittle', 'FORMS | Dashboard')

@section('content')

    <!-- start: main -->


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->
    <div class="content__wrapper">


        <div class="content__row mb-3">
            <div class="card__box">
                <div class="card__header">
                    <div class="card__title">
                        <i class="fa fa-user-secret myicon-color" aria-hidden="true"></i>
                        &nbsp;
                        <span>User Prefilege </span>

                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table" id="userAdmin">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama</th>
                                <th>Kategori - Departemen</th>
                                <th>Status</th>
                                <th>Pengaturan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($getUserAdminAll as $userAdmin)
                                <tr>
                                    <td scope="row">{{ $no }}</td>
                                    <td>{{ $userAdmin->nama_ua }}</td>
                                    <td>{{ $userAdmin->kategori }} - {{ $userAdmin->departemen }}</td>
                                    <td>{{ $userAdmin->status_ua }}</td>
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
                                                                {{ $userAdmin->username_ua }}
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
                                                                            {{ $userAdmin->code_id_ua }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Username
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userAdmin->username_ua }}
                                                                        </div>
                                                                    </div>



                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Nama
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userAdmin->nama_ua }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Email
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userAdmin->email_ua }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Nomor Telepon
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userAdmin->no_tlp_ua }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Alamat
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userAdmin->alamat_ua }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Tanggal Lahir
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userAdmin->tgl_lahir_ua }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Tempat Lahir
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userAdmin->tempat_lahir_ua }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Status
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userAdmin->status_ua }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Kategori dan Departemen
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            {{ $userAdmin->kategori }} -
                                                                            {{ $userAdmin->departemen }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Foto
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            <img src="{{ url('Home') }}/images/foto/{{ $userAdmin->foto_ua }}"
                                                                                class="img-thumbnail">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-4 col-form-label align-self-center">
                                                                            Prefillege
                                                                        </label>
                                                                        <div class="col-sm-8 align-self-center">
                                                                            @foreach ($getUserMenuAll as $userMenu)
                                                                                @if ($userMenu->id_user_admin == $userAdmin->id_user_admin)
                                                                                    <p class="btn btn-success mb-1">
                                                                                        {{ $userMenu->menu }} - <i
                                                                                            class="{{ $userMenu->icon_menu }}"></i>
                                                                                    </p>
                                                                                @else
                                                                                @endif
                                                                            @endforeach
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
                                                            <h5 class="modal-title">Detail User
                                                                {{ $userAdmin->username_ua }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('updateUserMenuAction.admin', $userAdmin->id_user_admin) }}"
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
                                                                                    value="{{ $userAdmin->code_id_ua }}"
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
                                                                                    value="{{ $userAdmin->username_ua }}"
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
                                                                                    value="{{ $userAdmin->nama_ua }}"
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
                                                                                    value="{{ $userAdmin->email_ua }}"
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
                                                                                    value="{{ $userAdmin->no_tlp_ua }}"
                                                                                    placeholder="Phone Number">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Alamat
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <textarea class="form form-control" name="alamat" placeholder="Address">{{ $userAdmin->alamat_ua }}</textarea>
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
                                                                                    value="{{ $userAdmin->tgl_lahir_ua }}">
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
                                                                                    value="{{ $userAdmin->tempat_lahir_ua }}"
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
                                                                                        @if ($statusUser == $userAdmin->status_ua)
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
                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Kategori dan Departemen
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                <select name="kategori" id="">
                                                                                    <option
                                                                                        value="{{ $userAdmin->id_kategori }}">
                                                                                        {{ $userAdmin->kategori }}</option>
                                                                                    @foreach ($getKategoriAll as $kategoriAll)
                                                                                        <option
                                                                                            value="{{ $kategoriAll->id_kategori }}">
                                                                                            {{ $kategoriAll->kategori }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <br>
                                                                                {{ $userAdmin->departemen }}
                                                                            </div>
                                                                        </div>
                                                                        @if ($userAdmin->kategori == 'AgentWithCompany')
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                                    Kepala Agent
                                                                                </label>
                                                                                <div class="col-sm-8 align-self-center">

                                                                                    <select name="kepala_admin">
                                                                                        <option value="">Pilih Kepala
                                                                                            Agent</option>
                                                                                        @foreach ($getKepala as $kepala)
                                                                                            <option
                                                                                                value="{{ $kepala->id_user_admin }}">
                                                                                                {{ $kepala->nama_ua }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        @endif



                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Prefillege
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                @foreach ($getUserMenuAll as $userMenu)
                                                                                    @if ($userMenu->id_user_admin == $userAdmin->id_user_admin)
                                                                                        @if ($userMenu->status_um != 'aktif')
                                                                                            <a class="btn btn-danger mb-1 toggle-status"
                                                                                                data-id="{{ $userMenu->id_user_menu }}"
                                                                                                data-status="aktif"
                                                                                                href="">
                                                                                                {{ $userMenu->menu }} - <i
                                                                                                    class="{{ $userMenu->icon_menu }}"></i>
                                                                                            </a>
                                                                                        @else
                                                                                            <a class="btn btn-success mb-1 toggle-status"
                                                                                                data-id="{{ $userMenu->id_user_menu }}"
                                                                                                data-status="nonaktif"
                                                                                                href="">
                                                                                                {{ $userMenu->menu }} - <i
                                                                                                    class="{{ $userMenu->icon_menu }}"></i>
                                                                                            </a>
                                                                                        @endif
                                                                                    @endif
                                                                                @endforeach

                                                                                @foreach ($getMenu as $menu)
                                                                                    @php
                                                                                        $isChecked = false;
                                                                                        $hasMatch = false;
                                                                                    @endphp

                                                                                    @foreach ($getUserMenuAll as $userMenu)
                                                                                        @if ($userAdmin->id_menu == $menu->id_menu && $userAdmin->id_user_admin == $userMenu->id_user_admin)
                                                                                            @php
                                                                                                $isChecked = true;
                                                                                                $hasMatch = true;
                                                                                                break; // If the menu is found, no need to continue the inner loop
                                                                                            @endphp
                                                                                        @endif
                                                                                    @endforeach

                                                                                    @if ($hasMatch)
                                                                                    @elseif(!$hasMatch)
                                                                                        <br>
                                                                                        <input type="checkbox"
                                                                                            name="menu[]"
                                                                                            value="{{ $menu->id_menu }}"
                                                                                            {{ $isChecked ? 'checked' : '' }}>
                                                                                        <label
                                                                                            for="">{{ $menu->menu }}
                                                                                            <i
                                                                                                class="{{ $menu->icon_menu }}"></i></label>
                                                                                    @endif
                                                                                @endforeach

                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label align-self-center">
                                                                                Projek
                                                                            </label>
                                                                            <div class="col-sm-8 align-self-center">
                                                                                {{ $userAdmin->id_user_admin }}
                                                                                @foreach ($getProjekAll as $projekAll)
                                                                                @php
                                                                                    $isCheckedProjek = false;

                                                                                @endphp

                                                                                @foreach ($getUserProjekFromUser as $userProjekFromUser)
                                                                                    @if ($userAdmin->id_user_admin == $userProjekFromUser->id_user_admin && $projekAll->id_projek ==  $userProjekFromUser->id_projek)
                                                                                        @php
                                                                                            $isCheckedProjek = true;

                                                                                            break;
                                                                                        @endphp
                                                                                    @endif
                                                                                @endforeach


                                                                                <input type="checkbox" name="projek[]"
                                                                                id="{{ $projekAll->id_projek }}"
                                                                                @if ($isCheckedProjek) checked @endif>
                                                                            <label for="">{{ $projekAll->nama_projek }}</label>
                                                                            <br>

                                                                            @endforeach
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
                $('.toggle-status').click(function(event) {
                    event.preventDefault();
                    var button = $(this);
                    var id = button.data('id');
                    var status = button.data('status');

                    $.ajax({
                        type: 'get',
                        url: '{{ route('changeStatusUserMenu.admin', ['+id+', '+status+']) }}', // Replace with the actual route URL
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            status: status
                        },
                        success: function(data) {
                            if (data.success) {
                                // Update UI based on the new status
                                if (status === 'aktif') {
                                    button.removeClass('btn-danger').addClass('btn-success');
                                    button.data('status', 'nonaktif');
                                } else {
                                    button.removeClass('btn-success').addClass('btn-danger');
                                    button.data('status', 'aktif');
                                }
                            } else {
                                console.log('Error changing status.');
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle errors if needed
                            console.log(error);
                        }
                    });
                });
            });
        </script>


        <script>
            $(document).ready(function() {
                $('#userAdmin').DataTable();
            });
        </script>

    @endsection

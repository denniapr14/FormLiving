@extends('V_Admin.app')

@extends('flashdata')
@section('tittle', 'FORMS | Dashboard')

@section('content')

    <!-- start: main -->


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->
    <div class="">


        <div class="card mb-3">
            <div class="card-body">
                <div class="card-title">
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
                                            <button type="button" class="btn btn-outline-info"
                                                data-target="#seeUser{{ $no }}" data-toggle="modal"
                                                data-target=".bd-example-modal-lg{{ $no }}"> <i class="bi bi-eye"></i>
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
                                                data-target=".bd-example-modal-lg{{ $no }}"> <i class="bi bi-pencil-square"></i>
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

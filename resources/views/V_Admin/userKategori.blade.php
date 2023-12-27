@extends('V_Admin.app')

@extends('flashdata')
@section('title','Form One | User')
@section('pageTitle','User')
@section('back',route('userKategori.admin') )
@section('breadcrumb','User')
{{--  @section('breadcrumb2','Rincian Pekerjaan Termin')
@section('breadcrumb3','Rincian Pekerjaan')
@section('breadcrumb4','Tambah Rincian Pekerjaan')  --}}

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
                        <span>User Kategori </span>

                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table" id="userAdmin">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>

                                <th>Kategori</th>

                                <th>Pengaturan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($getKategoriAll as $getKategori)
                                <tr>
                                    <td>
                                        {{ $no }}
                                    </td>
                                    <td>
                                        @if ($getKategori->nama_ktgr == null)
                                            {{ $getKategori->kategori }}
                                        @else
                                            {{ $getKategori->nama_ktgr }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex flex-nowrap">
                                            <button type="button" class="btn btn-outline-info"
                                                data-target="#seeKategori{{ $no }}" data-toggle="modal"
                                                data-target=".bd-example-modal-lg{{ $no }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>

                                            <div class="modal modal-form fade" id="seeKategori{{ $no }}"
                                                data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                aria-labelledby="order-informationLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"> Kategori
                                                                @if ($getKategori->nama_ktgr == null)
                                                                    {{ $getKategori->kategori }}
                                                                @else
                                                                    {{ $getKategori->nama_ktgr }}
                                                                @endif

                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="product-listing">

                                                                <div class="modal-body">

                                                                    <div class="">
                                                                        <center>
                                                                            <h4 class="">
                                                                                Menu
                                                                            </h4>
                                                                        </center>
                                                                        <div class="row">


                                                                            @foreach ($getMenuKategori as $menuKategori)
                                                                                @if ($getKategori->id_kategori == $menuKategori->id_kategori)
                                                                                    @if ($menuKategori->status_um == 'aktif')
                                                                                        <div class="col-md-3 mb-1">
                                                                                            <p
                                                                                                class="badge text-bg-success badge--success mb-1 ">

                                                                                                <i
                                                                                                    class="{{ $menuKategori->icon_menu }}">
                                                                                                    {{ $menuKategori->menu }}
                                                                                                </i>
                                                                                            </p>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="col-md-3 mb-1">
                                                                                            <p
                                                                                                class="badge text-bg-success badge--danger mb-1 ">

                                                                                                <i
                                                                                                    class="{{ $menuKategori->icon_menu }}">
                                                                                                    {{ $menuKategori->menu }}
                                                                                                </i>
                                                                                            </p>
                                                                                        </div>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach

                                                                        </div>
                                                                    </div>


                                                                    <div class="row pt-4">

                                                                        <div class="col-12 mb-1">
                                                                            <button class="btn-fd-primary bg-danger w-100"
                                                                                data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <button type="button" class="btn btn-outline-info"
                                                data-target="#editUserKategori{{ $no }}" data-toggle="modal"
                                                data-target=".bd-example-modal-lg{{ $no }}">
                                                <i class="fas fa-edit    "></i>
                                            </button>

                                            <div class="modal modal-form fade" id="editUserKategori{{ $no }}"
                                                data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                aria-labelledby="order-informationLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Ubah Detail User

                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('updateUserKategoriAction.admin', $getKategori->id_kategori) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="product-listing">

                                                                    <div class="modal-body">
                                                                        <center>
                                                                            <h4 class="">
                                                                                Menu
                                                                            </h4>
                                                                        </center>
                                                                        <div class="row">

                                                                            @foreach ($getMenuKategori as $menuKategori)
                                                                                @if ($getKategori->id_kategori == $menuKategori->id_kategori)
                                                                                    <div class="col-md-3 mb-1">

                                                                                        <a href="{{ route('changeStatusUserKategori.admin', $menuKategori->id_user_menu) }}"
                                                                                            class="badge text-bg-success badge--{{ $menuKategori->status_um == 'aktif' ? 'success' : 'danger' }} mb-1 change-status-link"
                                                                                            data-id="{{ $menuKategori->id_user_menu }}"
                                                                                            data-status="{{ $menuKategori->status_um }}"
                                                                                            id="badge{{ $menuKategori->id_user_menu }}">
                                                                                            <i
                                                                                                class="{{ $menuKategori->icon_menu }}">
                                                                                                {{ $menuKategori->menu }}
                                                                                            </i>
                                                                                            @if ($menuKategori->status_um == 'aktif')
                                                                                                <i id="toggle{{ $menuKategori->id_user_menu }}"
                                                                                                    class="bi bi-toggle2-off"></i>
                                                                                            @else
                                                                                                <i id="toggle{{ $menuKategori->id_user_menu }}"
                                                                                                    class="bi bi-toggle2-on"></i>
                                                                                            @endif
                                                                                        </a>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach

                                                                        </div>

                                                                        <center>
                                                                            <h4 class="">

                                                                                @foreach ($getMenu as $menu)
                                                                                    @php
                                                                                        $matchFoundMenu = false;
                                                                                    @endphp

                                                                                    @foreach ($getMenuKategori as $menuKategori)
                                                                                        {{--  {{ $menu->id_menu }} -
                                                                                {{ $menuKategori->id_menu }}  --}}
                                                                                        <!-- Debugging -->
                                                                                        @if ($menu->id_menu == $menuKategori->id_menu && $getKategori->id_kategori == $menuKategori->id_kategori)
                                                                                            @php
                                                                                                $matchFoundMenu = true;
                                                                                                break;
                                                                                            @endphp
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endforeach
                                                                                @if (!$matchFoundMenu)
                                                                                    Tambah Menu
                                                                                @else
                                                                                    <p
                                                                                        class="badge text-bg-info badge--success mb-1">
                                                                                        Sudah di tambahkan semua menu
                                                                                    </p>
                                                                                @endif

                                                                            </h4>
                                                                        </center>
                                                                        <div class="row">

                                                                            @foreach ($getMenu as $menu)
                                                                                @php
                                                                                    $matchFound = false;
                                                                                @endphp

                                                                                @foreach ($getMenuKategori as $menuKategori)
                                                                                    {{--  {{ $menu->id_menu }} -
                                                                                    {{ $menuKategori->id_menu }}  --}}
                                                                                    <!-- Debugging -->
                                                                                    @if ($menu->id_menu == $menuKategori->id_menu && $getKategori->id_kategori == $menuKategori->id_kategori)
                                                                                        @php
                                                                                            $matchFound = true;
                                                                                            break;
                                                                                        @endphp
                                                                                    @endif
                                                                                @endforeach

                                                                                @if (!$matchFound)
                                                                                    <div class="col-md-3 mb-1">
                                                                                        <p
                                                                                            class="badge text-bg-success badge--success mb-1">
                                                                                            <i
                                                                                                class="{{ $menu->icon_menu }}">
                                                                                                {{ $menu->menu }}
                                                                                            </i>
                                                                                            <input type="checkbox"
                                                                                                name="menu[]"
                                                                                                value="{{ $menu->id_menu }}">
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach

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
                $('.change-status-link').on('click', function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    var status = $(this).data('status');


                    $.ajax({
                        type: 'GET',
                        url: '{{ route('changeStatusUserKategori.admin', ['id' => ':id']) }}'
                            .replace(':id', id),

                        success: function(data) {
                            // Handle success, update UI or show a success message
                            {{--  console.log(data);  --}}
                            var badge = document.getElementById('badge' + id);
                            if (data.status_um == 'aktif') {
                                badge.className = "badge text-bg-success badge--success mb-1";
                            } else {
                                badge.className = "badge text-bg-danger badge--danger mb-1";
                            }

                            // Update the toggle class
                            var toggle = document.getElementById('toggle' + id);
                            if (data.status_um == 'aktif') {
                                toggle.className = "bi bi-toggle2-on";
                            } else {
                                toggle.className = "bi bi-toggle2-off";
                            }
                            // Update the toggle class


                        },
                        error: function(error) {
                            // Handle error, show an error message or handle as needed
                            console.log(error);
                        }
                    });
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#userAdmin').DataTable({
                    lengthMenu: [
                        [25, 50, 100, -1],
                        [25, 50, 100, 'All'],
                    ],
                });
            });
        </script>

    @endsection

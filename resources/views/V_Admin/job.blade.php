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
                        <i class="bi bi-map"></i>
                        <span>Pekerjaan {{ $getProjek->nama_projek }}</span>

                    </div>
                    <div class="invoices__actions">
                        @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminTeknik')
                            <a href="{{ route('addJob.admin', $getProjek->nama_projek) }}"
                                class="btn-fd-outline btn--small">Tambah Pekerjaan</a>
                        @else
                        @endif
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="formulirPesanan" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pekerjaan</th>
                                <th>Termin </th>
                                <th>status</th>

                                <th>Pengaturan</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($getJob as $job)
                                <tr>
                                    <td>{{ $no++ }}</td>

                                    <td>
                                        <span class="client__name">{{ $job->nama_job }} </span>

                                        <span class="client__handled">Lantai {{ $job->lantai_job }}</span>
                                    </td>

                                    <td>
                                        {{ $job->termin_job }}
                                    </td>
                                    <td>
                                        {{ $job->status_job }}
                                    </td>
                                    <td>
                                        <div class="d-flex flex-nowrap">

                                            <a href="" class="btn-fd-icon-outline">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </a>
                                            @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'StafAcc')
                                                <button type="button" class="btn-fd-icon-outline"
                                                    data-target="#seeKategori{{ $no }}" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg{{ $no }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <div class="modal modal-form fade" id="seeKategori{{ $no }}"
                                                    data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                    aria-labelledby="order-informationLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah Pekerjaan

                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true"><i
                                                                            class="bi bi-x-lg"></i></span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="product-listing">

                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ route('updateJobAction.admin', [$getProjek->nama_projek, Crypt::encrypt($job->id_job)]) }}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                                    Nama Pekerjaan
                                                                                </label>
                                                                                <div class="col-sm-8 align-self-center">
                                                                                    <input type="text"
                                                                                        class="form form-control"
                                                                                        name="nama_job"
                                                                                        value="{{ $job->nama_job }}"
                                                                                        placeholder="Nama Pekerjaan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                                    Termin
                                                                                </label>
                                                                                <div class="col-sm-8 align-self-center">
                                                                                    <input type="text"
                                                                                        class="form form-control"
                                                                                        name="termin_job"
                                                                                        value="{{ $job->termin_job }}"
                                                                                        placeholder="Termin Pekerjaan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                                    lantai
                                                                                </label>
                                                                                <div class="col-sm-8 align-self-center">
                                                                                    <input type="text"
                                                                                        class="form form-control"
                                                                                        name="lantai_job"
                                                                                        value="{{ $job->lantai_job }}"
                                                                                        placeholder="Lantai Pekerjaan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                                    Status
                                                                                </label>
                                                                                <div class="col-sm-8 align-self-center">
                                                                                    <select name="status_job" id=""
                                                                                        class="form-control">
                                                                                        @if ($job->status_job == 'Aktif')
                                                                                            <option value="Aktif" selected>
                                                                                                Aktif</option>
                                                                                            <option value="Nonaktif">
                                                                                                Nonaktif</option>
                                                                                        @else
                                                                                            <option value="Aktif">Aktif
                                                                                            </option>
                                                                                            <option value="Nonaktif"
                                                                                                selected>Nonaktif</option>
                                                                                        @endif
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
                                                                        </form>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                            @endif

                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>


            </div>
        </div>
        <!-- end: content -->


        <script>
            function updateTime() {
                const now = new Date();
                const hours = now.getHours();
                const minutes = now.getMinutes();
                const seconds = now.getSeconds();
                const timeString = `${hours}:${minutes}:${seconds}`;
                document.getElementById('clock').textContent = timeString;
            }
            setInterval(updateTime, 1000);
        </script>

        <script>
            $(document).ready(function() {
                $('#formulirPesanan').DataTable({
                    lengthMenu: [
                        [25, 50, 100, -1],
                        [25, 50, 100, 'All'],
                    ],
                    searching: true, // Enable global search bar
                    searchCols: [
                        null, // Column 1 (No) - No search input field
                        null, // Column 2 (Rumah) - No search input field
                        null, // Column 3 (Status) - No search input field
                        null, // Column 4 (Tipe) - No search input field
                        null // Column 5 (Tanggal Pre Order) - No search input field
                    ],
                    autoWidth: true
                });
            });
        </script>

    @endsection

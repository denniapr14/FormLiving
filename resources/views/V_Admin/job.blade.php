@extends('V_Admin.app')
@extends('flashdata')
@section('title','Form One | Pekerjaan')
@section('pageTitle','Pekerjaan')
@section('back',route('job.admin',[$getProjek->nama_projek]) )
@section('breadcrumb','Pekerjaan')
{{--  @section('breadcrumb2','Tambah Rumah Promo')
@section('breadcrumb3','Tambah Promo')  --}}

@section('content')

    <!-- start: main -->


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->
    <div class="">




        <div class="card mb-3">
            <div class="card-body">
                <div class="card-title">
                    <table style="width: 100%">
                        <tr>
                            <td>   <i class="bi bi-map"></i>
                                <span>Pekerjaan {{ $getProjek->nama_projek }}</span>
                            </td>
                            <td>
                                <div class="float-right">
                                    @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminTeknik')
                            <a href="{{ route('addJob.admin', $getProjek->nama_projek) }}"
                                class="btn btn-outline-info btn--small" style="float: right"><i class="fa fa-plus" aria-hidden="true"></i> Pekerjaan</a>
                        @else
                        @endif
                                </div>

                            </td>
                        </tr>
                    </table>

                </div>
                <div class="table-responsive">
                    <table id="formulirPesanan" class="table">
                        <thead>
                            <tr>

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



                                    <td>
                                        {{ $job->termin_job }}
                                    </td>
                                    <td>
                                        {{ $job->status_job }}
                                    </td>
                                    <td>
                                        <div class="d-flex flex-nowrap">

                                            <a href="{{ route('jobTermin.admin', [$getProjek->nama_projek, Crypt::encrypt($job->termin_job)]) }}" class="btn btn-outline-info">
                                               <i class="fas fa-list    "></i>
                                            </a>


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

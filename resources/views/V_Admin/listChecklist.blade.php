@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'Form One | Checklist')
@section('pageTitle', 'Checklist')
@section('back', route('checklist.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'Checklist')
@section('breadcrumb2', 'Termin Checklist')
@section('breadcrumb3', 'Rincian Checklist Termin')

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
                            <td> <i class="bi bi-map"></i>
                                <a href="{{ route('getTerminChecklist.admin', [$getProjek->nama_projek,Crypt::encrypt($getRumah->id_rumah)]) }}" class="btn btn-outline-danger"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                                <span>Checklist {{ $getProjek->nama_projek }} rumah {{ $getRumah->nama_cluster }} /
                                    {{ $getRumah->blok }} - {{ $getRumah->nomor }} </span>
                            </td>
                            <td>

                            </td>
                        </tr>
                    </table>

                </div>
                <div class="table-responsive">
                    <table id="formulirPesanan" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Checklist</th>
                                <th>Pengawas</th>
                                <th>Pengaturan</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($getChecklist as $checklist)
                                <tr>
                                    <td>{{ $no }}</td>

                                    <td><strong>{{ $checklist->nama_job }}</strong>
                                        <p>

                                            {{ $checklist->nama_jl }}
                                        </p>
                                    </td>
                                    <td>

                                        <div id="accordian-3">
                                            <div class="card">
                                                <a class="card-header" id="heading11">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseDetail{{ $no }}" aria-expanded="false" aria-controls="collapse1">
                                                        <h5 class="m-b-0">Detail Termin @if ($checklist->status_checklist == 'selesai')
                                                            <span  class="btn btn-outline-success">Selesai</span>
                                                        @elseif($checklist->status_checklist == 'progress')
                                                            <span  class="btn btn-outline-warning">Progress</span>
                                                        @elseif($checklist->status_checklist == 'terkunci')
                                                            <span  class="btn btn-outline-danger">Terkunci</span>
                                                        @endif</h5>
                                                    </button>
                                                </a>
                                                <div id="collapseDetail{{ $no }}" class="collapse" aria-labelledby="heading11" data-parent="#accordian-3" style="">
                                                    <div class="card-body">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a class="card-header" id="heading22">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseMaps{{ $no }}" aria-expanded="false" aria-controls="collapse2">
                                                        <h5 class="m-b-0">Maps</h5>
                                                    </button>
                                                </a>
                                                <div id="collapseMaps{{ $no }}" class="collapse" aria-labelledby="heading22" data-parent="#accordian-3" style="">
                                                    <div class="card-body">
                                                        <div style="width: 100%"><iframe width="100%" height="300px" frameborder="0"
                                                            scrolling="no" marginheight="0" marginwidth="0"
                                                            src="https://maps.google.com/maps?width=100%25&amp;height=300&amp;hl=en&amp;q={{ $checklist->lat_checklist }},{{ $checklist->long_checklist }}+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>

                                                      </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-outline-info"> <i class="fa fa-list" aria-hidden="true"></i> Rincian Checklist

                                        </a>
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

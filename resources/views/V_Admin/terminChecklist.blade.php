@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'Form One | Checklist')
@section('pageTitle', 'Checklist')
@section('back', route('checklist.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'Checklist')
@section('breadcrumb2', 'Termin Checklist')
{{--  @section('breadcrumb3', 'Tambah Promo') --}}

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
                            <td> <a href="{{ route('checklist.admin', $getProjek->nama_projek) }}" class="btn btn-outline-danger"> <i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
                                <span>Checklist {{ $getProjek->nama_projek }} rumah {{ $getRumah->nama_cluster }} /
                                    {{ $getRumah->blok }} - {{ $getRumah->nomor }}</span>
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

                                <th>Termin</th>
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

                                    <td>{{ $checklist->termin_job }}</td>
                                    <td>
                                        <p>
                                            Pengawas 1 : {{ $checklist->pengawas1 }}
                                        </p>
                                        <p>
                                            Pengawas 2 : {{ $checklist->pengawas2 }}
                                        </p>
                                        <p>Subkon : {{ $checklist->nama_subkon }}</p>
                                        <p> Status : @if ($checklist->status_checklist == 'selesai')
                                                <span  class="btn btn-outline-success">Selesai</span>
                                            @elseif($checklist->status_checklist == 'progress')
                                                <span  class="btn btn-outline-warning">Progress</span>
                                            @elseif($checklist->status_checklist == 'terkunci')
                                                <span  class="btn btn-outline-danger">Terkunci</span>
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <a href="{{ route('getListChecklist', [$getProjek->nama_projek,Crypt::encrypt($checklist->id_rumah),Crypt::encrypt($checklist->termin_job)]) }}" class="btn btn-outline-info"> <i class="fa fa-list" aria-hidden="true"></i> Rincian Checklist

                                        </a>
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

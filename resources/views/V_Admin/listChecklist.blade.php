@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'Form One | Checklist')
@section('pageTitle', 'Checklist')
@section('back', route('checklist.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'Checklist')
{{-- @section('breadcrumb2', 'Tambah Rumah Promo')
@section('breadcrumb3', 'Tambah Promo') --}}

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
                                <span>Checklist {{ $getProjek->nama_projek }}</span>
                            </td>
                            <td>
                                <div class="float-right">
                                    @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminTeknik')
                                        <a href="{{ route('addJob.admin', $getProjek->nama_projek) }}"
                                            class="btn btn-outline-info btn--small" style="float: right"><i class="fa fa-plus"
                                                aria-hidden="true"></i> Pekerjaan</a>
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
                                <th>No.</th>
                                <th>Rumah</th>
                                <th>status</th>
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

                                    <td>
                                        {{ $checklist->blok }} - {{ $checklist->nomor }} / {{ $checklist->nama_cluster }}
                                        <br>
                                        <label for="">Persentase :  {{ $checklist->percentase }}%</label>
                                        @if ($checklist->percentase < 25)

                                            <div class="progress">
                                                <div class="progress-bar bg-danger progress-bar-striped" role="progressbar"
                                                    aria-valuenow="{{ $checklist->percentase }}" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: {{ $checklist->percentase }}%">

                                                </div>
                                            </div>
                                        @elseif($checklist->percentase > 25 && $checklist->percentase < 50)
                                            <div class="progress">
                                                <div class="progress-bar bg-warning progress-bar-striped" role="progressbar"
                                                    aria-valuenow="{{ $checklist->percentase }}" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: {{ $checklist->percentase }}%">

                                                </div>
                                            </div>
                                        @elseif($checklist->percentase > 50 && $checklist->percentase < 75)
                                            <div class="progress">
                                                <div class="progress-bar bg-primary progress-bar-striped"  role="progressbar"
                                                    aria-valuenow="{{ $checklist->percentase }}" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: {{ $checklist->percentase }}%">

                                                </div>
                                            </div>
                                        @else
                                            <div class="progress">
                                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar"
                                                    aria-valuenow="{{ $checklist->percentase }}" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: {{ $checklist->percentase }}%">

                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $d = strtotime('now');
                                            $dt = strtotime('-10 days');
                                            $dtr = strtotime('+20 days');
                                            $newd = date('d-m-Y', $d);
                                            $newdt = date('d-m-Y', $dt);
                                            $newdtr = date('d-m-Y', $dtr);
                                        @endphp
                                        @if ($checklist->tgl_deadline < $newd)
                                            <div class="btn btn-outline-danger">

                                                {{ tgl_indo($checklist->tgl_deadline) }}
                                                <br> Melebihi Deadline <br> Peringatan Sub Kontraktor
                                            </div>
                                        @elseif ($checklist->tgl_deadline > $newdt && $checklist->tgl_deadline < $newdtr)
                                            <div class="btn btn-outline-warning">

                                                {{ tgl_indo($checklist->tgl_deadline) }}
                                                <br> Mendekati Deadline
                                            </div>
                                        @elseif($checklist->tgl_deadline > $newdtr)
                                            <div class="btn btn-outline-success">

                                                {{ tgl_indo($checklist->tgl_deadline) }}
                                                <br> Aman
                                            </div>
                                        @endif

                                    </td>
                                    <td>
                                        <dl>
                                            <div class="callout callout-info">
                                                <dt>Pengawas 1</dt>
                                                <dd>{{ $checklist->pengawas1 }}</dd>
                                                <dt>Pengawas 2</dt>
                                                <dd>{{ $checklist->pengawas1 }}</dd>
                                            </div>
                                            <div class="callout callout-info">
                                                <dt>Subkon</dt>
                                                <dd>{{ $checklist->nama_subkon }}</dd>
                                            </div>
                                            <div class="callout callout-info">
                                                <dt>Lantai {{ $checklist->lantai_jl }}</dt>

                                            </div>




                                        </dl>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-outline-info"><i class="fa fa-chevron-right"
                                                aria-hidden="true"> Termin</i></a><br>
                                        <a href="{{ route('getListChecklist.admin',[$getProjek->id_projek]) }}" class="btn btn-outline-info"><i class="fas fa-clipboard-list    ">
                                                Ceklist</i></a><br>
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

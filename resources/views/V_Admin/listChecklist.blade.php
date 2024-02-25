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
                                                    @if ($checklist->id_pengawas1 == $user->id_user_admin)
                                                        @if ($checklist->status_cek_pengawas1 == "belum selesai")
                                                        <span class="btn btn-outline-warning float-right"> <i class="fas fa-spinner fa-spin"></i> </span>
                                                        @else($checklist->status_cek_pengawas1 == "selesai")
                                                        <span class="btn btn-outline-success float-right"> <i class="fa fa-check " aria-hidden="true"></i> </span>
                                                        @endif
                                                    @elseif($checklist->id_pengawas2 == $user->id_user_admin)
                                                    @if ($checklist->status_cek_pengawas2 == "belum selesai")
                                                    <span class="btn btn-outline-warning float-right"> <i class="fas fa-spinner fa-spin"></i> </span>
                                                    @else($checklist->status_cek_pengawas2 == "selesai")
                                                    <span class="btn btn-outline-success float-right"> <i class="fa fa-check " aria-hidden="true"></i> </span>

                                                    @endif
                                                    @endif

                                                </a>
                                                <div id="collapseDetail{{ $no }}" class="collapse" aria-labelledby="heading11" data-parent="#accordian-3" style="">
                                                    <div class="card-body">
                                                        <p>
                                                            Pengawas 1 : {{ $checklist->pengawas1 }} @if ($checklist->status_cek_pengawas1 == "selesai")
                                                            <span class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                        @else
                                                            <span class="btn btn-outline-danger"><i class="fas fa-spinner fa-spin"></i> </span>
                                                        @endif
                                                    </p>
                                                    <p>
                                                        Pengawas 2 :  {{ $checklist->pengawas2 }} @if ($checklist->status_cek_pengawas2 == "selesai")
                                                        <span class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                    @else
                                                        <span class="btn btn-outline-danger"><i class="fas fa-spinner fa-spin"></i> </span>
                                                    @endif
                                                </p>
                                                <p>

                                                    Keterangan : {{ $checklist->keterangan }}
                                                </p>
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
                                        @if ($user->kategori == "Pengawas" && $checklist->status_checklist =="terkunci")

                                        @else
                                        <a href="{{ route('editChecklist.admin', [ $getProjek->nama_projek,Crypt::encrypt($checklist->id_rumah),Crypt::encrypt($checklist->termin_job),Crypt::encrypt($checklist->id_checklist)]) }}" class="btn btn-outline-info"> <i class="fas fa-edit    "></i>

                                        </a>
                                        @endif

                                        @if ($checklist->foto != null)
                                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#seeImage{{ $checklist->id_checklist }}">
                                            <i class="fas fa-image    "></i>
                                          </button>

                                          <!-- Modal -->
                                          <div class="modal fade" id="seeImage{{ $checklist->id_checklist }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Checklist  {{ $checklist->nama_jl }}</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img id="imagePreview" style="width: 100%" src="{{ asset('Home/images/termin/' . $checklist->foto) }}" class="img-fluid"
                        alt="Preview Image">
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        @endif

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

@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'Form One | Checklist')
@section('pageTitle', 'Checklist')
@section('back', route('checklist.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'Checklist')


@section('content')


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
                                        <a href="#" data-toggle="modal" data-target="#addChecklist"
                                            class="btn btn-outline-info btn--small" style="float: right"><i
                                                class="fa fa-plus" aria-hidden="true"></i> Checklist</a>

                                        <div class="modal" id="addChecklist">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Tambah Checklist</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form
                                                        action="{{ route('addChecklist.admin', $getProjek->nama_projek) }}"
                                                        method="POST">
                                                        @csrf
                                                        <!-- Modal Body -->
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">Pilih Rumah</label>
                                                                <select class="js-example-basic-single form-control"
                                                                    id="rumah" required name="rumah"
                                                                    style="width: 100%">
                                                                    <option value="">--Rumah--</option>
                                                                    @foreach ($getRumah as $rumah)
                                                                        <option value="{{ $rumah->id_rumah }}">
                                                                            {{ $rumah->blok }} - {{ $rumah->nomor }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Lantai</label>
                                                                <select name="lantai" required
                                                                    class="js-example-basic-single form-control"
                                                                    style="width: 100%" id="">
                                                                    <option value="">-- Lantai --</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Subkon</label>
                                                                <select name="subkon" required
                                                                    class="js-example-basic-single form-control"
                                                                    id="" style="width: 100%">
                                                                    <option value="">--subkon--</option>
                                                                    @foreach ($getSubkon as $subkon)
                                                                        <option value="{{ $subkon->id_subkon }}">
                                                                            {{ $subkon->nama_subkon }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Pengawas 1</label>
                                                                <select name="pengawas1" required
                                                                    class="js-example-basic-single form-control"
                                                                    id="" style="width: 100%">
                                                                    <option value="">--Pengawas 1--</option>
                                                                    @foreach ($getPengawas as $pengawas)
                                                                        <option value="{{ $pengawas->id_user_admin }}">
                                                                            {{ $pengawas->nama_ua }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Pengawas 2</label>
                                                                <select name="pengawas2" required
                                                                    class="js-example-basic-single form-control"
                                                                    id="" style="width: 100%">
                                                                    <option value="">--Pengawas 2--</option>
                                                                    @foreach ($getPengawas as $pengawas)
                                                                        <option value="{{ $pengawas->id_user_admin }}">
                                                                            {{ $pengawas->nama_ua }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- Modal Footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-outline-success">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    @endif
                                </div>

                            </td>
                        </tr>
                    </table>

                </div>
                <div class="table-responsive">
                    <table id="checklistTable" class="table">
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
                                        {{ $checklist->blok }}-{{ $checklist->nomor }} / {{ $checklist->nama_cluster }}
                                        <br>

                                    </td>
                                    <td>
                                        <label for="">Persentase : {{ $checklist->percentase }}%</label>
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
                                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                                                    aria-valuenow="{{ $checklist->percentase }}" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: {{ $checklist->percentase }}%">

                                                </div>
                                            </div>
                                        @else
                                            <div class="progress">
                                                <div class="progress-bar bg-success progress-bar-striped"
                                                    role="progressbar" aria-valuenow="{{ $checklist->percentase }}"
                                                    aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ $checklist->percentase }}%">

                                                </div>
                                            </div>
                                        @endif

                                        <br>
                                        @php
                                            $d = strtotime('now');
                                            $dt = strtotime('-10 days');
                                            $dtr = strtotime('+20 days');
                                            $newd = date('d-m-Y', $d);
                                            $newdt = date('d-m-Y', $dt);
                                            $newdtr = date('d-m-Y', $dtr);
                                        @endphp
                                        @if ($checklist->tgl_deadline > $newd)
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
                                                <dd>{{ $checklist->pengawas2 }}</dd>

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
                                                <a href="{{ route('getTerminChecklist.admin', [$getProjek->nama_projek, Crypt::encrypt($checklist->id_rumah)]) }}"
                                                    class="btn btn-outline-info"><i class="fas fa-clipboard-list    ">
                                                        Ceklist</i></a><br>


                                            @if ($user->kategori == 'AdminTeknik' || $user->kategori == 'SuperAdmin')

                                                    <a href="{{ route('nextTermin.admin', [$getProjek->nama_projek, Crypt::encrypt($checklist->id_rumah)]) }}"
                                                        class="btn btn-outline-info"><i class="fa fa-chevron-right"
                                                            aria-hidden="true"> Termin</i></a>

                                                    <a href="{{ route('printChecklist.admin', [$getProjek->nama_projek, Crypt::encrypt($checklist->id_rumah)]) }}"
                                                        class="btn btn-outline-info"><i class="fa fa-print"
                                                            aria-hidden="true"></i></a>

                                            @endif



                                        @if ($user->kategori == 'AdminTeknik' || $user->kategori == 'SuperAdmin')

                                        <br>
                                                    <a href="#" class="btn btn-outline-info" data-toggle="modal"
                                                    data-target="#ChangePengawas">
                                                    <i class="fas fa-edit    "></i> Pengawas
                                                </a>




                                                <div class="modal fade" id="ChangePengawas" tabindex="-1" role="dialog"
                                                    aria-labelledby="pinModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="pinModalLabel">Edit Pengawas</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('editPengawas.admin', [$getProjek->nama_projek, Crypt::encrypt($checklist->id_rumah)]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                      <label for="">Pengawas 1</label>
                                                                     <select name="pengawas1" id="" class="form-control" required>
                                                                        <option value="{{ $checklist->id_pengawas1 }}">{{ $checklist->pengawas1 }}</option>
                                                                        @foreach ($getPengawas as $pengawas)
                                                                            <option value="{{ $pengawas->id_user_admin }}">{{ $pengawas->nama_ua }}</option>
                                                                        @endforeach
                                                                     </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Pengawas 2</label>
                                                                       <select name="pengawas2" id="" class="form-control" required>
                                                                          <option value="{{ $checklist->id_pengawas2 }}">{{ $checklist->pengawas2 }}</option>
                                                                          @foreach ($getPengawas as $pengawas)
                                                                          <option value="{{ $pengawas->id_user_admin }}">{{ $pengawas->nama_ua }}</option>
                                                                      @endforeach
                                                                       </select>
                                                                      </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-outline-success">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>



                                                    <a href="#" class="btn btn-outline-info" data-toggle="modal"
                                                        data-target="#dateModal">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i> Deadline
                                                    </a>


                                                <div class="modal fade" id="dateModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="pinModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="pinModalLabel">Change Deadline</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{ route('customTermin.admin', [$getProjek->nama_projek, Crypt::encrypt($checklist->id_rumah)]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">

                                                                    <div class="mb-3">
                                                                        <label for="dateInput"
                                                                            class="form-label">Date</label>
                                                                        <input type="date" name="tanggalTermin"
                                                                            class="form-control" id="dateInput">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-outline-success">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>



                                        @else
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
                $('.js-example-basic-single').select2();
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#checklistTable').DataTable({
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

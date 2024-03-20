@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'Checklist')
@section('pageTitle', 'Cetak Checklist ' . $getRumah->blok . '-' . $getRumah->nomor)


@section('back', route('checklist.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'Checklist')
@section('breadcrumb2', 'Cetak Termin ')

@section('content')

    <?php
    $d = strtotime('now');
    $newd = date('m - Y', $d);

    $newdall = date('Y - m - d', $d);
    ?>
    <div class="col-lg-12">
        <div id="accordion-3">
            @foreach ($getTermin as $terminGroup)
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        id="heading{{ $loop->index }}">
                        <button class="btn btn-link collapsed" data-toggle="collapse"
                            data-target="#collapse{{ $loop->index }}" aria-expanded="false"
                            aria-controls="collapse{{ $loop->index }}">
                            <h5 class="m-b-0">Termin
                                @if ($terminGroup->first()->termin_jl == 1)
                                    I
                                @elseif ($terminGroup->first()->termin_jl == 2)
                                    II
                                @elseif ($terminGroup->first()->termin_jl == 3)
                                    III
                                @elseif ($terminGroup->first()->termin_jl == 4)
                                    III.9
                                @elseif ($terminGroup->first()->termin_jl == 5)
                                    IV
                                @endif
                            </h5>
                        </button>
                        <button class="btn btn-outline-info" onclick="printTable('printTermin-{{ $loop->index }}')"><i
                                class="fa fa-print" aria-hidden="true"></i></button>
                    </div>
                    <div id="collapse{{ $loop->index }}" class="collapse" aria-labelledby="heading{{ $loop->index }}"
                        data-parent="#accordion-3">

                        <div class="card-body">
                            <div id="printTermin-{{ $loop->index }}">
                                <center>
                                    <h3><b>LAPORAN PRESTASI PEKERJAAN
                                            @if ($terminGroup->first()->termin_jl == 1)
                                                I
                                            @elseif ($terminGroup->first()->termin_jl == 2)
                                                II
                                            @elseif ($terminGroup->first()->termin_jl == 3)
                                                III
                                            @elseif ($terminGroup->first()->termin_jl == 4)
                                                III.9
                                            @elseif ($terminGroup->first()->termin_jl == 5)
                                                IV
                                            @endif
                                            RUMAH {{ $getPengawas->lantai_job }} LANTAI
                                    </h3>
                                </center>
                                <table style="font-weight: 100">
                                    <tr>
                                        <td>KAVLING / TYPE:</td>
                                        <td> No. SPK:</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">PERIODE: {{ $newd }}</td>
                                    </tr>
                                </table>

                                <table class="table table-bordered table-responsive-lg" style="font-weight: 100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pekerjaan</th>
                                            <th>Status</th>
                                            <th>Tanggal Deadline</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $currentJob = ''; // Variable to track the current job name
                                        @endphp
                                        @foreach ($terminGroup as $item)
                                            @php
                                                $jobName = $item->nama_job;
                                            @endphp
                                            @if ($jobName != $currentJob)
                                                <tr>
                                                    <td colspan="5"><strong>{{ $jobName }}</strong></td>
                                                </tr>
                                                @php
                                                    $currentJob = $jobName;
                                                @endphp
                                            @endif
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td style="width: 40%">{{ $item->nama_jl }}</td>
                                                <td style="width: 2rem; text-align: center">
                                                    @if ($item->status_checklist == 'selesai')
                                                        <i class="fas fa-check"></i>
                                                    @elseif ($item->status_checklist == 'terkunci')
                                                        <i class="fas fa-lock"></i>
                                                    @elseif ($item->status_checklist == 'progress')
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    @endif
                                                </td>
                                                <td style="width: 10rem; text-align: center">
                                                    @if (empty($item->tgl_update))
                                                    @else
                                                        {{ tgl_indo($item->tgl_update) }}
                                                    @endif
                                                </td>
                                                <td>{{ $item->keterangan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="width: 100%; font-weight: 100">
                                    <p class="float-left">Diperiksa tanggal {{ tgl_indo($newdall) }}</p>
                                    <p class="float-right">Malang, {{ tgl_indo($newdall) }}<br>
                                        Diajukan</p>
                                    <br><br><br><br><br><br>
                                    @if ($terminGroup->first()->termin_jl == 5)
                                        <table style="width: 100%">
                                            <tr>
                                                <td> <u>{{ $getPengawas->pengawas1 }}</u>
                                                    <br>
                                                    Pengawas 1
                                                </td>
                                                <td>
                                                    <u>{{ $getPengawas->pengawas2 }}</u>
                                                    <br>Pengawas 2
                                                </td>
                                                <td>
                                                    <u>Sunyoto</u>
                                                    <br>Pendamping
                                                    <br>
                                                </td>
                                                <td class="text-right">
                                                    <br>
                                                    <u>{{ $getPengawas->nama_subkon }}</u><br>
                                                    Subkont


                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <br><br><br>
                                                    Arsitek
                                                </td>
                                                <td>
                                                    <br><br><br>
                                                    Sales
                                                </td>
                                                <td colspan="2">
                                                    <br><br><br>
                                                    REM
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    Menyetujui
                                                    <br><br><br><br>
                                                    <u>Robert Martee</u>
                                                </td>
                                                <td colspan="2" class="text-right">
                                                    Mengetahui
                                                    <br><br><br><br>
                                                    <u>Gilbert Setiawan</u>
                                                    <br> CEO
                                                </td>
                                            </tr>
                                        </table>
                                    @elseif($terminGroup->first()->termin_jl == 4)
                                        <table style="width: 100%">
                                            <tr>
                                                <td> <u>{{ $getPengawas->pengawas1 }}</u>
                                                    <br>
                                                    Pengawas 1
                                                </td>
                                                <td>
                                                    <u>{{ $getPengawas->pengawas2 }}</u>
                                                    <br>Pengawas 2
                                                </td>
                                                <td class="text-right">
                                                    <u>Sunyoto</u>
                                                    <br>Pendamping
                                                    <br>

                                                </td>

                                            </tr>

                                        </table>
                                    @else
                                        <table style="width: 100%">
                                            <tr>
                                                <td> <u>{{ $getPengawas->pengawas1 }}</u>
                                                    <br>
                                                    Pengawas 1
                                                </td>
                                                <td>
                                                    <u>{{ $getPengawas->pengawas2 }}</u>
                                                    <br>Pengawas 2
                                                </td>
                                                <td>
                                                    <u>Sunyoto</u>
                                                    <br>Pendamping
                                                    <br>

                                                </td>
                                                <td class="text-right">
                                                    <u>{{ $getPengawas->nama_subkon }}</u>
                                                    <br>
                                                    Subkont

                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right"><br>
                                                    Mengetahui
                                                    <br><br><br><br>
                                                    <u>Gilbert Setiawan</u><br>CEO
                                                </td>
                                            </tr>
                                        </table>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            <script>
                function printTable(tableId) {
                    var printContents = document.getElementById(tableId).outerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                }
            </script>

        </div>
    </div>


@endsection

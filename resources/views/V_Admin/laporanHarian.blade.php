@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'Form One | Laporan Harian')
@section('pageTitle', 'Laporan Harian')
@section('back', route('laporanHarian.admin', [$getProjek->nama_projek]))


@section('content')


<div>
    <div class="row">
        <div class="col-md-3">

            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-2">

                        <i class="fa fa-tree fa-4x" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Laporan Harian Taman</h5>
                        <p class="card-text"><a href="" class="btn btn-outline-info"> Detail</a></p>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">

            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-2">

                        <i class="fas fa-shield-alt fa-4x" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Laporan Harian Petugas</h5>
                        <p class="card-text"><a href="" class="btn btn-outline-info"> Detail</a></p>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">

            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-2">

                        <i class="fas fa-lightbulb fa-4x" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Laporan Harian Lampu</h5>
                        <p class="card-text"><a href="" class="btn btn-outline-info"> Detail</a></p>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">

            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-2">

                        <i class="fa fa-users fa-4x" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Komplain Warga</h5>
                        <p class="card-text"><a href="" class="btn btn-outline-info">total : 0 </a></p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <h3>Laporan Masalah</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-2">
                        <i class="fa fa-tree fa-4x" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Laporan Taman Bulan ini</h5>
                        <p class="card-text">

                        <table style="width: 100%">
                            <tr>
                                <td class="text-center">
                                    <h3><b>{{ $getCountTaman }}</b></h3>
                                </td>
                                <td>
                                    <a href="" class="btn btn-outline-light float-right"> Info</a>
                                </td>
                            </tr>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="card bg-danger text-white">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-2">

                        <i class="fas fa-lightbulb fa-4x" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Laporan Lampu Taman Bulan ini</h5>
                        <p class="card-text">
                        <table style="width: 100%">
                            <tr>
                                <td class="text-center">
                                    <h3><b>{{ $getCountLampuTaman }}</b></h3>
                                </td>
                                <td>
                                    <a href="" class="btn btn-outline-light float-right"> Info</a>
                                </td>
                            </tr>
                        </table>

                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">

            <div class="card bg-dark text-white">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-2">

                        <i class="fas fa-shield-alt fa-4x" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Laporan Keamanan Bulan ini</h5>
                        <p class="card-text">
                        <table style="width: 100%">
                            <tr>
                                <td class="text-center">
                                    <h3><b>{{ $getCountPetugasKeamanan }}</b></h3>
                                </td>
                                <td><a href="" class="btn btn-outline-light float-right"> Info</a>
                                </td>
                            </tr>
                        </table>
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div id="accordian-3">
        <div class="card">
            <a class="card-header" id="heading11">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"
                    aria-controls="collapse1">
                    <h5 class="m-b-0">Laporan REM</h5>
                </button>
            </a>
            <div id="collapse1" class="collapse show" aria-labelledby="heading11" data-parent="#accordian-3">
                <div class="card-body">
                    <table class="table" id="laporan_rem" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe Laporan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $no = 1;
                            @endphp

                            @foreach ($getLaporanREM as $laporan)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{ $laporan->tipe_laporan }}</td>
                                <td>
                                    @if ($laporan->on_check_rem == 'yes')
                                    <i class="fa fa-check text-success"></i>
                                    @elseif ($laporan->on_check_rem == 'no')
                                    <i class="fa fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    {{ tgl_indo($laporan->tgl_input_LREM) }}
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

    </div>

</div>


<script>
    $(document).ready(function() {
            $('#laporan_rem').DataTable({
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

            });
        });
</script>

@endsection
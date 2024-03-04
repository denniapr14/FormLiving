@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'Form One | Laporan Petugas Keamanan')
@section('pageTitle', 'Laporan Petugas Keamanan')
@section('back', route('harianLampuTaman.admin', [$getProjek->nama_projek]))


@section('content')


    <div>
        <div id="accordian-3">
            <div class="card">
                <a class="card-header" id="heading11">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#harianLampu" aria-expanded="true" aria-controls="collapse1">
                        <h5 class="m-b-0">Laporan Petugas Keamanan Hari ini</h5>
                    </button>
                </a>
                <div id="harianLampu" class="collapse show" aria-labelledby="heading11" data-parent="#accordian-3">
                    <div class="card-body" >
                        <center><a href="" class="btn btn-outline-info"><i class="fa fa-plus" aria-hidden="true"></i> Laporan Petugas Keamanan Hari ini</a></center>
                    </div>
                </div>
            </div>

        </div>

        <div id="accordian-3">
            <div class="card">
                <a class="card-header" id="heading11">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#Lampu" aria-expanded="true" aria-controls="collapse1">
                        <h5 class="m-b-0">Laporan Petugas Keamanan</h5>
                    </button>
                </a>
                <div id="Lampu" class="collapse" aria-labelledby="heading11" data-parent="#accordian-3">
                    <div class="card-body" >
                        <table class="table table-responsive w-100" style="width: 100%" id="tableLampu">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Pengaturan</th>
                                </tr>

                            </thead>
                            <tbody>
                                @php
                                    $no=1
                                @endphp
                                @foreach ($getLampuTaman as $lampuTaman)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ tgl_indo($lampuTaman->tgl_input_LREM) }}</td>
                                    <td>  @if ($lampuTaman->on_check_rem == 'yes')
                                        <i class="fa fa-check text-success"></i>
                                    @elseif ($lampuTaman->on_check_rem == 'no')
                                        <i class="fa fa-times text-danger"></i>
                                    @endif

                                </td>
                            <td>
                            <a href="" class="btn btn-outline-info"><i class="fa fa-eye" aria-hidden="true"></i> detail</a>
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
            $('#tableLampu').DataTable({
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

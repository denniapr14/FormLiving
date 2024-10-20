@extends('V_Admin.app')

@extends('flashdata')
@section('title', 'Forms| SPK')
@section('pageTitle', 'SPK')
@section('back', route('spk.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'SPK')
{{-- @section('breadcrumb2', 'Tambah Produk') --}}
@section('content')

<!-- start: main -->
<style>
    @media (max-width: 500px) {
        #SPK_Mobile {
            display: block;
        }

        #SPK_PC {
            display: none;
        }
    }

    @media (min-width: 501px) {
        #SPK_Mobile {
            display: none;
        }

        #SPK_PC {
            display: block;
        }
    }
</style>


<!-- start: navbar -->

<!-- end: navbar -->

<!-- start: content -->

<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#spp" role="tab"><span
                class="hidden-sm-up">SPP</a>
    </li>
    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#spk" role="tab"><span
                class="hidden-sm-up">SPK</a>
    </li>
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#cicilanSPK" role="tab"><span
                class="hidden-sm-up">
                Cicilan SPK
        </a> </li>

</ul>
<div class="tab-content tabcontent-border">
    <div class="tab-pane" id="spp" role="tabpanel">
        <div class="card">
            <div class="card-body">
                <table class="table" id="tableSPP">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Rumah</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $noSPP = 1;
                        @endphp
                        @foreach ($getSPP as $spp)
                        <tr>
                            <td scope="row">{{ $noSPP }}</td>
                            <td>{{ $spp->blok }} - {{ $spp->nomor }}</td>
                            <td>
                                @if ($user->kategori == 'AdminTeknik' || $user->kategori == 'SuperAdmin')
                                @php
                                    $spkExist = false;
                                @endphp

                                @foreach ($getSPK as $spk)
                                    @if ($spp->id_spp == $spk->id_spp)
                                        <p>SPK Telah dibuat</p>
                                        @php
                                            $spkExist = true;
                                        @endphp
                                        @break
                                    @endif
                                @endforeach

                                @if (!$spkExist)
                                    <a href="{{ route('addSPK.admin', [$getProjek->nama_projek, Crypt::encrypt($spp->id_spp)]) }}"
                                        class="btn btn-outline-info">
                                        <i class="fa fa-plus" aria-hidden="true"></i> SPK
                                    </a>
                                @endif
                            @endif
                            </td>


                        </tr>
                        @php
                        $noSPP++;
                        @endphp
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <div class="tab-pane active" id="spk" role="tabpanel">
        <div class="card" id="SPK_PC">

            <div class="card-body">
                <div class="card-title">
                    <table style="width: 100%">
                        <tr>
                            <td> <i class="bi bi-house-fill"></i>
                                <span>SPK {{ $getProjek->nama_projek }}</span>
                            </td>
                            <td>


                            </td>
                        </tr>
                    </table>

                </div>



                <div class="table-responsive">

                    <table id="rumah" class="table" style="width: 100%">
                        <thead class="">
                            <tr>
                                <th class="th-table" style="width: 1rem">No</th>
                                <th class="th-table" style="width: 10%">No Rumah</th>
                                <th>Detail</th>
                                <th class="th-table" style="width: 35%">Pengaturan</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nospk = 1;
                            @endphp
                            @foreach ($getSPK as $spk)
                            <tr>
                                <td>{{ $nospk }}</td>
                                <td>{{ $spk->blok }} - {{ $spk->nomor }}</td>
                                <td>

                                    <div id="accordian-3">
                                        <div class="card">
                                            <a class="card-header" id="heading11">
                                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#spk{{ $spk->id_spk }}" aria-expanded="false"
                                                    aria-controls="collapse1">
                                                    <h5 class="m-b-0"> Detail SPK
                                                    </h5>
                                                </button>
                                            </a>
                                            <div id="spk{{ $spk->id_spk }}" class="collapse" aria-labelledby="heading11"
                                                data-parent="#accordian-3" style="">
                                                <div class="card-body">

                                                    <p>Berkas SPK : {{ $spk->file_spk }} <a
                                                            href="{{ asset('File/file_spk/' . $spk->file_spk) }}"
                                                            class="btn btn-outline-info"><i class="fa fa-download"
                                                                aria-hidden="true"></i></a></p>
                                                    <p>

                                                        Status : {{ $spk->status_spk }}
                                                    </p>
                                                    Denah :
                                                    @foreach ($getImageSPK as $img_spk)
                                                    @if ($img_spk->id_spk == $spk->id_spk)
                                                    <a href="#" class="btn btn-outline-info" data-toggle="modal"
                                                        data-target="#imageModal{{ $img_spk->id_img_spk }}">
                                                        <i class="fas fa-image    "></i>

                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="imageModal{{ $img_spk->id_img_spk }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="imageModalLabel{{ $img_spk->id_img_spk }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="imageModalLabel{{ $img_spk->id_img_spk }}">
                                                                        Gambar Denah
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="{{ asset('File/denah_spk/' . $img_spk->img_spk) }}"
                                                                        style="width: 100%" class="img-fluid"
                                                                        alt="Image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </td>
                                <td>
                                    <a href="{{ route('editSPK.admin', [$getProjek->nama_projek, Crypt::encrypt($spk->id_spk)]) }}"
                                        class="btn btn-outline-info"><i class="fas fa-edit    "></i></a>
                                </td>
                            </tr>
                            @php

                            $nospk++;
                            @endphp
                            @endforeach
                        </tbody>

                    </table>

                </div>



            </div>


        </div>


    </div>
    <div class="tab-pane" id="cicilanSPK" role="tabpanel">
        <div class="card">

            <div class="card-body">
                <table class="table" id="tableCicilanSPK">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Cicilan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $noCicilanSPK = 1;
                        @endphp
                        @foreach ($getTambahanSPK as $tambahBangunan)
                        <tr>
                            <td scope="row">{{ $noCicilanSPK }}</td>
                            <td>
                                Rumah : {{ $tambahBangunan->blok }} - {{ $tambahBangunan->nomor }} <br>
                                Pelanggan : {{ $tambahBangunan->nama_plgn }}
                            </td>
                            <td>
                                <div id="accordian-3">
                                    <div class="card">
                                        <a class="card-header" id="heading11">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#cicilanSPK{{ $tambahBangunan->id_spk }}"
                                                aria-expanded="false" aria-controls="collapse1">
                                                <h5 class="m-b-0"> Cicilan SPK

                                                </h5>

                                            </button>

                                        </a>
                                        <div id="cicilanSPK{{ $tambahBangunan->id_spk }}" class="collapse"
                                            aria-labelledby="heading11" data-parent="#accordian-3" style="">
                                            <div class="card-body">
                                                <div>
                                                    <table class="table-info" style="width: 100%">
                                                        <tr>
                                                            <td>
                                                                <h3>

                                                                    Tagihan Tambah Kurang Bangunan
                                                                </h3>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('addCicilanSPK.admin', [$getProjek->nama_projek,Crypt::encrypt($spk->id_spk)]) }}"
                                                                    class="btn btn-outline-info float-right"> <i
                                                                        class="fa fa-plus" aria-hidden="true"></i>
                                                                    Tagihan</a>
                                                            </td>
                                                        </tr>
                                                    </table>


                                                </div>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tagihan</th>
                                                            <th>Status</th>
                                                            <th>Tanggal Deadline</th>
                                                            @if ($user->kategori =="AdminAccounting" || $user->kategori =="StafAcc" || $user->kategori="SuperAdmin")
                                                            <th>Pengaturan</th>

                                                            @endif

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $noTagihan = 1;
                                                        $sumTagihan = 0; // Initialize sumTagihan
                                                        @endphp
                                                        @forelse ($getCicilanSPK as $cicilanSPK)
                                                        @if ($cicilanSPK->id_spk == $tambahBangunan->id_spk)
                                                        <tr>
                                                            <td scope="row">{{ $noTagihan++ }}

                                                            </td>
                                                            <td>Rp. {{ rupiah($cicilanSPK->pembayaran_cs) }} <br>
                                                                <span class="badge badge--danger text-danger"> - Rp. {{ rupiah($cicilanSPK->sisa_cs) }}</span>
                                                            </td>
                                                            <td>
                                                                @if ($cicilanSPK->status_cs == 'belum')
                                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                                @elseif ($cicilanSPK->status_cs == "kurang")
                                                                <i class="fas fa-spinner fa-spin"></i>
                                                                @else
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                @endif
                                                            </td>
                                                            <td>{{ tgl_indo($cicilanSPK->tgl_bayar_cs) }}</td>
                                                            @if ($user->kategori =="AdminAccounting" || $user->kategori =="StafAcc" || $user->kategori="SuperAdmin")
                                                            <td>

                                                                <a href="#" class="btn btn-outline-info"
                                                                    data-toggle="modal" data-target="#myModal{{ $cicilanSPK->id_cicilan_spk }}">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>

                                                                <!-- Modal -->
                                                                <div class="modal" id="myModal{{ $cicilanSPK->id_cicilan_spk }}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Edit Tagihan
                                                                                </h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                            <form action="{{ route('editTagihanAction.admin',[$getProjek->nama_projek,Crypt::encrypt($cicilanSPK->id_cicilan_spk)]) }}" method="POST" enctype="multipart/form-data">
                                                                            <!-- Modal Body -->
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="">Tagihan</label>
                                                                                    <input type="number" name="tagihan_cs"
                                                                                        id="" class="form-control"
                                                                                        value="{{ $cicilanSPK->pembayaran_cs }}"
                                                                                        placeholder=""
                                                                                        aria-describedby="helpId">

                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="">Sisa Tagihan  <span class="badge badge--danger text-danger"> - Rp. {{ rupiah($cicilanSPK->sisa_cs) }}</span></label>
                                                                                    <input type="number" name="sisa_cs"
                                                                                        id="" class="form-control"
                                                                                        value=""
                                                                                        placeholder=""
                                                                                        aria-describedby="helpId">

                                                                                </div>
                                                                            </div>

                                                                            <!-- Modal Footer -->
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-danger float-left"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-outline-success float-right">
                                                                                    Submit </button>

                                                                            </div>
                                                                        </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="{{ route('pembayaranCicilanSPK.admin', [$getProjek->nama_projek,Crypt::encrypt($cicilanSPK->id_cicilan_spk)]) }}" class="btn btn-outline-info"> <i
                                                                        class="fas fa-university"></i> Pembayaran</a>
                                                            </td>
                                                            @endif

                                                        </tr>
                                                        @php
                                                        $sumTagihan += $cicilanSPK->sisa_cs; // Sum up the payments
                                                        @endphp
                                                        @endif
                                                        @empty
                                                        <tr>
                                                            <td colspan="3">No data available</td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                                <!-- Display the sum of payments -->
                                                <p>Total Tagihan: Rp. {{ rupiah($sumTagihan) }}</p>

                                            </div>
                                        </div>
                                    </div>

                                </div>




                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<div class="">

</div>

<script>
    $(document).ready(function() {
            $("#myButton").click(function() {
                alert("Button clicked");
            });
        });
        $(document).ready(function() {
            $('#rumah').DataTable({
                responsive: true
            });
        });
        $(document).ready(function() {
            $("#rumah-mobile").DataTable({
                responsive: true
            });
        });

        {{--  $(document).ready(function() {
            $('#rumah').DataTable({
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
                autoWidth: true,
                columnDefs: [{
                        targets: 3,
                        type: 'string'
                    } // Kolom "Status" akan diurutkan sebagai string
                ],
                order: [
                    [3, 'asc']
                ] // Kolom "Status" diurutkan secara ascending (A ke Z)
            });
        });  --}}
</script>

@endsection

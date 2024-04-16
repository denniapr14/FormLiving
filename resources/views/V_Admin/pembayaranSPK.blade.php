@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'Tambah Cicilan SPK')
@section('pageTitle', 'Tambah Cicilan SPK')
@section('back', route('spk.admin', $getProjek->nama_projek))
@section('breadcrumb', 'SPK')
@section('breadcrumb2', 'Tambah Cicilan SPK')
@section('content')


    <div class="card">
        <div class="card-header">
            <a href="{{ route('spk.admin', [$getProjek->nama_projek]) }}" class="btn btn-outline-danger"><i
                    class="fa fa-arrow-left" aria-hidden="true"></i></a> Tambah Cicilan SPK
        </div>
        <div class="card-body">
            <form
                action="{{ route('editCicilanSPKAction.admin', [$getProjek->nama_projek, Crypt::encrypt($getSPK->id_spk)]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Rincian Tagihan yang Tersedia
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
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

                                                <tr>
                                                    <td scope="row">{{ $noTagihan++ }}</td>
                                                    <td>Rp. {{ rupiah($cicilanSPK->pembayaran_cs) }}</td>
                                                    <td>
                                                        @if ($cicilanSPK->status_cs == 'belum')
                                                            <i class="fa fa-times"
                                                                aria-hidden="true"></i>
                                                        @else
                                                            <i class="fa fa-check"
                                                                aria-hidden="true"></i>
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

                                        @empty
                                            <tr>
                                                <td colspan="3">No data available</td>
                                            </tr>
                                        @endforelse
                                        <tr>
                                            <td colspan="3"> <b>Total Tagihan: </b></td>
                                            <td colspan="2">
                                               Rp. {{ rupiah($sumTagihan) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Display the sum of payments -->

                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                  <label for="">Tagihan</label>
                  <input type="text" name="tagihan_cs" id="" pattern="[0-9]*" class="form-control" value="{{ $firstCicilanSPK->sisa_cs }}" placeholder="masukan cicilan SPK" aria-describedby="helpId">

                </div>
                <div class="form-group">
                  <label for="">Bukti Pembayaran</label>
                  <input type="file" name="img_cs" id="" class="form-control" id="img_cs" placeholder="" aria-describedby="helpId" accept="image/*" onchange="previewImage(event)">

                  <div id="imagePreview"></div>
                </div>



                <div class="form-group">
                    <label for="">Tanggal Bayar</label>
                    <input type="date" name="tgl_bayar_cs" id="tgl_bayar_cs" class="form-control" placeholder="" aria-describedby="helpId" value="{{ date('Y-m-d') }}">

                </div>

                <button type="submit" class="btn btn-outline-info">Submit</button>
            </form>

        </div>
        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('imagePreview');
                    output.innerHTML = '<img src="' + reader.result + '" style="max-width: 200px; max-height: 200px;" />';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
            </script>

    @endsection

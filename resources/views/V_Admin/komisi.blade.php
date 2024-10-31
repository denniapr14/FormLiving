@extends('V_Admin.app')

@extends('flashdata')
@section('title', 'Form One | Komisi')
@section('pageTitle', 'Komisi')
{{--  @section('back', route('suratPemesananRumah.admin', [$getProjek->nama_projek]))  --}}
@section('breadcrumb', 'Komisi')

@section('content')

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pembayaran-tab" data-toggle="tab" href="#pembayaran" role="tab"
                aria-controls="pembayaran" aria-selected="true">Pembayaran</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="komisi-tab" data-toggle="tab" href="#komisi" role="tab" aria-controls="komisi"
                aria-selected="false">Komisi</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="pembayaran" role="tabpanel" aria-labelledby="pembayaran-tab">
            <!-- Konten Pembayaran -->
            <div class="card">
                <div class="card-body">
                    <h3>Pembayaran</h3>
                    <!-- Tambahkan tabel atau konten pembayaran di sini -->
                    <table id="pembayaranTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>

                                <th>Rumah</th>
                                <th>Persentase Pembayaran</th>
                                @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'StafAcc')
                                    <th>Aksi</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            @if ($getDataPembayaranPersentase == null)
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data</td>
                                </tr>
                            @else
                                @foreach ($getDataPembayaranPersentase as $item)
                                    @php
                                        $percentage = 0;
                                    @endphp

                                    <tr>
                                        <td>{{ $item->blok }} - {{ $item->nomor }}</td>

                                        <td>
                                            @if ($item->total_harga_pr == $item->total_sisa_pr)
                                                <div class="progress" style="height: 30px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                </div>
                                            @else
                                                @php
                                                    $percentage =
                                                        (($item->total_harga_pr - $item->total_sisa_pr) /
                                                            $item->total_harga_pr) *
                                                        100;
                                                @endphp
                                                <div class="progress" style="height: 30px;">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ $percentage }}%;"
                                                        aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                        aria-valuemax="100">{{ number_format($percentage) }}%</div>
                                                </div>
                                            @endif
                                        </td>
                                        @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'StafAcc')
                                            <td>
                                                @if ($percentage > 35 && $percentage <= 70 && !$getKomisi->contains('id_formulir', $item->id_formulir))
                                                <a href="{{ route('addKomisi.admin', [$getProjek->nama_projek, $item->id_formulir]) }}"
                                                    class="btn btn-outline-primary btn-sm">Buat Komisi</a>
                                            @endif

                                            @foreach ($getKomisi as $komisi)
                                                @if ($komisi->id_formulir == $item->id_formulir)
                                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#editKomisiModal{{ $komisi->id_komisi }}">
                                                        Edit Komisi
                                                    </button>

                                                    <!-- Edit Komisi Modal -->
                                                    <div class="modal fade" id="editKomisiModal{{ $komisi->id_komisi }}" tabindex="-1" role="dialog" aria-labelledby="editKomisiModalLabel{{ $komisi->id_komisi }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editKomisiModalLabel{{ $komisi->id_komisi }}">Edit Komisi</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('editKomisi.admin', [$getProjek->nama_projek, Crypt::encrypt($komisi->id_komisi)]) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                <div class="modal-body">
                                                                    <!-- Modal content goes here -->
                                                                        <div class="form-group">
                                                                            <label for="editFormulirPesanan{{ $komisi->id_komisi }}">Formulir Pesanan</label>
                                                                            <select class="form-control" id="editFormulirPesanan{{ $komisi->id_komisi }}" name="formulirPesanan">
                                                                                <option value="{{ $komisi->id_formulir }}">{{ $komisi->blok }} - {{ $komisi->nomor }}</option>
                                                                                <!-- Add options dynamically from the server -->
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="editTotalKomisi1{{ $komisi->id_komisi }}"> Komisi 1 Rp. {{ rupiah($komisi->total_komisi1) }}</label>
                                                                            <select class="form-control" id="editTotalKomisi1{{ $komisi->id_komisi }}" name="komisi1">
                                                                                <option value="0" {{ $komisi->komisi1 == null ? 'selected' : '' }}>Belum</option>
                                                                                <option value="{{ $komisi->total_komisi1 }}" {{ $komisi->komisi1 != null ? 'selected' : '' }}>Sudah</option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="editTotalKomisi2{{ $komisi->id_komisi }}">Komisi 2 Rp. {{ rupiah($komisi->total_komisi2) }}</label>
                                                                            <select class="form-control" id="editTotalKomisi2{{ $komisi->id_komisi }}" name="komisi2">
                                                                                <option value="0" {{ $komisi->komisi2 == null ? 'selected' : '' }}>Belum</option>
                                                                                <option value="{{ $komisi->total_komisi2 }}" {{ $komisi->komisi2 != null ? 'selected' : '' }}>Sudah</option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="editTotalKomisi3{{ $komisi->id_komisi }}">Komisi 3 Rp. {{ rupiah($komisi->total_komisi3) }}</label>
                                                                            <select class="form-control" id="editTotalKomisi3{{ $komisi->id_komisi }}" name="komisi3">
                                                                                <option value="0" {{ $komisi->komisi3 == null ? 'selected' : '' }}>Belum</option>
                                                                                <option value="{{ $komisi->total_komisi3 }}" {{ $komisi->komisi3 != null ? 'selected' : '' }}>Sudah</option>

                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <p>Data pembayaran...</p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="komisi" role="tabpanel" aria-labelledby="komisi-tab">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <h3>Komisi</h3>
                        {{--  @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'StafAcc')
                            <button type="button" class="btn btn-secondary" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fa fa-plus" aria-hidden="true"></i> Tambah Komisi
                            </button>
                        @endif  --}}
                    </div>

                    <table id="komisiTable" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Rumah</th>
                                <th>Komisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($getKomisi as $komisi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $komisi->blok }} - {{ $komisi->nomor }} </td>

                                    <td>
                                        <div class="accordion" id="accordionKomisi">
                                            <div class="card">
                                                <div class="card-header" id="heading{{ $komisi->id_komisi }}">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                            data-target="#collapse{{ $komisi->id_komisi }}"
                                                            aria-expanded="true"
                                                            aria-controls="collapse{{ $komisi->id_komisi }}">
                                                            Detail Komisi
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapse{{ $komisi->id_komisi }}" class="collapse"
                                                    aria-labelledby="heading{{ $komisi->id_komisi }}"
                                                    data-parent="#accordionKomisi">
                                                    <div class="card-body">

                                                        <strong>Nama Pelanggan :</strong> {{ $komisi->nama_plgn }}<br>
                                                        <strong>Sales :</strong> {{ $komisi->nama_ua }}<br>
                                                        <strong>Total Komisi 1:</strong> Rp.
                                                        {{ $komisi->total_komisi1 ? rupiah($komisi->total_komisi1) : 'Loading...' }}
                                                        @if ($komisi->komisi1)
                                                            <i class="fa fa-check-circle text-success"
                                                                aria-hidden="true"></i>
                                                        @else
                                                            <i class="fa fa-exclamation-circle text-danger"
                                                                aria-hidden="true"></i>
                                                        @endif
                                                        <br>
                                                        <strong>Total Komisi 2:</strong> Rp.
                                                        {{ $komisi->total_komisi2 ? rupiah($komisi->total_komisi2) : 'Loading...' }}
                                                        @if ($komisi->komisi2)
                                                            <i class="fa fa-check-circle text-success"
                                                                aria-hidden="true"></i>
                                                        @else
                                                            <i class="fa fa-exclamation-circle text-danger"
                                                                aria-hidden="true"></i>
                                                        @endif
                                                        <br>
                                                        <strong>Total Komisi 3:</strong> Rp.
                                                        {{ $komisi->total_komisi3 ? rupiah($komisi->total_komisi3) : 'Loading...' }}
                                                        @if ($komisi->komisi3)
                                                            <i class="fa fa-check-circle text-success"
                                                                aria-hidden="true"></i>
                                                        @else
                                                            <i class="fa fa-exclamation-circle text-danger"
                                                                aria-hidden="true"></i>
                                                        @endif
                                                        <br>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#editKomisi{{ $komisi->id_komisi }}">
                                            Edit Komisi
                                        </button>

                                        <!-- Edit Komisi Modal -->
                                        <div class="modal fade" id="editKomisi{{ $komisi->id_komisi }}" tabindex="-1" role="dialog" aria-labelledby="editKomisiModalLabel{{ $komisi->id_komisi }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editKomisiModalLabel{{ $komisi->id_komisi }}">Edit Komisi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('editKomisi.admin', [$getProjek->nama_projek, Crypt::encrypt($komisi->id_komisi)]) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                    <div class="modal-body">
                                                        <!-- Modal content goes here -->
                                                            <div class="form-group">
                                                                <label for="editFormulirPesanan{{ $komisi->id_komisi }}">Formulir Pesanan</label>
                                                                <select class="form-control" id="editFormulirPesanan{{ $komisi->id_komisi }}" name="formulirPesanan">
                                                                    <option value="{{ $komisi->id_formulir }}">{{ $komisi->blok }} - {{ $komisi->nomor }}</option>
                                                                    <!-- Add options dynamically from the server -->
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="editTotalKomisi1{{ $komisi->id_komisi }}"> Komisi 1 Rp. {{ rupiah($komisi->total_komisi1) }}</label>
                                                                <select class="form-control" id="editTotalKomisi1{{ $komisi->id_komisi }}" name="komisi1">
                                                                    <option value="0" {{ $komisi->komisi1 == null ? 'selected' : '' }}>Belum</option>
                                                                    <option value="{{ $komisi->total_komisi1 }}" {{ $komisi->komisi1 != null ? 'selected' : '' }}>Sudah</option>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editTotalKomisi2{{ $komisi->id_komisi }}">Komisi 2 Rp. {{ rupiah($komisi->total_komisi2) }}</label>
                                                                <select class="form-control" id="editTotalKomisi2{{ $komisi->id_komisi }}" name="komisi2">
                                                                    <option value="0" {{ $komisi->komisi2 == null ? 'selected' : '' }}>Belum</option>
                                                                    <option value="{{ $komisi->total_komisi2 }}" {{ $komisi->komisi2 != null ? 'selected' : '' }}>Sudah</option>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editTotalKomisi3{{ $komisi->id_komisi }}">Komisi 3 Rp. {{ rupiah($komisi->total_komisi3) }}</label>
                                                                <select class="form-control" id="editTotalKomisi3{{ $komisi->id_komisi }}" name="komisi3">
                                                                    <option value="0" {{ $komisi->komisi3 == null ? 'selected' : '' }}>Belum</option>
                                                                    <option value="{{ $komisi->total_komisi3 }}" {{ $komisi->komisi3 != null ? 'selected' : '' }}>Sudah</option>

                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
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

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Komsisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal content goes here -->
                    <p>Settings content...</p>
                    <form>
                        <div class="form-group">
                            <label for="formulirPesanan">Formulir Pesanan</label>
                            <select class="form-control" id="formulirPesanan" name="formulirPesanan">
                                <option value="">Select Formulir Pesanan</option>
                                <!-- Add options dynamically from the server -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hargaRumah">Harga Rumah</label>
                            <input type="number" class="form-control" id="hargaRumah" name="hargaRumah"
                                placeholder="Enter Harga Rumah">
                        </div>
                        <div class="form-group">
                            <label for="komisiRumah">Komisi Rumah (1%)</label>
                            <input type="number" class="form-control" id="komisiRumah" name="komisiRumah" readonly>
                        </div>
                        <div class="form-group">
                            <label for="totalKomisi1">Total Komisi 1 (35%)</label>
                            <input type="number" class="form-control" id="totalKomisi1" name="totalKomisi1" readonly>
                        </div>
                        <div class="form-group">
                            <label for="totalKomisi2">Total Komisi 2 (30%)</label>
                            <input type="number" class="form-control" id="totalKomisi2" name="totalKomisi2" readonly>
                        </div>
                        <div class="form-group">
                            <label for="totalKomisi3">Total Komisi 3 (30%)</label>
                            <input type="number" class="form-control" id="totalKomisi3" name="totalKomisi3" readonly>
                        </div>
                    </form>

                    <script>
                        document.getElementById('hargaRumah').addEventListener('input', function() {
                            var hargaRumah = parseFloat(this.value) || 0;
                            var komisiRumah = hargaRumah * 0.01;
                            document.getElementById('komisiRumah').value = komisiRumah.toFixed(0);

                            var totalKomisi1 = komisiRumah * 0.35;
                            var totalKomisi2 = komisiRumah * 0.30;
                            var totalKomisi3 = komisiRumah * 0.30;

                            document.getElementById('totalKomisi1').value = totalKomisi1.toFixed(0);
                            document.getElementById('totalKomisi2').value = totalKomisi2.toFixed(0);
                            document.getElementById('totalKomisi3').value = totalKomisi3.toFixed(0);
                        });
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#komisiTable').DataTable();
        });
        $(document).ready(function() {
            $('#pembayaranTable').DataTable();
        });
    </script>
@endsection

@extends('V_Admin.app')

@extends('flashdata')
@section('title','Forms| Gambar Kerja')
@section('pageTitle','Gambar Kerja')
@section('back',route('gambarKerja.admin',[$getProjek->nama_projek]) )
@section('breadcrumb','Gambar Kerja')
{{--  @section('breadcrumb2','Tambah Produk')  --}}
@section('content')

    <!-- start: main -->
    <style>
        @media (max-width: 500px) {
            #rumahMobile {
                display: block;
            }

            #rumahPC {
                display: none;
            }
        }

        @media (min-width: 501px) {
            #rumahMobile {
                display: none;
            }

            #rumahPC {
                display: block;
            }
        }

    </style>


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->



    <div class="">
        <div class="card" id="rumahPC">

            <div class="card-body">
                <div class="card-title">
                    <table style="width: 100%">
                        <tr>
                            <td> <i class="bi bi-house-fill"></i>
                                <span>Gambar Kerja {{ $getProjek->nama_projek }}</span>
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
                                <th class="th-table" style="width: 40%">Detail</th>
                                <th class="th-table" style="width: 10%">Status</th>
                                <th class="th-table" style="width: 35%">Pengaturan</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($getRumah as $rumah)
                                <tr class="tr-table">
                                    <td class="td-table">{{ $no }}</td>
                                    <td class="td-table">{{ $rumah->nama_cluster }} / {{ $rumah->blok }} -
                                        {{ $rumah->nomor }}
                                        @if ($rumah->img_rumah != null)
                                            <button type="button" class="btn btn-outline-gl" data-toggle="modal"
                                                data-target=".bd-example-modal-lg{{ $no }}"><i
                                                    class="fas fa-image    "></i></button>

                                            <div class="modal fade bd-example-modal-lg{{ $no }}" tabindex="-1"
                                                role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <img src="{{ url('Home') }}/images/rumah/{{ $rumah->img_rumah }}"
                                                            style="width: 100%" class="img-fluid" alt="Responsive image"
                                                            alt="product-1">

                                                    </div>
                                                </div>
                                            </div>
                                        @endif


                                    </td>
                                    <td class="td-table">
                                        <div id="accordian-3">
                                            <div class="card">
                                                <a class="card-header" id="heading11">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                                        <h5 class="m-b-0">Detail Gambar Kerja</h5>
                                                    </button>
                                                </a>
                                                <div id="collapse1" class="collapse" aria-labelledby="heading11" data-parent="#accordian-3" style="">
                                                    <div class="card-body">
                                                               <p>
                                                                Gambar Kerja : {{ $rumah->nama_cluster }} / {{ $rumah->blok }} -
                                                                {{ $rumah->nomor }} <a href="path/to/your/file.zip" class="btn btn-outline-info" download="filename.zip" ><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            </p>
                                                            <p>Keterangan :</p>
                                                            Tambahan Cat

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                    <td class="td-table">progress</td>
                                    @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'AdminAdv')
                                        <td class="td-table">


                                            @if ($rumah->status != 'Available')
                                            @else
                                                <a href="{{ route('tipeRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($rumah->id_rumah)]) }}"
                                                    class="btn btn-outline-info"><i class="fas fa-book    "></i><span
                                                        class="badge badge-pill badge-info">
                                                        {{ $rumah->countTipe }}</span></a>
                                            @endif

                                            <a href="{{ route('updateRumah.admin', [$getProjek->nama_projek, $rumah->id_rumah]) }}"
                                                class="btn btn-outline-info">
                                              <i class="fas fa-pencil-alt    "></i>
                                            </a>


                                        </td>
                                    @else
                                        <td class="td-table">


                                            <a href="{{ route('tipeRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($rumah->id_rumah)]) }}"
                                                class="btn btn-outline-gl"><i class="fas fa-book    "></i> aa<span
                                                    class="badge badge-pill badge-info">
                                                    {{ $rumah->countTipe }}</span></a>




                                        </td>
                                    @endif

                                </tr>
                                <?php
                                $no++;
                                ?>
                            @endforeach

                        </tbody>
                    </table>

                </div>



            </div>


        </div>

        <div class="card" id="rumahMobile">
            <div class="card-body">
                <div class="card-title">
                    <table style="width: 100%">
                        <tr>
                            <td> <i class="bi bi-house-fill"></i>
                                <span>Gambar Kerja {{ $getProjek->nama_projek }}</span>
                            </td>
                            <td>
                                <div class="float-right">
                                    @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'AdminAdv')
                                        <a href="/tambah-rumah-admin/{{ $getProjek->nama_projek }}"
                                            class="btn btn-outline-info" style="float: right"> <i class="fas fa-plus    "></i>
                                            Rumah</a>
                                    @else
                                        <!-- You can add additional content or styling for the non-admin case if needed -->
                                    @endif
                                </div>

                            </td>
                        </tr>
                    </table>
                </div>

                <div class="table-responsive">
                    <center>
                        <table id="rumah-mobile" class="table">
                            <thead>
                                <tr>
                                    <th></th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($getRumah as $rumah)
                                    <tr style="border: none">
                                        <td style="border: none">
                                            <center>
                                                <div class="row w-100">
                                                    <div class="">
                                                        <div class="mycard">
                                                            <div class="">
                                                                <span class="p-2"> <b> {{ $rumah->nama_cluster }} / {{ $rumah->blok }} -
                                                                    {{ $rumah->nomor }}</b>

                                                                </span><br>
                                                                <div id="accordian-3">
                                                                    <div class="card">
                                                                        <a class="card-header" id="heading11">
                                                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse1">
                                                                                <h5 class="m-b-0">Detail Gambar Kerja</h5>
                                                                            </button>
                                                                        </a>
                                                                        <div id="collapse2" class="collapse" aria-labelledby="heading11" data-parent="#accordian-3" style="">
                                                                            <div class="card-body">
                                                                                       <p>
                                                                                        Gambar Kerja : {{ $rumah->nama_cluster }} / {{ $rumah->blok }} -
                                                                                        {{ $rumah->nomor }} <a href="path/to/your/file.zip" class="btn btn-outline-info" download="filename.zip" ><i class="fa fa-download" aria-hidden="true"></i></a>
                                                                                    </p>
                                                                                    <p>Status : Progress</p>
                                                                                    <p>Keterangan :</p>
                                                                                    Tambahan Cat

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <center>
                                                                    <table>
                                                                        <tr>
                                                                            @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'AdminAdv')
                                                                                <td class="td-table">
                                                                                    @if ($rumah->status != 'Available')
                                                                                    @else
                                                                                        <a href="{{ route('tipeRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($rumah->id_rumah)]) }}"
                                                                                            class="btn btn-outline-info">
                                                                                            <i class="fa fa-book" aria-hidden="true"></i>
                                                                                            <span
                                                                                                class="badge badge-pill badge-info">
                                                                                                {{ $rumah->countTipe }}</span></a>
                                                                                    @endif

                                                                                    <a href="{{ route('updateRumah.admin', [$getProjek->nama_projek, $rumah->id_rumah]) }}"
                                                                                        class="btn btn-outline-info">
                                                                                        <i class="fas fa-pencil-alt    "></i>
                                                                                    </a>
                                                                                </td>
                                                                            @else
                                                                                <td class="td-table">
                                                                                    <a href="{{ route('tipeRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($rumah->id_rumah)]) }}"
                                                                                        class="btn btn-outline-info">
                                                                                        <i class="fa fa-book" aria-hidden="true"></i>
                                                                                        <span
                                                                                            class="badge badge-pill badge-info">
                                                                                            {{ $rumah->countTipe }}</span></a>
                                                                                </td>
                                                                            @endif
                                                                        </tr>
                                                                    </table>
                                                                </center>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </center>
                                        </td>


                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </center>

                </div>

            </div>

        </div>
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

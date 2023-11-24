@extends('V_Admin.app')

@extends('flashdata')

@section('tittle', 'FORMS | Dashboard')

@section('content')

    <!-- start: main -->

    <style>
        {{--  @media (max-width: 500px) {
            #rumah-mobile {
                display: block;
            }

            #rumah {
                display: none;
            }
        }

        @media (min-width: 501px) {
            #rumah-mobile {
                display: none;
            }

            #rumah {
                display: block;
            }
        }  --}} table {
            width: 100%;
            border-collapse: collapse;
        }


        .th-table,
        .td-table {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        /* Styles for smaller screens */
        @media (max-width: 500px) {



            .th-table {
                display: none;
            }

            .td-table {
                width: 100%;

            }

            .tr-table {
                border: 2px;
                padding: 1rem 1rem 1rem 1rem;
            }

            /* Add additional styling as needed for the card layout */
            /* For example, you can add margin, padding, background color, etc. */
        }
    </style>


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->



    <div class="">
        <div class="card">

            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <!-- House Information (Left) -->
                        <div class="col-md-6">
                            <div>
                                <i class="bi bi-house-fill"></i>
                                <span>Rumah Projek {{ $getProjek->nama_projek }}</span>
                            </div>
                        </div>

                        <!-- Button Section (Right) -->
                        <div class="col-md-6 text-md-right mt-2 mt-md-0" style="float: right">
                            @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'AdminAdv')
                                <a href="/tambah-rumah-admin/{{ $getProjek->nama_projek }}" class="btn btn-outline-primary" style="float: right"> <i
                                        class="bi bi-plus"></i> Rumah</a>
                            @else
                                <!-- You can add additional content or styling for the non-admin case if needed -->
                            @endif
                        </div>
                    </div>
                </div>



                <div class="table-responsive">

                    <table id="rumah" class="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width: 1rem">No</th>
                                <th style="width: 40%">Tipe Rumah</th>
                                <th style="width: 5%">Luas <br> Tanah</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 35%">Pengaturan</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($getRumah as $rumah)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $rumah->nama_cluster }} / {{ $rumah->blok }} - {{ $rumah->nomor }}
                                        @if ($rumah->img_rumah != null)
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
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
                                    <td>{{ $rumah->luas_tanah }}</td>
                                    <td>{{ $rumah->status }}</td>
                                    @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'AdminAdv')
                                        <td>


                                            @if ($rumah->status != 'Available')
                                            @else
                                                <a href="{{ route('tipeRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($rumah->id_rumah)]) }}"
                                                    class="btn btn-outline-info"><i class="bi bi-book-fill"></i><span
                                                        class="badge badge-pill badge-info">
                                                        {{ $rumah->countTipe }}</span></a>
                                            @endif

                                            <a href="{{ route('updateRumah.admin', [$getProjek->nama_projek, $rumah->id_rumah]) }}"
                                                class="btn btn-outline-info">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>


                                        </td>
                                    @else
                                        <td>


                                            <a href="{{ route('tipeRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($rumah->id_rumah)]) }}"
                                                class="btn btn-outline-info"><i class="bi bi-book-fill"></i> aa<span
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

        {{--  <div class="card">
            <div class="table-responsive">

                <table id="rumah-mobile" class="table">
                    <thead>
                        <tr>
                            <th></th>


                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td>
                                <div class="row w-100">
                                    @foreach ($getRumah as $rumah)
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-tittle">
                                                        {{ $rumah->nama_cluster }} / {{ $rumah->blok }} -
                                                        {{ $rumah->nomor }}
                                                    </h5>
                                                    <label for="">{{ $rumah->luas_tanah }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </td>


                        </tr>


                    </tbody>
                </table>

            </div>
        </div>  --}}
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

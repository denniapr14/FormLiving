@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('flashdata')
@extends('V_Admin.footer')

@section('tittle', 'FORMS | Dashboard')

@section('content')

    <!-- start: main -->


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->
    <div class="content__wrapper">


        <div class="content__row mb-3">
            <div class="card__box">

                <div class="card__header">
                    <div class="card__title">
                        <i class="bi bi-house-fill"></i>
                        <span>Rumah Projek {{ $getProjek->nama_projek }}</span>
                    </div>

                    <div class="invoices__actions">
                        @if (
                            $user->kategori == 'SuperAdmin' ||
                            $user->kategori == 'AdminAccounting' ||
                            $user->kategori == 'AdminAdv'


                        )
                            <a href="/tambah-rumah-admin/{{ $getProjek->nama_projek }}"
                                class="btn-fd-outline btn--small">Tambah Rumah</a>
                        @else
                        @endif
                    </div>
                </div>

                <div class="table-responsive">

                    <table id="rumah" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe Rumah</th>
                                <th>Luas <br> Tanah</th>
                                <th>Status</th>

                                    <th>Pengaturan</th>


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
                                        <button type="button" class="btn-fd-icon-outline" data-toggle="modal" data-target=".bd-example-modal-lg{{ $no }}"><i class="fas fa-image    "></i></button>

                                        <div class="modal fade bd-example-modal-lg{{ $no }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <img src="{{ url('Home') }}/images/rumah/{{ $rumah->img_rumah }}" style="width: 100%" class="img-fluid" alt="Responsive image"
                                                                                                    alt="product-1">

                                            </div>
                                        </div>
                                        </div>
                                        @endif


                                       </td>
                                    <td>{{ $rumah->luas_tanah }}</td>
                                    <td>{{ $rumah->status }}</td>
                                    @if (
                                    $user->kategori == 'SuperAdmin' ||
                                    $user->kategori == 'AdminAccounting'||
                                    $user->kategori == 'AdminAdv'
                                )
                                        <td>

                                            <div class="d-flex flex-nowrap">
                                                <a href="{{ route('tipeRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($rumah->id_rumah)]) }}"
                                                    class="btn btn-outline-info"><i class="bi bi-book-fill"></i><span class="badge badge-pill badge-info">
                                                        {{ $rumah->countTipe }}</span></a>
                                                <a href="{{ route('updateRumah.admin', [$getProjek->nama_projek, $rumah->id_rumah]) }}"
                                                    class="btn btn-outline-info">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>



                                            </div>
                                        </td>
                                    @else
                                    <td>

                                        <div class="d-flex flex-nowrap">
                                            <a href="{{ route('tipeRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($rumah->id_rumah)]) }}"
                                                class="btn btn-outline-info"><i class="bi bi-book-fill"></i><span class="badge badge-pill badge-info">
                                                    {{ $rumah->countTipe }}</span></a>



                                        </div>
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
                $('#rumah').DataTable(
                    {
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
                        columnDefs: [
                            { targets: 3, type: 'string' } // Kolom "Status" akan diurutkan sebagai string
                        ],
                        order: [[3, 'asc']] // Kolom "Status" diurutkan secara ascending (A ke Z)
                    }
                );
            });
        </script>

    @endsection

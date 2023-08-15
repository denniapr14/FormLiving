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
                        @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting')
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
                                @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting')
                                    <th>Pengaturan</th>
                                @else
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($getRumah as $rumah)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $rumah->nama_cluster }} / {{ $rumah->blok }} - {{ $rumah->nomor }}</td>
                                    <td>{{ $rumah->luas_tanah }}</td>
                                    <td>{{ $rumah->status }}</td>
                                    @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting')
                                        <td>

                                            <div class="d-flex flex-nowrap">
                                                <a href="{{ route('tipeRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($rumah->id_rumah)]) }}"
                                                    class="btn btn-outline-info"><i class="bi bi-book-fill"></i><span class="badge badge-pill badge-info">
                                                        {{ $rumah->countTipe }}</span></a>
                                                <a href="{{ route('updateRumah.admin', [$getProjek->nama_projek, $rumah->id_rumah]) }}"
                                                    class="btn btn-outline-info">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('deleteRumah.admin', [$getProjek->nama_projek, $rumah->id_rumah]) }}" class="btn btn-outline-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>


                                            </div>
                                        </td>
                                    @else
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
                $('#rumah').DataTable();
            });
        </script>

    @endsection

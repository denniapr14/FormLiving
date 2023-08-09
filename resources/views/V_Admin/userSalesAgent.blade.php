@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('flashdata')
@extends('V_Admin.footer')
@section('tittle', 'FORMS | Sales Agent')

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
                        <i class="bi bi-people-fill"></i>
                        <span>User Sales/Agent</span>

                    </div>

                </div>
                <div class="table-responsive">
                    <table id="list-user" class="table">
                        <thead>
                            <tr>
                                <th>No</th>

                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Tanggal Daftar</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($getUserSales as $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <span class="client__name">{{ $user->nama_ua }}</span>
                                        <span class="client__handled"> Kode</span>
                                    </td>

                                    <td>
                                        {{ $user->kategori }}
                                    </td>
                                    <td>
                                        {{ date('d M Y', strtotime($user->tgl_input_ua)) }}
                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <!-- end: content -->

        <!-- start: footer -->
        <section class="footer mt-3">
            <div class="content__row">
                <div class="col-12 p-0">
                    <div class="card__box">
                        <p class="m-0">Designed by <a class="footer__link" title="Wolftagon"
                                href="https://www.wolftagon.com/">Wolftagon</a></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: footer -->
    </div>

    <!-- end: main -->



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
            $('#list-user').DataTable();
        });
    </script>



@endsection

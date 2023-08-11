@extends('AdminFormsLiving.app')
@extends('AdminFormsLiving.sidebar')
@extends('AdminFormsLiving.footer')
@extends('flashdata')
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
                            <i class="bi bi-people-fill"></i>
                          <span>List User Pendaftar Forms Living</span>
                          <a style="position :absolute; right:10px;" href="/AdminFormsLiving/download-user" class="btn btn-success">
                            <i class="bi bi-download"></i> Download List User
                            </a>
                        </div>
                      </div>
                    <div class="table-responsive">
                        <table id="listUser" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>

                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
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
                                            <span class="client__handled"> {{ $user->code_id_ua }}</span>
                                        </td>
                                        <td>
                                            <span class="client__name">{{ $user->email_ua }}</span>
                                        </td>
                                        <td>
                                            <span class="client__name">{{ $user->no_tlp_ua }}</span>
                                        </td>
                                        <td>
                                           {{ $user->kategori }}
                                        </td>

                                        <td>
                                            {{ date("d M Y", strtotime($user->tgl_input_ua)) }}
                                        </td>


                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <!-- end: content -->


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
            $('#listUser').DataTable();
        });
        $(document).ready(function() {
            $('#rumah').DataTable();
        });

    </script>



@endsection

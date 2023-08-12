@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('flashdata')
@extends('V_Admin.footer')
@section('tittle', 'FORMS | Sales Agent')

@section('content')

<div class="content__wrapper">
    <div class="content__row mb-3">
        <div class="card__box">
            <div class="card__header">
                <div class="card__title">
                    <i class="bi bi-people-fill"></i>
                    <span>User Sales/Agent</span>
                    <a style="position :absolute; right:10px;" href="{{ route('downloadUserAdminSales.admin') }}" class="btn btn-success">
                        <i class="bi bi-download"></i> Download List User
                        </a>
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
                        @foreach ($getUserSales as $userSales)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <span class="client__name">{{ $userSales->nama_ua }}</span>
                                    <span class="client__handled"> Kode</span>
                                </td>

                                <td>
                                    {{ $userSales->kategori }}
                                </td>
                                <td>
                                    {{ tgl_indo(date('y-m-d', strtotime($userSales->tgl_input_ua))) }}
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
        $(document).ready(function() {
            $('#list-user').DataTable();
        });
        $(document).ready(function() {
            $('#rumah').DataTable();
        });

    </script>

@endsection

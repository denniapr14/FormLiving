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
                        @if ($user->kategori != 'AdminSales' && $user->kategori != 'AdminAgentCompany')
                        <a style="position :absolute; right:10px;" href="{{ route('downloadUserAdminSales.admin') }}"
                            class="btn btn-success">
                            <i class="bi bi-download"></i> Download List User Agent Atau Sales
                        </a>
                    @endif

                    </div>

                </div>
                <div class="table-responsive">
                    <table id="list-user" class="table">
                        <thead>
                            <tr>
                                <th>No</th>

                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Tanggal Daftar</th>
                                @if ($user->kategori == 'AdminSales' || $user->kategori == 'AdminAgentCompany')
                                    <th>Pengaturan</th>
                                @endif

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
                                        @if ($userSales->status_ua == "Aktif")
                                        <div class="p-3 mb-2 bg-primary text-white text-center rounded">{{ $userSales->status_ua }}</div>
                                        @else
                                        <div class="p-3 mb-2 bg-secondary text-white text-center rounded">{{ $userSales->status_ua }}</div>
                                        @endif

                                    </td>
                                    <td>
                                        {{ tgl_indo(date('y-m-d', strtotime($userSales->tgl_input_ua))) }}
                                    </td>
                                    @if ($user->kategori == 'AdminSales' || $user->kategori == 'AdminAgentCompany')
                                    <td>
                                        @php

                                        $status = ['Aktif','Nonaktif']

                                        @endphp
                                        @foreach ($status as $status)
                                        @if ($status != $userSales->status_ua)

                                        <a href="{{ route('changeStatusUser.admin', [$userSales->id_user_admin,$status]) }}" class="btn btn-outline-info"> {{ $status }}kan</a>
                                        @endif

                                        @endforeach
                                    </td>
                                @endif

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

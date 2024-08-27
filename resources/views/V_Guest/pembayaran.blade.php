@extends('V_Guest.app')

@extends('flashdata')
@section('title', 'Form One | Dashboard')
@section('pageTitle', 'Dashboard')
@section('back', route('dashboard.guest', [$getProjek->nama_projek]))
@section('breadcrumb', 'Dashboard')
{{-- @section('breadcrumb2', 'Ubah Rumah') --}}
@section('content')

    <div class="">
        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="">
                                    <center>

                                        Bulan ini
                                    </center>
                                </h6>
                                <h3>
                                    <center>
                                        <h4>{{ $getBillMonthNow->detail_pr }}</h4>
                                        Rp .{{ rupiah($getBillMonthNow->harga_pr) }}
                                        <br>
                                        @if ($getBillMonthNow->sisa_pr == 0)
                                            <i class="fa fa-check" class="text-success" aria-hidden="true"></i>
                                        @else
                                            <small class="text-danger" style="font-size: 16px">- Rp
                                                .{{ rupiah($getBillMonthNow->sisa_pr) }}</small>
                                        @endif

                                    </center>
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <h6 class="">
                                    <center>

                                        Bulan Depan
                                    </center>
                                </h6>
                                <h3>
                                    <center>
                                        <h4>{{ $getBillNextMonth->detail_pr }}</h4>
                                        Rp .{{ rupiah($getBillNextMonth->harga_pr) }}
                                        <br>
                                        @if ($getBillNextMonth->sisa_pr == 0)
                                            <i class="fa fa-check" class="text-success" aria-hidden="true"></i>
                                        @else
                                            <small class="text-danger" style="font-size: 16px">- Rp
                                                .{{ rupiah($getBillNextMonth->sisa_pr) }}</small>
                                        @endif

                                    </center>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tagihan Rumah</h3>
                    </div>
                    <div class="card-body">
                        <table class="  table table-responsive-lg" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tagihan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getBillPelanggan as $bill)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <h4>{{ $bill->detail_pr }}</h4>
                                            <p class="p-0">

                                                @if ($bill->sisa_pr == 0)
                                                Rp .{{ rupiah($bill->harga_pr) }}

                                                <i class="fa fa-check" class="text-success" aria-hidden="true"></i>
                                                @else
                                                Rp .{{ rupiah($bill->harga_pr) }}
                                                <br>
                                                <small class="text-danger">- Rp. {{ rupiah($bill->sisa_pr) }}</small>
                                            @endif
                                            </p>


                                        </td>
                                        <td>{{ tgl_indo($bill->tgl_pr) }}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

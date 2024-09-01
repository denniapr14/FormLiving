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
                        <h3 class="card-title">Forms</h3>
                    </div>
                    <div class="card-body">
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Tagihan</h3>
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
                                @if ($getBillMonthNow)
                                    <center>
                                        <h4>{{ ($getBillMonthNow->detail_pr) }}</h4>
                                        Rp .{{ rupiah($getBillMonthNow->harga_pr) }}
                                        <br>
                                        @if ($getBillMonthNow->sisa_pr == 0)
                                            <i class="fa fa-check" class="text-success" aria-hidden="true"></i>
                                        @else
                                            <small class="text-danger" style="font-size: 16px">- Rp .{{ rupiah($getBillMonthNow->sisa_pr) }}</small>
                                        @endif
                                    </center>
                                @else
                                    <center>
                                        <h4>Tidak ada tagihan</h4>
                                    </center>
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
                                @if ($getBillNextMonth)
                                <center>
                                    <h4>{{ ($getBillNextMonth->detail_pr) }}</h4>
                                Rp .{{ rupiah($getBillNextMonth->harga_pr) }}
                                <br>
                                @if ($getBillNextMonth->sisa_pr == 0)
                                    <i class="fa fa-check" class="text-success" aria-hidden="true"></i>
                                @else
                                <small class="text-danger" style="font-size: 16px">- Rp .{{ rupiah($getBillNextMonth->sisa_pr) }}</small>
                                @endif
                                @else
                                <center>
                                    <h4>Tidak ada tagihan</h4>
                                </center>
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
                        <h3 class="card-title">Proses Pembangunan Rumah</h3>
                        </div>
                        <div class="card-body">
                            <table class="w-100">
                                <tr>
                                    <td>1</td>
                                    <td style="width: "> <div class="card">
                                        <div class="card w-100">

                                                <h3 class="card-title">Rumah A - 11</h3>

                                            <div class="progress" style="height: 2rem">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>

                                        </div>

                                    </div></td>
                                </tr>
                            </table>


                        </div>
                </div>

            </div>
        </div>
    </div>

@endsection

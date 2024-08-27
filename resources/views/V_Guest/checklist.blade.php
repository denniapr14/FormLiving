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
                                <h6>
                                <center>
                                    Pembayaran Cicilan
                                    <br>
                                    Bulan ini
                                </center>
                            </h6>
                            <h3>
                                <center>
                                Rp. 10.000.000
                            </center>
                            </h3>
                            </div>
                            <div class="col-md-6">
                                <h6>
                                    <center>
                                        Pembayaran Cicilan
                                    <br>
                                    Bulan depan
                                    </center>
                                </h6>
                                <h3>
                                    <center>
                                        Rp. 10.000.000
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

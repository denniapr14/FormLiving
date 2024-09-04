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
                    <h3 class="card-title">Checklist</h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>
                                    <center>
                                        Pekerjaan Selesai
                                    </center>
                                </h6>
                                <h3>
                                    <center>
                                        {{ $countChecklistDone }}
                                    </center>
                                </h3>


                            </div>
                            <div class="col-md-6">
                                <h6>
                                    <center>
                                        Semua Pekerjaan
                                    </center>
                                </h6>
                                <h3>
                                    <center>
                                        {{ $countChecklist }}
                                    </center>
                                </h3>

                            </div>
                        </div>
                    </div>
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
                            <h4 class="">
                                <center>

                                    Bulan ini
                                </center>
                            </h4>
                            <h3>
                                @if ($getBillMonthNow)
                                <center>
                                    <h4>{{ ($getBillMonthNow->detail_pr) }}</h4>

                                    @if ($getBillMonthNow->sisa_pr == 0)
                                    <i class="fa fa-check" class="text-success" aria-hidden="true"></i>
                                    @else
                                    <h2 class="">Rp {{ rupiah($getBillMonthNow->sisa_pr) }}</h2>
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

                                    @if ($getBillNextMonth->sisa_pr == 0)
                                    <i class="fa fa-check" class="text-success" aria-hidden="true"></i>
                                    @else
                                    <h2 class="">Rp {{ rupiah($getBillNextMonth->sisa_pr) }}</h2>
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
                        @if (!empty($getChecklistAll))
                        @foreach($getChecklistAll as $checklist)
                        <tr>
                            <td></td>
                            <td style="width: ">
                                <div class="card">
                                    <div class="card w-100">
                                        <h3 class="card-title">{{ $checklist->blok }} - {{ $checklist->nomor }} /{{
                                            $checklist->nama_cluster }}</h3>
                                        <div class="progress" style="height: 2rem">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $checklist->percentase }}%;"
                                                aria-valuenow="{{ $checklist->percentase }}" aria-valuemin="0"
                                                aria-valuemax="100">{{ $checklist->percentase }}%</div>
                                        </div>
                                        <br>
                                        
                                    </div>
                                </div>
                            </td>


                        </tr>
                        @endforeach
                        @else
                        <h2>Anda Tidak Memiliki Rumah</h2>
                        @endif

                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
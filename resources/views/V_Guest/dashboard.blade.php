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

                       <div class="row">
                        @if (!empty($getChecklistAll))
                        @foreach($getChecklistAll as $checklist)
                        <div class="col-md-4 ">
                        <div class="card border rounded-md" style="width: 18rem;">
                            <center>
                            @if (!empty($checklist->foto))
                            {{--  <img src="{{ asset('Home/images/') }}/NoImg.jpg" class="card-img-top img-fluid" style="width: 100%" alt="">  --}}

                            <img src="{{ asset('Home/images/termin/' . $checklist->foto) }}" class="card-img-top img-fluid" style="width: 100%" alt="">
                            @else
                            <img src="{{ asset('Home/images/') }}/NoImg.jpg" class="card-img-top img-fluid" style="width: 100%" alt="">

                            @endif
                        </center>
                            <div class="card-body">
                              <h5 class="card-title">{{ $checklist->blok }} - {{ $checklist->nomor }} /{{
                                $checklist->nama_cluster }}</h5>

                                <div class="progress" style="height: 2rem">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{ $checklist->percentase }}%;"
                                        aria-valuenow="{{ $checklist->percentase }}" aria-valuemin="0"
                                        aria-valuemax="100">{{ $checklist->percentase }}%</div>
                                </div>
<br>
<a href="{{ route('listChecklist.guest', [$getProjek->nama_projek,Crypt::encrypt($checklist->id_rumah)]) }}" class="btn btn-outline-info"> <i
    class="fa fa-eye" aria-hidden="true"></i> Lihat
Proses</a>
                            </div>
                          </div>
                       </div>
                        @endforeach
                        @else
                        <h2>Rumah belum dibangun atau belum melakukan pembelian rumah</h2>
                        @endif
                    </div>



                </div>
            </div>

        </div>
    </div>
</div>

@endsection

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
                        <h3 class="card-title">Informasi Checklist</h3>
                    </div>
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
                                @foreach ($getChecklistAll as $checklist)
                                    <tr>

                                        <td style="width: ">
                                            <div class="card">
                                                <div class="card w-100">
                                                    <h3 class="card-title">{{ $checklist->blok }} - {{ $checklist->nomor }}
                                                        / {{ $checklist->nama_cluster }}</h3>
                                                    <div class="progress" style="height: 2rem">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $checklist->percentase }}%;"
                                                            aria-valuenow="{{ $checklist->percentase }}" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                            <h3>{{ $checklist->percentase }}%
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <center>
                                                                        <h5>Pengawas 1 </h5>
                                                                        <h3>
                                                                            {{ $checklist->pengawas1 }}

                                                                        </h3>
                                                                    </center>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <center>
                                                                        <h5>Pengawas 2 </h5>
                                                                        <h3>
                                                                            {{ $checklist->pengawas2 }}

                                                                        </h3>
                                                                    </center>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <center>
                                                                        <h5>Subkon </h5>
                                                                        <h3>
                                                                            {{ $checklist->nama_subkon }}

                                                                        </h3>
                                                                    </center>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <center>
                                                                        <h5>Pendamping </h5>
                                                                        <h3>
                                                                            Sunyoto

                                                                        </h3>
                                                                    </center>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <center>
                                                                <a href="{{ route('listChecklist.guest', [$getProjek->nama_projek,Crypt::encrypt($checklist->id_rumah)]) }}" class="btn btn-outline-primary"> <i
                                                                        class="fa fa-eye" aria-hidden="true"></i> Lihat
                                                                    Proses</a>
                                                            </center>
                                                        </div>
                                                    </div>




                                                </div>
                                            </div>
                                        </td>
                                        <td>

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

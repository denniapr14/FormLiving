@extends('V_Admin.app')
@extends('flashdata')
@section('title', 'Ubah SPK')
@section('pageTitle', 'Ubah SPK')
@section('back', route('spk.admin', $getProjek->nama_projek))
@section('breadcrumb', 'SPK')
@section('breadcrumb2', 'Ubah SPK')
@section('content')


    <div class="card">
        <div class="card-header">
            <a href="{{ route('spk.admin', [$getProjek->nama_projek]) }}" class="btn btn-outline-danger"><i
                    class="fa fa-arrow-left" aria-hidden="true"></i></a> Ubah Surat
        </div>
        <div class="card-body">
            <form action="{{ route('editSPKAction.admin', [$getProjek->nama_projek, Crypt::encrypt($getSPK->id_spk)]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="">Nomor SPK</label>
                    <input type="text" name="no_surat_spk" id="" class="form-control"
                        value="{{ $getSPK->no_surat_spk }}" placeholder="" aria-describedby="helpId">

                </div>

                @if ($user->kategori == 'CEO' || $user->kategori == 'SuperAdmin')
                    <div class="form-group">
                        <label for="">Pengawas</label>
                        <select name="req_pengawas" id="req_pengawas" class="form-control" style="width: 100%">
                            <option value="">--Pilih Pengawas--</option>
                            @foreach ($getPengawas as $pengawas)
                                <option value="{{ $pengawas->id_user_admin }}">{{ $pengawas->nama_ua }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <input type="text" name="req_pengawas" value="{{ $getSPK->id_req_pengawas }}" hidden>
                    <p></p>
                @endif


                @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminTeknik')
                    @if (!empty($getSPK->file_spk))
                        <p>
                            <b>
                                Berkas SPK :
                            </b>
                            {{ $getSPK->file_spk }} <a href="{{ asset('File/file_spk/' . $getSPK->file_spk) }}"
                                class="btn btn-outline-info"><i class="fa fa-download" aria-hidden="true"></i></a>
                        </p>
                    @endif

                    <div id="accordian-3">
                        <div class="card">
                            <a class="card-header" id="heading11">
                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#spk{{ $getSPK->id_spk }}" aria-expanded="false" aria-controls="collapse1">
                                    <h5 class="m-b-0"> Denah
                                    </h5>
                                </button>
                            </a>
                            <div id="spk{{ $getSPK->id_spk }}" class="collapse" aria-labelledby="heading11"
                                data-parent="#accordian-3" style="">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($getImageSPK as $imgSPK)
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <img src="{{ asset('File/denah_spk/' . $imgSPK->img_spk) }}"
                                                        style="width: 100%" class="img-fluid" alt="Image">
                                                    <div class="card-body">
                                                        <center>
                                                            <a href="#" class="btn btn-outline-info"
                                                                data-toggle="modal"
                                                                data-target="#viewModal{{ $imgSPK->id_img_spk }}"><i
                                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                                            <a href="#" class="btn btn-outline-info"
                                                                data-toggle="modal"
                                                                data-target="#editModal{{ $imgSPK->id_img_spk }}"><i
                                                                    class="fas fa-edit"></i></a>


                                                            <a href="{{ route('changeStatusImageSPK.admin', [$getProjek->nama_projek, Crypt::encrypt($imgSPK->id_img_spk), Crypt::encrypt('Nonaktif')]) }}"
                                                                class="btn btn-outline-danger"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i></a>
                                                        </center>

                                                    </div>

                                                </div>

                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    @if ($user->kategori == 'AdminTeknik' || $user->kategori == 'SuperAdmin')
                    <div class="form-group">
                        <label for="">Berkas Tambah Mutu</label>
                        <input type="file" name="file_spk" id="" value="" class="form-control"
                            placeholder="" aria-describedby="helpId">

                    </div>
                    @endif

                @else
                    @if (!empty($getSPK->file_spk))
                        <p>
                            <b>
                                Berkas SPK :
                            </b>
                            {{ $getSPK->file_spk }} <a href="{{ asset('File/file_spk/' . $getSPK->file_spk) }}"
                                class="btn btn-outline-info"><i class="fa fa-download" aria-hidden="true"></i></a>
                        </p>
                    @endif

                    <div id="accordian-3">
                        <div class="card">
                            <a class="card-header" id="heading11">
                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#spk{{ $getSPK->id_spk }}" aria-expanded="false"
                                    aria-controls="collapse1">
                                    <h5 class="m-b-0"> Denah
                                    </h5>
                                </button>
                            </a>
                            <div id="spk{{ $getSPK->id_spk }}" class="collapse" aria-labelledby="heading11"
                                data-parent="#accordian-3" style="">
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($getImageSPK as $imgSPK)
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <img src="{{ asset('File/denah_spk/' . $imgSPK->img_spk) }}"
                                                        style="width: 100%" class="img-fluid" alt="Image">
                                                    <div class="card-body">


                                                    </div>

                                                </div>

                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                @endif

                @if ($user->kategori == 'Arsitek' || $user->kategori == 'SuperAdmin')
                <div class="form-group">
                    <label for="denah">Denah Tambah Mutu</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id=""
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="denah[]">
                        <div class="input-group-append">
                            <button class="btn btn-primary " id="add-file" type="button">Add</button>
                        </div>
                    </div>

                </div>
                @endif


                @if ($user->kategori == 'CEO' || $user->kategori == 'SuperAdmin')
                    <div class="form-group">
                        <label for="">Subkon</label>
                        <select name="subkon" id="subkon" class="form-control" style="width: 100%">
                            <option value="">--Pilih Subkon--</option>
                            @foreach ($getSubkon as $subkon)
                                <option value="{{ $subkon->id_subkon }}">{{ $subkon->nama_subkon }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <input type="text" name="subkon" value="{{ $getSPK->id_subkon }}" hidden>
                    <p></p>
                @endif

                <div class="form-group">
                    <label for="">Keterangan Tambah Kurang</label>
                    <textarea name="keterangan" id="" class="form-control" cols="30" rows="2">{{ $getSPK->ket_tambah_bangunan }}</textarea>
                </div>

                <div id="accordian-3">
                    <div class="card">
                        <a class="card-header" id="heading11">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                data-target="#tagihan{{ $getSPK->id_spk }}" aria-expanded="false"
                                aria-controls="collapse1">
                                <h5 class="m-b-0"> Cicilan Tambah Kurang Bangunan
                                </h5>
                            </button>
                        </a>
                        <div id="tagihan{{ $getSPK->id_spk }}" class="collapse" aria-labelledby="heading11"
                            data-parent="#accordian-3" style="">
                            <div class="card-body">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tagihan</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $noCicilanSPK = 1;
                                        @endphp
                                        @foreach ($getCicilanSPK as $cicilanSPK)
                                            <tr>
                                                <td scope="row">{{ $noCicilanSPK }}</td>
                                                <td>Rp. {{ rupiah($cicilanSPK->pembayaran_cs) }}</td>
                                                <td>{{ tgl_indo($cicilanSPK->tgl_bayar_cs) }}</td>
                                                <td>
                                                    @if ($cicilanSPK->status_cs == 'belum')
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    @else
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php
                                                $noCicilanSPK++;
                                            @endphp
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                {{--  @if ($user->kategori == 'CEO')
                    <input type="text" name="status_spk" value="pembayaran" hidden>
                @else
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status_spk" class="form-control" id="">
                            <option value="{{ $getSPK->status_spk }}" selected> {{ $getSPK->status_spk }}</option>
                            <option value="pembayaran">Pembayaran</option>
                            <option value="selesai">Selesai</option>

                        </select>
                    </div>
                @endif  --}}

        </div>

        <button type="submit" class="btn btn-outline-success">Submit</button>

    </div>
    </form>

    </div>
    @foreach ($getImageSPK as $imgSPK)
        <div class="modal fade bd-example-modal-xl" id="viewModal{{ $imgSPK->id_img_spk }}" tabindex="-1"
            role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel">
                            View Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('File/denah_spk/' . $imgSPK->img_spk) }}" style="width: 100%"
                            class="img-fluid" alt="Image">
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $imgSPK->id_img_spk }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">
                            Edit Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form
                            action="{{ route('editImageSPKAction.admin', [$getProjek->nama_projek, Crypt::encrypt($imgSPK->id_img_spk)]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="">Gambar Denah</label>
                            <input type="file" name="imageDenah" class="form-control" id="img">
                            <button type="submit" class="btn btn-outline-secondary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    <script>
        $(document).ready(function() {
            // Add file input field
            $("#add-file").click(function() {
                var html =
                    `<div class="input-group mb-3"><input type="file" class="form-control" id="" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="denah[]"><div class="input-group-append"><button class="btn btn-primary add-file" type="button">Add</button><button class="btn btn-danger remove-file" type="button">Remove</button></div></div>`;
                $(this).closest('.form-group').append(html);
            });

            // Remove file input field
            $(document).on('click', '.remove-file', function() {
                $(this).closest('.input-group').remove();
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#req_pengawas').select2();
        });
        $(document).ready(function() {
            $('#subkon').select2();
        });
    </script>
    <script>
        // Initialize Select2
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

@endsection

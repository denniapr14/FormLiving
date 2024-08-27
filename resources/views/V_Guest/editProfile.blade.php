@extends('V_Guest.app')

@extends('flashdata')
@section('title', 'Form One | Dashboard')
@section('pageTitle', 'Dashboard')
@section('back', route('dashboard.guest', [$getProjek->nama_projek]))
@section('breadcrumb', 'Dashboard')
{{-- @section('breadcrumb2', 'Ubah Rumah') --}}
@section('content')


    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Proses Pembangunan Rumah</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('editUserPelangganAction.guest', $getProjek->nama_projek) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama_plgn">Nama</label>
                                <input type="text" class="form-control" id="nama_plgn" name="nama_plgn"
                                    value="{{ $userPelanggan->nama_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="username_plgn">Username</label>
                                <input type="text" class="form-control" id="username_plgn" name="username_plgn" readonly
                                    value="{{ $userPelanggan->username_plgn }}">
                            </div>

                            <div class="form-group">
                                <label for="alamat_plgn">Alamat</label>
                                <textarea class="form-control" id="alamat_plgn" name="alamat_plgn">{{ $userPelanggan->alamat_plgn }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="email_plgn">Email</label>
                                <input type="email" class="form-control" id="email_plgn" name="email_plgn"
                                    value="{{ $userPelanggan->email_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="no_ktp_plgn">No. KTP</label>
                                <input type="text" class="form-control" id="no_ktp_plgn" name="no_ktp_plgn"
                                    value="{{ $userPelanggan->no_ktp_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="no_telp_plgn">No. Telepon</label>
                                <input type="text" class="form-control" id="no_telp_plgn" name="no_telp_plgn"
                                    value="{{ $userPelanggan->no_telp_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="no_wa_plgn">No. WhatsApp</label>
                                <input type="text" class="form-control" id="no_wa_plgn" name="no_wa_plgn"
                                    value="{{ $userPelanggan->no_wa_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="id_line_plgn">ID Line</label>
                                <input type="text" class="form-control" id="id_line_plgn" name="id_line_plgn"
                                    value="{{ $userPelanggan->id_line_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="id_ig_plgn">ID Instagram</label>
                                <input type="text" class="form-control" id="id_ig_plgn" name="id_ig_plgn"
                                    value="{{ $userPelanggan->id_ig_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_plgn">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan_plgn" name="pekerjaan_plgn"
                                    value="{{ $userPelanggan->pekerjaan_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="status_pernikahan_plgn">Status Pernikahan</label>
                                <input type="text" class="form-control" id="status_pernikahan_plgn"
                                    name="status_pernikahan_plgn" value="{{ $userPelanggan->status_pernikahan_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="npwp_plgn">NPWP</label>
                                <input type="text" class="form-control" id="npwp_plgn" name="npwp_plgn"
                                    value="{{ $userPelanggan->npwp_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="sumber_dana_plgn">Sumber Dana</label>
                                <input type="text" class="form-control" id="sumber_dana_plgn" name="sumber_dana_plgn"
                                    value="{{ $userPelanggan->sumber_dana_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir_plgn">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir_plgn"
                                    name="tempat_lahir_plgn" value="{{ $userPelanggan->tempat_lahir_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir_plgn">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir_plgn" name="tgl_lahir_plgn"
                                    value="{{ $userPelanggan->tgl_lahir_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin_status">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin_status"
                                    name="jenis_kelamin_status" value="{{ $userPelanggan->jenis_kelamin_status }}">
                            </div>
                            <div class="form-group">
                                <label for="qr_code_plgn">QR Code</label>
                                <input type="text" class="form-control" id="qr_code_plgn" name="qr_code_plgn"
                                    value="{{ $userPelanggan->qr_code_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="foto_ktp">Foto KTP</label>
                                <input type="text" class="form-control" id="foto_ktp" name="foto_ktp"
                                    value="{{ $userPelanggan->foto_ktp }}">
                            </div>
                            <div class="form-group">
                                <label for="kategori_plgn">Kategori</label>
                                <input type="text" class="form-control" id="kategori_plgn" name="kategori_plgn"
                                    value="{{ $userPelanggan->kategori_plgn }}">
                            </div>
                            <div class="form-group">
                                <label for="sales_plgn">Sales</label>
                                <input type="text" class="form-control" id="sales_plgn" name="sales_plgn"
                                    value="{{ $userPelanggan->sales_plgn }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

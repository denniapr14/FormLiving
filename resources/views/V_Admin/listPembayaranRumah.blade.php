@extends('V_Admin.app')

@extends('flashdata')
@section('title', 'Form One | Pemesanan')
@section('pageTitle', 'Pembayaran')
@section('back', route('suratPemesananRumah.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'Pemesanan')
@section('breadcrumb2', 'Pembayaran')

@section('content')
<div class="card">

   <div class="card-body">
    <div class="card-header">
        <a href="http://127.0.0.1:8000/promo-admin/Greenland" class="btn-fd-icon-outline col-1" style="height: 40px; width: 50px"> <i class="fa fa-arrow-left"></i></a> &nbsp;
       JADWAL PEMBAYARAN
            ANGSURAN
    </div>


    <table class="table table-responsive" style="width: 100%">
        <thead class="">
            <tr>
                <th>No.</th>
                <th >Keterangan</th>
                <th>Tanggal</th>
                <th>Nominal</th>
                <th>Pengaturan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($getPembayaranRumah as $dtpem)
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $dtpem->detail_pr }}</td>
                <td>
                    @if ($dtpem->tgl_pr != '0000-00-00')
                    <?= tgl_indo(date('Y-m-d', strtotime($dtpem->tgl_pr))) ?>
                    @else
                    -
                    @endif
                </td>
                <td>
                    Rp {{ rupiah($dtpem->harga_pr) }}
                    @if ($dtpem->sisa_pr == 0 || $dtpem->sisa_pr <= 0)
                    <span class="badge bg-secondary">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('pembayaranRumah.Admin', [$getProjek->nama_projek, Crypt::encrypt($dtpem->id_pem_rumah)]) }}"
                        class="btn btn-info">
                        <i class="fas fa-dollar-sign"></i> Pembayaran
                    </a>
                    <a href="{{ route('editPembayaranRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($dtpem->id_pem_rumah)]) }}"
                        class="btn btn-info">
                        <i class="fas fa-edit"></i> Jumlah Pembayaran
                    </a>
                </td>
            </tr>
            <?php $no++; ?>
            @endforeach
        </tbody>
    </table>

   </div>
</div>

@endsection

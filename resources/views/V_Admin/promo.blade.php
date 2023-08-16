@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('V_Admin.footer')
@extends('flashdata')
@section('tittle', 'FORMS | Dashboard')

@section('content')

    <div class="content__row">
        <div class="content__row mb-3">
            <div class="card__box">
                <div class="card__header">
                    <div class="card__title">
                        <i class="bi bi-award-fill"></i>
                        <span>Promo</span>

                    </div>
                    <div class="invoices__actions">
                        <a href="/tambah-rumah-promo-admin/{{ $getProjek->nama_projek }}"
                            class="btn-fd-outline btn--small">Tambah Promo</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="promo" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Cluster - No Rumah</th>

                                <th>Promo</th>
                                @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'CEO')
                                    <th>Pengaturan</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $noPromo = 1; ?>
                            @foreach ($promo as $promo)
                                @if (!empty($promo->id_formulir) && $promo->status_fp != 'nonactive')
                                    <tr>

                                        <td>{{ $noPromo }} {{ $promo->id_promo }}</td>
                                        <td>{{ $promo->nama_cluster }} /
                                            @if (empty($promo->blok))
                                                tidak ada
                                            @else
                                                {{ $promo->blok }} - {{ $promo->nomor }}
                                            @endif
                                        </td>
                                        <td>
                                            <div id="accordion{{ $noPromo }}">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne{{ $noPromo }}">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse"
                                                                data-target="#collapseOne{{ $noPromo }}"
                                                                aria-expanded="true"
                                                                aria-controls="collapseOne{{ $noPromo }}">
                                                                Detail Promo {{ $promo->promo }} - {{ $promo->kode_promo }}

                                                                @if (!empty($promo->id_formulir))
                                                                    <span class="btn btn-success">

                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </span>
                                                                @else
                                                                    <span class="btn btn-danger">

                                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                                    </span>
                                                                @endif
                                                            </button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseOne{{ $noPromo }}" class="collapse show"
                                                        aria-labelledby="headingOne{{ $noPromo }}"
                                                        data-parent="#accordion{{ $noPromo }}">
                                                        <div class="card-body">
                                                            <div>
                                                                <p>Keterangan : {{ $promo->keterangan }}</p>
                                                                <p>Kode Promo : {{ $promo->kode_promo }}</p>
                                                                <p>Diskon Promo : {{ rupiah($promo->diskon_promo) }}</p>
                                                                <p>Tanggal Mulai - Akhir :
                                                                    <?= date('d M Y', strtotime($promo->tgl_berakhir)) ?> -
                                                                    <?= date('d M Y', strtotime($promo->tgl_berakhir)) ?>
                                                                </p>
                                                                <p>Tipe Promo : {{ $promo->tipe_promo }}</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if (!empty($promo->id_formulir))
                                                    <div class="card">
                                                        <div class="card-header" id="headingTwo{{ $noPromo }}">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link collapsed"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapseTwo{{ $noPromo }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseTwo{{ $noPromo }}">
                                                                    Promo digunakan oleh {{ $promo->nama_plgn }}
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="collapseTwo{{ $noPromo }}" class="collapse"
                                                            aria-labelledby="headingTwo"
                                                            data-parent="#accordion{{ $noPromo }}">
                                                            <div class="card-body">
                                                                <div>
                                                                    <p>Nama Pelanggan : {{ $promo->nama_plgn }}</p>
                                                                    <p>Tipe : {{ $promo->jenis_tr }}</p>
                                                                    <p>Harga : {{ rupiah($promo->harga_tr) }}</p>
                                                                    <p>Harga Jadi : {{ rupiah($promo->total_harga) }}</p>
                                                                    <p>Jenis : {{ $promo->jenis_pembayaran_fp }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif


                                            </div>



                                        </td>
                                        <td>
                                            {{--  <div class="d-flex flex-nowrap">
                                                <a href="{{ route('updatePromo.admin', [$getProjek->nama_projek,Crypt::encrypt($promo->id_promo)]) }}" class="btn btn-outline-primary"><i class="fas fa-edit    "></i></a>

                                            </div>  --}}
                                        </td>



                                    </tr>
                                @else
                                    <tr>

                                        <td>{{ $noPromo }}</td>
                                        <td>{{ $promo->nama_cluster }} /
                                            @if (empty($promo->blok))
                                                tidak ada
                                            @else
                                                {{ $promo->blok }} - {{ $promo->nomor }}
                                            @endif
                                        </td>
                                        <td>
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne{{ $noPromo }}">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse"
                                                                data-target="#collapseOne{{ $noPromo }}"
                                                                aria-expanded="true"
                                                                aria-controls="collapseOne{{ $noPromo }}">
                                                                Detail Promo {{ $promo->promo }} -
                                                                {{ $promo->kode_promo }}

                                                                @if (!empty($promo->id_formulir))
                                                                    <span class="btn btn-success">

                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </span>
                                                                @else
                                                                    <span class="btn btn-danger">

                                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                                    </span>
                                                                @endif
                                                            </button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseOne{{ $noPromo }}" class="collapse show"
                                                        aria-labelledby="headingOne{{ $noPromo }}"
                                                        data-parent="#accordion">
                                                        <div class="card-body">
                                                            <div>
                                                                <p>Keterangan : {{ $promo->keterangan }}</p>
                                                                <p>Kode Promo : {{ $promo->kode_promo }}</p>
                                                                <p>Diskon Promo : {{ rupiah($promo->diskon_promo) }}</p>
                                                                <p>Tanggal Mulai - Akhir :
                                                                    <?= date('d M Y', strtotime($promo->tgl_berakhir)) ?> -
                                                                    <?= date('d M Y', strtotime($promo->tgl_berakhir)) ?>
                                                                </p>
                                                                <p>Tipe Promo : {{ $promo->tipe_promo }}</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>



                                        </td>
                                        <td>
                                            {{--  <div class="d-flex flex-nowrap">
                                                <a href="{{ route('updatePromo.admin', [$getProjek->nama_projek,Crypt::encrypt($promo->id_promo)]) }}" class="btn btn-outline-primary"><i class="fas fa-edit    "></i></a>


                                            </div>  --}}

                                        </td>

                                    </tr>
                                @endif

                                <?php $noPromo++; ?>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>


            <script>
                $(document).ready(function() {
                    $('#promo').DataTable({
                        lengthMenu: [
                            [5, 10, 50, -1],
                            [5, 10, 50, 'All'],
                        ],
                    });
                });
            </script>

        @endsection

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
                        @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'CEO')
                            <a href="/tambah-rumah-promo-admin/{{ $getProjek->nama_projek }}"
                                class="btn-fd-outline btn--small">Tambah Promo</a>
                        @endif
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
                                @if (!empty($promo))
                                    <tr>
                                        <td>{{ $noPromo }}</td>
                                        <td>
                                            {{ $promo->nama_cluster }} /
                                            @if (empty($promo->blok))
                                                tidak ada
                                            @else
                                                {{ $promo->blok }} - {{ $promo->nomor }}
                                            @endif

                                        </td>
                                        <td>
                                            <div id="accordion">
                                                <!-- ... other code ... -->

                                                    <div id="accordion">
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne{{ $noPromo }}">
                                                                <h5 class="mb-0">
                                                                    <button class="btn btn-link" data-toggle="collapse"
                                                                        data-target="#collapseOne{{ $noPromo }}" aria-expanded="true"
                                                                        aria-controls="collapseOne{{ $noPromo }}">
                                                                        Detail Promo {{ $promo->promo }} -
                                                                        {{ $promo->kode_promo }}
                                                                        @foreach ($getPromoFP as $promoFP)
                                                                        @if ($promo->id_rumah == $promoFP->id_rumah)
                                                                        <span class="btn btn-success">

                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                        </span>
                                                                        @endif


                                                                        @endforeach
                                                                    </button>
                                                                </h5>
                                                            </div>

                                                            <div id="collapseOne{{ $noPromo }}" class="collapse "
                                                                aria-labelledby="headingOne{{ $noPromo }}" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <div>
                                                                        @foreach ($getPromoFP as $promoFP)
                                                                        @if ($promo->id_rumah == $promoFP->id_rumah)

                                                                        <p>Nama Pelanggan : {{ $promoFP->nama_plgn }}</p>
                                                                        @endif


                                                                        @endforeach

                                                                        <p></p>
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



                                            </div>
                                        </td>





                </td>
                @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'CEO')
                    <td>
                        <div class="d-flex flex-nowrap">
                            <a href="{{ route('updatePromo.admin', [$getProjek->nama_projek, Crypt::encrypt($promo->id_promo)]) }}"
                                class="btn btn-outline-primary"><i class="fas fa-edit    "></i></a>

                        </div>
                    </td>
                @endif

                </tr>
                @endif

                <?php $noPromo++; ?>
                @endforeach
                </tbody>
                </table>

            </div>

        </div>

        {{-- <tr>

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
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{ $noPromo }}"
                                aria-expanded="true" aria-controls="collapseOne{{ $noPromo }}">
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

                    <div id="collapseOne{{ $noPromo }}" class="collapse " aria-labelledby="headingOne{{ $noPromo }}"
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
        @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'CEO')
        <td>
            <div class="d-flex flex-nowrap">
                {{ $promo->id_promo }}
                <a href="{{ route('updatePromo.admin', [$getProjek->nama_projek, Crypt::encrypt($promo->id_promo)]) }}"
                    class="btn btn-outline-primary"><i class="fas fa-edit    "></i></a>

            </div>
        </td>
        @endif

    </tr>
    @endif --}}
        {{--
    <div id="accordion{{ $noPromo }}">
        <div class="card">
            <div class="card-header" id="headingOne{{ $noPromo }}">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{ $noPromo }}"
                        aria-expanded="true" aria-controls="collapseOne{{ $noPromo }}">
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

            <div id="collapseOne{{ $noPromo }}" class="collapse" aria-labelledby="headingOne{{ $noPromo }}"
                data-parent="#accordion{{ $noPromo }}">
                <div class="card-body">
                    <div>
                        <p>Keterangan : {{ $promo->keterangan }}</p>
                        <p>Kode Promo : {{ $promo->kode_promo }}</p>
                        <p>Diskon Promo : {{ rupiah($promo->diskon_promo) }}
                        </p>
                        <p>Tanggal Mulai - Akhir :
                            <?= date('d M Y', strtotime($promo->tgl_berakhir)) ?>
                            -
                            <?= date('d M Y', strtotime($promo->tgl_berakhir)) ?>
                        </p>
                        <p>Tipe Promo : {{ $promo->tipe_promo }}</p>

                    </div>
                </div>
            </div>
        </div>
        --}}

        <script>
            $(document).ready(function() {
                $('#promo').DataTable({
                    lengthMenu: [
                        [25, 50, 100, -1],
                        [25, 50, 100, 'All'],
                    ],
                });
            });
        </script>

    @endsection

@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('V_Admin.footer')
@extends('flashdata')
@section('tittle', 'FORMS | Dashboard')

@section('content')

    <style>
        @media (max-width: 500px) {
            #promoMobile {
                display: block;
            }

            #promoPC {
                display: none;
            }
        }

        @media (min-width: 501px) {
            #promoMobile {
                display: none;
            }

            #promoPC {
                display: block;
            }
        }
    </style>


    <div class="card mb-3" id="promoPC">

        <div class="card-body">
            <div class="card-title">
                <table style="width: 100%">
                    <tr>
                        <td> <i class="bi bi-award-fill"></i>
                            <span>Promo</span>
                        </td>
                        <td>
                            <div class="float-right">
                                @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'CEO')
                                    <a href="/tambah-rumah-promo-admin/{{ $getProjek->nama_projek }}"
                                        class="btn btn-outline-info btn--small" style="float: right"><i class="fa fa-plus"></i>
                                        Promo</a>
                                @endif
                            </div>

                        </td>
                    </tr>
                </table>

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
                                        <div id="accordian-3">
                                            <div class="card">
                                                <a class="card-header" id="heading11">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne{{ $noPromo }}" aria-expanded="false" aria-controls="collapse1">
                                                        <h5 class="m-b-0">   Detail Promo {{ $promo->promo }} -
                                                            {{ $promo->kode_promo }}
                                                            &nbsp;
                                                            @foreach ($getPromoFP as $promoFP)
                                                                @if ($promo->id_rumah == $promoFP->id_rumah)
                                                                    <span class="btn btn-outline-info">

                                                                       <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </span>
                                                                @endif
                                                            @endforeach</h5>
                                                    </button>
                                                </a>
                                                <div id="collapseOne{{ $noPromo }}" class="collapse" aria-labelledby="heading11" data-parent="#accordian-3" style="">
                                                    <div class="card-body">

                                                        <div>
                                                            @foreach ($getPromoFP as $promoFP)
                                                                @if ($promo->id_rumah == $promoFP->id_rumah)
                                                                    <p>Nama Pelanggan : {{ $promoFP->nama_plgn }}
                                                                    </p>
                                                                @endif
                                                            @endforeach

                                                            <p></p>
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

                                        </div>


                                    </td>
                                    @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'CEO')
                                        <td>
                                            <div class="d-flex flex-nowrap">
                                                <a href="{{ route('updatePromo.admin', [$getProjek->nama_projek, Crypt::encrypt($promo->id_promo)]) }}"
                                                    class="btn btn-outline-info"><i class="fas fa-edit    "></i></a>

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

    </div>

    <div class="card" id="promoMobile">

        <div class="card-body">
            <div class="card-title">
                <table style="width: 100%">
                    <tr>
                        <td> <i class="bi bi-award-fill"></i>
                            <span>Promo</span>
                        </td>
                        <td>
                            <div class="float-right">
                                @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'CEO')
                                    <a href="/tambah-rumah-promo-admin/{{ $getProjek->nama_projek }}"
                                        class="btn btn-outline-info btn--small" style="float: right"><i
                                            class="fa fa-plus"></i> Promo</a>
                                @endif
                            </div>

                        </td>
                    </tr>
                </table>

            </div>
            <div class="table-responsive">
                <center>
                    <table id="promoMobileTable" class="table">
                        <thead>
                            <tr>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $noPromoMobile = 1;
                            ?>

                            @foreach ($promoMobile as $promoMobile)
                                <tr>
                                    <td>
                                        <div class="row">

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        {{ $promoMobile->nama_cluster }} /
                                                        @if (empty($promoMobile->blok))
                                                            tidak ada
                                                        @else
                                                            {{ $promoMobile->blok }} - {{ $promoMobile->nomor }}
                                                        @endif
                                                    </div>
                                                    <br>
                                                    <p>
                                                        Kode Promo : {{ $promoMobile->kode_promo }}
                                                    </p>
                                                    <div class="row">
                                                        <div id="accordian-3" >
                                                            <div class="card">
                                                                <a class="card-header" id="heading11">
                                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseMobile{{ $noPromoMobile }}" aria-expanded="false" aria-controls="collapse1">
                                                                        <h5 class="m-b-0">{{ substr($promo->promo, 0, 10)  }} ... -
                                                                            {{ $promo->kode_promo }}
                                                                            &nbsp;
                                                                            @foreach ($getPromoFP as $promoFP)
                                                                                @if ($promo->id_rumah == $promoFP->id_rumah)
                                                                                    <span class="btn btn-outline-info">

                                                                                       <i class="fa fa-check" aria-hidden="true"></i>
                                                                                    </span>
                                                                                @endif
                                                                            @endforeach</h5>
                                                                    </button>
                                                                </a>
                                                                <div id="collapseMobile{{ $noPromoMobile }}" class="collapse" aria-labelledby="heading11" data-parent="#accordian-3" style="">
                                                                    <div class="card-body">

                                                                        <div>
                                                                            <p>
                                                                               {{$promo->promo}}
                                                                            </p>
                                                                            @foreach ($getPromoFP as $promoFP)
                                                                                @if ($promo->id_rumah == $promoFP->id_rumah)
                                                                                    <p>Nama Pelanggan : {{ $promoFP->nama_plgn }}
                                                                                    </p>
                                                                                @endif
                                                                            @endforeach

                                                                            <p></p>
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

                                                        </div>
                                                    </div>

                                                    <br>
                                                    {{--  END ACCORDION  --}}
                                                    <div>
                                                        <center>
                                                            <table>
                                                                @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'CEO')
                                                                    <td>

                                                                        <a href="{{ route('updatePromo.admin', [$getProjek->nama_projek, Crypt::encrypt($promo->id_promo)]) }}"
                                                                            class="btn btn-outline-info"><i
                                                                                class="fa fa-edit"></i></a>


                                                                    </td>
                                                                @endif
                                                            </table>
                                                        </center>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @php

                                    $noPromoMobile++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </center>

            </div>

        </div>


    </div>

    <script>
        $(document).ready(function() {
            $('#promo').DataTable({
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, 'All'],
                ],
            });
        });
        $(document).ready(function() {
            $('#promoMobileTable').DataTable({
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, 'All'],
                ],
            });
        });
    </script>

@endsection

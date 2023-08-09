@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('V_Admin.footer')
@extends('flashdata')
@section('tittle', 'FORMS | Dashboard')

@section('content')

    <!-- start: main -->

    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->
    <div class="content__wrapper">

        @if ($rumah != null && $rumah != '')
            @php
                $fileSVG = 'views/' . $getProjek->nama_projek . '.svg';
            @endphp
            <div class="content__row mb-3">
                <div class="card__box">
                    <div class="card__header">
                        <div class="card__title">
                            <i class="bi bi-map"></i>
                            <span>Site Plan Projek {{ $getProjek->nama_projek }}</span>

                        </div>

                    </div>
                    <div class="table-responsive">

                        <div class="map" style="background-color: white">

                            {{-- <img src="{{ asset('Home') }}/images/svg/map.svg" alt="" /> --}}
                            {{-- @include('map.svg') --}}
                            {!! file_get_contents(resource_path($fileSVG)) !!}
                            <script>
                                var svg = document.getElementById('Layer_1');


                                function zoom(scale) {

                                    svg.setAttribute('transform', 'scale(' + scale + ')');
                                }

                                var mouseX = 0;


                                var data = {!! json_encode($rumah) !!};
                                $(document).ready(function() {
                                    data.forEach(function(item) {
                                        var block = item.blok;
                                        var nomor = item.nomor;
                                        var blockNomor = block + "-" + nomor;
                                        {{--  blockNomor.toString()  --}}
                                        var idrumah = document.getElementById(blockNomor);


                                        idrumah.style.fill = color(item.status);
                                        idrumah.setAttribute('fill', color(item.status));


                                    });
                                });
                                console.log(data);

                                function color(stat) {
                                    var iro = 'warnaa';
                                    switch (stat) {
                                        case 'Available':
                                            iro = '#28a744';
                                            break;
                                        case 'Keep':
                                            iro = '#dc3546';
                                            break;
                                        case 'Sold':
                                            iro = '#dc3546';
                                            break;
                                        case 'onProgress':
                                            iro = '#dc3546';
                                            break;
                                        case 'Undeveloped':
                                            iro = 'gray';
                                        case 'Hold':
                                            iro = '#dc3546';
                                            break;
                                    }
                                    return iro;
                                }
                            </script>
                            {{-- <div class="control">
                        <div class="zoom in">
                            <img src="{{ asset('Home') }}/images/ic-zoom-in.png" alt="">
                        </div>
                        <div class="zoom">
                            <img src="{{ asset('Home') }}/images/ic-zoom-out.png" alt="">
                        </div>
                    </div> --}}


                        </div>
                        {{-- <button onclick="zoom(1.5)">Zoom in</button>
                <button onclick="zoom(0.5)">Zoom out</button> --}}
                    </div>

                </div>
            </div>
        @endif

        <div class="content__row mb-3">
            <div class="card__box">
                <div class="card__header">
                    <div class="card__title">
                        <i class="bi bi-map"></i>
                        <span>Pre Order {{ $getProjek->nama_projek }}


                    </div>

                </div>
                <div class="table-responsive">

                    <table id="preOrderPending" class="table">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Rumah</th>
                                <th>Pelanggan</th>
                                <th>Status</th>
                                <th>Tipe
                                    <br>
                                    Booking
                                </th>
                                <th>Tanggal Pre Order</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @if (!empty($getPreOrder))
                                @foreach ($getPreOrder as $preOrder)
                                    <tr>
                                        <td>
                                            {{ $no }}
                                        </td>
                                        <td>
                                            {{ $preOrder->nama_cluster }} / {{ $preOrder->blok }} -
                                            {{ $preOrder->nomor }}

                                        </td>
                                        <td>
                                            {{ $preOrder->nama_plgn }} <br>
                                            <small>Oleh {{ $preOrder->nama_ua }} - {{ $preOrder->nama_ktgr }}</small>
                                        </td>
                                        <td>

                                            @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting')
                                                <div class="btn-group" role="group">
                                                    @if ($preOrder->status_po == 'pending')
                                                        <button id="btnGroupDrop1" type="button"
                                                            class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            {{ $preOrder->status_po }}
                                                        </button>
                                                    @elseif($preOrder->status_po == 'confirmed')
                                                        <div class="btn btn-success">{{ $preOrder->status_po }}</div>

                                                        </button>
                                                    @else
                                                        <button id="btnGroupDrop1" type="button"
                                                            class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            {{ $preOrder->status_po }}
                                                        </button>
                                                    @endif

                                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <a class="dropdown-item"
                                                            href="{{ route('changeStatusPreOrder.admin', [
                                                                $getProjek->nama_projek,
                                                                Crypt::encrypt($preOrder->id_pre_order),
                                                                Crypt::encrypt('rejected'),
                                                            ]) }}">Reject</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('changeStatusPreOrder.admin', [
                                                                $getProjek->nama_projek,
                                                                Crypt::encrypt($preOrder->id_pre_order),
                                                                Crypt::encrypt('confirmed'),
                                                            ]) }}">Confirm</a>
                                                    </div>
                                                </div>
                                                <p hidden>{{ $preOrder->status_po }}</p>
                                            @else
                                                @if ($preOrder->status_po == 'confirmed')
                                                    <div class="btn btn-success btn-custom-height">
                                                        {{ $preOrder->status_po }}
                                                    </div>
                                                    <p hidden>
                                                        {{ $preOrder->status_po }}
                                                    </p>
                                                @elseif($preOrder->status_po == 'rejected')
                                                    <div class="btn btn-danger btn-custom-height">
                                                        {{ $preOrder->status_po }}
                                                    </div>
                                                    <p hidden>
                                                        {{ $preOrder->status_po }}
                                                    </p>
                                                @else
                                                    <div class="btn btn-warning btn-custom-height">
                                                        {{ $preOrder->status_po }}
                                                    </div>
                                                    <p hidden>
                                                        {{ $preOrder->status_po }}
                                                    </p>
                                                @endif
                                            @endif

                                        </td>
                                        <td>
                                            @if ($preOrder->tipe_booking_po != 'refundable')
                                                <div class="btn btn-danger"> {{ $preOrder->tipe_booking_po }}</div>
                                            @else
                                                <div class="btn btn-success">{{ $preOrder->tipe_booking_po }}</div>
                                            @endif

                                        </td>
                                        <td> {{ date('H:i A', strtotime($preOrder->tgl_input_po)) }}<br>
                                            <small>{{ tgl_indo(date('Y-m-d', strtotime($preOrder->tgl_input_po))) }}</small>
                                        </td>

                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach

                            @endif


                        </tbody>

                    </table>

                </div>



            </div>
        </div>



        <!-- start: footer -->
        <section class="footer mt-3">
            <div class="content__row">
                <div class="col-12 p-0">
                    <div class="card__box">
                        <p class="m-0">Designed by <a class="footer__link" title="Wolftagon"
                                href="https://www.wolftagon.com/">Wolftagon</a></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: footer -->




        <script>
            $(document).ready(function() {
                $('#preOrderPending').DataTable({
                    searching: true, // Enable global search bar
                    searchCols: [
                        null, // Column 1 (No) - No search input field
                        null, // Column 2 (Rumah) - No search input field
                        null, // Column 3 (Status) - No search input field
                        null, // Column 4 (Tipe) - No search input field
                        null // Column 5 (Tanggal Pre Order) - No search input field
                    ]
                });
            });

            $(document).ready(function() {
                var table = $('#preOrderPending').DataTable();


                // Attach filter function to a button or event

                // Add individual column search inputs
                $('#preOrderPending thead tr').clone(true).appendTo('#preOrderPending thead');
                $('#preOrderPending thead tr:eq(1) th').each(function(i) {
                    if (i !== 0) { // Exclude Column 1 (No) from individual search
                        var title = $(this).text();
                        $(this).html('<input type="text" placeholder="Search ' + title + '" />');

                        $('input', this).on('keyup change', function() {
                            if (table.column(i).search() !== this.value) {
                                table.column(i).search(this.value).draw();
                            }
                        });
                    }
                    if (i == 0) {
                        let title = '';
                        $(this).html('');

                    }
                });

                function filterPending() {
                    table.column(2).search('pending').draw();
                }
                $('#filterPendingButton').on('click', filterPending);
            });
        </script>

    @endsection

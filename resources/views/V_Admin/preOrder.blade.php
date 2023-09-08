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
                                <th style="width: 10%">Rumah</th>
                                <th style="width: 30%">Pelanggan</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 15%">Tipe
                                    <br>
                                    Booking
                                </th>
                                <th style="width: 30%">Tanggal Pre Order</th>

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
                                            @if (
                                                $user->kategori == 'Sales' ||
                                                    $user->kategori == 'SalesAgent' ||
                                                    $user->kategori == 'Agent' ||
                                                    $user->kategori == 'AgentCompany' ||
                                                    $user->kategori == 'AdminAgentCompany')
                                                Nama : {{ $preOrder->nama_plgn }} <br>
                                                No. KTP : {{ $preOrder->no_ktp_plgn }} <br>
                                                No. Wa / Telepon : {{ $preOrder->no_wa_plgn }} /
                                                {{ $preOrder->no_telp_plgn }}
                                                <br>
                                                <small>pembayaran Rp. {{ rupiah($preOrder->index_po) }} </small>
                                            @else
                                                {{ $preOrder->nama_plgn }} <br>
                                                <small>Oleh {{ $preOrder->nama_ua }} - {{ $preOrder->nama_ktgr }}</small>
                                                <br>
                                                <small>pembayaran : Rp. {{ rupiah($preOrder->index_po) }} </small>
                                            @endif

                                        </td>
                                        <td>

                                            @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting')
                                                <div class="btn-group" role="group">
                                                @php
                                                    $listStatus = ['pending','userconfirmed','accepted','refunded','rejected'];
                                                @endphp
                                                    @if ($preOrder->status_po == 'pending')
                                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                                        {{ $preOrder->status_po }}
                                                    </button>
                                                @elseif ($preOrder->status_po == 'userconfirmed')
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                        {{ $preOrder->status_po }}
                                                    </button>
                                                @elseif ($preOrder->status_po == 'accepted')
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        {{ $preOrder->status_po }}
                                                    </button>
                                                @elseif ($preOrder->status_po == 'refunded')
                                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                        {{ $preOrder->status_po }}
                                                    </button>
                                                @elseif ($preOrder->status_po == 'overtaken')
                                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" >
                                                        {{ $preOrder->status_po }}
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                                        {{ $preOrder->status_po }}
                                                    </button>
                                                @endif


                                                    <div class="dropdown-menu">
                                                        @foreach ($listStatus as $status)

                                                        <a class="dropdown-item"
                                                        href="{{ route('changeStatusPreOrder.admin', [
                                                             $getProjek->nama_projek,
                                                             Crypt::encrypt($preOrder->id_pre_order),
                                                             Crypt::encrypt($status),
                                                        ]) }}">
                                                        {{ $status }}


                                                     </a>


                                                    @endforeach
                                                        {{-- @if ($preOrder->status_po == 'pending')
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
                                                            <a class="dropdown-item"
                                                                href="{{ route('changeStatusPreOrder.admin', [
                                                                    $getProjek->nama_projek,
                                                                    Crypt::encrypt($preOrder->id_pre_order),
                                                                    Crypt::encrypt('overtaken'),
                                                                ]) }}">Overtaken</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('changeStatusPreOrder.admin', [
                                                                    $getProjek->nama_projek,
                                                                    Crypt::encrypt($preOrder->id_pre_order),
                                                                    Crypt::encrypt('refunded'),
                                                                ]) }}">Refund</a>
                                                                 <a class="dropdown-item"
                                                                 href="{{ route('changeStatusPreOrder.admin', [
                                                                     $getProjek->nama_projek,
                                                                     Crypt::encrypt($preOrder->id_pre_order),
                                                                     Crypt::encrypt('accepted'),
                                                                 ]) }}">Accept</a>
                                                        @elseif ($preOrder->status_po == 'confirmed')
                                                            <a class="dropdown-item"
                                                                href="{{ route('changeStatusPreOrder.admin', [
                                                                    $getProjek->nama_projek,
                                                                    Crypt::encrypt($preOrder->id_pre_order),
                                                                    Crypt::encrypt('pending'),
                                                                ]) }}">Reject</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('changeStatusPreOrder.admin', [
                                                                    $getProjek->nama_projek,
                                                                    Crypt::encrypt($preOrder->id_pre_order),
                                                                    Crypt::encrypt('rejected'),
                                                                ]) }}">Pending</a>
                                                        @else
                                                            <a class="dropdown-item"
                                                                href="{{ route('changeStatusPreOrder.admin', [
                                                                    $getProjek->nama_projek,
                                                                    Crypt::encrypt($preOrder->id_pre_order),
                                                                    Crypt::encrypt('confirmed'),
                                                                ]) }}">Confirm</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('changeStatusPreOrder.admin', [
                                                                    $getProjek->nama_projek,
                                                                    Crypt::encrypt($preOrder->id_pre_order),
                                                                    Crypt::encrypt('pending'),
                                                                ]) }}">Pending</a>
                                                        @endif --}}
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
                                            @if ($preOrder->tgl_update_po != '')
                                                <br>
                                                <small>
                                                    diubah
                                                    {{ tgl_indo(date('Y-m-d', strtotime($preOrder->tgl_input_po))) }}</small>
                                            @endif
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





        <script>
            $(document).ready(function() {
                $('#preOrderPending').DataTable({
                    lengthMenu: [25, 50, 75, 100],
                    searching: true, // Enable global search bar
                    searchCols: [
                        null, // Column 1 (No) - No search input field
                        null, // Column 2 (Rumah) - No search input field
                        null, // Column 3 (Status) - No search input field
                        null, // Column 4 (Tipe) - No search input field
                        null // Column 5 (Tanggal Pre Order) - No search input field
                    ],
                    autoWidth: true

                });
            });

            {{--  $(document).ready(function() {
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
            });  --}}
        </script>

    @endsection

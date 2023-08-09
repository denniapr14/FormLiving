@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@extends('script')
@extends('flashdata')
@section('tittle', 'Forms | Pengaturan Profil')
@section('body', '')

@section('content')

    <style>
        .mypad {
            padding: 10px 10px 10px 10px;
            border-color: #8ACCA1;

        }

        .mycolor {
            color: #8ACCA1;
        }

        .mybg {
            background-color: #ebfaf0;
        }

        .carbon-example {
            padding: 8px;
            background-color: #fff;
            width: 295px;
            box-sizing: border-box;
            border-radius: 6px;
            -webkit-box-align: start;
            -ms-flex-align: start;
            -webkit-align-items: flex-start;
            -moz-align-items: flex-start;
            align-items: flex-start;
            position: relative;
            z-index: 5;
            box-shadow: 0 2px 20px 0 rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .carbon-example img {
            margin-right: 9px;
            max-width: 125px;
        }

        .carbon-example .inner-wrapper {
            text-align: left;
        }

        .carbon-example .inner-wrapper p {
            font-size: 12px;
            line-height: 1.33;
            margin: 8px 0;
        }

        .carbon-example .inner-wrapper p.fine-print {
            font-size: 8px;
            color: #C5CDD0;
            line-height: 1.25;
            text-transform: uppercase;
            font-weight: 500;
        }

        .flex-wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-align-items: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            -webkit-justify-content: space-between;
            -moz-justify-content: space-between;
            justify-content: space-between;
        }

        @media screen and (max-width: 991px) {
            .flex-wrapper.two-col {
                display: block;
                text-align: center;
            }
        }

        .flex-wrapper.two-col>* {
            width: 50%;
        }

        .flex-wrapper.two-col>*:first-of-type {
            padding-right: 130px;
        }

        @media screen and (max-width: 991px) {

            .flex-wrapper.two-col>* {
                width: 100%;
            }

            .flex-wrapper.two-col>*:first-of-type {
                padding-right: 0;
            }
        }

        .flex-wrapper.two-col.reversed>*:first-of-type {
            order: 2;
            padding-right: 0;
        }

        @media screen and (min-width: 992px) {
            .flex-wrapper.two-col.reversed>*:first-of-type {
                padding-left: 130px;
            }
        }

        .flex-wrapper.three-col {
            text-align: left;
            -webkit-box-align: start;
            -ms-flex-align: start;
            -webkit-align-items: flex-start;
            -moz-align-items: flex-start;
            align-items: flex-start;
            margin-top: 40px;
        }

        @media screen and (max-width: 767px) {
            .flex-wrapper.three-col {
                -webkit-flex-wrap: wrap;
                -moz-flex-wrap: wrap;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
            }
        }

        .flex-wrapper.three-col>* {
            width: 33.3%;
        }

        @media screen and (max-width: 767px) {
            .flex-wrapper.three-col>* {
                width: 100%;
            }
        }

        @media screen and (min-width: 768px) {
            .flex-wrapper.three-col li {
                padding-left: 20px;
                padding-right: 20px;
            }

            .flex-wrapper.three-col li:first-child {
                padding-left: 0;
            }

            .flex-wrapper.three-col li:last-child {
                padding-right: 0;
            }
        }

        .flex-wrapper.three-col .flex-wrapper {
            -webkit-box-align: start;
            -ms-flex-align: start;
            -webkit-align-items: flex-start;
            -moz-align-items: flex-start;
            align-items: flex-start;
            margin-top: 0;
        }

        @media screen and (max-width: 767px) {
            .flex-wrapper.three-col .flex-wrapper {
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                -webkit-justify-content: center;
                -moz-justify-content: center;
                justify-content: center;
            }

            .flex-wrapper.three-col .flex-wrapper:not(:first-of-type) {
                margin-top: 40px;
            }
        }

        .flex-wrapper.three-col .flex-wrapper .icon {
            top: 0;
            transform: none;
        }

        .btn-custom-height {
            height: 25px;
            display: flex;
            font-size: 16px;
            align-items: center;
            justify-content: center;
        }
    </style>

    <div class="profile with-nav">
        <div class="header-simulation mobile-only">
            <div class="ornament one">
                <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
            </div>
            <div class="nav-header">
                <a href="{{ url()->previous() }}" class="ic-back">

                    <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">
                </a>
                <h2 class="title">
                    My Profile
                </h2>
                <div></div>
            </div>
        </div>
        <div class="container">
            <div class="second-layout">

                <div class="row">
                    <div class="col-12 col-lg-12 ">
                        <div class="">
                            <a href="{{ url()->previous() }}" style="width: 150px" class="btn btn-danger btn-custom-height">Kembali</a>
                            <br>




                            @if (!empty(Session::get('user')))
                                <div class="card ">
                                    <!-- Card header --><br>
                                    <div class="card-head">
                                        <h5 class="float-right">&nbsp;&nbsp;Pre Order</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="accordion" id="accordionExample">



                                            @php
                                                $noTab = 0;
                                            @endphp
                                            @foreach ($getProjek as $projek)
                                                @if ($getProjek == "Greenland")

                                                @endif
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $noTab }}"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            Rincian Pre Order {{ $projek->nama_projek }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $noTab }}"
                                                        class="accordion-collapse collapse" aria-labelledby="headingOne"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">


                                                            <div class="table-responsive">

                                                                <table id="preOrder{{ $projek->nama_projek }}" class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="width: 1%">No</th>
                                                                            <th style="width: 15%">Rumah</th>
                                                                            <th style="width: 30%">Pelanggan</th>
                                                                            <th style="width: 10%">Status</th>
                                                                            <th style="width: 15%">Tipe
                                                                                <br>
                                                                                Booking
                                                                            </th>
                                                                            <th style="width: 50%">Tanggal Pre Order</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $no = 1;
                                                                        ?>
                                                                        @if (!empty($getPreOrder))
                                                                            @foreach ($getPreOrder as $preOrder)
                                                                                @if ($preOrder->nama_projek == $projek->nama_projek)
                                                                                    <tr>
                                                                                        <td style="width: 10px">
                                                                                            {{ $no }}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{ $preOrder->nama_cluster }}
                                                                                            / {{ $preOrder->blok }} -
                                                                                            {{ $preOrder->nomor }}

                                                                                        </td>
                                                                                        <td>
                                                                                           Nama : {{ $preOrder->nama_plgn }} <br>
                                                                                           No. KTP : {{ $preOrder->no_ktp_plgn }} <br>
                                                                                           No. Wa / Telepon : {{ $preOrder->no_wa_plgn }} / {{ $preOrder->no_telp_plgn }}
                                                                                        </td>
                                                                                        <td>


                                                                                            @if ($user->kategori != 'SuperAdmin')
                                                                                                @if ($preOrder->status_po == 'confirmed')
                                                                                                    <div
                                                                                                        class="btn btn-success btn-custom-height">
                                                                                                        {{ $preOrder->status_po }}
                                                                                                    </div>
                                                                                                    <p hidden>
                                                                                                        {{ $preOrder->status_po }}
                                                                                                    </p>
                                                                                                @elseif($preOrder->status_po == 'rejected')
                                                                                                    <div
                                                                                                        class="btn btn-danger btn-custom-height">
                                                                                                        {{ $preOrder->status_po }}
                                                                                                    </div>
                                                                                                    <p hidden>
                                                                                                        {{ $preOrder->status_po }}
                                                                                                    </p>
                                                                                                @else
                                                                                                    <div
                                                                                                        class="btn btn-warning btn-custom-height">
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
                                                                                                <div class="btn btn-danger btn-custom-height">
                                                                                                    {{ $preOrder->tipe_booking_po }}
                                                                                                </div>
                                                                                            @else
                                                                                                <div
                                                                                                    class="btn btn-success btn-custom-height">
                                                                                                    {{ $preOrder->tipe_booking_po }}
                                                                                                </div>
                                                                                            @endif

                                                                                        </td>
                                                                                        <td> {{ date('H:i A', strtotime($preOrder->tgl_input_po)) }}<br>
                                                                                            <small>{{ tgl_indo(date('Y-m-d', strtotime($preOrder->tgl_input_po))) }}</small>
                                                                                        </td>

                                                                                    </tr>
                                                                                    @php
                                                                                        $no++;
                                                                                    @endphp
                                                                                @endif
                                                                            @endforeach
                                                                        @endif


                                                                    </tbody>

                                                                </table>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $noTab++;
                                                @endphp
                                            @endforeach


                                        </div>


                                    </div>


                                </div>
                            @endif




                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="navbar-mobile active">
        <a href="/" class="item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M2.5 7.49999L10 1.66666L17.5 7.49999V16.6667C17.5 17.1087 17.3244 17.5326 17.0118 17.8452C16.6993 18.1577 16.2754 18.3333 15.8333 18.3333H4.16667C3.72464 18.3333 3.30072 18.1577 2.98816 17.8452C2.67559 17.5326 2.5 17.1087 2.5 16.6667V7.49999Z"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7.5 18.3333V10H12.5V18.3333" stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p>Home</p>
        </a>
        <a href="/search-item" class="item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M17.5 17.5L13.875 13.875" stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p>Cari</p>
        </a>
        <div class="item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17.5 12.5C17.5 12.942 17.3244 13.366 17.0118 13.6785C16.6993 13.9911 16.2754 14.1667 15.8333 14.1667H5.83333L2.5 17.5V4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H15.8333C16.2754 2.5 16.6993 2.67559 17.0118 2.98816C17.3244 3.30072 17.5 3.72464 17.5 4.16667V12.5Z"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p>Chat</p>
        </div>
        <a href="/my-cart" class="item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.50008 18.3333C7.96032 18.3333 8.33341 17.9602 8.33341 17.5C8.33341 17.0398 7.96032 16.6667 7.50008 16.6667C7.03984 16.6667 6.66675 17.0398 6.66675 17.5C6.66675 17.9602 7.03984 18.3333 7.50008 18.3333Z"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M16.6666 18.3333C17.1268 18.3333 17.4999 17.9602 17.4999 17.5C17.4999 17.0398 17.1268 16.6667 16.6666 16.6667C16.2063 16.6667 15.8333 17.0398 15.8333 17.5C15.8333 17.9602 16.2063 18.3333 16.6666 18.3333Z"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M0.833252 0.833344H4.16658L6.39992 11.9917C6.47612 12.3753 6.68484 12.72 6.98954 12.9653C7.29424 13.2105 7.6755 13.3408 8.06658 13.3333H16.1666C16.5577 13.3408 16.9389 13.2105 17.2436 12.9653C17.5483 12.72 17.757 12.3753 17.8333 11.9917L19.1666 5.00001H4.99992"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p>Cart</p>
        </a>
        <a href="/profile-setting" class="item active">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M16.6666 17.5V15.8333C16.6666 14.9493 16.3154 14.1014 15.6903 13.4763C15.0652 12.8512 14.2173 12.5 13.3333 12.5H6.66658C5.78253 12.5 4.93468 12.8512 4.30956 13.4763C3.68444 14.1014 3.33325 14.9493 3.33325 15.8333V17.5"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M10.0001 9.16667C11.841 9.16667 13.3334 7.67428 13.3334 5.83333C13.3334 3.99238 11.841 2.5 10.0001 2.5C8.15913 2.5 6.66675 3.99238 6.66675 5.83333C6.66675 7.67428 8.15913 9.16667 10.0001 9.16667Z"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <p>Profile</p>
        </a>
    </div>

    <script>


        $(document).ready(function() {
            var table = $('#preOrderGreenland').DataTable({

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


            // Attach filter function to a button or event

            // Add individual column search inputs
            $('#preOrderGreenland thead tr').clone(true).appendTo('#preOrderGreenland thead');
            $('#preOrderGreenland thead tr:eq(1) th').each(function(i) {
                if (i !== 0) { // Exclude Column 1 (No) from individual search
                    var title = $(this).text();
                    $(this).html('<input type="text" placeholder="Search ' + title + '" />');

                    $('input', this).on('keyup change', function() {
                        if (table.column(i).search() !== this.value) {
                            table.column(i).search(this.value).draw();
                        }
                    });
                }
                if(i==0){
                    let title = '';
                    $(this).html('' );

                }
            });


        });



        $(document).ready(function() {
            var table = $('#preOrderKalm').DataTable({

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


            // Attach filter function to a button or event

            // Add individual column search inputs
            $('#preOrderKalm thead tr').clone(true).appendTo('#preOrderKalm thead');
            $('#preOrderKalm thead tr:eq(1) th').each(function(i) {
                if (i !== 0) { // Exclude Column 1 (No) from individual search
                    var title = $(this).text();
                    $(this).html('<input type="text" placeholder="Search ' + title + '" />');

                    $('input', this).on('keyup change', function() {
                        if (table.column(i).search() !== this.value) {
                            table.column(i).search(this.value).draw();
                        }
                    });
                }
                if(i==0){
                    let title = '';
                    $(this).html('' );

                }
            });


        });
    </script>

@endsection

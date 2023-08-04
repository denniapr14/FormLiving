@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('flashdata')
@extends('V_Admin.footer')

@section('tittle', 'FORMS | Dashboard')

@section('content')

    <!-- start: main -->


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->
    <div class="content__wrapper">


        <div class="content__row mb-3">
            <div class="card__box">

                <br>
                <div class="card__header">
                    <div class="card__title">
                        <i class="bi bi-clipboard2-plus"></i>
                        <span>Tipe Rumah {{ $getRumah->nama_cluster }} / {{ $getRumah->blok }} - {{ $getRumah->nomor }}
                        </span>
                        <button id="showToastButton">Show Toast</button>
                    </div>

                    <div class="invoices__actions">
                        <a href="{{ route('storeTipeRumah.admin', Crypt::encrypt($getRumah->id_rumah)) }}"
                            class="btn-fd-outline btn--small">Tambah Tipe Rumah</a>
                    </div>
                </div>

                <div class="table-responsive">

                    <table id="rumah" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe Rumah</th>
                                <th>Luas <br> Tanah</th>
                                <th>Status</th>
                                <th>Pengaturan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @if (!empty($getTipeRumah))
                                @foreach ($getTipeRumah as $tipeRumah)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $tipeRumah->jenis_tr }} &nbsp;
                                            @if (empty($tipeRumah->countGambar))
                                                <button type="button" class="btn btn-warning" data-toggle="modal" disabled
                                                    data-target=".bd-example-modal-lg"> <i class="fa fa-image"
                                                        aria-hidden="true"></i><span class="badge badge-pill badge-info">
                                                        {{ $tipeRumah->countGambar }}</span></button>
                                            @else
                                                <button type="button" class="btn btn-info"
                                                    data-target="#order-information{{ $no }}" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg{{ $no }}"> <i
                                                        class="fa fa-image" aria-hidden="true"></i><span
                                                        class="badge badge-pill badge-info">
                                                        {{ $tipeRumah->countGambar }}</span></button>
                                            @endif


                                            <div class="modal modal-form fade" id="order-information{{ $no }}"
                                                data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                aria-labelledby="order-informationLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Gambar Tipe Rumah
                                                                {{ $tipeRumah->jenis_tr }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="product-listing">

                                                                @foreach ($getGambar as $gambar)
                                                                    {{-- {{ $gambar->img_rumah }} --}}
                                                                    @if ($tipeRumah->id_tipe_rumah == $gambar->id_tipe)
                                                                        @if ($gambar->jenis_img == 'denah')
                                                                            <div class="product__item">


                                                                                <div class="product__card">

                                                                                    <div class="product__img">
                                                                                        <img src="{{ url('Home') }}/images/denah/{{ $gambar->img_rumah }}"
                                                                                            alt="product-1">
                                                                                    </div>
                                                                                    <p> {{ $gambar->jenis_img }}</p>
                                                                                    @if ($gambar->status_gr != 'nonaktif')
                                                                                        <a href="/gambar-rumah/status/nonaktif/{{ Crypt::encrypt($gambar->id_gambar_rumah) }}"
                                                                                            class="btn btn-danger"><i
                                                                                                class="fa fa-toggle-off"
                                                                                                aria-hidden="true"></i>
                                                                                            Nonaktif</a>
                                                                                    @else
                                                                                        <a href="/gambar-rumah/status/aktif/{{ Crypt::encrypt($gambar->id_gambar_rumah) }}"
                                                                                            class="btn btn-primary"><i
                                                                                                class="fa fa-toggle-on"
                                                                                                aria-hidden="true"></i>
                                                                                            Aktif</a>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                        @if ($gambar->jenis_img == 'gambar')
                                                                            <div class="product__item">
                                                                                <div class="product__card">
                                                                                    <div class="product__img">
                                                                                        <img src="{{ url('Home') }}/images/tipe/{{ $gambar->img_rumah }}"
                                                                                            alt="product-1">
                                                                                    </div>
                                                                                    <p> {{ $gambar->jenis_img }}</p>
                                                                                    @if ($gambar->status_gr != 'nonaktif')
                                                                                        <a href="/gambar-rumah/status/nonaktif/{{ Crypt::encrypt($gambar->id_gambar_rumah) }}"
                                                                                            class="btn btn-danger"><i
                                                                                                class="fa fa-toggle-off"
                                                                                                aria-hidden="true"></i>
                                                                                            Nonaktif</a>
                                                                                    @else
                                                                                        <a href="/gambar-rumah/status/aktif/{{ Crypt::encrypt($gambar->id_gambar_rumah) }}"
                                                                                            class="btn btn-primary"><i
                                                                                                class="fa fa-toggle-on"
                                                                                                aria-hidden="true"></i>
                                                                                            Aktif</a>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                @endforeach


                                                            </div>
                                                            <div class="row">


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </td>
                                        <td>{{ $tipeRumah->luas_bangunan_tr }}
                                        </td>
                                        <td>{{ $tipeRumah->harga_tr }}</td>
                                        <td>
                                            <div class="d-flex flex-nowrap">

                                                <a href="{{ route('updateTipeRumah.admin', Crypt::encrypt($tipeRumah->id_tipe_rumah)) }}"
                                                    class="btn btn-outline-info">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                    ?>
                                @endforeach
                            @else
                                <div class="alert alert-danger">Tidak ada data</div>
                            @endif


                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <!-- end: content -->

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


        <!-- end: main -->

        <!-- Modal -->
        <div class="modal modal-sweet-alert modal-sweet-alert--error fade" id="delete-alert" data-backdrop="static"
            data-keyboard="false" tabindex="-1" aria-labelledby="delete-alertLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="alert-icon">
                            <i class="bi bi-trash"></i>
                        </div>
                        <h1>Delete Data?</h1>
                        <p>You will not able to recover all this invoice!</p>
                        <a href="#" class="btn btn-outline-danger" data-dismiss="modal">Cancel</a>
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Change Confirmation-->
        <div class="modal modal-sweet-alert modal-sweet-alert--warning fade" id="change-alert" data-backdrop="static"
            data-keyboard="false" tabindex="-1" aria-labelledby="change-alertLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="alert-icon">
                            <i class="bi bi-exclamation-circle"></i>
                        </div>
                        <h1>Are you sure want to change status this invoice?</h1>
                        <p>You will not able to recover all this invoice!</p>
                        <a href="#" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</a>
                        <a href="#" class="btn btn-warning" data-dismiss="modal">Change</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal order information-->
        <div class="modal modal-form fade" id="order-information" data-backdrop="static" data-keyboard="false"
            tabindex="-1" aria-labelledby="order-informationLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Order Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    No. Order Form
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>ORF-10001</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Agent ID
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>AG-0000001</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Agent Name
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>Bambang</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Client Name
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>Client A</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    No. Hp
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>08965123455</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Project Name
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>Araya Hotel</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Price
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>1.300.000.000</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Fee Received
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>1.300.000</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Status
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <div class="badge badge--success">verified</div>
                                </div>
                            </div>
                            <div class="row pt-4">
                                <div class="col-12">
                                    <button class="btn-fd-primary w-100" type="submit"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function updateTime() {
                const now = new Date();
                const hours = now.getHours();
                const minutes = now.getMinutes();
                const seconds = now.getSeconds();
                const timeString = `${hours}:${minutes}:${seconds}`;
                document.getElementById('clock').textContent = timeString;
            }
            setInterval(updateTime, 1000);
        </script>

        <script>
            $(document).ready(function() {
                $('#rumah').DataTable();
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#showToastButton').click(function() {
                    Toastify({
                        text: "Hello, this is a toast message!",
                        duration: 3000,
                        gravity: "bottom",
                        positionLeft: false,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        stopOnFocus: true
                    }).showToast();
                });
            });
        </script>
    @endsection

@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('V_Admin.footer')
@extends('flashdata')
@section('tittle', 'FORMS | Dashboard')

@section('content')

    <!-- start: main -->


        <!-- start: navbar -->

        <!-- end: navbar -->

        <!-- start: content -->
        <div class="content__wrapper">

            @if ($rumah != null && $rumah !="")
            @php
            $fileSVG = "views/".$getProjek->nama_projek.'.svg';
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

                            {{-- <img src="{{ asset('Home') }}/images/svg/map.svg" alt=""/> --}}
                            {{-- @include('map.svg') --}}
                            {!! file_get_contents(resource_path( $fileSVG)) !!}
                            <script>
                                var svg = document.getElementById('Layer_1');


                                function zoom(scale) {

                                    svg.setAttribute('transform', 'scale(' + scale + ')');
                                  }

                                  var mouseX = 0;


                                var data = {!! json_encode($rumah) !!};
                                $(document).ready(function(){
                                    data.forEach(function(item) {
                                    var block = item.blok;
                                    var nomor = item.nomor;
                                    var blockNomor = block+"-"+nomor;
                                    {{--  blockNomor.toString()  --}}
                                    var idrumah = document.getElementById(blockNomor);


                                    idrumah.style.fill = color(item.status);
                                    idrumah.setAttribute('fill',color(item.status));


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
                            {{--  <div class="control">
                                <div class="zoom in">
                                    <img src="{{ asset('Home') }}/images/ic-zoom-in.png" alt="">
                                </div>
                                <div class="zoom">
                                    <img src="{{ asset('Home') }}/images/ic-zoom-out.png" alt="">
                                </div>
                            </div>  --}}


                        </div>
                        {{--  <button onclick="zoom(1.5)">Zoom in</button>
                        <button onclick="zoom(0.5)">Zoom out</button>  --}}
                    </div>

                </div>
            </div>
            @endif


            <div class="content__row mb-3">
                <div class="card__box">
                    <div class="card__header">
                        <div class="card__title">
                            <i class="bi bi-map"></i>
                          <span>Surat Pemesanan Rumah {{ $getProjek->nama_projek }}</span>

                        </div>

                      </div>
                    <div class="table-responsive">
                        <table id="formulirPesanan" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No FP</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Order</th>
                                    @if ($user->kategori == "SuperAdmin" || $user->kategori == "AdminAccounting" )

                                    <th>Pengaturan</th>
                                    @else
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($getFormulirPesanan as $fp)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $fp->no_fp }}</td>
                                        <td>
                                        <span class="client__name">{{ $fp->nama_plgn }}</span>
                                        <span class="client__handled">Dari {{ $fp->nama_ktgr }} ({{ $fp->nama_ua }})</span>
                                        </td>
                                        <td>
                                            {{ $fp->email_plgn }}
                                        </td>
                                        <td>
                                            {{ date("d M Y", strtotime($fp->tgl_input_fp)) }}
                                        </td>
                                        @if ($user->kategori == "SuperAdmin" || $user->kategori == "AdminAccounting" )
                                        <td>

                                            <div class="d-flex flex-nowrap">
                                                <a href="{{ route('editSuratPemesananRumah.admin', [$getProjek->nama_projek,Crypt::encrypt($fp->id_formulir)] ) }}" class="btn-fd-icon-outline">
                                                   <i class="fas fa-edit    "></i>
                                                </a>

                                              </div>

                                            </td>

                                        @else

                                        @endif

                                    </tr>
                                @endforeach

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
                                <button class="btn-fd-primary w-100" type="submit" data-dismiss="modal">Close</button>
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
            $('#formulirPesanan').DataTable();
        });
    </script>

@endsection

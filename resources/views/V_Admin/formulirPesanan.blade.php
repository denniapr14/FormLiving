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
                                $(document).ready(function() {
                                        data.forEach(function(item) {
                                            var block = item.blok;
                                            var nomor = item.nomor;
                                            var blockNomor = block + "-" + nomor;
                                            var idrumah = document.getElementById(blockNomor);

                                            {{--  console.log("Block-Nomor:", blockNomor);
                                            console.log("Status:", item.status);
                                            console.log("Color:", color(item.status)); // Check color function output  --}}

                                            if (idrumah) {
                                                idrumah.style.fill = color(item.status);
                                                idrumah.setAttribute('fill', color(item.status));
                                            } else {
                                                console.log("Element not found:", blockNomor);
                                            }
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

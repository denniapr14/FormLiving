@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle', 'Forms | Simulasi Pembayaran')
@section('body', '')


@section('content')
    <style>
        .collapsible {
            border: 1px solid #ccc;
            margin-bottom: 10px;
            border-radius: 15px;

        }

        .collapsible-btn {
            background-color: #198754;
            border: none;
            padding: 10px;
            border-radius: 15px;
            cursor: pointer;
            width: 100%;
            text-align: left;
            color: white;
        }

        .collapsible-content {
            display: none;
            padding: 10px;
            border-radius: 15px;


        }
    </style>
    <div class="cluster">
        <div class="header-simulation mobile-only">
            <div class="ornament one">
                <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
            </div>
            <div class="nav-header">
                <!--<div class="ic-back">-->
                <!--    <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">-->
                <!--</div>-->
                <h2 class="title">
                    Miliki Unit
                </h2>
                <div></div>
            </div>
            <div class="steps">
                <div class="step done">1</div>
                <div class="step done">2</div>
                <div class="step done">3</div>
                <div class="step active">4</div>
                <div class="step ">5</div>
                <div class="step last">6</div>


            </div>

        </div>
        <div class="container">
            <div class="steps">
                <div class="step done">1</div>
                <div class="step done">2</div>
                <div class="step done">3</div>
                <div class="step active">4</div>
                <div class="step ">5</div>
                <div class="step last">6</div>


            </div>

            <div class="container">




                <div>
                    {{--  FORM  --}}

                    <div class="second-layout">

                        <div class="row">
                            <div class="col-12 order-2 order-lg-1">
                                <h2 class="title">
                                    Metode Pembayaran
                                </h2>
                            </div>
                            <div class="col-12 col-lg-4 left-column order-1 order-lg-2">
                                <div class="mod-type">
                                    <div class="type-image">
                                        <img src="{{ asset('Home') }}/images/tipe/{{ $tipeRumah->img_rumah }}"
                                            alt="">
                                    </div>
                                    <div class="items">

                                        <div class="type-item">
                                            <p>Blok</p>
                                            <h5>{{ $rumah->blok }} - {{ $rumah->nomor }}</h5>
                                        </div>
                                        <div class="type-item">
                                            <p>Cluster</p>
                                            <h5>{{ $rumah->nama_cluster }}</h5>
                                        </div>
                                        <div class="type-item">
                                            <p>Harga Jual</p>

                                            <h5>Rp {{ rupiah($tipeRumah->harga_tr) }}</h5>
                                        </div>
                                        <div class="type-item">
                                            <p>Luas Tanah</p>

                                            <h5>{{ $rumah->luas_tanah }} m<sup>2</sup></h5>
                                        </div>
                                        <div class="type-item">
                                            <p>Type</p>
                                            <h5>{{ $tipeRumah->jenis_tr }}</h5>
                                        </div>
                                        <div class="type-item">
                                            <p>Luas Bangunan</p>
                                            <h5>{{ $tipeRumah->luas_bangunan_tr }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-8 right-column order-3">

                                  {{--  =================================================================================================================================================  --}}

                                {{--  KPR --}}
                                <div class="collapsible">
                                    <button class="collapsible-btn">
                                        KPR
                                    </button>
                                    <div class="collapsible-content">
                                        <div id="collapse-card-cluster" class="card-body collapse-item">
                                            <div class="row">
                                                <form
                                                    action="{{ route('simulationPaymentOptionAction', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah]) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="card-shadow">
                                                        <label for="">Booking Fee Rp. 10.000.000</label>
                                                        <input type="text" name="jenis" readonly hidden value="KPR">
                                                    </div>

                                                    <br>
                                                    <div class="card-shadow">
                                                        <label for="">Persentase Uang Muka</label>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">

                                                            <input type="text" name="persentase" id="persentase" class="form form-control"
                                                                value="10">
                                                            <small id="errorPersentase" style="color: red">Persentase
                                                                Minimal 10%</small>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="card-shadow">
                                                        <label for="">Suku Bunga</label>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">

                                                            <input type="number" value="1" readonly hidden class="form form-control" id="sukuBunga"
                                                                value="">

                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="card-shadow">
                                                        <label for="">Harga Rumah</label>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">

                                                            <input type="text" class="form form-control" id="jumlah"
                                                                readonly value="{{ $tipeRumah->harga_tr }}">

                                                        </div>
                                                    </div>

<br>
                                                    @if ($rumah->status_stock == 'Inden')
                                                        <div class="card-shadow">
                                                            <label for="">Cicilan Uang Muka</label>
                                                        </div>
                                                        <div class="">
                                                            <div class="form-group">
                                                                <select name="cicilanUM" required class="form-control">
                                                                    <option value="" selected>--Pilih Cicilan Uang Muka--
                                                                    </option>
                                                                    @for ($i = 1; $i < 7; $i++)
                                                                        <option value="{{ $i }}">{{ $i }} kali
                                                                            </option>
                                                                    @endfor
                                                                </select>


                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="btn-groups">
                                                        <a type="button"
                                                            onclick="hitung('jumlah','persentase','sukuBunga','hasil','hasil2','hasil3','hasil4','sisaPembayaran')"
                                                            class="btn btn-primary">Hitung Simulasi</a>


                                                    </div>
                                                    <div class="price-total">
                                                        <p>Perkiraan pembayaran KPR Anda:</p>

                                                        <h5 id="sisaPembayaran"></h5>
                                                    </div>
                                                    <div class="btn-groups">
                                                        <button type="submit" type="button" id="nextKPR" disabled
                                                            class="btn btn-primary">Lanjutkan</button>
                                                    </div>




                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--  =================================================================================================================================================  --}}

                                {{--  CICILAN  --}}
                                <div class="collapsible">
                                    <button class="collapsible-btn">
                                        Cicilan
                                    </button>
                                    <div class="collapsible-content">
                                        <div id="collapse-card-cluster" class="card-body collapse-item">
                                            <div class="row">
                                                <form
                                                    action="{{ route('simulationPaymentOptionAction', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="simulation-price">
                                                        <input type="text" name="jenis" value="Cicilan" readonly hidden id="">

                                                            <div class="form-group card-shadow">
                                                                <label for="">Booking Fee</label>
                                                                Rp{{ rupiah(10000000) }}
                                                            </div>
                                                            <br>
                                                            @for ($i = 1; $i < 9; $i++)
                                                                <?php
                                                                $thn = ($tipeRumah->harga_tr - 10000000) / $i;

                                                                ?>

                                                                <div class="collapse-item">
                                                                    <div class="card-shadow"
                                                                        >
                                                                        <input type="radio" id="age1"
                                                                                    name="cicilan"
                                                                                    value="{{ $i }}">
                                                                                <label class="form-check-label">
                                                                                    Cicilan {{ $i }} bulan dengan cicilan Rp {{ rupiah($thn) }} per bulan

                                                                                </label>

                                                                    </div>

                                                                </div>
                                                                <br>
                                                            @endfor


                                                    </div>

                                                    <div class="card-shadow">
                                                        <label for="">Jumlah harga</label>
                                                    </div>

                                                        <div class="">
                                                            <input type="text" readonly
                                                                class="form-control card-shadow" name="jumlah"
                                                                id="jumlahHarga" aria-describedby="helpId" placeholder=""
                                                                onkeyup="getValue('jumlahHarga')"
                                                                value="{{ rupiah($tipeRumah->harga_tr) }}">
                                                        </div>

                                                    <div class="btn-groups">

                                                        <button type="submit" type="button" id=""
                                                            class="btn btn-primary">Lanjutkan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="btn-groups">
                        <a href="{{ route('simulationDetailTipe', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah]) }}"
                            type="button" class="btn btn-grey">Kembali</a>

                    </div>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const buttons = document.querySelectorAll(".collapsible-btn");

                buttons.forEach(button => {
                    button.addEventListener("click", function() {
                        const content = this.nextElementSibling;
                        content.style.display = content.style.display === "block" ? "none" : "block";
                    });
                });
            });
        </script>

        <script>
            const valueInput = document.getElementById('persentase');
            const alertMessage = document.getElementById('errorPersentase');

            valueInput.addEventListener('change', function() {
                const enteredValue = parseInt(valueInput.value);

                if (!isNaN(enteredValue)) {
                    if (enteredValue < 10 || enteredValue > 100) { // Adjusted the condition
                        alertMessage.textContent = 'Persentase diatas 10 dibawah 100.';
                    } else {
                        alertMessage.textContent = '';
                    }
                } else {
                    alertMessage.textContent = 'Masukan persentase dengan benar.';
                }
            });
        </script>
        <script>
            function hitung(jumlah, uangmuka, sukuBunga, result, result2, result3, result4,sisaPengurangan) {

                var jml = document.getElementById(jumlah).value;
                jml = jml.replace(/\D/g, '');
                {{--  console.log(jml);  --}}
                var um = document.getElementById(uangmuka).value;
                var skBunga = document.getElementById(sukuBunga).value;
                var totalPersentase = ({{ $tipeRumah->harga_tr }} * (um / 100))

                {{--  um = um.replace(/\D/g, '');  --}}
                {{--  console.log(totalPersentase);  --}}

                {{--  var thn = document.getElementById(tahun).value;  --}}
                var hasil = document.getElementById(result);
                var hasil2 = document.getElementById(result2);
                var hasil3 = document.getElementById(result3);
                var hasil4 = document.getElementById(result4);
                var sisa = document.getElementById(sisaPengurangan);
                var cicilan;
                var cicilan2;

                var perngurangan = jml - totalPersentase;
                {{--  console.log(perngurangan);  --}}
                //  perngurangan = perngurangan.replace(/\D/g, '.');
                // console.log(perngurangan+"Pengurangan");
                /*
                ir - interest rate per month
                np - number of periods (months)
                pv - present value
                fv - future value (residual value)
                */

                cicilan = calculatePMT(perngurangan, skBunga, 60);
                {{--  console.log(jml);
                console.log(cicilan);  --}}
                var hasilRupiah = formatRupiah2(cicilan);
                cicilan2 = calculatePMT(perngurangan, skBunga, 120);
                {{--  console.log(cicilan2);  --}}
                var hasilRupiah2 = formatRupiah2(cicilan2);

                cicilan3 = calculatePMT(perngurangan, skBunga, 180);
                {{--  console.log(cicilan3);  --}}
                var hasilRupiah3 = formatRupiah2(cicilan3);

                cicilan4 = calculatePMT(perngurangan, skBunga, 240);
                {{--  console.log(cicilan4);  --}}
                var hasilRupiah4 = formatRupiah2(cicilan4);
                var hasilSisa = formatRupiah2(perngurangan);
                {{--  console.log(hasilRupiah);
                console.log(hasilRupiah2);  --}}
                {{--  var hasilCicilan = Math.round(parseInt((cicilan / 1000)) * 1000).toString(),
                    sisa = hasilCicilan.length % 3,
                    rupiah = hasilCicilan.substr(0, sisa),
                    ribuan = hasilCicilan.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                cicilan2 = ((jml - um) * (sb / 100) * 20) / (20 * 12);
                {{--  console.log(cicilan2);  --}}

                var hasilCicilan2 = Math.round(parseInt((cicilan2 / 1000)) * 1000).toString(),
                    sisa2 = hasilCicilan2.length % 3,
                    rupiah2 = hasilCicilan2.substr(0, sisa2),
                    ribuan2 = hasilCicilan2.substr(sisa2).match(/\d{3}/g);

                if (ribuan2) {
                    separator2 = sisa2 ? '.' : '';
                    rupiah2 += separator2 + ribuan2.join('.');
                }
                {{--  console.log(hasilCicilan);
                console.log(hasilCicilan2);

                console.log(rupiah2);   --}}


                sisa.innerText = "Sisa Pembayaran KPR Rp " + hasilSisa + ",-";
                document.getElementById('nextKPR').disabled = false;
            }

            function getValue(id) {
                var dataValue = document.getElementById(id);

                dataValue.value = formatRupiah(dataValue.value, '', id);

            }

            function calculatePMT(P, r, n) {
                // Convert the annual interest rate to a monthly rate
                r = r / 1200;

                // Calculate the PMT using the formula
                var PMT = P * r * Math.pow(1 + r, n) / (Math.pow(1 + r, n) - 1);

                // Round the result to two decimal places
                PMT = Math.round(PMT * 100) / 100;

                // Return the PMT
                return PMT;
            }

            function formatRupiah2(angka) {
                var hasilCicilan = Math.round(parseInt((angka / 1000)) * 1000).toString(),
                    sisa = hasilCicilan.length % 3,
                    rupiah = hasilCicilan.substr(0, sisa),
                    ribuan = hasilCicilan.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                return rupiah;
            }

            function formatRupiah(angka, prefix, id) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

                document.getElementById(id).value = rupiah;
                return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
            }
        </script>

    @endsection

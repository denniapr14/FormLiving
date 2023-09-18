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
                                <div class="card">
                                    <div class="card-header" style="background-color: #198754; color: white;">
                                        <label for="gender" class="form-label">Pakai Promo</label>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <button type="button" id="openModal" class="btn btn-form"
                                                    data-bs-toggle="modal" data-bs-target="#modelId">
                                                    <div class="promo-text"><img
                                                            src="{{ asset('Home') }}/images/ic-promo.png" alt="">
                                                        <div id="textPromo">Pilih promo di sini</div>
                                                    </div>
                                                    <div><i class="bi-chevron-right"></i></div>
                                                </button>
                                                <br>
                                                <div id="myAlert" role="alert">

                                                </div>

                                                <br>
                                                <div class="form-group">
                                                    <input type="text" name="promo" value="Tidak Ada Promo"
                                                        id="selectedPromoCode" class="form-control" readonly>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <br>

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
                                                    <div>
                                                        <label for="">Booking Fee Rp. 10.000.000</label>
                                                        <input type="text" name="jenis" readonly hidden value="KPR">
                                                    </div>

                                                    <br>
                                                    <div>
                                                        <label for="">Persentase Uang Muka</label>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">

                                                            <input type="text" name="persentase" id="persentase"
                                                                class="form form-control" value="10">
                                                            <small id="errorPersentase" style="color: red">Persentase
                                                                Minimal 10%</small>
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                        <div class="form-group">

                                                            <input type="number" value="1" readonly hidden
                                                                class="form form-control" id="sukuBunga" value="">

                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <label for="">Harga Rumah</label>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">

                                                            <input type="text" class="form form-control"
                                                                id="jumlah" readonly
                                                                value="{{ $tipeRumah->harga_tr }}">

                                                        </div>
                                                    </div>

                                                    <br>
                                                    @php
                                                        $cicilan = 7;
                                                    @endphp
                                                    @if ($rumah->status_stock == 'Inden')
                                                        <div class="card-shadow">
                                                            <label for="">Cicilan Uang Muka</label>
                                                        </div>
                                                        <div class="">
                                                            <div class="form-group">
                                                                <select name="cicilanUM" id="cicilanUM" required
                                                                    class="form-control">
                                                                    <option value="" selected>--Pilih Cicilan Uang
                                                                        Muka--
                                                                    </option>
                                                                    @for ($i = 1; $i < $cicilan; $i++)
                                                                        <option value="{{ $i }}">
                                                                            {{ $i }} kali
                                                                        </option>
                                                                    @endfor
                                                                </select>


                                                            </div>
                                                        </div>
                                                    @else
                                                        <select name="cicilanUM" id="cicilanUM" hidden required
                                                            class="form-control">
                                                            <option value="1">1</option>
                                                        </select>

                                                    @endif
                                                    <div class="btn-groups">
                                                        <a type="button"
                                                            onclick="hitung('jumlah','persentase','sukuBunga','hasil','hasil2','hasil3','hasil4', 'cicilanUM','sisaPembayaran')"
                                                            class="btn btn-primary">Hitung Simulasi</a>


                                                    </div>
                                                    <div class="price-total">
                                                        <p>Perkiraan pembayaran KPR Anda:</p>
                                                        <h5 id="hasil"></h5>
                                                        <h5 id="hasil2"></h5>
                                                        <h5 id="hasil3"></h5>

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
                                                        <input type="text" name="jenis" value="Cicilan" readonly
                                                            hidden id="">

                                                        <div class="form-group card-shadow">
                                                            <label for="">Booking Fee</label>
                                                            Rp{{ rupiah(10000000) }}
                                                        </div>
                                                        <br>
                                                        @for ($i = 1; $i <= 8; $i++)
                                                            <?php
                                                            $thn = ($tipeRumah->harga_tr - 10000000) / $i;

                                                            ?>

                                                            <div class="collapse-item" id="cicilan">
                                                                <div class="card-shadow">
                                                                    <input type="radio" id="age1" name="cicilan"
                                                                        value="{{ $i }}">
                                                                    <label class="form-check-label">
                                                                        Cicilan {{ $i }} bulan dengan cicilan Rp
                                                                        {{ rupiah($thn) }} per bulan

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
                                                        <input type="text" readonly class="form-control card-shadow"
                                                            name="jumlah" id="jumlahHarga" aria-describedby="helpId"
                                                            placeholder="" onkeyup="getValue('jumlahHarga')"
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

        {{-- -------------------------------------------------------------------------------------- --}}
        {{-- modal-popup promo --}}
        <div class="modal fade promo" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body promo-modal">
                        <h5 class="promo-title">
                            Pakai Promo
                        </h5>

                        <div class="promo-input">
                            <input type="text" class="form-control" name="promo" id="promo"
                                placeholder="Masukkan kode promo">

                            <a id="cariPromo" class="btn">Terapkan</a>
                        </div>
                        <!-- STATE PROMO -->
                        <div class=" d-block ">

                            <h5 class="mb-4">Pilih Promo</h5>

                            @if (empty($promoRumah))
                                <h5>Promo Rumah</h5>
                                Tidak ada promo Rumah
                            @else
                                <h5>Promo Rumah</h5>
                                @foreach ($promoRumah as $promoRumah)
                                    <div class="promo-item ">
                                        <div class="row ">
                                            <div class="promo-icon col-md-1">
                                                <img src="{{ asset('Home') }}/images/ic-promo.png" alt="Promo">
                                            </div>
                                            <div class="promo-text col-md-8">

                                                <h6 id='keteranganPromo'>{{ $promoRumah->promo }}</h6>
                                                <p>Berlaku hingga:
                                                    {{ date('d M Y', strtotime($promoRumah->tgl_berakhir)) }}
                                                </p>
                                                <div class="hemat">
                                                    <p class="light-grey-color">Anda bisa hemat
                                                    </p>
                                                    <h5>Rp.
                                                        {{ rupiah($promoRumah->diskon_promo) }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="promo-button col-md-2">

                                                <a class="promoCodeBtn btn btn-outline-success"
                                                    data-promo-code="{{ $promoRumah->kode_promo }}"
                                                    data-jumlah-promo="{{ $promoRumah->diskon_promo }}"
                                                    data-promo="{{ $promoRumah->promo }}">{{ $promoRumah->kode_promo }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif



                        </div>
                        <!-- STATE NO PROMO -->
                        <div class="no-promo text-center d-none">
                            <img src="{{ asset('Home') }}/images/img-illustration4.png" class="w-100" alt="">
                        </div>
                    </div>

                    <div class="modal-footer promo-footer">

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
        {{-- script find query promo selector --}}
        <script>
            const promoCodeBtns = document.querySelectorAll(".promoCodeBtn");
            const selectedPromoCodeInput = document.getElementById("selectedPromoCode");

            promoCodeBtns.forEach((promoCodeBtn) => {
                promoCodeBtn.addEventListener("click", () => {
                    const promoCode = promoCodeBtn.dataset.promoCode;
                    const promo = promoCodeBtn.dataset.promo; // Define 'promo' before using it
                    const jmlPromo = promoCodeBtn.dataset.jumlahPromo;
                    console.log(jmlPromo);
                    selectedPromoCodeInput.value = promoCode;
                    document.getElementById('textPromo').innerText = promo;

                    if (jmlPromo != 0) {
                        let jumlah = document.getElementById('jumlah');
                        jumlah.value = {{ $tipeRumah->harga_tr }} - jmlPromo;

                        document.getElementById('jumlahHarga').value = (
                            {{ $tipeRumah->harga_tr }} - 10000000 - jmlPromo);

                        var cicilanContainer = document.getElementById('cicilan'); // Use a unique ID
                        if (cicilanContainer) {
                            cicilanContainer.innerHTML = ''; // Clear the existing content
                        }

                        var total1 = ({{ $tipeRumah->harga_tr }} - 10000000 - jmlPromo);
                        var formattedTotal1 = formatRupiah2(total1);
                        var cicilanDiv1 = document.createElement('div');
                        cicilanDiv1.className = 'collapse-item';

                        cicilanDiv1.innerHTML = `
                            <div class="card-shadow">
                                <input type="radio" name="cicilan" value="1">
                                <label class="form-check-label">
                                    Cicilan 1 bulan dengan cicilan Rp ${formattedTotal1} per bulan
                                </label>
                            </div>
                        `;
                        cicilanContainer.appendChild(cicilanDiv1);

                        for (var k = 2; k <= 8; k++) {
                            var total = ({{ $tipeRumah->harga_tr }} - 10000000 - jmlPromo) / k;
                            var formattedTotal = formatRupiah2(total);
                            var cicilanDiv = document.createElement('div');
                            cicilanDiv.className = 'collapse-item';

                            cicilanDiv.innerHTML = `
                                <div class="card-shadow">
                                    <input type="radio" name="cicilan" value="${k}">
                                    <label class="form-check-label">
                                        Cicilan ${k} bulan dengan cicilan Rp ${formattedTotal} per bulan
                                    </label>
                                </div>
                            `;

                            cicilanContainer.appendChild(cicilanDiv);
                        }
                    }

                    $('#modelId').modal('toggle');
                    $('#modelId').modal('hide');
                });
            });

        </script>

        <script>
            $('#cariPromo').click(function() {
                var kodePromo = document.getElementById('promo').value;
                var spaceAlert = document.getElementById('myAlert');

                $.ajax({
                    url: '{{ route('findKuponSpesial', [$tipeRumah->id_rumah, $tipeRumah->id_tipe]) }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        kodePromo: kodePromo
                    },
                    success: function(response) {
                        var len = 1;
                        var promo = "";
                        console.log(response);
                        if (response != null) {

                            document.getElementById('textPromo').innerText = response.promo;
                            document.getElementById('selectedPromoCode').value = kodePromo;
                            for (var i = 0; i < len; i++) {
                                spaceAlert.innerHTML = '<div class="alert alert-success">' + response.promo +
                                    ' berhasil digunakan</div>';
                                var selectElement = document.getElementById('cicilanUM');
                                // Clear any existing options
                                selectElement.innerHTML = '';

                                // Create and append options based on the value of $cicilan
                                if (response.extra_cicilan == "yes") {
                                    for (var j = 1; j < response.jumlah_extra_cicilan + 1; j++) {
                                        var option = document.createElement('option');
                                        option.value = j;
                                        option.text = j + ' kali';
                                        selectElement.appendChild(option);
                                    }
                                }

                                if (response.diskon_promo != 0) {
                                    let jumlah = document.getElementById('jumlah');
                                    jumlah.value = {{ $tipeRumah->harga_tr }} - response.diskon_promo;

                                    document.getElementById('jumlahHarga').value = (
                                        {{ $tipeRumah->harga_tr }} - 10000000 - response.diskon_promo);




                                    // Remove the existing cicilan element
                                    var cicilanContainer = document.getElementById(
                                    'cicilan'); // Use a unique ID
                                    if (cicilanContainer) {
                                        cicilanContainer.innerHTML = ''; // Clear the existing content
                                    }

                                    var total1 = ({{ $tipeRumah->harga_tr }} - 10000000 - response
                                        .diskon_promo);
                                    var formattedTotal1 = formatRupiah2(total1);
                                    var cicilanDiv1 = document.createElement('div');
                                    cicilanDiv1.className = 'collapse-item';

                                    cicilanDiv1.innerHTML = `
                                        <div class="card-shadow">
                                            <input type="radio" name="cicilan" value="1">
                                            <label class="form-check-label">
                                                Cicilan 1 bulan dengan cicilan Rp ${formattedTotal1} per bulan
                                            </label>
                                        </div>
                                    `;
                                    cicilanContainer.appendChild(cicilanDiv1);
                                    console.log(total1);

                                    for (var k = 2; k <= 8; k++) {
                                        var total = ({{ $tipeRumah->harga_tr }} - 10000000 - response
                                            .diskon_promo) / k;
                                        var formattedTotal = formatRupiah2(total);
                                        var cicilanDiv = document.createElement('div');
                                        cicilanDiv.className = 'collapse-item';

                                        cicilanDiv.innerHTML = `
                                        <div class="card-shadow">
                                            <input type="radio" name="cicilan" value="${k}">
                                            <label class="form-check-label">
                                                Cicilan ${k} bulan dengan cicilan Rp ${formattedTotal} per bulan
                                            </label>
                                        </div>
                                    `;

                                        cicilanContainer.appendChild(cicilanDiv);
                                        console.log(total);
                                    }

                                }

                            }


                            $('#modelId').modal('hide');
                        } else {
                            spaceAlert.innerHTML = '<div class="alert alert-danger">Promo tidak ada</div>';
                            $('#modelId').modal('hide');
                        }



                    }
                });
            });
        </script>
        {{-- end script find query promo selector --}}

        <script>
            function hitung(jumlah, uangmuka, sukuBunga, result, result2, result3, result4, cicilanUM, sisaPengurangan) {

                var jml = document.getElementById(jumlah).value;
                jml = jml.replace(/\D/g, '');
                {{--  console.log(jml);  --}}
                var um = document.getElementById(uangmuka).value;
                var skBunga = document.getElementById(sukuBunga).value;
                var cicilanUM = document.getElementById(cicilanUM).value;
                var totalPersentase = ({{ $tipeRumah->harga_tr }} * (um / 100))
                var hasilCicilan;
                if (cicilanUM != 1) {
                    hasilCicilan = totalPersentase / cicilanUM;
                } else {
                    hasilCicilan = totalPersentase / 1;
                }

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


                if (cicilanUM != 1) {
                    hasil.innerText = "Uang muka Rp " + formatRupiah2(hasilCicilan) + " (" + um + "% dari Rp " + formatRupiah2(
                        jml) + ")";
                    hasil2.innerText = "Cicilan " + cicilanUM + " kali"
                    hasil3.innerText = "Harga cicilan uang muka Rp " + formatRupiah2(hasilCicilan) + " (" + formatRupiah2(
                        totalPersentase) + " : " + cicilanUM + ")"

                    sisa.innerText = "Sisa Pembayaran KPR Rp " + formatRupiah2(perngurangan);
                } else {
                    hasil.innerText = "Uang Muka Rp " + formatRupiah2(hasilCicilan)

                    sisa.innerText = "Sisa Pembayaran KPR Rp " + formatRupiah2(perngurangan);
                }

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

        <script></script>
    @endsection

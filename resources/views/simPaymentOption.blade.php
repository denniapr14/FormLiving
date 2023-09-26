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
                                        <img src="{{ asset('Home') }}/images/tipe/{{ $tipeRumah->img_tr }}" alt="">
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
                                                        <label for="">Booking Fee Rp. 10.000.000</label><br>
                                                        <label for="" id="diskon1"></label>
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
                                                                id="jumlah" name="jumlah" readonly
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

                                                    <div class="form-group">

                                                        <input type="text" name="promo" id="kdPromo1"
                                                            value="Tidak Ada Promo" hidden readonly class="form-control"
                                                            placeholder="" aria-describedby="helpId">

                                                    </div>
                                                    <div class="btn-groups">
                                                        <a type="button"
                                                            onclick="hitung('jumlah','persentase','sukuBunga','hasil','hasil2','hasil3','hasil4', 'cicilanUM','sisaPembayaran')"
                                                            id="hitungBtn" class="btn btn-primary">Hitung Simulasi</a>


                                                    </div>
                                                    <div class="price-total">
                                                        <p>Perkiraan pembayaran KPR Anda:</p>
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <h5 id="hasil"></h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h5 id="hasil2"></h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h5 id="hasil3"></h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h5 id="hasil4"></h5>
                                                                </td>
                                                            </tr>


                                                        </table>


                                                        <h5 id="sisaPembayaran"></h5>
                                                    </div>
                                                    <input type="text" id="diskonInputKPR" hidden readonly name="diskonInputKPR"  class="form-control">

                                                    <div class="btn-groups">
                                                        <button type="submit" type="button" id="nextKPR" disabled
                                                            style="opacity: 10%"
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

                                                        <div class="card-shadow" id='cardDiskon2' style="display: none">
                                                            <label for="" id="diskon2"></label>
                                                        </div>

                                                        <div class="collapse-item" id="cicilan">
                                                            @for ($i = 1; $i <= 8; $i++)
                                                                <?php
                                                                $thn = ($tipeRumah->harga_tr - 10000000) / $i;

                                                                ?>


                                                                <div class="card-shadow">
                                                                    <input type="radio" id="age1" name="cicilan"
                                                                        value="{{ $i }}">
                                                                    <label class="form-check-label">
                                                                        Cicilan {{ $i }} bulan dengan cicilan Rp
                                                                        {{ rupiah($thn) }} per bulan

                                                                    </label>

                                                                </div>


                                                                <br>
                                                            @endfor
                                                        </div>

                                                    </div>
                                                    <div class="form-group">

                                                        <input type="text" name="promo" id="kdPromo2"
                                                            value="Tidak Ada Promo" hidden readonly class="form-control"
                                                            placeholder="" aria-describedby="helpId">

                                                    </div>
                                                    <div class="card-shadow">
                                                        <label for="">Jumlah harga</label>
                                                    </div>
                                                    <input type="text" id="diskonInputCicilan" hidden readonly name="diskonInputCicilan" class="form-control">
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
                                    <div class="promo-item" style="width: 100%">
                                        <div class="row " style="width: 100%">
                                            <div class="promo-icon col-md-1">
                                                <img src="{{ asset('Home') }}/images/ic-promo.png" alt="Promo">
                                            </div>
                                            <div class="promo-text col-md-7">

                                                <h6 id='keteranganPromo'>{{ $promoRumah->promo }}</h6>
                                                <p>Berlaku hingga:
                                                    {{ date('d M Y', strtotime($promoRumah->tgl_berakhir)) }}
                                                </p>
                                                <div class="hemat">
                                                    <p class="light-grey-color">Anda bisa hemat
                                                    </p>
                                                    <h5>
                                                        @if ($promoRumah->jenis_promo == 'KPR')
                                                            @if ($promoRumah->status_diskon == 'persen')
                                                                Diskon Uang Muka {{ $promoRumah->diskon_promo }} %
                                                            @else
                                                                Rp. {{ rupiah($promoRumah->diskon_promo) }}
                                                            @endif
                                                        @else
                                                            @if ($promoRumah->status_diskon == 'persen')
                                                                Diskon {{ $promoRumah->diskon_promo }} %
                                                            @else
                                                                Rp. {{ rupiah($promoRumah->diskon_promo) }}
                                                            @endif
                                                        @endif
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="promo-button col-md-2">

                                                <a class="promoCodeBtn btn btn-outline-success"
                                                    data-promo-code="{{ $promoRumah->kode_promo }}"
                                                    data-jenis-promo="{{ $promoRumah->jenis_promo }}"
                                                    data-status-diskon="{{ $promoRumah->status_diskon }}"
                                                    data-jumlah-promo="{{ $promoRumah->diskon_promo }}"
                                                    data-status-max-diskon="{{ $promoRumah->status_max_diskon }}"
                                                    data-max-diskon="{{ $promoRumah->max_diskon }}"
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
            const uangMuka10 = {{ $tipeRumah->harga_tr }} * (10 / 100);
            const hargaRumah = document.getElementById('jumlah');
            const persentaseInput = document.getElementById('persentase');
            // Initialize uangMukaAsli with the initial value of the input
            let uangMukaAsli = persentaseInput.value;
            persentaseInput.addEventListener('input', function() {
                // Update uangMukaAsli when the input value changes
                uangMukaAsli = persentaseInput.value;
                // You can also perform additional actions here if needed
                // For example, update other elements based on the new value
            });
        </script>
        {{-- script find query promo selector --}}
        <script>
            const promoCodeBtns = document.querySelectorAll(".promoCodeBtn");
            const selectedPromoCodeInput = document.getElementById("selectedPromoCode");
            var promoCode, jenisPromo, statusDiskon, diskonPromo, statusMaxDiskon, maxDiskon, promo;
            promoCodeBtns.forEach((promoCodeBtn) => {
                promoCodeBtn.addEventListener("click", () => {
                    {{--  const promoCode = promoCodeBtn.dataset.promoCode;
                    const promo = promoCodeBtn.dataset.promo; // Define 'promo' before using it
                    const jmlPromo = promoCodeBtn.dataset.diskonPromo;  --}}

                    promoCode = promoCodeBtn.getAttribute('data-promo-code');
                    jenisPromo = promoCodeBtn.getAttribute('data-jenis-promo');
                    statusDiskon = promoCodeBtn.getAttribute('data-status-diskon');
                    diskonPromo = promoCodeBtn.getAttribute('data-jumlah-promo');
                    statusMaxDiskon = promoCodeBtn.getAttribute('data-status-max-diskon');
                    maxDiskon = promoCodeBtn.getAttribute('data-max-diskon');
                    promo = promoCodeBtn.getAttribute('data-promo');

                    const dataPromo = {
                        promoCode: promoCodeBtn.dataset.promoCode,
                        promo: promoCodeBtn.dataset.promo, // Define 'promo' before using it
                        diskonPromo: promoCodeBtn.dataset.diskonPromo,
                        jenisPromo: promoCodeBtn.dataset.jenisPromo,
                        statusDiskon: promoCodeBtn.dataset.statusDiskon,

                        statusMaxDiskon: promoCodeBtn.dataset.statusMaxDiskon,
                        maxDiskon: promoCodeBtn.dataset.maxDiskon,
                    }
                    console.log(dataPromo);

                    selectedPromoCodeInput.value = promoCode;
                    document.getElementById('textPromo').innerText = promo;

                    CekPromo(jenisPromo, statusDiskon, diskonPromo, statusMaxDiskon, maxDiskon);
                    console.log(CekPromo(jenisPromo, statusDiskon, diskonPromo, statusMaxDiskon, maxDiskon));


                    $('#modelId').modal('toggle');
                    $('#modelId').modal('hide');
                });
            });

            function CekPromo(jenisPromo, statusDiskon, diskonPromo, statusMaxDiskon, maxDiskon) {

                if (jenisPromo == "KPR") {
                    if (statusDiskon == 'persen' && diskonPromo > 0) {
                        var persentase = uangMukaAsli / 100;
                        console.log(persentase);
                        var diskonPercentage = Math.round({{ $tipeRumah->harga_tr }} * persentase);
                        console.log(diskonPercentage);
                        // uang Muka 10%
                        var totalDiskon = Math.round(diskonPercentage - (diskonPercentage * (diskonPromo / 100)));
                        document.getElementById('diskonInputKPR').value = totalDiskon;
                        console.log(totalDiskon);
                        console.log(applyMaxDiskon(totalDiskon, maxDiskon, statusMaxDiskon));
                        return applyMaxDiskon(totalDiskon, maxDiskon, statusMaxDiskon);

                    } else if (statusDiskon == "rupiah" && diskonPromo > 0) {
                        // Handle rupiah discount here
                    }
                } else if (jenisPromo == "Cicilan") {
                    let diskonCicilan = document.getElementById('diskon2');
                    let diskonCard2 = document.getElementById('cardDiskon2');
                    let totalDiskon;
                    if (statusDiskon == "persen") {
                        totalDiskon = {{ $tipeRumah->harga_tr }} * (diskonPromo /
                            100);
                        if (statusMaxDiskon == "persen") {
                            totalDiskon = {{ $tipeRumah->harga_tr }} * (maxDiskon /
                                100)
                        } else {
                            totalDiskon = maxDiskon;
                        }
                        if (totalDiskon >= maxDiskon) {
                            totalDiskon = maxDiskon;
                        }
                        createCicilan(totalDiskon);
                        diskonCicilan.textContent = "kamu mendapatkan promo sebesar : Rp " +
                            formatRupiah2(totalDiskon);
                        diskonCicilan.style.color = "green";
                        diskonCard2.style.display = "block";

                    } else if (statusDiskon == "rupiah") {
                        totalDiskon = diskonPromo;
                        if (statusMaxDiskon == "persen") {
                            totalDiskon = {{ $tipeRumah->harga_tr }} * (maxDiskon /
                                100)
                        } else {
                            totalDiskon = maxDiskon;
                        }
                        if (totalDiskon >= maxDiskon) {
                            totalDiskon = maxDiskon;
                        }
                        createCicilan(totalDiskon);
                        diskonCicilan.textContent = "kamu mendapatkan promo sebesar : Rp " +
                            formatRupiah2(totalDiskon);
                        diskonCicilan.style.color = "green";
                        diskonCard2.style.display = "block";
                    }
                    document.getElementById('diskonInputCicilan').value = totalDiskon;

                } else {
                    document.getElementById('kdPromo1').value = promoCode;

                    document.getElementById('diskon1').innerText = "Sudah dipotong Diskon : Rp. " +
                        formatRupiah2(diskonPromo);
                    document.getElementById('cardDiskon2').style.display = "block";
                    document.getElementById('kdPromo2').value = promoCode;
                    document.getElementById('diskon2').innerText = "Sudah dipotong Diskon : Rp. " +
                        formatRupiah2(diskonPromo);
                }




            }

            function applyMaxDiskon(diskonPromo, maxDiskon, status) {
                if (status == 'persen') {
                    const maxDiskonValue = (maxDiskon / 100) * {{ $tipeRumah->harga_tr }};
                    console.log(maxDiskonValue);
                    return Math.min(diskonPromo, maxDiskonValue);
                } else if (status == 'rupiah') {
                    return Math.min(diskonPromo, maxDiskon);
                }
                return diskonPromo;
            }
        </script>

        <script>
            $('#cariPromo').click(function() {
                var kodePromo = document.getElementById('promo').value;
                var spaceAlert = document.getElementById('myAlert');


                $.ajax({
                    url: '{{ route('findKuponSpesial', [$tipeRumah->id_rumah, $tipeRumah->id_tipe_rumah]) }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        kodePromo: kodePromo
                    },
                    success: function(response) {
                        var len = 1;
                        var promo = "";
                        console.log(response);
                        if (response.promo != null) {
                            var diskon;
                            var totalDiskon, maxDiskon;
                            if (response.jenis_promo == "KPR") {
                                CekPromo("KPR", response.status_diskon, response.diskon_promo, response.statusMaxDiskon, response.max_diskon);

                            } else if (response.jenis_promo == "Cicilan") {
                                let diskonCicilan = document.getElementById('diskon2');
                                let diskonCard2 = document.getElementById('cardDiskon2');

                                console.log('status diskon '+ response.status_diskon);
                                if (response.status_diskon == "persen") {
                                    totalDiskon = {{ $tipeRumah->harga_tr }} * (response.diskon_promo /
                                        100);
                                        console.log('INI ADALAH totalDiskon'+totalDiskon);
                                    if (response.status_max_diskon == "persen") {
                                        maxDiskon = {{ $tipeRumah->harga_tr }} * (response.max_diskon /
                                            100)
                                    } else {
                                        maxDiskon = response.max_diskon;
                                    }
                                    if (totalDiskon >= maxDiskon) {
                                        totalDiskon = maxDiskon;
                                    }
                                    createCicilan(totalDiskon);
                                    diskonCicilan.textContent = "kamu mendapatkan promo sebesar : Rp " +
                                        formatRupiah2(totalDiskon);
                                    diskonCicilan.style.color = "green";
                                    diskonCard2.style.display = "block";

                                } else if (response.status_diskon == "rupiah") {
                                    totalDiskon =  response.diskon_promo;
                                    if (response.status_max_diskon == "persen") {
                                        maxDiskon = {{ $tipeRumah->harga_tr }} * (response.max_diskon /
                                            100)
                                    } else {
                                        maxDiskon = response.max_diskon;
                                    }
                                    if (totalDiskon >= maxDiskon) {
                                        totalDiskon = maxDiskon;
                                    }
                                    createCicilan(totalDiskon);
                                    diskonCicilan.textContent = "kamu mendapatkan promo sebesar : Rp " +
                                        formatRupiah2(totalDiskon);
                                    diskonCicilan.style.color = "green";
                                    diskonCard2.style.display = "block";
                                }


                            }
                            selectedPromoCodeInput.value = response.kode_promo;
                            document.getElementById('textPromo').innerText = response.promo;


                            $('#modelId').modal('hide');
                        } else {
                            spaceAlert.innerHTML = '<div class="alert alert-danger">Promo tidak ada</div>';
                            $('#modelId').modal('hide');
                        }



                    },
                    error: function(error) {
                        console.log(error);
                    }

                });
            });

            function createCicilan(totalDiskon) {
                let jumlah = document.getElementById('jumlah');
                jumlah.value = {{ $tipeRumah->harga_tr }} - totalDiskon;

                document.getElementById('jumlahHarga').value = (
                    {{ $tipeRumah->harga_tr }} - 10000000 - totalDiskon);

                var cicilanContainer = document.getElementById(
                    'cicilan'); // Use a unique ID
                if (cicilanContainer) {
                    cicilanContainer.innerHTML = ''; // Clear the existing content
                }

                var total1 = ({{ $tipeRumah->harga_tr }} - 10000000 - totalDiskon);
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
                    var total = ({{ $tipeRumah->harga_tr }} - 10000000 - totalDiskon) / k;
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
                var hasilUM = {{ $tipeRumah->harga_tr }} * (um/100);
                console.log(uangMukaAsli);
                var hasilCicilan;
                var hasilPromo;
                var cekPromo = CekPromo("KPR", statusDiskon, diskonPromo, statusMaxDiskon, maxDiskon);
                console.log(cekPromo);
                if(cekPromo){
                    hasilPromo = CekPromo("KPR", statusDiskon, diskonPromo, statusMaxDiskon, maxDiskon);
                    if (cicilanUM != 1) {
                        hasilCicilan = (hasilUM - hasilPromo) / cicilanUM;
                    } else {
                        hasilCicilan = hasilUM - hasilPromo;
                    }

                }else{
                    hasilPromo = 0;
                    if (cicilanUM != 1) {
                        hasilCicilan = hasilUM / cicilanUM;
                    } else {
                        hasilCicilan = hasilUM / 1;
                    }

                }


                var hasil = document.getElementById(result);
                var hasil2 = document.getElementById(result2);
                var hasil3 = document.getElementById(result3);
                var hasil4 = document.getElementById(result4);
                var sisa = document.getElementById(sisaPengurangan);
                var cicilan;
                var cicilan2;

                var perngurangan = jml - hasilUM;
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

                    if(CekPromo("KPR", statusDiskon, diskonPromo, statusMaxDiskon, maxDiskon)){


                        hasil.innerText = "Uang muka Rp " + formatRupiah2(hasilUM) + " Menjadi Rp. "+  formatRupiah2(hasilUM-hasilPromo)+" dari Rp " + formatRupiah2(
                            jml) +" dengan diskon Rp. "+ formatRupiah2(hasilPromo);
                            hasil3.innerText = "Harga cicilan uang muka Rp " + formatRupiah2(hasilCicilan) + " (" + formatRupiah2(hasilUM-hasilPromo
                            ) + " : " + cicilanUM + ")"

                    }else{
                        hasil.innerText = "Uang muka Rp " + formatRupiah2(hasilUM) + " dari Rp " + formatRupiah2(
                            jml);
                            hasil3.innerText = "Harga cicilan uang muka Rp " + formatRupiah2(hasilCicilan) + " (" + formatRupiah2(hasilUM
                            ) + " : " + cicilanUM + ")"

                    }

                    hasil2.innerText = "Cicilan " + cicilanUM + " kali"

                    sisa.innerText = "Sisa Pembayaran KPR Rp " + formatRupiah2(perngurangan);
                } else {
                    hasil.innerText = "Uang Muka Rp " + formatRupiah2(um)

                    sisa.innerText = "Sisa Pembayaran KPR Rp " + formatRupiah2(perngurangan);
                }

                document.getElementById('nextKPR').disabled = false;
                document.getElementById('nextKPR').style.opacity = "100%";
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

@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle', 'Forms | Simulasi Harga')
@section('body', '')


@section('content')
    <script type='text/javascript'>
        {{--  $(document).ready(function(){
        $("#test").click(function(){
            alert("jQuery is working perfectly.");
        });
    });  --}}
        $(document).ready(function() {
            $('#getSkBunga').change(function() {
                var getNama = $(this).val();
                console.log(getNama);
                $('#namaBank').find('option').not(':first').remove();

                $.ajax({
                    url: '/simulation-price-payment/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}/{{ $pelanggan->id_pelanggan }}/{{ $kdPromo }}/{{ $payment }}/' +
                        getNama,

                    method: "GET",

                    dataType: 'json',
                    success: function(response) {

                        console.log(response);
                        var len = 0;

                        {{--  for (var i = 0; i < response.length; i++) {
                            var option = "<option value='" +response[i].id_bunga+ "'> Bank " + response[i].nama_bank + " Bunga "+ response[i].persentase +"%</option>";
                            $("#namaBank").append(option);
                        }  --}}

                        if (response != null) {
                            len = response.length;
                        }

                        if (len > 0) {
                            // Read data and create <option >
                            for (var i = 0; i < len; i++) {

                                var id = response[i].id_bunga;
                                var name = response[i].nama_bank;
                                var persen = response[i].persentase;

                                var option = "<option value='" + id + "|" + persen + "'>Bank " +
                                    name + " Bunga " + persen + "%</option>";

                                $("#namaBank").append(option);
                            }
                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            const date = new Date();
            $('#uangMuka').change(function() {


                var uangMuka = $(this).val();
                console.log(uangMuka);


                const existingDiv = document.getElementById('UMText');
                existingDiv.innerHTML ='' ;

                const row = document.createElement('div');
                // Set some attributes for the new div

                row.className = 'row';
                row.innerHTML = '<label> Cicilan Uang Muka </label>';

                existingDiv.appendChild(row);

                const col1 = document.createElement('div');

                col1.className = 'col';
                col1.innerHTML = 'Rp ' + ChangeRupiah(uangMuka / 4);

                row.appendChild(col1);


                let nextMonthDate = new Date(date.getTime() + (7 * 24 * 60 * 60 * 1000));

                const col2 = document.createElement('div');


                let day = nextMonthDate.getDate();
                let month = nextMonthDate.getMonth(); // Add 1 to adjust for zero-based indexing
                let year = nextMonthDate.getFullYear() % 100; // Get the last two digits of the year
                console.log(month);
                let monthNames = [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ];

                // Get the month name from the array
                let monthName = monthNames[month];

                let formattedDateID = `${day} ${monthName} ${year}`;
                col2.className = 'col';
                col2.innerHTML = formattedDateID;

                row.appendChild(col2);

                for (um = 1; um < 4; um++) {

                    // Create a new div element

                    const row = document.createElement('div');
                    // Set some attributes for the new div

                    row.className = 'row';
                    row.innerHTML = '';

                    existingDiv.appendChild(row);

                    const col1 = document.createElement('div');

                    col1.className = 'col';
                    col1.innerHTML = 'Rp ' + ChangeRupiah(uangMuka / 4);

                    row.appendChild(col1);

                    let nextMonthDate = new Date(date.getTime() + ((30 * 24 * 60 * 60 * 1000)) * um + (7 *
                        24 * 60 * 60 * 1000));
                    {{--  if(um == 1){

                    }else{
                       nextMonthDate = new Date(date.getTime() + ((30) * 24 * 60 * 60 * 1000) * um );
                    }  --}}

                    const col2 = document.createElement('div');

                    {{--  let formattedDate = nextMonthDate.toDateString();  --}}
                    let day = nextMonthDate.getDate();
                    let month = nextMonthDate.getMonth(); // Add 1 to adjust for zero-based indexing
                    let year = nextMonthDate.getFullYear() % 100; // Get the last two digits of the year

                    let monthNames = [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                        "July",
                        "August",
                        "September",
                        "October",
                        "November",
                        "December"
                    ];

                    // Get the month name from the array
                    let monthName = monthNames[month];

                    let formattedDateID = `${day} ${monthName} ${year}`;
                    col2.className = 'col';
                    col2.innerHTML = formattedDateID;

                    row.appendChild(col2);
                    // Append the new div to the existing div

                    {{--  <div class="row">
                        <div class="col">
                            Rp.
                            {{ rupiah(($tipeRumah->harga_tr * (10*$in / 100) - 10000000) / 4) }}
                        </div>
                        <div class="col">

                            {{ date('d M Y', $date) }}
                        </div>
                    </div>  --}}
                }

            });
        });

        function ChangeRupiah(angkaRupiah) {
            var bilangan = angkaRupiah;
            var reverse = bilangan.toString().split('').reverse().join(''),
                ribuanAngka = reverse.match(/\d{1,3}/g);
            ribuanAngka = ribuanAngka.join('.').split('').reverse().join('');
            return ribuanAngka;
        }

        {{--  $(document).ready(function() {
            const date = new Date();
            $('#uangMuka').click(function() {
                var uangMuka = $(this).val();
                console.log(uangMuka);

                }

            });
        });  --}}
    </script>
    <div class="cluster">
        <div class="header-simulation mobile-only">
            <div class="ornament one">
                <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
            </div>
            <div class="nav-header">
                <div class="ic-back">
                    <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">
                </div>
                <h2 class="title">
                    Miliki Unit
                </h2>
                <div></div>
            </div>

            <div class="steps">
                <div class="step done">1</div>
                <div class="step done">2</div>
                <div class="step done">3</div>
                <div class="step done">4</div>
                <div class="step done">5</div>
                <div class="step done">6</div>
                <div class="step active">7</div>
                <div class="step last">8</div>
            </div>

        </div>
        <div class="container">
            <div class="steps">
                <div class="step done">1</div>
                <div class="step done">2</div>
                <div class="step done">3</div>
                <div class="step done">4</div>
                <div class="step done">5</div>
                <div class="step done">6</div>
                <div class="step active">7</div>
                <div class="step last">8</div>
            </div>
            <div>


                <div class="second-layout">
                    <div class="row">
                        <div class="col-12 order-2 order-lg-1">
                            <h2 class="title">
                                Simulasi Kredit @if ($payment == 'KPR')
                                    KPR
                                @elseif($payment == 'Cicilan')
                                Inhouse
                                @endif
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
                            @if (!empty($payment))
                                @if ($payment == 'KPR')

                                    <form
                                        action="{{ route('simulation-price-payment.action', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah,$pelanggan->id_pelanggan,$kdPromo, $payment]) }}"
                                        method="POST">
                                        @csrf
                                        <div class="simulation-price">
                                            <div class="card-shadow">
                                                <label for="">Bank</label>
                                            </div>
                                            <div class="">

                                                <select class="form form-control" id="getSkBunga">

                                                    <option value="">--Pilih--</option>

                                                    @foreach ($skBunga as $bank)
                                                        <option value="{{ $bank->nama_bank }}">
                                                            {{ $bank->nama_bank }}
                                                        </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <br>
                                            <div class="card-shadow">
                                                <label for="">Bank Promo</label>
                                            </div>
                                            <div class="">
                                                <select name="namaBank" class="form form-control" id="namaBank">
                                                    <option value="">--Pilih--</option>
                                                </select>

                                            </div>
                                            <br>
                                            <div class="card-shadow">
                                                <label for="">Booking Fee Rp. {{ rupiah(10000000) }}</label>
                                            </div>
                                            <div class="card-shadow">
                                                <label for="">Uang Muka</label>
                                            </div>
                                            <div class="">
                                                <select name="uangMuka" id="uangMuka" onclick="Display()" class="form-control">
                                                    @if (!empty($promo))
                                                    @for ($i = 1; $i < 6; $i++)
                                                    <option
                                                        value="{{ ($tipeRumah->harga_tr - $promo->diskon_promo) * ((10 * $i) / 100) - 10000000 }}">
                                                        {{ rupiah(($tipeRumah->harga_tr - $promo->diskon_promo) * ((10 * $i) / 100) - 10000000) }}
                                                        Uang muka {{ 10 * $i }} %</option>
                                                        @endfor
                                                    @else
                                                    @for ($i = 1; $i < 6; $i++)
                                                    <option
                                                        value="{{ $tipeRumah->harga_tr * ((10 * $i) / 100) - 10000000 }}">
                                                        {{ rupiah($tipeRumah->harga_tr * ((10 * $i) / 100) - 10000000) }}
                                                        Uang muka {{ 10 * $i }} %</option>
                                                        @endfor
                                                    @endif


                                                </select>
                                                <br>
                                            </div>
                                            <?php
                                            $date = date('d M');
                                            $date = strtotime($date);
                                            $date = strtotime('+7 day', $date);
                                            ?>
                                            @if (!empty(Session::get('user')))
                                            <div class="card-shadow">
                                                <div id="UMText">

                                                </div>
                                            </div>
                                                @if ($rumah->status_stock == 'Inden')
                                                    <div class="card-shadow">
                                                        <label for="">Cicilan Uang Muka</label>
                                                        @if (!empty($promo))
                                                        <select name="cicilanUM" id="10" style="display: none" class="form-control">
                                                            <option value="" selected>--Pilih Cicilan 10%--</option>
                                                            @for ($i = 1; $i < 7; $i++)
                                                            <option value="{{ $i }}">Rp.
                                                                {{ rupiah(( ($tipeRumah->harga_tr - $promo->diskon_promo)  * (10 / 100) - 10000000)/$i) }}
                                                                Per Bulan Cicilan {{ $i }} Kali Uang Muka 10 %</option>
                                                            @endfor
                                                        </select>

                                                        <select name="cicilanUM" id="20" style="display: none" class="form-control">
                                                            <option value="" selected>--Pilih Cicilan 20%--</option>
                                                            @for ($i = 1; $i < 7; $i++)
                                                            <option value="{{ $i }}">Rp.
                                                                {{ rupiah(( ($tipeRumah->harga_tr - $promo->diskon_promo)  * (20 / 100) - 10000000)/$i) }}
                                                                Per Bulan Cicilan {{ $i }} Kali Uang Muka 20 %</option>
                                                            @endfor
                                                        </select>

                                                        <select name="cicilanUM" id="30" style="display: none" class="form-control">
                                                            <option value="" selected>--Pilih Cicilan 30%--</option>
                                                            @for ($i = 1; $i < 7; $i++)
                                                            <option value="{{ $i }}">Rp.
                                                                {{ rupiah(( ($tipeRumah->harga_tr - $promo->diskon_promo)  * (30 / 100) - 10000000)/$i) }}
                                                                Per Bulan Cicilan {{ $i }} Kali Uang Muka 30 %</option>
                                                            @endfor
                                                        </select>

                                                        <select name="cicilanUM" id="40" style="display: none" class="form-control">
                                                            <option value="" selected>--Pilih Cicilan 40%--</option>
                                                            @for ($i = 1; $i < 7; $i++)
                                                            <option value="{{ $i }}">Rp.
                                                                {{ rupiah(( ($tipeRumah->harga_tr - $promo->diskon_promo)  * (40 / 100) - 10000000)/$i) }}
                                                                Per Bulan Cicilan {{ $i }} Kali Uang Muka 40 %</option>
                                                            @endfor
                                                        </select>
                                                        <select name="cicilanUM" id="50" style="display: none" class="form-control">
                                                            <option value="" selected>--Pilih Cicilan 50%--</option>
                                                            @for ($i = 1; $i < 7; $i++)
                                                            <option value="{{ $i }}">Rp.
                                                                {{ rupiah(( ($tipeRumah->harga_tr - $promo->diskon_promo)  * (50 / 100) - 10000000)/$i) }}
                                                                Per Bulan Cicilan {{ $i }} Kali Uang Muka 50 %</option>
                                                            @endfor
                                                        </select>
                                                        @else
                                                            <select name="cicilanUM" id="10" style="display: none" class="form-control">
                                                                <option value="" selected>--Pilih Cicilan 10%--</option>
                                                                @for ($i = 1; $i < 7; $i++)
                                                                <option value="{{ $i }}">Rp.
                                                                    {{ rupiah(( ($tipeRumah->harga_tr - $promo->diskon_promo)  * (10 / 100) - 10000000)/$i) }}
                                                                    Per Bulan Cicilan {{ $i }} Kali Uang Muka 10 %</option>
                                                                @endfor
                                                            </select>

                                                            <select name="cicilanUM" id="20" style="display: none" class="form-control">
                                                                <option value="" selected>--Pilih Cicilan 20%--</option>
                                                                @for ($i = 1; $i < 7; $i++)
                                                                <option value="{{ $i }}">Rp.
                                                                    {{ rupiah((  $tipeRumah->harga_tr * (20 / 100) - 10000000 )/$i) }}
                                                                    Per Bulan Cicilan {{ $i }} Kali Uang Muka 20 %</option>
                                                                @endfor
                                                            </select>

                                                            <select name="cicilanUM" id="30" style="display: none" class="form-control">
                                                                <option value="" selected>--Pilih Cicilan 30%--</option>
                                                                @for ($i = 1; $i < 7; $i++)
                                                                <option value="{{ $i }}">Rp.
                                                                    {{ rupiah(($tipeRumah->harga_tr * (10 / 100) - 10000000)/$i) }}
                                                                    Per Bulan Cicilan {{ $i }} Kali Uang Muka 30 %</option>
                                                                @endfor
                                                            </select>

                                                            <select name="cicilanUM" id="40" style="display: none" class="form-control">
                                                                <option value="" selected>--Pilih Cicilan 40%--</option>
                                                                @for ($i = 1; $i < 7; $i++)
                                                                <option value="{{ $i }}">Rp.
                                                                    {{ rupiah(($tipeRumah->harga_tr * (10 / 100) - 10000000)/$i) }}
                                                                    Per Bulan Cicilan {{ $i }} Kali Uang Muka 40 %</option>
                                                                @endfor
                                                            </select>
                                                            <select name="cicilanUM" id="50" style="display: none" class="form-control">
                                                                <option value="" selected>--Pilih Cicilan 50%--</option>
                                                                @for ($i = 1; $i < 7; $i++)
                                                                <option value="{{ $i }}">Rp.
                                                                    {{ rupiah(($tipeRumah->harga_tr * (10 / 100) - 10000000)/$i) }}
                                                                    Per Bulan Cicilan {{ $i }} Kali Uang Muka 50 %</option>
                                                                @endfor
                                                            </select>

                                                        @endif




                                                    </div>

                                                @endif
                                            @endif
                                            @if (!empty(Session::get('guest')))
                                                @if ($rumah->status_stock == 'Inden')
                                                    <div class="card-shadow">
                                                        <div id="UMText">

                                                        </div>
                                                    </div>

                                                    {{--  @for ($in = 1; $in < 6; $in++)


                                                    <div class="card-shadow">
                                                        <label for="">Cicilan Uang Muka {{ 10*$in }} %</label>

                                                        <div class="row">
                                                            <div class="col">
                                                                Rp.
                                                                {{ rupiah(($tipeRumah->harga_tr * (10*$in / 100) - 10000000) / 4) }}
                                                            </div>
                                                            <div class="col">

                                                                {{ date('d M Y', $date) }}
                                                            </div>
                                                        </div>
                                                        @for ($i = 0; $i < 3; $i++)
                                                            <div class="row">
                                                                <div class="col">
                                                                    Rp.
                                                                    {{ rupiah(($tipeRumah->harga_tr * (10*$in / 100) - 10000000) / 4) }}
                                                                </div>
                                                                <div class="col">
                                                                    <?php $date = strtotime('+30 day', $date);
                                                                    ?>
                                                                    {{ date('d M Y', $date) }}
                                                                </div>
                                                            </div>
                                                        @endfor


                                                    </div>
                                                @endfor  --}}
                                                @endif
                                            @endif

                                            <div class="card-shadow">
                                                <label for="">Jumlah Plafon KPR</label>
                                            </div>
                                            @if (!empty($promo))
                                            <div class="">
                                                <input type="text" readonly class="form-control card-shadow"
                                                    name="jumlah" id="jumlahHarga" aria-describedby="helpId" placeholder=""
                                                    onkeyup="getValue('jumlahHarga')"
                                                    value="{{ rupiah(($tipeRumah->harga_tr -  $promo->diskon_promo) - ((($tipeRumah->harga_tr-  $promo->diskon_promo) * (10 / 100)) - 10000000)) }}">
                                            </div>
                                            @else
                                            <div class="">
                                                <input type="text" readonly class="form-control card-shadow"
                                                    name="jumlah" id="jumlahHarga" aria-describedby="helpId" placeholder=""
                                                    onkeyup="getValue('jumlahHarga')"
                                                    value="{{ rupiah($tipeRumah->harga_tr - ($tipeRumah->harga_tr * (10 / 100) - 10000000)) }}">
                                            </div>
                                            @endif



                                        </div>
                                        <div class="btn-groups">
                                            <a type="button"
                                                onclick="hitung('jumlahHarga','uangMuka','namaBank','hasil','hasil2','hasil3','hasil4')"
                                                class="btn btn-primary">Hitung Simulasi</a>
                                        </div>
                                        @if ($payment == 'KPR')
                                        <div class="price-total">
                                            <p>Perkiraan pembayaran KPR Anda:</p>
                                            <h5 id="hasil">/ Bulan</h5>
                                            <h5 id="hasil2">/ Bulan</h5>
                                            <h5 id="hasil3">/ Bulan</h5>
                                            <h5 id="hasil4">/ Bulan</h5>
                                        </div>
                                        @endif

                                        <div class="btn-groups">
                                            <a href="/simulation-payment-option/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}/{{ $pelanggan->id_pelanggan }}/{{ $kdPromo }}"
                                                type="button" class="btn btn-grey">Kembali</a>
                                            <button type="submit" type="button" id="next" disabled="true"
                                                class="btn btn-primary">Lanjutkan</button>
                                        </div>
                                    </form>
                                @elseif($payment == 'Cicilan')
                                    <form
                                        action="{{ route('simulation-price-payment.action', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah,$pelanggan->id_pelanggan,$kdPromo, $payment]) }}"
                                        method="POST">
                                        <div class="simulation-price">
                                            @csrf
                                            @if (!empty($promo))
                                            <div class="form-group card-shadow">
                                              <label for="">Booking Fee</label>
                                             Rp {{ rupiah(10000000) }}
                                            </div>
                                            <br>
                                            @for ($i = 1; $i < 5; $i++)
                                            <?php
                                            $thn = (($tipeRumah->harga_tr - $promo->diskon_promo)-10000000)/ (3 * $i);

                                            ?>

                                            <div class="collapse-item">
                                                <a class="card-shadow" data-bs-toggle="collapse"
                                                    href="#bank{{ $i }}" role="button"
                                                    aria-expanded="false" aria-controls="bank">
                                                    Cicilan {{ 3 * $i }} Bulan
                                                </a>
                                                <div class="" id="bank{{ $i }}">
                                                    <div class="card card-body">
                                                        <div class="form-check form-radio">
                                                            <input type="radio" id="age1" name="cicilan"
                                                                value="{{ 3 * $i }}">
                                                            <label class="form-check-label">
                                                                Rp {{ pembulatan(round($thn, -3) + 1000) }} Per Bulan

                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        @endfor
                                            @else
                                            <div class="form-group card-shadow">
                                              <label for="">Booking Fee</label>
                                              Rp{{ rupiah(10000000) }}
                                            </div>
                                            <br>
                                            @for ($i = 1; $i < 5; $i++)
                                            <?php
                                            $thn = ($tipeRumah->harga_tr - 10000000) / (3 * $i);

                                            ?>

                                            <div class="collapse-item">
                                                <a class="card-shadow" data-bs-toggle="collapse"
                                                    href="#bank{{ $i }}" role="button"
                                                    aria-expanded="false" aria-controls="bank">
                                                    Cicilan {{ 3 * $i }} Bulan
                                                </a>
                                                <div class="" id="bank{{ $i }}">
                                                    <div class="card card-body">
                                                        <div class="form-check form-radio">
                                                            <input type="radio" id="age1" name="cicilan"
                                                                value="{{ 3 * $i }}">
                                                            <label class="form-check-label">
                                                                Rp {{ pembulatan(round($thn, -3) + 1000) }} Per Bulan

                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        @endfor
                                            @endif

                                        </div>
                                        <div class="btn-groups">
                                            <a href="/simulation-payment-option/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}/{{ $pelanggan->id_pelanggan }}/{{ $kdPromo }}"
                                                type="button" class="btn btn-grey">Kembali</a>
                                            <button type="submit" type="button" id=""
                                                class="btn btn-primary">Lanjutkan</button>
                                        </div>
                                    </form>
                                @endif


                            @endif

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>

@endsection

<script>
    function hitung(jumlah, uangmuka, sukubunga, result, result2, result3, result4) {

        var jml = document.getElementById(jumlah).value;
        jml = jml.replace(/\D/g, '');
        console.log(jml);
        var um = document.getElementById(uangmuka).value;
        {{--  um = um.replace(/\D/g, '');  --}}
        console.log(um);
        var sb = document.getElementById(sukubunga).value;
        const suku = sb.split("|");
        console.log(sb);
        {{--  var thn = document.getElementById(tahun).value;  --}}
        var hasil = document.getElementById(result);
        var hasil2 = document.getElementById(result2);
        var cicilan;
        var cicilan2;
        var perngurangan = (jml - um);
        /*
        ir - interest rate per month
        np - number of periods (months)
        pv - present value
        fv - future value (residual value)
        */

        cicilan = calculatePMT(perngurangan, suku[1], 60);
        console.log(jml);
        console.log(cicilan);
        var hasilRupiah = formatRupiah2(cicilan);
        cicilan2 = calculatePMT(perngurangan, suku[1], 120);
        console.log(cicilan2);
        var hasilRupiah2 = formatRupiah2(cicilan2);

        cicilan3 = calculatePMT(perngurangan, suku[1], 180);
        console.log(cicilan3);
        var hasilRupiah3 = formatRupiah2(cicilan3);

        cicilan4 = calculatePMT(perngurangan, suku[1], 240);
        console.log(cicilan4);
        var hasilRupiah4 = formatRupiah2(cicilan4);

        console.log(hasilRupiah);
        console.log(hasilRupiah2);
        {{--  var hasilCicilan = Math.round(parseInt((cicilan / 1000)) * 1000).toString(),
            sisa = hasilCicilan.length % 3,
            rupiah = hasilCicilan.substr(0, sisa),
            ribuan = hasilCicilan.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        cicilan2 = ((jml - um) * (sb / 100) * 20) / (20 * 12);
        console.log(cicilan2);

        var hasilCicilan2 = Math.round(parseInt((cicilan2 / 1000)) * 1000).toString(),
            sisa2 = hasilCicilan2.length % 3,
            rupiah2 = hasilCicilan2.substr(0, sisa2),
            ribuan2 = hasilCicilan2.substr(sisa2).match(/\d{3}/g);

        if (ribuan2) {
            separator2 = sisa2 ? '.' : '';
            rupiah2 += separator2 + ribuan2.join('.');
        }
        console.log(hasilCicilan);
        console.log(hasilCicilan2);

        console.log(rupiah2);  --}}

        hasil.innerText = "Cicilan KPR Selama 5 Tahun " + hasilRupiah + "/ Bulan";
        hasil2.innerText = "Cicilan KPR Selama 10 Tahun " + hasilRupiah2 + "/ Bulan";
        hasil3.innerText = "Cicilan KPR Selama 15 Tahun " + hasilRupiah3 + "/ Bulan";
        hasil4.innerText = "Cicilan KPR Selama 20 Tahun " + hasilRupiah4 + "/ Bulan";
        document.getElementById('next').disabled = false;
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

<script>
    function Display(){
        var index = document.getElementById("uangMuka").selectedIndex;

        switch(index) {
            case 0:
            document.getElementById('10').style.display = "block";
            document.getElementById('20').style.display = "none";
            document.getElementById('30').style.display = "none";
            document.getElementById('40').style.display = "none";
              break;
            case 1:
            document.getElementById('10').style.display = "none";
            document.getElementById('20').style.display = "block";
            document.getElementById('30').style.display = "none";
            document.getElementById('40').style.display = "none";

              // code block
              break;
            case 3:
            document.getElementById('10').style.display = "none";
            document.getElementById('20').style.display = "none";
            document.getElementById('30').style.display = "block";
            document.getElementById('40').style.display = "none";
                // code block
                break;
            case 4:
            document.getElementById('10').style.display = "none";
            document.getElementById('20').style.display = "none";
            document.getElementById('30').style.display = "none";
            document.getElementById('40').style.display = "block";

                  // code block
                  break;
            default:
              // code block
          }


    }
</script>


<?php
function rupiah($angka)
{
    $hasil_rupiah = number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function pembulatan($uang)
{
    $ratusan = substr($uang, -2);
    if ($ratusan < 500) {
        $akhir = $uang - $ratusan;
    } else {
        $akhir = $uang + (1000 - $ratusan);
    }
    echo number_format($akhir, 2, ',', '.');
}
?>

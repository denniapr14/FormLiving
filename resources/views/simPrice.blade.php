@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle', 'Forms | Simulasi Harga')
@section('body', '')


@section('content')

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
                <div class="step active">5</div>
                <div class="step ">6</div>
                <div class="step last">7</div>
                {{--  <div class="step">7</div>  --}}
            </div>

        </div>
        <div class="container">
            <div class="steps">
                <div class="step done">1</div>
                <div class="step done">2</div>
                <div class="step done">3</div>
                <div class="step done">4</div>
                <div class="step active">5</div>
                <div class="step ">6</div>
                <div class="step last">7</div>
                {{--  <div class="step">7</div>  --}}
            </div>
            <div>

                <div class="second-layout">
                    <div class="row">
                        <div class="col-12 order-2 order-lg-1">
                            <h2 class="title">
                                Simulasi Kredit
                            </h2>
                        </div>
                        <div class="col-12 col-lg-4 left-column order-1 order-lg-2">
                            <div class="mod-type">
                                <div class="type-image">
                                    <img src="{{ asset('Home') }}/images/img-cluster.png" alt="">
                                </div>
                                <div class="items">
                                    <div class="type-item">
                                        <p>Type</p>
                                        <h5>{{ $tipeRumah->jenis_tr }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Blok</p>
                                        <h5>{{ $rumah->blok }} - {{ $rumah->nomor }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Cluster</p>
                                        <h5>{{ $rumah->nama_cluster }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Start from</p>

                                        <h5>Rp. {{ rupiah($tipeRumah->harga_tr) }}</h5>
                                    </div>
                                    <div class="type-item">
                                        <p>Luas Tanah</p>

                                        <h5>{{ $rumah->luas_tanah }} m<sup>2</sup></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 right-column order-3">
                            @if (!empty($payment))
                                @if ($payment == 'KPR')

                                    <form
                                        action="{{ route('simulation-price-payment.action', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah, $payment]) }}"
                                        method="POST">
                                        @csrf
                                        <div class="simulation-price">
                                            <div class="collapse-item">

                                                <div id="bank">
                                                    <div class="form-group">
                                                        <label for="" class="card-shadow">Pilih Bank</label>
                                                        <div class="card card-body">
                                                            @foreach ($skBunga as $bank)
                                                                <div class="form-check form-radio">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="bank" id="bank"
                                                                            value="{{ $bank->id_bunga }}" checked>
                                                                        {{ $bank->nama_bank }}
                                                                    </label>
                                                                </div>
                                                            @endforeach


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-shadow">
                                                <label for="">Uang Muka</label>
                                            </div>
                                            <div class="">
                                                <input type="text" class="form-control card-shadow" name="uangMuka"
                                                    id="uangMuka" aria-describedby="helpId" placeholder=""
                                                    onkeyup="getValue('uangMuka')" value="{{ rupiah($tipeRumah->harga_tr*(10/100)) }}">
                                            </div>
                                            <div class="card-shadow">
                                                <label for="">Jumlah</label>
                                            </div>
                                            <div class="">
                                                <input type="text" class="form-control card-shadow" name="jumlah"
                                                    id="jumlahHarga" aria-describedby="helpId" placeholder=""
                                                    onkeyup="getValue('jumlahHarga')" value="{{ rupiah($tipeRumah->harga_tr) }}">
                                            </div>
                                            <div class="card-shadow">
                                                <label for="">Suku Bunga</label>
                                            </div>
                                            <div class="">
                                                <input type="text" class="form-control card-shadow" name="sukuBunga"
                                                    id="sukuBunga" aria-describedby="helpId" placeholder="" value="">
                                            </div>
                                            <div class="card-shadow">
                                                <label for="">Waktu Pinjaman</label>
                                            </div>
                                            <div class="">
                                                <select class="form form-control card-shadow" name="tahun" id="tahun">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="5">5 tahun</option>
                                                    <option value="10">10 tahun</option>
                                                    <option value="15">15 tahun</option>
                                                    <option value="20">20 tahun</option>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="btn-groups">
                                            <a type="button"
                                                onclick="hitung('jumlahHarga','uangMuka','sukuBunga','tahun','hasil')"
                                                class="btn btn-primary">Hitung Simulasi</a>
                                        </div>
                                        <div class="price-total">
                                            <p>Perkiraan pembayaran KPR Anda:</p>
                                            <h5 id="hasil">/ Bulan</h5>
                                        </div>
                                        <div class="btn-groups">
                                            <a href="/simulation-payment-option/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}"
                                                type="button" class="btn btn-grey">Kembali</a>
                                                <button type="submit"  type="button" class="btn btn-primary">Lanjutkan</button>
                                        </div>
                                    </form>
                                @elseif($payment == 'Cicilan')
                                    <form
                                        action="{{ route('simulation-price-payment.action', [$rumah->id_rumah, $tipeRumah->id_tipe_rumah, $payment]) }}">
                                        <div class="simulation-price">
                                            @for ($i = 1; $i < 5; $i++)
                                                <?php
                                                $thn = $tipeRumah->harga_tr / (60 + 60 * $i);

                                                ?>

                                                <div class="collapse-item">
                                                    <a class="card-shadow" data-bs-toggle="collapse"
                                                        href="#bank{{ $i }}" role="button"
                                                        aria-expanded="false" aria-controls="bank">
                                                        Cicilan {{ 5 * $i }} Tahun
                                                    </a>
                                                    <div class="" id="bank{{ $i }}">
                                                        <div class="card card-body">
                                                            <div class="form-check form-radio">
                                                                <input type="radio" id="age1" name="cicilan"
                                                                    value="{{ 5 * $i }}">
                                                                <label class="form-check-label">
                                                                    Rp. {{ rupiah(round($thn, -3)) }} Per Bulan

                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                            @endfor
                                        </div>
                                        <div class="btn-groups">
                                            <a href="/simulation-payment-option/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}"
                                                type="button" class="btn btn-grey">Kembali</a>
                                            <a href="/simulation-order/{{ $rumah->id_rumah }}/{{ $tipeRumah->id_tipe_rumah }}/{{ $payment }}"
                                                type="button" class="btn btn-primary">Lanjutkan</a>
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
    function hitung(jumlah, uangmuka, sukubunga, tahun, result) {

        var jml = document.getElementById(jumlah).value;
        jml = jml.replace(/\D/g, '');
        console.log(jml);
        var um = document.getElementById(uangmuka).value;
        um = um.replace(/\D/g, '');
        console.log(um);
        var sb = document.getElementById(sukubunga).value;
        var thn = document.getElementById(tahun).value;
        var hasil = document.getElementById(result);
        var cicilan;

        cicilan = ((jml - um) * (sb / 100) * thn) / (thn * 12);
        console.log(cicilan);

        var hasilCicilan = Math.round(parseInt((cicilan / 1000)) * 1000).toString(),
            sisa = hasilCicilan.length % 3,
            rupiah = hasilCicilan.substr(0, sisa),
            ribuan = hasilCicilan.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        console.log(rupiah);

        hasil.innerText = rupiah + "/ Bulan";
    }

    function getValue(id) {
        var dataValue = document.getElementById(id);

        dataValue.value = formatRupiah(dataValue.value, '', id);

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

@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('V_Admin.footer')
@extends('flashdata')
@section('tittle', 'FORMS ONE | Formulir')
@section('content')
    <style>
        .myinput {
            height: 30px;
        }

        .form-inline {
            height: 30px;
        }

        table,
        tr,
        td,
        th {
            height: 1px;
            border: none;
        }

        table.no-space td,
        table.no-space tr,
        table.no-space th {
            padding: 2px;
        }

        @media print {
            @page :footer {
                display: none
            }

            @page :header {
                display: none
            }

            @page {
                size: F4;
                margin: 5px 0 -100px 0;
            }

            body {
                margin: 0;
            }

            body * {
                visibility: hidden;
                font-size: 20px;
                line-height: 12px;
                color: black;
            }

            #printcontent * {
                visibility: visible;
            }

            #printcontent {
                /* position: absolute; */
                left: 0;
                right: 0;
                top: -90px;
            }

            .br-nLine {
                page-break-before: always;
            }

            .footerPrint {
                background-color: white;
                height: 100%;
                width: 100%;
                position: relative;
                page-break-before: always;

            }

            table.solid-border td,
            table.solid-border tr,
            table.solid-border th {
                border: 2px solid black;
            }

            .noprint {
                display: none;
            }


            .hidden {
                display: none;
            }

            .myinput {

                height: 20px;
            }

            .form-inline {
                height: 20px;
            }
        }
    </style>

    <section class="content" id="printcontent">
        <div class="container-fluid ">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url()->previous() }}" class="btn-fd-icon-outline col-1" style="height: 40px; width: 50px"> <i
                            class="bi bi-arrow-left"></i></a> &nbsp;
                    Tambah Promo
                </div>

                <div class="card-body">


                    <form method="POST" action="{{ route('addPromoAction.admin', $getProjek->nama_projek) }}"
                        enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group">
                            <label for=""> Rumah yang akan di terapkan promo</label>
                            <br>
                            <div class="container">
                                <div class="row" style="width: 100%">
                                    @foreach ($rumah as $rumah)
                                        <div class="col-md-3 ">
                                            <div class=" btn btn-success" style="width: 100%">

                                                <h6>{{ $rumah->nama_cluster }} / {{ $rumah->blok }} - {{ $rumah->nomor }}
                                                </h6>
                                            </div>
                                            <input type="text" readonly hidden name="codecluster[]"
                                                value="{{ $rumah->codecluster }}">
                                            <input type="text" readonly hidden name="id_rumah[]"
                                                value="{{ $rumah->id_rumah }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">Tipe Promo</label>
                            <select name="tipe_promo" id="" class="form form-control" required>
                                @if ($user->kategori == 'SuperAdmin')
                                    <option value="">--Pilih--</option>
                                    <option value="special">special</option>
                                    <option value="standart">standart</option>
                                @elseif ($user->kategori == 'CEO')
                                    <option value="special" selected>special</option>
                                @else
                                    <option value="standart" selected>standart</option>
                                @endif

                            </select>

                        </div>
                        <input type="text" name="kode_promo" class="form-control" readonly hidden value="{{ $kodePromo }}">
                        <div class="form-group">
                            <label for="">Jenis Promo</label>

                            <select class="form-control" name="jenisPromo" id="">
                                <option value="">--Pilih--</option>
                                <option value="KPR">KPR</option>
                                <option value="Cicilan">Cicilan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama promo</label>
                            <input type="text" name="nama_promo" required id="" class="form-control"
                                placeholder="" aria-describedby="helpId">

                        </div>

                        <div class="form-group">
                            <label for="">Nominal / Persentase Diskon</label>
                            <input type="number" name="diskon_promo" id="diskonPromo" class="form-control"
                                placeholder="Masukan Diskon" aria-describedby="helpId">
                                <span id="diskonWarning" class="text-danger"></span>
                            <div class="form-check">

                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="radio" class="form-check-input" name="statusDiskon" id="diskonRupiah"
                                            value="rupiah" checked> <span>Rupiah</span>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" class="form-check-input" name="statusDiskon" id="diskonPersen"
                                            value="persen "> <span>Persen</span>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Maksimal Diskon</label>
                            <input type="text" name="maxDiskon" id="maxDiskon" class="form-control"
                                placeholder="Masukan Max Diskon" aria-describedby="helpId">

                                <span id="maxDiskonWarning" class="text-danger"></span>
                            <div class="form-check">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="radio" class="form-check-input" name="statusMaxDiskon"
                                            id="statusMaxDiskonRupiah" value="rupiah" checked> <span>Rupiah</span>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" class="form-check-input" name="statusMaxDiskon"
                                            id="statusMaxDiskonPersen" value="persen"> <span>Persen</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">BPHTB Promo</label>
                            <select name="bphtb" id="" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="yes">Ya</option>
                                <option value="no">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">KPR Promo</label>
                            <select name="kpr" id="" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="yes">Ya</option>
                                <option value="no">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ekstra Cicilan Promo</label>
                            <select name="extra_cicilan" id="extraCicilan" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="yes">Ya</option>
                                <option value="no" selected>Tidak</option>
                            </select>
                            <label for="jumlah_cicilan" id="jumlahCicilanLabel" hidden>Jumlah Cicilan</label>
                            <input type="number" name="jumlah_cicilan" id="jumlahCicilan" class="form-control" hidden
                                readonly value="0">
                        </div>


                        @if ($user->kategori == 'CEO')
                            <div class="form-group">
                                <label for="">Tanggal Mulai</label>
                                <input type="date" name="tgl_mulai" required id=""
                                    value="{{ date('Y-m-d') }}" class="form-control" placeholder=""
                                    aria-describedby="helpId">

                            </div>

                            <div class="form-group">
                                <label for="">Tanggal Berakhir</label>
                                <input type="date" name="tgl_berakhir" required id="tglBerakhir"
                                    value="{{ date('Y-m-d') }}" class="form-control" placeholder=""
                                    aria-describedby="helpId">

                            </div>
                        @else
                            <div class="form-group">
                                <label for="">Tanggal Mulai</label>
                                <input type="date" name="tgl_mulai" required id=""
                                    value="{{ date('Y-m-d') }}" class="form-control" placeholder=""
                                    aria-describedby="helpId">

                            </div>

                            <div class="form-group">
                                <label for="">Tanggal Berakhir</label>
                                <input type="date" name="tgl_berakhir" required id="tglBerakhir" class="form-control"
                                    placeholder="" aria-describedby="helpId">

                            </div>
                        @endif

                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="ket_promo" required id="" cols="30" class="form-control" rows="2"></textarea>
                        </div>

                        @if ($user->kategori == 'CEO')
                            <div class="form-group">
                                <label for="" hidden>Kuota Promo</label>
                                <input type="number" name="kuota_promo" required hidden value="1"
                                    class="form-control">

                            </div>
                        @else
                            <div class="form-group">
                                <label for="">Kuota Promo</label>
                                <input type="number" name="kuota_promo" required placeholder="masukan kuota promo"
                                    class="form-control">

                            </div>
                        @endif
                        <a class="btn btn-outline-info" href="#" id="generate">Tampilkan Kode</a>

                        <br><br>
                        <button type="submit" class="btn btn-outline-primary" id="submitBtn" disabled >Submit</button>
                    </form>
                    <br>

                    <div class="card" style="display: none" id="card">
                        <div class="card-body">
                            <div>
                                <label for="">Keterangan:</label>
                                <br>
                                <p id="diskonText"></p>
                                <p id="maximalDiskonText"></p>
                                <p id="tanggalText"></p>
                                <label for="">Kode Promo:</label><br>
                                <button id="copyPromoCode"
                                    class="btn btn-outline-success col-md-12">{{ $kodePromo }}</button>
                                <span id="copySuccess" style="">Klik untuk salin kode promo</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

    <script>
        $('#generate').click(function () {
            // Mendapatkan nilai input diskon_promo, maxDiskon, statusDiskon, statusMaxDiskon, dan tglBerakhir
            var diskonPromo = $('#diskonPromo').val();
            var maxDiskon = $('#maxDiskon').val();
            var statusDiskon = $('input[name="statusDiskon"]:checked').val();
            var statusMaxDiskon = $('input[name="statusMaxDiskon"]:checked').val();
            var tglBerakhir = $('#tglBerakhir').val();

            // Menyusun teks keterangan
            if(statusDiskon == 'rupiah'){
                var diskonText = "Diskon: Rp. " + formatRupiah2(diskonPromo) ;
            }else{
                var diskonText = "Diskon: " + diskonPromo +"%" ;
            }
            if(statusMaxDiskon == 'rupiah'){
                var maximalDiskonText ="Maksimum Diskon: Rp. "+formatRupiah2(maxDiskon);
            }else{
                var maximalDiskonText =  "Maksimum Diskon : "+ maxDiskon+"%";
            }

            var tanggalText = "Tanggal Berakhir: " + formatDateIndo(tglBerakhir);

            // Menampilkan keterangan
            $('#diskonText').text(diskonText);
            $('#maximalDiskonText').text(maximalDiskonText);
            $('#tanggalText').text(tanggalText);

            // Menampilkan card yang berisi keterangan dan kode promo
            $('#card').css('display', 'block');
            document.getElementById('submitBtn').disabled =false;
        });

        // Fungsi untuk menyalin kode promo saat tombol "Klik untuk salin kode promo" ditekan
        $('#copyPromoCode').click(function () {
            // Mendapatkan teks dari kode promo
            var kodePromoText = $('#copyPromoCode').text();

            // Membuat elemen textarea sementara untuk menyalin teks
            var tempTextArea = $('<textarea>');
            tempTextArea.val(kodePromoText);
            $('body').append(tempTextArea);
            tempTextArea.select();
            document.execCommand('copy');
            tempTextArea.remove();

            // Menampilkan pesan sukses
            $('#copySuccess').text('Kode promo telah disalin!');
        });

        $(document).ready(function() {
            $("#generate").on("click", function(event) {
                event.preventDefault(); // Prevent the default behavior of the anchor tag

                // Scroll to the card element smoothly
                $("html, body").animate({
                    scrollTop: $("#card").offset().top
                }, 1000);
            });
        });


        document.addEventListener('DOMContentLoaded', function () {
            const diskonPromoInput = document.getElementById('diskonPromo');
            const diskonRupiahRadio = document.getElementById('diskonRupiah');
            const diskonPersenRadio = document.getElementById('diskonPersen');
            const diskonWarning = document.getElementById('diskonWarning');

            const maxDiskonInput = document.getElementById('maxDiskon');
            const statusMaxDiskonRupiahRadio = document.getElementById('statusMaxDiskonRupiah');
            const statusMaxDiskonPersenRadio = document.getElementById('statusMaxDiskonPersen');
            const maxDiskonWarning = document.getElementById('maxDiskonWarning');

            // Function to update the input and warning span for Diskon
            function updateDiskonInput() {
                if (diskonPersenRadio.checked) {
                    // When "Persen" is selected for Diskon
                    const diskonValue = parseFloat(diskonPromoInput.value);
                    if (!isNaN(diskonValue) && diskonValue >= 50) {
                        diskonWarning.textContent = 'Diskon terbesar adalah 50%';
                    } else {
                        diskonWarning.textContent = '';
                    }
                } else {
                    // When "Rupiah" is selected for Diskon

                }
            }

            // Function to update the input and warning span for Maksimal Diskon
            function updateMaxDiskonInput() {
                if (statusMaxDiskonPersenRadio.checked) {
                    // When "Persen" is selected for Maksimal Diskon
                    const maxDiskonValue = parseFloat(maxDiskonInput.value);
                    if (!isNaN(maxDiskonValue) && maxDiskonValue > 50) {
                        maxDiskonWarning.textContent = 'Maksimal Diskon terbesar adalah 50%';
                    } else {
                        maxDiskonWarning.textContent = '';
                    }
                } else {
                    // When "Rupiah" is selected for Maksimal Diskon

                }
            }

            // Initial updates
            updateDiskonInput();
            updateMaxDiskonInput();

            // Event listeners to update on radio button change and input change for Diskon
            diskonRupiahRadio.onchange = updateDiskonInput;
            diskonPersenRadio.onchange = updateDiskonInput;
            diskonPromoInput.oninput = updateDiskonInput;

            // Event listeners to update on radio button change and input change for Maksimal Diskon
            statusMaxDiskonRupiahRadio.onchange = updateMaxDiskonInput;
            statusMaxDiskonPersenRadio.onchange = updateMaxDiskonInput;
            maxDiskonInput.oninput = updateMaxDiskonInput;
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dtPembayaran').DataTable();
        });
    </script>

    <script>
        function formatDateIndo(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID', options);
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

        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#image').files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function() {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection

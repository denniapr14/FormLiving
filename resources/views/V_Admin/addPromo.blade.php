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


                    <form action="{{ route('addPromoAction.admin', $getProjek->nama_projek) }}"
                        enctype="multipart/form-data" method="post">
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
                                            <input type="text" hidden readonly name="codecluster[]"
                                                value="{{ $rumah->codecluster }}">
                                            <input type="text" hidden readonly name="id_rumah[]"
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
                        <div class="form-group">
                            <label for="">Nama promo</label>
                            <input type="text" name="nama_promo" required id="" class="form-control"
                                placeholder="" aria-describedby="helpId">

                        </div>

                        <div class="form-group">
                            <label for="">Nominal / Persentase Diskon</label>
                            <input type="number" name="diskon_promo" id="" class="form-control" placeholder="Masukan Diskon"
                                aria-describedby="helpId">
                            <div class="form-check">

                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="radio" class="form-check-input" name="statusDiskon" id="" value="rupiah" checked> <span>Rupiah</span>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" class="form-check-input" name="statusDiskon" id="" value="persen "> <span>Persen</span>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="form-group">
                          <label for="">Maksimal Diskon</label>
                          <input type="text" name="" id="" class="form-control" placeholder="Masukan Max Diskon" aria-describedby="helpId">
                          <div class="form-check">
                          <div class="row">
                            <div class="col-md-3">
                                <input type="radio" class="form-check-input" name="statusMaxDiskon" id="" value="rupiah" checked> <span>Rupiah</span>
                            </div>
                            <div class="col-md-3">
                                <input type="radio" class="form-check-input" name="statusMaxDiskon" id="" value="persen"> <span>Persen</span>
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
                            <input type="number" name="jumlah_cicilan" id="jumlahCicilan" class="form-control" hidden readonly value="0">
                        </div>


                        @if ($user->kategori == 'CEO')
                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" required id="" value="{{ date('Y-m-d') }}" class="form-control"
                                placeholder="" aria-describedby="helpId">

                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Berakhir</label>
                            <input type="date" name="tgl_berakhir" required id="" value="{{ date('Y-m-d') }}" class="form-control"
                                placeholder="" aria-describedby="helpId">

                        </div>
                        @else
                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" required id="" value="{{ date('Y-m-d') }}" class="form-control"
                                placeholder="" aria-describedby="helpId">

                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Berakhir</label>
                            <input type="date" name="tgl_berakhir" required id="" class="form-control"
                                placeholder="" aria-describedby="helpId">

                        </div>

                        @endif

                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="ket_promo" required id="" cols="30" class="form-control" rows="2"></textarea>
                        </div>

                        @if ($user->kategori == 'CEO')
                        <div class="form-group">
                            <label for="">Kuota Promo</label>
                            <input type="number" name="kuota_promo" required hidden value="1" class="form-control">

                        </div>

                        @else
                        <div class="form-group">
                            <label for="">Kuota Promo</label>
                            <input type="number" name="kuota_promo" required placeholder="masukan kuota promo" class="form-control">

                        </div>


                        @endif

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <script>
        const extraCicilanSelect = document.getElementById('extraCicilan');
        const jumlahCicilanLabel = document.getElementById('jumlahCicilanLabel');
        const jumlahCicilanInput = document.getElementById('jumlahCicilan');

        extraCicilanSelect.addEventListener('change', function () {
            if (extraCicilanSelect.value === 'yes') {
                jumlahCicilanLabel.removeAttribute('hidden');
                jumlahCicilanInput.removeAttribute('hidden');
                jumlahCicilanInput.removeAttribute('readonly');
            } else {
                jumlahCicilanLabel.setAttribute('hidden', 'true');
                jumlahCicilanInput.setAttribute('hidden', 'true');
                jumlahCicilanInput.setAttribute('readonly', 'true');
                jumlahCicilanInput.value = '0'; // Reset the input value
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dtPembayaran').DataTable();
        });
    </script>

    <script>
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

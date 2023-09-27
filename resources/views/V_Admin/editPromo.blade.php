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
                    Ubah Promo
                </div>

                <div class="card-body">


                    <form
                        action="{{ route('updatePromoAction.admin', [$getProjek->nama_projek, Crypt::encrypt($getPromo->id_promo)]) }}"
                        enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="responsive-table">

                            <div class="card ">
                                <img class="card-img-top" src="holder.js/100px180/" alt="">

                                <div class="card-body">
                                    <h4>Rincian rumah yang akan terubah</h4>
                                    <table class="" id="list-promo" style="width: 100%">
                                        <thead class="thead-inverse">

                                            <tr>
                                                <th>No</th>
                                                <th>Rumah</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($getListPromo as $listPromo)
                                                <tr>
                                                    <td scope="row">{{ $no }}</td>
                                                    <td>{{ $listPromo->blok }} - {{ $listPromo->nomor }}</td>

                                                </tr>
                                                @php
                                                    $no++;
                                                @endphp
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <br>
                        <div class="form-group">
                            <label for="">Jenis Promo</label>

                            <select class="form-control" name="jenisPromo" id="">
                                @php
                                    $jenisPromo = ['KPR','Cicilan'];
                                @endphp
                                @foreach ($jenisPromo as $jenisPromo)
                                    @if ($jenisPromo == $getPromo->jenis_promo)
                                        <option value="{{ $jenisPromo }}" selected>{{ $jenisPromo }}</option>
                                    @else
                                        <option value="{{ $jenisPromo }}">{{ $jenisPromo }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Promo</label>
                            <select name="status_stock" class="form-control" id="inputStock">
                                @php
                                    $statusPromo = ['standart', 'special'];
                                @endphp

                                @foreach ($statusPromo as $promo)
                                    @if ($promo == $getPromo->tipe_promo)
                                        <option value="{{ $promo }}" selected>{{ $promo }}</option>
                                    @else
                                        <option value="{{ $promo }}">{{ $promo }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status_stock" class="form-control" id="inputStock">
                                @php
                                    $status = ['aktif', 'nonaktif'];
                                @endphp

                                @foreach ($status as $status)
                                    @if ($status == $getPromo->status)
                                        <option value="{{ $status }}" selected>{{ $status }}</option>
                                    @else
                                        <option value="{{ $status }}">{{ $status }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nama promo</label>
                            <input type="text" name="nama_promo" required id="" value="{{ $getPromo->promo }}"
                                class="form-control" placeholder="" aria-describedby="helpId">

                        </div>

                        <div class="form-group">
                            <label for="">Kode Promo</label>
                            <input type="text" name="kode_promo" id="" value="{{ $getPromo->kode_promo }}"
                                class="form-control" placeholder="" aria-describedby="helpId" required>

                        </div>
                        <div class="form-group">
                            <label for="">Nominal / Persentase Diskon</label>
                            <input type="number" name="diskon_promo" id="" value="{{ $getPromo->diskon_promo }}" class="form-control"
                                placeholder="Masukan Diskon" aria-describedby="helpId">
                            <div class="form-check">

                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="radio" class="form-check-input" name="statusDiskon" id=""
                                            value="rupiah" {{ $getPromo->status_diskon == 'rupiah' ? 'checked' : '' }}> <span>Rupiah</span>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" class="form-check-input" name="statusDiskon" id=""
                                            value="persen " {{ $getPromo->status_diskon == 'persen' ? 'checked' : '' }}> <span>Persen</span>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Maksimal Diskon</label>
                            <input type="text" name="maxDiskon" id="" class="form-control"
                                placeholder="Masukan Max Diskon" value="{{ $getPromo->max_diskon }}" aria-describedby="helpId">
                            <div class="form-check">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="radio" class="form-check-input" name="statusMaxDiskon" id=""
                                            value="rupiah" {{ $getPromo->status_max_diskon == 'rupiah' ? 'checked' : '' }}> <span>Rupiah</span>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" class="form-check-input" name="statusMaxDiskon" id=""
                                            value="persen" {{ $getPromo->status_max_diskon == 'persen' ? 'checked' : '' }}> <span>Persen</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">BPHTB Promo</label>
                            <select name="bphtb" id="" class="form-control">
                                @if ($getPromo->bphtb_promo == 'yes')
                                    <option value="yes" selected>Ya</option>
                                    <option value="no">Tidak</option>
                                @else
                                    <option value="no" selected>Tidak</option>
                                    <option value="yes">Ya</option>
                                @endif

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">KPR Promo</label>
                            <select name="kpr" id="" class="form-control">
                                @if ($getPromo->freekpr_promo == 'yes')
                                    <option value="yes" selected>Ya</option>
                                    <option value="no">Tidak</option>
                                @else
                                    <option value="no" selected>Tidak</option>
                                    <option value="yes">Ya</option>
                                @endif

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ekstra Cicilan Promo</label>
                            <select name="extra_cicilan" id="" class="form-control">
                                @if ($getPromo->extra_cicilan == 'yes')
                                    <option value="yes" selected>Ya</option>
                                    <option value="no">Tidak</option>
                                @else
                                    <option value="no" selected>Tidak</option>
                                    <option value="yes">Ya</option>
                                @endif
                            </select>
                            <input type="number" name="jumlah_cicilan" value="{{ $getPromo->jumlah_extra_cicilan }}"
                                class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" required id=""
                                value="{{ $getPromo->tgl_aktif }}" class="form-control" placeholder=""
                                aria-describedby="helpId">

                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Berakhir</label>
                            <input type="date" name="tgl_berakhir" required value="{{ $getPromo->tgl_berakhir }}"
                                id="" class="form-control" placeholder="" aria-describedby="helpId">

                        </div>

                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="ket_promo" required id="" cols="30" class="form-control" rows="2">{{ $getPromo->keterangan }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Kuota Promo</label>
                            <input type="number" name="kuota_promo" value="{{ $getPromo->kuota_promo }}" required
                                class="form-control">

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

    <script>
        $(document).ready(function() {
            $('#list-promo').DataTable();
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

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
                    Ubah Promo {{ $getPromo->keterangan }}
                </div>

                <div class="card-body">


                    <form action="{{ route('addPromoAction.admin', $getProjek->nama_projek) }}" enctype="multipart/form-data"
                        method="post">
                        @csrf

                        <div class="responsive-table">
                            <h2>List Rumah Yang akan terupdate</h2>
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


                        <div class="form-group">
                            <label for="">Tipe Promo</label>
                            <select name="tipe_promo" id="" class="form form-control" required>
                                <option value="">--Pilih--</option>
                                <option value="standart">standart</option>
                                <option value="special">special</option>

                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">Nama promo</label>
                            <input type="text" name="nama_promo" required id="" class="form-control"
                                placeholder="" aria-describedby="helpId">

                        </div>

                        <div class="form-group">
                            <label for="">Kode Promo</label>
                            <input type="text" name="kode_promo" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" required>

                        </div>
                        <div class="form-group">
                            <label for="">Diskon Promo</label>
                            <input type="number" name="diskon_promo" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">

                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" required id="" class="form-control"
                                placeholder="" aria-describedby="helpId">

                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Berakhir</label>
                            <input type="date" name="tgl_berakhir" required id="" class="form-control"
                                placeholder="" aria-describedby="helpId">

                        </div>

                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="ket_promo" required id="" cols="30" class="form-control" rows="2"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Kuota Promo</label>
                            <input type="number" name="kuota_promo" required class="form-control">

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

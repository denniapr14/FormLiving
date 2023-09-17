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
                    <a href="{{ url()->previous() }}" class="btn-fd-icon-outline" style="height: 40px; width: 50px">
                        <i class="bi bi-arrow-left"></i></a> &nbsp;
                    Pembayaran Rumah {{ $getRumah->blok }}-{{ $getRumah->nomor }} dengan sisa Rp {{ rupiah($getPembayaranRumah->sisa_pr) }}
                </div>

                <div class="card-body">

                    @if (!empty($getRincianPembayaran))

                        <div class="card">
                            <h5 class="card-header">Rincian Pembayaran</h5>
                            <div class="card-body">
                                <table class="table" id="dtPembayaran">
                                    <thead>
                                        <tr>
                                            <th>Nominal</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRincianPembayaran as $dpem)
                                            <tr>
                                                <td>{{ rupiah($dpem->nominal_rp) }}</td>
                                                <td>{{ $dpem->tgl_bayar_rp }}</td>
                                                <td>{{ $dpem->status_rp }}</td>
                                                <td>{{ $dpem->keterangan_rp }}</td>
                                                <td>
                                                    <button type="button" class="btn-fd-icon-outline" data-toggle="modal"
                                                        data-target=".bd-example-modal-lg"><i class="fa fa-eye"
                                                            aria-hidden="true"></i></button>

                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1"
                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <img src="{{ url('Home') }}/images/pembayaran/{{ $dpem->bukti_rp }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger" role="alert">
                            <strong>
                                <center>Belum Ada Pembayaran</center>
                            </strong>
                        </div>
                    @endif
                    <br>
                    <form action="{{ route('pembayaranRumahAction.Admin', [$getProjek->nama_projek,Crypt::encrypt($getPembayaranRumah->id_pem_rumah)]) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" name="detail" id="" class="form-control"
                                value="{{ $getPembayaranRumah->detail_pr }}" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Nominal pembayaran</label>
                            <input type="text" name="harga" id="" class="form-control"
                                value="" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal dan Jam Bayar</label>
                            <input type="datetime-local" name="tanggal" id="" class="form-control" value=""
                                placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted"></small>
                        </div>


                        <div class="form-group">
                            <label for="">Bukti Pembayaran</label>
                            <input  type="file" name="image" class="" onchange="previewImage()" id="image"  required="">
                            <label class="custom-input-file">
                                <span class="title">Image</span>
                                <img id="preview" src="#" alt="Preview Image" style="width: 100%">
                              </label>

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
            $('#dtPembayaran').DataTable();
        });

    </script>

    <script>
        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#image').files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function () {
              preview.src = reader.result;
            }, false);

            if (file) {
              reader.readAsDataURL(file);
            }
          }

    </script>

@endsection

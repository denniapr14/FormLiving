@extends('AdminAccounting.app')
@extends('AdminAccounting.sidebar')
@extends('AdminAccounting.footer')
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
    <br><br>
    <br><br>
    <div><a class="btn btn-outline-danger" href="{{ url()->previous() }}">Kembali</a></div>
    <br>
    <section class="content" id="printcontent">
        <div class="container-fluid ">
            <div class="card">
                <div class="card-header">
                    Ubah Pembayaran Rumah
                </div>
                <div class="card-body">
                    <form action="{{ route('editPembayaranRumahAction.admin',[$getProjek->nama_projek, Crypt::encrypt($getPembayaranRumah->id_pem_rumah)]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" name="detail" id="" class="form-control"
                                value="{{ $getPembayaranRumah->detail_pr }}" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">jumlah Harga</label>
                            <input type="text" name="harga" id="" class="form-control"
                                value="{{ $getPembayaranRumah->harga_pr }}" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Sisa</label>
                            <input type="text" name="sisa" id="" class="form-control"
                                value="{{ $getPembayaranRumah->sisa_pr }}" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Bayar</label>
                            <input type="date" name="tanggal" id="" class="form-control"
                                value="{{ $getPembayaranRumah->tgl_pr }}" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="" class="form form-control">
                                <option value="">--Pilih--</option>
                                <option value="belum">Belum</option>
                                <option value="kurang">Kurang</option>
                                <option value="sudah">Sudah</option>
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

@endsection

@extends('CEO.app')
@extends('CEO.sidebar')
@extends('CEO.footer')
@extends('flashdata')
@section('tittle', 'FORMS ONE | Tambah Rumah Promo')
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
                    Pilih rumah yang akan di masukan promo
                </div>

                <div class="card-body">


                    <form action="{{ route('promo-rumah.action') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <table id="rumah" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cluster - No Rumah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $noRumah = 1; ?>
                                @foreach ($rumah as $rumah)
                                    <tr>
                                        <td>{{ $noRumah }}</td>
                                        <td>{{ $rumah->nama_cluster }} / {{ $rumah->blok }} - {{ $rumah->nomor }}</td>
                                        <td>

                                            <input type="checkbox" name="rumah[]" value="{{ $rumah->id_rumah }}"></td>
                                    </tr>
                                    <?php $noRumah++; ?>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div class="float-right">

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <?php
    function rupiah($angka)
    {
        $hasil_rupiah = 'Rp ' . number_format($angka, 0, ',', '.') . ',-';
        return $hasil_rupiah;
    } ?>
    <script>
        $(document).ready(function() {
            $('#rumah').DataTable();
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

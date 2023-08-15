@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('V_Admin.footer')
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

    <div class="content__row">
        <div class="content__row mb-3">
            <div class="card__box">
                <div class="card__header">
                    <div class="card__title">
                        <i class="bi bi-award-fill"></i>
                        <span>Promo </span>

                    </div>

                </div>
                <div class="table-responsive">
                    <h5>Pilih rumah yang akan diterapkan promo</h5>
                    <form action="{{ route('addPromoRumahAction.admin', $getProjek->nama_projek) }}"
                        enctype="multipart/form-data" method="post" >
                        @csrf
                        <div class="row">
                            <?php $noRumah = 1; ?>
                                @foreach ($rumah as $rumah)
                                    <div class="col-sm-2" style="    padding-right: 2px;
                                    padding-left: 2px;">
                                        <div class="card">
                                            <div class="card-body">
                                              {{ $rumah->blok }} - {{ $rumah->nomor }}
                                              <input type="checkbox" name="rumah[]" value="{{ $rumah->id_rumah }}">
                                            </div>
                                          </div>
                                    </div>



                                    <?php $noRumah++; ?>
                                @endforeach
                        </div>
                        <div class="float-right">

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    <script>

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

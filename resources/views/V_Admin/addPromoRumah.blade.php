@extends('V_Admin.app')

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
        .suggestion-item {
            padding: 5px;
            cursor: pointer;
        }

        /* Define additional custom styles for suggestion items */
        .custom-style-class {
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 5px;
            padding: 10px;
            font-weight: bold;
        }
    </style>

    <div class="">
        <div class="card mb-3">
            <div class="card-body">
                <div class="card-title">
                    <div class="">
                        <a href="{{ url()->previous() }}" class="btn-fd-icon-outline " style="height: 40px; width: 50px"> <i class="bi bi-arrow-left"></i></a> &nbsp;
                        <i class="bi bi-award-fill"></i>
                        <span>Promo </span>

                    </div>

                </div>



                <div class="table-responsive">
                    <h5>Pilih rumah yang akan diterapkan promo</h5>

                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control mb-3" placeholder="search" name="q"
                                id="searchRumah">
                            <span id="listRumah" class="btn"></span>
                        </div>

                    </div>

                    <form action="{{ route('addPromoRumahAction.admin', $getProjek->nama_projek) }}"
                        enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="row">
                            <?php $noRumah = 1; ?>
                            @foreach ($rumah as $rumah)
                                <div class="col-sm-2 house-card"
                                    style="    padding-right: 2px;
                                    padding-left: 2px;">
                                    <div class="card">
                                        <div class="card-body">
                                            {{ $rumah->blok }}-{{ $rumah->nomor }}
                                            <input type="checkbox" name="rumah[]" value="{{ $rumah->id_rumah }}">
                                        </div>
                                    </div>
                                </div>



                                <?php $noRumah++; ?>
                            @endforeach
                        </div>
                        <div class="float-right">

                            <button type="submit" class="btn btn-outline-gl">Submit</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            // Initialize autocomplete on search input
            $("#searchRumah").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "{{ route('rumahPromoAutocomplete.admin', $getProjek->nama_projek) }}",
                        type: 'GET',
                        dataType: "json",
                        data: {
                            search: request.term
                        },
                        success: function (data) {
                            // Format and style the response data

                            response(data); // Display the formatted data as suggestions
                        }
                    });
                },
                minLength: 1, // Minimum characters before autocomplete suggestions appear
                select: function (event, ui) {
                    // Handle selection here if needed
                    console.log("Selected value:", ui.item.value);
                    var searchText = ui.item.value.toLowerCase();
                    $(".house-card").each(function () {
                        var cardText = $(this).text().toLowerCase();
                        if (cardText.indexOf(searchText) === -1) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        }
                    });
                }
            });



            // Handle keyup event for .house-card elements
            $("#searchRumah").on("keyup", function () {
                var searchText = $(this).val().toLowerCase();
                {{--  console.log(searchText);  --}}
                $(".house-card").each(function () {
                    var cardText = $(this).text().toLowerCase();
                    if (cardText.indexOf(searchText) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });
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

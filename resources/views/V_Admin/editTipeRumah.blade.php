@extends('V_Admin.app')

@section('tittle', 'FORMS | Dashboard')

@section('content')

<!-- start: main -->


<!-- start: navbar -->

<!-- end: navbar -->

<!-- start: content -->

<div class="content__wrapper">
    <div class="content__row mb-3">
        <div class="card__box">
            <div class="card__header">
                <div class="card__title">


                    <a href="{{  route('tipeRumah.admin',[$getProjek->nama_projek,Crypt::encrypt($getTipeRumah->id_rumah)] ) }}"
                        class="btn-fd-icon-outline " style="height: 40px;width: 50px"> <i
                            class="bi bi-arrow-left"></i></a>
                    <h4> Ubah Tipe Rumah {{ $getTipeRumah->jenis_tr }} </h4>

                </div>

            </div>
            <form
                action="{{ route('updateTipeRumahAction.admin', [$getProjek->nama_projek, Crypt::encrypt($getTipeRumah->id_tipe_rumah)]) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id_rumah" id="inputIDRumah" value="{{ $getTipeRumah->id_rumah }}" hidden
                    readonly class="form form-control">
                <div class="form-group">
                    {{-- {{ $getTipeRumah->id_tipe_rumah }} --}}
                    <label for="">Tipe Rumah</label>
                    <input type="text" name="tipe[]" value="{{ $getTipeRumah->jenis_tr }}" id="" class="form-control"
                        placeholder="Masukan Tipe Rumah" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Luas Bangunan</label>
                    <input type="text" name="luasBangunan[]" value="{{ $getTipeRumah->luas_bangunan_tr }}" id=""
                        class="form-control" placeholder="Masukan Luas Bangunan" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Jumlah Kamar Mandi</label>
                    <input type="number" name="kamarMandi[]" id="" value="{{ $getTipeRumah->kmr_mandi_tr }}"
                        class="form-control" placeholder="Masukan Jumlah Kamar Mandi" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Jumlah Kamar Tidur</label>
                    <input type="number" name="kamarTidur[]" id="" value="{{ $getTipeRumah->kmr_tidur_tr }}"
                        class="form-control" placeholder="Masukan Jumlah Kamar Tidur" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" name="harga[]" id="" value="{{ $getTipeRumah->harga_tr }}" class="form-control"
                        placeholder="Masukan Harga" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Harga Perkiraan</label>
                    <input type="text" name="hargaText[]" id="" class="form-control"
                        placeholder="Masukan Harga Perkiraan" value="{{ $getTipeRumah->harga_text_tr }}"
                        aria-describedby="helpId">
                    <span>contoh : 900 juta</span>
                </div>
                <br>
                <h4>Detail Tipe Rumah</h4>
                <div class="form-group">
                    <label for="">Pondasi</label>
                    <input type="text" name="pondasi[]" id="" value="{{ $getTipeRumah->pondasi_tr }}"
                        class="form-control" placeholder="Masukan Pondasi" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Struktur Bangunan</label>
                    <input type="text" name="struktur[]" value="{{ $getTipeRumah->struktur_tr }}" id=""
                        class="form-control" placeholder="Masukan Struktur Bangunan" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Dinding Dalam</label>
                    <input type="text" name="dindingDalam[]" id="" value="{{ $getTipeRumah->dinding_dlm_tr }}"
                        class="form-control" placeholder="Masukan Dinding Dalam" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Dinding Luar</label>
                    <input type="text" name="dindingLuar[]" id="" value="{{ $getTipeRumah->dinding_luar_tr }}"
                        class="form-control" placeholder="Masukan Dinding Luar" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Dinding Kamar Mandi</label>
                    <input type="text" name="dindingKamarMandi[]" id="" class="form-control"
                        value="{{ $getTipeRumah->dinding_kmr_mnd_tr }}" placeholder="Masukan Dinding Kamar Mandi"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Dinding Meja Dapur</label>
                    <input type="text" name="dindingMejaDapur[]" id="" class="form-control"
                        value="{{ $getTipeRumah->dd_meja_dapur_tr }}" placeholder="Masukan Dinding Meja Dapur"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Lantai Ruang Tidur</label>
                    <input type="text" name="lantaiRuangTidur[]" id="" class="form-control"
                        value="{{ $getTipeRumah->lt_ruang_tidur_tr }}" placeholder="Masukan Lantai Ruang Tidur"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Lantai Ruang Keluarga</label>
                    <input type="text" name="lantaiRuangKeluarga[]" id="" class="form-control"
                        value="{{ $getTipeRumah->lt_ruang_keluarga_tr }}" placeholder="Masukan Lantai Ruang Keluarga"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Lantai Kamar Mandi Utama</label>
                    <input type="text" name="lantaiKamarMandiUtama[]" id="" class="form-control"
                        value="{{ $getTipeRumah->lt_kmr_mnd_utama_tr }}" placeholder="Masukan Lantai Kamar Mandi Utama"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Lantai Teras Utama</label>
                    <input type="text" name="lantaiTerasUtama[]" id="" class="form-control"
                        value="{{ $getTipeRumah->lt_teras_utama_tr }}" placeholder="Masukan Lantai Teras Utama"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Rangka Atap</label>
                    <input type="text" name="rangkaAtap[]" id="" class="form-control"
                        value="{{ $getTipeRumah->rangka_atap_tr }}" placeholder="Masukan Rangka Atap"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Penutup Atap</label>
                    <input type="text" name="penutupAtap[]" id="" class="form-control"
                        value="{{ $getTipeRumah->penutup_atap_tr }}" placeholder="Masukan Pentutup Atap"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Kusen</label>
                    <input type="text" name="kusen[]" id="" class="form-control" placeholder="Masukan Kusen"
                        value="{{ $getTipeRumah->kusen_tr }}" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Daun Pintu</label>
                    <input type="text" name="daunPintu[]" id="" class="form-control" placeholder="Masukan Daun Pintu"
                        value="{{ $getTipeRumah->daun_pintu_tr }}" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="Sanitary"></label>
                    <input type="text" name="sanitary[]" value="{{ $getTipeRumah->sanitary_tr }}" id=""
                        class="form-control" placeholder="Masukan sanitary" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Plafon Dalam</label>
                    <input type="text" name="plafonDalam[]" id="" class="form-control"
                        value="{{ $getTipeRumah->plafon_dlm_tr }}" placeholder="Masukan Plafon Dalam"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Handle</label>
                    <input type="text" name="handle[]" id="" value="{{ $getTipeRumah->handle_tr }}" class="form-control"
                        placeholder="Masukan Handle" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Lighting</label>
                    <input type="text" name="lighting[]" id="" value="{{ $getTipeRumah->lighting_tr }}"
                        class="form-control" placeholder="Masukan Lighting " aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Daya Listrik</label>
                    <input type="text" name="dayaListrik[]" id="" class="form-control"
                        value="{{ $getTipeRumah->daya_listrik_tr }}" placeholder="Masukan Daya Listrik"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Carport</label>
                    <input type="text" name="carport[]" id="" value="{{ $getTipeRumah->carport_tr }}"
                        class="form-control" placeholder="Masukan Carport" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Tangga</label>
                    <input type="text" name="tangga[]" id="" value="{{ $getTipeRumah->tangga_tr }}" class="form-control"
                        placeholder="Masukan Tangga" aria-describedby="helpId">

<<<<<<< Updated upstream
                    </div>
                    <div class="form-group">
                        <label for="">Gambar Tipe Rumah</label>
                        <input type="file" name="gambarTipe[]" id="" class="form-control"
                            placeholder="Masukan Tangga" aria-describedby="helpId">
                        @if (empty($getTipeRumah->img_tr))
                        @else
                            <img src="{{ url('Home') }}/images/tipe/{{ $getTipeRumah->img_tr }}" alt="">
                        @endif
=======
                </div>
                <div class="form-group">
                    <label for="">Gambar Tipe Rumah</label>
                    <input type="file" name="gambarTipe[]" id="" class="form-control" placeholder="Masukan Tangga"
                        aria-describedby="helpId">
                    @if (empty($getTipeRumah->img_tr))
                    @else
                    <img src="{{ url('Home') }}/images/tipe/{{ $getTipeRumah->img_tr }}" alt="">
                    @endif
>>>>>>> Stashed changes

                </div>

                <h4>Gallery</h4>

                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-image" aria-hidden="true"></i> Gambar Tipe Rumah
                                </a>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">

                                <div class="product-listing">

                                    @foreach ($getGambar as $gambar)
                                    @if ($gambar->jenis_img == 'denah')
                                    <div class="product__item">


                                        <div class="product__card">

                                            <div class="product__img">
                                                <img src="{{ url('Home') }}/images/denah/{{ $gambar->img_rumah }}"
                                                    alt="product-1" id="denah{{ $gambar->id_gambar_rumah }}">
                                            </div>
                                            <p> {{ $gambar->jenis_img }}</p>
                                            @if ($gambar->status_gr != 'nonaktif')
                                            <a href="/gambar-rumah/status/nonaktif/{{ Crypt::encrypt($gambar->id_gambar_rumah) }}"
                                                class="btn btn-danger"><i class="fa fa-toggle-off"
                                                    aria-hidden="true"></i> Nonaktif</a>
                                            @else
                                            <a href="/gambar-rumah/status/aktif/{{ Crypt::encrypt($gambar->id_gambar_rumah) }}"
                                                class="btn btn-primary"><i class="fa fa-toggle-on"
                                                    aria-hidden="true"></i> Aktif</a>
                                            @endif

                                            <button type="button" class="btn btn-info"
                                                data-target="#tipeRumah{{ $gambar->id_gambar_rumah }}"
                                                data-toggle="modal"
                                                data-target=".bd-example-modal-lg{{ $gambar->id_gambar_rumah }}">
                                                <i class="fas fa-edit    "></i>
                                            </button>


                                        </div>
                                    </div>
                                    @endif


                                    @if ($gambar->jenis_img == 'gambar')
                                    <div class="product__item">
                                        <div class="product__card">
                                            <div class="product__img">
                                                <img src="{{ url('Home') }}/images/tipe/{{ $gambar->img_rumah }}"
                                                    alt="product-1" id="gambar{{ $gambar->id_gambar_rumah }}">
                                            </div>
                                            <p> {{ $gambar->jenis_img }}</p>
                                            @if ($gambar->status_gr != 'nonaktif')
                                            <a href="/gambar-rumah/status/nonaktif/{{ Crypt::encrypt($gambar->id_gambar_rumah) }}"
                                                class="btn btn-danger"><i class="fa fa-toggle-off"
                                                    aria-hidden="true"></i>
                                                Nonaktif</a>
                                            @else
                                            <a href="/gambar-rumah/status/aktif/{{ Crypt::encrypt($gambar->id_gambar_rumah) }}"
                                                class="btn btn-primary"><i class="fa fa-toggle-on"
                                                    aria-hidden="true"></i>
                                                Aktif</a>
                                            @endif
                                            <button type="button" class="btn btn-info"
                                                data-target="#tipeRumah{{ $gambar->id_gambar_rumah }}"
                                                data-toggle="modal"
                                                data-target=".bd-example-modal-lg{{ $gambar->id_gambar_rumah }}">
                                                <i class="fas fa-edit    "></i>
                                            </button>



                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div id="fileInput0">
                    <label for="">Gambar Tipe Rumah</label><br>
                    <label for="fileInput">Select a file:</label>
                    <input type="text" name="counter[]" id="counterID" value="0" readonly hidden>
                    <input type="file" id="fileInput" name="fileInput[]">

                    <select name="jenisGambar[]" id="" class="form form-control">
                        <option value="">---Pilih Jenis Gambar---</option>
                        <option value="Denah">Denah</option>
                        <option value="Gambar">Gambar</option>
                    </select>

                </div>

                <button type="button" class="btn btn-success" onclick="addFile(id= 0)">Add File Input</button>
                <br><br>



                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
            @foreach ($getGambar as $gambar)
            <div class="modal modal-form fade" id="tipeRumah{{ $gambar->id_gambar_rumah }}" data-backdrop="static"
                data-keyboard="false" tabindex="-1" aria-labelledby="order-informationLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Tipe Rumah

                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="product-listing">
                                <form id="imageUploadForm">
                                    @csrf


                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label align-self-center">
                                                Gambar Tipe Rumah
                                            </label>
                                            <div class="col-sm-8 align-self-center">
                                                <input type="file" class="form-control" name="img"
                                                    placeholder="masukan gambar" id="img{{ $gambar->id_gambar_rumah }}">
                                            </div>

                                        </div>

                                        <div class="row pt-4">
                                            <div class="col-12">

                                                <button class="btn btn-primary w-100 mb-1" type="button"
                                                    name="submitImg"
                                                    id="uploadButton{{ $gambar->id_gambar_rumah }}">Submit</button>
                                                <button class="btn btn-danger w-100" type=""
                                                    data-dismiss="modal">Close</button>

                                            </div>

                                        </div>
                                    </div>
                                </form>
                                <script>
                                    $(document).ready(function() {
                                                $("#uploadButton{{ $gambar->id_gambar_rumah }}").click(function() {
                                                    var formData = new FormData();
                                                    formData.append("img", $("#img{{ $gambar->id_gambar_rumah }}")[0].files[0]);
                                                    formData.append("_token", "{{ csrf_token() }}");

                                                    $.ajax({
                                                        url: "{{ route('updateImageTipeRumahAction.admin', [$getProjek->nama_projek, $getTipeRumah->id_tipe_rumah, $gambar->id_gambar_rumah]) }}", // Replace with your Laravel route
                                                        type: "POST",
                                                        data: formData,
                                                        processData: false,
                                                        contentType: false,
                                                        success: function(response) {
                                                            // Handle success response (e.g., update image preview)
                                                            let url = "{{ url('Home') }}/images/denah/"
                                                            // Handle success response (e.g., update image preview)
                                                            // alert("Image uploaded successfully!");
                                                            $("#denah{{ $gambar->id_gambar_rumah }}").attr("src", url + response
                                                                .img_rumah);

                                                            $(document).ready(function() {
                                                                Toastify({
                                                                    text: 'Gambar tipe rumah telah diubah', // Add single quotes around the variable to make it a valid JavaScript string
                                                                    duration: 3000,
                                                                    gravity: "top",
                                                                    positionLeft: false,
                                                                    close: true,
                                                                    backgroundColor: "linear-gradient(to right, #8ACCA1, #458f60)",
                                                                    stopOnFocus: true
                                                                }).showToast();
                                                            });

                                                        },
                                                        error: function(error) {
                                                            // Handle error response (e.g., show an error message)
                                                            console.error(error.responseText);
                                                            alert("Error uploading image. Please try again.");
                                                        }
                                                    });
                                                });
                                            });
                                </script>


                            </div>


                        </div>
                    </div>

<<<<<<< Updated upstream
                    <div class="modal modal-form fade" id="tipeRumah{{ $gambar->id_gambar_rumah }}"
                        data-backdrop="static" data-keyboard="false" tabindex="-1"
                        aria-labelledby="order-informationLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Tipe Rumah

                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="product-listing">
                                        <form enctype="multipart/form-data" id="imageUploadForm">
                                            @csrf


                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label align-self-center">
                                                        Gambar Tipe Rumah
                                                    </label>
                                                    <div class="col-sm-8 align-self-center">
                                                        <input type="file" class="form-control" name="img"
                                                            placeholder="masukan gambar" id="img">
                                                    </div>

                                                </div>

                                                <div class="row pt-4">
                                                    <div class="col-12">

                                                        <button class="btn btn-primary w-100 mb-1" type="button"
                                                            name="submitImg"
                                                            id="uploadButton{{ $gambar->id_gambar_rumah }}">Submit</button>
                                                        <button class="btn btn-danger w-100" type=""
                                                            data-dismiss="modal">Close</button>

                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                        <script>
                                            $(document).ready(function() {
                                                $("#uploadButton{{ $gambar->id_gambar_rumah }}").click(function() {
                                                    var formData = new FormData();
                                                    formData.append("img", $("#img")[0].files[0]);
                                                    formData.append("_token", "{{ csrf_token() }}");

                                                    $.ajax({
                                                        url: "{{ route('updateImageTipeRumahAction.admin', [$getProjek->nama_projek, $getTipeRumah->id_tipe_rumah, $gambar->id_gambar_rumah]) }}", // Replace with your Laravel route
                                                        type: "POST",
                                                        data: formData,
                                                        processData: false,
                                                        contentType: false,
                                                        success: function(response) {
                                                            let url = "{{ url('Home') }}/images/tipe/"
                                                            // Handle success response (e.g., update image preview)
                                                            $("#gambar{{ $gambar->id_gambar_rumah }}").attr("src", url + response
                                                                .img_rumah);
                                                            $(document).ready(function() {
                                                                Toastify({
                                                                    text: 'Gambar tipe rumah telah diubah', // Add single quotes around the variable to make it a valid JavaScript string
                                                                    duration: 3000,
                                                                    gravity: "top",
                                                                    positionLeft: false,
                                                                    close: true,
                                                                    backgroundColor: "linear-gradient(to right, #8ACCA1, #458f60)",
                                                                    stopOnFocus: true
                                                                }).showToast();
                                                            });
                                                        },
                                                        error: function(error) {
                                                            // Handle error response (e.g., show an error message)
                                                            console.error(error.responseText);
                                                            // alert("Error uploading image. Please try again.");
                                                        }
                                                    });
                                                });
                                            });
                                        </script>


                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach
=======
                </div>

            </div>

            <div class="modal modal-form fade" id="tipeRumah{{ $gambar->id_gambar_rumah }}" data-backdrop="static"
                data-keyboard="false" tabindex="-1" aria-labelledby="order-informationLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Tipe Rumah

                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="product-listing">
                                <form enctype="multipart/form-data" id="imageUploadForm">
                                    @csrf


                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label align-self-center">
                                                Gambar Tipe Rumah
                                            </label>
                                            <div class="col-sm-8 align-self-center">
                                                <input type="file" class="form-control" name="img"
                                                    placeholder="masukan gambar" id="img">
                                            </div>

                                        </div>

                                        <div class="row pt-4">
                                            <div class="col-12">

                                                <button class="btn btn-primary w-100 mb-1" type="button"
                                                    name="submitImg"
                                                    id="uploadButton{{ $gambar->id_gambar_rumah }}">Submit</button>
                                                <button class="btn btn-danger w-100" type=""
                                                    data-dismiss="modal">Close</button>

                                            </div>

                                        </div>
                                    </div>
                                </form>
                                <script>
                                    $(document).ready(function() {
                                                                                    $("#uploadButton{{ $gambar->id_gambar_rumah }}").click(function() {
                                                                                        var formData = new FormData();
                                                                                        formData.append("img", $("#img")[0].files[0]);
                                                                                        formData.append("_token", "{{ csrf_token() }}");

                                                                                        $.ajax({
                                                                                            url: "{{ route('updateImageTipeRumahAction.admin', [$getProjek->nama_projek, $getTipeRumah->id_tipe_rumah, $gambar->id_gambar_rumah]) }}", // Replace with your Laravel route
                                                                                            type: "POST",
                                                                                            data: formData,
                                                                                            processData: false,
                                                                                            contentType: false,
                                                                                            success: function(response) {
                                                                                                let url = "{{ url('Home') }}/images/tipe/"
                                                                                                // Handle success response (e.g., update image preview)
                                                                                                $("#gambar{{ $gambar->id_gambar_rumah }}").attr("src", url + response
                                                                                                    .img_rumah);
                                                                                                $(document).ready(function() {
                                                                                                    Toastify({
                                                                                                        text: 'Gambar tipe rumah telah diubah', // Add single quotes around the variable to make it a valid JavaScript string
                                                                                                        duration: 3000,
                                                                                                        gravity: "top",
                                                                                                        positionLeft: false,
                                                                                                        close: true,
                                                                                                        backgroundColor: "linear-gradient(to right, #8ACCA1, #458f60)",
                                                                                                        stopOnFocus: true
                                                                                                    }).showToast();
                                                                                                });
                                                                                            },
                                                                                            error: function(error) {
                                                                                                // Handle error response (e.g., show an error message)
                                                                                                console.error(error.responseText);
                                                                                                // alert("Error uploading image. Please try again.");
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                });
                                </script>


                            </div>


                        </div>
                    </div>

                </div>
>>>>>>> Stashed changes

            </div>
            @endforeach

        </div>
    </div>
</div>







<!-- Modal order information-->



<script>
    function addFile(id) {

            const fileInputContainer = document.createElement("div");
            fileInputContainer.innerHTML = `
                <br>
                    <input type="text" name="counter[]" id="counterID" value="` + id + `"  readonly hidden>
                    <label for="fileInput">Select a file:</label>
                    <input type="file" name="fileInput[]">
                    <button type="button" class="btn btn-danger" onclick="deleteFile()"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <select name="jenisGambar[]" id="" class="form form-control">
                        <option value="">---Pilih Jenis Gambar---</option>
                        <option value="Denah">Denah</option>
                        <option value="Gambar">Gambar</option>
                    </select>
                `;
            document.querySelector("#fileInput" + id).appendChild(fileInputContainer);
        }

        function deleteFile(id) {
            const fileInputContainer = event.target.parentNode;
            if (fileInputContainer) {
                fileInputContainer.remove();
            }
        }
        let formCounter = 1;

        function createForm() {
            const formsContainer = document.getElementById("formsContainer");
            const formId = `${formCounter}`;

            // Create a new form element with Bootstrap form styling
            const formHTML = `
                <div id="${formId}">
                <br>
                <h1>
                    Tambah Tipe Rumah ${formId}
                <h1>
                    <div class="float-right">
                    <button type="button" class="btn btn-danger" onclick="deleteForm('${formId}')">Delete Form</button>
                    </div>
                    <br>
                <div class="form-group">

                    <input type="text" name="tipe[]" id="" class="form-control" placeholder="Masukan Tipe Rumah"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">

                    <input type="text" name="luasBangunan[]" id="" class="form-control" placeholder="Masukan Luas Bangunan"
                            aria-describedby="helpId">
                </div>
                <div class="form-group">

                    <input type="text" name="kamarMandi[]" id="" class="form-control" placeholder="Masukan Jumlah Kamar Mandi"
                            aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <input type="text" name="kamarTidur[]" id="" class="form-control" placeholder="Masukan Jumlah Kamar Tidur"
                    aria-describedby="helpId">
                    </div>
                <div class="form-group">
                    <input type="text" name="harga[]" id="" class="form-control" placeholder="Masukan Harga"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="hargaText[]" id="" class="form-control" placeholder="Masukan Harga Perkiraan"
                        aria-describedby="helpId">
                    <span>contoh : 900 juta</span>
                </div>
                <br>
                <h4>Detail Tipe Rumah</h4>
                <div class="form-group">
                    <input type="text" name="pondasi[]" id="" class="form-control" placeholder="Masukan Pondasi"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="struktur[]" id="" class="form-control" placeholder="Masukan Struktur Bangunan"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="dindingDalam[]" id="" class="form-control" placeholder="Masukan Dinding Dalam"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="dindingLuar[]" id="" class="form-control" placeholder="Masukan Dinding Luar"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="dindingKamarMandi[]" id="" class="form-control" placeholder="Masukan Dinding Kamar Mandi"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="dindingMejaDapur[]" id="" class="form-control" placeholder="Masukan Dinding Meja Dapur"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="lantaiRuangTidur[]" id="" class="form-control" placeholder="Masukan Lantai Ruang Tidur"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="lantaiRuangKeluarga[]" id="" class="form-control" placeholder="Masukan Lantai Ruang Keluarga"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="lantaiKamarMandiUtama[]" id="" class="form-control"
                        placeholder="Masukan Lantai Kamar Mandi Utama" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="lantaiTerasUtama[]" id="" class="form-control"
                    placeholder="Masukan Lantai Teras Utama" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="rangkaAtap[]" id="" class="form-control"
                    placeholder="Masukan Rangka Atap" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="penutupAtap[]" id="" class="form-control"
                    placeholder="Masukan Pentutup Atap" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="kusen[]" id="" class="form-control"
                    placeholder="Masukan Kusen"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="daunPintu[]" id="" class="form-control"
                    placeholder="Masukan Daun Pintu"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="sanitary[]" id="" class="form-control"
                    placeholder="Masukan sanitary"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="plafonDalam[]" id="" class="form-control"
                    placeholder="Masukan Plafon Dalam"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="handle[]" id="" class="form-control"
                    placeholder="Masukan Handle"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="lighting[]" id="" class="form-control"
                    placeholder="Masukan Lighting "
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="dayaListrik[]" id="" class="form-control"
                    placeholder="Masukan Daya Listrik"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="carport[]" id="" class="form-control"
                    placeholder="Masukan Carport"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="tangga[]" id="" class="form-control"
                    placeholder="Masukan Tangga"
                        aria-describedby="helpId">
                </div>

                <div id="fileInput${formId}">
                    <input type="text" name="counter[]" id="counterID" value="${formId}"  readonly hidden>
                    <label for="fileInput">Select a file:</label>
                    <input type="file" id="fileInput" name="fileInput[]" >
                    <button type="button" onclick="deleteFile(${formId})">Delete</button>
                    <select name="jenisGambar[]" id="" class="form form-control">
                        <option value="">---Pilih Jenis Gambar---</option>
                        <option value="Denah">Denah</option>
                        <option value="Gambar">Gambar</option>
                    </select>

                </div>

                <button type="button" onclick="addFile(id=${formId})">Add File Input</button>

                <div>
                `;

            // Append the form to the container using innerHTML
            formsContainer.innerHTML += formHTML;

            formCounter++;
        }

        function deleteForm(formId) {
            const formToRemove = document.getElementById(formId);
            if (formToRemove) {
                formToRemove.remove();
            }
        }
</script>

<script type="text/javascript">
    $('#rumahSubmit').click(function(e) {
            e.preventDefault();

            let cluster = $('#inputCluster').val();
            let blok = $('#inputBlok').val();
            let nomor = $('#inputNomor').val();
            let status = $('#inputStatus').val();
            let stock = $('#inputStock').val();

            {{--  console.log(cluster);  --}}

            $.ajax({
                url: "{{ route('postRumah') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    cluster: cluster,
                    blok: blok,
                    nomor: nomor,
                    status: status,
                    stock: stock,
                },
                success: function(response) {
                    $('#successMsg').show();
                    {{--  console.log(response);  --}}


                    if (response != null) {


                        document.getElementById("inputID").value = response.id_rumah;
                        document.getElementById("inputIDRumah").value = response.id_rumah;
                        $('#rumahEdit').show();
                        $('#rumahSubmit').hide();
                    }

                },
                error: function(response) {
                    {{--  $('#nameErrorMsg').text(response.responseJSON.errors.name);
                    $('#emailErrorMsg').text(response.responseJSON.errors.email);
                    $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
                    $('#messageErrorMsg').text(response.responseJSON.errors.message);  --}}
                },
            });
        });

        $('#rumahEdit').click(function(e) {
            e.preventDefault();
            let id_rumah = $('#inputID').val();
            let cluster = $('#inputCluster').val();
            let blok = $('#inputBlok').val();
            let nomor = $('#inputNomor').val();
            let status = $('#inputStatus').val();
            let stock = $('#inputStock').val();

            console.log(id_rumah);

            $.ajax({
                url: '/ubah-rumah-action-admin/' + id_rumah,
                type: "POST",



                data: {
                    _token: '{{ csrf_token() }}',
                    id_rumah: id_rumah,
                    cluster: cluster,
                    blok: blok,
                    nomor: nomor,
                    status: status,
                    stock: stock,
                },
                success: function(response) {
                    $('#successEdit').show();
                    console.log(response);

                    {{--  if (response != null) {


                            document.getElementById("inputID").value = response.id_rumah;
                            $('#rumahEdit').show();
                            $('#rumahSubmit').hide();
                        }  --}}

                },
                error: function(response) {
                    {{--  $('#nameErrorMsg').text(response.responseJSON.errors.name);
                    $('#emailErrorMsg').text(response.responseJSON.errors.email);
                    $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
                    $('#messageErrorMsg').text(response.responseJSON.errors.message);  --}}
                },
            });
        });
</script>

<script>
    $(document).ready(function() {
            $('#formulirPesanan').DataTable();
        });
</script>




@endsection

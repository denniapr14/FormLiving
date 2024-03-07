@extends('V_Admin.app')

@extends('flashdata')
@section('tittle', 'FORMS | Dashboard')

@section('content')

<!-- start: main -->


<!-- start: navbar -->

<!-- end: navbar -->

<!-- start: content -->

<div class="">




    <div class="card mb-3">
        <div class="card-body">
            <div class="card-title">
                <div class="card__title">
                    <a href="{{ route('tipeRumah.admin',[$getProjek->nama_projek,Crypt::encrypt($getRumah->id_rumah)] ) }}"
                        class="btn btn-outline-danger col-1" style="height: 40px; width: 50px"> <i
                            class="fa fa-arrow-left"></i></a>
                    <h1v>Tambah Tipe Rumah </h1> &nbsp;


                </div>

            </div>
            <form action="{{ route('postTipeRumah',$getProjek->nama_projek) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <input type="text" name="inputID" id="inputIDRumah" value="{{ $getRumah->id_rumah }}"
                    class="form form-control" hidden readonly>
                <div class="form-group">

                    <input type="text" name="tipe[]" id="" class="form-control" placeholder="Masukan Tipe Rumah"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">

                    <input type="text" name="luasBangunan[]" id="" class="form-control"
                        placeholder="Masukan Luas Bangunan" aria-describedby="helpId">
                </div>
                <div class="form-group">

                    <input type="number" name="kamarMandi[]" id="" class="form-control"
                        placeholder="Masukan Jumlah Kamar Mandi" aria-describedby="helpId">
                </div>
                <div class="form-group">

                    <input type="number" name="kamarTidur[]" id="" class="form-control"
                        placeholder="Masukan Jumlah Kamar Tidur" aria-describedby="helpId">
                </div>
                <div class="form-group">

                    <input type="number" name="harga[]" id="" class="form-control" placeholder="Masukan Harga"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">

                    <input type="text" name="hargaText[]" id="" class="form-control"
                        placeholder="Masukan Harga Perkiraan" aria-describedby="helpId">
                    <span>contoh : 900 juta</span>
                </div>
                <br>
                <h4>Detail Tipe Rumah</h4>
                <div class="form-group">

                    <input type="text" name="pondasi[]" id="" class="form-control" placeholder="Masukan Pondasi"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="struktur[]" id="" class="form-control"
                        placeholder="Masukan Struktur Bangunan" aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="dindingDalam[]" id="" class="form-control"
                        placeholder="Masukan Dinding Dalam" aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="dindingLuar[]" id="" class="form-control"
                        placeholder="Masukan Dinding Luar" aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="dindingKamarMandi[]" id="" class="form-control"
                        placeholder="Masukan Dinding Kamar Mandi" aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="dindingMejaDapur[]" id="" class="form-control"
                        placeholder="Masukan Dinding Meja Dapur" aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="lantaiRuangTidur[]" id="" class="form-control"
                        placeholder="Masukan Lantai Ruang Tidur" aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="lantaiRuangKeluarga[]" id="" class="form-control"
                        placeholder="Masukan Lantai Ruang Keluarga" aria-describedby="helpId">

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

                    <input type="text" name="rangkaAtap[]" id="" class="form-control" placeholder="Masukan Rangka Atap"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="penutupAtap[]" id="" class="form-control"
                        placeholder="Masukan Pentutup Atap" aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="kusen[]" id="" class="form-control" placeholder="Masukan Kusen"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <input type="text" name="daunPintu[]" id="" class="form-control" placeholder="Masukan Daun Pintu"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="sanitary[]" id="" class="form-control" placeholder="Masukan sanitary"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="plafonDalam[]" id="" class="form-control"
                        placeholder="Masukan Plafon Dalam" aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="handle[]" id="" class="form-control" placeholder="Masukan Handle"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="lighting[]" id="" class="form-control" placeholder="Masukan Lighting "
                        aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="dayaListrik[]" id="" class="form-control"
                        placeholder="Masukan Daya Listrik" aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="carport[]" id="" class="form-control" placeholder="Masukan Carport"
                        aria-describedby="helpId">

                </div>
                <div class="form-group">

                    <input type="text" name="tangga[]" id="" class="form-control" placeholder="Masukan Tangga"
                        aria-describedby="helpId">

                </div>

                <div id="fileInput0">
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

                <button type="button" class="btn btn-info" onclick="createForm()">Create Form</button>
                <div id="formsContainer"></div>

                <br>
                <button class="btn btn-primary" type="submit">Submit</button>

            </form>
        </div>
    </div>


    <!-- Modal order information-->

    <script>
        function addFile(id) {

                    const fileInputContainer = document.createElement("div");
                    fileInputContainer.innerHTML = `
                <br>
                    <input type="text" name="counter[]" id="counterID" value="`+id+`"  readonly hidden>
                    <label for="fileInput">Select a file:</label>
                    <input type="file" name="fileInput[]">
                    <button type="button" class="btn btn-danger" onclick="deleteFile()"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <select name="jenisGambar[]" id="" class="form form-control">
                        <option value="">---Pilih Jenis Gambar---</option>
                        <option value="Denah">Denah</option>
                        <option value="Gambar">Gambar</option>
                    </select>
                `;
                    document.querySelector("#fileInput"+id).appendChild(fileInputContainer);
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

                    <input type="number" name="kamarMandi[]" id="" class="form-control" placeholder="Masukan Jumlah Kamar Mandi"
                            aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <input type="number" name="kamarTidur[]" id="" class="form-control" placeholder="Masukan Jumlah Kamar Tidur"
                    aria-describedby="helpId">
                    </div>
                <div class="form-group">
                    <input type="number" name="harga[]" id="" class="form-control" placeholder="Masukan Harga"
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
                        <option velue="Video">Video</option>
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
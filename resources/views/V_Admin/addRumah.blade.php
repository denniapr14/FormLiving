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
                    <div class="">
                        <a href="{{ route('rumah.admin', $getProjek->nama_projek) }}" class="btn btn-outline-danger col-1"
                            style="height: 40px; width: 50px"> <i class="bi bi-arrow-left"></i></a> &nbsp;
                        <h1>Tambah Rumah </h1>

                    </div>

                </div>
                <div class="alert alert-success" role="alert" id="successMsg" style="display: none">
                    Data Sudah Tersimpan
                </div>
                <div class="alert alert-success" role="alert" id="successEdit" style="display: none">
                    Data Sudah Diubah
                </div>
                <form id="formRumah" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id_rumah" id="inputID" class="form form-control" readonly hidden>

                    <div class="form-group">
                        <select name="projek" id="projek" class="form-control">



                            <option value="{{ $getProjek->id_projek }}">{{ $getProjek->nama_projek }}</option>

                        </select>

                        <small id="errorMsgProjek" class="">Wajib di isi</small>
                    </div>
                    <div class="form-group">

                        <select name="cluster" class="form-control" id="inputCluster">
                            <option value="">--Pilih Cluster--</option>
                            @foreach ($getCluster as $cluster)
                                <option value="{{ $cluster->codecluster }}">{{ $cluster->nama_cluster }} -
                                    {{ $cluster->nama_projek }}</option>
                            @endforeach
                        </select>

                        <small id="errorMsgCluster" class="">Wajib di isi</small>
                    </div>
                    <div class="form-inline">

                        <div class="form-group mb-3 ">
                            <input type="text" name="blok" style="width: 100%" id="inputBlok" class="form-control"
                                placeholder="Masukan Blok Rumah" aria-describedby="helpId">

                        </div>

                        <div class="form-group mb-3">

                            <input type="text" name="nomor" id="inputNomor" class="form-control"
                                placeholder="Masukan Nomor Rumah" aria-describedby="helpId">


                        </div>
                        <small id="errorMsgBlokNomor" class="">Wajib di isi</small>

                    </div>
                    <div class="form-group">

                        <input type="number" name="luasTanah" id="inputLuasTanah" class="form-control"
                            placeholder="Masukan Luas Tanah" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Wajib di isi</small>
                    </div>
                    <div class="form-group">

                        <input type="number" name="inputVA" id="inputVA" class="form-control"
                            placeholder="Masukan Virtual Account bank" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Wajib di isi</small>
                    </div>



                    <div class="form-group">
                        <select name="status" class="form-control" id="inputStatus">
                            <option value="">--Pilih Status Rumah--</option>
                            <option value="Undeveloped">Undeveloped</option>
                            <option value="Available">Available</option>
                            <option value="Sold">Sold</option>
                            <option value="Hold">Hold</option>

                        </select>

                        <small id="errorMsgStatus" class="">Wajib di isi</small>
                    </div>
                    <div class="form-group">

                        <select name="status_stock" class="form-control" id="inputStock">
                            <option value="">--Pilih Status Stok--</option>
                            <option value="Ready">Ready</option>
                            <option value="Inden">Inden</option>
                        </select>

                        <small id="errorMsgStock" class="">Wajib di isi</small>
                    </div>



                    <br>
                    <button type="submit" id="rumahSubmit" class="btn btn-primary">Submit</button>
                    <button style="display: none" type="submit" id="rumahEdit" class="btn btn-success">Edit</button>
                    <br>
                </form>
            </div>
        </div>



        <div class="card mb-3">
            <div class="card-body">
                <div class="card-tittle">
                    <div class="">

                        <h1>Tambah Tipe Rumah </h1>

                    </div>

                </div>
                <form action="{{ route('postTipeRumah', $getProjek->nama_projek) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="inputID" id="inputIDRumah" class="form form-control" hidden readonly>
                    <div class="form-group">

                        <input type="text" name="tipe[]" id="" class="form-control"
                            placeholder="Masukan Tipe Rumah" aria-describedby="helpId">
                        <small>Tipe rumah wajib di isi</small>
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

                        <input type="number" name="harga[]" id="" class="form-control"
                            placeholder="Masukan Harga" aria-describedby="helpId">
                    </div>
                    <div class="form-group">

                        <input type="text" name="hargaText[]" id="" class="form-control"
                            placeholder="Masukan Harga Perkiraan" aria-describedby="helpId">
                        <span>contoh : 900 juta</span>
                    </div>
                    <br>
                    <h4>Detail Tipe Rumah</h4>
                    <div class="form-group">

                        <input type="text" name="pondasi[]" id="" class="form-control"
                            placeholder="Masukan Pondasi" aria-describedby="helpId">

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

                        <input type="text" name="rangkaAtap[]" id="" class="form-control"
                            placeholder="Masukan Rangka Atap" aria-describedby="helpId">

                    </div>
                    <div class="form-group">

                        <input type="text" name="penutupAtap[]" id="" class="form-control"
                            placeholder="Masukan Pentutup Atap" aria-describedby="helpId">

                    </div>
                    <div class="form-group">

                        <input type="text" name="kusen[]" id="" class="form-control"
                            placeholder="Masukan Kusen" aria-describedby="helpId">

                    </div>
                    <div class="form-group">
                        <input type="text" name="daunPintu[]" id="" class="form-control"
                            placeholder="Masukan Daun Pintu" aria-describedby="helpId">

                    </div>
                    <div class="form-group">

                        <input type="text" name="sanitary[]" id="" class="form-control"
                            placeholder="Masukan sanitary" aria-describedby="helpId">

                    </div>
                    <div class="form-group">

                        <input type="text" name="plafonDalam[]" id="" class="form-control"
                            placeholder="Masukan Plafon Dalam" aria-describedby="helpId">

                    </div>
                    <div class="form-group">

                        <input type="text" name="handle[]" id="" class="form-control"
                            placeholder="Masukan Handle" aria-describedby="helpId">

                    </div>
                    <div class="form-group">

                        <input type="text" name="lighting[]" id="" class="form-control"
                            placeholder="Masukan Lighting " aria-describedby="helpId">

                    </div>
                    <div class="form-group">

                        <input type="text" name="dayaListrik[]" id="" class="form-control"
                            placeholder="Masukan Daya Listrik" aria-describedby="helpId">

                    </div>
                    <div class="form-group">

                        <input type="text" name="carport[]" id="" class="form-control"
                            placeholder="Masukan Carport" aria-describedby="helpId">

                    </div>
                    <div class="form-group">

                        <input type="text" name="tangga[]" id="" class="form-control"
                            placeholder="Masukan Tangga" aria-describedby="helpId">

                    </div>

                    <div id="fileInput0">
                        <label for="fileInput">Select a file:</label>
                        <input type="text" name="counter[]" id="counterID" value="0" readonly hidden>
                        <input type="file" id="fileInput" name="fileInput[]">
                        <button type="button" onclick="deleteFile(id)">Delete</button>
                        <select name="jenisGambar[]" id="" class="form form-control">
                            <option value="">---Pilih Jenis Gambar---</option>
                            <option value="Denah">Denah</option>
                            <option value="Gambar">Gambar</option>
                        </select>

                    </div>

                    <button type="button" onclick="addFile(id= 0)">Add File Input</button>
                    <br><br>

                    <button type="button" onclick="createForm()">Create Form</button>
                    <div id="formsContainer"></div>


                    <button class="btn btn-primary" type="submit">Submit</button>

                </form>
            </div>
        </div>

        <!-- end: content -->




        <script>
            function addFile(id) {

                const fileInputContainer = document.createElement("div");
                fileInputContainer.innerHTML = `
                <br>
                    <input type="text" name="counter[]" id="counterID" value="` + id + `"  readonly hidden>
                    <label for="fileInput">Select a file:</label>
                    <input type="file" name="fileInput[]">
                    <button type="button" onclick="deleteFile()">Delete</button>
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
            const form = document.getElementById('formRumah');
            $('#rumahSubmit').click(function(e) {
                e.preventDefault();
                let projek = $('#projek').val();
                let cluster = $('#inputCluster').val();
                let blok = $('#inputBlok').val();
                let nomor = $('#inputNomor').val();
                let luasTanah = $('#inputLuasTanah').val();
                let status = $('#inputStatus').val();
                let stock = $('#inputStock').val();
                let va = $('#inputVA').val();

                $.ajax({
                    url: "{{ route('postRumah') }}",
                    type: "POST",

                    data: {
                        _token: '{{ csrf_token() }}',
                        projek: projek,
                        cluster: cluster,
                        blok: blok,
                        nomor: nomor,
                        status: status,
                        stock: stock,
                        luasTanah: luasTanah,
                        va: va


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
                        {{--  $('#errorMsgProjek').show();
                            $('#errorMsgCluster').show();
                            $('#errorMsgBlokNomor').show();

                            $('#errorMsgStatus').show();
                            $('#errorMsgStock').show();
                        $('#errorMsgProjek').text("Wajib mengisi projek");
                        $('#errorMsgCluster').text("wajib mengisi cluster rumah");
                        $('#errorMsgBlokNomor').text("Wajib mengisi blok dan nomor rumah");

                        $('#errorMsgStatus').text("Wajib mengisi status rumah");
                        $('#errorMsgStock').text("Wajib mengisi stok rumah");  --}}
                    },
                });
            });

            $('#rumahEdit').click(function(e) {
                e.preventDefault();

                let projek = $('#projek').val();
                let id_rumah = $('#inputID').val();
                let cluster = $('#inputCluster').val();
                let blok = $('#inputBlok').val();
                let nomor = $('#inputNomor').val();
                let luasTanah = $('#inputLuasTanah').val();
                let status = $('#inputStatus').val();
                let stock = $('#inputStock').val();
                let va = $('#inputVA').val();



                $.ajax({
                    url: '/ubah-rumah-action-admin/' + id_rumah,
                    type: "POST",



                    data: {
                        _token: '{{ csrf_token() }}',
                        id_rumah: id_rumah,
                        projek: projek,
                        cluster: cluster,
                        blok: blok,
                        nomor: nomor,
                        status: status,
                        stock: stock,
                        luasTanah: luasTanah,
                        va: va

                    },
                    success: function(response) {
                        $('#successEdit').show();
                        {{--  console.log(response);  --}}

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

@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('V_Admin.footer')

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

                        <h1>Tambah Rumah </h1>

                    </div>

                </div>
                <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                    Data Sudah Tersimpan
                </div>
                <div class="alert alert-success" role="alert" id="successEdit" style="display: none" >
                    Data Sudah Diubah
                </div>
                <form id="formRumah" >
                    @csrf
                    <input type="text" name="id_rumah" id="inputID" class="form form-control">

                    <div class="form-group">

                        <select name="cluster" class="form-control" id="inputCluster">
                            <option value="">--Pilih Cluster--</option>
                            @foreach ($getCluster as $cluster)
                                <option value="{{ $cluster->codecluster }}">{{ $cluster->nama_cluster }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-inline">
                        <div class="form-group mb-3 ">
                            <input type="text" name="blok" style="width: 100%" id="inputBlok" class="form-control"
                                placeholder="Masukan Blok Rumah" aria-describedby="helpId">
                        </div>
                        &nbsp;
                        <div class="form-group mb-3">
                            - &nbsp;
                            <input type="text" name="nomor" id="inputNomor" class="form-control"
                                placeholder="Masukan Nomor Rumah" aria-describedby="helpId">
                        </div>
                    </div>



                    <div class="form-group">
                        <select name="status" class="form-control" id="inputStatus">
                            <option value="">--Pilih Status Rumah--</option>
                            <option value="Available">Available</option>
                            <option value="Undeveloped">Undeveloped</option>
                        </select>
                    </div>
                    <div class="form-group">

                        <select name="status_stock" class="form-control" id="inputStock">
                            <option value="">--Pilih Status Stok--</option>
                            <option value="Ready">Ready</option>
                            <option value="Inden">Inden</option>
                        </select>
                    </div>
                    <button type="submit" id="rumahSubmit" class="btn btn-primary">Submit</button>
                    <button style="display: none" type="submit" id="rumahEdit"  class="btn btn-success">Edit</button>
                    <br>
                </form>
            </div>
        </div>



        <div class="content__row mb-3">
            <div class="card__box">
                <div class="card__header">
                    <div class="card__title">

                        <h1>Tambah Tipe Rumah </h1>

                    </div>

                </div>

                <div class="form-group">
                    <label for="">Tipe Rumah</label>
                    <input type="text" name="tipe" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Luas Bangunan</label>
                    <input type="text" name="luasBangunan" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Kamar Mandi</label>
                    <input type="text" name="kamarMandi" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Kamar Tidur</label>
                    <input type="text" name="kamarTidur" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="text" name="harga" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Harga Perkiraan</label>
                    <input type="text" name="hargaText" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    <span>contoh : 900 juta</span>
                </div>
                <br>
                <h4>Detail Tipe Rumah</h4>
                <div class="form-group">
                    <label for="">Pondasi</label>
                    <input type="text" name="pondasi" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Struktur Bangunan</label>
                    <input type="text" name="struktur" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Dinding Dalam</label>
                    <input type="text" name="dindingDalam" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Dinding Luar</label>
                    <input type="text" name="dindingLuar" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Dinding Kamar Mandi</label>
                    <input type="text" name="dindingKamarMandi" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Dinding Meja Dapur</label>
                    <input type="text" name="dindingMejaDapur" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Lantai Ruang Tidur</label>
                    <input type="text" name="lantaiRuangTidur" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Lantai Ruang Keluarga</label>
                    <input type="text" name="lantaiRuangKeluarga" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Lantai Kamar Mandi Utama</label>
                    <input type="text" name="lantaiKamarMandiUtama" id="" class="form-control"
                        placeholder="" aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Lantai Teras Utama</label>
                    <input type="text" name="lantaiTerasUtama" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Rangka Atap</label>
                    <input type="text" name="rangkaAtap" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Penutup Atap</label>
                    <input type="text" name="penutupAtap" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Kusen</label>
                    <input type="text" name="kusen" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Daun Pintu</label>
                    <input type="text" name="daunPintu" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Sanitary</label>
                    <input type="text" name="sanitary" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Plafon Dalam</label>
                    <input type="text" name="plafonDalam" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Handle</label>
                    <input type="text" name="handle" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Lighting</label>
                    <input type="text" name="lighting" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Daya Listrik</label>
                    <input type="text" name="dayaListrik" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Carport</label>
                    <input type="text" name="carport" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>
                <div class="form-group">
                    <label for="">Tangga</label>
                    <input type="text" name="tangga" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">

                </div>

                <button class="btn btn-primary" type="submit">Submit</button>


            </div>
        </div>
        <!-- end: content -->

        <!-- start: footer -->
        <section class="footer mt-3">
            <div class="content__row">
                <div class="col-12 p-0">
                    <div class="card__box">
                        <p class="m-0">Designed by <a class="footer__link" title="Wolftagon"
                                href="https://www.wolftagon.com/">Wolftagon</a></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: footer -->


        <!-- end: main -->

        <!-- Modal -->
        <div class="modal modal-sweet-alert modal-sweet-alert--error fade" id="delete-alert" data-backdrop="static"
            data-keyboard="false" tabindex="-1" aria-labelledby="delete-alertLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="alert-icon">
                            <i class="bi bi-trash"></i>
                        </div>
                        <h1>Delete Data?</h1>
                        <p>You will not able to recover all this invoice!</p>
                        <a href="#" class="btn btn-outline-danger" data-dismiss="modal">Cancel</a>
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Change Confirmation-->
        <div class="modal modal-sweet-alert modal-sweet-alert--warning fade" id="change-alert" data-backdrop="static"
            data-keyboard="false" tabindex="-1" aria-labelledby="change-alertLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="alert-icon">
                            <i class="bi bi-exclamation-circle"></i>
                        </div>
                        <h1>Are you sure want to change status this invoice?</h1>
                        <p>You will not able to recover all this invoice!</p>
                        <a href="#" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</a>
                        <a href="#" class="btn btn-warning" data-dismiss="modal">Change</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal order information-->
        <div class="modal modal-form fade" id="order-information" data-backdrop="static" data-keyboard="false"
            tabindex="-1" aria-labelledby="order-informationLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Order Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    No. Order Form
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>ORF-10001</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Agent ID
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>AG-0000001</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Agent Name
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>Bambang</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Client Name
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>Client A</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    No. Hp
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>08965123455</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Project Name
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>Araya Hotel</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Price
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>1.300.000.000</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Fee Received
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <span>1.300.000</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label align-self-center">
                                    Status
                                </label>
                                <div class="col-sm-8 align-self-center">
                                    <div class="badge badge--success">verified</div>
                                </div>
                            </div>
                            <div class="row pt-4">
                                <div class="col-12">
                                    <button class="btn-fd-primary w-100" type="submit"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        function rupiah($angka)
        {
            $hasil_rupiah = 'Rp ' . number_format($angka, 0, ',', '.') . ',-';
            return $hasil_rupiah;
        } ?>



        <script type="text/javascript">



            $('#rumahSubmit').click(function(e){
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
                        _token: '{{csrf_token()}}',
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

            $('#rumahEdit').click(function(e){
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
                        _token: '{{csrf_token()}}',
                        id_rumah:id_rumah,
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

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

            <br>
            <div class="card-title">

                <a href="{{  route('rumah.admin', $getProjek->nama_projek)  }}" class="btn btn-outline-danger"
                    style="height: 40px; width: 50px">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i></a> &nbsp;
                <i class="bi bi-clipboard2-plus"></i>
                <span>Tipe Rumah {{ $getRumah->nama_cluster }} / {{ $getRumah->blok }} - {{ $getRumah->nomor }}
                </span>



                <div class="float-right">
                    <a href="{{ route('storeTipeRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($getRumah->id_rumah)]) }}"
                        class="btn btn-outline-primary btn--small">Tambah Tipe Rumah</a>
                </div>
            </div>

            <div class="table-responsive">

                <table id="rumah" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tipe Rumah</th>
                            <th>Informasi</th>
                            <th>Harga</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            ?>
                        @if (!empty($getTipeRumah))
                        @foreach ($getTipeRumah as $tipeRumah)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $tipeRumah->jenis_tr }}

                            </td>
                            <td>

                                <div class="d-flex flex-nowrap">
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                        <div class="p-2 bd-highlight">
                                            <i class="fa fa-bath" aria-hidden="true"></i>
                                            <span class="badge badge--primary">{{ $tipeRumah->kmr_mandi_tr }}</span>

                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                            <span class="badge badge--primary">{{ $tipeRumah->kmr_tidur_tr }}</span>
                                        </div>

                                    </div>

                                    <div>

                                    </div>

                                </div>

                            </td>
                            <td>Rp {{ rupiah($tipeRumah->harga_tr) }}</td>
                            <td>
                                <div class="">

                                    <button type="button" class="btn btn-outline-info" data-target="#tipeRumah{{ $no }}"
                                        data-toggle="modal" data-target=".bd-example-modal-lg{{ $no }}"> <i
                                            class="fa fa-eye" aria-hidden="true"></i>
                                    </button>

                                    <div class="modal modal-form fade" id="tipeRumah{{ $no }}" data-backdrop="static"
                                        data-keyboard="false" tabindex="-1" aria-labelledby="order-informationLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Tipe Rumah
                                                        {{ $tipeRumah->jenis_tr }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="product-listing">

                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Kamar Mandi
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    {{ $tipeRumah->kmr_mandi_tr }}
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Kamar Tidur
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    {{ $tipeRumah->kmr_tidur_tr }}
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Tipe Rumah
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->jenis_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Pondasi
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->pondasi_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Struktur
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->struktur_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Dinding Luar
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->dinding_luar_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Dinding Dalam
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->dinding_dlm_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Dinding Kamar Mandi Utama
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->dinding_kmr_mnd_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Dinding Meja Dapur
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->dd_meja_dapur_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Lantai Ruang Tidur
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->lt_ruang_tidur_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Lantai Ruang Tidur
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->lt_ruang_tidur_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Lantai Ruang Keluarga
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->lt_ruang_keluarga_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Lantai Kamar Mandi Utama
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->lt_kmr_mnd_utama_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Lantai Teras Utama
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->lt_teras_utama_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Rangka Atap
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->rangka_atap_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Kusen
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->kusen_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Daun Pintu
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->daun_pintu_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Sanitary
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->sanitary_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Penutup Atap
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->penutup_atap_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Plafon Dalam
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->plafon_dlm_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Handle
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->handle_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Lighting
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->lighting_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Daya Listrik
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->daya_listrik_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Carport
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->carport_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label align-self-center">
                                                                    Tangga
                                                                </label>
                                                                <div class="col-sm-8 align-self-center">
                                                                    <span>{{ $tipeRumah->tangga_tr }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="component__listing">
                                                                @foreach ($getGambar as $gambar)
                                                                @if ($tipeRumah->id_tipe_rumah == $gambar->id_tipe)
                                                                @if ($gambar->jenis_img == 'gambar')
                                                                <div class="component__item col-md-6">
                                                                    <div class="component__card">
                                                                        <div class="card__image">
                                                                            <img src="{{ url('Home') }}/images/tipe/{{ $gambar->img_rumah }}"
                                                                                alt="product-1">
                                                                        </div>
                                                                        <div class="card__details">
                                                                            <p>{{ $gambar->jenis_img }}
                                                                            </p>


                                                                            <div class="button-box">
                                                                                @if ($user->kategori == 'SuperAdmin' ||
                                                                                $user->kategori == 'AdminAccounting' ||
                                                                                $user->kategori == 'AdminAdv')
                                                                                @if ($gambar->status_gr != 'nonaktif')
                                                                                <a href="/gambar-rumah/status/nonaktif/{{ Crypt::encrypt($gambar->id_gambar_rumah) }}"
                                                                                    class="btn-fd-outline-secondary btn--small"
                                                                                    data-toggle="modal">
                                                                                    <i class="fa fa-toggle-off"
                                                                                        aria-hidden="true"></i>
                                                                                    Nonaktif</a>
                                                                                @else
                                                                                <a href="/gambar-rumah/status/aktif/{{ Crypt::encrypt($gambar->id_gambar_rumah) }}"
                                                                                    class="btn-fd-outline-secondary btn--small"
                                                                                    data-toggle="modal"><i
                                                                                        class="fa fa-toggle-off"
                                                                                        aria-hidden="true"></i>
                                                                                    Aktif</a>
                                                                                @endif
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($gambar->jenis_img == 'denah')
                                                                <div class="component__item col-md-6">
                                                                    <div class="component__card">
                                                                        <div class="card__image">
                                                                            <img src="{{ url('Home') }}/images/denah/{{ $gambar->img_rumah }}"
                                                                                alt="product-1">
                                                                        </div>
                                                                        <div class="card__details">
                                                                            <p>{{ $gambar->jenis_img }}
                                                                            </p>


                                                                            <div class="button-box">
                                                                                @if ($user->kategori == 'SuperAdmin' ||
                                                                                $user->kategori == 'AdminAccounting' ||
                                                                                $user->kategori == 'AdminAdv')
                                                                                @if ($gambar->status_gr != 'nonaktif')
                                                                                <a href="/gambar-rumah/status/nonaktif/{{ Crypt::encrypt($gambar->id_gambar_rumah) }}"
                                                                                    class="btn-fd-outline-secondary btn--small"
                                                                                    data-toggle="modal">
                                                                                    <i class="fa fa-toggle-off"
                                                                                        aria-hidden="true"></i>
                                                                                    Nonaktif</a>
                                                                                @else
                                                                                <a href="/gambar-rumah/status/aktif/{{ Crypt::encrypt($gambar->id_gambar_rumah) }}"
                                                                                    class="btn-fd-outline-secondary btn--small"
                                                                                    data-toggle="modal">
                                                                                    <i class="fa fa-toggle-off"
                                                                                        aria-hidden="true"></i>
                                                                                    Aktif</a>
                                                                                @endif
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endforeach




                                                            </div>

                                                            <div class="row pt-4">
                                                                <div class="col-12">
                                                                    <button class="btn-fd-primary w-100" type="submit"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' ||
                                    $user->kategori == 'AdminAdv')
                                    <a href="{{ route('updateTipeRumah.admin', [$getProjek->nama_projek, Crypt::encrypt($tipeRumah->id_tipe_rumah)]) }}"
                                        class="btn btn-outline-info">
                                        <i class="fas fa-edit    "></i>
                                    </a>

                                    <button type="button" class="btn btn-outline-info"
                                        data-target="#delTipeRumah{{ $no }}" data-toggle="modal"
                                        data-target=".bd-example-modal-lg{{ $no }}"> <i class="fa fa-trash"
                                            aria-hidden="true"></i>
                                    </button>

                                    <div class="modal modal-form fade" id="delTipeRumah{{ $no }}" data-backdrop="static"
                                        data-keyboard="false" tabindex="-1" aria-labelledby="order-informationLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Apa anda yakin menghapus user
                                                        {{ $tipeRumah->jenis_tr }} ?
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                                                    </button>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row pt-4 col-12">
                                                        <div class="col-6 mb-1">
                                                            <a href="{{  route('deleteTipeRumah.admin',Crypt::encrypt($tipeRumah->id_tipe_rumah)) }}"
                                                                class="btn-fd-primary  w-100">Ya</a>
                                                        </div>
                                                        <div class="col-6 mb-1">
                                                            <button class="btn-fd-primary w-100"
                                                                data-dismiss="modal">Tidak</button>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-outline-info p-2" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Video
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Video</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('addVideoTipeRumahAction.admin', [$getProjek->nama_projek,Crypt::encrypt($tipeRumah->id_tipe_rumah)]) }}">
                                                    @csrf

                                                <div class="modal-body">
                                                    <table>
                                                        @foreach ($getVideoTipeRumah as $video)
                                                            @if ($video->id_tipe == $tipeRumah->id_tipe_rumah && $video->status_gr =="aktif")
                                                                <tr>
                                                                    <td>

                                                                        <a href="{{ $video->img_rumah }}" class="" id="link{{ $video->id_gambar_rumah }}"> {{ $video->img_rumah }}</a></td>
                                                                    <td>
                                                                        <!-- View Button -->
                                                                        <a href="{{ $video->img_rumah }}" id="see{{ $video->id_gambar_rumah }}" class="btn btn-outline-info" target="_blank">
                                                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                                                        </a>
                                                                        <!-- Edit Button -->
                                                                        <button type="button" class="btn btn-outline-info edit-button" data-id="{{ $video->id_gambar_rumah }}">
                                                                            <i class="fas fa-edit"></i> Edit
                                                                        </button>
                                                                        <button type="button" class="btn btn-outline-danger delete-button" data-id="{{ $video->id_gambar_rumah }}">
                                                                            <i class="fas fa-trash"></i> Delete
                                                                        </button>
                                                                        <!-- Edit Form -->
                                                                        <div class="edit-form" id="editForm{{ $video->id_gambar_rumah }}" style="display: none;">
                                                                            <input type="text" class="form-control edit-video-url" placeholder="Edit Video URL" value="{{ $video->img_rumah }}">
                                                                            <button type="button" class="btn btn-primary submit-edit-button" data-id="{{ $video->id_gambar_rumah }}">Submit</button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </table>


                                                    <div class="form-group">
                                                        <label for="">Video</label>
                                                        <input type="text" name="jenis_img" value="video" hidden>
                                                        <input type="text" name="img_rumah" required class="form-control"
                                                            placeholder="masukan link video youtube">
                                                    </div>
                                                    <br>
                                                    <div id="accordion">
                                                        <div class="card">
                                                          <div class="card-header">
                                                            <h5 class="mb-0">
                                                              <button class="btn btn-link" data-toggle="collapse" data-target="#step1">
                                                                Langkah-langkah Mengambil Link Embed Video YouTube
                                                              </button>
                                                            </h5>
                                                          </div>
                                                          <div id="step1" class="collapse" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <ol>
                                                                    <li><strong>Buka Video YouTube:</strong> Mulailah dengan membuka video YouTube yang ingin Anda sematkan di situs web atau platform lain.</li>
                                                                    <li><strong>Klik Tombol Bagikan:</strong> Di bawah video, Anda akan melihat tombol "Bagikan". Klik tombol ini untuk melanjutkan.</li>
                                                                    <li><strong>Pilih Opsi Embed:</strong> Setelah Anda klik tombol "Bagikan", pilih opsi "Embed".</li>
                                                                    <li><strong>Salin Link Embed:</strong> Setelah Anda memilih opsi "Embed", Anda akan melihat kode HTML yang mencakup link embed video YouTube. Temukan dan salin link embed saja.</li>
                                                                    <li><strong>Gunakan Link Embed:</strong> Anda dapat menempelkan link embed ini di mana pun Anda butuhkan dalam kode HTML halaman web atau platform lainnya. Ini akan menghasilkan video YouTube yang disematkan di situs tersebut.</li>
                                                                  </ol>
                                                                <strong>Contoh</strong>
                                                                <div class="alert bg-gray-25">

                                                                    &lt;iframe width="560" height="315" src="<strong><u>https://www.youtube.com/embed/NZp4rr5wh3o?si=A84fPYFsBPq6Vw_T</u></strong>"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen&gt;&lt;/iframe&gt;
                                                                </div>

                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary float-left"
                                                        data-dismiss="modal">Close</button>
                                                    <!-- Additional buttons or actions here -->
                                                    <button type="submit" class="btn btn-outline-success float-right">Submit</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <?php
                                    $no++;
                                    ?>
                        @endforeach
                        @else
                        <div class="alert alert-danger">Tidak ada data</div>
                        @endif


                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <!-- end: content -->

    <script>
        @if (!empty($video))
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".edit-button");

            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const formId = this.getAttribute("data-id");
                    const editForm = document.getElementById(`editForm${formId}`);
                    editForm.style.display = "block";
                });
            });

            const submitButtons = document.querySelectorAll(".submit-edit-button");

            submitButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const formId = this.getAttribute("data-id");
                    const editForm = document.getElementById(`editForm${formId}`);
                    const videoUrl = editForm.querySelector(".edit-video-url").value;
                    console.log(videoUrl);
                    // AJAX request to submit the edited video URL
                    // Replace the URL with your actual endpoint
                    // Example using fetch API
                    fetch("{{ route('updateVideoTipeRumahAction.admin', [$getProjek->nama_projek, Crypt::encrypt($tipeRumah->id_tipe_rumah),  Crypt::encrypt($video->id_gambar_rumah)]) }}", { // Using Laravel named route
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-Token": "{{ csrf_token() }}" // Add CSRF token for security
                        },
                        body: JSON.stringify({ formId: formId, videoUrl: videoUrl }),
                    })
                    .then(response => {
                        if (response.ok) {
                            // Handle success
                            console.log("Video URL submitted successfully.");
                            const link = document.getElementById(`link${formId}`);
                            link.href = videoUrl;
                            link.textContent = videoUrl;
                            const see = document.getElementById(`see${formId}`);
                            see.href = videoUrl;
                            editForm.style.display = "none";

                        } else {
                            alert('video gagal');
                            // Handle error
                            console.error("Failed to submit video URL.");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
                });
            });

            const deleteButtons = document.querySelectorAll(".delete-button");

            deleteButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const formId = this.getAttribute("data-id");

                    // Confirm deletion
                    if (confirm("Are you sure you want to delete this video?")) {
                        fetch("{{ route('deleteVideoTipeRumahAction.admin', [$getProjek->nama_projek, Crypt::encrypt($tipeRumah->id_tipe_rumah),  Crypt::encrypt($video->id_gambar_rumah)]) }}", {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-Token": "{{ csrf_token() }}"
                            },
                        })
                        .then(response => {
                            if (response.ok) {
                                console.log("Video deleted successfully.");
                                const row = button.closest('tr');
                                row.parentNode.removeChild(row);
                                // Optionally, you can remove the row from the table
                                // button.closest('tr').remove();
                            } else {
                                alert('Failed to delete video.');
                                console.error("Failed to delete video.");
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                        });
                    }
                });
            });


        });

        @else

        @endif
        // JavaScript to handle edit button click and form submission

    </script>

    <script>
        function updateTime() {
                const now = new Date();
                const hours = now.getHours();
                const minutes = now.getMinutes();
                const seconds = now.getSeconds();
                const timeString = `${hours}:${minutes}:${seconds}`;
                document.getElementById('clock').textContent = timeString;
            }
            setInterval(updateTime, 1000);
    </script>

    <script>
        $(document).ready(function() {
                $('#rumah').DataTable();
            });
    </script>
    <script>
        $(document).ready(function() {
                $('#showToastButton').click(function() {
                    Toastify({
                        text: "Hello, this is a toast message!",
                        duration: 3000,
                        gravity: "bottom",
                        positionLeft: false,
                        close: true,
                        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        stopOnFocus: true
                    }).showToast();
                });
            });
    </script>
    @endsection

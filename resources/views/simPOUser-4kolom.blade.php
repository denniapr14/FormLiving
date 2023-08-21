@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@extends('flashdata')
@section('tittle', 'Forms | Data pelanggan')
@section('body', '')



@section('content')




<div class="cluster">
  <div class="header-simulation mobile-only">
    <div class="ornament one">
      <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
    </div>
    <div class="nav-header">
      <!--<div class="ic-back">-->
      <!--    <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">-->
      <!--</div>-->
      <h2 class="title">
        Miliki Unit
      </h2>
      <div></div>
    </div>
    <div class="steps">
      <div class="step done">1</div>
      <div class="step active">2</div>
      <div class="step last">3</div>
    </div>
  </div>
  <div class="container">
    <div class="steps">
      <div class="step done">1</div>
      <div class="step active">2</div>
      <div class="step last">3</div>
    </div>
    <div>

      <div class="second-layout">
        <div class="row">
          <div class="col-12 order-2 order-lg-1">
            <h2 class="title">
              Pengisian Data Pelanggan
            </h2>
          </div>
          <div class="col-12 col-lg-4 left-column order-1 order-lg-2">
            <div class="mod-type">
              <div class="type-image">
                <img src="{{ asset('Home') }}/images/rumah/{{$rumah->img_rumah}}" alt="">
              </div>
              <div class="items">

                <div class="type-item">
                  <p>Blok</p>
                  <h5>{{ $rumah->blok }} - {{ $rumah->nomor }}</h5>
                </div>
                <div class="type-item">
                  <p>Cluster</p>
                  <h5>{{ $rumah->nama_cluster }}</h5>
                </div>
                <div class="type-item">
                  <p>Luas Tanah</p>
                  <h5>{{ $rumah->luas_tanah }} m<sup>2</sup></h5>
                </div>
              </div>
            </div>
          </div>

          @if (!empty(Session::get('guest')))
          <div class="col-12 col-lg-8 right-column order-3">
            <small style="color:red;">Diperlukan*</small><br>
            <br>
            <form action="{{ route('dataPO.action', [$rumah->id_rumah]) }}" method="POST">
              @csrf
              <input type="hidden" name="code" value="{{ $dataFunctionUser }}">
              <div class="row form-order">
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="name" class="form-label">Nama (Sesuai KTP)<small style="color:red;">*</small></label>
                    <input type="text" class="input form-control" name="nama" id="name" value="{{ old('name') }}"
                      placeholder="Nama (Sesuai KTP)">
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="nik" class="form-label">NIK<small style="color:red;">*</small></label>
                    <input type="text" class="input form-control" name="nik" id="nik" value="{{ old('nik') }}"
                      placeholder="NIK">
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="nik" class="form-label">Pekerjaan</label>
                    <input type="text" class="input form-control" name="pekerjaan" id="pekerjaan"
                      value="{{ old('pekerjaan') }}" placeholder="pekerjaan">
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="nik" class="input form-label">Sumber Dana</label>
                    <input type="text" class="form-control" name="sumberDana" id="sumberDana"
                      value="{{ old('sumberDana') }}" placeholder="sumber dana">
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="telp" class="form-label">No. Telepon<small style="color:red;">*</small> </label>
                    <input type="text" class="input form-control" name="telp" id="telp" placeholder="No. Telp"
                      value="{{ old('telp') }}">

                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="wa" class="form-label">No. Whataspp (Aktif)</label>
                    <input type="text" class="input form-control" name="wa" id="wa" value="{{ old('wa') }}"
                      placeholder="No. Whataspp (Aktif)">
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="email" class="form-label">Email<small style="color:red;">**</small></label>
                    <input type="text" class="input form-control" name="email" id="email" value="{{ old('email') }}"
                      placeholder="Email untuk dikirim Surat Pemesanan Rumah">
                  </div>
                </div>

                <div class="btn-groups">
                  <a href="/PreOrderSelect" type="button" class="btn btn-grey">Kembali</a>
                  <button type="submit" value="submit" id="submit" class="btn btn-primary">Lanjutkan</button>

                </div>
            </form>
          </div>

          @elseif (session::get('user'))
          <div class="col-12 col-lg-8 right-column order-3">
            <small style="color:red;">Diperlukan*</small><br>
            <br>
            <form action="{{ route('dataPO.action', [$rumah->id_rumah]) }}" method="POST">
              @csrf
              <input type="hidden" name="code" value="{{ $dataFunctionUser}}">
              <div class="row form-order">
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="nik" class="form-label">NIK<small style="color:red;">*</small></label>
                    <input type="text" class="input form-control" name="nik" id="nik" value="{{ old('nik') }}"
                      placeholder="NIK">
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="name" class="form-label">Nama (Sesuai KTP)<small style="color:red;">*</small></label>
                    <input type="text" class="input form-control" name="nama" id="name" value="{{ old('name') }}"
                      placeholder="Nama (Sesuai KTP)">
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="telp" class="form-label">No. Telepon<small style="color:red;">*</small></label>
                    <input type="text" class="input form-control" name="telp" id="telp" placeholder="No. Telp"
                      value="{{ old('telp') }}">
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="email" class="form-label">Email<small style="color:red;">* untuk invoice</small></label>
                    <input type="text" class="input form-control" name="email" id="email" value="{{ old('email') }}"
                      placeholder="Email untuk dikirim Invoice">
                  </div>
                </div>
                <div class="btn-groups">
                  <a href="/PreOrderSelect" type="button" class="btn btn-grey">Kembali</a>
                  <button type="submit" value="submit" id="submit" class="btn btn-primary">Lanjutkan</button>
                </div>
            </form>
          </div>
          @endif

        </div>
      </div>
    </div>

  </div>
</div>
</div>

<div class="modal fade promo" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
  aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body promo-modal">
        <h5 class="promo-title">
          Pakai Promo
        </h5>

        <div class="promo-input">
          <input type="text" class="form-control" name="promo" id="promo" placeholder="Masukkan kode promo">

          <a id="cariPromo" class="btn">Terapkan</a>
        </div>
        <!-- STATE PROMO -->
        <div class=" d-block ">

          <h5 class="mb-4">Pilih Promo</h5>

          @if (empty($promoRumah))
          <h5>Promo Rumah</h5>
          Tidak ada promo Rumah
          @else
          <h5>Promo Rumah</h5>
          @foreach ($promoRumah as $promoRumah)
          <div class="promo-item ">
            <div class="row ">
              <div class="promo-icon col-md-1">
                <img src="{{ asset('Home') }}/images/ic-promo.png" alt="Promo">
              </div>
              <div class="promo-text col-md-8">

                <h6 id='keteranganPromo'>{{ $promoRumah->promo
                  }}</h6>
                <p>Berlaku hingga:
                  {{ date('d M Y',
                  strtotime($promoRumah->tgl_berakhir)) }}
                </p>
                <div class="hemat">
                  <p class="light-grey-color">Anda bisa hemat
                  </p>
                  <h5>Rp.
                    {{rupiah($promoRumah->diskon_promo)}}
                  </h5>
                </div>
              </div>
              <div class="promo-button col-md-2">

                <a class="promoCodeBtn btn btn-outline-success" data-promo-code="{{ $promoRumah->kode_promo }}"
                  data-promo="{{ $promoRumah->promo }}">{{
                  $promoRumah->kode_promo }} </a>
              </div>
            </div>
          </div>
          @endforeach
          @endif


          @if (empty($promo))
          <h5>Promo Cluster</h5>
          Tidak ada promo cluster
          @else
          <h5>Promo Cluster</h5>
          @foreach ($promo as $promo)
          <div class="promo-item ">
            <div class="row ">
              <div class="promo-icon col-md-1">
                <img src="{{ asset('Home') }}/images/ic-promo.png" alt="Promo">
              </div>
              <div class="promo-text col-md-8">

                <h6 id='keteranganPromo'>{{ $promo->promo }}
                </h6>
                <p>Berlaku hingga:
                  {{ date('d M Y',
                  strtotime($promo->tgl_berakhir)) }}
                </p>
                <div class="hemat">
                  <p class="light-grey-color">Anda bisa hemat
                  </p>
                  <h5>Rp. {{rupiah($promo->diskon_promo)}}
                  </h5>
                </div>
              </div>
              <div class="promo-button col-md-2">

                <a class="promoCodeBtn btn btn-outline-success" data-promo-code="{{ $promo->kode_promo }}"
                  data-promo="{{ $promo->promo }}">{{
                  $promo->kode_promo }} </a>


              </div>
            </div>

          </div>
          @endforeach
          @endif

        </div>
        <!-- STATE NO PROMO -->
        <div class="no-promo text-center d-none">
          <img src="{{ asset('Home') }}/images/img-illustration4.png" class="w-100" alt="">
        </div>
      </div>

      <div class="modal-footer promo-footer">

      </div>
    </div>
  </div>
</div>

<script>
  const promoCodeBtns = document.querySelectorAll(".promoCodeBtn");
const selectedPromoCodeInput = document.getElementById("selectedPromoCode");

promoCodeBtns.forEach((promoCodeBtn) => {
  promoCodeBtn.addEventListener("click", () => {
    const promoCode = promoCodeBtn.dataset.promoCode;
    const promo = promoCodeBtn.dataset.promo;
    selectedPromoCodeInput.value = promoCode;
    console.log(promoCode);

    document.getElementById('textPromo').innerText = promo;

    $('#modelId').modal('toggle');
    $('#modelId').modal('hide');

  });
});
</script>


<!-- Modal -->


@endsection
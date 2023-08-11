@extends('V_Admin.app')
@extends('V_Admin.sidebar')
@extends('flashdata')
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

                        Ubah Profile {{ $getUser->nama_ua }}

                    </div>

                </div>
                <form action="{{ route('updateUserProfileAction.admin', Crypt::encrypt($getUser->id_user_admin)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="username" id="" class="form-control" value="{{ $getUser->username_ua }}" readonly placeholder="Masukan Nama" aria-describedby="helpId">
                      </div>

                    <div class="form-group">
                      <input type="text" name="nama" id="" class="form-control" value="{{ $getUser->nama_ua }}" placeholder="Masukan Nama" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="" class="form-control" value="{{ $getUser->email_ua }}" placeholder="Masukan Email" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <input type="text" name="no_telp" id="" class="form-control" value="{{ $getUser->no_tlp_ua }}" placeholder="Masukan Nomor Telepon" aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                        <textarea name="alamat" class="form-control" id="" placeholder="Masukan Alamat" cols="30" rows="1">{{ $getUser->alamat_ua }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="tempat_lahir" id="" class="form-control" value="{{ $getUser->tempat_lahir_ua }}" placeholder="Masukan Tempat Lahir" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <input type="date" name="tgl_lahir" id="" class="form-control" value="{{ $getUser->tgl_lahir_ua }}" placeholder="Masukan Tanggal Lahir" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" id="" class="form-file" value="" placeholder="Masukan Foto" aria-describedby="helpId">
                        <br>
                        @if (!empty($getUser->foto_ua))
                        <img src="{{ url('Home') }}/images/foto/{{ $getUser->foto_ua }}" class="img-thumbnail">
                         @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>




                </form>
            </div>
        </div>

    @endsection

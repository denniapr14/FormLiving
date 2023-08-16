@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footerbranch')
{{-- @extends('HomeLayout.footer') --}}
@section('tittle', 'Forms | Lupa Password')
@section('body', 'index')

@section('content')


<div class="container-fluid pb-0 login">
  <div class="row">
    <div class="col-12 col-lg-6 ps-0 d-none d-lg-block">
      <img src="{{ asset('Home') }}/images/img-sign-in.png" class="w-100" alt="Sign In">
    </div>
    <div class="col-12 col-lg-6">
      <div class="login-content">
        <div class="ornament one">
          <img src="{{ asset('Home') }}/images/img-ornament2.png" alt="">
        </div>
        <div class="ornament two">
          <img src="{{ asset('Home') }}/images/img-ornament2.png" alt="">
        </div>
        <div class="logo">
          <img src="{{ asset('Home') }}/images/logo-forms-living1.png" alt="">
        </div>


        <form method="POST" action="{{ route('emailForgot.action') }}">
          @csrf
          <div class="forms">
            <h5>Kirim Email untuk Ganti Password</h5>
            <br>
            <br>
            <div class="mb-3 form-group">
              <label for="email" class="form-label">Email yang ada di Account</label>
              <input type="email" class="form-control @error('email_ua') is-invalid @enderror" name="email_ua"
                id="email_ua" placeholder="Masukkan Email anda untuk dikirim reset link">
            </div>
            @if(Session::has('error_message'))
            <div class="alert alert-danger">
              {{ Session::get('error_message') }}
            </div>
            @endif
            <br>
            <br>
            <button type="submit" class="btn btn-primary w-100 mb-5 mb-lg-3">Kirim Email</button>

            <p class="contact" style="font-size:12px;">Hubungi Admin di <a aria-label="WhatsApp"
                href="https://wa.me/6282125090005?text=Permisi, Saya%20memiliki%20gangguan%20di%20formsliving">
                <img alt="Chat on WhatsApp" style="width:30px;height:30px;"
                  src="{{ asset('Home') }}/images/icons/icon-whatsapp.svg" />
                <a /> jika akun anda bermasalah.
            </p>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
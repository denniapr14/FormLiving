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


                <form method="POST" action="{{ route('forgot.action') }}">
                    @csrf
                    <div class="forms">
                        <input type="hidden" name="id" value="{{ $user->id_user_admin }}">
                        <h5>Change Password</h5>
                        <div class="mb-3 form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Masukkan Password Baru"
                                data-toggle="password">
                        </div>
                        <div class="mb-2 form-group">
                            <label for="password" class="form-label"> Ulangi Password</label>
                            <input type="password" class="form-control " name="password_confirmation" id="password"
                                placeholder="Ulangi Password baru" data-toggle="password">
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary w-100 mb-5 mb-lg-3">Ganti Password</button>

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
</div>
@endsection

@if(Session::has('toastr'))
<script>
    var toastrOptions = @json(Session::get('toastr')['options'] ?? []);
        toastr.error('@json(Session::get('toastr')['message'] ?? '')', '', toastrOptions);
</script>
@endif

@if(Session::has('validationErrors'))
<script>
    var validationErrors = @json(Session::get('validationErrors'));
        var customMessages = @json(Session::get('customMessages'));
        var errorMessages = [];

        Object.keys(validationErrors).forEach(function (field) {
            var customMessage = customMessages[field + '.' + validationErrors[field][0]];
            errorMessages.push(customMessage || validationErrors[field][0]);
        });

        var errorList = errorMessages.join('<br>');
        toastr.error(errorList, '', toastrOptions);
</script>
@endif

<script>
    $(function() {
      $('#password').password()
    })
</script>
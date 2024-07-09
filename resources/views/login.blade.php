@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footerbranch')
{{-- @extends('HomeLayout.footer') --}}
@section('tittle', 'Forms | Login')
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


                    <form method="POST" action="{{ route('login.action') }}">
                        @csrf

                        <div class="forms">
                            <h5>Login</h5>
                            <div class="mb-3 form-group">
                                <label for="email-phone" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="email-phone"
                                    placeholder="Username">
                            </div>
                            <div class="mb-2 form-group">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                     <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password">
                                   <button type="button" class="btn btn-outline-secondary" id="password-toggle">
                                        <i class="bi bi-eye-slash" id="password-icon"></i>
                                    </button>
                                </div>
                                <!--<a href="/reset-password" style="color:blue;">Lupa Password?</a>-->
                            </div>
                            <br>
                            <button href="/profile-setting.html" type="submit" class="btn btn-primary w-100 mb-5 mb-lg-3">SIGN IN</button>
                            {{--  <p class="light-grey-color">or continue with</p>  --}}
                            {{--  <div>
                                <button type="button" class="btn btn-outline-dark w-100 mb-3"><img
                                        src="{{ asset('Home') }}/images/ic-facebook.png" alt="">
                                    Login with Facebook</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-dark w-100 mb-4 mb-lg-3"><img
                                        src="{{ asset('Home') }}/images/ic-google.png" alt="">
                                    Login with Google</button>
                            </div>  --}}
                            <p class="mb-0 light-grey-color">Belum mempunyai Akun?   <a href="/sign-up" style="font-size:20px;color:blue;">Sign Up</a> </p>
                            <div style="padding-top:40%;padding-bottom:0%">
                                 <p class="contact" style="font-size:12px;">Hubungi Admin di <a aria-label="WhatsApp" href="https://wa.me/6282125090005?text=Permisi, Saya%20memiliki%20gangguan%20di%20formsliving"> <img  alt="Chat on WhatsApp" style="width:30px;height:30px;" src="{{ asset('Home') }}/images/icons/icon-whatsapp.svg" />
                                <a/> jika akun anda bermasalah.
                            </p>
                            </div>
                           
                        </div>

                    </form>
                </div>
            </div>
        </div>
        
        <script>
    const passwordInput = document.getElementById('password');
    const passwordToggle = document.getElementById('password-toggle');
    const passwordIcon = document.getElementById('password-icon');

    passwordToggle.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        passwordIcon.classList.toggle('bi-eye');
        passwordIcon.classList.toggle('bi-eye-slash');
    });
</script>
    </div>
    
 

@endsection

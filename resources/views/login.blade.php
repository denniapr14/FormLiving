@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footerbranch')
{{-- @extends('HomeLayout.footer') --}}
@section('tittle', 'Forms | Login')
@section('body', 'index')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                                <label for="email-phone" class="form-label">Email/Phone Number</label>
                                <input type="text" class="form-control" name="username" id="email-phone"
                                    placeholder="Email/Phone Number">
                            </div>
                            <div class="mb-2 form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password">
                            </div>
                            <div class="text-end mb-4">
                                <a href="#" class="recovery">Recovery Password</a>
                            </div>
                            <button href="/profile-setting.html" type="submit" class="btn btn-primary w-100 mb-5 mb-lg-3">Sign
                                In</button>
                            <p class="light-grey-color">or continue with</p>
                            <div>
                                <button type="button" class="btn btn-outline-dark w-100 mb-3"><img
                                        src="{{ asset('Home') }}/images/ic-facebook.png" alt="">
                                    Login with Facebook</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-dark w-100 mb-4 mb-lg-3"><img
                                        src="{{ asset('Home') }}/images/ic-google.png" alt="">
                                    Login with Google</button>
                            </div>
                            <p class="light-grey-color contact">Hubungi admin WA: +62134567890 jika akun anda bermasalah.
                            </p>
                            <p class="mb-0 light-grey-color">Didn't have an account? <a href="/sign-up.html"
                                    class="primary-color">Sign
                                    Up</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

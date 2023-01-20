@extends('HomeLayout.app')
@extends('HomeLayout.navbar')

@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Daftar Sales')
@section('body','')

@section('content')

<div class="container-fluid pb-0 login">
    <div class="row">
        <div class="col-12 col-lg-6 ps-0 d-none d-lg-block">
            <img src="{{ asset('Home') }}/images/img-sign-up.png" class="w-100" alt="Sign In">
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

                <div class="forms">
                    <h5>Create Sales/Agent Account</h5>
                    <div class="mb-3 form-group">
                        <label for="full-name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full-name" id="full-name"
                            placeholder="Full Name">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="role" class="form-label">Choose Role</label>
                        <select class="form-control" name="role" id="role">
                            <option selected disabled>Choose Role</option>
                            <option>-</option>
                            <option>-</option>
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Password">
                    </div>
                    <button type="button" class="btn btn-primary w-100 mb-3">Sign Up</button>
                    <p class="light-grey-color mb-0">Already have an account?
                        <a href="/login" class="primary-color">Sign In</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection

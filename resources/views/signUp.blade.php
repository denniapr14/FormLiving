@extends('HomeLayout.app')
@extends('HomeLayout.navbar')

@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@extends('script')
@extends('flashdata')
@section('tittle','Forms | Daftar Sales')
@section('body','')


@section('content')
<style>
    span{
        color: red;
    }
</style>


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
                    <form method="POST" action="{{ route('sign-up.action') }}">
                        @csrf
                    <h5>Register Account</h5>
                    <h6>NB : Required *</h6>
                    <div class="mb-3 form-group">
                        <label for="full-name" class="form-label">Full Name <span>*</span></label>
                        <input type="text" class="form-control" name="nama" id="full-name" value=""
                            placeholder="Full Name">

                    </div>
                    <div class="mb-3 form-group">
                        <label for="username" class="form-label">Username <span>*</span></label>
                        <input type="text" class="form-control" name="username" placeholder="Username">

                    </div>
                    <div class="mb-3 form-group">
                        <label for="email" class="form-label">Email <span>*</span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">

                    </div>
                    <div class="mb-3 form-group">
                        <label for="phone" class="form-label">Phone Number <span>*</span></label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number">

                    </div>
                    <div class="mb-3 form-group">
                        <label for="phone" class="form-label">Birth of Date <span>*</span></label>
                        <input type="date" class="form-control" name="tanggalLahir" id="" placeholder="">

                    </div>

                    <div class="mb-3 form-group">
                        <label for="kelamin" class="form-label">Gender <span>*</span></label>
                        <select name="kelamin" class="form-select form-control" id="">
                            <option value=""> - Select Gender - </option>
                            <option value="Laki - Laki"> Male </option>
                            <option value="Wanita"> Female </option>
                        </select>

                    </div>
                    <div class="mb-3 form-group">
                        <label for="kelamin" class="form-label">Affiliation <span>*</span></label>
                        <select name="userTipe" class="form-select form-control" id="">
                            <option value=""> - Select Affiliation - </option>
                            <option value="pelanggan">Pelanggan</option>
                            <option value="sales">Sales Inhouse</option>
                            <option value="agentWithCompany"> Agen dengan Company (Xavier)</option>
                            <option value="agentWithoutCompany"> Agen tidak dengan Company </option>
                        </select>

                    </div>


                    <div class="mb-3 form-group">
                        <label for="password" class="form-label">Password <span>*</span></label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Password" onkeypress="validatePassword('password','spanPwd')">
                            <span id="spanPwd"></span>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-3">Sign Up</button>
                    <p class="light-grey-color mb-0">Already have an account?
                        <a href="/login" class="primary-color">Sign In</a>
                    </p>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection

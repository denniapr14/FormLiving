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
                    <h5>Create Sales/Agent Account</h5>
                    <div class="mb-3 form-group">
                        <label for="full-name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="nama" id="full-name" value=""
                            placeholder="Full Name">
                            <span>*Required</span>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        <span>*Required</span>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        <span>*Required</span>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                        <span>*Required</span>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="phone" class="form-label">Born</label>
                        <input type="date" class="form-control" name="tanggalLahir" id="" placeholder="">
                        <span>*Required</span>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="kelamin" class="form-label">Gender</label>
                        <select name="kelamin" class="form-select form-control" id="">
                            <option value=""> - Select Gender - </option>
                            <option value="Laki - Laki"> Male </option>
                            <option value="Wanita"> Female </option>
                        </select>
                        <span>*Required</span>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="kelamin" class="form-label">Gender</label>
                        <select name="tipeUser" class="form-select form-control" id="">
                            <option value=""> - Select Gender - </option>
                            <option value="pelanggan">Pelanggan</option>
                            <option value="sales">Sales Inhouse</option>
                            <option value="agentWithCompany"> Agen dengan Company</option>
                            <option value="agentWithoutCompany"> Agen tidak dengan Company </option>
                        </select>
                        <span>*Required</span>
                    </div>


                    <div class="mb-3 form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Password" onkeypress="validatePassword('password','spanPwd')">
                            <span id="spanPwd">*Required</span>
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

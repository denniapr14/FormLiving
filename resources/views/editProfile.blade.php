@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@section('tittle','Forms | Edit Profile')
@section('body','')

@section('content')
<div class="profile">
    <div class="header-simulation mobile-only">
        <div class="ornament one">
            <img src="{{ asset('Home') }}/images/img-ornament1.png" alt="">
        </div>
        <div class="nav-header">
            <a href="/" class="ic-back">
                <img src="{{ asset('Home') }}/images/ic-back-sim.png" alt="">
            </a>
            <h2 class="title">
                My Profile
            </h2>
            <div></div>
        </div>
    </div>
    <div class="container">
        <div class="second-layout">
            <div class="row">
                <!-- EDIT PROFILE MOBILE STATE -->
                <div class="col-12 col-lg-8 right-column">
                    <div class="edit-profile">
                        <h5>Edit Profile</h5>

                        <div class="edit-image">
                            <div class="image">
                                <img src="{{ asset('Home') }}/images/img-profile-large.png" alt="">
                                <div class="btn-change">
                                    <img src="{{ asset('Home') }}/images/btn_change-foto.png" alt="">
                                </div>
                            </div>

                        </div>

                        <div class="row forms">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="full_name" id="full_name"
                                        placeholder="Bianca Cooper">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="full_name" id="full_name"
                                        placeholder="biancacooper@gmail.com">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" name="full_name" id="full_name"
                                        placeholder="+62 891234567">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label">Choose Role</label>
                                    <select class="form-select" name="" id="">
                                        <option>Sales</option>
                                        <option>Agent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-5">
                                    <label for="full_name" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="full_name" id="full_name"
                                        placeholder="***************">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">

                            </div>
                            <div class="col-12 col-lg-6">
                                <button type="button" class="btn btn-primary w-100">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

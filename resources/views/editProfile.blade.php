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

                        @if (!empty(Session::get('guest')))
                                <form action="{{ route('profileSetting.action') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
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
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" id="username"
                                                    value="{{ $userPelanggan->username_plgn }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Full Name</label>
                                                <input type="text" class="form-control" name="nama" id="nama"
                                                    placeholder="{{ $userPelanggan->nama_plgn }}" value="{{ $userPelanggan->nama_plgn }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="{{ $userPelanggan->email_plgn }}" value="{{ $userPelanggan->email_plgn }}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <div class="mb-3">
                                                <label for="full_name" class="form-label">Phone Number</label>
                                                <input type="tel" class="form-control" name="telp" id="telp"
                                                    placeholder="{{ $userPelanggan->no_telp_plgn }}" value="{{ $userPelanggan->no_telp_plgn }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="mb-3">
                                                <label for="full_name" class="form-label">What Apps</label>
                                                <input type="tel" class="form-control" name="wa" id="wa"
                                                    placeholder="{{ $userPelanggan->no_telp_plgn }}" value="{{ $userPelanggan->no_wa_plgn }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="mb-5">
                                                <label for="full_name" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password" id="password"
                                                    placeholder="***************">
                                                <span id="spanPwd"></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">

                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <button type="sumbit" value="submit" class="btn btn-primary w-100">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('HomeLayout.app')
@extends('HomeLayout.navbar')
@extends('HomeLayout.sidebar')
@extends('HomeLayout.footer')
@extends('script')
@extends('flashdata')
@section('tittle', 'Forms | Pengaturan Profil')
@section('body', '')

@section('content')

    <div class="profile with-nav">
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
                    <!-- PROFILE -->
                    <div class="col-12 col-lg-4 left-column ">
                        <div class="user-profile">
                            <div class="user-image">
                                <img src="{{ asset('Home') }}/images/img-profile-medium.png" alt="">
                            </div>
                            @if (!empty(Session::get('guest')))
                                <div class="user-detail">
                                    <h5>{{ $userPelanggan->nama_plgn }}</h5>
                                    <p>Pelanggan</p>
                                </div>
                            @endif
                            @if (!empty(Session::get('user')))
                                <div class="user-detail">
                                    <h5>{{ $user->nama_ua }}</h5>
                                    <p>{{ $user->kategori }}</p>
                                </div>
                            @endif
                        </div>

                        <div class="profile-nav">
                            <a href="#" class="item">
                                <div class="d-flex">
                                    <div class="icon">
                                        <img src="{{ asset('Home') }}/images/ic-dashboard.png" alt="">
                                    </div>
                                    <p>Dashboard</p>
                                </div>
                                <div class="ic-chevron">
                                    <i class="bi-chevron-right"></i>
                                </div>
                            </a>
                            <a href="/edit-profile" class="item">
                                <div class="d-flex">
                                    <div class="icon">
                                        <img src="{{ asset('Home') }}/images/ic-profile.png" alt="">
                                    </div>
                                    <p>Edit Profile</p>
                                </div>
                                <div class="ic-chevron">
                                    <i class="bi-chevron-right"></i>
                                </div>
                            </a>
                            <a href="/logout" class="item">
                                <div class="d-flex">
                                    <div class="icon">
                                        <img src="{{ asset('Home') }}/images/ic-logout.png" alt="">
                                    </div>
                                    <p>Logout</p>
                                </div>
                                <div class="ic-chevron">
                                    <i class="bi-chevron-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- EDIT PROFILE MOBILE STATE -->
                    <div class="col-12 col-lg-8 right-column d-none d-lg-block">
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

                            @if (!empty(Session::get('user')))
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
                                                value="{{ $user->username_ua }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                placeholder="{{ $user->nama_ua }}" value="{{ $user->nama_ua }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="{{ $user->email_ua }}" value="{{ $user->email_ua }}">
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="full_name" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" name="telp" id="telp"
                                                placeholder="{{ $user->no_tlp_ua }}" value="{{ $user->no_tlp_ua }}">
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

    <div class="navbar-mobile active">
        <a href="/" class="item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M2.5 7.49999L10 1.66666L17.5 7.49999V16.6667C17.5 17.1087 17.3244 17.5326 17.0118 17.8452C16.6993 18.1577 16.2754 18.3333 15.8333 18.3333H4.16667C3.72464 18.3333 3.30072 18.1577 2.98816 17.8452C2.67559 17.5326 2.5 17.1087 2.5 16.6667V7.49999Z"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7.5 18.3333V10H12.5V18.3333" stroke="#B8BABC" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <p>Home</p>
        </a>
        <a href="/search-item" class="item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M17.5 17.5L13.875 13.875" stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p>Cari</p>
        </a>
        <div class="item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17.5 12.5C17.5 12.942 17.3244 13.366 17.0118 13.6785C16.6993 13.9911 16.2754 14.1667 15.8333 14.1667H5.83333L2.5 17.5V4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H15.8333C16.2754 2.5 16.6993 2.67559 17.0118 2.98816C17.3244 3.30072 17.5 3.72464 17.5 4.16667V12.5Z"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p>Chat</p>
        </div>
        <a href="/my-cart" class="item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.50008 18.3333C7.96032 18.3333 8.33341 17.9602 8.33341 17.5C8.33341 17.0398 7.96032 16.6667 7.50008 16.6667C7.03984 16.6667 6.66675 17.0398 6.66675 17.5C6.66675 17.9602 7.03984 18.3333 7.50008 18.3333Z"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M16.6666 18.3333C17.1268 18.3333 17.4999 17.9602 17.4999 17.5C17.4999 17.0398 17.1268 16.6667 16.6666 16.6667C16.2063 16.6667 15.8333 17.0398 15.8333 17.5C15.8333 17.9602 16.2063 18.3333 16.6666 18.3333Z"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M0.833252 0.833344H4.16658L6.39992 11.9917C6.47612 12.3753 6.68484 12.72 6.98954 12.9653C7.29424 13.2105 7.6755 13.3408 8.06658 13.3333H16.1666C16.5577 13.3408 16.9389 13.2105 17.2436 12.9653C17.5483 12.72 17.757 12.3753 17.8333 11.9917L19.1666 5.00001H4.99992"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p>Cart</p>
        </a>
        <a href="/profile-setting" class="item active">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M16.6666 17.5V15.8333C16.6666 14.9493 16.3154 14.1014 15.6903 13.4763C15.0652 12.8512 14.2173 12.5 13.3333 12.5H6.66658C5.78253 12.5 4.93468 12.8512 4.30956 13.4763C3.68444 14.1014 3.33325 14.9493 3.33325 15.8333V17.5"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M10.0001 9.16667C11.841 9.16667 13.3334 7.67428 13.3334 5.83333C13.3334 3.99238 11.841 2.5 10.0001 2.5C8.15913 2.5 6.66675 3.99238 6.66675 5.83333C6.66675 7.67428 8.15913 9.16667 10.0001 9.16667Z"
                    stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <p>Profile</p>
        </a>
    </div>


@endsection

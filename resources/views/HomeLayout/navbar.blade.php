@section('navbar')

    <div class="navbar">
        <div class="container">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('Home') }}/images/logo-forms-living1.png" alt="FORMS Living">
                </a>
            </div>
            <div class="menu">
                <ul>
                    <li class="active">
                        <a href="/">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Perumahan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/housing">
                                    <div>
                                        <img src="{{ asset('Home') }}/images/logo-tidar-green.png" alt="">
                                        <p>Greenland</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div>
                                        <img src="{{ asset('Home') }}/images/logo-project2b.png" alt="">
                                        <p>CALM - COMING SOON</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    {{-- <div>
                                        <img src="{{ asset('Home') }}/images/logo-project3b.png" alt="">
                                        <p>Project C</p>
                                    </div> --}}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    {{-- <div>
                                        <img src="{{ asset('Home') }}/images/logo-project4.png" alt="">
                                        <p>Project D</p>
                                    </div> --}}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    {{-- <div>
                                        <img src="{{ asset('Home') }}/images/logo-project5.png" alt="">
                                        <p>Project E</p>
                                    </div> --}}
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li>
                        Hotel
                    </li>
                    <li>Mall</li> --}}
                    <li>
                        {{-- <a href="/about">About Forms</a> --}}
                        About Forms
                    </li>
                    <li>
                        {{-- <a href="/contect">Contact</a> --}}
                        Contact
                    </li>
                </ul>
            </div>


        @if (!empty(Session::get('guest')))

        <div class="action">

            <a href="/profile-setting" type="button" class="btn btn-outline-secondary">{{ $userPelanggan->nama_plgn }}</a>
                {{-- <a href="/my-cart">
                    <img src="{{ asset('Home') }}/images/ic-cart.png" alt="">
                </a> --}}

        </div>
        @endif
        @if (!empty(Session::get('user')))
        <div class="action">

            <a href="/profile-setting"  type="button"  class="btn btn-outline-secondary">{{ $user->nama_ua }}</a>
                {{-- <a href="/my-cart">
                    <img src="{{ asset('Home') }}/images/ic-cart.png" alt="">
                </a> --}}
        </div>
        @endif
        @if (empty(Session::get('user')) && empty(Session::get('guest')))
        <div class="action">

            <a href="/login" type="button" class="btn btn-outline-secondary">Login/Register</a>
                {{-- <a href="/my-cart">
                    <img src="{{ asset('Home') }}/images/ic-cart.png" alt="">
                </a> --}}
        </div>
        @endif

            {{--  <div class="icon-bell">
                <img src="{{ asset('Home') }}/images/ic-bell.png" alt="">
            </div>  --}}
            <button type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar"
                class="icon-burger btn p-0">
                <img src="{{ asset('Home') }}/images/ic-hamburger.svg" alt="">
            </button>
        </div>
    </div>

@endsection

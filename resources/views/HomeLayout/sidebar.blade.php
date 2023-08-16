@section('sidebar')

<div class="offcanvas offcanvas-end sidebar" tabindex="-1" id="sidebar" aria-labelledby="sidebar">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="menu">
            <ul>
                <li class="active">
                    <a href="/">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Perumahan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="/Housing/Greenland">
                                <div>
                                    <img style="width: 50%" src="{{ asset('Home') }}/images/logo-tidar-green.png"
                                        alt="">

                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/Housing/Kalm">
                                <div>
                                    <img style="width: 50%" src="{{ asset('Home') }}/images/logo-kalm.png" alt="">

                                </div>
                            </a>
                        </li>

                        <!--<li>-->
                        <!--    <a class="dropdown-item" href="#">-->
                        <!--        <div>-->
                        <!--            <img src="{{ asset('Home') }}/images/logo-project2b.png" alt="">-->
                        <!--            <p>Project B</p>-->
                        <!--        </div>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--    <a class="dropdown-item" href="#">-->
                        <!--        <div>-->
                        <!--            <img src="{{ asset('Home') }}/images/logo-project3b.png" alt="">-->
                        <!--            <p>Project C</p>-->
                        <!--        </div>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--    <a class="dropdown-item" href="#">-->
                        <!--        <div>-->
                        <!--            <img src="{{ asset('Home') }}/images/logo-project4.png" alt="">-->
                        <!--            <p>Project D</p>-->
                        <!--        </div>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--    <a class="dropdown-item" href="#">-->
                        <!--        <div>-->
                        <!--            <img src="{{ asset('Home') }}/images/logo-project5.png" alt="">-->
                        <!--            <p>Project E</p>-->
                        <!--        </div>-->
                        <!--    </a>-->
                        <!--</li>-->
                    </ul>
                </li>
                <!--<li>-->
                <!--    Hotel-->
                <!--</li>-->
                <!--<li>Mall</li>-->
                <li>
                    <a href="">About Forms</a>
                </li>
                <!--<li>-->
                <!--    <a href="#">Contact</a>-->
                <!--</li>-->
            </ul>
        </div>
        @if (!empty(Session::get('guest')))

        <div class="action">

            <a href="/profile-setting" type="button" class="btn btn-outline-secondary">{{ $userPelanggan->nama_plgn
                }}</a>
            <!--<a href="/my-cart">-->
            <!--    <img src="{{ asset('Home') }}/images/ic-cart.png" alt="">-->
            <!--</a>-->

        </div>
        @elseif (!empty(Session::get('user')))
        <div class="action">

            <a href="/dashboard-admin/Greenland" class="btn btn-outline-secondary">{{ $user->nama_ua }}</a>
            {{-- <a href="/my-cart">
                <img src="{{ asset('Home') }}/images/ic-cart.png" alt="">
            </a> --}}
        </div>
        @else
        <div class="action">

            <a href="/login" type="button" class="btn btn-outline-secondary">Login/Register</a>
            <!--<a href="/my-cart">-->
            <!--    <img src="{{ asset('Home') }}/images/ic-cart.png" alt="">-->
            <!--</a>-->
        </div>
        @endif

    </div>
</div>

@endsection
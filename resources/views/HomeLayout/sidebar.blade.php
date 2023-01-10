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
                                    <p>Project B</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <div>
                                    <img src="{{ asset('Home') }}/images/logo-project3b.png" alt="">
                                    <p>Project C</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <div>
                                    <img src="{{ asset('Home') }}/images/logo-project4.png" alt="">
                                    <p>Project D</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <div>
                                    <img src="{{ asset('Home') }}/images/logo-project5.png" alt="">
                                    <p>Project E</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    Hotel
                </li>
                <li>Mall</li>
                <li>
                    <a href="">About Forms</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <div class="action">
            <a href="/login" type="button" class="btn btn-outline-secondary">Login/Register</button>
                <a href="/my-cart">
                    <img src="{{ asset('Home') }}/images/ic-cart.png" alt="">
                </a>
        </div>
    </div>
</div>

@endsection

@section('sidebar')

<!-- start: sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar__header">
        <a class="sidebar__brand" href="/">
            <img src="{{url('Dashboard')}}/images/logo/forms-logo.png" alt="FORMS">
            <span>FORMS</span>
        </a>
    </div>
    <div class="sidebar__nav">
        <ul class="nav__links">
            <li class="nav__divider">
                <div class="divider__title">Projek </div>
                <hr class="separate">
            </li>
            @foreach ($projekUser as $projekUser)
            @if ($projekUser->nama_projek == "Greenland")
            <li class="nav__item dropdown">
                <a class="nav__link" href="#">
                   Greenland
                </a>
                <ul class=" dropdown__menu">
                    <li class="nav__item">
                        <a class="nav__link" href="/CEO/dashboard">
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <span class="" >SPR</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="/CEO/promo">
                            <i class="fas fa-award    "></i>
                            <span class="" >Promo</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a class="nav__link" href="#">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="" href="/Promo">User</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="#">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <span class="" href="/Promo">Komisi</span>
                        </a>
                    </li>

                </ul>
            </li>
            @endif
            @if ($projekUser->nama_projek == "Kalm")

            <li class="nav__item dropdown">
                <a class="nav__link" href="#">
                   Kalm
                </a>
                <ul class=" dropdown__menu">
                    <li class="nav__item">
                        <a class="nav__link" href="#">
                            <i class="fas fa-award    "></i>
                            <span class="" href="/Promo">Promo</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="#">
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <span class="" href="/Promo">SPR</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="#">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="" href="/Promo">User</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="#">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <span class="" href="/Promo">Komisi</span>
                        </a>
                    </li>

                </ul>
            </li>
            @endif


            @endforeach

        </ul>
    </div>
</aside>
<!-- end: sidebar -->

@endsection

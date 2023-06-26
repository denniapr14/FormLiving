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
                <div class="divider__title">Home </div>
                <hr class="separate">
            </li>

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


                </ul>
            </li>

            <li class="nav__item dropdown">
                <a class="nav__link" href="#">
                   Kalm
                </a>
                <ul class=" dropdown__menu">
                    <li class="nav__item">
                        <a class="nav__link" href="#">
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <span class="" href="/Promo">SPR</span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav__divider">
                <div class="divider__title">Properties</div>
                <hr class="separate">
            </li>
            <li class="nav__item">
                <a class="nav__link" href="/projects.html">
                    <i class="bi bi-house"></i>
                    <span>Projects</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- end: sidebar -->

@endsection

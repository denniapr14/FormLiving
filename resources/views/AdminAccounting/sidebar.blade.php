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
            @foreach ($projekUser as $projekUser)
            @if ($projekUser->nama_projek == "Greenland")
            <li class="nav__item dropdown">
                <a class="nav__link" href="#">
                   Greenland
                </a>
                <ul class=" dropdown__menu">
                    <li class="nav__item">
                        <a class="nav__link" href="/dashboard-admin-accounting">
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <span class="" >SPR</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a class="nav__link" href="/komisi">
                            <i class="bi bi-cash-coin"></i>
                            <span >Komisi</span>
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
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <span class="" href="/dashboard-admin-accounting">SPR</span>
                        </a>
                    </li>



                </ul>
            </li>
            @endif


            @endforeach

    </div>
</aside>
<!-- end: sidebar -->

@endsection

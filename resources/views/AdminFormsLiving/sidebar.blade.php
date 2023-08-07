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
                <div class="divider__title">Project </div>
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
                        <a class="nav__link" href="/AdminFormsLiving/dashboard">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span class="" >Dashboard</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="/AdminFormsLiving/list-user">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <span class="" >List User</span>
                        </a>
                    </li>

                </ul>
            </li>
            @endif
            {{-- @if ($projekUser->nama_projek == "Kalm")

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
                </ul>
            </li>
            @endif --}}
            
            @endforeach
            <li class="nav__divider">
                <div class="divider__title">Tools </div>
                <hr class="separate">
            </li>
            <li class="nav__item">
                <a class="nav__link" href="/logout">
                  <i class="bi bi-power"></i>
                  <span>Log Out</span>
                </a>
              </li>
        </ul>
    </div>
</aside>
<!-- end: sidebar -->

@endsection

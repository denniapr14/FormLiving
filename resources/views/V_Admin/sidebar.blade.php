@section('sidebar')
    <!-- start: sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar__header">
            <a class="sidebar__brand navbar__sidebar-toggler" href="/">
                <img src="{{ url('Dashboard') }}/images/logo/forms-logo.png" alt="FORMS">
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
                    <li class="nav__item dropdown ">
                        <a class="nav__link" href="#" alt=" {{ $projekUser->nama_projek }}">
                            <i class="bi bi-briefcase"></i>
                            <span>
                                {{ $projekUser->nama_projek }}
                            </span>
                        </a>
                        <ul class="dropdown__menu">

                                @foreach ($getUserMenu as $userMenu)
                                @if($userMenu->status_menu == "menu" && $userMenu->status_um =="aktif")


                                    <li class="nav__item">
                                        <a class="nav__link  @if (request()->segment(1) === $userMenu->url_menu && request()->segment(2) == $projekUser->nama_projek) active @endif "
                                            href="{{ route($userMenu->nama_menu, $projekUser->nama_projek) }}">
                                            <i class="{{ $userMenu->icon_menu }}"></i>
                                            <span class="">{{ $userMenu->menu }}</span>
                                        </a>
                                    </li>
                                @endif
                                @endforeach
                        </ul>
                    </li>
                @endforeach
                <li class="nav__divider">
                    <div class="divider__title">Optional</div>
                    <hr class="separate">
                </li>

                @foreach ($getUserMenu as $userMenu)
                @if($userMenu->status_menu == "optional" && $userMenu->status_um =="aktif")


                    <li class="nav__item">
                        <a class="nav__link  @if (request()->segment(1) === $userMenu->url_menu ) active @endif "
                            href="{{ route($userMenu->nama_menu) }}">
                            <i class="{{ $userMenu->icon_menu }}"></i>
                            <span class="">{{ $userMenu->menu }}</span>
                        </a>
                    </li>
                @endif
                @endforeach


                <li class="nav__divider">
                    <div class="divider__title">Pengaturan</div>
                    <hr class="separate">
                </li>


                <li class="nav__item">
                    <a class="nav__link" href="/">
                        <i class="bi bi-house"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a class="nav__link @if (request()->segment(1) === 'ubah-user-profile') active @endif"
                        href="{{ route('updateUserProfile.admin', Crypt::encrypt($user->id_user_admin)) }}">

                        <i class="bi bi-person-circle"></i>
                        <span>Edit Profile</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a class="nav__link @if (request()->segment(1) === 'ubah-password-profile') active @endif"
                        href="{{ route('updatePasswordProfile.admin', Crypt::encrypt($user->id_user_admin)) }}">

                        <i class="bi bi-key"></i>
                        <span>Edit Password</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a class="nav__link" href=" {{ route('payment.admin') }} ">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Coba Doku</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a class="nav__link" href="/logout">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Log out</span>
                    </a>
                </li>

            </ul>


        </div>
    </aside>
    <!-- end: sidebar -->
@endsection

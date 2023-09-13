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
                    @if ($projekUser->nama_projek == 'Greenland')
                        <li class="nav__item dropdown ">
                            <a class="nav__link" href="#" alt=" {{ $projekUser->nama_projek }}">
                                <i class="bi bi-briefcase"></i>
                                <span>
                                    {{ $projekUser->nama_projek }}
                                </span>
                            </a>
                            <ul class="dropdown__menu">

                                <li class="nav__item">
                                    <a class="nav__link
                    @if (request()->segment(1) == 'dashboard-admin' && request()->segment(2) == $projekUser->nama_projek) active @endif
                    "
                                        href="/dashboard-admin/{{ $projekUser->nama_projek }}">
                                        <i class="bi bi-speedometer2"></i>
                                        <span class="">Dashboard</span>
                                    </a>
                                </li>



                                @if (
                                    $user->kategori == 'SuperAdmin' ||
                                 $user->kategori == 'AdminAccounting' ||
                                  {{--  $user->kategori == 'AdminFormsLiving' ||  --}}
                                   $user->kategori == 'Direktur' ||
                                    $user->kategori == 'CEO' ||
                                     $user->kategori == 'AdminADV'
                                     )
                                    <li class="nav__item">
                                        <a class="nav__link
                    @if (request()->segment(1) === 'rumah-admin' && request()->segment(2) == $projekUser->nama_projek) active @endif
                     "
                                            href="/rumah-admin/{{ $projekUser->nama_projek }}">
                                            <i class="bi bi-house-door"></i>
                                            <span class="">Rumah</span>
                                        </a>
                                    </li>
                                @endif

                                @if (
                                    $user->kategori == 'SuperAdmin' ||
                                 $user->kategori == 'AdminAccounting' ||
                                  $user->kategori == 'CEO'
                                  )
                                    <li class="nav__item">
                                        <a class="nav__link
               @if (request()->segment(1) === 'promo-admin' && request()->segment(2) == $projekUser->nama_projek) active @endif
                 "
                                            href="/promo-admin/{{ $projekUser->nama_projek }}">
                                            <i class="bi bi-bookmark"></i>
                                            <span class="">Promo</span>
                                        </a>
                                    </li>
                                @endif


                                <li class="nav__item">
                                    <a class="nav__link
                    @if (request()->segment(1) === 'surat-pemesanan-rumah-admin' && request()->segment(2) == $projekUser->nama_projek) active @endif
                    "
                                        href="/surat-pemesanan-rumah-admin/{{ $projekUser->nama_projek }}">
                                        <i class="bi bi-file"></i>
                                        <span class="">Pemesanan</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @endif
                    @if ($projekUser->nama_projek == 'Kalm')
                        <li class="nav__item dropdown">

                            <a class="nav__link" href="#" alt=" {{ $projekUser->nama_projek }}">
                                <i class="bi bi-briefcase"></i>
                                <span>
                                    {{ $projekUser->nama_projek }}
                                </span>
                            </a>
                            <ul class="dropdown__menu">

                                <li class="nav__item">
                                    <a class="nav__link
                    @if (request()->segment(1) === 'dashboard-admin' && request()->segment(2) == $projekUser->nama_projek) active @endif
                    "
                                        href="/dashboard-admin/{{ $projekUser->nama_projek }}">
                                        <i class="bi bi-speedometer2"></i>
                                        <span class="">Dashboard</span>
                                    </a>
                                </li>


                                @if ($user->kategori == 'SuperAdmin' || $user->kategori == 'AdminAccounting' || $user->kategori == 'AdminFormsLiving')
                                    <li class="nav__item">
                                        <a class="nav__link
                    @if (request()->segment(1) === 'rumah-admin' && request()->segment(2) == $projekUser->nama_projek) active @endif
                    "
                                            href="/rumah-admin/{{ $projekUser->nama_projek }}">
                                            <i class="bi bi-house-door"></i>
                                            <span class="">Rumah</span>
                                        </a>
                                    </li>
                                @endif


                                <li class="nav__item">
                                    <a class="nav__link
                    @if (request()->segment(1) === 'surat-pemesanan-rumah-admin' && request()->segment(2) == $projekUser->nama_projek) active @endif
                    "
                                        href="/surat-pemesanan-rumah-admin/{{ $projekUser->nama_projek }}">
                                        <i class="bi bi-file"></i>
                                        <span class="">Pemesanan</span>
                                    </a>
                                </li>


                                <li class="nav__item">
                                    <a class="nav__link
                    @if (request()->segment(1) === 'pre-order-admin' && request()->segment(2) == $projekUser->nama_projek) active @endif
                    "
                                        href="{{ route('preOrder.admin', $projekUser->nama_projek) }}">
                                        <i class="bi bi-clipboard2"></i>
                                        <span class="">Pre Order</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @endif
                @endforeach

                {{-- @foreach ($projekUser as $projekUser)
                    <li class="nav__item dropdown ">
                        <a class="nav__link" href="#" alt=" {{ $projekUser->nama_projek }}">
                            <i class="bi bi-briefcase"></i>
                            <span>
                                {{ $projekUser->nama_projek }}
                            </span>
                        </a>
                        <ul class="dropdown__menu">

                                @foreach ($getUserMenu as $userMenu)
                                @if($userMenu->status_menu == "fitur" && $userMenu->status_um =="aktif")


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
                @endforeach --}}
                <li class="nav__divider">
                    <div class="divider__title">Optional</div>
                    <hr class="separate">
                </li>
                @if (
                    $user->kategori == 'SuperAdmin' ||
                    $user->kategori == 'AdminFormsLiving' ||
                    $user->kategori == 'AdminSales' ||
                    $user->kategori == 'AdminAgentCompany'

                  )

                    <li class="nav__item  ">
                        <a class="nav__link @if (request()->segment(1) === 'user-sales-agent-admin') active @endif" href="/user-sales-agent-admin">
                            <i class="bi bi-people"></i>
                            <span>User
                                @if ($user->kategori == 'SuperAdmin')

                                @else
                                Sales / Agent
                                @endif
                            </span>
                        </a>
                    </li>



                @endif

                @if ($user->kategori == 'SuperAdmin')
                <li class="nav__item  ">
                    <a class="nav__link @if (request()->segment(1) === 'user-kategori-admin') active @endif" href="{{ route('userKategori.admin') }}">
                        <i class="bi bi-person-rolodex"></i>
                        <span>Kategori User </span>
                    </a>
                </li>
                @endif



                <li class="nav__item  ">
                    <a class="nav__link @if (request()->segment(1) === 'user-pelanggan-admin') active @endif" href="{{ route('userPelanggan.admin') }}">
                        <i class="bi bi-person-hearts"></i>
                        <span>User Pelanggan</span>
                    </a>
                </li>


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

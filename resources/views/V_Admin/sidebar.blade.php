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
                                            <i class="fa fa-home" aria-hidden="true"></i>
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
                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
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
                                            <i class="fa fa-home" aria-hidden="true"></i>
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
                            <i class="fas fa-users    "></i>
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
                        <i class="fa fa-user-secret" aria-hidden="true"></i>
                        <span>User Kategori</span>
                    </a>
                </li>
                @endif



                <li class="nav__item  ">
                    <a class="nav__link @if (request()->segment(1) === 'user-pelanggan-admin') active @endif" href="{{ route('userPelanggan.admin') }}">
                        <i class="fas fa-users    "></i>
                        <span>User Pelanggan</span>
                    </a>
                </li>


                <li class="nav__divider">
                    <div class="divider__title">Pengaturan</div>
                    <hr class="separate">
                </li>


                <li class="nav__item">
                    <a class="nav__link" href="/">
                        <i class="bi bi-box-arrow-up"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a class="nav__link @if (request()->segment(1) === 'ubah-user-profile') active @endif"
                        href="{{ route('updateUserProfile.admin', Crypt::encrypt($user->id_user_admin)) }}">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-gear" viewBox="0 0 16 16">
                            <path
                                d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                        </svg>
                        <span>Edit Profile</span>
                    </a>
                </li>
                <li class="nav__item">
                    <a class="nav__link @if (request()->segment(1) === 'ubah-password-profile') active @endif"
                        href="{{ route('updatePasswordProfile.admin', Crypt::encrypt($user->id_user_admin)) }}">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lock" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 5.996V14H3s-1 0-1-1 1-4 6-4c.564 0 1.077.038 1.544.107a4.524 4.524 0 0 0-.803.918A10.46 10.46 0 0 0 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h5ZM9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                          </svg>
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

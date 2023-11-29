<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('tittle')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('Bootstrap') }}/img/favicon.png" rel="icon">
    <link href="{{ url('Bootstrap') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">



    <link href="{{ url('Bootstrap') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('Bootstrap') }}/css/style.css" rel="stylesheet">
    <script src="{{ url('Dashboard') }}/js/jquery.min.js"></script>
    <script src="{{ url('Dashboard') }}/js/svg-pan-zoom.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ url('Dashboard') }}/css/toastify.min.css">
    {{-- Datatabless --}}

    <link rel="stylesheet" href="{{ url('Dashboard') }}/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <style>
        .mydropdown{
            float: right;
            padding-right: 10%;
        }
        @media(max-width:500px){
            .mydropdown{
                float: left;
                padding-left: 10%;
            }
        }

        .mycard{

            border: none;
            border-radius: 5px;
            box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
        }
        *{
            color: #8ccca4;
        }
        .main{
            background-color: #edf6ef;
        }
        body{
            background-color: #edf6ef;
        }
        .logo span{
            color: #8ccca4;
        }
        .header .toggle-sidebar-btn{
            color: #8ccca4;
        }
        i {
            color: #8ccca4;
        }
        .card-title{
            color: #8ccca4;
        }
        .card-title span{
            color: #8ccca4;
        }
        .sidebar-nav .nav-link.collapsed i{
            color: #8ccca4;
        }
        .sidebar-nav .nav-link i{
            color: #8ccca4;
        }
        .sidebar-nav .nav-heading{
            color: #8ccca4;
        }
        .sidebar-nav .nav-link:hover {
            color: #8ccca4;
        }

        .btn-outline-gl{
            --bs-btn-color: #8ccca4;
            --bs-btn-border-color: #8ccca4;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #8ccca4;
            --bs-btn-hover-border-color: #8ccca4;
            --bs-btn-focus-shadow-rgb: 13,110,253;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #8ccca4;
            --bs-btn-active-border-color: #8ccca4;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #8ccca4;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: #8ccca4;
            --bs-gradient: none;
        }
        .btn-outline-gl i{

            --bs-btn-hover-color: #fff;

        }



        table.dataTable tbody th, table.dataTable tbody td {
            color:#8ccca4;
        }
        table.dataTable thead th, table.dataTable tbody td{
            color:#8ccca4;
        }


        .accordion-item:first-of-type .accordion-button{
            color: #8ccca4;
            background-color: #f8fbf9;
        }

    </style>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard.admin', Session::get('selectedProjeks')[0]) }}" class="logo d-flex align-items-center">
                <img src="{{ url('Dashboard') }}/images/logo/forms-logo.png" alt="">
                <span class="d-none d-lg-block">Form One</span>
              </a>
            <i class="bi bi-list toggle-sidebar-btn p-3"></i>
        </div><!-- End Logo -->



        <nav class="navbar mydropdown">
            <div class="d-flex justify-content-center align-items-center">

                <div class="dropdown">
                    <a class="btn btn-outline-gl dropdown-toggle" href="#" role="button"
                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Session::get('selectedProjeks')[0] }}
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($projekUser as $projek)
                            <li><a class="dropdown-item"
                                    href="{{ url('/set-selected-projek', $projek->nama_projek) }}">{{ $projek->nama_projek }}</a>
                            </li>
                            @php
                                $setProjek;
                            @endphp
                        @endforeach
                    </ul>


                </div>


            </div>


        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-heading">
                <img src="{{ url('Home') }}/images/forms_living.png" style="width: 50%" alt="">
            </li>
            <li class="nav-heading">
                @if ($user->nama_ua != "")
                {{ $user->nama_ua }}
                @else
                {{ $user->username_ua }}
                @endif
                - {{ $user->nama_ktgr }}
                </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="true">
                    <i class="bi bi-person-circle"></i><span> Profile </span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav" style="">
                  <li>
                    <a href="/">
                        <i class="bi bi-house"></i>
                        <span>Home</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('updateUserProfile.admin', Crypt::encrypt($user->id_user_admin)) }}">
                        <i class="bi bi-person-circle"></i>
                        <span>Edit Profile</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('updatePasswordProfile.admin', Crypt::encrypt($user->id_user_admin)) }}">
                        <i class="bi bi-key"></i>
                        <span>Edit Password</span>
                    </a>
                  </li>
                  <li>
                    <a href="/logout">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Log out</span>
                    </a>
                  </li>

                </ul>
              </li>
            <li class="nav-heading">Projek</li>

            @foreach ($getUserMenu as $userMenu)
                @if ($userMenu->status_menu == 'menu')
                    <li class="nav-item ">
                        <a class="nav-link @if (request()->segment(1) != $userMenu->url_menu) collapsed @endif navMenu"
                            href=" {{ route($userMenu->nama_menu, Session::get('selectedProjeks')[0]) }} ">
                            <i class="{{ $userMenu->icon_menu }}"></i>
                            <span>{{ $userMenu->menu }}</span>
                        </a>
                    </li><!-- End Dashboard Nav -->
                @endif
            @endforeach

            <li class="nav-heading">User</li>
            @foreach ($getUserMenu as $userMenu)
                @if ($userMenu->status_menu == 'optional')
                    <li class="nav-item ">
                        <a class="nav-link @if (request()->segment(1) != $userMenu->url_menu) collapsed @endif navMenu"
                            href=" {{ route($userMenu->nama_menu) }} ">
                            <i class="{{ $userMenu->icon_menu }}"></i>
                            <span>{{ $userMenu->menu }}</span>
                        </a>
                    </li><!-- End Dashboard Nav -->
                @endif
            @endforeach



            <li class="nav-heading">Pusat Bantuan</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-person"></i>
                    <span>Formsliving Care Center</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-boxes"></i>
                    <span>FaQ</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-people"></i>
                    <span>About</span>
                </a>
            </li>


        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        @yield('content')


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">

        </div>
        <div class="credits">

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <!-- Vendor JS Files -->

    <script src="{{ url('Bootstrap') }}/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/chart.js/chart.umd.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/echarts/echarts.min.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/quill/quill.min.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('Bootstrap') }}/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{ url('Dashboard') }}/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{{ url('Dashboard') }}/js//toastify.js"></script>


</body>


</html>

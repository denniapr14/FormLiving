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

    <!-- Vendor CSS Files -->
    <link href="{{ url('Bootstrap') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    {{--  <link href="{{ url('Bootstrap') }}/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/vendor/simple-datatables/style.css" rel="stylesheet">  --}}

    <!-- Template Main CSS File -->
    <link href="{{ url('Bootstrap') }}/css/style.css" rel="stylesheet">


    {{--  JQUERY  --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="{{ url('Dashboard') }}/js/jquery.min.js"></script>

    {{--  TOASTY  --}}
    <link rel="stylesheet" type="text/css" href="{{ url('Dashboard') }}/css/toastify.min.css">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ url('Bootstrap') }}/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="dropdown">
            <a class="btn btn-outline-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-bs-toggle="dropdown" aria-expanded="false">
                Perumahan
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach ($projekUser as $projek)
                    <li><a class="dropdown-item" href="#"
                            onclick="setProjek('{{ $projek->nama_projek }}')">{{ $projek->nama_projek }}</a></li>
                @php
                    $setProjek;
                @endphp
                @endforeach
            </ul>


        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ url('Bootstrap') }}/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-heading">Projek</li>


            @foreach ($getUserMenu as $userMenu)
                @if ($userMenu->status_menu == 'menu')
                    <li class="nav-item ">
                        <a class="nav-link @if (request()->segment(1) != $userMenu->url_menu) collapsed @endif navMenu"
                            href="{{ url($userMenu->url_menu) }}">
                            <i class="{{ $userMenu->icon_menu }}"></i>
                            <span>{{ $userMenu->menu }}</span>
                        </a>
                    </li><!-- End Dashboard Nav -->
                @endif
            @endforeach

            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.html">
                    <i class="bi bi-house-door-fill"></i>
                    <span>House</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.html">
                    <i class="bi bi-percent"></i>
                    <span>Promo</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.html">
                    <i class="bi bi-cart3"></i>
                    <span>Order</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-flag"></i>
                    <span>Pre Order</span>
                </a>
            </li>
            <li class="nav-heading">User</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-person"></i>
                    <span>User List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-boxes"></i>
                    <span>Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-people"></i>
                    <span>Buyer</span>
                </a>
            </li>

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
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <!-- Vendor JS Files -->
    <script src="{{ url('Bootstrap') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    {{--  <script src="{{ url('Bootstrap') }}/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/chart.js/chart.umd.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/echarts/echarts.min.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/quill/quill.min.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ url('Bootstrap') }}/vendor/php-email-form/validate.js"></script>  --}}

    <!-- Template Main JS File -->
    <script src="{{ url('Bootstrap') }}/js/main.js"></script>

    {{--  JQUERY JS  --}}

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    {{--  SVGPANZOOM  --}}
    <script src="{{ url('Dashboard') }}/js/svg-pan-zoom.js"></script>

    {{--  DATATABLES  --}}
    <script type="text/javascript" src="{{ url('Dashboard') }}/js/jquery.dataTables.js"></script>
    {{--  TOASTY  --}}
    <script type="text/javascript" src="{{ url('Dashboard') }}/js/toastify.js"></script>

    {{--  BOOTSTRAP  --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        function setProjek(projek) {
            // Use AJAX to send the selected project to the server
            // You can use libraries like jQuery or the native Fetch API for this

            // For example, using jQuery:
            $.ajax({
                type: "POST",
                url: "/set-selected-projek", // Update with the actual endpoint
                data: { selectedProjek: projek },
                success: function(response) {
                    // Handle the response from the server if needed
                }
            });
        }
    </script>
</body>

</html>

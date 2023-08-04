<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tittle')</title>
    <meta name="keywords" content="FORMS Dashboard" />
    <meta name="description" content="FORMS Dashboard - Responsive HTML5 Template">
    <meta name="author" content="FORMS">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=1920, shrink-to-fit=no">


    <!-- Favicons -->
    <link rel="icon" href="favicon.ico">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{url('Dashboard')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"
        integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg=="
        crossorigin="anonymous" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{url('Dashboard')}}/css/style.css" type="text/css">

    <script src="{{url('Dashboard')}}/js/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{url('Dashboard')}}/css/toastify.min.css">
    {{-- Datatabless --}}

    <link rel="stylesheet" href="{{url('Dashboard')}}/css/jquery.dataTables.css" />

</head>

<body>

    @yield('sidebar')
    <section class="main-content" id="main-content">
        <div class="navbar-content">
            <a href="#" class="navbar__sidebar-toggler">
                <i class="bi bi-chevron-double-left"></i>
            </a>
            <div class="navbar__right">
                <div class="navbar__items">
                    <a href="" class="navbar__link">
                        <i class="bi bi-search"></i>
                    </a>
                    <a href="" class="navbar__link">
                        <i class="bi bi-check2-square"></i>
                    </a>
                    <a href="" class="navbar__link">
                        <i class="bi bi-translate"></i>
                    </a>
                    <a href="" class="navbar__link">
                        <i class="bi bi-bell"></i>
                        <div class="badge">12</div>
                    </a>
                </div>
                <div class="divider"></div>
                <div class="profile__box">
                    <div class="profile__info">
                        <div class="profile__name">{{ $user->nama_ua }}</div>
                        <div class="profile__role">{{ $user->nama_ktgr }}</div>
                    </div>
                    <div class="profile__avatar">
                        <img src="{{ url('Dashboard') }}/images/content/avatar.png" alt="user-avatar">
                    </div>
                </div>
            </div>
        </div>
        @yield('flashdata')
        @yield('content')
    </section>
    @yield('footer')
    @yield('script')

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript" src="{{url('Dashboard')}}/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{url('Dashboard')}}/js//toastify.js"></script>

</html>

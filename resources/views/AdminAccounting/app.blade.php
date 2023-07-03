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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{url('Dashboard')}}/css/style.css" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  {{--  Datatabless  --}}

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

</head>
<body>

    @yield('sidebar')
    @yield('flashdata')
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
                <a class="" href="/">
                <div class="profile__box">

                    <div class="profile__info">
                        <div class="profile__name">{{ $user->nama_ua }}</div>
                        <div class="profile__role">{{ $user->nama_ktgr }}</div>
                    </div>
                    <div class="profile__avatar">
                        <img src="{{ url('Dashboard') }}/images/content/avatar.png" alt="user-avatar">
                    </div>
                </div>
            </a>
            </div>
        </div>
    @yield('content')
    </section>
    @yield('footer')
    @yield('script')

</body>

<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
</html>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z0YJJK1HQ7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z0YJJK1HQ7');
</script>

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
      <link rel="icon" type="image/png" sizes="16x16" href="{{ url('Home') }}/images/logo-website/fl-favicon.png">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{url('Dashboard')}}/css/style.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>

    @yield('sidebar')

    @yield('content')

    @yield('footer')
    @yield('script')

</body>
</html>

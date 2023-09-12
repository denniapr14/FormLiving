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
    <script src="{{url('Dashboard')}}/js/svg-pan-zoom.js"></script>

    <link rel="stylesheet" type="text/css" href="{{url('Dashboard')}}/css/toastify.min.css">
    {{-- Datatabless --}}

    <link rel="stylesheet" href="{{url('Dashboard')}}/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        .myicon-color{
            color: #8ACCA1;
        }

    </style>
</head>

<body>

    @yield('sidebar')
    <section class="main-content" id="main-content">

        @yield('board')
        @yield('flashdata')

        @yield('content')
    </section>
    @yield('footer')
    @yield('script')

</body>
<script>
    var uriSegment2 = '{{ request()->segment(2) }}';


    // Loop through each project link and compare with the URI segment
    document.querySelectorAll('.nav__link').forEach(function(link) {
        let projekName = link.textContent.trim();
        if (uriSegment2 === projekName) {
            link.classList.add('active');
            link.nextElementSibling.classList.add('show');
            link.nextElementSibling.classList.add('active');
        }
    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{url('Dashboard')}}/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{url('Dashboard')}}/js//toastify.js"></script>


</html>

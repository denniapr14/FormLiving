<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('Home') }}/images/logo-website/fl-favicon.png">
    <title>Forms One</title>
    <!-- Custom CSS -->
    <link href="{{ url('Bootstrap') }}/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="{{ url('Bootstrap') }}/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ url('Bootstrap') }}/dist/css/style.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->

    <link href="{{ url('Bootstrap') }}/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('Bootstrap') }}/css/style.css" rel="stylesheet">
    <script src="{{ url('Dashboard') }}/js/jquery.min.js"></script>
    <script src="{{ url('Dashboard') }}/js/svg-pan-zoom.js"></script>


    <link rel="stylesheet" type="text/css" href="{{ url('Dashboard') }}/css/toastify.min.css">
    {{-- Datatabless --}}


    <link rel="stylesheet" href="{{ url('Dashboard') }}/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .paginate_button{
            border: 2px solid gray;
            color: gray;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        .current{
            border: 2px solid gray;
            background-color: gray;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="index.html" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="{{ url('Home') }}/images/logo-website/fo-favicon.png" alt="homepage"
                                    class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{ url('Home') }}/images/logo-website/fo-favicon.png" alt="homepage"
                                    class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                Forms One

                                {{--  <!-- dark Logo text -->
                                <img src="{{ url('Bootstrap') }}/assets/images/logo-text.png" alt="homepage"
                                    class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="{{ url('Bootstrap') }}/assets/images/logo-light-text.png" class="light-logo"
                                    alt="homepage" />  --}}
                            </span>
                        </a>
                        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)"
                            data-sidebartype="mini-sidebar">
                            <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right mr-auto">

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Projek

                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown"
                                aria-labelledby="2">
                                <span class="with-arrow">
                                    <span class="bg-danger"></span>
                                </span>
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title text-white bg-danger">
                                            <span class="font-light">Projek</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center message-body">
                                            <!-- Message -->

                                            <!-- Message -->
                                            @foreach ($getPelangganProjek as $projek)
                                            <a href="{{ url('/set-selected-projek', $projek->nama_projek) }}" class="message-item">
                                                <span class="user-img">
                                                    <img src="{{ url('Home') }}/images/logo-website/fo-favicon.png"
                                                        alt="user" class="rounded-circle">

                                                </span>
                                                <div class="mail-contnet">
                                                    <h5 class="message-title">{{ $projek->nama_projek }}</h5>

                                                </div>
                                            </a>

                                            @php
                                                $setProjek;
                                            @endphp
                                            @endforeach
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown border-right">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="javascript:void(0)"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="notificationDropdown">
                                <i class="mdi mdi-bell-outline font-22"></i>
                                <span class="badge badge-pill badge-info noti" id="notificationCount">
                                    @if (!empty($notificationsCounter->unread_notif))
                                    {{ $notificationsCounter->unread_notif }}
                                        @else
                                        0
                                    @endif
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" id="notificationDropdownMenu">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <ul class="list-style-none" id="notificationList">
                                    <li>
                                        <div class="drop-title bg-primary text-white">
                                            <h4 class="m-b-0 m-t-5">New</h4>
                                            <span class="font-light">Notifications</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center notifications"></div>
                                    </li>
                                    {{--  <li>
                                        <a class="nav-link text-center m-b-5 text-dark" href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>  --}}
                                </ul>
                            </div>

                        </li>


                        <script>
                            $(document).ready(function () {
                                // Function to fetch notifications
                                function fetchNotifications() {
                                    $.ajax({
                                        url: "{{ route('notifications.fetch') }}",
                                        method: 'GET',
                                        success: function (response) {
                                            let notifications = response.notifications;
                                            let unreadCount = response.unread_count;

                                            $('#notificationList .message-center').html(''); // Clear existing notifications

                                            notifications.forEach(function (notification) {
                                                console.log(notification);
                                                let notificationItem = `
                                                    <a href="#" class="message-item" data-id_notif=${notification.id_notif}>
                                                        <span class="btn btn-circle">
                                                            <i class="${notification.icon_pelanggan_notif} fa-2x"></i>
                                                        </span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">${notification.title_pelanggan_notif}</h5>
                                                            <span class="mail-desc">${notification.msg_notif}</span>
                                                            <span class="time">${notification.tgl_notif}</span>
                                                        </div>
                                                    </a>
                                                `;
                                                $('#notificationList .message-center').append(notificationItem);
                                            });

                                            // Update the notification count
                                            $('#notificationCount').text(unreadCount);
                                        },
                                        error: function (error) {
                                            console.log("Error fetching notifications:", error);
                                        }
                                    });
                                }

                                // Fetch notifications when dropdown is clicked
                                $('#notificationDropdown').on('click', function () {
                                    fetchNotifications();
                                });

                                // Mark notification as read when a notification item is clicked
                                $(document).on('click', '.message-item', function (e) {
                                    e.preventDefault();
                                    {{--  let notificationId = $(this).data('id');  --}}
                                    let notificationId = $(this).data('id_notif');
                                    console.log(notificationId);

                                    $.ajax({
                                        url: "{{ route('notifications.markAsRead') }}", // Adjust your route here
                                        method: 'POST',
                                        data: {
                                            _token: "{{ csrf_token() }}", // CSRF token for security
                                            id: notificationId
                                        },
                                        success: function (response) {
                                            console.log('Notification marked as read:', response);
                                            // Optionally, refresh the notifications list or update the notification count
                                            fetchNotifications(); // To refresh the list
                                        },
                                        error: function (error) {
                                            console.log('Error marking notification as read:', error);
                                        }
                                    });
                                });
                            });


                        </script>


                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ url('Home') }}/images/logo-website/fo-favicon.png" alt="user"
                                    class="rounded-circle" width="40">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block">
                                    @if ($userPelanggan->nama_plgn != '')
                                        {{ $userPelanggan->nama_plgn }}
                                    @else
                                        {{ $userPelanggan->username_plgn }}
                                    @endif
                                    <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="" alt="An example icon" style="width:24px;height:24px" />" alt="user"
                                            class="rounded-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">
                                            @if ($userPelanggan->nama_plgn != '')
                                        {{ $userPelanggan->nama_plgn }}
                                    @else
                                        {{ $userPelanggan->username_plgn }}
                                    @endif
                                        </h4>

                                    </div>
                                </div>
                                <div class="profile-dis scrollable">
                                    <a class="dropdown-item" href="{{ route('changePassword.guest', $projek->nama_projek) }}">
                                        <i class="ti-user m-r-5 m-l-5"></i> Ubah Password</a>

                                    <a class="dropdown-item" href="{{ route('editProfile.guest',$projek->nama_projek) }}">
                                        <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    <div class="dropdown-divider"></div>
                                </div>
                                <div class="p-l-30 p-10">

                                </div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar sode">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/"
                                aria-expanded="false">
                                <img src="{{ url('images') }}/icon-forms/home-circle.svg" alt="An example icon" style="width:35px;height:25px" />
                                <span class="hide-menu"><b>Halaman Depan</b></span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal hide-menu"></i>
                            <span class="menu"><b>Menu</b></span>
                        </li>

                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.guest', Session::get('selectedProjeks')[0]) }}"
                                aria-expanded="false">
                                <i class="fa fa-dashcube" aria-hidden="true"></i>
                                <span class="hide-menu"><b>Dashboard</b></span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('pembayaran.guest', Session::get('selectedProjeks')[0]) }}"
                                aria-expanded="false">
                                <i class="fas fa-dochub    "></i>
                                <span class="hide-menu"><b>Pembayaran</b></span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('checklist.guest', Session::get('selectedProjeks')[0]) }}"
                                aria-expanded="false">
                                <i class="fa fa-address-book" aria-hidden="true"></i>
                                <span class="hide-menu"><b>Pembangunan Rumah</b></span>
                            </a>
                        </li>

                        {{--  <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Pusat Bantuan</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="table-jsgrid.html"
                                aria-expanded="false">
                                <img src="{{ url('images') }}/icon-forms/face-agent.svg" alt="An example icon" style="width:35px;height:25px" />
                                <span class="hide-menu">Formsliving Care Center</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="table-jsgrid.html"
                                aria-expanded="false">
                               <img src="{{ url('images') }}/icon-forms/frequently-asked-questions.svg" alt="An example icon" style="width:35px;height:25px" />
                                <span class="hide-menu">FaQ</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="table-jsgrid.html"
                                aria-expanded="false">
                                <i class="fa fa-exclamation-circle"></i>
                                <span class="hide-menu">About</span>
                            </a>
                        </li>  --}}

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">@yield('pageTitle')</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="@yield('back')">@yield('breadcrumb')</a>
                                    </li>
                                    @if (!empty(trim($__env->yieldContent('breadcrumb2'))))
                                    <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb2')</li>
                                    @endif

                                    @if (!empty(trim($__env->yieldContent('breadcrumb3'))))
                                    <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb3')</li>
                                    @endif

                                    @if (!empty(trim($__env->yieldContent('breadcrumb4'))))
                                    <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb4')</li>
                                    @endif
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                @yield('flashdata')
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle">
            <i class="fa fa-spin fa-cog"></i>
        </a>
        <div class="customizer-body">
            <ul class="nav customizer-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                        role="tab" aria-controls="pills-home" aria-selected="true">
                        <i class="mdi mdi-wrench font-20"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#chat" role="tab"
                        aria-controls="chat" aria-selected="false">
                        <i class="mdi mdi-message-reply font-20"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                        role="tab" aria-controls="pills-contact" aria-selected="false">
                        <i class="mdi mdi-star-circle font-20"></i>
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                    aria-labelledby="pills-home-tab">
                    <div class="p-15 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-medium m-b-10 m-t-10">Layout Settings</h5>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="theme-view" id="theme-view">
                            <label class="custom-control-label" for="theme-view">Dark Theme</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input sidebartoggler" name="collapssidebar"
                                id="collapssidebar">
                            <label class="custom-control-label" for="collapssidebar">Collapse Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="sidebar-position"
                                id="sidebar-position">
                            <label class="custom-control-label" for="sidebar-position">Fixed Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="header-position"
                                id="header-position">
                            <label class="custom-control-label" for="header-position">Fixed Header</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="boxed-layout"
                                id="boxed-layout">
                            <label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Logo Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin1"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin2"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin3"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin4"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin5"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-logobg="skin6"></a>
                            </li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Navbar BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Navbar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin1"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin2"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin3"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin4"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin5"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-navbarbg="skin6"></a>
                            </li>
                        </ul>
                        <!-- Navbar BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Sidebar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin1"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin2"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin3"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin4"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin5"></a>
                            </li>
                            <li class="theme-item">
                                <a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin6"></a>
                            </li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                </div>

                <div class="tab-pane fade p-15" id="pills-contact" role="tabpanel"
                    aria-labelledby="pills-contact-tab">
                    <h6 class="m-t-20 m-b-20">Activity Timeline</h6>
                    <div class="steamline">
                        <div class="sl-item">
                            <div class="sl-left bg-success">
                                <i class="ti-user"></i>
                            </div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today
                                    <span class="sl-date"> 5pm</span>
                                </div>
                                <div class="desc">you can write anything </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-info">
                                <i class="fas fa-image"></i>
                            </div>
                            <div class="sl-right">
                                <div class="font-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left">
                                <img class="rounded-circle" alt="user"
                                    src="{{ url('Home') }}/images/logo-website/fo-favicon.png">
                            </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor
                                    <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left">
                                <img class="rounded-circle" alt="user"
                                    src="{{ url('Bootstrap') }}/assets/images/users/1.jpg">
                            </div>
                            <div class="sl-right">
                                <div>
                                    <a href="javascript:void(0)">Stephen</a>
                                    <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-primary">
                                <i class="ti-user"></i>
                            </div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today
                                    <span class="sl-date"> 5pm</span>
                                </div>
                                <div class="desc">you can write anything </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-info">
                                <i class="fas fa-image"></i>
                            </div>
                            <div class="sl-right">
                                <div class="font-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left">
                                <img class="rounded-circle" alt="user"
                                    src="{{ url('Bootstrap') }}/assets/images/users/4.jpg">
                            </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor
                                    <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left">
                                <img class="rounded-circle" alt="user"
                                    src="{{ url('Bootstrap') }}/assets/images/users/6.jpg">
                            </div>
                            <div class="sl-right">
                                <div>
                                    <a href="javascript:void(0)">Stephen</a>
                                    <span class="sl-date">5 minutes ago</span>
                                </div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab 3 -->
            </div>
        </div>
    </aside>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ url('Bootstrap') }}/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{ url('Bootstrap') }}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ url('Bootstrap') }}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="{{ url('Bootstrap') }}/dist/js/app.min.js"></script>

    <script>
        {{--  var isDarkMode = "{{ $user->theme_ua }}";  --}}
        var isDarkMode = "light";
        var scriptSrc;

        if (isDarkMode === "light") {
            scriptSrc = "{{ url('Bootstrap') }}/dist/js/app.init.light.js";
        } else if (isDarkMode === "dark") {
            scriptSrc = "{{ url('Bootstrap') }}/dist/js/app.init.dark.js";
        }

        var scriptElement = document.createElement('script');
        scriptElement.src = scriptSrc;
        document.head.appendChild(scriptElement);
    </script>



    <script src="{{ url('Bootstrap') }}/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ url('Bootstrap') }}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{ url('Bootstrap') }}/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="{{ url('Bootstrap') }}/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{ url('Bootstrap') }}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('Bootstrap') }}/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ url('Bootstrap') }}/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="{{ url('Bootstrap') }}/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="{{ url('Bootstrap') }}/assets/extra-libs/c3/d3.min.js"></script>
    <script src="{{ url('Bootstrap') }}/assets/extra-libs/c3/c3.min.js"></script>
    <script src="{{ url('Bootstrap') }}/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{ url('Bootstrap') }}/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ url('Bootstrap') }}/dist/js/pages/dashboards/dashboard1.js"></script>

    <script type="text/javascript" src="{{ url('Dashboard') }}/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{{ url('Dashboard') }}/js//toastify.js"></script>
</body>

</html>

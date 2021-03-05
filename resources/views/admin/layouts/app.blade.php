<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/dashboard-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Jul 2020 11:44:53 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>EPay - Admin</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
        <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
        <meta name="author" content="colorlib" />
        <!-- Favicon icon -->
        <link rel="icon" href="{{ asset('adminPublic/assets/images/favicon.ico')}}" type="image/x-icon">
        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="{{ asset('adminPublic/bower_components/bootstrap/css/bootstrap.min.css')}}">
        <!-- waves.css -->
        <link rel="stylesheet" href="{{ asset('adminPublic/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
        <!-- feather icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('adminPublic/assets/icon/feather/css/feather.css')}}">
        <!-- font-awesome-n -->
        <link rel="stylesheet" type="text/css" href="{{ asset('adminPublic/assets/css/font-awesome-n.min.css')}}">
        <!-- ico font -->
        <link rel="stylesheet" type="text/css" href="{{ asset('adminPublic/assets/icon/icofont/css/icofont.css')}}">
        <!-- Chartlist chart css -->
        <link rel="stylesheet" href="{{ asset('adminPublic/bower_components/chartist/css/chartist.css')}}" type="text/css" media="all">
        <!-- Data Table Css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/admin/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/admin/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/admin/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('adminPublic/assets/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('adminPublic/assets/css/widget.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('adminPublic/assets/css/pages.css')}}">
        @yield('style')
    </head>

    <body>
        <!-- [ Pre-loader ] start -->
        <div class="loader-bg">
            <div class="loader-bar"></div>
        </div>
        <!-- [ Pre-loader ] end -->
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                <!-- [ Header ] start -->
                <nav class="navbar header-navbar pcoded-header">
                    <div class="navbar-wrapper">
                        <div class="navbar-logo">
                            <a href="/">
                                <img class="img-fluid" src="{{ asset('adminPublic/assets/images/logo.png')}}" alt="Theme-Logo" />
                            </a>
                            <a class="mobile-menu" id="mobile-collapse" href="#!">
                                <i class="feather icon-menu icon-toggle-right"></i>
                            </a>
                            <a class="mobile-options waves-effect waves-light">
                                <i class="feather icon-more-horizontal"></i>
                            </a>
                        </div>
                        <div class="navbar-container container-fluid">
                            <ul class="nav-left">
                                <!-- <li class="header-search">
                                    <div class="main-search morphsearch-search">
                                        <div class="input-group">
                                            <span class="input-group-prepend search-close">
                                                <i class="feather icon-x input-group-text"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Enter Keyword">
                                            <span class="input-group-append search-btn">
                                                <i class="feather icon-search input-group-text"></i>
                                            </span>
                                        </div>
                                    </div>
                                </li> -->
                                <li>
                                    <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                        <i class="full-screen feather icon-maximize"></i>
                                    </a>
                                </li>
                            </ul>
                            @php
                                $notifications=App\Models\Notification::where('level','<=',Auth::user()->level-1)->where('etat','=',0)->get();
                                App\Models\Notification::where('etat', 0)->update(['etat' => 1]);
                            @endphp
                            <ul class="nav-right">
                                <li class="header-notification">
                                    <div class="dropdown-primary dropdown">
                                        <div class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="feather icon-bell"></i>
                                            <span class="badge bg-c-green">{{count($notifications)}}</span>
                                        </div>
                                        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                            <li>
                                                <h6>Notifications</h6>
                                                <label class="label label-success">Nouveau</label>
                                            </li>
                                            
                                            @if(count($notifications)==0)
                                            <li>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="notification-msg">Aucune notification.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                            @foreach($notifications as $notification)
                                            <li>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="notification-msg">{{$notification->libelle ?? ''}}.</p>
                                                        <span class="notification-time">30 minutes ago</span>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li class="user-profile header-notification">

                                    <div class="dropdown-primary dropdown">
                                        <div class="dropdown-toggle" data-toggle="dropdown">
                                            <img src="{{ asset('adminPublic/assets/images/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image">
                                            <span><span class="text-uppercase">{{Auth::user()->nom}}</span></span>
                                            <i class="feather icon-chevron-down"></i>
                                        </div>
                                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                            <li>
                                                <a href="{{url('admin/profilUser')}}">
                                                    <i class="feather icon-user"></i> Profile
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{url('admin/auth/change-password')}}">
                                                    <i class="feather icon-lock"></i> Changer de mot de passe
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{url('admin/auth/logout')}}">
                                                    <i class="feather icon-log-out"></i> Se déconnecter
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
                        <!-- [ navigation menu ] start -->
                        <nav class="pcoded-navbar">
                            <div class="nav-list">
                                <div class="pcoded-inner-navbar main-menu">
                                    <div class="pcoded-navigation-label">Navigation</div>
                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                                <span class="pcoded-mtext">Utilisateurs</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="/admin/user/index" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Liste</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="/admin/user/create" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Nouveau</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                                <span class="pcoded-mtext">Projets</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="/admin/projet/index" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Liste</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="/admin/projet/create" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Nouveau</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                                <span class="pcoded-mtext">Logs</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="/admin/log/index" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Liste</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="/admin/log/create" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Nouveau</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!-- [ navigation menu ] end -->
                        <div class="pcoded-content">
                            <!-- [ breadcrumb ] start -->
                            <div class="page-header card">
                                <div class="row align-items-end">
                                    <div class="col-lg-8">
                                        <div class="page-header-title">
                                            @yield('titre')
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="page-header-breadcrumb">
                                            @yield('barre')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->

                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <div class="page-body">
                                            <!-- [ page content ] start -->
                                            <div class="row">
                                                @yield('contenu')
                                            </div>
                                            <!-- [ page content ] end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ style Customizer ] start -->
                        <div id="styleSelector">
                        </div>
                        <!-- [ style Customizer ] end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
        <!--[if lt IE 10]>
            <div class="ie-warning">
                <h1>Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade
                    <br/>to any of the following web browsers to access this website.
                </p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="admin/assets/images/browser/chrome.png" alt="Chrome">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="admin/assets/images/browser/firefox.png" alt="Firefox">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="admin/assets/images/browser/opera.png" alt="Opera">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="admin/assets/images/browser/safari.png" alt="Safari">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="admin/assets/images/browser/ie.png" alt="">
                                <div>IE (9 & above)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
            <![endif]-->
            <!-- Warning Section Ends -->
            <!-- Required Jquery -->
            <script type="text/javascript"  src="{{ asset('adminPublic/bower_components/jquery/js/jquery.min.js')}}"></script>
            <script type="text/javascript"  src="{{ asset('adminPublic/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
            <script type="text/javascript"  src="{{ asset('adminPublic/bower_components/popper.js/js/popper.min.js')}}"></script>
            <script type="text/javascript"  src="{{ asset('adminPublic/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
            <!-- waves js -->
            <script  src="{{ asset('adminPublic/assets/pages/waves/js/waves.min.js')}}"></script>
            <!-- jquery slimscroll js -->
            <script type="text/javascript"  src="{{ asset('adminPublic/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
            <!-- Float Chart js -->
            <script  src="{{ asset('adminPublic/assets/pages/chart/float/jquery.flot.js')}}"></script>
            <script  src="{{ asset('adminPublic/assets/pages/chart/float/jquery.flot.categories.js')}}"></script>
            <script  src="{{ asset('adminPublic/assets/pages/chart/float/curvedLines.js')}}"></script>
            <script  src="{{ asset('adminPublic/assets/pages/chart/float/jquery.flot.tooltip.min.js')}}"></script>
            <!-- amchart js -->
            <script  src="{{ asset('adminPublic/assets/pages/widget/amchart/amcharts.js')}}"></script>
            <script  src="{{ asset('adminPublic/assets/pages/widget/amchart/serial.js')}}"></script>
            <script  src="{{ asset('adminPublic/assets/pages/widget/amchart/light.js')}}"></script>
            <!-- Google map js -->
            <script  src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
            <script type="text/javascript"  src="http://maps.google.com/maps/api/js?sensor=true"></script>
            <script type="text/javascript"  src="{{ asset('adminPublic/assets/pages/google-maps/gmaps.js')}}"></script>
            <!-- data-table js -->
            <script src="{{ asset('adminPublic/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{ asset('adminPublic/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
            <script src="{{ asset('adminPublic/assets/pages/data-table/js/jszip.min.js')}}"></script>
            <script src="{{ asset('adminPublic/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
            <script src="{{ asset('adminPublic/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
            <script src="{{ asset('adminPublic/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
            <script src="{{ asset('adminPublic/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
            <script src="{{ asset('adminPublic/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{ asset('adminPublic/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{ asset('adminPublic/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
            <!-- Custom js -->
            <script  src="{{ asset('adminPublic/assets/js/pcoded.min.js')}}"></script>
            <script  src="{{ asset('adminPublic/assets/js/vertical/vertical-layout.min.js')}}"></script>
            <script type="text/javascript"  src="{{ asset('adminPublic/assets/pages/dashboard/crm-dashboard.min.js')}}"></script>
            <script type="text/javascript"  src="{{ asset('adminPublic/assets/js/script.min.js')}}"></script>
            <script src="{{ asset('adminPublic/assets/pages/data-table/js/data-table-custom.js')}}"></script>
            @yield('script')
        </body>


        <!-- Mirrored from demo.dashboardpack.com/admindek-html/default/dashboard-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Jul 2020 11:44:57 GMT -->
        </html>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('admin-page-title') - {{ env('APP_NAME') }}</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="Phoenixcoded">
  <meta name="keywords" content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
  <meta name="author" content="Phoenixcoded">
  <!-- Favicon icon -->
  <link rel="icon" href="{{asset('assets/images/favicon.ico" type="image/x-icon')}}">
  <!-- Google font-->
  <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}" rel="stylesheet">
  @yield('upper-stylesheet')
  <!-- Required Fremwork -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/bower_components/bootstrap/css/bootstrap.min.css')}}">
  <!-- themify icon -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/themify-icons/themify-icons.css')}}">
  <!-- ico font -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/icofont/css/icofont.css')}}">
  <!-- flag icon framework css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/flag-icon/flag-icon.min.css')}}">
  <!-- Menu-Search css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/menu-search/css/component.css')}}">
  @yield('middle-stylesheet')
  <!-- Horizontal-Timeline css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/dashboard/horizontal-timeline/css/style.css')}}">
  <!-- amchart css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/dashboard/amchart/css/amchart.css')}}">


<link rel="stylesheet" href="{{asset('assets/bower_components/select2/css/select2.min.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('assets/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/bower_components/multiselect/css/multi-select.css')}}" />
  <!-- Style.css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
  <!--color css-->


  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/linearicons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/simple-line-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/ionicons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery.mCustomScrollbar.css')}}">
  <style>
  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    margin: 0;
}
input[type='number'] {
    -moz-appearance:textfield;
}
</style>
@toastr_css 

@yield('stylesheet')

</head>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div></div>
    </div>
</div>
<!-- Pre-loader end -->



<!-- Menu header start -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header" header-theme="theme4">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="ti-menu"></i>
                    </a>
                    <a class="mobile-search morphsearch-search" href="#">
                        <i class="ti-search"></i>
                    </a>
                    <a href="{{ route('admin.dashboard') }}">
                        <img class="img-fluid" src="{{asset('assets/images/logo.png')}}" alt="{{ env('APP_NAME') }}" />
                    </a>
                    <a class="mobile-options">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <div>
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li>
                                <a class="main-search morphsearch-search" href="#">
                                    <!-- themify icon -->
                                    <i class="ti-search"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="{{asset('assets/images/user.png')}}" alt="User-Profile-Image"/>
                                    <span>{{ env('APP_NAME') }}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    @if (Auth::guard('admin')->check())
                                    <li>
                                        <a href=" {{route('admin.logout')}} ">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar" pcoded-header-position="relative">
                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="">
                            <div class="main-menu-header">
                                <img class="img-40" src="{{asset('assets/images/user.png')}}" alt="User-Profile-Image">
                                <div class="user-details">
                                    <span>{{ env('APP_NAME') }}</span>
                                    <span id="more-details">Admin<i class="ti-angle-down"></i></span>
                                </div>
                            </div>

                            <div class="main-menu-content">
                                <ul>
                                    <li class="more-details">
                                        <a href="#!"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme5">App user Control</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="{{ @$navDashboard }}">
                                <a href="{{ route('admin.dashboard') }}">
                                    <span class="pcoded-micon"><i class="ti-list"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ @$navUserNotification }}">
                                <a href="#">
                                    <span class="pcoded-micon"><i class="ti-list"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Notifications</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ @$navUserProfile }}">
                                <a href="{{route('admin.user.index')}}">
                                    <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                                    <span class="pcoded-mtext">Users</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@jquery
@toastr_js
@toastr_render



<!-- Required Jqurey -->
@yield('upper-scripts')
<script type="text/javascript" src="{{asset('assets/bower_components/jquery/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
{{-- sweet alert js --}}
<script src="{{asset('assets/bower_components/sweetalert/js/sweetalert2.min.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('assets/bower_components/modernizr/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
<!-- classie js -->
<script type="text/javascript" src="{{asset('assets/bower_components/classie/js/classie.js')}}"></script>
<!-- Rickshow Chart js -->
<script src="{{asset('assets/bower_components/d3/js/d3.js')}}"></script>
<script src="{{asset('assets/bower_components/rickshaw/js/rickshaw.js')}}"></script>
<!-- Morris Chart js -->
<script src="{{asset('assets/bower_components/raphael/js/raphael.min.js')}}"></script>
<script src="{{asset('assets/bower_components/morris.js/js/morris.js')}}"></script>
<!-- Horizontal-Timeline js -->
<script type="text/javascript" src="{{asset('assets/pages/dashboard/horizontal-timeline/js/main.js')}}"></script>
<!-- amchart js -->
<script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/amcharts.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/serial.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/light.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/custom-amchart.js')}}"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="{{asset('assets/bower_components/i18next/js/i18next.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
@yield('middle-scripts')

<script type="text/javascript" src="{{asset('assets/bower_components/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.quicksearch.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/pages/advance-elements/select2-custom.js')}}"></script>

<!-- Custom js -->
<script type="text/javascript" src="{{asset('assets/pages/dashboard/custom-dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/script.js')}}"></script>

<!-- pcmenu js -->
<script src="{{asset('assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('assets/js/demo-12.js')}}"></script>
<script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.mousewheel.min.js')}}"></script>
<script>
 $('input[type=number]').on('blur',function(e) {
    $(this).off('wheel');
}).on('keydown', function(e) {
    if ( e.which == 38 || e.which == 40 )
        e.preventDefault();
}).on('focus', function(e) {
    $(this).on('wheel', function(e) {
        e.preventDefault();
    });
});
</script>

@yield('scripts')
</body>

</html>

<!DOCTYPE html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Surat Diary</title>

    <meta name="author" content="suratdiary.com">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/stylesheets/bootstrap.css')}}">
    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/stylesheets/style.css')}}">
    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/stylesheets/responsive.css')}}">
    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/revolution/css/settings.css')}}">
    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/stylesheets/animate.css')}}">
    <!-- Favicon and touch icons  -->
    <!-- <link href="icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48')}}"> -->
    <!-- <link href="icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed')}}"> -->
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon')}}">
    @toastr_css 
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
    @yield('stylesheet')
</head>                                 
<body class="header_sticky">   
    <!-- Preloader -->
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading</h2>
        </div>
    </section> 

    <!-- Boxed -->
    <div class="boxed">

        <!-- Header -->            
        <header id="header" class="header clearfix">
            <div class="container">
                <div class="row">                 
                    <div class="col-lg-4">
                        <div id="logo" class="logo float-left">
                            <a href="/" rel="home">
                                <img src="{{asset('images/logo_black.png')}}" alt="image" width="130px">
                            </a>
                        </div><!-- /.logo -->
                        <div class="btn-menu">
                            <span></span>
                        </div><!-- //mobile menu button -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-8">
                        <div class="nav-wrap">                             
                            <nav id="mainnav" class="mainnav float-right">
                                <ul class="menu"> 
                                    <li class="home">
                                        <a href="/">Home</a> 
                                    </li>
                                </ul><!-- /.menu -->
                            </nav><!-- /.mainnav -->  

                        </div><!-- /.nav-wrap -->
                    </div><!-- /.col-lg-8 -->                                    
                </div><!-- /.row -->
            </div>
        </header><!-- /.header -->


        @yield('content')

        <!-- Footer -->
        <footer class="footer footer-widgets">
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-6">  
                        <div class="widget widget_text widget_info">
                            <h5 class="widget-title">About Us</h5>
                            <div class="textwidget">                                
                                <p>The Surat Diary App fills in as a one-stop answer for all your consistently needs - paying little mind to whether it is to get information about movies in movies or theaters your locale, restaurants adjoining, lodgings, masters, home improvement shops, taxi organizations, bloom sellers, resorts, land, ETC</p>                      
                            </div><!-- /.textwidget -->
                            <ul class="flat-infomation">
                                <li><i class="fa fa-map-marker"></i>A/12 Marghiwala Compound, Nr. Komal International Circle, 120 Ft. Bamroli Road, Surat - 394120</li>
                                <li><i class="fa fa-phone"></i>+91 90999 56000</li>
                                <li><i class="fa fa-envelope"></i>info@suratdiary.in</li>
                                <li><i class="fa fa-envelope"></i>support@suratdiary.in</li>
                            </ul>
                        </div><!-- /.widget -->      
                    </div><!-- /.col-lg-3 --> 

                    <div class="col-lg-3">  
                        <div id="nav_menu-2" class="widget widget_nav_menu">
                           <!-- <h5 class="widget-title">Privacy Policy</h5>
                            <div class="wrap-menufooter clearfix">
                                <ul class="menu one-half">
                                    <li class="menu-item"><a href="#">About Us</a></li>
                                    <li class="menu-item"><a href="#">Advertise</a></li>
                                    <li class="menu-item"><a href="#">Terms & Ruler</a></li>
                                    <li class="menu-item"><a href="#">Privacy Policy</a></li>
                                    <li class="menu-item"><a href="#">FAQs</a></li>
                                    <li class="menu-item"><a href="#">Events</a></li>
                                </ul>
                                <ul class="menu one-half">
                                    <li class="menu-item"><a href="#">Method Payment</a></li>
                                    <li class="menu-item"><a href="#">Maintenance</a></li>
                                    <li class="menu-item"><a href="#">Corporate Client</a></li>
                                    <li class="menu-item"><a href="#">LearnPress</a></li>
                                    <li class="menu-item"><a href="#">Release Status</a></li>
                                </ul>
                            </div>-->
                        </div>
                    </div><!-- /.col-lg-3 -->

                <div class="col-lg-3">
                    <div class="widget widget_contact">
                        <h5 class="widget-title">Follow Us</h5>
                        <span style="font-size:30px">
                            <a href="https://www.facebook.com/suratdiary.in/" style="text-align:center;padding:10px">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/suratdiary9/" style="text-align:center;padding:10px">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </span>
                    </div>
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->    
        </div><!-- /.container -->
        <div class="container">
            <div class="bottom">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copyright"> 
                            <p>Copyright © 2019. Developed by <a href="https://murait.com">Murait Technologies</a>. All Rights Reserved.
                            </p>
                        </div>                   
                    </div><!-- /.col-md-12 -->
                    <div class="col-lg-6">
                        
                    </div>  
                </div>
            </div>
        </div>
    </footer>
</div> 

<!-- Go Top -->
<a class="go-top effect-button">
    <i class="fa fa-angle-up"></i>
</a>   

</div>

@jquery
@toastr_js
@toastr_render

<!-- Javascript -->
<script src="{{asset('front/javascript/jquery.min.js')}}"></script>
<script src="{{asset('front/javascript/tether.min.js')}}"></script>
<script src="{{asset('front/javascript/bootstrap.min.js')}}"></script> 
<script src="{{asset('front/javascript/jquery.easing.js')}}"></script>    
<script src="{{asset('front/javascript/jquery-waypoints.js')}}"></script> 
<script src="{{asset('front/javascript/jquery-countTo.js')}}"></script>  
<script src="{{asset('front/javascript/owl.carousel.js')}}"></script>
<script src="{{asset('front/javascript/jquery.cookie.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>
<script src="{{asset('front/javascript/parallax.js')}}"></script>
<script src="{{asset('front/javascript/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('front/javascript/smoothscroll.js')}}"></script>   

<script src="{{asset('front/javascript/main.js')}}"></script>

<!-- Revolution Slider -->
<script src="{{asset('front/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('front/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('front/revolution/js/slider.js')}}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->    
<script src="{{asset('front/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('front/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('front/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('front/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('front/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('front/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('front/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('front/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('front/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>

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
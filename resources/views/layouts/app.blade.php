<!DOCTYPE html>
<html lang="en">
    <head>
        <!--====== Required meta tags ======-->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--====== Title ======-->
        <title>Saap - Sass Landing HTML Template</title>
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">
        <!--====== FontAwesome css ======-->
        <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">
        <!--====== FontAwesome css ======-->
        <link rel="stylesheet" href="assets/fonts/flaticon/flaticon.css">
        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <!--====== magnific-popup css ======-->
        <link rel="stylesheet" href="assets/vendor/magnific-popup/dist/magnific-popup.css">
        <!--====== Slick-popup css ======-->
        <link rel="stylesheet" href="assets/vendor/slick/slick.css">
        <!--====== Sal Animate css ======-->
        <link rel="stylesheet" href="assets/vendor/aos/aos.css">
        <!--====== Default css ======-->
        <link rel="stylesheet" href="assets/css/default.css">
        <!--====== Style css ======-->
        <link rel="stylesheet" href="assets/css/style.css">
        <!--====== Responsive css ======-->
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>
    <body>
        <!--====== Start Preloader ======-->
        <div class="preloader">
            <div class="loader">
                <div class="pre-shadow"></div>
                <div class="pre-box"></div>
            </div>
        </div>
        <!--====== End Preloader ======-->
        <!--====== Search From ======-->
		<div class="modal fade" id="search-modal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form>
                        <div class="form_group">
                        	<input type="text" class="form_control" placeholder="Search here...">
                        	<button class="search_btn"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--====== Search From ======-->
        <!--====== Start Header Section ======-->
        <header class="theme-header transparent-header">
            <div class="header-navigation navigation-white">
                <div class="nav-overlay"></div>
                <div class="container">
                    <div class="primary-menu">
                        <div class="site-branding">
                            <a href="{{url('/')}}" class="brand-logo"><img src="{{ asset('assets/img/logo.png') }}" alt="Site Logo"></a>
                        </div>
                        <div class="nav-menu nav-ml-auto">
                            <!-- Navbar logo -->
                            <div class="sidebar-logo">
                                <a href="{{url('/')}}" class="brand-logo"><img src="{{ asset('assets/img/logo.png') }}" alt="Site Logo"></a>
                            </div>
                            <!-- Navbar Close -->
                            <div class="navbar-close"><i class="far fa-times"></i></div>
                            <!-- Nav Menu -->
                            <nav class="main-menu">
                                <ul>
                                    {{-- <li class="menu-item has-children"><a href="#">Home</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/')}}">Home One</a></li>
                                            <li><a href="index-2.html">Home Two</a></li>
                                            <li><a href="index-3.html">Home Three</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item has-children"><a href="#">Services</a>
                                        <ul class="sub-menu">
                                            <li><a href="services.html">Services</a></li>
                                            <li><a href="service-details.html">Service Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item has-children"><a href="#">Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="about.html">About Us</a></li>
                                            <li class="has-children"><a href="portfolio.html">Portfolio</a>
                                                <ul class="sub-menu">
                                                    <li><a href="portfolio.html">Portfolio</a></li>
                                                    <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                                </ul>
                                            </li>
                                            
                                            <li><a href="team.html">Our Team</a></li>
                                            <li><a href="team-details.html">Team Details</a></li>
                                            <li><a href="pricing.html">Pricing</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item has-children"><a href="#">Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-standard.html">Blog Standard</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li> --}}
                                 
                                    <li class="menu-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="menu-item"><a href="/blogs-list">Blogs</a></li>
                                    <li class="menu-item"><a href="/aboutus">About us</a></li>
                                    <li class="menu-item"><a href="/contactus">Contact us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right-nav">
                            <ul class="d-inline-flex align-items-center">
                                <li class="search-item"><a href="#" data-toggle="modal" data-target="#search-modal"><i class="fas fa-search"></i></a></li>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link rel="shortcut icon" href="{{ url('public/favicon.png') }}">
    <link rel="stylesheet" href="{{ url('public/app/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ url('public/app/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{  url('public/app/assets/css/colors/yellow.css') }}">

    <!-- Fonts -->
    <link rel="preload" href="{{ url('public/app/assets/css/fonts/thicccboi.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    @yield('styles')
</head>

<body>
    <div class="content-wrapper">
        <header class="wrapper bg-soft-primary">
            <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <a href="{{ url('/') }}">
                            <img src="{{ url('public/app/assets/img/logov2.png') }}" srcset="{{ url('public/app/assets/img/logov2.png') }}" width="200" alt="" />
                        </a>
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-header d-lg-none">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/')}}">Home</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="/blogs-list">Blogs</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('subscription.plans') }}">Plans</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/aboutus">About us</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="/contactus">Contact us</a>
                                </li>
                              
                                @guest
                                @if (Route::has('login'))
                                <li class="nav-button"><a href="{{ route('login') }}" class="main-btn bordered-btn">{{ __('Login') }}</a></li>
                                @endif

                                @if (Route::has('register'))
                                <li class="nav-button ml-3"><a href="{{ route('register') }}" class="main-btn bordered-btn">{{ __('Sign Up') }}</a></li>
                                @endif
                                @else 
                                <li class="nav-button"><a href="{{ route('dashboard') }}" class="main-btn bordered-btn">{{ __('Dashboard') }}</a></li>
                                @endguest
                                <li class="nav-toggle-btn">
                                    <div class="navbar-toggler">
                                        <span></span>
                                        <span></span>
                                        <span></span>


                            </ul>
                            <!-- /.navbar-nav -->
                        </div>
                        <!-- /.offcanvas-body -->
                    </div>
                    <div class="navbar-other w-100 d-flex ms-auto d-lg-none">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <li class="nav-item ">
                                <button class="hamburger offcanvas-nav-btn"><span></span></button>
                            </li>
                        </ul>
                        <!-- /.navbar-nav -->
                    </div>
                    <!-- /.navbar-collapse -->

                    <!-- /.navbar-other -->
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.navbar -->
            <div class="offcanvas offcanvas-end text-inverse" id="offcanvas-info" data-bs-scroll="true">
                <div class="offcanvas-header">
                    <h3 class="text-white fs-30 mb-0"> <img src="{{ url('public/app/assets/img/logo-dark.png') }}"
                            srcset="{{ url('public/app/assets/img/logov2.png') }}" width="200" alt="" /></h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body pb-6">
                    <div class="widget mb-8">
                        <p>Sandbox is a multipurpose HTML5 template with various layouts which will be a great solution
                            for your business.</p>
                    </div>
                    <!-- /.widget -->
                    <div class="widget mb-8">
                        <h4 class="widget-title text-white mb-3">Contact Info</h4>
                        <address> Moonshine St. 14/05 <br /> Light City, London </address>
                        <a href=""><span
                                class="__cf_email__"
                                >Contact Us</span></a><br /> 
                        770-882-4207
                    </div>
                    <!-- /.widget -->
                    <div class="widget mb-8">
                        <h4 class="widget-title text-white mb-3">Learn More</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Our Story</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                    <div class="widget">
                        <h4 class="widget-title text-white mb-3">Follow Us</h4>
                        <nav class="nav social social-white">
                            <a href="#"><i class="uil uil-twitter"></i></a>
                            <a href="#"><i class="uil uil-facebook-f"></i></a>
                            <a href="#"><i class="uil uil-dribbble"></i></a>
                            <a href="#"><i class="uil uil-instagram"></i></a>
                            <a href="#"><i class="uil uil-youtube"></i></a>
                        </nav>
                        <!-- /.social -->
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /.offcanvas-body -->
            </div>
            <!-- /.offcanvas -->
        </header>
        <!-- /header -->

        <!-- Main Content -->

        @yield('content')

        <!-- /Main Content -->

    </div>
    <!-- /.content-wrapper -->
    <footer class="bg-light">
        <div class="container py-13 py-md-8">
            <div class="row gy-6 gy-lg-0">
                <div class="col-md-4 col-lg-3">
                    <div class="widget">
                        <img class="mb-4" src="{{ url('public/app/assets/img/logo-dark.png') }}" srcset="{{ url('public/app/assets/img/logov2.png') }}" width="200"
                            alt="" />
                        <p class="mb-4">For support
Hours: Mondays-Fridays 9am – 8pm (est)
Saturdays: 10am – 6pm (est)
</p>
                        <nav class="nav social ">
                            <a href="#"><i class="uil uil-twitter"></i></a>
                            <a href="#"><i class="uil uil-facebook-f"></i></a>
                            <a href="#"><i class="uil uil-dribbble"></i></a>
                            <a href="#"><i class="uil uil-instagram"></i></a>
                            <a href="#"><i class="uil uil-youtube"></i></a>
                        </nav>
                        <!-- /.social -->
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-4 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title  mb-3">For support</h4>
                        <address class="pe-xl-15 pe-xxl-17">For support
Email: Support@entresuitecrm.com
Or Click the chat button to speak with one of our Customer Success Agents

</address>
                        <a href="" class="link-body"><span class="__cf_email__"
>[Email]</span></a><br />Email: Support@entresuitecrm.com
Or Click the chat button to speak with one of our Customer Success Agents

                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-4 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title  mb-3"> For customized pricing:</h4>
                       
                    Email: Quotes@entresuitecrm.com

                    Mailing Address
                    PO Box 668 
                    Hoschton GA 30548

                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /column -->
                <div class="col-md-12 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title  mb-3">Our Newsletter</h4>
                        <p class="mb-5">Subscribe to our newsletter to get our news & deals delivered to you.</p>
                        <div class="newsletter-wrapper">
                            <!-- Begin Mailchimp Signup Form -->
                            <div id="mc_embed_signup2">
                                <form
                                    action="https://elemisfreebies.us20.list-manage.com/subscribe/post?u=aa4947f70a475ce162057838d&amp;id=b49ef47a9a"
                                    method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form"
                                    class="validate " target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll2">
                                        <div class="mc-field-group input-group form-floating">
                                            <input type="email" value="" name="EMAIL"
                                                class="required email form-control" placeholder="Email Address"
                                                id="mce-EMAIL2">
                                            <label for="mce-EMAIL2">Email Address</label>
                                            <input type="submit" value="Join" name="subscribe"
                                                id="mc-embedded-subscribe2" class="btn btn-primary ">
                                        </div>
                                        <div id="mce-responses2" class="clear">
                                            <div class="response" id="mce-error-response2" style="display:none"></div>
                                            <div class="response" id="mce-success-response2" style="display:none"></div>
                                        </div>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input
                                                type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1"
                                                value=""></div>
                                        <div class="clear"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--====== End Header Section ======-->
        @yield('content')
        <!--====== Start Footer ======--> 
        <footer class="footer-area footer-default">
            <div class="container">
                <div class="footer-widget pt-100 pb-55">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget about-widget mb-40" data-aos="fade-up" data-aos-delay="30">
                                <div class="site-branding">
                                    <a href="{{url('/')}}"><img src="{{ asset('assets/img/logo.png') }}" alt="Site Logo"></a>
                                </div>
                                <p>For support
                                    Hours: Mondays-Fridays 9am – 8pm (est)
                                    Saturdays: 10am – 6pm (est)
                                </p>
                                <ul class="social-link">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget footer-nav-widget mb-40" data-aos="fade-up" data-aos-delay="40">
                                <h4 class="widget-title">For support</h4>
                                <ul class="footer-nav">
                                    <li><a href="#">For support
                                        Email: Support@entresuitecrm.com
                                        Or Click the chat button to speak with one of our Customer Success Agents</a></li>
                                    {{-- <li><a href="#">Features</a></li>
                                    <li><a href="#">Documentation</a></li>
                                    <li><a href="#">Referral Program</a></li>
                                    <li><a href="#">Pricing</a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget footer-nav-widget" data-aos="fade-up" data-aos-delay="50">
                                <div class="widget footer-nav-widget mb-40">
                                    <h4 class="widget-title">For customized pricing:</h4>
                                    <ul class="footer-nav">
                                        <li><a href="#">Email: Quotes@entresuitecrm.com</a></li>
                                        <li><a href="#">Mailing Address
                                            PO Box 668 
                                            Hoschton GA 30548</a></li>
                                        {{-- <li><a href="#">Changelog</a></li>
                                        <li><a href="#">Developers</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget contact-info-widget mb-40" data-aos="fade-up" data-aos-delay="60">
                                <h4 class="widget-title">Informaion</h4>
                                <ul class="info-list">
                                    <li><span><i class="far fa-phone"></i><a href="tel:+123-589-847">+123 - 589 - 847</a></span></li>
                                    <li><span><i class="far fa-envelope-open-text"></i><a href="mailto:Quotes@entresuitecrm.com">Quotes@entresuitecrm.com</a></span></li>
                                    <li><span><i class="far fa-map-marker-alt"></i>Mailing Address
                                        PO Box 668 
                                        Hoschton GA 30548</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text text-center">
                                <p>&copy; Copyright 2022 Saap All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--====== End Footer ======-->
        <!--====== back-to-top ======-->
        <a href="#" class="back-to-top" ><i class="far fa-angle-up"></i></a>
        <!--====== Jquery js ======-->
        <script src="assets/vendor/jquery-3.6.0.min.js"></script>
        <!--====== Bootstrap js ======-->
        <script src="assets/vendor/popper/popper.min.js"></script>
        <!--====== Bootstrap js ======-->
        <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--====== Slick js ======-->
        <script src="assets/vendor/slick/slick.min.js"></script>
        <!--====== Magnific js ======-->
        <script src="assets/vendor/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
        <!--====== Counterup js ======-->
        <script src="assets/vendor/jquery.counterup.min.js"></script>
        <!--====== Waypoints js ======-->
        <script src="assets/vendor/jquery.waypoints.js"></script>
        <!--====== Parallax js ======-->
        <script src="assets/vendor/parallax.min.js"></script>
        <!--====== AOS js ======-->
        <script src="assets/vendor/aos/aos.js"></script>
        <!--====== Main js ======-->
        <script src="assets/js/theme.js"></script>
    </body>
</html>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </footer>

    <script src="{{ url('public/app/assets/js/plugins.js') }}"></script>
    <script src="{{ url('public/app/assets/js/theme.js') }}"></script>
    @yield('scripts')
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="6cf972f1-fe97-4d08-8a5b-31d0272ab093";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>

</html>

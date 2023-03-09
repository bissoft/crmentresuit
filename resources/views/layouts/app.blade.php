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
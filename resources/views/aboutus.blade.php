@extends('layouts.app')
@section('content')
        <!--====== Start Breadcrumbs Section ======-->
        <section class="hero-area">
            <div class="breadcrumbs-wrapper blue-dark-gradient">
                <div class="shape shape-one scene"><span data-depth="2"></span></div>
                <div class="shape shape-two scene"><span data-depth="3"></span></div>
                <div class="shape shape-three scene"><span data-depth="4"></span></div>
                <div class="shape shape-four scene"><span data-depth=".1"></span></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="page-title-text text-center">
                                <h1 class="title">About Us</h1>
                                <ul class="breadcrumbs-link">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="active">About Us</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End Breadcrumbs Section ======-->
        <!--====== Start Fancy Text Block Section ======-->
        <section class="fancy-text-block fancy-text-block-seven pt-120 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="img-holder mb-50">
                            <img src="{{ asset('assets/img/graph.jpg') }}" class="img-position img-one animate-float-y" alt="Image">
                            <img src="{{ asset('assets/img/graph1.jpg') }}" class="img-position img-two animate-float-x" alt="Image">
                            <div class="shape shape-one scene"><span data-depth="4"><img src="assets/images/shape/object-3.png" class="shape-icon shape-one" alt="Image"></span></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-wrapper mb-50">
                            <div class="section-title mb-35" data-aos="fade-up" data-aos-delay="20">
                                <span class="sub-title sub-title-bg animated-hover-icon">Our Mission</span>
                                <h2>Our key features</h2>
                            </div>
                            <div class="block-style-seven d-flex mb-25 animated-hover-icon" data-aos="fade-up" data-aos-delay="30">
                                <div class="icon bg-one">
                                    <i class="flaticon-email"></i>
                                </div>
                                <div class="text">
                                    <h5 class="title">Email Marketing</h5>
                                    <p>Nurture those leads by creating marketing campaigns to stay in touch</p>
                                </div>
                            </div>
                            <div class="block-style-seven d-flex mb-25 animated-hover-icon" data-aos="fade-up" data-aos-delay="40">
                                <div class="icon bg-two">
                                    <i class="flaticon-analytics"></i>
                                </div>
                                <div class="text">
                                    <h5 class="title">Leads</h5>
                                    <p>We’ve made it easy for you to capture and organize your leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End Fancy Text Block Section ======-->
        <!--====== Start Features Section ======-->
        <section class="features-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="block-style-five d-flex mb-40 animated-hover-icon" data-aos="fade-up" data-aos-delay="20">
                            <div class="icon g-bg-one">
                                <i class="flaticon-responsive"></i>
                            </div>
                            <div class="text">
                                <h3 class="title">eSignatures</h3>
                                <p>Send documents for secure signatures</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="block-style-five d-flex mb-40 animated-hover-icon" data-aos="fade-up" data-aos-delay="30">
                            <div class="icon g-bg-two">
                                {{-- <i class="flaticon-idea"></i> --}}
                                <i class="flaticon-line-graph"></i>
                            </div>
                            <div class="text">
                                <h3 class="title">Video Conferencing</h3>
                                <p>Invite Customers to video meetings, record screens and more…</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="block-style-five d-flex mb-40 animated-hover-icon" data-aos="fade-up" data-aos-delay="40">
                            <div class="icon g-bg-one">
                                {{-- <i class="flaticon-united"></i> --}}
                                <i class="flaticon-shuttle"></i>
                            </div>
                            <div class="text">
                                <h3 class="title">Expense Tracking</h3>
                                <p>Stay on top of your expenses with this feature</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End Features Section ======-->
        <!--====== End fancy-text-block Section ======-->
        <section class="fancy-text-block blue-dark-gradient fancy-text-block-eight pt-90 pb-50">
            <div class="shape shape-one scene"><span data-depth=".1"><img src="assets/images/shape/map.png" alt=""></span></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text-wrapper text-wrapper-white mb-40" data-aos="fade-right" data-aos-delay="20">
                            <div class="section-title section-title-white mb-25">
                                <h2>Meet Dr. Shy Courtney 
                                    CEO / FOUNDER </h2>
                            </div>
                            <p>Meet Dr. Shy Courtney 
                                Business Coach/ Mentor
                                Talk Show Host
                                Published Author 
                                Serial Entrepreneur</p>
                            <a href="#" class="main-btn btn-gradient-yellow">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="img-holder text-lg-right mb-40" data-aos="fade-left" data-aos-delay="20">
                            <img src="{{ asset('assets/img/shy.jpg') }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End fancy-text-block Section ======-->
        <!--====== Start Team Section ======-->
        <section class="team-area team-style-one pt-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center mb-55">
                            <span class="sub-title sub-title-bg">Our Team</span>
                            <h2>Meet our experience team Memeber</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="team-item mb-40" data-aos="fade-up" data-aos-delay="30">
                            <div class="img-holder">
                                <img src="{{ asset('assets/img/t-1.jpg') }}" alt="Team Image">
                                <div class="team-hover">
                                    <div class="hover-content text-center">
                                        <ul class="social-link">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                        <h5><a href="#">Dr. Shy</a></h5>
                                        <p class="position">CEO/ FOUNDER</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="team-item mb-40" data-aos="fade-up" data-aos-delay="40">
                            <div class="img-holder">
                                <img src="{{ asset('assets/img/t-3.jpg') }}" alt="Team Image">
                                <div class="team-hover">
                                    <div class="hover-content text-center">
                                        <ul class="social-link">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                        <h5><a href="#">Raymond Saylor</a></h5>
                                        <p class="position">COMPANY'S CPA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="team-item mb-40" data-aos="fade-up" data-aos-delay="50">
                            <div class="img-holder">
                                <img src="{{ asset('assets/img/t-2.jpg') }}" alt="Team Image">
                                <div class="team-hover">
                                    <div class="hover-content text-center">
                                        <ul class="social-link">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                        <h5><a href="#">Sarah Boorsma</a></h5>
                                        <p class="position">OPERATIONS MANAGER</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="team-item mb-40" data-aos="fade-up" data-aos-delay="60">
                            <div class="img-holder">
                                <img src="{{ asset('assets/img/t-4.jpg') }}" alt="Team Image">
                                <div class="team-hover">
                                    <div class="hover-content text-center">
                                        <ul class="social-link">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                        <h5><a href="#">michelle yeoh</a></h5>
                                        <p class="position">Administrative Assistant</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End Team Section ======-->
        <!--====== Start Faq Section ======-->
        <section class="faq-area pt-80 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="img-holder mb-50" data-aos="fade-right" data-aos-delay="20">
                            <img src="{{ asset('assets/img/coche.jpg') }}" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-wrapper mb-50">
                            <div class="section-title mb-35" data-aos="fade-up" data-aos-delay="30">
                                <span class="sub-title sub-title-bg">Our Company</span>
                                <h2>
                                    Discover why entrepreneurs all over the world,
                                    choose EntreSuite to run their business.
                                </h2>
                            </div>
                            <div class="faq-accordian faq-accordian-one" data-aos="fade-up" data-aos-delay="40">
                                <div class="accordion" id="accordionOne">
                                    <div class="card mb-10">
                                        <div class="card-header">
                                            <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">
                                                <i class="fas fa-question bg-two"></i> Businesses?
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse show"  data-parent="#accordionOne">
                                            <div class="card-body">
                                                <p>
                                                    Businesses of all types rely on us to make their day to day operations function
                                                    seamlessly. EntreSuite CRM allows businesses to run more efficiently by using
                                                    automated features, we are able to save over several hours per week by completely
                                                    streamlining and managing workflow
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-10">
                                        <div class="card-header">
                                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false">
                                                <i class="fas fa-question bg-two"></i>Coaches?
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordionOne">
                                            <div class="card-body">
                                                <p>
                                                    Coaches, accounting & financial services firms, law firms, beauty, industry
                                                    professionals, event planners and 100s of others — run on EntreSuite CRM.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-10">
                                        <div class="card-header">
                                            <a href="#" class="collapsed"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false">
                                                <i class="fas fa-question bg-two"></i>clients?
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordionOne">
                                            <div class="card-body">
                                                <p>
                                                    We provide clients with a custom branded portal which can be managed on web and
                                                    mobile device.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End Faq Section ======-->
        
@endsection
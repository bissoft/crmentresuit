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
                            <h1 class="title">Contact Us</h1>
                            <ul class="breadcrumbs-link">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Breadcrumbs Section ======-->
    <!--====== Start Contact information Section ======-->
    <section class="contact-information-area pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-weapper mb-50" data-aos="fade-right" data-aos-delay="20">
                        <div class="section-title mb-20">
                            <h2>Always ready for Your
                                Solution</h2>
                        </div>
                        <p>Praesent justo nisl, commodo quis velit vitae, vulputate accumsan dui. </p>
                        <div class="information-list">
                            <div class="information-item d-flex mb-30 animated-hover-icon">
                                <div class="icon">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="text">
                                    <h5>Phone</h5>
                                    <p><a href="tel:+123-589-847">+123 - 589 - 847</a></p>
                                </div>
                            </div>
                            <div class="information-item d-flex mb-30 animated-hover-icon">
                                <div class="icon">
                                    <i class="far fa-envelope-open"></i>
                                </div>
                                <div class="text">
                                    <h5>Phone</h5>
                                    <p><a href="mailto:Saap@gmail.com">Saap@gmail.com</a></p>
                                </div>
                            </div>
                            <div class="information-item d-flex mb-30 animated-hover-icon">
                                <div class="icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="text">
                                    <h5>Location</h5>
                                    <p>1791 Yorkshire Circle Kitty
                                        Hawk, NC 279499</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="img-holder text-right mb-50" data-aos="fade-left" data-aos-delay="30">
                        <img src="assets/images/contact-1.png" alt="contact image">
                        <img src="assets/images/arrow.png" class="shape-icon shape-icon-one animate-float-x" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Contact information Section ======-->
    <!--====== Start Contact Section ======-->
    <section class="contact-area contact-style-one">
        <div class="container">
            <div class="contact-wrapper" data-aos="fade-up" data-aos-delay="20">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title text-center mb-35">
                            <h2>Tech in Touch</h2>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="text" class="form_control" placeholder="Full Name" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="email" class="form_control" placeholder="Email" name="email" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group">
                                    <input type="text" class="form_control" placeholder="Subject" name="subject" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group">
                                    <textarea name="message" class="form_control" placeholder="Massage"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group text-center">
                                    <button class="main-btn btn-gradient-yellow">Submit Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--====== End Contact Section ======-->
    <!--====== Start Map section ======-->
    <section class="contact-page-map">
        <div class="map-box">
            <iframe src="https://maps.google.com/maps?q=new%20york&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
        </div>
    </section><!--====== End Map section ======-->
   
    
@endsection
@extends('layouts.app')

@section('content')
  <!--====== Start Hero Section ======-->
  <section class="hero-area hero-style-one bg_cover" style="background-image:url(assets/images/hero/hero-bg-1.png)">
    <div class="hero-shape shape-one scene"><span data-depth="1"></span></div>
    <div class="hero-shape shape-two scene"><span data-depth="2"></span></div>
    <div class="hero-shape shape-three scene"><span data-depth=".5"></span></div>
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-8">
                <div class="hero-content text-center">
                    <h1 data-aos="fade-up">EntreSuite CRM</h1>
                    <a href="about.html" class="main-btn btn-white" data-aos="fade-up">Read More</a>
                </div>
            </div>
        </div>
        <div class="hero-img animate-float-y">
            <img src="{{ asset('assets/img/h-1.jpg') }}" alt="Hero Image">
        </div>
    </div>
</section><!--====== End Hero Section ======-->
<!--====== Start Features Section ======-->
<section class="features-area pb-30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-55" data-aos="fade-up">
                    <span class="sub-title sub-title-bg">What We Do</span>
                    <h2>The complete software
                        solution</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="block-style-one block-icon-animate animated-hover-icon mb-40" data-aos="fade-up" data-aos-delay="30">
                    <div class="icon">
                        <i class="flaticon-shuttle"></i>
                        
                    </div>
                    <div class="text">
                        <h3 class="title">Projects & Task allocations</h3>
                        <p>Manage and assign projects to any member on your team </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="block-style-one block-icon-animate animated-hover-icon mb-40" data-aos="fade-up" data-aos-delay="60">
                    <div class="icon">
                        <i class="flaticon-line-graph"></i>
                    </div>
                    <div class="text">
                        <h3 class="title">Video Conferencing</h3>
                        <p>Invite Customers to video meetings, record screens and more…</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="block-style-one block-icon-animate animated-hover-icon mb-40" data-aos="fade-up" data-aos-delay="90">
                    <div class="icon">
                        <i class="flaticon-responsive"></i>
                    </div>
                    <div class="text">
                        <h3 class="title">eSignatures</h3>
                        <p>Send documents for secure signatures </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End Features Section ======-->
<!--====== Start Text Block Section ======-->
<section class="fancy-text-block fancy-text-block-one pb-45">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="text-wrapper mb-25" data-aos="fade-up">
                    <div class="section-title mb-20">
                        <span class="sub-title sub-title-bg">Analyze Now</span>
                        <h2>The average Entrepreneur/ small business</h2>
                    </div>
                    <p>The average Entrepreneur/ small business uses 5 to 6 applications to run their business.
                        This means that they are paying several monthly subscriptions and are more likely to spend more time
                        toggling between these applications. EntreSuite will give them the tools they need to execute these
                        tasks more efficiently. The key features of the software includes: calendars/ scheduling, payments/
                        invoicing, tasks assignments and tracking, marketing campaigns, contracts, forms, eSignature
                        capabilities, expense tracking and more. We will package these features in the most cost-effective
                        way so that our clients can save on monthly subscriptions and potentially increase productivity</p>
                    <a href="/aboutus" class="main-btn bordered-btn bordered-blue">Read More</a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="img-holder mb-25">
                    <div class="shape shape-one scene">
                        <span data-depth="3"><img src="assets/images/shape/object-1.png" alt="object"></span>
                    </div>
                    <img src="{{ asset('assets/img/h-2.jpeg') }}" class="img-one animate-float-y" alt="">
                    <img src="{{ asset('assets/img/li-s1.jpg') }}" class="img-two animate-float-x" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End Text Block Section ======-->
<!--====== Start Text Block Section ======-->
<section class="fancy-text-block fancy-text-block-two pb-55">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="img-holder mb-50">
                    <div class="shape shape-one scene">
                        <span data-depth="4"><img src="assets/images/shape/object-1.png" alt="object"></span>
                    </div>
                    <img src="{{ asset('assets/img/h-4.jpeg') }}" class="img-one animate-float-y" alt="">
                    <img src="{{ asset('assets/img/li-s2.jpg') }}" class="img-two animate-float-X" alt="">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="text-wrapper mb-50" data-aos="fade-up">
                    <div class="section-title mb-20">
                        <span class="sub-title sub-title-bg">Businesses</span>
                        <h2>Discover why entrepreneurs all over the world, choose EntreSuite to
                            run their business.</h2>
                    </div>
                    <p>Businesses of all types rely on us to make their day to day operations function
                        seamlessly. EntreSuite CRM allows businesses to run more efficiently by using
                        automated features, we are able to save over several hours per week by completely
                        streamlining and managing workflow
                    </p>
                    <ul class="check-list-one mb-40">
                        <li class="bg-one">Coaches</li>
                        <li class="bg-two">clients</li>
                    </ul>
                    <a href="/aboutus" class="main-btn bordered-btn bordered-blue">Load More</a>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Text Block Section ======-->
<!--====== Start Counter Section ======-->
<section class="counter-area counter-style-one blue-dark pt-100 pb-55">
    <div class="shape shape-one scene"><span data-depth="4"></span></div>
    <div class="shape shape-two scene"><span data-depth="3"></span></div>
    <div class="shape shape-three scene"><span data-depth=".5"></span></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="counter-item mb-40 animated-hover-icon text-center" data-aos="fade-up" data-aos-delay="30">
                    <div class="icon">
                        <i class="flaticon-project-management"></i>
                    </div>
                    <div class="text">
                        <h2 class="number"><span class="count">3556</span>+</h2>
                        <p>Project complate</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="counter-item mb-40 animated-hover-icon text-center" data-aos="fade-up" data-aos-delay="40">
                    <div class="icon">
                        <i class="flaticon-rating"></i>
                    </div>
                    <div class="text">
                        <h2 class="number"><span class="count">356</span>+</h2>
                        <p>Happy Customar</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="counter-item mb-40 text-center animated-hover-icon" data-aos="fade-up" data-aos-delay="50">
                    <div class="icon">
                        <i class="flaticon-medal"></i>
                    </div>
                    <div class="text">
                        <h2 class="number"><span class="count">3556</span>+</h2>
                        <p>National Award</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="counter-item mb-40 text-center animated-hover-icon" data-aos="fade-up" data-aos-delay="60">
                    <div class="icon">
                        <i class="flaticon-crown"></i>
                    </div>
                    <div class="text">
                        <h2 class="number"><span class="count">356</span>+</h2>
                        <p>Team Memeber</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End Counter Section ======-->
<!--====== Start Services Section ======-->
<section class="services-area pt-130 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-55" data-aos="fade-up">
                    <span class="sub-title sub-title-bg">Our Services</span>
                    <h2>Our key features includes:</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="block-style-two block-icon-animate animated-hover-icon d-flex mb-30" data-aos="fade-up" data-aos-delay="30">
                    <div class="icon bg-one">
                        <i class="flaticon-analytics"></i>
                    </div>
                    <div class="text">
                        <h3 class="title"><a href="#">Invoicing</a></h3>
                        <p>Create custom branded invoices</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="block-style-two block-icon-animate animated-hover-icon d-flex mb-30" data-aos="fade-up" data-aos-delay="40">
                    <div class="icon bg-two">
                        <i class="flaticon-email"></i>
                    </div>
                    <div class="text">
                        <h3 class="title"><a href="#">Email Marketing</a></h3>
                        <p>Nurture those leads by creating marketing campaigns to stay in touch</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="block-style-two block-icon-animate animated-hover-icon d-flex mb-30" data-aos="fade-up" data-aos-delay="50">
                    <div class="icon bg-three">
                        <i class="flaticon-digital-marketing"></i>
                    </div>
                    <div class="text">
                        <h3 class="title"><a href="#">Client Scheduling tool</a></h3>
                        <p>Your Client can book their appointments with you or any member of your team
                            seamlessly</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="block-style-two block-icon-animate animated-hover-icon d-flex mb-30" data-aos="fade-up" data-aos-delay="60">
                    <div class="icon bg-four">
                        <i class="flaticon-content"></i>
                    </div>
                    <div class="text">
                        <h3 class="title"><a href="#">Leads</a></h3>
                        <p>We’ve made it easy for you to capture and organize your leads</p>
                    </div>
                </div>
            </div>
      
        </div>
    </div>
</section>
<!--====== End Services Section ======-->
<!--====== Start Team Section ======-->
<section class="team-area team-style-one pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-55" data-aos="fade-up">
                    <span class="sub-title sub-title-bg">Our Team</span>
                    <h2>Meet our experience team Memeber</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
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
                                <h5><a href="team-details.html">Dr. Shy</a></h5>
                                <p class="position">CEO/ FOUNDER </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
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
                                <h5><a href="team-details.html">Raymond Saylor</a></h5>
                                <p class="position">COMPANY'S CPA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
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
                                <h5><a href="team-details.html">Sarah Boorsma</a></h5>
                                <p class="position">OPERATIONS MANAGER</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
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
                                <h5><a href="team-details.html">michelle yeoh</a></h5>
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
<!--====== Start Testimonial Section ======-->
<section class="testimonial-area testimonial-style-one gray-light pt-120 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="text-wrapper mb-50" data-sal="slide-up" data-sal-delay="400">
                    <div class="section-title mb-30">
                        <span class="sub-title sub-title-bg">Pricing Table</span>
                        <h2>What they are
                            telling about Us</h2>
                    </div>
                    <p>2356+ clients Trusted Us</p>
                    <div class="testimonial-arrows d-flex"></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="testimonial-slider-one mb-50">
                    <div class="testimonial-item" data-aos="fade-up">
                        <div class="testimonial-content">
                            <p>Phasellus eget leo sit amet massa lobortis condimentum. Suspendisse potenti. Pellentesque non orci arcu. Quisque tincidunt euismod erat id euismod.</p>
                            <div class="author-thumb-title" >
                                <div class="author-thumb">
                                    <img src="{{ asset('assets/img/li-s1.jpg') }}" alt="">
                                </div>
                                <div class="author-title">
                                    <h5>Michelle yeoh</h5>
                                    <p class="position">Senior Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item" data-aos="fade-up">
                        <div class="testimonial-content">
                            <p>Phasellus eget leo sit amet massa lobortis condimentum. Suspendisse potenti. Pellentesque non orci arcu. Quisque tincidunt euismod erat id euismod.</p>
                            <div class="author-thumb-title">
                                <div class="author-thumb">
                                    <img src="{{ asset('assets/img/li-s3.jpg') }}" alt="">
                                </div>
                                <div class="author-title">
                                    <h5>Michelle yeoh</h5>
                                    <p class="position">Senior Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item" data-aos="fade-up">
                        <div class="testimonial-content">
                            <p>Phasellus eget leo sit amet massa lobortis condimentum. Suspendisse potenti. Pellentesque non orci arcu. Quisque tincidunt euismod erat id euismod.</p>
                            <div class="author-thumb-title">
                                <div class="author-thumb">
                                    <img src="{{ asset('assets/img/li-s1.jpg') }}" alt="">
                                </div>
                                <div class="author-title">
                                    <h5>Michelle yeoh</h5>
                                    <p class="position">Senior Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End Testimonial Section ======-->
<!--====== Start Pricing Section ======-->
<section class="pricing-area pricing-style-one pt-120 pb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section-title text-center mb-55" data-aos="fade-up" data-aos-delay="30">
                    <span class="sub-title sub-title-bg">Pricing Table</span>
                    <h2>Provide Awesome
                        pricing plan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="pricing-item pricing-item-one block-icon-animate mb-40" data-aos="fade-up" data-aos-delay="40">
                    <div class="pricing-header d-flex">
                        <div class="icon">
                            <i class="flaticon-shuttle"></i>
                        </div>
                        <div class="title">
                            <span class="plan">Basic Plan</span>
                            <h2 class="price"><span class="sign">$</span>29 <span class="duration">/Mo</span></h2>
                        </div>
                    </div>
                    <div class="pricing-body">
                        <ul class="check-list-one">
                            <li class="check">Limited Acess Library</li>
                            <li class="check">Limited Acess Library</li>
                            <li class="uncheck">Private cloud hosting</li>
                            <li class="uncheck">Full security</li>
                            <li class="uncheck">Hotline Support 24/7</li>
                        </ul>
                        <a href="pricing.html" class="main-btn bordered-btn bordered-blue">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="pricing-item pricing-item-one block-icon-animate mb-40" data-aos="fade-up" data-aos-delay="50">
                    <div class="pricing-header d-flex">
                        <div class="icon">
                            <i class="flaticon-medal"></i>
                        </div>
                        <div class="title">
                            <span class="plan">Standard Plan</span>
                            <h2 class="price"><span class="sign">$</span>69 <span class="duration">/Mo</span></h2>
                        </div>
                    </div>
                    <div class="pricing-body">
                        <ul class="check-list-one">
                            <li class="check">Limited Acess Library</li>
                            <li class="check">Limited Acess Library</li>
                            <li class="uncheck">Private cloud hosting</li>
                            <li class="uncheck">Full security</li>
                            <li class="uncheck">Hotline Support 24/7</li>
                        </ul>
                        <a href="pricing.html" class="main-btn bordered-btn bordered-blue">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="pricing-item pricing-item-one block-icon-animate mb-40" data-aos="fade-up" data-aos-delay="60">
                    <div class="pricing-header d-flex">
                        <div class="icon">
                            <i class="flaticon-crown"></i>
                        </div>
                        <div class="title">
                            <span class="plan">Premium Plan</span>
                            <h2 class="price"><span class="sign">$</span>129 <span class="duration">/Mo</span></h2>
                        </div>
                    </div>
                    <div class="pricing-body">
                        <ul class="check-list-one">
                            <li class="check">Limited Acess Library</li>
                            <li class="check">Limited Acess Library</li>
                            <li class="uncheck">Private cloud hosting</li>
                            <li class="uncheck">Full security</li>
                            <li class="uncheck">Hotline Support 24/7</li>
                        </ul>
                        <a href="pricing.html" class="main-btn bordered-btn bordered-blue">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End Pricing Section ======-->
<!--====== Start Blog Section ======-->
<section class="blog-area blog-three-column pb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-55" data-aos="fade-up" data-aos-delay="30">
                    <span class="sub-title sub-title-bg">Blog & News</span>
                    <h2>latest Blog & News</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($blog as $b)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="blog-post-item mb-40" data-aos="fade-up" data-aos-delay="40">
                    <div class="post-thumbnail">
                        <img src="{{$b->image ?? ''}}" alt="Blog Image">
                    </div>
                    <div class="entry-content">
                        <div class="post-meta">
                            <ul>
                                <li><span class="date"><i class="far fa-calendar-alt"></i><a href="#">{{date('d M, Y',strtotime($b->created_at ?? ''))}}</a></span></li>
                            </ul>
                        </div>
                        <h3 class="title"><a href="blog-details.html">{{$b->title ?? ''}}</a></h3>
                        <p>{{substr($b->description ?? '',0,100)}} ... </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--====== End Blog Section ======-->
<!--====== Start Newsletter Section ======-->
<section class="cta-area cta-style-one blue-dark">
    <div class="shape shape-one scene"><span data-depth="5"></span></div>
    <div class="shape shape-two scene"><span data-depth=".5"></span></div>
    <div class="shape shape-three scene"><span data-depth="3"></span></div>
    <div class="shape shape-four scene"><span data-depth="4"></span></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-wrapper pt-90 pb-100" data-aos="fade-up" data-aos-delay="30">
                    <div class="section-title section-title-white">
                        <h2>Subscribe now to Our
                            Newsletter
                            </h2>
                    </div>
                    <form>
                        <div class="form_group">
                            <input type="email" class="form_control" placeholder="Email Adress...." name="name" required>
                            <button class="main-btn btn-blue-dark">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cta-img"><img src="{{ asset('assets/img/h-2.jpeg') }}" alt="CTA Image"></div>
            </div>
        </div>
    </div>
</section>
<!--====== End Newsletter Section ======-->
@endsection

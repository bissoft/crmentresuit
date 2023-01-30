@extends('layouts.app')

@section('content')
<section class="wrapper bg-soft-primary">
    <div class="container pt-10 pb-15 pt-md-14 pb-md-20">
        <div class="row gx-lg-8 gx-xl-12 gy-10 mb-5 align-items-center">
            <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-5 text-center text-lg-start order-2 order-lg-0"
                data-cues="slideInDown" data-group="page-title" data-delay="600">
                <h1 class="display-1 mb-5 mx-md-n5 mx-lg-0">EntreSuite CRM</h1>
                <p class="lead fs-lg mb-7">The all in one workflow platform, created by an Entrepreneur for
                    Entrepreneurs. EntreSuite is everything you need to run your day to day operations seamlessly. We've
                    identified the key functions of small businesses and combined these functions in one place to cut
                    costs and save time.</p>
                <div class="d-flex justify-content-center justify-content-lg-start" data-cues="slideInDown"
                    data-group="page-title-buttons" data-delay="900">
                    <span><a class="btn btn-primary rounded me-2">See Projects</a></span>
                    <span><a class="btn btn-yellow rounded">Learn More</a></span>
                </div>
            </div>
            <!-- /column -->
            <div class="col-lg-7" data-cue="slideInDown">
                <figure><img class="w-auto" src="{{ url('public/app/assets/img/illustrations/i6.png') }}"
                        srcset=" {{ url('public/app/assets/img/illustrations/i6@2x.png 2x') }}" alt="" /></figure>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
<section class="wrapper bg-light">
    <div class="container py-14 py-md-16 pb-md-17">
        <div class="row gx-md-5 gy-5 mt-n18 mt-md-n21 mb-14 mb-md-17">
            <div class="col-md-6 col-xl-3">
                <div class="card shadow-lg card-border-bottom border-soft-yellow">
                    <div class="card-body">
                        <img src=" {{ url('public/app/assets/img/icons/lineal/browser.svg') }}"
                            class="svg-inject icon-svg icon-svg-md text-yellow mb-3" alt="" />
                        <p class="mb-2">Whether you're a road warrior, Subcontractor, or in the office, EntreSuite can
                            help you stay on top of your day</p>
                        <a href="#" class="more hover link-yellow">Learn More</a>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
            </div>
            <!--/column -->
            <div class="col-md-6 col-xl-3">
                <div class="card shadow-lg card-border-bottom border-soft-green">
                    <div class="card-body">
                        <img src="{{ url('public/app/assets/img/icons/lineal/chat-2.svg') }}"
                            class="svg-inject icon-svg icon-svg-md text-green mb-3" alt="" />
                        <p class="mb-2">Contracts, eSignatures, workflows, marketing campaigns, calendars & scheduling
                            and so much more.</p>
                        <a href="#" class="more hover link-green">Learn More</a>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
            </div>
            <!--/column -->
            <div class="col-md-6 col-xl-3">
                <div class="card shadow-lg card-border-bottom border-soft-orange">
                    <div class="card-body">
                        <img src="{{ url('public/app/assets/img/icons/lineal/id-card.svg') }}"
                            class="svg-inject icon-svg icon-svg-md text-orange mb-3" alt="" />
                        <p class="mb-2">30 Days money back guarantee</p>
                        <a href="#" class="more hover link-orange">Learn More</a>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
            </div>
            <!--/column -->
            <div class="col-md-6 col-xl-3">
                <div class="card shadow-lg card-border-bottom border-soft-blue">
                    <div class="card-body">
                        <img src="{{ url('public/app/assets/img/icons/lineal/gift.svg') }}"
                            class="svg-inject icon-svg icon-svg-md text-blue mb-3" alt="" />
                        <p class="mb-2">Sign up today and if you’re not 100% satisfied, just cancel before your first 30
                            days and we will refund you. It's that simple! We want you to be happy with us!</p>
                        <a href="#" class="more hover link-blue">Learn More</a>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
        <div class="row gx-lg-8 gx-xl-12 gy-10 mb-14 mb-md-17 align-items-center">
            <div class="col-lg-7">
                <figure><img class="w-auto" src="{{ url('public/app/assets/img/illustrations/i8.png') }}"
                        srcset="{{ url('public/app/assets/img/illustrations/i8@2x.png 2x') }}" alt="" /></figure>
            </div>
            <!--/column -->
            <div class="col-lg-5">
                <h3 class="display-4 mb-7">Our key features includes:</h3>
                <div class="d-flex flex-row mb-3">
                    <div>
                        <span class="icon btn btn-circle btn-soft-primary pe-none me-5"><span
                                class="number fs-18">1</span></span>
                    </div>
                    <div>
                        <h4 class="mb-1">Invoicing</h4>
                        <p class="mb-0">Create custom branded invoices</p>
                    </div>
                </div>
                <div class="d-flex flex-row mb-3">
                    <div>
                        <span class="icon btn btn-circle btn-soft-primary pe-none me-5"><span
                                class="number fs-18">2</span></span>
                    </div>
                    <div>
                        <h4 class="mb-1">Client Scheduling tool</h4>
                        <p class="mb-0">Your Client can book their appointments with you or any member of your team
                            seamlessly</p>
                    </div>
                </div>
                <div class="d-flex flex-row mb-3">
                    <div>
                        <span class="icon btn btn-circle btn-soft-primary pe-none me-5"><span
                                class="number fs-18">3</span></span>
                    </div>
                    <div>
                        <h4 class="mb-1">Leads</h4>
                        <p class="mb-0">We’ve made it easy for you to capture and organize your leads</p>
                    </div>
                </div>
                <div class="d-flex flex-row mb-3">
                    <div>
                        <span class="icon btn btn-circle btn-soft-primary pe-none me-5"><span
                                class="number fs-18">4</span></span>
                    </div>
                    <div>
                        <h4 class="mb-1">Email Marketing</h4>
                        <p class="mb-0">Nurture those leads by creating marketing campaigns to stay in touch</p>
                    </div>
                </div>
                <div class="d-flex flex-row mb-3">
                    <div>
                        <span class="icon btn btn-circle btn-soft-primary pe-none me-5"><span
                                class="number fs-18">5</span></span>
                    </div>
                    <div>
                        <h4 class="mb-1">Projects & Task allocations</h4>
                        <p class="mb-0">Manage and assign projects to any member on your team</p>
                    </div>
                </div>
                <div class="d-flex flex-row mb-3">
                    <div>
                        <span class="icon btn btn-circle btn-soft-primary pe-none me-5"><span
                                class="number fs-18">6</span></span>
                    </div>
                    <div>
                        <h4 class="mb-1">Quotes & Contracts</h4>
                        <p class="mb-0">Create custom branded quotes and contracts for your customers</p>
                    </div>
                </div>
                <div class="d-flex flex-row mb-3">
                    <div>
                        <span class="icon btn btn-circle btn-soft-primary pe-none me-5"><span
                                class="number fs-18">7</span></span>
                    </div>
                    <div>
                        <h4 class="mb-1">eSignatures</h4>
                        <p class="mb-0">Send documents for secure signatures</p>
                    </div>
                </div>
                <div class="d-flex flex-row mb-3">
                    <div>
                        <span class="icon btn btn-circle btn-soft-primary pe-none me-5"><span
                                class="number fs-18">8</span></span>
                    </div>
                    <div>
                        <h4 class="mb-1">Video Conferencing</h4>
                        <p class="mb-0">Invite Customers to video meetings, record screens and more…</p>
                    </div>
                </div>
                <div class="d-flex flex-row mb-3">
                    <div>
                        <span class="icon btn btn-circle btn-soft-primary pe-none me-5"><span
                                class="number fs-18">9</span></span>
                    </div>
                    <div>
                        <h4 class="mb-1">Expense Tracking</h4>
                        <p class="mb-0">Stay on top of your expenses with this feature</p>
                    </div>
                </div>
                <div class="d-flex flex-row mb-3">
                    <div>
                        <span class="icon btn btn-circle btn-soft-primary pe-none me-5"><span
                                class="number fs-18">10</span></span>
                    </div>
                    <div>
                        <h4 class="mb-1">Forms</h4>
                        <p class="mb-0">Create custom branded client intake forms and more</p>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div>
                        <span class="icon btn btn-circle btn-soft-primary pe-none me-5"><span
                                class="number fs-18">11</span></span>
                    </div>
                    <div>
                        <h4 class="mb-1">Customization</h4>
                        <p class="mb-0">Customize your subscription with your company’s brand and logo to improve
                            customer experience</p>
                    </div>
                </div>
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
            <div class="col-lg-7 order-lg-2">
                <figure><img class="w-auto" src=" {{ url('public/app/assets/img/illustrations/i2.png') }}"
                        srcset=" {{ url('public/app/assets/img/illustrations/i2@2x.png 2x') }}" alt="" /></figure>
            </div>
            <!--/column -->
            <div class="col-lg-5">
                <h3 class="display-4 mb-7 mt-lg-10">Discover why entrepreneurs all over the world, choose EntreSuite to
                    run their business.</h3>
                <div class="accordion accordion-wrapper" id="accordionExample">
                    <div class="card plain accordion-item">
                        <div class="card-header" id="headingOne">
                            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Businesses</button>
                        </div>
                        <!--/.card-header -->
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Businesses of all types rely on us to make their day to day operations function
                                    seamlessly. EntreSuite CRM allows businesses to run more efficiently by using
                                    automated features, we are able to save over several hours per week by completely
                                    streamlining and managing workflow</p>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.accordion-collapse -->
                    </div>
                    <!--/.accordion-item -->
                    <div class="card plain accordion-item">
                        <div class="card-header" id="headingTwo">
                            <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">Coaches</button>
                        </div>
                        <!--/.card-header -->
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Coaches, accounting & financial services firms, law firms, beauty, industry
                                    professionals, event planners and 100s of others — run on EntreSuite CRM.</p>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.accordion-collapse -->
                    </div>
                    <!--/.accordion-item -->
                    <div class="card plain accordion-item">
                        <div class="card-header" id="headingThree">
                            <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">clients
                            </button>
                        </div>
                        <!--/.card-header -->
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>We provide clients with a custom branded portal which can be managed on web and
                                    mobile device.</p>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.accordion-collapse -->
                    </div>
                    <!--/.accordion-item -->
                </div>
                <!--/.accordion -->
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</section>
{{-- 
<section class="wrapper bg-light">
     
    <div class="container pt-14 pt-md-16">
        
        <div class="row text-center">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <h2 class="fs-16 text-uppercase text-muted mb-3">What We Do?</h2>
                <h3 class="display-4 mb-10 px-xl-10">The service we offer is specifically designed to meet your
                    needs.</h3>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="position-relative">
            <div class="shape rounded-circle bg-soft-blue rellax w-16 h-16" data-rellax-speed="1"
                style="bottom: -0.5rem; right: -2.2rem; z-index: 0;"></div>
            <div class="shape bg-dot primary rellax w-16 h-17" data-rellax-speed="1"
                style="top: -0.5rem; left: -2.5rem; z-index: 0;"></div>
            <div class="row gx-md-5 gy-5 text-center">
                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <img src="{{ url('public/app/assets/img/icons/lineal/search-2.svg') }}"
                                class="svg-inject icon-svg icon-svg-md text-yellow mb-3" alt="" />
                            <h4>lorem Services</h4>
                            <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore.</p>
                            <a href="#" class="more hover link-yellow">Learn More</a>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
                </div>
                <!--/column -->
                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <img src="{{ url('public/app/assets/img/icons/lineal/browser.svg') }}"
                                class="svg-inject icon-svg icon-svg-md text-red mb-3" alt="" />
                            <h4>lorem Design</h4>
                            <p class="mb-2">Nulla vitae elit libero, a pharetra augue. Donec id elit non mi
                                porta gravida at eget metus cras justo.</p>
                            <a href="#" class="more hover link-red">Learn More</a>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
                </div>
                <!--/column -->
                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <img src="{{ url('public/app/assets/img/icons/lineal/chat-2.svg') }}"
                                class="svg-inject icon-svg icon-svg-md text-green mb-3" alt="" />
                            <h4>lorem services </h4>
                            <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore.</p>
                            <a href="#" class="more hover link-green">Learn More</a>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
                </div>
                <!--/column -->
                <div class="col-md-6 col-xl-3">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <img src="{{ url('public/app/assets/img/icons/lineal/megaphone.svg') }}"
                                class="svg-inject icon-svg icon-svg-md text-blue mb-3" alt="" />
                            <h4>lorem servei </h4>
                            <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore</p>
                            <a href="#" class="more hover link-blue">Learn More</a>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
       
        <!-- /.position-relative -->
    </div>
    
    <!-- /.container -->
</section>
 --}}
<!-- /section -->
<section class="wrapper bg-gradient-reverse-primary">
    <div class="container py-16 py-md-18">
        <div class="row gx-lg-8 gx-xl-12 gy-10 mb-8 align-items-center">
            <div class="col-lg-7 order-lg-2">
                <figure><img class="w-auto" src="{{ url('public/app/assets/img/illustrations/i3.png') }}"
                        srcset="{{ url('public/app/assets/img/illustrations/i3@2x.png 2x') }}" alt="" /></figure>
            </div>
            <!--/column -->
            <div class="col-lg-5">
                <h2 class="fs-16 text-uppercase text-muted mb-3">Analyze Now</h2>
                <h3 class="display-4 mb-5">The average Entrepreneur/ small business</h3>
                <p class="mb-7">The average Entrepreneur/ small business uses 5 to 6 applications to run their business.
                    This means that they are paying several monthly subscriptions and are more likely to spend more time
                    toggling between these applications. EntreSuite will give them the tools they need to execute these
                    tasks more efficiently. The key features of the software includes: calendars/ scheduling, payments/
                    invoicing, tasks assignments and tracking, marketing campaigns, contracts, forms, eSignature
                    capabilities, expense tracking and more. We will package these features in the most cost-effective
                    way so that our clients can save on monthly subscriptions and potentially increase productivity</p>
                <div class="row">
                    <div class="col-lg-9">
                        <form action="#">
                            <div class="form-floating input-group">
                                <input type="url" class="form-control" placeholder="Enter Website URL" id="seo-check">
                                <label for="seo-check">Enter Website URL</label>
                                <button class="btn btn-primary" type="button">Check</button>
                            </div>
                        </form>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->

<section class="wrapper bg-light angled upper-start lower-start">
    <div class="container py-14 pt-md-17 pb-md-15">
        {{-- <div class="row gx-md-8 gx-xl-12 gy-10 mb-14 mb-md-18 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="card shadow-lg me-lg-6">
                    <div class="card-body p-6">
                        <div class="d-flex flex-row">
                            <div>
                                <span class="icon btn btn-circle btn-lg btn-soft-primary pe-none me-4"><span
                                        class="number">01</span></span>
                            </div>
                            <div>
                                <h4 class="mb-1">Collect Ideas</h4>
                                <p class="mb-0">Lorem ipsum dolor sit ametre</p>
                            </div>
                        </div>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
                <div class="card shadow-lg ms-lg-13 mt-6">
                    <div class="card-body p-6">
                        <div class="d-flex flex-row">
                            <div>
                                <span class="icon btn btn-circle btn-lg btn-soft-primary pe-none me-4"><span
                                        class="number">02</span></span>
                            </div>
                            <div>
                                <h4 class="mb-1">lorem Analysis</h4>
                                <p class="mb-0">Lorem ipsum dolor sit amet</p>
                            </div>
                        </div>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
                <div class="card shadow-lg mx-lg-6 mt-6">
                    <div class="card-body p-6">
                        <div class="d-flex flex-row">
                            <div>
                                <span class="icon btn btn-circle btn-lg btn-soft-primary pe-none me-4"><span
                                        class="number">03</span></span>
                            </div>
                            <div>
                                <h4 class="mb-1">lorem Product</h4>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
            </div>
            <!--/column -->
            <div class="col-lg-6">
                <h2 class="fs-16 text-uppercase text-muted mb-3">Our Strategy</h2>
                <h3 class="display-4 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, </h3>
                <p>sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur
                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <p class="mb-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore</p>
                <a href="#" class="btn btn-primary rounded-pill mb-0">Learn More</a>
            </div>
            <!--/column -->
        </div> --}}
        <!--/.row -->
        {{-- <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-22 mb-xl-24 align-items-center">
            <div class="col-lg-7">
                <figure><img class="w-auto" src="{{ url('public/app/assets/img/illustrations/i6.png') }}"
                        srcset="{{ url('public/app/assets/img/illustrations/i6@2x.png 2x') }}" alt="" /></figure>
            </div>
            <!--/column -->
            <div class="col-lg-5">
                <h2 class="fs-16 text-uppercase text-muted mb-3">Why Choose Us?</h2>
                <h3 class="display-4 mb-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore.</h3>
                <div class="accordion accordion-wrapper" id="accordionExample">
                    <div class="card plain accordion-item">
                        <div class="card-header" id="headingOne">
                            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Professional Design </button>
                        </div>
                        <!--/.card-header -->
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.accordion-collapse -->
                    </div>
                    <!--/.accordion-item -->
                    <div class="card plain accordion-item">
                        <div class="card-header" id="headingTwo">
                            <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo"> Top-Notch Support </button>
                        </div>
                        <!--/.card-header -->
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.accordion-collapse -->
                    </div>
                    <!--/.accordion-item -->
                    <div class="card plain accordion-item">
                        <div class="card-header" id="headingThree">
                            <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree"> Header and Slider Options
                            </button>
                        </div>
                        <!--/.card-header -->
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!--/.accordion-collapse -->
                    </div>
                    <!--/.accordion-item -->
                </div>
                <!--/.accordion -->
            </div>
            <!--/column -->
        </div> --}}
        <!--/.row -->
    </div>
    <!-- /.container -->
</section>


<!-- /section -->
<section class="wrapper bg-gradient-primary">
    <div class="container py-14 pt-md-16 pb-md-18">
        <div class="position-relative mt-8 mt-lg-n23 mt-xl-n25">
            <div class="row text-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6 mx-auto">
                    <h2 class="fs-16 text-uppercase text-muted mb-3">Our Team</h2>
                    {{-- <h3 class="display-4 mb-10 px-md-13 px-lg-4 px-xl-0">Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit</h3> --}}
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="position-relative">
                <div class="shape bg-dot blue rellax w-16 h-17" data-rellax-speed="1"
                    style="bottom: 0.5rem; right: -1.7rem; z-index: 0;"></div>
                <div class="shape rounded-circle bg-line red rellax w-16 h-16" data-rellax-speed="1"
                    style="top: 0.5rem; left: -1.7rem; z-index: 0;"></div>
                <div class="row grid-view gy-6 gy-xl-0">
                    <!--/column -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <img class="rounded-circle w-15 mb-4"
                                    src="{{ url('public/app/assets/img/avatars/te2.jpg') }}"
                                    srcset="{{ url('public/app/assets/img/avatars/te2@2x.jpg 2x') }}" alt="" />
                                <h4 class="mb-1">Dr. Shy</h4>
                                <div class="meta mb-2">CEO/ FOUNDER </div>
                                <p class="mb-2">Dr. Shy Courtney Is The Ceo/ Founder Of Entresuite Crm And The Winners
                                    Group Llc. A Financial Services Firm Located In Suwanee Ga.Dr. Shy'S Diverse Work
                                    Experience Also Includes, Start Up Coach/ Consultant To International Businesses,
                                    Sales Trainer To Saas Companies, Customer Success Business Development Development
                                    Manager.</p>
                                <nav class="nav social mb-0">
                                    <a href="#"><i class="uil uil-twitter"></i></a>
                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                    <a href="#"><i class="uil uil-dribbble"></i></a>
                                </nav>
                                <!-- /.social -->
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/column -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <img class="rounded-circle w-15 mb-4"
                                    src="{{ url('public/app/assets/img/avatars/te3.jpg') }}"
                                    srcset="{{ url('public/app/assets/img/avatars/te3@2x.jpg 2x') }}" alt="" />
                                <h4 class="mb-1">Raymond Saylor</h4>
                                <div class="meta mb-2">COMPANY'S CPA</div>
                                <p class="mb-2">Raymond Saylor Is The Company'S Cpa Who Has Been Practicing In His Field
                                    For Over 30 Years. He Has Been With The Firm Since Formation And Handles The
                                    Company'S Financials..</p>
                                <nav class="nav social mb-0">
                                    <a href="#"><i class="uil uil-twitter"></i></a>
                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                    <a href="#"><i class="uil uil-dribbble"></i></a>
                                </nav>
                                <!-- /.social -->
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/column -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <img class="rounded-circle w-15 mb-4"
                                    src="{{ url('public/app/assets/img/avatars/te4.jpg') }}"
                                    srcset="{{ url('public/app/assets/img/avatars/te4@2x.jpg 2x') }}" alt="" />
                                <h4 class="mb-1">Sarah Boorsma</h4>
                                <div class="meta mb-2">OPERATIONS MANAGER</div>
                                <p class="mb-2">Sarah Boorsma Is Our Operations Manager Who Has Also Been Working With
                                    The Winners Group Llc. Since Formation. She Oversees The Day To Day Operations Of
                                    The Company And Will Be A Key Part Of Building And Training Our Teams.</p>
                                <nav class="nav social mb-0">
                                    <a href="#"><i class="uil uil-twitter"></i></a>
                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                    <a href="#"><i class="uil uil-dribbble"></i></a>
                                </nav>
                                <!-- /.social -->
                            </div>
                            <!--/.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!-- /.position-relative -->
        </div>
        <!-- /div -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->

<!-- /section -->
<section class="wrapper bg-soft-primary">
    <div class="container py-14 pt-md-17 pb-md-20">
        <div class="row gx-lg-8 gx-xl-12 gy-10 gy-lg-0">
            <div class="col-lg-4 text-center text-lg-start">
                <h3 class="display-4 mb-3 pe-xl-15">We are proud of our works</h3>
                <p class="lead fs-lg mb-0 pe-xxl-10">We bring solutions to make life easier for our customers.
                </p>
            </div>
            <!-- /column -->
            <div class="col-lg-8 mt-lg-2">
                <div class="row align-items-center counter-wrapper gy-6 text-center">
                    <div class="col-md-4">
                        <img src="{{ url('public/app/assets/img/icons/lineal/check.svg') }}"
                            class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                        <h3 class="counter">7518</h3>
                        <p>Completed Projects</p>
                    </div>
                    <!--/column -->
                    <div class="col-md-4">
                        <img src="{{ url('public/app/assets/img/icons/lineal/user.svg') }}"
                            class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                        <h3 class="counter">3472</h3>
                        <p>Happy Customers</p>
                    </div>
                    <!--/column -->
                    <div class="col-md-4">
                        <img src="{{ url('public/app/assets/img/icons/lineal/briefcase-2.svg') }}"
                            class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                        <h3 class="counter">2184</h3>
                        <p>Expert Employees</p>
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section class="wrapper bg-light">
    <div class="container py-14 py-md-16 pb-md-0">
        <div class="grid mb-14 mb-md-18 mt-3">
            <div class="row isotope gy-6 mt-n19 mt-md-n22" style="position: relative; height: 372.7px;">
                <div class="item col-md-6 col-xl-3" style="position: absolute; left: 0%; top: 0px;">
                    <div class="card shadow-lg card-border-bottom border-soft-primary">
                        <div class="card-body">
                            <span class="ratings five mb-3"></span>
                            <blockquote class="icon mb-0">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore.”</p>
                                <div class="blockquote-details">
                                    <div class="info ps-0">
                                        <h5 class="mb-1">Coriss Ambady</h5>
                                        <p class="mb-0">Financial Analyst</p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/column -->
                <div class="item col-md-6 col-xl-3" style="position: absolute; left: 25%; top: 0px;">
                    <div class="card shadow-lg card-border-bottom border-soft-primary">
                        <div class="card-body">
                            <span class="ratings five mb-3"></span>
                            <blockquote class="icon mb-0">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore.”</p>
                                <div class="blockquote-details">
                                    <div class="info ps-0">
                                        <h5 class="mb-1">Cory Zamora</h5>
                                        <p class="mb-0">Marketing Specialist</p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/column -->
                <div class="item col-md-6 col-xl-3" style="position: absolute; left: 50%; top: 0px;">
                    <div class="card shadow-lg card-border-bottom border-soft-primary">
                        <div class="card-body">
                            <span class="ratings five mb-3"></span>
                            <blockquote class="icon mb-0">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore”</p>
                                <div class="blockquote-details">
                                    <div class="info ps-0">
                                        <h5 class="mb-1">Nikolas Brooten</h5>
                                        <p class="mb-0">Sales Manager</p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/column -->
                <div class="item col-md-6 col-xl-3" style="position: absolute; left: 75%; top: 0px;">
                    <div class="card shadow-lg card-border-bottom border-soft-primary">
                        <div class="card-body">
                            <span class="ratings five mb-3"></span>
                            <blockquote class="icon mb-0">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore.”</p>
                                <div class="blockquote-details">
                                    <div class="info ps-0">
                                        <h5 class="mb-1">Coriss Ambady</h5>
                                        <p class="mb-0">Financial Analyst</p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.grid-view -->

        <!-- /.projects-tiles -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
@endsection

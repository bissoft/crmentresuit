@extends('layouts.app')

@section('content')
<section class="wrapper bg-soft-primary">
  <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
    <div class="row">
      <div class="col-md-7 col-lg-6 col-xl-5 mx-auto">
        <h1 class="display-1 mb-3">Business News</h1>
        <p class="lead px-lg-5 px-xxl-8">
          Welcome to our journal. Here you can find the latest company
          news and business articles.
        </p>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->
<section class="wrapper bg-light">
  <div class="container pb-14 pb-md-16">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="blog classic-view mt-n17">
          @foreach ($b_4 as $item)
              <article class="post">
            <div class="card">
              <figure class="card-img-top overlay overlay-1 hover-scale">
                <a class="link-dark" href="/{{$item->slug ?? ''}}"><img src="{{$item->image ?? ''}}" alt="" /></a>
                <figcaption>
                  <h5 class="from-top mb-0">Read More</h5>
                </figcaption>
              </figure>
              <div class="card-body">
                <div class="post-header">
                  {{-- <div class="post-category text-line">
                    <a href="#" class="hover" rel="category">Teamwork</a>
                  </div> --}}
                  <!-- /.post-category -->
                  <h2 class="post-title mt-1 mb-0">
                    <a class="link-dark" href="/{{$item->slug ?? ''}}">{{$item->title ?? ''}}</a>
                  </h2>
                </div>
                <!-- /.post-header -->
                <div class="post-content">
                  <p>
                    {{$item->description ?? ''}}
                  </p>
                </div>
                <!-- /.post-content -->
              </div>
              <!--/.card-body -->
              <div class="card-footer">
                <ul class="post-meta d-flex mb-0">
                  <li class="post-date">
                    <i class="uil uil-calendar-alt"></i><span>{{date('d M y',strtotime($item->created_at))}}</span>
                  </li>
                  {{-- <li class="post-author">
                    <a href="#"><i class="uil uil-user"></i><span>By lorem</span></a>
                  </li> --}}
                  {{-- <li class="post-comments">
                    <a href="#"><i class="uil uil-comment"></i>3<span>
                        Comments</span></a>
                  </li>
                  <li class="post-likes ms-auto">
                    <a href="#"><i class="uil uil-heart-alt"></i>3</a>
                  </li> --}}
                </ul>
                <!-- /.post-meta -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </article>
          @endforeach
          
          {{-- <article class="post">
            <div class="card">
              <figure class="card-img-top overlay overlay-1 hover-scale">
                <a class="link-dark" href="/blog-detail"><img src="assets/img/photos/b1.jpg" alt="" /></a>
                <figcaption>
                  <h5 class="from-top mb-0">Read More</h5>
                </figcaption>
              </figure>
              <div class="card-body">
                <div class="post-header">
                  <div class="post-category text-line">
                    <a href="#" class="hover" rel="category">Teamwork</a>
                  </div>
                  <!-- /.post-category -->
                  <h2 class="post-title mt-1 mb-0">
                    <a class="link-dark" href="/blog-detail">Lorem ipsum dolor sit amet consectetur.</a>
                  </h2>
                </div>
                <!-- /.post-header -->
                <div class="post-content">
                  <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing
                    elit. Laudantium saepe cum aperiam minus nulla et
                    consequatur ad labore magnam, error, esse consectetur
                    voluptate? Magni libero deleniti ducimus consectetur
                    cupiditate perferendis.
                  </p>
                </div>
                <!-- /.post-content -->
              </div>
              <!--/.card-body -->
              <div class="card-footer">
                <ul class="post-meta d-flex mb-0">
                  <li class="post-date">
                    <i class="uil uil-calendar-alt"></i><span>5 Jul 2022</span>
                  </li>
                  <li class="post-author">
                    <a href="#"><i class="uil uil-user"></i><span>By lorem</span></a>
                  </li>
                  <li class="post-comments">
                    <a href="#"><i class="uil uil-comment"></i>3<span>
                        Comments</span></a>
                  </li>
                  <li class="post-likes ms-auto">
                    <a href="#"><i class="uil uil-heart-alt"></i>3</a>
                  </li>
                </ul>
                <!-- /.post-meta -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </article>
          <article class="post">
            <div class="card">
              <figure class="card-img-top overlay overlay-1 hover-scale">
                <a class="link-dark" href="/blog-detail"><img src="assets/img/photos/b1.jpg" alt="" /></a>
                <figcaption>
                  <h5 class="from-top mb-0">Read More</h5>
                </figcaption>
              </figure>
              <div class="card-body">
                <div class="post-header">
                  <div class="post-category text-line">
                    <a href="#" class="hover" rel="category">Teamwork</a>
                  </div>
                  <!-- /.post-category -->
                  <h2 class="post-title mt-1 mb-0">
                    <a class="link-dark" href="/blog-detail">Lorem ipsum dolor sit amet consectetur.</a>
                  </h2>
                </div>
                <!-- /.post-header -->
                <div class="post-content">
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Inventore provident error odit excepturi
                    consequatur dicta vero voluptatem dolorum fugit
                    consequuntur, perspiciatis omnis nulla quasi dolores
                    ipsum eius, accusamus reprehenderit. Maxime.
                  </p>
                </div>
                <!-- /.post-content -->
              </div>
              <!--/.card-body -->
              <div class="card-footer">
                <ul class="post-meta d-flex mb-0">
                  <li class="post-date">
                    <i class="uil uil-calendar-alt"></i><span>5 Jul 2022</span>
                  </li>
                  <li class="post-author">
                    <a href="#"><i class="uil uil-user"></i><span>By lorem</span></a>
                  </li>
                  <li class="post-comments">
                    <a href="#"><i class="uil uil-comment"></i>3<span>
                        Comments</span></a>
                  </li>
                  <li class="post-likes ms-auto">
                    <a href="#"><i class="uil uil-heart-alt"></i>3</a>
                  </li>
                </ul>
                <!-- /.post-meta -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </article> --}}
          <!-- /.post -->

          {{-- <!-- /.post -->
          <article class="post">
            <div class="card">
              <div class="card-img-top">
                <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="j_Y2Gwaj7Gs"></div>
              </div>
              <div class="card-body">
                <div class="post-header">
                  <div class="post-category text-line">
                    <a href="#" class="hover" rel="category">Workspace</a>
                  </div>
                  <!-- /.post-category -->
                  <h2 class="post-title mt-1 mb-0">
                    <a class="link-dark" href="/blog-detail">Lorem ipsum dolor sit amet consectetur.</a>
                  </h2>
                </div>
                <!-- /.post-header -->
                <div class="post-content">
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Consequatur atque sunt corrupti voluptatum et,
                    magni sit inventore eaque consequuntur eligendi
                    possimus ab cumque illum ad consectetur labore
                    doloribus perspiciatis neque.
                  </p>
                </div>
                <!-- /.post-content -->
              </div>
              <!--/.card-body -->
              <div class="card-footer">
                <ul class="post-meta d-flex mb-0">
                  <li class="post-date">
                    <i class="uil uil-calendar-alt"></i><span>18 May 2022</span>
                  </li>
                  <li class="post-author">
                    <a href="#"><i class="uil uil-user"></i><span>By lorem</span></a>
                  </li>
                  <li class="post-comments">
                    <a href="#"><i class="uil uil-comment"></i>8<span>
                        Comments</span></a>
                  </li>
                  <li class="post-likes ms-auto">
                    <a href="#"><i class="uil uil-heart-alt"></i>6</a>
                  </li>
                </ul>
                <!-- /.post-meta -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </article>
          <!-- /.post --> --}}
        </div>
        <!-- /.blog -->
        <div class="blog grid grid-view">
          <div class="row isotope gx-md-8 gy-8 mb-8">
            @foreach ($blog as $item)
                <article class="item post col-md-6">
              <div class="card">
                <figure class="card-img-top overlay overlay-1 hover-scale">
                  <a href="/{{$item->slug ?? ''}}">
                    <img src="{{$item->image ?? ''}}" alt="" /></a>
                  <figcaption>
                    <h5 class="from-top mb-0">Read More</h5>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <div class="post-header">
                    {{-- <div class="post-category text-line">
                      <a href="#" class="hover" rel="category">lorem</a>
                    </div> --}}
                    <!-- /.post-category -->
                    <h2 class="post-title h3 mt-1 mb-3">
                      <a class="link-dark" href="/{{$item->slug ?? ''}}">{{$item->title ?? ''}}</a>
                    </h2>
                  </div>
                  <!-- /.post-header -->
                  <div class="post-content">
                    <p>
                     {{$item->description ?? ''}}
                    </p>
                  </div>
                  <!-- /.post-content -->
                </div>
                <!--/.card-body -->
                <div class="card-footer">
                  <ul class="post-meta d-flex mb-0">
                    <li class="post-date">
                      <i class="uil uil-calendar-alt"></i><span>{{date('d M y',strtotime($item->created_at))}}</span>
                    </li>
                    {{-- <li class="post-comments">
                      <a href="#"><i class="uil uil-comment"></i>4</a>
                    </li>
                    <li class="post-likes ms-auto">
                      <a href="#"><i class="uil uil-heart-alt"></i>5</a>
                    </li> --}}
                  </ul>
                  <!-- /.post-meta -->
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </article>
            <!-- /.post -->
            @endforeach
            
            {{-- <article class="item post col-md-6">
              <div class="card">
                <figure class="card-img-top overlay overlay-1 hover-scale">
                  <a href="#">
                    <img src="assets/img/photos/b5.jpg" alt="" /></a>
                  <figcaption>
                    <h5 class="from-top mb-0">Read More</h5>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <div class="post-header">
                    <div class="post-category text-line">
                      <a href="#" class="hover" rel="category">lorem</a>
                    </div>
                    <!-- /.post-category -->
                    <h2 class="post-title h3 mt-1 mb-3">
                      <a class="link-dark" href="/blog-detail">Lorem ipsum dolor sit.</a>
                    </h2>
                  </div>
                  <!-- /.post-header -->
                  <div class="post-content">
                    <p>
                      Lorem ipsum dolor sit, amet consectetur adipisicing
                      elit. Asperiores beatae vitae quidem ipsum assumenda
                      aut totam cumque, deserunt neque! Omnis nesciunt
                      praesentium a earum nostrum totam quis blanditiis,
                      atque doloribus?
                    </p>
                  </div>
                  <!-- /.post-content -->
                </div>
                <!--/.card-body -->
                <div class="card-footer">
                  <ul class="post-meta d-flex mb-0">
                    <li class="post-date">
                      <i class="uil uil-calendar-alt"></i><span>29 Mar 2022</span>
                    </li>
                    <li class="post-comments">
                      <a href="#"><i class="uil uil-comment"></i>3</a>
                    </li>
                    <li class="post-likes ms-auto">
                      <a href="#"><i class="uil uil-heart-alt"></i>3</a>
                    </li>
                  </ul>
                  <!-- /.post-meta -->
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </article>
            <!-- /.post -->
            <article class="item post col-md-6">
              <div class="card">
                <figure class="card-img-top overlay overlay-1 hover-scale">
                  <a href="#">
                    <img src="assets/img/photos/b6.jpg" alt="" /></a>
                  <figcaption>
                    <h5 class="from-top mb-0">Read More</h5>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <div class="post-header">
                    <div class="post-category text-line">
                      <a href="#" class="hover" rel="category">lorem</a>
                    </div>
                    <!-- /.post-category -->
                    <h2 class="post-title h3 mt-1 mb-3">
                      <a class="link-dark" href="/blog-detail">Lorem, ipsum dolor.</a>
                    </h2>
                  </div>
                  <!-- /.post-header -->
                  <div class="post-content">
                    <p>
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Nam voluptatum optio aliquam temporibus
                      commodi ipsum enim quae dolores vel non deserunt
                      sequi officia labore necessitatibus ea recusandae
                      soluta, voluptatem maxime.
                    </p>
                  </div>
                  <!-- /.post-content -->
                </div>
                <!--/.card-body -->
                <div class="card-footer">
                  <ul class="post-meta d-flex mb-0">
                    <li class="post-date">
                      <i class="uil uil-calendar-alt"></i><span>26 Feb 2022</span>
                    </li>
                    <li class="post-comments">
                      <a href="#"><i class="uil uil-comment"></i>6</a>
                    </li>
                    <li class="post-likes ms-auto">
                      <a href="#"><i class="uil uil-heart-alt"></i>3</a>
                    </li>
                  </ul>
                  <!-- /.post-meta -->
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </article>
            <!-- /.post -->
            <article class="item post col-md-6">
              <div class="card">
                <figure class="card-img-top overlay overlay-1 hover-scale">
                  <a href="#">
                    <img src="assets/img/photos/b7.jpg" alt="" /></a>
                  <figcaption>
                    <h5 class="from-top mb-0">Read More</h5>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <div class="post-header">
                    <div class="post-category text-line">
                      <a href="#" class="hover" rel="category"> lorem</a>
                    </div>
                    <!-- /.post-category -->
                    <h2 class="post-title h3 mt-1 mb-3">
                      <a class="link-dark" href="/blog-detail">Lorem ipsum dolor sit amet .</a>
                    </h2>
                  </div>
                  <div class="post-content">
                    <p>
                      Lorem ipsum dolor sit amet consectetur, adipisicing
                      elit. Explicabo sint, adipisci accusantium
                      voluptates molestias voluptatibus dolores sunt
                      voluptas quia autem minus nisi tempore sapiente
                      repudiandae quae temporibus? Beatae, ducimus
                      deleniti?
                    </p>
                  </div>
                  <!-- /.post-content -->
                </div>
                <!--/.card-body -->
                <div class="card-footer">
                  <ul class="post-meta d-flex mb-0">
                    <li class="post-date">
                      <i class="uil uil-calendar-alt"></i><span>7 Jan 2022</span>
                    </li>
                    <li class="post-comments">
                      <a href="#"><i class="uil uil-comment"></i>2</a>
                    </li>
                    <li class="post-likes ms-auto">
                      <a href="#"><i class="uil uil-heart-alt"></i>5</a>
                    </li>
                  </ul>
                  <!-- /.post-meta -->
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </article>
            <!-- /.post --> --}}
          </div>
          <!-- /.row -->
        </div>
        <!-- /.blog -->
        <nav class="d-flex" aria-label="pagination">
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true"><i class="uil uil-arrow-left"></i></span>
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true"><i class="uil uil-arrow-right"></i></span>
              </a>
            </li>
          </ul>
          <!-- /.pagination -->
        </nav>
        <!-- /nav -->
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>


@endsection

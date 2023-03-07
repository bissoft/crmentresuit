@extends('layouts.app')

@section('content')
<section class="wrapper bg-soft-primary">
  <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
    <div class="row">
      <div class="col-md-10 col-xl-8 mx-auto">
        <div class="post-header">
          {{-- <div class="post-category text-line">
            <a href="#" class="hover" rel="category">Teamwork</a>
          </div> --}}
          <!-- /.post-category -->
          <h1 class="display-1 mb-4">
            {{$blog->title ?? ''}}
          </h1>
          <ul class="post-meta mb-5">
            <li class="post-date">
              <i class="uil uil-calendar-alt"></i><span>{{date('d M y',strtotime($blog->created_at ?? ''))}}</span>
            </li>
            {{-- <li class="post-author">
              <a href="#"><i class="uil uil-user"></i><span>By lorem</span></a>
            </li>
            <li class="post-comments">
              <a href="#"><i class="uil uil-comment"></i>3<span> Comments</span></a>
            </li>
            <li class="post-likes">
              <a href="#"><i class="uil uil-heart-alt"></i>3<span> Likes</span></a>
            </li> --}}
          </ul>
          <!-- /.post-meta -->
        </div>
        <!-- /.post-header -->
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
        <div class="blog single mt-n17">
          <div class="card">
            <figure class="card-img-top">
              <img src="{{$blog->image ?? ''}}" alt="" />
            </figure>
            <div class="card-body">
              <div class="classic-view">
                <article class="post">
                  <div class="post-content mb-5">
               {!! $blog->detail ?? '' !!}
                  </div>
                  <!-- /.post-content -->
                  <div class="post-footer d-md-flex flex-md-row justify-content-md-between align-items-center mt-8">
                    <div>
                      <ul class="list-unstyled tag-list mb-0">
                        {{-- <li>
                          <a href="#" class="btn btn-soft-ash btn-sm rounded-pill mb-0">Still Life</a>
                        </li>
                        <li>
                          <a href="#" class="btn btn-soft-ash btn-sm rounded-pill mb-0">Urban</a>
                        </li>
                        <li>
                          <a href="#" class="btn btn-soft-ash btn-sm rounded-pill mb-0">Nature</a>
                        </li> --}}
                      </ul>
                    </div>
                    <div class="mb-0 mb-md-2">
                      <div class="dropdown share-dropdown btn-group">
                        <button
                          class="btn btn-sm btn-red rounded-pill btn-icon btn-icon-start dropdown-toggle mb-0 me-0"
                          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="uil uil-share-alt"></i> Share
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#"><i class="uil uil-twitter"></i>Twitter</a>
                          <a class="dropdown-item" href="#"><i class="uil uil-facebook-f"></i>Facebook</a>
                          <a class="dropdown-item" href="#"><i class="uil uil-linkedin"></i>Linkedin</a>
                        </div>
                        <!--/.dropdown-menu -->
                      </div>
                      <!--/.share-dropdown -->
                    </div>
                  </div>
                  <!-- /.post-footer -->
                </article>
                <!-- /.post -->
              </div>
              <!-- /.classic-view -->
              {{-- <hr />
              <div class="author-info d-md-flex align-items-center mb-3">
                <div class="d-flex align-items-center">
                  <figure class="user-avatar">
                    <img class="rounded-circle" alt="" src="assets/img/avatars/u5.jpg" />
                  </figure>
                  <div>
                    <h6>
                      <a href="#" class="link-dark">Nikolas Brooten</a>
                    </h6>
                    <span class="post-meta fs-15">Sales Manager</span>
                  </div>
                </div>
                <div class="mt-3 mt-md-0 ms-auto">
                  <a href="#" class="btn btn-sm btn-soft-ash rounded-pill btn-icon btn-icon-start mb-0"><i
                      class="uil uil-file-alt"></i> All Posts</a>
                </div>
              </div> --}}
              <!-- /.author-info -->
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Tenetur ipsam optio libero!
              </p>
              <nav class="nav social">
                <a href="#"><i class="uil uil-twitter"></i></a>
                <a href="#"><i class="uil uil-facebook-f"></i></a>
                <a href="#"><i class="uil uil-dribbble"></i></a>
                <a href="#"><i class="uil uil-instagram"></i></a>
                <a href="#"><i class="uil uil-youtube"></i></a>
              </nav>
              <!-- /.social -->
              <hr />
              <h3 class="mb-6">You Might Also Like</h3>
              <div class="swiper-container blog grid-view mb-16" data-margin="30" data-dots="true" data-items-md="2"
                data-items-xs="1">
                <div class="swiper">
                  <div class="swiper-wrapper">
                    @foreach ($b_4 as $item)
                         <div class="swiper-slide">
                      <article>
                        <figure class="overlay overlay-1 hover-scale rounded mb-5">
                          <a href="#">
                            <img src="{{$item->image ?? ''}}" alt="" /></a>
                          <figcaption>
                            <h5 class="from-top mb-0">Read More</h5>
                          </figcaption>
                        </figure>
                        <div class="post-header">
                          {{-- <div class="post-category text-line">
                            <a href="#" class="hover" rel="category">Coding</a>
                          </div> --}}
                          <!-- /.post-category -->
                          <h2 class="post-title h3 mt-1 mb-3">
                            <a class="link-dark" href="#">{{$item->title ?? ''}}</a>
                          </h2>
                        </div>
                        <!-- /.post-header -->
                        <div class="post-footer">
                          <ul class="post-meta mb-0">
                            <li class="post-date">
                              <i class="uil uil-calendar-alt"></i><span>{{date('d M y',strtotime($item->created_at))}}</span>
                            </li>
                            {{-- <li class="post-comments">
                              <a href="#"><i class="uil uil-comment"></i>4</a>
                            </li> --}}
                          </ul>
                          <!-- /.post-meta -->
                        </div>
                        <!-- /.post-footer -->
                      </article>
                      <!-- /article -->
                    </div>
                    @endforeach
                   
             
                    <!--/.swiper-slide -->
                  </div>
                  <!--/.swiper-wrapper -->
                </div>
                <!-- /.swiper -->
              </div>
              <!-- /.swiper-container -->
              <hr />
              {{-- <div id="comments">
                <h3 class="mb-6">5 Comments</h3>
                <ol id="singlecomments" class="commentlist">
                  <li class="comment">
                    <div class="comment-header d-md-flex align-items-center">
                      <div class="d-flex align-items-center">
                        <figure class="user-avatar">
                          <img class="rounded-circle" alt="" src="assets/img/avatars/u1.jpg" />
                        </figure>
                        <div>
                          <h6 class="comment-author">
                            <a href="#" class="link-dark">Connor Gibson</a>
                          </h6>
                          <ul class="post-meta">
                            <li>
                              <i class="uil uil-calendar-alt"></i>14 Jan
                              2022
                            </li>
                          </ul>
                          <!-- /.post-meta -->
                        </div>
                        <!-- /div -->
                      </div>
                      <!-- /div -->
                      <div class="mt-3 mt-md-0 ms-auto">
                        <a href="#" class="btn btn-soft-ash btn-sm rounded-pill btn-icon btn-icon-start mb-0"><i
                            class="uil uil-comments"></i> Reply</a>
                      </div>
                      <!-- /div -->
                    </div>
                    <!-- /.comment-header -->
                    <p>
                      Lorem ipsum, dolor sit amet consectetur adipisicing
                      elit. Suscipit alias eveniet ex illum sed
                      necessitatibus, nostrum adipisci ab incidunt soluta
                      recusandae delectus, itaque repellendus. Cum
                      exercitationem quasi a officiis voluptatibus?
                    </p>
                  </li>
                  <li class="comment">
                    <div class="comment-header d-md-flex align-items-center">
                      <div class="d-flex align-items-center">
                        <figure class="user-avatar">
                          <img class="rounded-circle" alt="" src="assets/img/avatars/u2.jpg" />
                        </figure>
                        <div>
                          <h6 class="comment-author">
                            <a href="#" class="link-dark">Nikolas Brooten</a>
                          </h6>
                          <ul class="post-meta">
                            <li>
                              <i class="uil uil-calendar-alt"></i>21 Feb
                              2022
                            </li>
                          </ul>
                          <!-- /.post-meta -->
                        </div>
                        <!-- /div -->
                      </div>
                      <!-- /div -->
                      <div class="mt-3 mt-md-0 ms-auto">
                        <a href="#" class="btn btn-soft-ash btn-sm rounded-pill btn-icon btn-icon-start mb-0"><i
                            class="uil uil-comments"></i> Reply</a>
                      </div>
                      <!-- /div -->
                    </div>
                    <!-- /.comment-header -->
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing
                      elit. Explicabo saepe accusantium libero ratione
                      facere, similique facilis ex? Reiciendis officiis
                      reprehenderit praesentium magnam, iure placeat
                      accusamus eos accusantium? Nostrum, odit neque.
                    </p>
                    <ul class="children">
                      <li class="comment">
                        <div class="comment-header d-md-flex align-items-center">
                          <div class="d-flex align-items-center">
                            <figure class="user-avatar">
                              <img class="rounded-circle" alt="" src="assets/img/avatars/u3.jpg" />
                            </figure>
                            <div>
                              <h6 class="comment-author">
                                <a href="#" class="link-dark">Pearce Frye</a>
                              </h6>
                              <ul class="post-meta">
                                <li>
                                  <i class="uil uil-calendar-alt"></i>22
                                  Feb 2022
                                </li>
                              </ul>
                              <!-- /.post-meta -->
                            </div>
                            <!-- /div -->
                          </div>
                          <!-- /div -->
                          <div class="mt-3 mt-md-0 ms-auto">
                            <a href="#" class="btn btn-soft-ash btn-sm rounded-pill btn-icon btn-icon-start mb-0"><i
                                class="uil uil-comments"></i> Reply</a>
                          </div>
                          <!-- /div -->
                        </div>
                        <!-- /.comment-header -->
                        <p>
                          Lorem ipsum dolor sit amet consectetur
                          adipisicing elit. Aperiam, officia iusto.
                          Provident fuga cupiditate velit fugit quam?
                          Necessitatibus aut nulla sed voluptatum quaerat
                          tempore deleniti consequatur explicabo. Alias,
                          ut! Fugiat!
                        </p>
                        <ul class="children">
                          <li class="comment">
                            <div class="comment-header d-md-flex align-items-center">
                              <div class="d-flex align-items-center">
                                <figure class="user-avatar">
                                  <img class="rounded-circle" alt="" src="assets/img/avatars/u2.jpg" />
                                </figure>
                                <div>
                                  <h6 class="comment-author">
                                    <a href="#" class="link-dark">Nikolas Brooten</a>
                                  </h6>
                                  <ul class="post-meta">
                                    <li>
                                      <i class="uil uil-calendar-alt"></i>4 Apr 2022
                                    </li>
                                  </ul>
                                  <!-- /.post-meta -->
                                </div>
                                <!-- /div -->
                              </div>
                              <!-- /div -->
                              <div class="mt-3 mt-md-0 ms-auto">
                                <a href="#"
                                  class="btn btn-soft-ash btn-sm rounded-pill btn-icon btn-icon-start mb-0"><i
                                    class="uil uil-comments"></i>
                                  Reply</a>
                              </div>
                              <!-- /div -->
                            </div>
                            <!-- /.comment-header -->
                            <p>
                              Lorem ipsum, dolor sit amet consectetur
                              adipisicing elit. Mollitia harum magni
                              voluptas animi alias cum, soluta sunt unde?
                              Sunt illum hic repellat voluptas minus quis,
                              nisi optio at non harum!
                            </p>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="comment">
                    <div class="comment-header d-md-flex align-items-center">
                      <div class="d-flex align-items-center">
                        <figure class="user-avatar">
                          <img class="rounded-circle" alt="" src="assets/img/avatars/u4.jpg" />
                        </figure>
                        <div>
                          <h6 class="comment-author">
                            <a href="#" class="link-dark">Lou Bloxham</a>
                          </h6>
                          <ul class="post-meta">
                            <li>
                              <i class="uil uil-calendar-alt"></i>3 May
                              2022
                            </li>
                          </ul>
                          <!-- /.post-meta -->
                        </div>
                        <!-- /div -->
                      </div>
                      <!-- /div -->
                      <div class="mt-3 mt-md-0 ms-auto">
                        <a href="#" class="btn btn-soft-ash btn-sm rounded-pill btn-icon btn-icon-start mb-0"><i
                            class="uil uil-comments"></i> Reply</a>
                      </div>
                      <!-- /div -->
                    </div>
                    <!-- /.comment-header -->
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing
                      elit. Tenetur, asperiores perferendis. Qui
                      perferendis quam minus vel necessitatibus
                      architecto, libero id exercitationem, tempore rerum
                      esse. Tempora culpa veritatis mollitia at eius?
                    </p>
                  </li>
                </ol>
              </div>
              <!-- /#comments -->
              <hr />
              <h3 class="mb-3">Would you like to share your thoughts?</h3>
              <p class="mb-7">
                Your email address will not be published. Required fields
                are marked *
              </p>
              <form class="comment-form">
                <div class="form-floating mb-4">
                  <input type="text" class="form-control" placeholder="Name*" id="c-name" />
                  <label for="c-name">Name *</label>
                </div>
                <div class="form-floating mb-4">
                  <input type="email" class="form-control" placeholder="Email*" id="c-email" />
                  <label for="c-email">Email*</label>
                </div>
                <div class="form-floating mb-4">
                  <input type="text" class="form-control" placeholder="Website" id="c-web" />
                  <label for="c-web">Website</label>
                </div>
                <div class="form-floating mb-4">
                  <textarea name="textarea" class="form-control" placeholder="Comment"
                    style="height: 150px;"></textarea>
                  <label>Comment *</label>
                </div>
                <button type="submit" class="btn btn-primary rounded-pill mb-0">
                  Submit
                </button>
              </form>
              <!-- /.comment-form --> --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.blog -->
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->


@endsection

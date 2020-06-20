@extends('public.layouts.app')

@section('content')

  <!-- =====  BANNER STRAT  ===== -->
  <div class="breadcrumb">
    <h1>{{$blog->title}}</h1>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/blog">blog</a></li>
      <li class="active">{{$blog->title}}</li>
    </ul>
  </div>
  <!-- =====  BREADCRUMB END===== -->
  <!-- =====  CONTAINER START  ===== -->
  <div class="container">
    <div class="row ">
      <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs">
        {{-- <div class="left_banner left-sidebar-widget mb_40"> <a href="#"><img src="images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div> --}}
        <div class="left-blog left-sidebar-widget mb_50">
          <div class="heading-part mb_20 ">
            <h2 class="sub_title">Latest Post</h2>
          </div>
          <div id="left-blog">
            <div class="row ">
                @foreach ($all_blogs as $b)
                    <div class="blog-item mb_20">
                        <div class="post-format col-xs-5">
                        <div class="thumb post-img"><a href="/blog/{{$b->link}}"> <img src="{{ asset("storage/pictures/$b->picture")}}"  alt="Creona"></a></div>
                        </div>
                        <div class="post-info col-xs-7">
                        <h5> <a href="/blog/{{$b->link}}">{{$b->title}}</a> </h5>
                        <div class="date pull-left"> <i class="fa fa-calendar" aria-hidden="true"></i>{{$b->created_at}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-8 col-md-8 col-lg-9 mb_30">
        <div class="row">
          <div class="blog-item listing-effect col-md-12 mb_50">
            <div class="post-format">
              <div class="thumb post-img"><a href="{{ asset("storage/pictures/$blog->picture")}}" title="Beautiful Lady" target="_blank"> <img src="{{ asset("storage/pictures/$blog->picture")}}"  alt="Batota"></a></div>
              <div class="post-type"> <i class="fa fa-picture-o" aria-hidden="true"></i> </div>
            </div>
            <div class="post-info mtb_20 ">
              <h2 class="mb_10"> <a  class="main_title" href="#">{{$blog->title}}</a> </h2>
              <p>{!! $blog->details !!}</p>
            </div>
            <div class="details mtb_20">
              <div class="date"> <i class="fa fa-calendar" aria-hidden="true"></i>{{$blog->created_at}}</div>
            </div>
            {{-- <div class="author-about mt_50">
              <h3 class="main_title author-about-title">About the Author</h3>
              <div class="author mtb_30">
                <div class="author-avatar"> <img alt="" src="images/user1.jpg"></div>
                <div class="author-body">
                  <h5 class="author-name"><a class="sub_title" href="#">Radley Lobortis</a></h5>
                  <div class="author-content mt_10">Vivamus imperdiet ex sed lobortis luctus. Aenean posuere nulla in turluctus. Aenean posuere nulla in tur pis porttitor laoreet. Quisque finibus aliquet purus. Ut et mi eu ante interdum .</div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Single Blog  -->

@endsection
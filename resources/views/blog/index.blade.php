@extends('public.layouts.app')

@section('content')
    <!-- =====  BANNER STRAT  ===== -->
  <div class="breadcrumb">
    <h1>Blog</h1>
    <ul>
      <li><a href="/">Home</a></li>
      <li class="active">Blog</li>
    </ul>
  </div>
  <!-- =====  BREADCRUMB END===== -->
  <!-- =====  CONTAINER START  ===== -->
  <div class="container">
    <div class="row ">
      <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs">
        {{-- <div class="left_banner left-sidebar-widget mb_40"> <a href="#"><img src="images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div> --}}
        <div class="left-blog left-sidebar-widget mb_50">
          <div class="heading-part mb_20">
            <h2 class="sub_title">Latest Post</h2>
          </div>
          <div id="left-blog">
            <div class="row ">
                @foreach ($blogs as $blog)
                    <div class="blog-item mb_20">
                        <div class="post-format col-xs-5">
                        <div class="thumb post-img"><a href="/blog/{{$blog->link}}"> <img src="{{ asset("storage/pictures/$blog->picture")}}"  alt="Creona"></a></div>
                        </div>
                        <div class="post-info col-xs-7">
                        <h5> <a href="/blog/{{$blog->link}}">{{$blog->title}}</a> </h5>
                        <div class="date pull-left"> <i class="fa fa-calendar" aria-hidden="true"></i>{{$blog->created_at}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-8 col-md-8 col-lg-9 mb_30">
        <div class="row">
          <div class="three-col-blog text-left">
              @foreach($blogs as $blog)
                <div class="blog-item col-md-6 mb_30">
                    <div class="post-format">
                    <div class="thumb post-img"><a href="/blog/{{$blog->link}}"> <img src="{{ asset("storage/pictures/$blog->picture")}}"  alt="Creona"></a></div>
                    <div class="post-type"><i class="fa fa-music" aria-hidden="true"></i></div>
                    </div>
                    <div class="post-info mb_20 ">
                    <h3 class="mb_10"> <a class="sub_title" href="/blog/{{$blog->link}}">{{$blog->title}}</a> </h3>
                    <p>{{$blog->summary}}</p>
                    <div class="details mt_10">
                        <div class="date pull-left"> <i class="fa fa-calendar" aria-hidden="true"></i>{{$blog->created_at}}</div>
                        <div class="more pull-right"> <a href="/blog/{{$blog->link}}">Read more <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>
                    </div>
                    </div>
                </div>
              @endforeach
          </div>
        </div>
        <div class="pagination-nav text-center mtb_20">
            {{$blogs->links()}}
          {{-- <ul>
            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
          </ul> --}}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- =====  CONTAINER END  ===== -->
@endsection
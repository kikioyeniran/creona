@extends('featured.layouts.app')

@section('content')
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">

        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Home</h2>
                    <p class="pageheader-text">Featured Works</p><div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Featured Works</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h5 class="card-header">Click Title to Edit Featured Works</h5>
            </div>
            @foreach($featured_works as $post)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <!-- .card -->
                    <div class="card card-figure">
                        <!-- .card-figure -->
                        <figure class="figure">
                            <!-- .figure-img -->
                            <div class="figure-img">
                                <img class="img-fluid" src="{{ asset("storage/pictures/$post->picture")}}" alt="Product Img">
                                <div class="figure-tools">
                                    <a href="#" class="tile-circle tile-sm mr-auto">
                                                    <span class="oi-data-transfer-download"></span></a>
                                    <span class="badge badge-danger">{{$post->status}}</span>
                                </div>
                                <div class="figure-action">
                                    <a href="/featured-works/disable/{{$post->id}}" class ='btn btn-block btn-sm btn-danger' onclick="return confirm('If you disable this post, people will not be able to see it. Are you sure you want to go ahead?');" >Disable Featured Work</a></div>
                            </div>
                            <!-- /.figure-img -->
                            <!-- .figure-caption -->
                            <figcaption class="figure-caption">
                                <h3 class="figure-title"><a href="/featured-works/{{$post->id}}/edit">{{$post->title}}</a></h3>
                                <p class="text-muted mb-0">PRICE: {{$post->price}} </p>
                                <p class="text-muted mb-0">DESCRIPTION: {{$post->description}} </p>
                                <div id="sparkline-1"><h3><a href="/featured-works/{{$post->id}}/edit" target="_blank" class="btn btn-sm btn-primary">Edit Post</a></h3></div>
                            </figcaption>
                            <!-- /.figure-caption -->
                        </figure>
                        <!-- /.card-figure -->
                    </div>
                    <!-- /.card -->
                </div>
            @endforeach
        </div>




        </div>
    </div>
</div>
@endsection
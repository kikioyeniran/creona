@extends('admin.layouts.app')

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
                    <p class="pageheader-text">Tutorials</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tutorials</li>
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
                <h5 class="card-header">Click Title to Edit Tutorials Post</h5>
            </div>
            @foreach($tutorials as $post)
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
                                    <span class="badge badge-danger">Tutorials</span>
                                </div>
                                <div class="figure-action">
                                    <a href="/tutorials/disable/{{$post->id}}" class ='btn btn-block btn-sm btn-danger' onclick="return confirm('Are you sure you want to disable this post?');" >Disable Tutorials</a>
                                </div>
                            </div>
                            <!-- /.figure-img -->
                            <!-- .figure-caption -->
                            <figcaption class="figure-caption">
                                <h3 class="figure-title"><a href="/tutorials/{{$post->id}}/edit">{{$post->title}}</a></h3>
                                <p class="text-muted mb-0">TUTOR: {{$post->tutor}} </p>
                                <p class="text-muted mb-0">PRICE: {{$post->price}} </p>
                                <a href="{{$post->preview_link}}"><p class="text-muted mb-0">PREVIEW LINK: {{$post->preview_link}} </p></a>
                                <p class="text-muted mb-0">DESCRIPTION: {{$post->description}} </p>
                                <div id="sparkline-1"><h3><a href="{{ asset("storage/videos/$post->video")}}" target="_blank">View Video</a></h3></div>
                            </figcaption>
                            <!-- /.figure-caption -->
                        </figure>
                        <!-- /.card-figure -->
                    </div>
                    <!-- /.card -->
                </div>
            @endforeach
        </div>
        <div class="align-content-center">
            {{$tutorials->links()}}
        </div>




        </div>
    </div>
</div>
@endsection
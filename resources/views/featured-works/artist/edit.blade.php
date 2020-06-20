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
                    <p class="pageheader-text">Edit Featured Works</p>
                    <div class="page-breadcrumb">
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
            <div class="card">
                <h5 class="card-header">Edit Featured Works</h5>
                <div class="card-body">
                    {!! Form::open(['action' => ['FeaturedWorksController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Title</label>
                                    {{Form::text('title', $post->title, ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Price</label>
                                    {{Form::number('price', $post->price, ['class' => 'form-control', 'min' => '500'])}}
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <label for="inputText3" class="col-form-label">Featured Work Image</label>
                                <div class="custom-file mb-3">
                                    {{Form::file('picture', ['class'=> 'custom-file-input'])}}
                                    <br/>
                                    <label class="custom-file-label" for="customFile">Select Featured Work Image</label>
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Featured Works Description</label>
                                    {{Form::textarea('description', $post->description, ['class' => 'form-control', 'placeholder' => 'Featured Works Description..', 'rows' => 2])}}
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                {{Form::hidden('_method', 'PUT')}}
                                {{Form::submit('Submit', ['class'=> 'btn btn-primary', 'id'=> 'prodSub'])}}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
         </div>
        </div>
    </div>
</div>
@endsection
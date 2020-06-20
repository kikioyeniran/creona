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
                    <p class="pageheader-text">Add Tutorials</p>
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
            <div class="card">
                <h5 class="card-header">Add Tutorials</h5>
                <div class="card-body">
                    {!! Form::open(['action' => 'TutorialsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Title</label>
                                    {{Form::text('title', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Tutor</label>
                                    {{Form::text('tutor', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Price</label>
                                    {{Form::text('price', '', ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Preview Link</label>
                                    {{Form::text('preview_link', '', ['class' => 'form-control'])}}
                                </div>
                                <label for="inputText3" class="col-form-label">Tutorial Post Image</label>
                                <div class="custom-file mb-3">
                                    {{Form::file('picture', ['class'=> 'custom-file-input'])}}
                                    <br/>
                                    <label class="custom-file-label" for="customFile">Select Tutorial Post Image</label>
                                </div>
                                <label for="inputText3" class="col-form-label">Tutorial Video</label>
                                <div class="custom-file mb-3">
                                    {{Form::file('video', ['class'=> 'custom-file-input'])}}
                                    <br/>
                                    <label class="custom-file-label" for="customFile">Select Tutorial Video</label>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Tutorials Description</label>
                                    {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Tutorials Description..', 'rows' => 2])}}
                                </div>
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
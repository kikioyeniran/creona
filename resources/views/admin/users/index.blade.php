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
                    <p class="pageheader-text">Users</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                <h5 class="card-header">This is a List of users</h5>
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Actions</th>
                                    {{--<th>Message</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 0 ?>
                                @foreach($users as $post)
                                    <?php $count++ ?>
                                    <tr>
                                        <th scope="row">{{$count}}</th>
                                        <td><a href="{{route('admin.users.edit', $post->id)}}">{{$post->name}}</a></td>
                                        <td>{{$post->email}}</td>
                                        <td>{{$post->role}}</td>
                                        <td><a href="{{route('admin.users.destroy', $post->id)}}" class ='btn btn-block btn-sm btn-danger' onclick="return confirm('Are you sure you want to disable this post?');" >Delete</a></td>
                                        {{--<td>{{$post->message}}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
</div>
@endsection
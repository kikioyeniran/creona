<!-- navbar -->
<!-- ============================================================== -->
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="#"><img class="logo-img" src="{{ asset('images/logo.png')}}" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                {{-- <li class="nav-item">
                    <div id="custom-search" class="top-search-bar">
                        <input class="form-control" type="text" placeholder="Search..">
                    </div>
                </li> --}}
                {{-- <li class="nav-item dropdown connection">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-fw fa-th"></i> </a>

                </li> --}}
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user mr-2 user-avatar-md rounded-circle"></i></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }} </h5>
                            <span class="status"></span><span class="ml-2">Logged in</span>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fa fa-user mr-2"></i>Admin Dashboard</a>
                        <a class="dropdown-item" href="{{ route('admin.users.index')}}"><i class="fa fa-user mr-2"></i>User Management</a>
                        <!-- <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>-->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</div>
<!-- ============================================================== -->
<!-- end navbar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Pages
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-clipboard-list"></i>Product Categories</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/categories">View Categories <span class="badge badge-secondary">View Categories</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/categories/create">Add Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/categories/disabled">Disabled Categories</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-2"><i class="far fa-image"></i>Products</a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/products/create">Add Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/products/archived">Archived Products</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-2"><i class="fas fa-newspaper"></i>Blog</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/blog/all">View Blog Posts <span class="badge badge-secondary">View Blog Posts</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/blog/create">Add New Blog Post</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/blog/archived">Archived Blog Posts</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-2"><i class="fas fa-newspaper"></i>Art Services</a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/art-services/all">View Art Services <span class="badge badge-secondary">View Art Services</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/art-services/create">Add New Art Service</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/art-services/disabled">Disabled Art Services</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-2"><i class="fas fa-newspaper"></i>E-books</a>
                        <div id="submenu-6" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/ebooks/all">View E-books <span class="badge badge-secondary">View E-books</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/ebooks/create">Add New E-books</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/ebooks/disabled">Disabled E-books</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-2"><i class="fas fa-newspaper"></i>Cards</a>
                        <div id="submenu-9" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/cards/all">View Cards <span class="badge badge-secondary">View Cards</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/cards/create">Add New Card</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/cards/disabled">Disabled Cards</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-2"><i class="fas fa-newspaper"></i>Tutorials</a>
                        <div id="submenu-7" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/tutorials/all">View Tutorials <span class="badge badge-secondary">View Tutorials</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/tutorials/create">Add New Tutorials</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/tutorials/disabled">Disabled Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-2"><i class="fa fa-fw fa-user-circle"></i>Artist</a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/artist/1/edit">Edit Artist <span class="badge badge-secondary">Edit Artist</span></a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-2"><i class="fas fa-fw fa-table"></i>Featured Works</a>
                        <div id="submenu-10" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/featured-works/admin/all">All Featured Works <span class="badge badge-secondary">View All Featured Works</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/featured-works/admin/pending">Pending Featured Works</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/featured-works/admin/disabled">Disabled Featured Works</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/featured-works/admin/approved">Approved Featured Works</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/featured-works/admin/disapproved">Disapproved Featured Works</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-4"><i class="fas fa-images"></i>Gallery</a>
                        <div id="submenu-8" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/gallery/create">Add Image to Gallery</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/artist/1/edit" aria-expanded="false"><i class="fa fa-fw fa-user-circle"></i>Edit Main Artist</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/comp-details/1/edit" aria-expanded="false"><i class="fas fa-fw fa-chart-pie"></i>Edit Company Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact/create" aria-expanded="false"><i class="fas fa-fw fa-chart-pie"></i>Contacts</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
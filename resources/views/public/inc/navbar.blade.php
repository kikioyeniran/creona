<div id="subscribe-me" class="modal animated fade in" role="dialog" data-keyboard="true" tabindex="-1">
    <div class="newsletter-popup"> <img class="offer" src="images/newsbg.jpg" alt="offer">
      <div class="newsletter-popup-static newsletter-popup-top">
        <div class="popup-text">
          <div class="popup-title">50% <span>off</span></div>
          <div class="popup-desc">
            <div>Sign up and get 50% off your next Order</div>
          </div>
        </div>
        <form onsubmit="return  validatpopupemail();" method="post">
          <div class="form-group required">
            <input type="email" name="email-popup" id="email-popup" placeholder="Enter Your Email" class="form-control input-lg" required />
            <button type="submit" class="btn btn-default btn-lg" id="email-popup-submit">Subscribe</button>
            <label class="checkme">
              <input type="checkbox" value="" id="checkme" />
              Dont show again</label>
          </div>
        </form>
      </div>
    </div>
</div>
<!-- =====  HEADER START  ===== -->
<header id="header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav">
        <!-- Start Top Search -->
        <div class="top-search">
        <div class="container">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span> </div>
        </div>
        </div>
        <!-- End Top Search -->
        <div class="container">
        <!-- Start Atribute Navigation -->
        <div class="attr-nav">
            <ul id="cart-dropdown">
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-shopping-bag"></i> <span class="badge">3</span> </a>
                <ul class="dropdown-menu cart-list">
                <li> <a href="#" class="photo"><img src="images/product/product1.jpg" class="cart-thumb" alt="" /></a>
                    <h6><a href="#">Lorem ipsum dolor nusquam at.</a></h6>
                    <p>2x - <span class="price">$99.00</span></p>
                </li>
                <li> <a href="#" class="photo"><img src="images/product/product3.jpg" class="cart-thumb" alt="" /></a>
                    <h6><a href="#">Lorem ipsum dolor nusquam at.</a></h6>
                    <p>1x - <span class="price">$33.00</span></p>
                </li>
                <li> <a href="#" class="photo"><img src="images/product/product2.jpg" class="cart-thumb" alt="" /></a>
                    <h6><a href="#">Lorem ipsum dolor nusquam at.</a></h6>
                    <p>2x - <span class="price">$56.00</span></p>
                </li>
                <li>
                    <table class="table">
                    <tbody>
                        <tr>
                        <td class="text-right"><strong>Sub-Total</strong></td>
                        <td class="text-right">$250.00</td>
                        </tr>
                        <tr>
                        <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                        <td class="text-right">$2.00</td>
                        </tr>
                        <tr>
                        <td class="text-right"><strong>VAT (20%)</strong></td>
                        <td class="text-right">$20.00</td>
                        </tr>
                    </tbody>
                    </table>
                </li>
                <li class="total"> <span class="pull-right"><strong>Total</strong>: $322.00</span> <a href="#" class="btn btn-default btn-cart">Cart</a> </li>
                </ul>
            </li>
            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
            <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
            </ul>
        </div>
        <!-- End Atribute Navigation -->
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="fa fa-bars"></i> </button>
            <a class="navbar-brand" href="index-2.html"> <img src="{{ asset('images/creona_w_logo.png')}}" class="logo logo-display" alt=""> <img src="{{ asset('images/creona_b_logo.png')}}" class="logo logo-scrolled" alt=""> </a> </div>
        <!-- End Header Navigation -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-left pull-right" data-in="fadeInDown" data-out="fadeOutUp">
            <li class="active"><a href="index-2.html">Home</a></li>
            <li class="dropdown megamenu-fw"> <a href="/shop" class="dropdown-toggle" data-toggle="dropdown">Shop</a>
                <ul class="dropdown-menu megamenu-content" role="menu">
                  <li>
                    <div class="row">
                      <div class="col-menu col-md-4">
                        <h4 class="sub_title title mtb_10">Products</h4>
                        <div class="content">
                          <ul class="menu-col">
                            <li><a href="/cards">Cards</a></li>
                            <li><a href="/ebooks">E-books</a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- end col-3 -->
                      <div class="col-menu col-md-4">
                        <h4 class="sub_title title mtb_10">Art Services</h4>
                        <div class="content">
                          <ul class="menu-col">
                            <li><a href="#">Portrait Painting</a></li>
                            <li><a href="#">Digital Painting</a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- end col-3 -->
                      <div class="col-menu col-md-4">
                        <h4 class="sub_title title mtb_10">Featured Art Works</h4>
                        <div class="content">
                          <ul class="menu-col">
                            <li><a href="#">Paintings</a></li>
                            <li><a href="#">Abstract Painting</a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- end col-3 -->
                    </div>
                    <!-- end row -->
                  </li>
                </ul>
              </li>
            {{-- <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products</a>
                <ul class="dropdown-menu">
                <li> <a href="/cards">Cards</a></li>
                <li> <a href="/ebooks">E-books</a></li>
                </ul>
            </li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Art Services</a>
                <ul class="dropdown-menu">
                <li> <a href="#">Digital Painting</a></li>
                <li> <a href="#">Portrait Painting</a></li>
                </ul>
            </li> --}}
            <li class="active"><a href="/tutorials">Art Tutorials</a></li>
            {{-- <li class="active"><a href="/featured-works">Featured Works</a></li> --}}
            <li class="active"><a href="/blog">Blog</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/contact">Contact Us</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
        </div>
        <!-- Start Side Menu -->
        <div class="side"> <a href="#" class="close-side"><i class="fa fa-times"></i></a>
        <div class="widget">
            <h6 class="title">My Account</h6>
            <ul class="link">
            <li><a href="/login">My Account</a></li>
            <li><a href="#">Checkout</a></li>
            <li><a href="/contact">Contact Us</a></li>
            </ul>
            <hr class="mtb_10">
            <ul class="link">
            <li><a href="/login"><i class="fa fa-lock left" aria-hidden="true"></i>Login</a></li>
            <li><a href="/register"><i class="fa fa-user left" aria-hidden="true"></i>Become A Featured Artist</a></li>
            </ul>
        </div>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- =====  HEADER END  ===== -->
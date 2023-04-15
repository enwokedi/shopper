<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-UK" lang="en-UK"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>NGM</title>

    <meta name="author" content="Emmanuel Nwokedi">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="assets/css/colors/color1.css">

    <!-- Favicon and touch icons  -->
    <link href="{{url('img/logo.png')}}" rel="shortcut icon">

    <!--[if lt IE 9]>
        <script src="javascript/html5shiv.js"></script>
        <script src="javascript/respond.min.js"></script>
    <![endif]-->
</head>

<body class="header_sticky header-style-2 has-menu-extra">
    <!-- Preloader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>

    <!-- Boxed -->
    <div class="boxed">
        <div id="site-header-wrap">
            <!-- Header -->
            <header id="header" class="header clearfix">

                <!-- Start Top Nav -->
                <nav class="navbar navbar-expand navbar-dark bg-dark d-none d-lg-block">
                    <div class="container">
                        <div class="w-100 d-flex justify-content-between">
                            <div>
                                <i class="fa fa-envelope mx-2"></i>
                                <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@neguinhomotors.co.uk">info@neguinhomotors.co.uk</a>
                                <i class="fa fa-phone mx-2"></i>
                                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:02083141498">Catford: 0208 314 1498</a>
                                <i class="fa fa-phone mx-2"></i>
                                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:02034095478">Tooting: 0203 409 5478</a>
                                <i class="fa fa-bell mx-2"></i>
                                <a class="navbar-sm-brand text-light text-decoration-none" href="#">Request Callback</a>
                            </div>
                            <div>
                                <a class="text-light" style="padding-right: 10px;" href="/login">Login</a>
                                <a class="text-light" style="padding-right: 5px;" href="/register">Register</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Close Top Nav -->

                <div class="container-fluid container-width-93 clearfix" id="site-header-inner">
                    <div id="logo" class="logo float-left">
                        <a href="/" title="logo">
                            <img src="{{url('img/logo.png')}}" alt="image" width="54" height="12" data-retina="{{url('img/logo@2x.png')}}" data-width="54" data-height="12">
                        </a>
                    </div><!-- /.logo -->
                    <div class="mobile-button"><span></span></div>
                    <ul class="menu-extra">
                        <li class="box-search">
                            <a class="icon_search header-search-icon" href="#"></a>
                            <form role="search" method="get" class="header-search-form" action="#">
                                <input type="text" value="" name="s" class="header-search-field" placeholder="Search...">
                                <button type="submit" class="header-search-submit" title="Search">Search</button>
                            </form>
                        </li>
                        <li class="box-login">
                            <a class="icon_login" href="/login"></a>
                        </li>
                        <li class="box-cart nav-top-cart-wrapper">
                            <a class="icon_cart nav-cart-trigger active" href="#"><span></span></a>
                            <div class="nav-shop-cart">
                                <div class="widget_shopping_cart_content">
                                    <div class="woocommerce-min-cart-wrap">
                                        <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                            <li class="woocommerce-mini-cart-item mini_cart_item">
                                                <span>No Items in Shopping Cart</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="nav-wrap">
                        <nav id="mainnav" class="mainnav">
                            <ul class="menu">
                                <li>
                                    <a href="/sale-motorcycles">SALES</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="#">Sale Information</a>
                                        </li>
                                        <li>
                                            <a href="#">Finance</a>
                                        </li>
                                        <li>
                                            <a href="#">Bike Insurance</a>
                                        </li>
                                        <li>
                                            <a href="#">Fleet</a>
                                        </li>
                                        <li>
                                            <a href="/accident-management-services">Accident Management</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/rentals-motorcycle">RENTALS</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="/rentals-information">Rental Information</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/services">SERVICES</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="/service-repairs">Motorcycle Repairs</a>
                                        </li>
                                        <li>
                                            <a href="/service-motorcycle">Book a Service</a>
                                        </li>
                                        <li>
                                            <a href="/service-mot">Book MOT</a>
                                        </li>
                                        <li>
                                            <a href="/accident-management-services">Accident Management</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/category/1">PRODUCTS</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="/spare-parts">Spare Parts</a>
                                        </li>
                                        <li>
                                            <a href="gps-tracker">GPS Tracker</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/contact">CONTACT</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="/about">About</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav><!-- /.mainnav -->
                    </div><!-- /.nav-wrap -->
                </div><!-- /.container-fluid -->
            </header><!-- /header -->
        </div>

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title"></h1>
                        </div><!-- /.page-title-heading -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Honda & Yamaha Specialists</a></li>
                                <li><a href="/product-types">@yield('title')</a></li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->

        <!-- Start Slidebar -->
        <section class="flat-row main-shop shop-slidebar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sidebar slidebar-shop">
                            <!-- div class="widget widget-search">
                        <form role="search" method="get" class="search-form" action="#">
                            <label>
                                <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                            </label>
                            <input type="submit" class="search-submit" value="Search">
                        </form>
                    </div --><!-- /.widget-search -->
                            <div class="widget widget-sort-by">
                                <h5 class="widget-title">
                                    Categories
                                </h5>
                                <ul>
                                    <li><a href="/shop/1">HELMETS</a></li>
                                    <li><a href="#">HELMET ACCESSORIES</a></li>
                                    <li><a href="#">CLOTHING</a></li>
                                    <li><a href="#">FOOTWEAR</a></li>
                                    <li><a href="#">GLOVES</a></li>
                                    <li><a href="#">LUGGAGE</a></li>
                                    <li><a href="#">MAINTENANCE</a></li>
                                    <li><a href="#">ELECTRONICS</a></li>
                                    <li><a href="#">ACCESSORIES</a></li>
                                    <li><a href="#">HANDLEBAR ACCESSORIES</a></li>
                                    <li><a href="#">SECURITY</a></li>
                                    <li><a href="#">PROMOTIONAL</a></li>
                                </ul>
                            </div><!-- /.widget-sort-by -->
                            <div class="widget widget-color">
                                <h5 class="widget-title">
                                    Colors
                                </h5>
                                <ul class="flat-color-list icon-left">
                                    <li><a href="#" class="yellow"></a><span>Yellow</span> <span class="pull-right">25</span></li>
                                    <li><a href="#" class="pink"> </a><span>White</span> <span class="pull-right">16</span></li>
                                    <li><a href="#" class="red active"></a><span>Red</span> <span class="pull-right">28</span></li>
                                    <li><a href="#" class="black"></a><span>Black</span> <span class="pull-right">12</span></li>
                                    <li><a href="#" class="blue"></a><span>Green</span> <span class="pull-right">0</span></li>
                                </ul>
                            </div><!-- /.widget-color -->
                            <div class="widget widget-size">
                                <h5 class="widget-title">
                                    Size
                                </h5>
                                <ul>
                                    <li class="checkbox">
                                        <input type="checkbox" name="checkbok1" id="checkbox1">
                                        <label for="checkbox1">
                                            <a href="#">L</a>
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <input type="checkbox" name="checkbok2" id="checkbox2">
                                        <label for="checkbox2">
                                            <a href="#">M</a>
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <input type="checkbox" name="checkbok3" id="checkbox3">
                                        <label for="checkbox3">
                                            <a href="#">S</a>
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <input type="checkbox" name="checkbok4" id="checkbox4">
                                        <label for="checkbox4">
                                            <a href="#">X</a>
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <input type="checkbox" name="checkbok5" id="checkbox5">
                                        <label for="checkbox5">
                                            <a href="#">XL</a>
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <input type="checkbox" name="checkbok6" id="checkbox6">
                                        <label for="checkbox6">
                                            <a href="#">XXL</a>
                                        </label>
                                    </li>
                                </ul>
                            </div><!-- /.widget-size -->
                            <div class="widget widget-price">
                                <h5 class="widget-title">Filter by price</h5>
                                <div class="price-filter">
                                    <div id="slide-range"></div>
                                    <p class="amount">
                                        Price: <input type="text" id="amount" disabled="">
                                    </p>
                                </div>
                            </div>
                            <div class="widget widget_tag">
                                <h5 class="widget-title">
                                    Tags
                                </h5>
                                <div class="tag-list">
                                    <a href="#">Pinloc</a>
                                    <a href="#" class="active">Waterproof</a>
                                    <a href="#">Winter</a>
                                    <a href="#">Top Box</a>
                                    <a href="#">Tracker</a>
                                    <a href="#">Intercom</a>
                                    <a href="#">Locks</a>
                                    <a href="#">Heated Grips</a>
                                </div>
                            </div><!-- /.widget -->
                        </div><!-- /.sidebar -->
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-9">
                        <div class="filter-shop clearfix">
                            <p class="showing-product float-right">
                                Need to find something fast? Call: 0208 314 1498
                            </p>
                        </div><!-- /.filte-shop -->

                        <div class="product-content product-threecolumn product-slidebar clearfix">
                            <ul class="product style2 sd1">
                                @foreach($products->chunk(3) as $chunk)
                                <li class="product-item">
                                    @foreach($chunk as $product)
                                    <div class="product-thumb clearfix">
                                        <a href="#" class="product-thumb">
                                            <img src="{{ $product->image_url }}" alt="image">
                                        </a>
                                        <!-- span class="new sale">Sale</span -->
                                    </div>
                                    <div class="product-info clearfix">
                                        <span class="product-title">{{ $product->description }}</span>
                                        <div class="price">
                                            <del>
                                                <!-- span class="regular">£150.00</span -->
                                            </del>
                                            <ins>
                                                <span class="amount">£{{ $product->price }}</span>
                                            </ins>
                                        </div>
                                        <ul class="flat-color-list">
                                            <!--li><a href="#" class="red"></a>
                                            </li-->
                                            <!--li>
                                                <a href="#" class="blue"></a>
                                            </li-->
                                            <!--li>
                                                <a href="#" class="black"></a>
                                            </li-->
                                        </ul>
                                    </div>
                                    <div class="add-to-cart text-center">
                                        <a href="#">ADD TO CART</a>
                                    </div>
                                    <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                                    @endforeach
                                </li>
                                @endforeach
                            </ul><!-- /.product -->
                        </div><!-- /.product-content -->
                        <div class="product-pagination text-center clearfix">
                            {{ $products->links() }}
                        </div>
                    </div><!-- /.col-md-9 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-row -->

        <div class="divider h68"></div>
        <section class="flat-row mail-chimp">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text">
                            <h3>Sign up for Send Newsletter</h3>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="subscribe clearfix">
                            <form action="#" method="post" accept-charset="utf-8" id="subscribe-form">
                                <div class="subscribe-content">
                                    <div class="input">
                                        <input type="email" name="subscribe-email" placeholder="Your Email">
                                    </div>
                                    <div class="button">
                                        <button type="button">SUBCRIBE</button>
                                    </div>
                                </div>
                            </form>
                            <ul class="flat-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul><!-- /.flat-social -->
                        </div><!-- /.subscribe -->
                    </div>
                </div>
            </div>
        </section><!-- /.mail-chimp -->

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="widget widget-link">
                            <ul>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">My Cart</a></li>
                                <li><a href="#">My Wishlist Items</a></li>
                                <li><a href="#">My Checkout</a></li>
                                <li><a href="#">Delivery</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Help & FAQs</a></li>
                            </ul>
                        </div><!-- /.widget -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-sm-6 col-md-3">
                        <div class="widget widget-link link-login">
                            <ul>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Promotional Terms & Conditions</a></li>
                                <li><a href="#">Cookie Policy</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div><!-- /.widget -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-sm-6 col-md-3">
                        <div class="widget widget-brand">
                            <ul class="flat-contact">
                                <li class="area"></li>
                            </ul><!-- /.flat-contact -->
                        </div><!-- /.widget -->
                    </div><!-- /.col-md-3 -->
                    <div class="col-sm-6 col-md-4">
                        <div class="widget widget-brand">
                            <ul class="flat-contact">
                                <li class="area">NGM CATFORD</li>
                                <li>
                                    <i class="fa fa-phone mx-2"></i>
                                    <a class="phone" href="tel:0208314498">0208 314 1498</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope mx-2"></i>
                                    <a class="email" href="mailto:info@neguinhomotors.co.uk">info@neguinhomotors.co.uk</a>
                                </li>
                                <li>
                                    <i class="fa fa-map-marker mx-2"></i>
                                    <a class="address">Unit 1179, 9 Catford Hill, London SE6 4NU</a>
                                </li>
                                <li class="area">NGM TOOTING</li>
                                <li>
                                    <i class="fa fa-phone mx-2"></i>
                                    <a class="phone" href="tel:02034095478">0203 409 5478</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope mx-2"></i>
                                    <a class="email" href="mailto:info@neguinhomotors.co.uk">info@neguinhomotors.co.uk</a>
                                </li>
                                <li>
                                    <i class="fa fa-map-marker mx-2"></i>
                                    <a class="address">4A Penwortham Road, London SW16 6RE</a>
                                </li>
                            </ul><!-- /.flat-contact -->
                        </div><!-- /.widget -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </footer><!-- /.footer -->

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="copyright text-center">Copyright @ 2023 <a href="/">Neguinho Motors Limited - All Rights Reserved</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Go Top -->
        <a class="go-top">
            <i class="fa fa-chevron-up"></i>
        </a>

    </div>
    <!-- Javascript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.easing.js"></script>
    <script src="assets/js/parallax.js"></script>
    <script src="assets/js/jquery-waypoints.js"></script>
    <script src="assets/js/jquery-countTo.js"></script>
    <script src="assets/js/jquery.countdown.js"></script>
    <script src="assets/js/jquery.flexslider-min.js"></script>
    <script src="assets/js/images-loaded.js"></script>
    <script src="assets/js/jquery.isotope.min.js"></script>
    <script src="assets/js/magnific.popup.min.js"></script>
    <script src="assets/js/jquery.hoverdir.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/equalize.min.js"></script>
    <script src="assets/js/gmap3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIEU6OT3xqCksCetQeNLIPps6-AYrhq-s&region=GB"></script>
    <script src="assets/js/jquery-ui.js"></script>

    <script src="assets/js/jquery.cookie.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Revolution Slider -->
    <script src="assets/rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="assets/rev-slider/js/jquery.themepunch.revolution.min.js"></script>
    <script src="assets/js/rev-slider.js"></script>

    <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
    <script src="assets/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="assets/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="assets/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="assets/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="assets/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="assets/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="assets/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="assets/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="assets/rev-slider/js/extensions/revolution.extension.video.min.js"></script>
</body>

</html>
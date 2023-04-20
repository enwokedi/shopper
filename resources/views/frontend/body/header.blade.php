<!-- Header -->
<header id="header" class="header clearfix">

    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand navbar-dark bg-dark d-none d-lg-block" style="background-color: #343434;">
        <div class="container">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2" style="color:white;"></i>
                    <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@neguinhomotors.co.uk">info@neguinhomotors.co.uk</a>
                    <i class="fa fa-phone mx-2" style="color:white;"></i>
                    <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none" href="tel:02083141498">Catford: 0208 314 1498</a>
                    <i class="fa fa-phone mx-2" style="color:white;"></i>
                    <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none" href="tel:02034095478">Tooting: 0203 409 5478</a>
                    <i class="fa fa-bell mx-2" style="color:white;"></i>
                    <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none" href="#">Request Callback</a>
                </div>
                <div>
                    <a style="color: white;" class="text-light" style="padding-right: 5px;" href="/register" style="color:white;">Register</a>
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
                <a class="icon_cart nav-cart-trigger " href="{{ route('product.cart') }}"><span> 6</span></a>
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
                        <a href="/shop">SHOP</a>
                        <ul class="submenu">
                            <li>
                                <a href="/category/1">HELMETS</a>
                            </li>
                            <li>
                                <a href="/category/14">HELMET ACCESSORIES</a>
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
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-UK" lang="en-UK"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!--<![endif]-->

@include('frontend.body.head')

<body class="header_sticky header-style-2 has-menu-extra">
    <!-- Preloader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>

    <!-- Boxed -->
    <div class="boxed">
        <div id="site-header-wrap">

            @include('frontend.body.header')

        </div>

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">{{$title}}</h1>
                        </div><!-- /.page-title-heading -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Honda & Yamaha Specialists</a></li>
                                <li><a href="/shop">Shop</a></li>
                                <li><a href="/category/{{$category_id}}">{{ucfirst($category)}}</a></li>
                                <li><a href="/product/{{$product_id}}">{{$title}}</a></li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->

        <section class="flat-row main-shop shop-detail style-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="flat-image-box clearfix">
                            <div class="inner padding-top-4">
                                <ul class="product-list-fix-image">
                                    <li>
                                        <img src="{{$product->image_url}}" alt="Image">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.col-md-6 -->

                    <div class="col-md-6">
                        <div class="divider h0"></div>
                        <div class="product-detail">
                            <div class="inner">
                                <div class="content-detail">
                                    <h2 class="product-title">{{$product->description}}</h2>
                                    <div class="flat-star style-1">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <span>(1)</span>
                                    </div>
                                    <p>{{ html_entity_decode($product->extended_description) }}</p>
                                    <div class="price margin-top-24">
                                        <ins><span class="amount">£{{$product->price}}</span></ins>
                                    </div>
                                    <ul class="product-infor style-1">
                                        <li><span>Size: {{ $product->variation }}</span></li>
                                        <li><span>Colour: {{ $product->colour }}</span></li>
                                    </ul>
                                    <div class="product-categories margin-top-22">
                                        <span>SKU: </span><a href="#">{{ $product->sku }}</a>
                                    </div>
                                    <div class="product-categories margin-top-22">
                                        <span>Category: </span><a href="#">{{ucfirst($category)}}</a>
                                    </div>
                                    <div class="product-tags">
                                        <span>Tags: </span><a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a>
                                    </div>
                                    <div class="product-quantity margin-top-35">
                                        <div class="quantity">
                                            <input type="text" value="1" name="quantity-number" class="quantity-number">
                                            <span class="inc quantity-button">+</span>
                                            <span class="dec quantity-button">-</span>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="#">ADD TO CART</a>
                                        </div>
                                        <div class="box-like">
                                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                    </div>
                                    <ul class="flat-socials margin-top-46">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.product-detail -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-row -->

        <section class="flat-row shop-detail-content style-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-tabs style-1 has-border">
                            <div class="inner">
                                <ul class="menu-tab">
                                    <li class="active">Description</li>
                                    <li>Additional information</li>
                                    <li>Reviews</li>
                                </ul>
                                <div class="content-tab">
                                    <div class="content-inner">
                                        <div class="flat-grid-box col2 border-width border-width-1 has-padding clearfix">
                                            <div class="grid-row image-left clearfix">
                                                <div class="grid-item">
                                                    <div class="thumb text-center">
                                                        <img src="" alt="Image">
                                                    </div>
                                                </div><!-- /.grid-item -->
                                                <div class="grid-item">
                                                    <div class="text-wrap">
                                                        <h6 class="title"></h6>
                                                        <p> </p>
                                                    </div>
                                                </div>
                                            </div><!-- /.grid-row -->
                                        </div><!-- /.flat-grid-box -->
                                    </div><!-- /.content-inner -->
                                    <div class="content-inner">
                                        <div class="inner max-width-40">
                                            <table>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div><!-- /.content-inner -->
                                    <div class="content-inner">
                                        <div class="inner max-width-83 padding-top-33">
                                            <ol class="review-list">
                                                <li class="review">

                                                </li><!--  /.review    -->
                                            </ol><!-- /.review-list -->
                                            <div class="comment-respond review-respond" id="respond">
                                                <div class="comment-reply-title margin-bottom-14">
                                                    <h5>Write a review</h5>
                                                    <p>Your email address will not be published. Required fields are marked *</p>
                                                </div>
                                                <form novalidate="" class="comment-form review-form" id="commentform" method="post" action="#">
                                                    <p class="flat-star style-2">
                                                        <label>Rating*:</label>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <label>Review*</label>
                                                        <textarea class="" tabindex="4" name="comment" required> </textarea>
                                                    </p>
                                                    <p class="comment-name">
                                                        <label>Name*</label>
                                                        <input type="text" aria-required="true" size="30" value="" name="name" id="name">
                                                    </p>
                                                    <p class="comment-email">
                                                        <label>Email*</label>
                                                        <input type="email" size="30" value="" name="email" id="email">
                                                    </p>
                                                    <p class="comment-form-notify clearfix">
                                                        <input type="checkbox" name="check-notify" id="check-notify"> <label for="check-notify">Notify me of new posts by email</label>
                                                    </p>
                                                    <p class="form-submit">
                                                        <button class="comment-submit">Submit</button>
                                                    </p>
                                                </form>
                                            </div><!-- /.comment-respond -->
                                        </div>
                                    </div><!-- /.content-inner -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.shop-detail-content -->

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
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/tether.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.easing.js"></script>
    <script src="/assets/js/parallax.js"></script>
    <script src="/assets/js/jquery-waypoints.js"></script>
    <script src="/assets/js/jquery-countTo.js"></script>
    <script src="/assets/js/jquery.countdown.js"></script>
    <script src="/assets/js/jquery.flexslider-min.js"></script>
    <script src="/assets/js/images-loaded.js"></script>
    <script src="/assets/js/jquery.isotope.min.js"></script>
    <script src="/assets/js/magnific.popup.min.js"></script>
    <script src="/assets/js/jquery.hoverdir.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/equalize.min.js"></script>
    <script src="/assets/js/gmap3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIEU6OT3xqCksCetQeNLIPps6-AYrhq-s&region=GB"></script>
    <script src="/assets/js/jquery-ui.js"></script>

    <script src="/assets/js/jquery.cookie.js"></script>
    <script src="/assets/js/main.js"></script>

    <!-- Revolution Slider -->
    <script src="/assets/rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="/assets/rev-slider/js/jquery.themepunch.revolution.min.js"></script>
    <script src="/assets/js/rev-slider.js"></script>

    <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
    <script src="/assets/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.video.min.js"></script>
</body>

</html>
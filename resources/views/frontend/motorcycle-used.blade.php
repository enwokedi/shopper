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
                            <h1 class="title">{{$motorcycle['brand']->name}} {{ $motorcycle->name }}</h1>
                        </div><!-- /.page-title-heading -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Honda & Yamaha Specialists</a></li>
                                <li><a href="/motorcycle-sales">Motorcycle Sales</a></li>
                                <li><a href="/new-motorcycle/{{ $motorcycle->slug }}">{{$motorcycle['brand']->name}} {{ $motorcycle->name }}</a></li>
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
                                <ul class="motorcycle-list-fix-image">
                                    <li>
                                        <img src="/{{ $image[7]->id }}/{{ $image[7]->file_name }}" alt="Image">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.col-md-6 -->

                    <div class="col-md-6">
                        <div class="divider h0"></div>
                        <div class="product-detail">
                            <div class="inner">
                                <form action="{{ route('store.cart', $motorcycle->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="content-detail form-group">
                                        <h2 class="product-title" value="{{$motorcycle->description}}" name="name">{{$motorcycle['brand']->name}} {{ $motorcycle->name }}</h2>
                                        <h3 class="product-title" value="" name="name"></h3>
                                        <div class="flat-star style-1">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <span>(1)</span>
                                        </div>
                                        <p>{!! $motorcycle->description !!}</p>
                                        <ul class="product-infor style-1">
                                            <li><span>Body Type: </span></li>
                                            <li><span>Engine CC: </span></li>
                                            <li><span>Engine Power: </span></li>
                                            <li><span>Gearbox: </span></li>
                                            <li><span>Fuel Type: </span></li>
                                        </ul>
                                        <div class="price margin-top-24">
                                            <ins><span class="amount" value="{{$motorcycle->price}}" name="price" id="price">£{{$motorcycle->price_amount}}</span></ins>
                                        </div>
                                        <div class="product-quantity margin-top-35">
                                            <div class="quantity">
                                                <input type="text" value="1" name="quantity" class="quantity-number">
                                                <span class="inc quantity-button">+</span>
                                                <span class="dec quantity-button">-</span>
                                            </div>
                                            <button type="submit" class="add-to-cart">ADD TO CART</button>
                                            <div class="box-like">
                                                <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-categories margin-top-22">
                                            <span>Category: </span><a href="#"> </a>
                                        </div>
                                        <div class="product-tags">
                                            <span>Tags: </span><a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a>
                                        </div>
                                        <ul class="flat-socials margin-top-46">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </form>
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
                                                        <img src="/{{ $brand_image[0]->id }}/{{ $brand_image[0]->file_name }}" alt="Image" style="width: 50%;">
                                                    </div>
                                                </div><!-- /.grid-item -->
                                                <div class="grid-item">
                                                    <div class="text-wrap">
                                                        <h6 class="title"></h6>
                                                        <p> {!! $motorcycle['brand']->description !!}</p>
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

        @include('frontend.body.newsletter')

        @include('frontend.body.footer')

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
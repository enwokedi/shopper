@extends('frontend.main_master')

@section('content')

<!-- Page title -->
<div class="page-title parallax parallax1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">Honda PCX 125</h1>
                </div><!-- /.page-title-heading -->
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="/">Honda & Yamaha Specialists</a></li>
                        <li><a href="/rentals-motorcycle">Motorcycles for Rent</a></li>
                        <li><a href="/rentals-honda-pcx-125">Honda PCX 125</a></li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-title -->

<section class="flat-row main-shop shop-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="wrap-flexslider">
                    <div class="inner">
                        <div class="flexslider style-1 has-relative">
                            <ul class="slides">
                                <li data-thumb="{{url('assets/images/rentals/detail-thumb/2021-Honda-PCX125-Scooter-review-details-price-spec_101.jpg') }}">
                                    <img src="{{url('assets/images/rentals/2021-Honda-PCX125-Scooter-review-details-price-spec_101.jpg') }}" alt="Image">
                                    <div class="flat-icon style-1">
                                        <a href="{{url('assets/images/rentals/2021-Honda-PCX125-Scooter-review-details-price-spec_101.jpg') }}" class="zoom-popup"><span class="fa fa-search-plus"></span></a>
                                    </div>
                                </li>
                                <li data-thumb="{{url('assets/images/rentals/detail-thumb/2021-Honda-PCX125-Scooter-review-details-price-spec_100.jpg') }}">
                                    <img src="{{url('assets/images/rentals/2021-Honda-PCX125-Scooter-review-details-price-spec_100.jpg') }}" alt="Image">
                                    <div class="flat-icon style-1">
                                        <a href="{{url('assets/images/rentals/2021-Honda-PCX125-Scooter-review-details-price-spec_100.jpg') }}" class="zoom-popup"><span class="fa fa-search-plus"></span></a>
                                    </div>
                                </li>
                                <li data-thumb="{{url('assets/images/rentals/detail-thumb/2021-Honda-PCX125-Scooter-review-details-price-spec_102.jpg') }}">
                                    <img src="{{url('assets/images/rentals/2021-Honda-PCX125-Scooter-review-details-price-spec_102.jpg') }}" alt="Image">
                                    <div class="flat-icon style-1">
                                        <a href="{{url('assets/images/rentals/2021-Honda-PCX125-Scooter-review-details-price-spec_102.jpg') }}" class="zoom-popup"><span class="fa fa-search-plus"></span></a>
                                    </div>
                                </li>
                                <li data-thumb="{{url('assets/images/rentals/detail-thumb/2021-Honda-PCX125-Scooter-review-details-price-spec_103.jpg') }}">
                                    <img src="{{url('assets/images/rentals/2021-Honda-PCX125-Scooter-review-details-price-spec_103.jpg') }}" alt="Image">
                                    <div class="flat-icon style-1">
                                        <a href="{{url('assets/images/rentals/2021-Honda-PCX125-Scooter-review-details-price-spec_103.jpg') }}" class="zoom-popup"><span class="fa fa-search-plus"></span></a>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- /.flexslider -->
                    </div>
                </div>
            </div><!-- /.col-md-6 -->

            <div class="col-md-6">
                <div class="product-detail">
                    <div class="inner">
                        <div class="content-detail">
                            <h2 class="product-title">Honda PCX 125</h2>
                            <h3>Specifications</h3>
                            <div class="flat-star style-1">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <span>(1)</span>
                            </div>
                            <div class="size">
                                <span class="pull-left">Type:</span>
                                <ul>
                                    <li class="pull-left"><a href="#">Urban Mobility</a></li>
                                </ul>
                            </div>
                            <div class="size">
                                <span class="pull-left">Availaibilty:</span>
                                <ul>
                                    <li class="pull-left"><a href="#">EUROPE</a></li>
                                </ul>
                            </div>
                            <div class="size">
                                <span>Brand:</span>
                                <ul>
                                    <li><a href="#">HONDA</a></li>
                                </ul>
                            </div>
                            <div class="size">
                                <span>Model:</span>
                                <ul>
                                    <li><a href="#">PCX 125</a></li>
                                </ul>
                            </div>
                            <div class="size">
                                <span>CC:</span>
                                <ul>
                                    <li><a href="#">125</a></li>
                                </ul>
                            </div>
                            <div class="price">
                                <ins><span class="amount">HP £19.00</span></ins>
                            </div>
                            <div class="product-quantity">
                                <div class="quantity">
                                    <input type="text" value="1" name="quantity-number" class="quantity-number">
                                    <span class="inc quantity-button">+</span>
                                    <span class="dec quantity-button">-</span>
                                </div>
                                <div class="add-to-cart">
                                    <a href="#">Make a Reservation</a>
                                </div>
                                <div class="box-like">
                                    <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                                </div>
                            </div>
                            <div class="product-categories">
                                <span>Categories: </span><a href="#">Motorcycles,</a> <a href="#">Scooters,</a> <a href="#">Urban Mobility</a>
                            </div>
                            <div class="product-tags">
                                <span>Tags: </span><a href="#">New Sales,</a> <a href="#">Used Sales,</a> <a href="#">Rentals,</a> <a href="#">Servicing</a>
                            </div>
                            <ul class="flat-socials">
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

<section class="flat-row shop-detail-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-tabs style-1 has-border">
                    <div class="inner">
                        <ul class="menu-tab">
                            <li class="active">Description</li>
                            <li>Additional Specifications</li>
                            <li>Reviews</li>
                        </ul>
                        <div class="content-tab">
                            <div class="content-inner">
                                <div class="flat-grid-box col2 border-width border-width-1 has-padding clearfix">
                                    <div class="grid-row image-left clearfix">
                                        <div class="grid-item">
                                            <div class="thumb text-center">
                                                <img src="{{url('assets/images/rentals/2021-Honda-PCX125-Scooter-review-details-price-spec_101.jpg') }}" alt="Image">
                                            </div>
                                        </div><!-- /.grid-item -->
                                        <div class="grid-item">
                                            <div class="text-wrap">
                                                <h6 class="title">Good Moves</h6>
                                                <p>The Honda PCX 125 is characterized by its elegant styling with futuristic lines and offers under-seat space, a USB Type-C plug, and the convenience of the Smart Key. Equipped with Honda’s Selectable Torque Control (HSTC) to maintain rear tire grip in both wet and dry conditions, this scooter also offers incredible fuel economy. The frame, wider tire sizes, longer travel rear suspension, and ABS brakes provide a smooth and safe ride. </p>
                                            </div>
                                        </div>
                                    </div><!-- /.grid-row -->

                                    <div class="grid-row image-right padding-bottom-48 clearfix">
                                        <div class="grid-item">
                                            <div class="text-wrap">
                                                <h6 class="title">Street Freedom</h6>
                                                <p>Are you busy and need to go places? The PCX 125 was designed to drive in the city, and it is one of Europe’s favorite scooters for urban mobility. Personal comfort is provided by the seated riding position, under-seat storage with the capacity for an integral helmet, and overall high quality of materials. With the PCX, you just need to push the start button and start the journey. </p>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="thumb text-center">
                                                <img src="{{url('assets/images/rentals/2021-Honda-PCX125-Scooter-review-details-price-spec_100.jpg') }}" alt="Image">
                                            </div>
                                        </div><!-- /.grid-item -->
                                    </div><!-- /.grid-row -->
                                </div><!-- /.flat-grid-box -->
                            </div><!-- /.content-inner -->
                            <div class="content-inner">
                                <div class="inner max-width-40">
                                    <table>
                                        <tr>
                                            <td>Weight</td>
                                            <td>130 kg (286.6lbs.)</td>
                                        </tr>
                                        <tr>
                                            <td>Seat Height</td>
                                            <td>764 mm (30.1")</td>
                                        </tr>
                                        <tr>
                                            <td>Luggage</td>
                                            <td>N.A. / N.A. / N.A.</td>
                                        </tr>
                                        <tr>
                                            <td>Luggage Capacity</td>
                                            <td>N.A. / N.A. / N.A.</td>
                                        </tr>
                                    </table>
                                </div>
                            </div><!-- /.content-inner -->
                            <div class="content-inner">
                                <div class="inner max-width-83 padding-top-33">
                                    <ol class="review-list">
                                        <li class="review">
                                            <div class="thumb">
                                                <img src="images/avatar-1.png" alt="Image">
                                            </div>
                                            <div class="text-wrap">
                                                <div class="review-meta">
                                                    <h5 class="name">Sophia Rosla</h5>
                                                    <div class="flat-star style-1">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </div>
                                                <div class="review-text">
                                                    <p>I wanted to thank you so much for the rug we have received it really is beautiful and expertly made. I will be recommending you to all our friends.</p>
                                                </div>
                                            </div>
                                        </li><!--  /.review    -->
                                        <li class="review">
                                            <div class="thumb">
                                                <img src="images/avatar.png" alt="Image">
                                            </div>
                                            <div class="text-wrap">
                                                <div class="review-meta">
                                                    <h5 class="name">Jayne Haughton</h5>
                                                    <div class="flat-star style-1">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </div>
                                                <div class="review-text">
                                                    <p class="line-height-28">Customer service is very important part of the buying experience to us and we must say that we have found Utility's to be impressive - we will certainly look to buy again in future.</p>
                                                </div>
                                            </div>
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

<!-- section class="flat-row shop-related">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section margin-bottom-55">
                    <h2 class="title">Related Products</h2>
                </div>

                <div class="product-content product-fourcolumn clearfix">
                    <ul class="product style2">
                        <li class="product-item">
                            <div class="product-thumb clearfix">
                                <a href="#">
                                    <img src="images/shop/sh-4/1.jpg" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">Cotton White Underweaer Block Out Edition</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">$19.00</span>
                                    </ins>
                                </div>
                                <ul class="flat-color-list">
                                    <li>
                                        <a href="#" class="red"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="blue"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="black"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="add-to-cart text-center">
                                <a href="#">ADD TO CART</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item">
                            <div class="product-thumb clearfix">
                                <a href="#">
                                    <img src="images/shop/sh-4/2.jpg" alt="image">
                                </a>
                                <span class="new">New</span>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">Cotton White Underweaer Block Out Edition</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">$10.00</span>
                                    </ins>
                                </div>
                            </div>
                            <div class="add-to-cart text-center">
                                <a href="#">ADD TO CART</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item">
                            <div class="product-thumb clearfix">
                                <a href="#" class="product-thumb">
                                    <img src="images/shop/sh-4/3.jpg" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">Cotton White Underweaer Block Out Edition</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">$20.00</span>
                                    </ins>
                                </div>
                            </div>
                            <div class="add-to-cart text-center">
                                <a href="#">ADD TO CART</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item">
                            <div class="product-thumb clearfix">
                                <a href="#" class="product-thumb">
                                    <img src="images/shop/sh-4/4.jpg" alt="image">
                                </a>
                                <span class="new sale">Sale</span>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">Cotton White Underweaer Block Out Edition</span>
                                <div class="price">
                                    <del>
                                        <span class="regular">$90.00</span>
                                    </del>
                                    <ins>
                                        <span class="amount">$60.00</span>
                                    </ins>
                                </div>
                                <ul class="flat-color-list">
                                    <li>
                                        <a href="#" class="red"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="blue"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="black"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="add-to-cart text-center">
                                <a href="#">ADD TO CART</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                    </ul><!-- /.product -->
</div><!-- /.product-content -->
</div>
</div><!-- /.row -->
</div>
</section -->

@stop
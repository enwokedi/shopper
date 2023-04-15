@extends('frontend.shop')

@section('content')
<section class="flat-row main-shop shop-detail style-1">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="flat-image-box clearfix">
                    <div class="inner padding-top-4">
                        <ul class="product-list-fix-image">
                            <li>
                                <img src="images/shop/sh-detail/detail-03.jpg" alt="Image">
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
                            <h2 class="product-title">Best Woolen T-Shirt</h2>
                            <div class="flat-star style-1">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <i class="fa fa-star-half-o"></i>
                                <span>(1)</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <div class="price margin-top-24">
                                <del><span class="regular">$90.00</span></del>
                                <ins><span class="amount">$24.00</span></ins>
                            </div>
                            <ul class="product-infor style-1">
                                <li><span>100% cotton</span></li>
                                <li><span>6 months warranty</span></li>
                                <li><span>Free Shipping</span></li>
                                <li><span>High Quality</span></li>
                            </ul>
                            <div class="product-categories margin-top-22">
                                <span>Categories: </span><a href="#">Men,</a> <a href="#">Shoes</a>
                            </div>
                            <div class="product-tags">
                                <span>Tags: </span><a href="#">Dress,</a> <a href="#">Fashion,</a> <a href="#">Furniture,</a> <a href="#">Lookbok</a>
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
                                                <img src="images/shop/sh-detail/detail-desc-01.jpg" alt="Image">
                                            </div>
                                        </div><!-- /.grid-item -->
                                        <div class="grid-item">
                                            <div class="text-wrap">
                                                <h6 class="title">100 % alligator</h6>
                                                <p>Fashion has always been so temporary and uncertain. You can’t keep up with it. This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fash- ion tendencies. </p>
                                            </div>
                                        </div>
                                    </div><!-- /.grid-row -->

                                    <div class="grid-row image-right padding-bottom-48 clearfix">
                                        <div class="grid-item">
                                            <div class="text-wrap">
                                                <h6 class="title">Youthful Style</h6>
                                                <p>Fashion has always been so temporary and uncertain. You can’t keep up with it. This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fash- ion tendencies. </p>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="thumb text-center">
                                                <img src="images/shop/sh-detail/detail-desc-02.jpg" alt="Image">
                                            </div>
                                        </div><!-- /.grid-item -->
                                    </div><!-- /.grid-row -->

                                    <div class="grid-row image-left padding-bottom-48 clearfix">
                                        <div class="grid-item">
                                            <div class="thumb text-center">
                                                <img src="images/shop/sh-detail/detail-desc-03.jpg" alt="Image">
                                            </div>
                                        </div><!-- /.grid-item -->
                                        <div class="grid-item">
                                            <div class="text-wrap">
                                                <h6 class="title">Comfortable</h6>
                                                <p>Fashion has always been so temporary and uncertain. You can’t keep up with it. This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fash- ion tendencies. </p>
                                            </div>
                                        </div>
                                    </div><!-- /.grid-row -->

                                    <div class="grid-row image-right clearfix">
                                        <div class="grid-item">
                                            <div class="text-wrap">
                                                <h6 class="title">Easy To Clean</h6>
                                                <p>Fashion has always been so temporary and uncertain. You can’t keep up with it. This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fash- ion tendencies. </p>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="thumb text-center">
                                                <img src="images/shop/sh-detail/detail-desc-04.jpg" alt="Image">
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
                                            <td>1.73 kg</td>
                                        </tr>
                                        <tr>
                                            <td>Dimensions</td>
                                            <td>100 x 37 x 100 cm</td>
                                        </tr>
                                        <tr>
                                            <td>Materials</td>
                                            <td>80% cotton, 20% linen</td>
                                        </tr>
                                        <tr>
                                            <td>Size</td>
                                            <td>One Size, XL, L, M, S</td>
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
@endsection
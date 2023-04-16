@extends('frontend.main_master')

@section('content')

<!-- IMAGE BOX -->
<div id="bootstrap-overides" class="flat-row no-padding">
    <div class="container-fluid">
        <div class="row gutter-10">
            <div class="col-md-6">
                <div class="divider h0"></div>
                <div class="flat-image-box style-2 absolute-right flat-carousel-box" data-gap="0" data-auto="false" data-column="1" data-column2="1" data-column3="1">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="inner">
                                <div class="thumb">
                                    <img src="{{ url('assets/images/home/for-sale.jpg') }}" alt="Image">
                                    <div class="text-wrap text-center">
                                        <!-- p class="sub-title font-size-18 font-weight-400" id="section1">NEW & USED MOTORCYCLES</p -->
                                        <h2 class="title">Motorcycles <span class="text-accent">For Sale</span></h2>
                                        <div class="elm-btn">
                                            <a href="/sale-motorcycles" class="themesflat-button outline ol-accent has-padding-41 margin-top-24">ENTER SHOWROOM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.owl-carousel -->
                </div><!-- /.flat-image-box -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-3">
                <div class="divider h0"></div>
                <div class="flat-image-box style-1 absolute-center row2 data-effect clearfix">
                    <div class="item data-effect-item">
                        <div class="inner">
                            <div class="thumb">
                                <img src="{{ url('assets/images/home/tyres.jpg') }}" alt="Image">
                                <div class="text-wrap text-center">
                                    <h2 class="font-size-30 line-height-36 font-weight-600"><a href="/shop-tyres">TYRES</a></h2>
                                </div>
                                <div class="overlay-effect bg-color-2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="item data-effect-item">
                        <div class="inner">
                            <div class="thumb">
                                <img src="{{ url('assets/images/home/rentals.jpg') }}" alt="Image">
                                <div class="text-wrap text-center">
                                    <h2 class="font-size-30 line-height-36 font-weight-600"><a href="/rentals-motorcycle">RENTALS</a></h2>
                                </div>
                                <div class="overlay-effect bg-color-2"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.flat-image-box -->
            </div><!-- /.col-md-3 -->
            <div class="col-md-3">
                <div class="divider h0"></div>
                <div class="flat-image-box style-1 absolute-center row2 data-effect clearfix">
                    <div class="item data-effect-item">
                        <div class="inner">
                            <div class="thumb">
                                <img src="{{ url('assets/images/home/accidents.jpg') }}" alt="Image">
                                <div class="text-wrap text-center">
                                    <h2 class="font-size-30 line-height-36 font-weight-600"><a href="/accident-management-services">ACCIDENT MANAGEMENT SERVICES</a></h2>
                                </div>
                                <div class="overlay-effect bg-color-2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="item data-effect-item">
                        <div class="inner">
                            <div class="thumb">
                                <img src="{{ url('assets/images/home/spare-parts.jpg') }}" alt="Image">
                                <div class="text-wrap text-center">
                                    <h2 class="font-size-30 line-height-36 font-weight-600"><a href="/spare-parts">SPARE<br>PARTS</a></h2>
                                </div>
                                <div class="overlay-effect bg-color-2"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.flat-image-box -->
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->
        <div class="divider h20"></div>
        <div class="row gutter-10">
            <div class="col-md-4">
                <div class="flat-image-box style-1 absolute-center data-effect clearfix">
                    <div class="item data-effect-item">
                        <div class="inner">
                            <div class="thumb">
                                <img src="{{ url('assets/images/home/products610x377.jpg') }}" alt="Image">
                                <div class="text-wrap text-center">
                                    <h2 class="font-size-30 line-height-36 font-weight-600"><a class="text-white" href="/shop">SHOP</a></h2>
                                </div>
                                <div class="overlay-effect bg-color-2"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.flat-image-box -->
            </div>
            <div class="col-md-4">
                <div class="divider h0"></div>
                <div class="flat-image-box style-1 absolute-center data-effect clearfix">
                    <div class="item data-effect-item">
                        <div class="inner">
                            <div class="thumb">
                                <img src="{{ url('assets/images/home/gps-tracker.jpg') }}" alt="Image">
                                <div class="text-wrap text-center">
                                    <h2 class="font-size-30 line-height-36 font-weight-600"><a href="/gps-tracker">GPS TRACKER</a></h2>
                                </div>
                                <div class="overlay-effect bg-color-2"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.flat-image-box -->
            </div>
            <div class="col-md-4">
                <div class="divider h0"></div>
                <div class="flat-image-box style-1 absolute-center data-effect clearfix">
                    <div class="item data-effect-item">
                        <div class="inner">
                            <div class="thumb">
                                <img src="{{ url('assets/images/home/services.jpg') }}" alt="Image">
                                <div class="text-wrap text-center">
                                    <h2 class="font-size-30 line-height-36 font-weight-600"><a href="/services">MOT<br>SERVICING<br>REPAIRS</a></h2>
                                </div>
                                <div class="overlay-effect bg-color-2"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.flat-image-box -->
            </div>
        </div>
    </div>
</div>

<!-- END IMAGE BOX -->
<div class="divider h20"></div>
<!-- ANIMATION BOX -->
<section class="flat-row row-animation-box no-padding ">
    <div class="container-fluid">
        <div class="row gutter-10">
            <div class="col-md-12">
                <div class="flat-animation-block bg-section row-1">
                    <div class="divider h99"></div>
                    <div class="title-section width-before-17 bg-before-white margin-bottom-14">
                        <div class="sup-title"><span>WANT TO SAVE MONEY?</span></div>
                        <h2 class="title font-size-52 line-height-76">Discount Collection</h2>
                        <div class="sub-title"><span>Save Money on Everything</span></div>
                    </div>
                    <div class="elm-btn text-center">
                        <a href="#" class="themesflat-button bg-accent has-padding-36">Start Now</a>
                    </div>
                    <div class="divider h102"></div>
                </div><!-- /.flat-animation-block -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
<!-- END ANIMATION BOX -->

@stop
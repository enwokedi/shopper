@extends('frontend.main_master')

@section('title', 'Products')

@section('content')
<!-- Page title -->
<div class="page-title parallax parallax1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">@yield('title')</h1>
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

@include('frontend.body.shop-slidebar')

<div class="col-md-9">
    <div class="filter-shop clearfix">
        <p class="showing-product float-right">
            Need to find something fast? Call: 0208 314 1498
        </p>
    </div><!-- /.filte-shop -->
    <div class="product-content product-threecolumn product-slidebar clearfix">
        <ul class="product style2 sd1">
            <!-- Foreach with Chunk 3 -->
            <li class="product-item new">
                <!-- Foreach $chunk as $product -->
                <div class="product-thumb clearfix">
                    <a href="/product-accessories">
                        <img src="{{url('assets/images/shop/sh-4/2.jpg')}}" alt="image">
                    </a>
                </div>
                <div class="product-info clearfix">
                    <span class="product-title"></span>
                </div>
                <span class="regular"></span>
                <div class="add-to-cart text-center">
                    <a href="">PRODUCT</a>
                </div>
                <!-- End Foreach $chunk as $product -->
            </li>
            <!-- End Foreach with Chunk 3 -->
        </ul><!-- /.product -->
    </div><!-- /.product-content-->
    <div class="product-pagination text-center clearfix">
        <ul class="flat-pagination">
            <li class="prev">
                <a href="#"><i class="fa fa-angle-left"></i></a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul><!-- /.flat-pagination -->
    </div>
</div><!-- /.col-md-9 -->

</div><!-- /.container -->
</section><!-- /.flat-row -->
<!-- End Page Content -->

@stop
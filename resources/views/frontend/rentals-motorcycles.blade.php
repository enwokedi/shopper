@extends('frontend.main_master')

@section('content')

<!-- Page title -->
<div class="page-title parallax parallax1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">Motorcycles Rentals</h1>
                </div><!-- /.page-title-heading -->
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="/">Honda & Yamaha Specialists</a></li>
                        <li><a href="/rentals-motorcycle">Motorcycles for Rent</a></li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-title -->

<!-- PRODUCT -->
<section class="flat-row main-shop style1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-top-menu margin-bottom-58">
                    <ul class="flat-filter style-2">
                        <li class="active"><a href="#" data-filter="*">ALL MODELS</a></li>
                        <li><a href="#" data-filter=".hbikes">HONDA MOTORCYCLES</a></li>
                        <li><a href="#" data-filter=".hscooters">HONDA SCOOTERS</a></li>
                        <li><a href="#" data-filter=".ybikes">YAMAHA MOTORCYCLES</a></li>
                        <li><a href="#" data-filter=".yscooters">YAMAHA SCOOTERS</a></li>
                    </ul>
                    <!-- <div class="filter-shop icon-right">
                        <ul class="flat-filter-search">
                            <li class="filter-list">
                                <a class="show-filter">Filters</a>
                            </li>
                        </ul>
                    </div>/.filte-shop -->
                </div>
                <!-- <div class="box-filter slidebar-shop clearfix">
                    <div class="btn-close"><a><i class="fa fa-times"></i></a></div> -->
                <!-- <div class="widget widget-sort-by">
                        <h5 class="widget-title">
                            Sort By
                        </h5>
                        <ul>
                            <li><a href="#" data-filter=".make">Make</a></li>
                            <li><a href="#" data-filter=".model">Model</a></li>
                            <li><a href="#" data-filter=".type">Type</a></li>
                            <li><a href="#" data-filter=".year">Year</a></li>
                            <li><a href="#">Price: low to high</a></li>
                            <li><a href="#">Price: high to low</a></li>
                        </ul>
                    </div>/.widget-sort-by -->
                <!-- <div class="widget widget-price">
                        <h5 class="widget-title">Price</h5>
                        <ul>
                            <li><a href="#">£0.00 - £50.00</a></li>
                            <li><a href="#">£50.00 - £100.00</a></li>
                            <li><a href="#">£100.00 - £150.00</a></li>
                            <li><a href="#">£150.00 - £200.00</a></li>
                            <li><a href="#">£200.00 - 250.00</a></li>
                            <li><a href="#">250.00+</a></li>
                        </ul>
                    </div>/.widget -->
                <!-- <div class="widget widget-color">
                        <h5 class="widget-title">
                            Colors
                        </h5>
                        <ul class="flat-color-list icon-left">
                            <li><a href="#" class="yellow"></a><span>Yellow</span></li>
                            <li><a href="#" class="pink"> </a><span>White</span></li>
                            <li><a href="#" class="red"></a><span>Red</span> </li>
                            <li><a href="#" class="black"></a><span>Black</span></li>
                            <li><a href="#" class="blue"></a><span>Green</span></li>
                            <li><a href="#" class="khaki"></a><span>Orange</span></li>
                        </ul>
                    </div>/.widget-color -->
                <!-- <div class="widget widget-size">
                        <h5 class="widget-title">Engine Size</h5>
                        <ul>
                            <li><a href="#">125cc</a></li>
                            <li><a href="#">300cc</a></li>
                            <li><a href="#">500cc</a></li>
                            <li><a href="#">600cc</a></li>
                            <li><a href="#">750cc</a></li>
                            <li><a href="#">900cc</a></li>
                            <li><a href="#">1000cc</a></li>
                        </ul>
                    </div>/.widget -->
                <!-- <div class="widget widget_tag">
                        <h5 class="widget-title">
                            Tags
                        </h5>
                        <div class="tag-list">
                            <a href="#">All products</a>
                            <a href="#">CBT</a>
                            <a href="#">Insurance</a>
                            <a href="#">Assistance</a>
                            <a href="#">Unlimited Mileage</a>
                            <a href="#">Locks</a>
                            <a href="#">Anti-Theft</a>
                            <a href="#">Tags</a>
                        </div>
                    </div>/.widget -->
                <!-- </div>/.box-filter -->
                <div class="product-content product-fourcolumn clearfix">
                    <ul class="product style2 isotope-product clearfix">
                        <li class="product-item hscooters">
                            <div class="product-thumb clearfix">
                                <a href="/rentals-honda-pcx-125">
                                    <img src="{{url('assets/images/rentals/honda-pcx-125.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">HONDA PCX 125</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">HP £19.00</span>
                                    </ins>
                                </div>
                            </div>
                            <span class="regular">Urban Mobility</span>
                            <div class="add-to-cart text-center">
                                <a href="/rentals-honda-pcx-125">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item ybikes">
                            <div class="product-thumb clearfix">
                                <a href="#">
                                    <img src="{{url('assets/images/rentals/2022-Yamaha-YZF1000R1-EU-Icon_Blue-Studio-001-03.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">YAMAHA R1</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">HP £100.00</span>
                                    </ins>
                                </div>
                            </div>
                            <span class="regular">Super Sport</span>
                            <div class="add-to-cart text-center">
                                <a href="#">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item hscooters">
                            <div class="product-thumb clearfix">
                                <a href="/rental-honda-pcx-125">
                                    <img src="{{url('assets/images/rentals/honda-pcx-125.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">HONDA PCX 125</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">HP £19.00</span>
                                    </ins>
                                </div>
                            </div>
                            <span class="regular">Urban Mobility</span>
                            <div class="add-to-cart text-center">
                                <a href="/rental-honda-pcx-125">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item ybikes">
                            <div class="product-thumb clearfix">
                                <a href="#" class="product-thumb">
                                    <img src="{{url('assets/images/rentals/2022-Yamaha-YZF1000R1-EU-Yamaha_Black-Studio-001-03.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">YAMAHA R1</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">HP £100.00</span>
                                    </ins>
                                </div>
                            </div>
                            <span class="regular">Super Sport</span>
                            <div class="add-to-cart text-center">
                                <a href="#">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item ybikes">
                            <div class="product-thumb clearfix">
                                <a href="#" class="product-thumb">
                                    <img src="{{url('assets/images/rentals/2023-Yamaha-MT125-EU-Icon_Blue_-Studio-001-03.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">YAMAHA MT125</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">HP £139.00</span>
                                    </ins>
                                </div>
                            </div>
                            <span class="regular">Hyper Naked</span>
                            <div class="add-to-cart text-center">
                                <a href="#">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item hbikes">
                            <div class="product-thumb clearfix">
                                <a href="#" class="product-thumb">
                                    <img src="{{url('assets/images/rentals/honda-nc-750x.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">HONDA NC 750X</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">HP £120.00</span>
                                    </ins>
                                </div>
                            </div>
                            <span class="regular">Adventure</span>
                            <div class="add-to-cart text-center">
                                <a href="#">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item yscooters">
                            <div class="product-thumb clearfix">
                                <a href="#" class="product-thumb">
                                    <img src="{{url('assets/images/rentals/2023-Yamaha-G125YM-EU-Milky_White-Studio-001-03.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">YAMAHA NMAX 125</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">HP £110.00</span>
                                    </ins>
                                </div>
                            </div>
                            <span class="regular">Urban Mobility</span>
                            <div class="add-to-cart text-center">
                                <a href="#">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item hbikes">
                            <div class="product-thumb clearfix">
                                <a href="#" class="product-thumb">
                                    <img src="{{url('assets/images/rentals/honda-nc-750x.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">HONDA NC 750X</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">HP £120.00</span>
                                    </ins>
                                </div>
                            </div>
                            <span class="regular">Adventure</span>
                            <div class="add-to-cart text-center">
                                <a href="#">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item hbikes">
                            <div class="product-thumb clearfix">
                                <a href="#" class="product-thumb">
                                    <img src="{{url('assets/images/rentals/honda-africa-twin-1100.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">HONDA AFRICA TWIN 1100</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">HP £66.00</span>
                                    </ins>
                                </div>
                            </div>
                            <span class="regular">Adventure</span>
                            <div class="add-to-cart text-center">
                                <a href="#">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item yscooters">
                            <div class="product-thumb clearfix">
                                <a href="#" class="product-thumb">
                                    <img src="{{url('assets/images/rentals/2023-Yamaha-G125YM-EU-Ruby_Red-Studio-001-03.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">YAMAHA NMAX 125</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">HP £120.00</span>
                                    </ins>
                                </div>
                            </div>
                            <span class="regular">Urban Mobility</span>
                            <div class="add-to-cart text-center">
                                <a href="#">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item hbikes honda">
                            <div class="product-thumb clearfix">
                                <a href="#" class="product-thumb">
                                    <img src="{{url('assets/images/rentals/honda-africa-twin-1100.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">HONDA AFRICA TWIN 1100</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">HP £66.00</span>
                                    </ins>
                                </div>
                            </div>
                            <span class="regular">Adventure</span>
                            <div class="add-to-cart text-center">
                                <a href="#">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                        <li class="product-item yscooters">
                            <div class="product-thumb clearfix">
                                <a href="#" class="product-thumb">
                                    <img src="{{url('assets/images/rentals/2023-Yamaha-G125YM-EU-Deep_Blue-Studio-001-03.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">YAMAHA NMAX 125</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">HP £20.00</span>
                                    </ins>
                                </div>
                            </div>
                            <span class="regular">Urban Mobility</span>
                            <div class="add-to-cart text-center">
                                <a href="#">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </li>
                    </ul>
                    <div class="elm-btn text-center">
                        <a href="#" class="themesflat-button outline ol-accent margin-top-40">LOAD MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PRODUCT -->

@stop
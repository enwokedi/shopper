@extends('frontend.shop')

@section('content')
<div class="product-content product-threecolumn product-slidebar clearfix">
    @foreach($products->chunk(3) as $chunk)
    <ul class="product style2 sd1">
        @foreach($chunk as $product)
        <li class="product-item">
            <div class="product-thumb clearfix">
                <a href="/item/{{ $product->id }}" class="product-thumb">
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
                <ul>
                    <li>{{ $product->colour }}</li>
                    <li>{{ $product->sku }}</li>
                </ul>
            </div>
            <div class="add-to-cart text-center">
                <a href="{{ route('addproduct.cart', $product->id) }}">ADD TO CART</a>
            </div>
            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
        </li>
        @endforeach
    </ul><!-- /.product -->
    @endforeach
</div><!-- /.product-content -->
<div class="product-pagination pull-right clearfix">
    {{ $products->links() }}
</div>
@endsection
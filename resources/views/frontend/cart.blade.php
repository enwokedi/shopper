@extends('frontend.main_master')

@section('content')
<div class="page-title parallax parallax1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">Your Cart</h1>
                </div><!-- /.page-title-heading -->
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="/">Honda & Yamaha Specialists</a></li>
                        <li><a href="/products">Shop</a></li>
                        <li><a href="/service-mot">Shopping Cart</a></li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-title -->

<section class="flat-row main-shop shop-detail style-1">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">

            <table id="cart" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product $product->quantity</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)

                    <tr rowId="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" class="card-img-top" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">£{{ $details['price'] }}</td>

                        <td data-th="Subtotal" class="text-center"></td>
                        <td class="actions">
                            <a class="btn btn-outline-danger btn-sm delete-product"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                            <button class="btn btn-danger">Checkout</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection
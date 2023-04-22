<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Oxford;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Cart::count();

        return view('frontend.cart', [
            'cartItems' => Cart::instance('default')->content(),
        ]);
    }

    // Needs to be shown in users dashboard
    public function wishList()
    {
        return view('frontend.cart', [
            'cartItems' => Cart::instance('wishlist')->content(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($product_id)
    {
        $product = Oxford::select('id', 'sku', 'description', 'price', 'image_url', 'extended_description')
            ->where('id', $product_id)
            ->get();

        $quantity = 1;
        $totalQty = 1;

        $cart = Cart::instance('default')->add($product_id, $product[0]->description, $quantity, $product[0]->price, 0, ['totalQty' => $totalQty, 'product_code' => $product[0]->sku, 'image' => $product[0]->image_url, 'details' => $product[0]->extended_description])->associate('App\Models\Oxford');

        /* Redirect to prevend re-adding on refreshing */
        return redirect()->route('product.cart')->withSuccess('Product has been successfully added to the Cart.');
    }

    public function store(Request $request, $product_id)
    {
        $product = Oxford::select('id', 'sku', 'description', 'price', 'image_url', 'extended_description')
            ->where('id', $product_id)
            ->get();

        // dd($product[0]->price);
        Cart::instance('default')->add($product_id, $product[0]->description, $request->quantity, $product[0]->price, 0, ['product_code' => $product[0]->sku, 'image' => $product[0]->image_url, 'details' => $product[0]->extended_description])->associate('App\Models\Oxford');

        /* Redirect to prevend re-adding on refreshing */
        return redirect()->route('product.cart')->withSuccess('Product has been successfully added to the Cart.');
    }

    public function checkout()
    {
        Cart::count();

        return view('frontend.checkout');
    }
}

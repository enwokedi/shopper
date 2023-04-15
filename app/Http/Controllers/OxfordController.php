<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oxford;
use App\Models\OxfordCategory;
use Illuminate\Database\Eloquent\Collection;
use View;

class OxfordController extends Controller
{
    public function getProductCategory($category_id)
    {
        $products = Oxford::select('id', 'ean', 'image_url', 'description', 'sku', 'price', 'brand', 'category')
            ->where('category_id', $category_id)
            ->where('stock', '=>', 1)
            ->paginate(24);

        $cat = Oxford::select('category')
            ->where('category_id', $category_id)
            ->first();

        $category = strtolower($cat->category);

        return view('frontend.products', compact('products', 'category', 'category_id'));
    }

    public function getOxfordProduct($id)
    {
        $product = Oxford::find($id);

        $product_id = $id;
        $category_id = $product->category_id;
        $category = strtolower($product->category);
        $cookie = strtolower($product->description);
        $title = $product->description;

        return view('frontend.product', compact('product', 'title', 'cookie', 'category', 'category_id', 'product_id'));
    }
}

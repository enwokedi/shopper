<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oxford;
use App\Models\OxfordCategory;
use Illuminate\Database\Eloquent\Collection;
use View;

class OxfordsController extends Controller
{
    public function getCategoryProducts($category)
    {
        $products = Oxford::select('id', 'image_url', 'description', 'sku', 'vat_price', 'category')
            ->where('category', $category)
            ->paginate(24);

        $category = ucwords($category);

        return view('frontend.products', compact('products', 'category'));
    }

    public function getHelmets()
    {
        $products = Oxford::select('id', 'image_url', 'description', 'sku', 'price', 'brand', 'category')
            ->where('category_id', 1)
            ->where('brand', 'like', 'BOX')
            ->orwhere('brand', 'like', 'HJC')
            ->paginate(24);

        $cat = Oxford::select('category')
            ->where('category_id', 1)
            ->get();

        $category = ucfirst($cat);

        return view('frontend.products', compact('products', 'category'));
    }

    public function getHelmetAccessories()
    {
        $products = Oxford::select('id', 'image_url', 'description', 'sku', 'price', 'brand', 'category')
            ->where('category_id', 14)
            ->paginate(24);

        return view('frontend.products', compact('products'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Oxford;
use App\Models\OxfordCategory;

class OxfordsController extends Controller
{
    public function getOxfordProducts()
    {
        $products = Oxford::select('id', 'image_url', 'description', 'sku', 'price', 'category')
            ->where('category_id', 1)
            ->paginate(24);

        // $category = ucwords($category);

        return view('frontend.shop', compact('products'));
    }
}

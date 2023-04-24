<?php

namespace App\Http\Controllers\Shopper;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Bloodline;
use system;

class SalesController extends Controller
{
    public function NewForSale($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $motorcycles = $category->products()->orderBy('created_at')->paginate(12);

        // $motorcycles = Category::findOrFail(77)->products()->paginate(9);
        return view('frontend.motorcycles-new', compact('motorcycles'));
    }

    public function NewBikeDetails($id)
    {
        $product = Product::findOrFail($id);

        $image = Media::all()
            ->where('model_type', 'product')
            ->where('model_id', $id);

        $brand_img = Media::all()
            ->where('model_type', 'brand')
            ->where('model_id', $product['brand']->id);

        $brand_image = $product['brand']->id;

        dd($brand_image);
        return view('frontend.motorcycle-new', [
            'product' => $product,
            'image' => $image
        ]);
    }

    public function UsedForSale()
    {
        return view('frontend.motorcycles-used');
    }

    public function UsedBikeDetails($id)
    {
        return view('frontend.motorcycle-new');
    }

    public function RentBike()
    {
        return view('frontend.rentals-motorcycles');
    }

    public function RentalDetails()
    {
        return view('frontend.rentals-details');
    }

    public function RentalBikeDetails()
    {
        return view('frontend.rentals-hondapcx125');
    }
}

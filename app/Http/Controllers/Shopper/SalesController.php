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
    public function NewForSale()
    {
        $motorcycles = Category::findOrFail(77)->products()->paginate(9);
        return view('frontend.motorcycles-new', compact('motorcycles'));
    }

    public function NewBikeDetails($id)
    {
        $product = Product::findOrFail($id);

        $image = Media::all()
            ->where('model_type', 'product')
            ->where('model_id', $id);

        $brand_image = Media::all()
            ->where('model_type', 'brand')
            ->where('model_id', $product['brand']->id);

        return view('frontend.motorcycle-new', [
            'product' => $product,
            'image' => $image,
            'brand_image' => $brand_image
        ]);
    }

    public function UsedForSale()
    {
        $motorcycles = Category::findOrFail(80)->products()->paginate(9);

        return view('frontend.motorcycles-used', compact('motorcycles'));
    }

    public function UsedBikeDetails($id)
    {
        $product = Product::findOrFail($id);

        $image = Media::all()
            ->where('model_type', 'product')
            ->where('model_id', $id);

        $brand_image = Media::all()
            ->where('model_type', 'brand')
            ->where('model_id', $product['brand']->id);

        return view('frontend.motorcycle-used', [
            'product' => $product,
            'image' => $image,
            'brand_image' => $brand_image
        ]);
    }

    public function RentBike()
    {
        $motorcycles = Category::findOrFail(78)->products()->paginate(9);
        // dd($motorcycles[0]->id); // 4
        $images = Media::all()
            ->where('model_type', 'product')
            ->where('model_id', $motorcycles[0]->id);
        // dd($images[8]->id);
        return view('frontend.motorcycle-rentals', [
            'motorcycles' => $motorcycles,
            'image' => $images
        ]);
    }

    public function RentalDetails($id)
    {
        $product = Product::findOrFail($id);

        $image = Media::select()
            ->where('model_type', 'product')
            ->where('model_id', $id);

        $brand_image = Media::all()
            ->where('model_type', 'brand')
            ->where('model_id', $product['brand']->id);

        // dd($product);
        // $brand_image = $product['brand']->id;
        // dd($brand_image[1]->id);
        return view('frontend.motorcycle-rental', [
            'product' => $product,
            'image' => $image,
            'brand_image' => $brand_image
        ]);
    }

    public function RentalBikeDetails()
    {
        return view('frontend.rentals-hondapcx125');
    }
}

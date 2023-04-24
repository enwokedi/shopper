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

        $b = Brand::all()
            ->where('id', $product->brand_id);
        $brand = json_decode($b);

        // $category
        // $image

        dd($product->getFirstMediaUrl(config('shopper.system.storage.disks.uploads')));
        // dd($brand[0]->name);
        return view('frontend.motorcycle-new', [
            'product' => $product,
            'brand' => $brand
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

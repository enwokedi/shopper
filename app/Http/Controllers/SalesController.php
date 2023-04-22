<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SalesController extends Controller
{
    public function NewForSale()
    {
        $motorcycles = Category::findOrFail(77)->products()->paginate(9);
        // dd($motorcycles);
        return view('frontend.motorcycles-new', compact('motorcycles'));
    }

    public function NewBikeDetails($id)
    {
        return view('frontend.motorcycle-new');
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
